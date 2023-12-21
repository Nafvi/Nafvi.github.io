<?php
include_once('config.php');
if(empty($_SESSION['user'])){
	header('Location: index.html');
}
if($_SESSION['user']['usertype']==0){
	echo "<script>alert('Not Authorized');location = 'home.php'</script>";
	die();
		
}
$type = $_GET['t'];
$id = empty( $_GET['id'])?0: $_GET['id'];
$sql = "select * from message where id='$id'  limit 1";
$result = $con->query($sql);

if($result->num_rows<1){
	echo "<script>alert('No message found');location = 'message.php'</script>";
	die();
}
switch($type){
	case 'read':
	
		$message = $result->fetch_assoc();
		if($message['state']==1){
			echo "<script>alert('Already read');location = 'message.php'</script>";
			die();
		}
		 $sql = "update message set state=1 where id='$id'";
		
		$result = $con->query($sql);
		if($result){
			
			echo "<script>alert('Proceed');location = 'message.php'</script>";
			die();
		}else{
		
			echo "<script>alert('Failed');location = 'message.php'</script>";
			die();
			
		}
	break;
	case 'del':
		$sql = "delete from message where id='$id'";
		$result = $con->query($sql);
		if($result){
			
			echo "<script>alert('Proceed');location = 'message.php'</script>";
			die();
		}else{
		
			echo "<script>alert('Failed');location = 'message.php'</script>";
			die();
			
		}
	break;
}
?>