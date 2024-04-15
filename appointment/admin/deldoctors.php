<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel= "stylesheet" type="text/css"href="admin.css">
    <link rel= "stylesheet" type="text/css"href="cards.css">
</head>
<body>
    <header>
    <div class="display-card">
        <?php
        $servername = "localhost";
        $host = 'localhost';
        $db = 'hospital';
        $user = 'root';
        $password = '';

        $conn = mysqli_connect($host, $user, $password, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve doctors data from the database
        $query = "SELECT * FROM doctors";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card">';
                echo '<img src="' . $row['Pic'] . '" alt="' . $row['Name'] . '">';
                echo '<div class="card-content">';
                echo '<p class="name"> ' . $row['Name'] . '</p>';
                echo '<p class="department"> Department: ' . $row['Department'] . '</p>';
                echo '<p class="description">' . $row['Description'] . '</p>';
                echo '<form method="post" action="delete_doctor.php">';
                echo '<input type="hidden" name="doctor_id" value="' . $row['ID'] . '">';
                echo '<input type="submit" name="delete_doctor" value="Delete" onclick="return confirmDeletion()">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No doctors found.";
        }

        mysqli_close($conn);
        ?>
        <script>
            function confirmDeletion() {
                return confirm("Are you sure you want to delete this doctor?");
            }
        </script>
    </div>
</body>
</html>