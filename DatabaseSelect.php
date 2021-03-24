<!DOCTYPE html>
<html>
<head>
	<title>Database Select</title>
</head>
<body>
	<h1>Database Select</h1>
	<?php

	$host = "localhost";
	$username = "mydb_user_1";
	$password = "123";
	$dbname = "mydb";

	echo "Mysqli object-oriented";
	echo "<br>";
	$conn1 = new mysqli($host, $username, $password, $dbname);
	

	if($conn1->connect_errno){
		echo "1.Database Connection Failed!...";
		echo "<br>";
		echo $conn1->connect_error;
	}
	else
	{
		echo "1.Database Connection Successful!...";
		echo "<br>";

		$sql = "select id, username, password from users";
		$res1 = $conn1->query($sql);
		if($res1->num_rows>0)
		{
			while ($row = $res1->fetch_assoc()) {
				echo "id: ".$row['id'];
				echo "<br>";
				echo "username: ".$row['username'];
				echo "<br>";
				echo "password: ".$row['password'];
				echo "<br>";
			}
		}

		$stmt1 = $conn1->prepare("select id, username, password from users where id = ?");
		$stmt1->bind_param("i", $p1);
		$p1 = "6";
		$stmt1->execute();
		$res2 = $stmt1->get_result();
		$user = $res2->fetch_assoc();

		echo "<br>";
		echo "<br>";
		echo "id: ".$user['id'];
		echo "<br>";
		echo "username: ".$user['username'];
		echo "<br>";
		echo "password: ".$user['password'];
		echo "<br>";
	}
	$conn1->close();
	?>

</body>
</html>