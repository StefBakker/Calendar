<!DOCTYPE html>
<html>
<body>
<?php
	// connect with servername, username, password, databasename
	$connection = new mysqli('localhost','root','','calendar');	

	// prepare values to be inserted in table books in database
	$name = $_POST['name'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	// prepare insert instruction
	$sql = "insert into birthdays (name, day, month, year) values('$name','$day','$month','$year')";
	
	// execute insert instruction
	$connection->query($sql);

	header('Location: main.php');
?>
</body>
</html>