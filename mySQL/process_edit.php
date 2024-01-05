<?php
	require("db_info.php");
	
	$connect = mysqli_connect($server, $username, $password, $db);
	
	$id = $_POST["id"];
	$firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
	
	$query = "UPDATE contacts SET firstName = '$firstName', lastName = '$lastName', email = '$email' WHERE id = '$id'";
	
	if(mysqli_query($connect, $query))
		echo "Updated Successfully";
	else
		echo "ERROR";
?>

<meta http-equiv="refresh" content="3; URL = 'index.php'">