<?php
if(isset($_POST['delete_doctor'])) {
    $servername = "localhost";
    $host = 'localhost';
    $db = 'hospital';
    $user = 'root';
    $password = '';

    $conn = mysqli_connect($host, $user, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $deleteId = $_POST['doctor_id'];
    $deleteQuery = "DELETE FROM doctors WHERE ID = '$deleteId'";
    
    if(mysqli_query($conn, $deleteQuery)) {
        // Redirect back to Admin Panel.php after deletion
        header("Location: deldoctors.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
