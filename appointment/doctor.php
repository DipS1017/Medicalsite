<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Prime Hospital - Your Trusted Healthcare Provider</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="card.css">
</head>
<body>
	<div class="container">

	<?php
	include 'navbar.php'
	?>
	
	<div class="display-card">

			
			<?php
		// Connection to the database
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
				echo '<p class="description">' . $row['Discription'] . '</p>';
				$doctorName = urlencode($row['Name']);
				echo '<div class="apt-btn"><a href="appointment.php?doctor=' . $doctorName . '">Book an Appointment</a></div>';
				echo '</div>'; 
				echo '</div>'; 
			}
		} else {
			echo "No doctors found.";
		}
		
		mysqli_close($conn);
		?>
		</div>
	</div>
	<?php
include 'footer.php';
?>
</body>
</html>
