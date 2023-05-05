
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Home Page</title>
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		.header {
			background-color: #333;
			color: #fff;
			padding: 20px;
			text-align: center;
		}

		.logo img {
			height: 50px;
			width: 50px;
			vertical-align: middle;
		}

		.add-student-btn {
			display: block;
			margin: 20px auto;
			padding: 10px 20px;
			background-color: #333;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		.add-student-btn:hover {
			background-color: #666;
		}

		nav {
			background-color: #333;
			color: #fff;
			padding: 10px;
		}

		nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		nav ul li {
			margin-right: 20px;
		}

		nav ul li:last-child {
			margin-right: 0;
		}

		nav ul li a {
			color: #fff;
			text-decoration: none;
			font-weight: bold;
			font-size: 18px;
			padding: 10px;
			transition: all 0.3s ease-in-out;
		}

		nav ul li a:hover {
			background-color: #666;
		}
	</style>
</head>
<body>
	<?php
		include("_includes/config.inc");
		include("_includes/dbconnect.inc");
		include("_includes/functions.inc");

		// Check if the user is logged in
		if (isset($_SESSION['id'])) {
			// Get the username from a session variable or database query
			$username = "John Doe";

			// Create a dynamic welcome message
			$welcome_message = "Welcome, " . $username . "!";

			$data['content'] = "<p> $welcome_message </p>";
		} else {
			if (isset($_GET['return'])) {
				$msg = "";
				if ($_GET['return'] == "fail") {
					$msg = "Login Failed. Please try again.";
				}
				$data['message'] = "<p>$msg</p>";
			}
		}

		echo template("templates/partials/header.php");
     
	?>

	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="addstudent.php">Add Student</a></li>
			<li><a class="nav-link" href="modules.php">My Modules</a></li>
         <li><a class="nav-link" href="details.php"> My Details</a></li>
         <li><a class="nav-link" href="student.php">Existing Student</a></li>
         <li><a class="nav-link" href="addstudent.php">Add New Student</a></li>
         <li><a class="nav-link" href="studentdelete.php">Delate existing Record</a></li>
         <li><a class="nav-link" href="Logout.php">Logout</a></li>
		</ul>
	</nav>

	<div class="header">
		
		</div>
		<h1>Dashboard Home Page</h1>
	</div>

	<div class="content">
		<a href="addstudent.php" class="add-student-btn">Add Student</a>
	</div>

	<!-- Include CSS and JS files here -->
	
		
