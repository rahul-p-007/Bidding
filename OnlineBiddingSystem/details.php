<?php
session_start();
require_once("functions.php");
require_once("db.php");
require_once("htmls.php");
headhtml();

$duedate = "2011-10-11 00:00:00";
?>

<div id="main_content">
	<div id="menu_tab">
		<div class="left_menu_corner"></div>
		<ul class="menu">
			<li><a href="home.php" class="nav2">Home</a></li>
			<li class="divider"></li>
			<li><a href="prodcateg.php" class="nav1">Products</a></li>
			<li class="divider"></li>
			<li><a href="contact.php" class="nav2">About Us</a></li>
			<li class="divider"></li>
			<?php account(); ?>
			<script type='text/javascript'>
				jQuery(document).ready(function () {
					jQuery('.nav3').hide();
					jQuery('.nav4').click(function () {
						jQuery('.nav3').toggle('fade');
					});
				});
			</script>
		</ul>
		<div class="right_menu_corner"></div>
	</div>
	<!-- end of menu tab -->
	<div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
	<div class="left_content">
		<div class="title_box">Categories</div>
		<ul class="left_menu">
			<?php
			categories();
			logform();
			?>
		</ul>
	</div>
	<!-- end of left content -->
	<?php
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	if ($id !== null) {
		$id = mysqli_real_escape_string($con, $id); // Sanitize the ID to prevent SQL injection
		$query = "SELECT * FROM products WHERE productid = '$id'";
		$result = mysqli_query($con, $query);
	}

	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		?>
		<div class="center_content">
			<div class="center_title_bar">Product Details</div>
			<div class="prod_box_big">
				<div class="top_prod_box_big"></div>
				<div class="center_prod_box_big">
					<div class="product_img_big">
						<a title='header=[Click to Bid] body=[&nbsp;] fade=[on]'><img
								src='administrator/images/products/<?php echo $row['prodimage']; ?>' width='169'
								height='155' alt='' border='0' /></a>
						<div class='bid_border_box'>
							<div class='bid'>Click to Bid Now</div>
						</div>
						<div class='bid_border_box'>
							<div class='details'>Click to View Details</div>
						</div>
					</div>
					<script type='text/javascript'>
						jQuery(document).ready(function () {

							jQuery('.bid_box').hide();
							jQuery('.details').hide();

							jQuery('.details').click(function () {
								jQuery('.proddet').toggle('fade');
								jQuery('.bid').toggle('fade');
								jQuery('.bid_box').hide()
								jQuery('.details').hide();
							});
							jQuery('.bid').click(function () {
								jQuery('.details').toggle('fade');
								jQuery('.bid_box').toggle('fade');
								jQuery('.bid').hide();
								jQuery('.proddet').hide();
							});
						});
					</script>

					<div class="details_big_box">
						<div class='proddet'>
							<div class="product_title_big">
								<?php echo $row['prodname']; ?>
							</div><br />
							<div class="specificationss"> Description: <span class="blue">
									<?php echo $row['prodescription']; ?>
								</span><br /><br />
								Date Added: <span class="blue">
									<?php echo $row['dateposted']; ?>
								</span><br /><br />
								Item number: <span class="blue">
									<?php echo '0998' . $row['productid'] . ''; ?>
								</span><br /><br />
								Available to: <span class="blue">Negros Occidental</span><br /><br />
								Category: <span class="blue">
									<?php
									$categid = $row['categoryid'];
									$categQuery = "SELECT * FROM pcategories WHERE categoryid = '$categid'";
									$categResult = mysqli_query($con, $categQuery);
									$categRow = mysqli_fetch_assoc($categResult);
									echo $categRow['categoryname'];
									?>
								</span><br /><br />
							</div>
						</div>
						<div class='bid_box'>
							<?php
							$id = $_GET['id'];
							$_SESSION['prodid'] = $id;
							$query = "SELECT * FROM products WHERE productid = '$id'";
							$result = mysqli_query($con, $query);
							$row = mysqli_fetch_array($result);
							$prodid = $row['productid'];
							$prodsbid = $row['startingbid'];
							$seller = $row['sellername'];

							// For displaying the highest bid and number of bidders
							$query2 = "SELECT * FROM bidreport WHERE productid = '$prodid'";
							$result2 = mysqli_query($con, $query2);
							$noofbidders = mysqli_num_rows($result2);

							$highbid = $prodsbid;
							while ($highonthis = mysqli_fetch_array($result2)) {
								$checkthis = $highonthis['bidamount'];
								if ($checkthis > $highbid) {
									$highbid = $checkthis;
								}
							}

							$highestbidder = "SELECT * FROM bidreport WHERE bidamount = '$highbid'";
							$highestbidderResult = mysqli_query($con, $highestbidder);
							$highestbiddera = mysqli_fetch_array($highestbidderResult);
							$hibidder = null;
							if ($highestbiddera !== null && isset($highestbiddera['bidder'])) {
								$hibidder = $highestbiddera['bidder'];
							}

							if ($_SESSION['logged'] == 'notactive' || $_SESSION['logged'] == 'guest') {
								echo "<span class='blue'><p> Only those who have an activated account can access this and participate. Please Log-In or Register</p></br><h2>To Activate Account, Open the Database, Go to Member Table, Look for your 'userid' row and check 'Verification' row. Set the value from 'no' to 'yes'</h2></span>";
							} else {
								echo "</span>
    <br />
    &nbsp&nbsp Bids: <span class='blue'>" . $noofbidders . "</span><br /><br />
    &nbsp&nbsp Highest Bid: <span class='blue'>P" . $highbid . "</span><br /><br />
    &nbsp&nbsp Highest Bidder: <span class='blue'>";

								$name = "SELECT * FROM member WHERE memberid = '$hibidder'";
								$nameResult = mysqli_query($con, $name);
								$namea = mysqli_fetch_array($nameResult);

								if ($namea != null && isset($namea['userid'])) {
									echo $namea['userid'];
								} else {
									// Handle the case when $namea is null or $namea['userid'] is not set
									// You can display an error message or perform any necessary actions here
								}
								?>
								<?php echo "</span><br /><br />
									&nbsp&nbsp Time Left to Bid: <span class='blue'>"; ?>
								<?php
								$duedate = $row['duedate'];
								$closedate = date_format(date_create($duedate), 'm/d/Y H:i:s');
								?>

								<script language="JavaScript">
									TargetDate = "<?php echo $closedate ?>";
									BackColor = "";
									ForeColor = "navy";
									CountActive = true;
									CountStepper = -1;
									LeadingZero = true;
									DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
									FinishMessage = "Bidding closed!";
								</script>
								<script language="JavaScript" src="js/countdown.js"></script>
								<?php echo '</span><br /><br />
											<form method = "post" action="bidconfirm.php?id=' . $prodid . '" id="logins-form" class="logins-form">
												<input type = "hidden" value="' . $highbid . '" name="high">
												&nbsp&nbsp <strong>Php</strong><input type="text" name="bidamount">
												<input type="submit" value="Place Bid" name="submit">
											</form>
										&nbsp&nbsp <span class="blue"><strong>';
								echo "<span class='blue'>(Enter Price higher than Php" . $highbid . ")</span>";
								echo "<br />&nbsp&nbsp&nbsp&nbsp<span class='blue'> click <a rel='facebox' href='bidlog.php?id=" . $prodid . "'>here</a> to view Bidding Log</span>";
							}
							?>
						</div>
					</div>

					<div class="bottom_prod_box_big"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of center content -->
	<!-- end of right content -->
	</div>
	<!-- end of main content -->
	<?php foothtml();
	}
	mysqli_close($con);
	?>