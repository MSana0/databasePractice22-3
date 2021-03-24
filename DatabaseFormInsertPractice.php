<!DOCTYPE html>
<html>
<head>
	<title>Database Login Insert</title>
</head>
<body>
	<h1>Database Login Insert</h1>
	<?php

	$host = "localhost";
	$username = "mydb1_user_1";
	$password = "123";
	$dbname = "mydb1";

	echo "Mysqli object-oriented";
	echo "<br>";

	$conn1 = new mysqli($host, $username, $password, $dbname);
	if($conn1->connect_error){
		echo "1.Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else
	{
		echo "1.Database Connection Successful!...";
		$sql1 = "insert into users (username, password) values ('abc', '123')";
		$stmt1 = $conn1->prepare("insert into users (username, password) values (?,?)");
		$stmt1->bind_param("ss", $p1, $p2);
		$p1 = $_POST['username'];
		$p2 = $_POST['password'];

		$status = $stmt1->execute();
		if($status)
		{
			echo "Data Inserted Successfully!";
		}
		else
		{
			echo "Failed to insert data.";
			echo "<br>";
			echo $conn1->error;
		}
	}
	$conn1->close();
	
	?>
</body>
</html>