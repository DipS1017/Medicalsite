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
		<li><a href="#">Doctors</a></li>
			
		</ul>
		  </nav>
		
	</header>
<body>
    <h2>Add Doctor</h2>
    <form action="insert_doctor.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name">
        </p>        
        <p>
            <label for="department">Department</label> <br>
            <input type="text" id="department" name="department">
        </p>
        <p>
            <label for="description">Description</label><br>
            <input type="text" id="description"  name="description">
        </p>
        <p>
            <label>Image</label><br>
            <input type="file" name="image" accept="image/*">
        </p>
        <input type="submit" value="Add Doctor">
    </form>
</body>
</html>
