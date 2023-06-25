<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<title>Bidding Zone - Message</title>
	<link rel="stylesheet" href="jquery-ui/development/themes/base/jquery.ui.all.css">
	<script src="jquery-ui/development/jquery-1.5.1.js"></script>
	<script src="jquery-ui/development/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.core.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.widget.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.mouse.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.draggable.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.position.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.resizable.js"></script>
	<script src="jquery-ui/development/ui/jquery.ui.dialog.js"></script>
	<link rel="stylesheet" href="jquery-ui/development/demos/demos.css">
	<script>
		$(function () {
			// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
			$("#dialog:ui-dialog").dialog("destroy");

			$("#dialog-modal").dialog({
				height: 140,
				modal: true
			});
		});
	</script>
</head>

<body>
	<div id="templatmeo_content">
		<div class="demo">
			<div id="dialog-modal" title="Message">
				<center>
					<p>
						<?php
						session_start();
						require("functions.php");

						if (isset($_POST['submit'])) {
							$high = $_POST['high'];
							$id = $_SESSION['prodid'];
							$bidamount = $_POST['bidamount'];
							$query = mysqli_query($con, "SELECT * FROM products WHERE productid = '$id'") or die(mysqli_error($con));
							$prod = mysqli_fetch_array($query);
							$userid = $_SESSION['ID'];
							$query2 = mysqli_query($con, "SELECT * FROM member WHERE memberid = '$userid'") or die(mysqli_error($con));
							$user = mysqli_fetch_array($query2);
							$biddername = $user['memberid'];
							$prodname = $prod['prodname'];

							if ($bidamount > $high) {
								mysqli_query($con, "INSERT INTO bidreport(productid, bidder, biddatetime, bidamount, status) VALUES ('$id', '$biddername', NOW(), '$bidamount', 0)") or die(mysqli_error($con));
								echo "Congratulations " . $_SESSION['user'] . "! You are the highest bidder for Item " . $prodname . "<br /><br /><a href='details.php?id=" . $id . "'>Back</a>";
							} elseif ($bidamount <= $high) {
								echo "Your bid is not counted because the amount is lower than the highest bid or does not exceed the starting bid.<br /><br /><a href='details.php?id=" . $id . "'>Back</a>";
							}
						}
						?>
					</p>
				</center>
				<p></p>
			</div>
		</div>
	</div>
</body>

</html>