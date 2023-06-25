<?php
session_start();
require("functions.php");
require("db.php");
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Electronix Store - Contact</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
	<script type="text/javascript" src="js/boxOver.js"></script>
</head>

<body>
	<?php
	if ($_SESSION['logged'] == 'guest') {
		echo "<div class='center_content'>
			<div class='prod_box_big'>
				<div class='top_prod_box_big'></div>
				<div class='center_prod_box_big'>
					<div class='product_img_big'><a><img src='images/lock.png' width='180' height='180' /></a></div>
					<div class='details_big_boxa'>
						<div class='product_title_biga'>
							<p align='justify' style='font-size:20px;'>Sorry, but the system believes that you are registered as a guest. Please <a href='register.php'>create an account</a> or <a href='login.php'>log in</a> in order to perform that action.</p>
						</div>
					</div>
				</div>
			</div>
		</div>";
	} else {
		$id = $_GET['id'];
		$_SESSION['prodid'] = $id;
		$stmt = $conn->prepare("SELECT * FROM products WHERE productid = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		if (!$row) {
			die("Error: Product not found.");
		}

		$prodid = $row['productid'];

		// For displaying highest bid and number of bidders
		$stmt2 = $conn->prepare("SELECT * FROM bidreport WHERE productid = ?");
		$stmt2->bind_param("i", $prodid);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		$numberOfRows = $result2->num_rows;

		if ($numberOfRows == 0) {
			$noofbidders = "none";
			$higestbid = "0";
		} else if ($numberOfRows > 0) {
			$initialize = 0;
			while ($row2 = $result2->fetch_assoc()) {
				if ($row2['bidamount'] >= $initialize) {
					$initialize = $row2['bidamount'];
				}
			}
			$higestbid = $initialize;
			$noofbidders = $numberOfRows;
		}
	}
	?>

	<?php
	echo "<div class='center_content'>  
	<div class='center_title_bar'>Bid This Product</div>
	<div class='prod_box_big'>
		<div class='top_prod_box_big'></div>
		<div class='center_prod_box_big'>
			<div class='product_img_big'><a><img src='administrator/images/products/" . $row['prodimage'] . "' width='269' height='255' alt='' border='0' /></a></div>
			<div class='details_big_boxa'>
				<div class='product_title_biga'>" . $row['prodname'] . "</div>
				<div class='specifications'>
					Item Condition: <span class='blue'></span><br /><br />
					Bids: <span class='blue'>" . $noofbidders . "</span><br /><br />
					Highest Bid: <span class='blue'>P" . $higestbid . "</span><br /><br />
					Time Left: <span class='blue'>" . $row['duedate'] . "</span><br /><br />
				</div>
				<div class='note'>
					<form method='post' action='bidconfirm.php' id='logins-form' class='logins-form'> 
						<strong>Php</strong><br /><input type='text' name='bidamount'>
						<input type='submit' value='Place Bid' name='submit'>
					</form>
					<span class='blue'><strong>(Enter Php" . $row['startingbid'] . " or more)</strong></span><br /><br />
					<a href='#'><span class='blue'><strong>Click here for Payment Info</strong></span></a>
				</div>
			</div>
			<div class='bottom_prod_box_big'></div>
		</div>
	</div>
<!-- end of center content -->
</div>";
	?>
	<!-- end of main_container -->

</html>