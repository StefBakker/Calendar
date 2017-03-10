<?php
	// connect with servername, username, password, databasename
	$connection = new mysqli('localhost','root','','calendar');
	
	// prepare query to select all data from the table books
	$sql = "SELECT * FROM birthdays";
	
	// execute the query 
	$result = $connection->query($sql);
	
	// fetch all selected books to store in variable: booksList
	$birthdays = $result->fetch_all(MYSQLI_ASSOC);
	
?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<!-- Header text "Calender" -->
	<div class="header">Calendar</div>
	<div>
			<table border="2" bgcolor="white" bordercolor="black" id="list" class="container">
		<?php 
			include('add.php');
			// repeat for each birthday in birthdays
			foreach($birthdays as $birthday){
		?>

		<?php 
		// Month numbers to orginal Month name
		$monthNum  = $birthday['month'];
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F'); // March
		?>

		<!-- The list with all the birthdays displayed -->
			<h2><?php echo $monthName; ?></h2>
				<p><?php echo $birthday['name']; ?></p>
				<p><?php echo $birthday['day']; ?></p>
				<p><?php echo $birthday['year']; ?></p>
				<p><a href="edit.php?id=<?php echo $birthday['id']; ?>">Edit</a></p>
				<p><a href="delete.php?id=<?php echo $birthday['id']; ?>">Delete</a></p>

		<?php																			
			} // end foreach
		?>
			</table>
			<a href="add.php">Add More</a>
	</div>
</body>
</html>