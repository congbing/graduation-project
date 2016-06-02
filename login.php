<?php
include("connect.php");

if (!empty($_POST['user_name']) && !empty($_POST['password'])) {
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	unset($_POST['user_name']);
	unset($_POST['password']);
	$sql = "SELECT user_id FROM user WHERE user_name='{$user_name}' AND password='{$password}'";
	echo $sql;
	$query = mysql_query($sql);
	$res = mysql_fetch_array($query);
	$user_id = $res['user_id'];
	var_dump($query);
	if (!$query) {
		echo "<script language=\"javascript\"> alert('用户不存在');</script>";
		echo "<script language=\"javascript\"> window.location.href=='login.php';</script>";
	}
	setcookie('user_name', $user_name);
	setcookie('user_id', $user_id);
	//setcookie('password', $password);
	echo "<script language=\"javascript\"> window.location.href = \"list.php\";</script>";
}

include("head.php");

?>

	<script language="javascript">
		function Checklogin(){
			if (login.user.value == "") {
				alert("请告诉我你是谁");
				login.user.focus();
				return false;
			};
			if (login.password.value.length < 6 ) {
				alert("请输入正确的密码");
				login.password.focus();
				return false;
			};
		}
	</script>

	<form action="login.php" method="post" name="login" onsubmit="return Checklogin();">
		用户名：<input type="text" name="user_name"><br/><br/>
		密码：<input type="password" name="password"><br/><br/>
		<input type="submit" name="submit" value="登陆">
	</form>