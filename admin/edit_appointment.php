<?php
session_start();

// Connection to the database
$host = 'localhost';
$db = 'hospital';
$user = 'root';
$password = '';

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch appointment data
    $appointmentQuery = "SELECT * FROM appointments WHERE id = '$id'";
    $appointmentResult = mysqli_query($conn, $appointmentQuery);
    $appointmentData = mysqli_fetch_assoc($appointmentResult);

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $message = $_POST['message'];

        
        $updateQuery = "UPDATE appointments SET Name = '$name', Email = '$email', Phone = '$phone', Doctor = '$doctor', Date = '$date', Time = '$time', Message = '$message' WHERE id = '$id'";
        mysqli_query($conn, $updateQuery);

        header("Location: admin panel.php");
        exit();
    }
} else {
    
    header("Location: admin panel.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
   
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    <h2>Edit Appointment</h2>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $appointmentData['Name']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $appointmentData['Email']; ?>" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $appointmentData['Phone']; ?>" required><br>

        <label for="doctor">Doctor:</label>
        <input type="text" id="doctor" name="doctor" value="<?php echo $appointmentData['Doctor']; ?>" required><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $appointmentData['Date']; ?>" required><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="<?php echo $appointmentData['Time']; ?>" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required><?php echo $appointmentData['Message']; ?></textarea><br>

        <input type="submit" value="Update">
    </form>
    
    <form method="POST" action="">
        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
    </form>
</body>
</html>
