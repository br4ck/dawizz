<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index');
	exit;
}
if($_SESSION['name'] != 'main')
{
	header('Location: ../index');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Dashboard Page</title>
		<link href="main.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Dawizz Nuking Dashboard</h1>
				<?
					if($_SESSION['name'] == 'test')
					{
						echo '<a href="admin"><i class="fas fa-user-shield"></i> Admin Panel</a>';
					}
				?>
				<a href="home"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="../logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Dashboard</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			<p>
				<? 
				if(file_exists($_SESSION['name']))
				{
					$_SESSION['adminprocess'] = 'botadmin';
					echo '<form action="authenticate" method="post">
							<label for="username">
								<i class="fas fa-user"></i>
							</label>
							<input type="text" name="username" placeholder="Username" id="username" required>
							<input type="submit" value="Submit User Bot">
						  </form>';
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