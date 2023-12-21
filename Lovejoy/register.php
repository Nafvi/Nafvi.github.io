<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'composer/vendor/autoload.php';


include_once('config.php');
if(!isset($_POST)){
	exit('Please complete the registration form!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$captcha = $_POST['captcha'];


if(empty($username)||empty($password)||empty($email)||empty($contact_number)){
	exit('Please complete the registration form!');
}

if($captcha != $_SESSION['code']){
	exit('Captcha is not correct!');
}


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}
if (strlen($_POST['contact_number']) > 20 || strlen($_POST['contact_number']) < 5) {
	exit('Contact number must be between 5 and 20 characters long!');
}

$password = md5(md5($password));


$sql = "INSERT INTO accounts (`username`, `password`, `email`, `contact_number`,`activation_code`) VALUES ('$username', '$password', '$email', '$contact_number', '0000') ";
$result = $con->query($sql);
if($result){
	echo 'Registration complete! You can now <a href="index.html">login</a>';
}else{
	echo 'Could not complete registration';
}

?>