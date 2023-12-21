<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type:text/html;charset=utf-8");
session_start();

include_once "mail/functions.php";


if(empty($_POST['email'])){
    echo   '-2';
    exit();
}

if($_GET['sj'] =='login'){
    $to =$_POST['email'];

    $title="[LOVEJOY] Verification Code";
    //kjvfxkrbojgiieca shouquanma
    $randomNumber = rand(1000, 9999);  

    $_SESSION['code'] = $randomNumber;
    $content ="Your verification code is: ".$randomNumber;

    $send = sendMail($to,$title,$content);

    if($send){

        echo '1';
    }else{
        echo '-1';
    }
}

if($_GET['sj'] =='reset'){
    echo 000;

    $to =$_POST['email'];

    $title="[LOVEJOY] Password Reset";
    //kjvfxkrbojgiieca shouquanma
    $url= 'localhost/Lovejoy/reset.php?email='.$_POST['email'];
    $content ="<a href='".$url."'>Reset Password</a>";
    $send = sendMail($to,$title,$content);
    if($send){
        echo "<script language='javascript'>";
        echo "alert('Sent');";
        echo "window.history.go(-1)";
        echo "</script>";
        exit(); 
    }else{
        
        // echo "<script language='javascript'>";
        //     echo "alert('Failed');";
        //     echo "window.history.go(-1)";
        //     echo "</script>";
            // exit();
    }


}