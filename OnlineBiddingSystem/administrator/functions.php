<?php
require("../db.php");

function cats()
{
	global $con;
	$query = mysqli_query($con, "SELECT * FROM `pcategories`") or die(mysqli_error($con));
	echo "<select name='category'>";
	echo "<option>Select Category</option>";
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='" . $row['categoryid'] . "'>" . $row['categoryname'] . "</option>";
	}
	echo "</select>";
}

function categoryadd()
{
	global $con;
	if (isset($_POST['cmdadd'])) {
		$name = $_FILES["catimage"]["name"];
		$type = $_FILES["catimage"]["type"];
		$size = $_FILES["catimage"]["size"];
		$temp = $_FILES["catimage"]["tmp_name"];
		$error = $_FILES["catimage"]["error"];

		if ($error > 0) {
			die("Error uploading file! Code $error.");
		} else {
			if ($size > 1000000000) {
				die("Format is not allowed or file size is too big!");
			} else {
				move_uploaded_file($temp, "images/category/" . $name);
				echo "Upload Complete!";
			}
		}

		$categoryname = $_POST['categoryname'];
		mysqli_query($con, "INSERT INTO pcategories(categoryname, catimage) VALUES('$categoryname','$name')") or die(mysqli_error($con));
		echo " One record successfully added!";
	}
}
?>