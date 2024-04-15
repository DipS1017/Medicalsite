<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";


$conn = new mysqli($servername, $username, $password, $dbname);

// Checking
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert form data into the database
$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
   
    header("Location: success1.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
