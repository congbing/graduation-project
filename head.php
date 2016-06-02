<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf8">
	<title>在线直播</title>
</head>
<?php
	if (isset($_COOKIE['user_id'])) {
		$user_name = $_COOKIE['user_name'];
?>
		<b><a href="add.php">添加直播</a> | <a href="list.php">直播列表</a> | <span><?php echo $user_name?>欢迎您</span></b>
		<hr size="1">
<?php
	} else {
?>
		<b><a href="add.php">添加直播</a> | <a href="list.php">直播列表</a> | <a href="login.php">登陆</a> | <a href="register.php">注册</a></b>
		<hr size="1">
<?php
	}
?>