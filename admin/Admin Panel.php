<?php
session_start();


$host = 'localhost';
$db = 'hospital';
$user = 'root';
$password = '';

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//take appointments data
$appointmentsQuery = "SELECT * FROM appointments";
$appointmentsResult = mysqli_query($conn, $appointmentsQuery);

//take contacts data
$contactsQuery = "SELECT * FROM contacts";
$contactsResult = mysqli_query($conn, $contactsQuery);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
   
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
<header>
    <nav>
            <ul class="nav-bar">
		<li><a href="Admin Panel.php">Appointments</a></li>
		<li><a href="doctors.php">Doctors</a></li>
			
		</ul>
		  </nav>
		
	</header>

    <h2>Appointments</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($appointmentsResult)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td><?php echo $row['Doctor']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['Time']; ?></td>
                <td><?php echo $row['Message']; ?></td>
                <td>
                    <a href="edit_appointment.php?id=<?php echo $row['id']; ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2>Contacts</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($contactsResult)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                    <a href="edit_contact.php?id=<?php echo $row['id']; ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
