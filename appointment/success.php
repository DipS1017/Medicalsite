<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact</title>
  <!-- Include CSS stylesheets -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	include 'navbar.php'
	?>
	

  <main>
    
    <div id="contentToCapture">
      <section class="about">
        <h1>Submission Successful</h1>
        <p>Thank you for contacting us. We have received your message and will get back to you shortly.
        </p>

        <?php
          
          session_start();

          
          if(isset($_SESSION['appointment_details'])){
            echo '<h2>Appointment Information:</h2>';
            echo '<p>Name: ' . $_SESSION['appointment_details']['name'] . '</p>';
            echo '<p>Email: ' . $_SESSION['appointment_details']['email'] . '</p>';
            echo '<p>Phone: ' . $_SESSION['appointment_details']['phone'] . '</p>';
            echo '<p>Date: ' . $_SESSION['appointment_details']['date'] . '</p>';
            echo '<p>Time: ' . $_SESSION['appointment_details']['time'] . '</p>';
            echo '<p>Doctor: ' . $_SESSION['appointment_details']['doctor'] . '</p>';
            echo '<p>Message: ' . $_SESSION['appointment_details']['message'] . '</p>';
          }
        ?>

       
        <a id="downloadLink" download="appointment_screenshot.png" style="display: none;">Download screenshot</a>

        
        <div id="messageContainer">
          <p>Kindly download this image on your mobile device or print a hardcopy for reference on the day of your scheduled appointment. We greatly appreciate your cooperation and look forward to meeting you on the appointed date.</p>
        </div>
      </section>
    </div>
  </main>

  <?php
include 'footer.php';
?>
  </body>

  
  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
  

  <script>
    // screenshot function
    function takeScreenshot() {
      const content = document.getElementById("contentToCapture");
      const height = content.offsetHeight; 

      html2canvas(content, {
        height: height, 
      }).then(function(canvas) {
        
        const downloadLink = document.getElementById("downloadLink");
        downloadLink.style.display = "block";

        
        downloadLink.href = canvas.toDataURL();
      });
    }

   
    window.onload = takeScreenshot;
  </script>
</html>

