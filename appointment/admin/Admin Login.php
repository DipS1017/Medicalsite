<?php

$host = 'localhost';
$db = 'hospital';
$user = 'root';
$password = '';

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['login'])) {
    //username and password from the form
    $AdminName = $_POST['AdminName'];
    $AdminPassword= $_POST['AdminPassword'];

    // Query for checking 
    $query = "SELECT * FROM `admin_login` WHERE `Admin_Name`='$AdminName' AND `Admin_Password`='$AdminPassword'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
       
        header("Location: admin panel.php");
        exit();
    } else {
        
        $error = "Invalid username or password";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="login-form">
        <h2>Admin Login</h2>
        <form method="POST">
            <div class="input-field">
            <i class="bi bi-person-circle"></i>
                
                <input type="text" placeholder="Username" name="AdminName" required>
            </div>
            <div class="input-field">
            <i class="bi bi-shield-lock"></i>
                
                <input type="password" placeholder="Password" name="AdminPassword" required>
            </div>
            <div class="error"><?php if (isset($error)) echo $error; ?></div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
