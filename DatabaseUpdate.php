<!DOCTYPE html>
<html>
<head>
	<title>Database Update</title>
</head>
<body>
	<h1>Database Update</h1>
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
		$stmt1 = $conn1->prepare("update users set password = ? where id = ?");
		$stmt1->bind_param("ss", $p1, $p2);
		$p1 = "222";
		$p2 = "8";

		$status = $stmt1->execute();
		if($status)
		{
			echo "Data Updated Successfully!";
		}
		else
		{
			echo "Failed to update data.";
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

		$stmt2 = mysqli_prepare($conn2, "update users set password = ? where id = ?");
		mysqli_stmt_bind_param(
		$stmt2, "ss", $p3, $p4);
		$p3 = "123";
		$p4 = "8";
		$res = mysqli_stmt_execute($stmt2);

	if($res1){
		echo "Data Updated Successfully!";
	}
	else
	{
		echo "Failed to update data.";
			echo "<br>";
			echo $conn2->error;
	}}
	mysqli_close($conn2);

	?>

</body>
</html>