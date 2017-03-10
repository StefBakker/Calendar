<?php
	// connect with servername, username, password, databasename
	$connection = new mysqli('localhost','root','','calendar');

	// prepare id and values to be updated in table books in database
	$id = $_POST['id'];
	$name = $_POST['name'];
	
	// prepare update instruction
	$sql = "UPDATE birthdays SET name = '$name', month = '$month', day = '$day', year = '$year' WHERE id = $id";
	
	// execute update instruction
	$connection->query($sql);

	header('Location: main.php');
?>