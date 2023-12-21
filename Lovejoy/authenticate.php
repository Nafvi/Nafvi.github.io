<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('config.php');
if(!isset($_POST)){
	exit('Please fill both the username and password fields!');
}
$username = $_POST['username'];
$password = $_POST['password'];
if(empty($username)||empty($password)){
	exit('Please fill both the username and password fields!');
}
$password = md5(md5($password));
$sql = "select * from accounts where username='$username' and password='$password' limit 1";
$result = $con->query($sql);
if($result->num_rows<1){
	echo 'Incorrect username and/or password!';
}else{
	
	$user = $result->fetch_assoc(); 
	$_SESSION['user'] = $user;
	header('Location: home.php');
}
// if ( !isset($_POST['username'], $_POST['password']) ) {
// 	exit('Please fill both the username and password fields!');
// }
// if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
// 	$stmt->bind_param('s', $_POST['username']);
// 	$stmt->execute();
// 	$stmt->store_result();
// 	if ($stmt->num_rows > 0) {
// 		$stmt->bind_result($id, $password);
// 		$stmt->fetch();
// 		// Account exists, now we verify the password.
// 		// Note: remember to use password_hash in your registration file to store the hashed passwords.
// 		if (password_verify($_POST['password'], $password)) {
// 			// Verification success! User has logged-in!
// 			// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
// 			session_regenerate_id();
// 			$_SESSION['loggedin'] = TRUE;
// 			$_SESSION['name'] = $_POST['username'];
// 			$_SESSION['id'] = $id;
// 			header('Location: home.php');
// 		} else {
// 			// Incorrect password
// 			echo 'Incorrect username and/or password!';
// 		}
// 	} else {
// 		// Incorrect username
// 		echo 'Incorrect username and/or password!';
// 	}

// 	$stmt->close();
// }
?>