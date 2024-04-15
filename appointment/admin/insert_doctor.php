<?php
// Connection to the database
$servername = "localhost";
$db = 'hospital';
$user = 'root';
$password = '';

$conn = mysqli_connect($servername, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted and the required fields are not empty
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name']) && !empty($_POST['department']) && !empty($_POST['description'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $description = $_POST['description'];

    // Check if an image was uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "images/".$image;
        
        // Move the uploaded image to the desired directory
        move_uploaded_file($image_tmp, $image_path);
    } else {
       echo"<script> alert ('pls insert img');</script>";
    }

    // Use prepared statement to insert data
    $stmt = $conn->prepare("INSERT INTO doctors (Pic, Name, Department, Discription) VALUES (?, ?, ?, ?)");
    // Assuming 'User_id' and 'username' should be provided in the form, otherwise replace with appropriate values
    $stmt->bind_param("ssss", $image_path, $name, $department, $description);

    if ($stmt->execute()) {
        echo "Doctor added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please fill all required fields.";
}

$conn->close();
?>
