<?php
require("../db.php");
$msgnotifsid = $_POST['id'];
mysqli_query($con, "UPDATE msgnotifs SET status = 1 WHERE msgnotifsid = '$msgnotifsid'") or die(mysqli_error($con));
?>
<?php
$msgnum = mysqli_query($con, "SELECT * FROM msgnotifs WHERE (toid = 'admin' AND status = 0)") or die(mysqli_error($con));
$counter = 0;
while ($stat = mysqli_fetch_array($msgnum)) {
	$counter++;
}
?>