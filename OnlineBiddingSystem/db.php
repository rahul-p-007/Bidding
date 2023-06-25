<!-- Connect to database -->

<?php
$con = mysqli_connect('localhost', 'root', '', 'biddingsystemdb');
if (!$con) {
	die(mysqli_error($con));
}
?>