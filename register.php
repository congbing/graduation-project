<?php 
include("connect.php");

if(!empty($_POST['user_name']) && !empty($_POST['password'])){
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$sql = "INSERT INTO `user`(`user_id`, `user_name`, `password`, `create_time`) VALUES ('', '{$user_name}','{$password}',now())";
	$reg = mysql_query($sql);
	
	//setcookie("cookie","ok");
	echo "<script language=\"javascript\"> window.location.href = \"login.php\";</script>";
	//echo "<script language=\"javascript\"> window.location.href = \"list.php\";</script>";
}
include("head.php");

//if ($_COOKIE['cookie'] != 'ok') {
?>
	<script language="javascript">
		function Checkreg(){
			if (register.user.value == "") {
				alert("你需要一个称呼");
				register.user.focus();
				return false;
			};
			if (register.password.value.length < 6 ) {
				alert("请输入正确的密码");
				register.password.focus();
				return false;
			};
		}
	</script>
	<form action="register.php" method="post" name="register" onsubmit="return Checkreg();">
		用户名：<input type="text" name="user_name"><br/><br/>
		密码：<input type="password" name="password"><br/><br/>
		<input type="submit" name="submit" value="注册">
	</form>
