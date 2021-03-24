<!DOCTYPE html>
<html>
<head>
	<title>Database insert</title>
</head>
<body>
	<h1>Database Insert</h1>
	<?php

	$host = "localhost";
	$username = "mydb_user_1";
	$password = "123";
	$dbname = "mydb";

	echo "Mysqli object-oriented";
	echo "<br>";
	$conn1 = new mysqli($host, $username, $password, $dbname);
	$res1 = $conn1->connect_errno;

	//can also use "$conn1->connect_errno" in if condition instead of creating another vaariable containing it.

	if($res1){
		echo "1.Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else
	{
		echo "1.Database Connection Successful!...";
/*
		$sql1 = "insert into users (username, password) values ('abc', 123)";
		if($conn1->query($sql1))
		{
			echo "Data Inserted Successfully!";
		}
		else 
		{
			echo "Failed to insert data.";
			echo "<br>";
			echo $conn1->error;
		}*/
		$stmt1 = $conn1->prepare("insert into users (username, password) value (?,?)");
		$stmt1->bind_param("ss", $p1, $p2);
		$p1 = "mno";
		$p2 = "789";

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
	echo "<br>";
	echo "Mysqli Procedural";
	echo "<br>";
	//mysqli Procedural
	$conn2 = mysqli_connect($host, $username, $password, $dbname);
	if (mysqli_connect_error()) {
		echo "2.Database Connection Failed!...";
		echo "<br>";
		echo mysqli_connect_error();
	}
	else{
		echo "2.Database Connection Successful!...";
/*
		$sql2 = "insert into users(username, password) values ('ghi',456)";
		if(mysqli_query($conn2, $sql2))
		{
			echo "Data Insert Successful!";
		}
		else
		{
			echo "Failed to insert data.";
			echo "<br>";
			echo $conn2->error;
		}
*/
		$stmt2 = mysqli_prepare($conn2, "insert into users (username, password) value (?,?)");
		mysqli_stmt_bind_param(
		$stmt2, "ss", $p3, $p4);
		$p3 = "pqr";
		$p4 = "111";
		$res = mysqli_stmt_execute($stmt2);

	if($res1){
		echo "Data Insert Successful!";
	}
	else
	{
		echo "Failed to insert data.";
			echo "<br>";
			echo $conn2->error;
	}}
	mysqli_close($conn2);

	?>

</body>
</html>