<?php
include_once('config.php');
if(empty($_SESSION['user'])){
	header('Location: index.html');
}
if($_SESSION['user']['usertype']==0){
	echo "<script>alert('Not Authorized');location = 'home.php'</script>";
	die();
		
}

	$page = empty($_GET['page'])?1:$_GET['page'];
	$keyword = empty($_GET['keyword'])?0:$_GET['keyword'];
	$where = "m.id >0 ";
	if(!empty($keyword)){
		$where .=" and (username like '%$keyword%' or content like '%$keyword%' or email like '%$keyword%' or contact_number like '%$keyword%' )";
	}
	$sql = "select m.*,a.username,a.contact_number,a.email from  message as m inner join accounts as a on a.id=m.uid where $where order by m.id desc  ";
	$result = $con->query($sql);
	$count = $result->num_rows;
	$page_size = 5;
	$pages = ceil($count/$page_size);
	$prev_page = ($page-1)<1?1:$page-1;
	$next_page = ($page+1)>$pages?$pages:$page+1;
	$offset = ($page-1)*$page_size;
	$sql = "select m.*,a.username,a.contact_number,a.email from  message as m inner join accounts as a on a.id=m.uid where $where order by m.id desc limit $offset,$page_size ";
	$result = $con->query($sql);
	$list = [];
	while($row = $result->fetch_assoc()){
		$list[] = $row;
	}


// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: index.html');
// 	exit;
// }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Requests</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<style>
			ul,li,ol{ list-style-type: none;}
			a{ text-decoration: none;color: #000;}
			.t{ width: 100%;  margin: auto; border-collapse: collapse;}
			.t th{border: #ccc solid 1px; padding: 10px 0px; background-color: #000000; color: #fff; font-size: 16px;;}
			.t td{border: #ccc solid 1px;; text-align: center; padding: 10px 0px;}
			.t td a{ padding: 3px 5px; background-color: #008000; color: #fff; margin-right: 5px;}
			.t td a:last-child{ background-color: #f00;}
			.t tr:hover{ background-color: #fee;}
			.t tr:nth-child(even){ background-color: #FFE4C4;}
			.page{ text-align: center; margin-bottom: 30px; margin-top: 30px;;}
			.page a{ display: inline-block; padding: 3px 5px; background-color: #FF6129; color: #fff; margin-right: 8px;;}
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
			<h2>Requests</h2>
			<div>
				<form method="get" action="message.php">
					<input type="text" name="keyword" />
					<button>Search</button>
				</form>
			</div>
			<table class="t">
				<tr>
					<th>id</th>
					<th>username</th>
					<th>email</th>
					<th>contact_number</th>
					<th>content</th>
					<th>image</th>
					<th>contact_type</th>
					<th>addtime</th>
					<th>state</th>
					<th>action</th>
				</tr>
				<?php if(empty($list)) echo '<tr><td colspan="10">No message</td></tr>'; ?>
				<?php foreach($list as $key=>$val): ?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $val['username']; ?></td>
					<td><?php echo $val['email']; ?></td>
					<td><?php echo $val['contact_number']; ?></td>
					<td><?php echo $val['content']; ?></td>
					<td>
						<?php if(!empty($val['image'])): ?>
						<img src="<?php echo $val['image']; ?>" height="180">
						<?php endif;?>
					</td>
					<td><?php echo $val['contact_type']; ?></td>
					<td><?php echo $val['addtime']; ?></td>
					<td><?php echo $val['state']?'Read':'Unread'; ?></td>
					<td>
						<a href="ajax.php?t=read&id=<?php echo $val['id'] ?>">Read</a>
						<br>
						<a href="ajax.php?t=del&id=<?php echo $val['id'] ?>">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			<div class="page">
				<a href="message.php?keyword=<?php echo $keyword; ?>&page=1">first page</a>
				<a href="message.php?keyword=<?php echo $keyword; ?>&page=<?php echo $prev_page ?>">prev page</a>
				<a href="message.php?keyword=<?php echo $keyword; ?>&page=<?php echo $next_page ?>">next page</a>
				<a href="message.php?keyword=<?php echo $keyword; ?>&page=<?php echo $pages ?>">last page</a>
			</div>
		</div>
	</body>
</html>