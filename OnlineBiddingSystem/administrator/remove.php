<?php
require("../db.php");
$bidid = $_POST['id'];
mysqli_query($con, "UPDATE bidreport SET status = 1 WHERE bidid = '$bidid'") or die(mysqli_error($con));
?>