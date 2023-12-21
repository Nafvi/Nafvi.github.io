<?php


function sendMail($to,$title,$content){
    require_once("class.phpmailer.php");
    require_once("class.smtp.php");
    $mail = new PHPMailer();
    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->Host = 'smtp.gmail.com';
    // $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPSecure = 'tsl';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    $mail->FromName = 'Lovejoy';
    // $mail->Username ='naf7vichen@outlook.com';
    $mail->Username ='wallacewfm@gmail.com';
    // $mail->Password = 'My991129';//
    $mail->Password = 'cljkoniwtqibukkz';
    // $mail->From = 'naf7vichen@outlook.com';//
    $mail->From = 'wallacewfm@gmail.com';//
    $mail->isHTML(true);
    $mail->addAddress($to);
    $mail->Subject = $title;
    $mail->Body = $content;
    
    if($mail->send()) {
        return true;
    }else{
        echo $mail->ErrorInfo;
        return false;
    }
}
?>