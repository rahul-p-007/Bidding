<?php
require("../db.php");
$productid = $_POST['id'];
mysqli_query($con, "UPDATE products SET status = 1 WHERE productid = '$productid'") or die(mysqli_error($con));
?>
<?php
$datenow = date('l, F d, Y');
$endedsum = mysqli_query($con, "SELECT * FROM products WHERE duedate < '$datenow' AND status = 0") or die(mysqli_error($con));
$counters = 0;
while ($stat = mysqli_fetch_array($endedsum)) {
	$counters++;
}
echo $counters;
?>