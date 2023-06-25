<?php
require("db.php");
function cats()
{
	global $con; // Access the existing database connection

	$query = "SELECT * FROM `pcategories`"; //selecting the categories
	$result = mysqli_query($con, $query) or die(mysqli_error($con));

	echo "<select name='category'>";
	echo "<option>Select Category</option>";

	while ($row = mysqli_fetch_array($result)) {
		echo "<option value='" . $row['categoryid'] . "'>" . $row['categoryname'] . "</option>";
	}

	echo "</select>";
}
//shows the add to watchlist option--------

function watsnew()
{
	global $con; // Access the existing database connection

	$query = "SELECT * FROM products WHERE status = 0 ORDER BY productid DESC LIMIT 0,1";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));

	while ($row = mysqli_fetch_array($result)) {
		echo '<div class="border_box">
				<div class="product_title"><a href="details.php?id=' . $row['productid'] . '">' . $row['prodname'] . '</a></div>
				<div class="product_img"><img src="administrator/images/products/' . $row['prodimage'] . '" width="94" height="92" alt="" border="0" /></div>
				<div class="prod_price"></div>
			</div>';
	}
}

//shows categories--------

function categories()
{
	global $con; // Access the existing database connection

	$query = "SELECT * FROM `pcategories`";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));

	echo "<ul>";

	while ($row = mysqli_fetch_array($result)) {
		echo "<li class='even'><a href='showprod.php?id=" . $row['categoryid'] . "'>" . $row['categoryname'] . "</a></li>";
	}

	echo "</ul>";
}

//shows categories--------

function categorylist()
{
	global $con; // Access the existing database connection

	$query = "SELECT * FROM pcategories";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));

	while ($row = mysqli_fetch_array($result)) {
		echo "<div class='prod_box'>";
		echo "<div class='top_prod_box'></div>";
		echo "<div class='center_prod_box'>";
		echo "<div class='product_title'><a href='showprod.php?id=" . $row['categoryid'] . "'>" . $row['categoryname'] . "</a></div>";
		echo "<div class='product_img'><a href='showprod.php?id=" . $row['categoryid'] . "'><img src='administrator/images/category/" . $row['catimage'] . "' width='94' height='92' alt='' border='0' /></a></div>";
		echo "<div class='prod_price'><span class='price'>" . $row['categorydes'] . "</span></div>";
		echo "</div>";
		echo "<div class='bottom_prod_box'></div>";
		echo "<div class='prod_details_tab'>click to view products in category</div>";
		echo "</div>";
	}
}


//shows latest products-----

function latest()
{
	global $con; // Access the existing database connection

	$query = "SELECT * FROM products WHERE status = 0 ORDER BY productid DESC LIMIT 0,6";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));

	while ($row = mysqli_fetch_array($result)) {
		$prodid = $row['productid'];
		$prodsbid = $row['startingbid'];

		// For displaying highest bid and number of bidders
		$query2 = mysqli_query($con, "SELECT * FROM bidreport WHERE productid = '$prodid'") or die(mysqli_error($con));
		$noofbidders = mysqli_num_rows($query2);
		$highbid = $prodsbid;

		while ($highonthis = mysqli_fetch_array($query2)) {
			$checkthis = $highonthis['bidamount'];

			if ($checkthis > $highbid) {
				$highbid = $checkthis;
			}
		}

		$highestbidder = mysqli_query($con, "SELECT * FROM bidreport WHERE bidamount = '$highbid'") or die(mysqli_error($con));
		$highestbiddera = mysqli_fetch_array($highestbidder);
		$hibidder = null;
		if ($highestbiddera !== null && isset($highestbiddera['bidder'])) {
			$hibidder = $highestbiddera['bidder'];
		}

		$highname = "";
		if ($hibidder) {
			$name = mysqli_query($con, "SELECT * FROM member WHERE memberid = '$hibidder'") or die(mysqli_error($con));
			$namea = mysqli_fetch_array($name);
			if ($namea) {
				$highname = $namea['userid'];
			}
		}

		echo "<div class='prod_box'>";
		echo "<div class='top_prod_box'></div>";
		echo "<div class='center_prod_box'>";
		echo "<div class='product_title'><a href='details.php?id=" . $row['productid'] . "'>" . $row['prodname'] . "</a></div>";
		echo "<div class='product_img'><a href='details.php?id=" . $row['productid'] . "'><img src='administrator/images/products/" . $row['prodimage'] . "' width='94' height='92' alt='' border='0' /></a></div>";
		echo "<div class='prod_price'><span>Start Bid at: </span> <span class='price'>P " . $row['startingbid'] . "</span><br />";
		echo "<span>Highest Bidder: </span> <span class='price'>" . $highname . "</span></div>";
		echo "</div>";
		echo "<div class='bottom_prod_box'></div>";
		echo "<div class='prod_details_tab'><a href='details.php?id=" . $row['productid'] . "' class='prod_details' title='header=[Click to Bid] body=[&nbsp;] fade=[on]'>Bid Now</a> </div>";
		echo "</div>";
	}
}


//shows products on a category-----

function showprod()
{
	global $con; // Access the existing database connection

	$id = isset($_GET['id']) ? $_GET['id'] : null;
	if ($id === null) {
		// Handle the case when 'id' is not set
		echo "No category ID specified.";
		return;
	}

	$query = mysqli_query($con, "SELECT * FROM products WHERE categoryid = '$id' AND status = 0") or die(mysqli_error($con));
	$res = mysqli_num_rows($query);
	if ($res == 0) {
		echo "<div class='prod_box'>";
		echo "<div class='top_prod_box'></div>";
		echo "<div class='center_prod_box'>";
		echo "<div class='product_title'>There is no available product in this category</div>";
		echo "<div class='product_img'><img src='administrator/images/products/nocateg.jpg' width='94' height='92' alt='' border='0' /></div>";
		echo "<div class='prod_price'></div>";
		echo "</div>";
		echo "<div class='bottom_prod_box'></div>";
		echo "<div class='prod_details_tab'><a href='details.html' class='prod_details'>details</a> </div>";
		echo "</div>";
	} else {
		while ($row = mysqli_fetch_array($query)) {
			$prodid = $row['productid'];
			$prodsbid = $row['startingbid'];
			//for displaying the highest bid and number of bidders
			$query2 = mysqli_query($con, "SELECT * FROM bidreport WHERE productid = '$prodid'") or die(mysqli_error($con));
			$noofbidders = mysqli_num_rows($query2);
			$highbid = $prodsbid;
			while ($highonthis = mysqli_fetch_array($query2)) {
				$checkthis = $highonthis['bidamount'];
				if ($checkthis > $highbid) {
					$highbid = $checkthis;
				}
			}
			$highestbidder = mysqli_query($con, "SELECT * FROM bidreport WHERE bidamount = '$highbid'") or die(mysqli_error($con));
			$highestbiddera = mysqli_fetch_array($highestbidder);
			$hibidder = null;
			if ($highestbiddera !== null && isset($highestbiddera['bidder'])) {
				$hibidder = $highestbiddera['bidder'];
			}
			$name = mysqli_query($con, "SELECT * FROM member WHERE memberid = '$hibidder'") or die(mysqli_error($con));
			$namea = mysqli_fetch_array($name);
			$highname = null;
			if ($namea !== null && isset($namea['userid'])) {
				$highname = $namea['userid'];
			}

			echo "<div class='prod_box'>";
			echo "<div class='top_prod_box'></div>";
			echo "<div class='center_prod_box'>";
			echo "<div class='product_title'><a href='details.php?id=" . $row['productid'] . "'>" . $row['prodname'] . "</a></div>";
			echo "<div class='product_img'><a href='details.php?id=" . $row['productid'] . "'><img src='administrator/images/products/" . $row['prodimage'] . "' width='94' height='92' alt='' border='0' /></a></div>";
			echo "<div class='prod_price'><span>Start Bid at: </span> <span class='price'>P " . $row['startingbid'] . "</span><br />";
			echo "<span>Highest Bidder: </span> <span class='price'>" . $highname . "</span></div>";
			echo "</div>";
			echo "<div class='bottom_prod_box'></div>";
			echo "<div class='prod_details_tab'><a href='details.php?id=" . $row['productid'] . "' class='prod_details' title='header=[Click to Bid] body=[&nbsp;] fade=[on]'>Bid Now</a> </div>";
			echo "</div>";
		}
	}
}




//shows the products on watch--------
function onwatch()
{
	global $con; // Access the existing database connection
	$who_u = $_SESSION['logged'];
	$query1 = mysqli_query($con, "SELECT * FROM watchlist WHERE memberid = '$who_u'");
	while ($row1 = mysqli_fetch_array($query1)) {
		$prod = $row1['productid'];
		$query = mysqli_query($con, "SELECT * FROM products WHERE productid = '$prod'");
		while ($row = mysqli_fetch_array($query)) {
			echo "<div class='prod_box'>";
			echo "<div class='top_prod_box'></div>";
			echo "<div class='center_prod_box'>";
			echo "<div class='product_title'><a href='details.php?id=" . $row['productid'] . "'>" . $row['prodname'] . "</a></div>";
			echo "<div class='product_img'><a href='details.php?id=" . $row['productid'] . "'><img src='administrator/images/products/" . $row['prodimage'] . "png' width='94' height='92' alt='' border='0' /></a></div>";
			echo "<div class='prod_price'><span class='reduce'>" . $row['regularprice'] . "$</span> <span class='price'>" . $row['startingbid'] . "$</span></div>";
			echo "</div>";
			echo "<div class='bottom_prod_box'></div>";
			echo "<div class='prod_details_tab'><a href='details.html' class='prod_details' title='header=[Click for Details] body=[&nbsp;] fade=[on]'>Details</a> </div>";
			echo "</div>";
		}
	}
}

//shows the account--------
function account()
{
	if ($_SESSION['logged'] != 'guest') {
		echo '<li><a href="logout.php" class="nav3">Log-Out</a></li>
		<li><a href="myaccount.php" class="nav3">View Account</a></li>
		<li><a class="nav4">Account</a></li>';
	} else {
		echo '<li><a href="login.php" class="nav4">Log-in or Register</a></li>';
	}
}
function logform()
{ //shows the login form
	global $con; // Access the existing database connection
	if ($_SESSION['logged'] == 'guest') {
		echo '<div class="title_box">Welcome</div>
			  <div class="border_box">
					<br />
						<strong>User: </strong>Guest<br /><br />
						<strong>Account Status:</strong> Not Active<br /><br />
						<strong>Bid Counter:</strong> Not Available<br /><br />
						<strong>Items Acquired:</strong> Not Available<br /><br />
						<strong>Feedbacks:</strong> Not Available<br /><br />
						<ul></ul>
			</div>';
	} elseif ($_SESSION['logged'] == 'notactive') {
		$hisid = $_SESSION['logged'];
		$query = mysqli_query($con, "SELECT * FROM member WHERE memberid = '$hisid'");
		while ($rows = mysqli_fetch_array($query)) {
			echo '<div class="title_box">Welcome</div>
					<div class="border_box">
						<br />
							<strong>Username:</strong> ' . $rows['userid'] . '<br /><br />
							<strong>Account Status:</strong> Not Active<br /><br />
							<strong>Bid Counter:</strong> Not Available<br /><br />
							<strong>Items Acquired:</strong> Not Available<br /><br />
							<strong>Feedbacks:</strong> Not Available<br /><br />
							<ul></ul>
						</div>';
		}
	} else {
		$hisid = $_SESSION['logged'];
		$query = mysqli_query($con, "SELECT * FROM member WHERE memberid = '$hisid'");
		while ($rows = mysqli_fetch_array($query)) {
			echo '<div class="title_box">Welcome</div>
					<div class="border_box">
							<br />
							<strong>Username:</strong> ' . $rows['userid'] . '<br /><br />
							<strong>Account Status: </strong> Active<br /><br />
							<strong>Bid Counter:</strong> 0<br /><br />
							<strong>Items Acquired:</strong> 0<br /><br />
							<strong>Feedbacks:</strong> 0<br /><br />
							<ul></ul>
						</div>';
		}
	}
}

?>