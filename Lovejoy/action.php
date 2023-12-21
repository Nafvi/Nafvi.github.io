<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


// include_once('config.php');
// if(empty($_SESSION['user'])){
// 	header('Location: index.html');
//  	exit; 
// }
// $action = $_POST['action'];
// switch($action){
//  	case 'message':
// 		$uid = $_SESSION['user']['id'];
// 		$content = $_POST['content'];
// 		$contact_type = $_POST['contact_type'];
// 		$addtime = date('Y-m-d H:i:s',time());
// 		$image = '';
// 		if($_FILES['image']['tmp_name']!=''){
// 			$image = uploadImage($_FILES);
// 		}
// 		$sql = "INSERT INTO message (`uid`, `content`, `addtime`, `contact_type`,`image`) VALUES ('$uid', '$content', '$addtime', '$contact_type', '$image') ";
// 		$result = $con->query($sql);
// 		if($result){
		
// 			echo "<script>alert('sent complete');location = 'home.php'</script>";
// 			die();
// 		}else{
		
// 			echo "<script>alert('sent fail');location = 'evaluation.php'</script>";
// 			die();
		
// 		}
  
//  	break;
 
// }

// function uploadImage($_FILES){
// 	$filename = $_FILES['image']['tmp_name'];
// 	$file = $_FILES['image']['name'];
// 	$file_type = substr(strrchr($file, '.'), 1);
// 	$file_name = time().rand(1000,9999).'.'.$file_type;
// 	$path = './upload/images/'.date("Ymd",time());
// 	if(!file_exists($path)){
// 		mkdir($path,0777,true);
// 	}
// 	$destination = $path.'/'. $file_name;
// 	move_uploaded_file($filename,$destination);
// 	return 'upload/images/'.date("Ymd",time()).'/'. $file_name;
// }


include_once('config.php');
if(empty($_SESSION['user'])){
header('Location: index.html');
	exit;	
}
$action = $_POST['action'];
switch($action){
	case 'message':
		$uid = $_SESSION['user']['id'];
		$content = $_POST['content'];
		$contact_type = $_POST['contact_type'];
		$addtime = date('Y-m-d H:i:s',time());
		$image = '';
		if($_FILES['image']['tmp_name']!=''){
			$image = uploadImage('image');
		}
		$sql = "INSERT INTO message (`uid`, `content`, `addtime`, `contact_type`,`image`) VALUES ('$uid', '$content', '$addtime', '$contact_type', '$image') ";
		$result = $con->query($sql);
		if($result){
			
			echo "<script>alert('sent complete');location = 'home.php'</script>";
			die();
		}else{
		
			echo "<script>alert('sent fail');location = 'evaluation.php'</script>";
			die();
			
		}
		
	break;
	
}
?>