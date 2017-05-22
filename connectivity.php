<?php

//define constants
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cforms";

//create & check database connection
$conn = new mysqli($servername,$username,$password);

if (mysqli_connect_error()) {
	die("Database connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";

//selecting database
$db = mysqli_select_db($conn,$dbname) or die("Failed to connect to MySQL: " . mysqli_connect_error());



//adding records to database
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_num = $_POST['contact_num'];
$email_add = $_POST['email_add'];
$message_box = $_POST['message_box'];

//setting up and running query

$query = "INSERT INTO cforms_table(FirstName, LastName, ContactNum, EmailAddress, Message) VALUES('$first_name', '$last_name', '$contact_num', '$email_add', '$message_box')";

if ($conn->query($query) === TRUE) {
	echo "You have succesfully updated the database!";
}
else {
	echo "Error: " . $query . "<br>" . $conn->error;
}

//stop connection
mysqli_close($conn);

?>