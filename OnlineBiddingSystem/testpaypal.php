<?php
session_start();
$_SESSION['logged'] = "active";
$item_number = $_SESSION['ID'];

// Assuming you already have an active MySQLi connection object named $mysqli

// Prepare and bind the update statement
$updateStmt = $mysqli->prepare("UPDATE member SET verification = 'yes' WHERE memberid = ?");
$updateStmt->bind_param("s", $item_number);

// Execute the update statement
if ($updateStmt->execute()) {
	// Update successful
	header("location: myaccount.php");
	exit();
} else {
	// Update failed
	echo "Error updating member: " . $mysqli->error;
}

// Close the prepared statement
$updateStmt->close();
?>


<input type="text" value="type something" />

<script>
	$('input').bind('blur', function () {

		$(this).val(function (i, val) {
			alert($(this).val());

		});

	});
//value = $("#txt_name").val();

//value = $("#txt_name").attr('value')
</script>