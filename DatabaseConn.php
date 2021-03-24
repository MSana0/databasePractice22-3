<!DOCTYPE html>
<html>
<head>
	<title>Database Connection</title>
</head>
<body>
	<h1>Database Connection</h1>
	<?php

	$host = "localhost";
	$username = "mydb_user_1";
	$password = "123";

	//Mysqli object-oriented
	$conn1 = new mysqli($host, $username, $password);
	$res1 = $conn1->connect_errno;

	//can also use "$conn1->connect_errno" in if condition instead of creating another vaariable containing it.

	/*if($res1){
		echo "1.Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else
	{
		echo "1.Database Connection Successful!...";
	}
	$conn1->close();

	*/

	//mysqli Procedural
	$conn2 = mysqli_connect($host, $username, $password);
	if (mysqli_connect_error()) {
		echo "2.Database Connection Failed!...";
		echo "<br>";
		echo mysqli_connect_error();
	}
	else{
		echo "2.Database Connection Successful!...";
	}
	mysqli_close($conn2);

	?>

</body>
</html>