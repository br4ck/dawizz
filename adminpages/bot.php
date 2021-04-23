<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index');
	exit;
}
if($_SESSION['name'] != 'test')
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
		<style>
		.contentuser {
    width: 400px;
    background-color: #ffffff;
    box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
    margin: 100px auto;
}

    .contentuser form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 20px;
    }

        .contentuser form label {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: #2c2f33;
            color: #ffffff;
        }

        .contentuser form input[type="text"] {
            width: 310px;
            height: 50px;
            border: 1px solid #dee0e4;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        .contentuser form input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #2c2f33;
            border: 0;
            cursor: pointer;
            font-weight: bold;
            color: #ffffff;
            transition: background-color 0.2s;
        }

            .contentuser form input[type="submit"]:hover {
                background-color: #23272a;
                transition: background-color 0.2s;
            }
		</style>
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
			<div class="contentuser">
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
			</div>
		</div>
	</body>
</html>