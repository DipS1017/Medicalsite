<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Prime Hospital - Your Trusted Healthcare Provider</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
</head>
<body>
<?php
	include 'navbar.php'
	?>
	

  <main>
    <section class="appointment">
      <h2>Book an Appointment</h2>
      <form action="connect.php" method="post" onsubmit="return validateForm();">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required pattern="[A-Za-z ]+"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required><br>

        <label for="doctor">Doctor:</label>
        <select id="doctor" name="doctor">
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

          $query = "SELECT Name FROM doctors";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
              }
          } else {
              echo "<option value=''>No doctors available</option>";
          }

          mysqli_close($conn);
          ?>
        </select><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea><br>

        <button type="submit" name="submit">Submit</button>
      </form>
    </section>
  </main>

  <?php
include 'footer.php';
?>
  </body>

  <script>
    function validateForm() {
      const phoneNumberInput = document.getElementById('phone');
      const phoneNumber = phoneNumberInput.value;

      const numericPhoneNumber = phoneNumber.replace(/\D/g, '');

      if (numericPhoneNumber.length !== 10) {
        alert('Phone number must be exactly 10 digits long.');
        return false; 
      }
      
      return true;
    }

    const urlParams = new URLSearchParams(window.location.search);
    const selectedDoctor = urlParams.get('doctor');
  
    const doctorSelect = document.getElementById('doctor');
    if (selectedDoctor) {
      doctorSelect.value = selectedDoctor;
    }
  </script>
</html>
