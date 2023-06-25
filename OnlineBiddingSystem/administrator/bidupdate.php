<?php
require("../db.php");
$bidid = $_POST['id'];
mysqli_query($con, "UPDATE bidreport SET status = 1 WHERE bidid = '$bidid'") or die(mysqli_error($con));
?>

<?php
$bidnum = mysqli_query($con, "SELECT * FROM bidreport LEFT JOIN member ON member.memberid = bidreport.bidder LEFT JOIN products ON products.productid = bidreport.productid WHERE bidreport.status = 0") or die(mysqli_error($con));
$count = mysqli_num_rows($bidnum);
echo $count;
?>