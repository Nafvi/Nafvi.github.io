<?php
session_start();
header("Content-Type:text/html;charset=utf-8");	
error_reporting(7);
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Lovejoy';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

function uploadImage($image){
	$filename = $_FILES[$image]['tmp_name'];
	$file = $_FILES[$image]['name'];
	$file_type = substr(strrchr($file, '.'), 1);
	$file_name = time().rand(1000,9999).'.'.$file_type;
	$path = getcwd() . '/upload/images/'.date("Ymd",time());
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	$destination = $path.'/'. $file_name;
	move_uploaded_file($filename,$destination);
	// echo $filename;
	// die();
	return 'upload/images/'.date("Ymd",time()).'/'. $file_name ;
}


?>