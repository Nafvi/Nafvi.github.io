<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('config.php');

$email = $_GET['email'];

if(empty($email)){
	exit("Operation failed");
}
// require 'composer/vendor/autoload.php';
if(!empty($_POST)){

	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordtwo = $_POST['passwordtwo'];

	if($password != $passwordtwo){
		echo "<script language='javascript'>";
        echo "alert('Different input detected');";
        echo "window.history.go(-1)";
        echo "</script>";
        exit(); 
	}
	$sql = "SELECT * FROM accounts WHERE email = '$email'";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();  
		$editSql ="update accounts set password = '".md5(md5($password))."' where email = '".$email."'";
		$editResult = $con->query($editSql);
		echo "<script language='javascript'>";
        echo "alert('Operation success');";
        echo "window.location.href='index.html'";
        echo "</script>";
        exit();
	} else {  
		echo "<script language='javascript'>";
        echo "alert('No email found');";
        echo "window.history.go(-1)";
        echo "</script>";
        exit(); 
	}

}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reset Password</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="register">
			<h1>Reset Password</h1>
			<form action="" method="post" autocomplete="off">  
				<label for="username">  
					<i class="fa-solid fa-user"></i>  
				</label>  
				<input type="text" name="email" placeholder="email" id="email" value="<?php echo $email ?>" readonly>  
				<label for="password">  
					<i class="fa-solid fa-lock"></i>  
				</label>  
				<input type="password" name="password" placeholder="Password" id="password" required> 
				<p id="passwordStrengthMessage"></p> 
				<label for="email">  
					<i class="fa-solid fa-envelope"></i>  
				</label>  
				<input type="password" name="passwordtwo" placeholder="Confirm password" id="passwordtwo" required>  
			
				
				<input type="submit" value="Reset">  
			</form>  
			  
			
			<p style="text-align: center;">Already have an account, <a href="index.html">login</a></p>
		</div>
	</body>
	<script src="jquery.min.js"></script>
	<script>  
		document.getElementById('send_captcha').addEventListener('click', function() {  
			var email = document.getElementById('email').value;  
			 alert(email)
			$.ajax({  
				type: "POST",  
				url: "common.php?sj=login",  
				data: {email: email},
				success: function(response) {  
					if(response == '1'){
						alert('Email sent');
					}else{
						alert('Email sent fialed');
					}
				}
		});  
	})
	</script>
	<script>  
	var passwordInput = document.getElementById('password');  
	var passwordStrengthMessage = document.getElementById('passwordStrengthMessage');  
	  
	passwordInput.addEventListener('blur', function() {  
		var password = passwordInput.value;  
		var strength = checkPasswordStrength(password);  
		passwordStrengthMessage.textContent = strength;  
	});  
	  
	function checkPasswordStrength(password) {  
		var strength = '';  
		if (password.length < 6) {  
			strength = 'Password is too short.';  
		} else if (password.length > 7) {  
			strength = 'Password is strong.';  
		} else {  
			strength = 'Password is weak.';  
		}  
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {  
			strength += ' Passwords should have at least one uppercase and one lowercase letter.';  
		} else {  
			strength += ' Passwords should have at least one uppercase and one lowercase letter.';  
		}  
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {  
			strength += ' Passwords should have at least one number and one letter.';  
		} else {  
			strength += ' Passwords should have at least one number and one letter.';  
		}  
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {  
			strength += ' Passwords should have at least one special character.';  
		} else {  
			strength += ' Passwords should have at least one special character.';  
		}  
		return strength;  
	}  
	</script>  
</html>


