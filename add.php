<?php
include("connect.php");

if (empty($_COOKIE['user_id'])) {
	echo "<script language=\"javascript\"> alert('请先登陆');</script>";
	echo "<script language=\"javascript\"> window.location.href = \"login.php\";</script>";
}

if ($_POST['submit']) {
	date_default_timezone_set('PRC');
	$time = date('y:m:d h:i:s');
	$sql="INSERT INTO publish (publish_id,user_id,publish_name,publish_addr,publish_time)".
	"values ('','{$_COOKIE['user_id']}','{$_POST['publish_name']}','{$_POST['publish_addr']}','{$time}')";
	$res = mysql_query($sql);
	if (!$res) {
		echo "<script language=\"javascript\"> alert('添加失败');</script>";
		echo "<script language=\"javascript\"> window.location.href = \"add.php\";</script>";
	}
	//echo "<script language=\"javascript\"> alert('添加成功');</script>";
	echo "<script language=\"javascript\"> window.location.href = \"list.php\";</script>";
}
include("head.php");
?>
<form action="add.php" name="add" method="post" onsubmit="return CheckPost();">
	标题：<input type="text" name="publish_name"><br/><br/>
	地址：<input type="text" name="publish_addr"><br/><br/>

	<input type="submit" name="submit" value="提交">
</form>

<script language="javascript">
function CheckPost(){
	if (add.user_name.value=="") {
		alert("请输入用户名");
		add.user.focus();
		return false;
	};
	if (add.title.value.length < 3 || add.title.value.length > 10) {
		alert("标题长度为3到10个字");
		add.title.focus();
		return false;
	};
	if (add.review.value.length == "") {
		alert("发送内容不能为空");
		add.user.focus();
		return false;
	};
}
</script>