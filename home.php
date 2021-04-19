<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dashboard Page</title>
		<link href="main.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="profile"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Dashboard</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			<p>Bot Dashboard Made:
				<? 
				if(file_exists($_SESSION['name']))
				{
					echo 'Made!';
					echo '<p> Bot Dashboard Link: <button onclick="window.location.href='/$_SESSION['name']'">Continue</button></p>';
				}
				else
				{
					echo 'Not Made!';
				}
				?>
			
			</p>
		</div>
	</body>
</html>