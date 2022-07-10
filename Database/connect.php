<?php
	$Name = $_POST['Name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','collection');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into collection(Name, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $Name, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Subscribed";
		$stmt->close();
		$conn->close();
	}
?>