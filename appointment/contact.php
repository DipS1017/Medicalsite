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
  <section class="contact">
    <form action="contacts.php" method="post">
    <h2>Contact Us</h2>
    <p>If you have any questions or would like to schedule an appointment, please don't hesitate to contact us.</p>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Send Message</button>
    </form>
    
</section>
  </main>

  <?php
include 'footer.php';
?>
  </body>
</html>
  
