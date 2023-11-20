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

// Check if contact ID is provided
if (!isset($_GET['id'])) {
    header("Location: admin panel.php");
    exit();
}

$contactId = $_GET['id'];

// Fetch contact data
$contactQuery = "SELECT * FROM contacts WHERE id = '$contactId'";
$contactResult = mysqli_query($conn, $contactQuery);
$contactData = mysqli_fetch_assoc($contactResult);

// Handle form submission for updating contact data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $updateContactQuery = "UPDATE contacts SET name = '$name', email = '$email', message = '$message' WHERE id = '$contactId'";
    mysqli_query($conn, $updateContactQuery);
    header("Location: admin panel.php");
    exit();
}

// Handle delete action for contact
// Handle delete action for contact
if (isset($_POST['delete'])) {
    $deleteContactQuery = "DELETE FROM contacts WHERE id = '$contactId'";
    mysqli_query($conn, $deleteContactQuery);
    header("Location: admin panel.php");
    exit();
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    <h2>Edit Contact</h2>
    <form method="POST" action="edit_contact.php?id=<?php echo $contactId; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $contactData['name']; ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $contactData['email']; ?>"><br><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message"><?php echo $contactData['message']; ?></textarea><br><br>

        <input type="submit" value="Update">
    </form>

    <br>

    <form method="POST" action="edit_contact.php?id=<?php echo $contactId; ?>">
        <input type="hidden" name="delete" value="1">
        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this contact?')">
    </form>
</body>
</html>
