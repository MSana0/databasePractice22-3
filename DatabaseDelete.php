<!DOCTYPE html>
<html>
<head>
	<title>Database Delete</title>
</head>
<body>
	<h1>Database Delete</h1>
	<?php

	$host = "localhost";
	$username = "mydb_user_1";
	$password = "123";
	$dbname = "mydb";

	echo "Mysqli object-oriented";
	echo "<br>";
	$conn1 = new mysqli($host, $username, $password, $dbname);
	$res1 = $conn1->connect_errno;
	if($res1){
		echo "1.Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else
	{
		echo "1.Database Connection Successful!...";
/*
		$stmt1 = $conn1->prepare("delete from users where id = ?");
		$stmt1->bind_param("i", $p1);
		$p1 = "1";

		$status = $stmt1->execute();
		if($status)
		{
			echo "Data Deleted Successfully!";
		}
		else
		{
			echo "Failed to delete data.";
			echo "<br>";
			echo $conn1->error;
		}*/
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

		$stmt2 = mysqli_prepare($conn2, "Delete from users where id = ?");
		mysqli_stmt_bind_param(
		$stmt2, "i", $p2);
		$p2 = "8";
		$res = mysqli_stmt_execute($stmt2);

	if($res1){
		echo "Data Deleted Successfully!";
	}
	else
	{
		echo "Failed to delete data.";
			echo "<br>";
			echo $conn2->error;
	}}
	mysqli_close($conn2);

	?>

</body>
</html>