<?php
	// connect with servername, username, password, databasename
	$connection = new mysqli('localhost','root','','calendar');
	
	
	// prepare id from the url querystring to find the record
	$id = $_GET['id'];
	
	// prepare query to select data from the table birthdays for id 
	$sql = "SELECT * FROM birthdays WHERE id = $id";
	
	// execute the query 
	$result = $connection->query($sql);
	
	// fetch selected birthday to store in variable: birthday
	$birthdays = $result->fetch_assoc();
?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<form action="update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $birthdays['id']; ?>"><br>
		
		<label for="name">Name: </label>
		<input name="name" value="<?php echo $birthdays['name']; ?>"><br>

		<label for="month">Month: </label>
		<input name="month" value="<?php echo $birthdays['month']; ?>"><br>

		<label for="day">Day: </label>
		<input name="day" value="<?php echo $birthdays['day']; ?>"><br>

		<label for="year">Year: </label>
		<input name="year" value="<?php echo $birthdays['year']; ?>"><br>

		<input type="submit" name="submit" value="save">
	</form>
</body>
</html>