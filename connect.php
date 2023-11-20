<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, doctor, date, time, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $fullname, $email, $phone, $doctor, $date, $time, $message);


$fullname = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$doctor = $_POST["doctor"];
$date = $_POST["date"];
$time = $_POST["time"];
$message = $_POST["message"];
$stmt->execute();


$stmt->close();
$conn->close();


$_SESSION['appointment_details'] = array(
    'name' => $fullname,
    'email' => $email,
    'phone' => $phone,
    'doctor' => $doctor,
    'date' => $date,
    'time' => $time,
    'message' => $message
);  


header("Location: success.php");
exit();
?>
