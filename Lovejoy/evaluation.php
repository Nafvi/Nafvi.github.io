<?php
include_once('config.php');
if(empty($_SESSION['user'])){
header('Location: index.html');
	exit;	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Request Evaluation</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<style>
			ul,li{ list-style-type: none;}
			.message li{ margin-bottom: 30px;;}
			message li textarea{ resize: none;}
		</style>
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<a href="home.php"><h1>Lovejoy</h1></a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Request Evaluation</h2>
			<form action="action.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="message" />
				<ul class="message">
					<li><label>Image:</label><input type="file" name="image"></li>
					<li><label>Content:</label><textarea rows="8" cols="100" name="content"></textarea></li>
					<li><label>Contact Method:</label>
							<select name="contact_type">
								<option value="email">email</option>
								<option value="contact_number">phone</option>
							</select>
					</li>
					<li><button type="submit">submit</button></li>
				</ul>
			</form>
		</div>
	</body>
</html>