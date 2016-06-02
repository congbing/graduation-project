<?php
include("connect.php");
header("Content-Type: text/html; charset=utf8");
include("head.php");
?>

<?php
$pagesize=5;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url['path'];

$numq=mysql_query("SELECT u.user_name,p.publish_name,p.publish_addr,p.publish_time FROM user AS u INNER JOIN publish AS p ON u.user_id=p.user_id ORDER BY p.publish_time DESC");
//var_dump($numq);
$num=mysql_num_rows($numq);

if (isset($_GET['page'])) {
	$pageval=$_GET['page'];
	$page=($pageval-1)*$pagesize;
	$page.=',';
}

if ($num > $pagesize) {
	if ($pageval <= 0)
		$pageval=1;
	echo "共 $num 条"."<a href=$url?page=".($pageval-1).">上一页></a><a href=$url?page=".($pageval+1).">下一页</a>";
}
?>
<table>
<tr><th>用户</th><th>直播名</th><th>直播地址</th><th>发布时间</th></tr>
<?php
while ($row = mysql_fetch_array($numq)) {
	//echo "<hr><b>".$row['user_name']." | ".$row['publish_addr']." | ".$row['publish_time']."</b>";
	$publish_time = $row['publish_time'];
	$addr = $row['publish_addr'];
	//$publish_time = date('y-m-d h:i:s', $publish_time);
	echo "<tr><td>".$row['user_name']."</td><td>".$row['publish_name']."</td><td><a href=\"live.html\" class=\"addr\" onclick=\"setcookie(this)\">".$addr."</a></td><td>".$publish_time."</td></tr>";
}
?>
</table>
<script type="text/javascript">
	function setcookie(this){
		var addr = this.innerHTML;
		setCookie('addr', addr);
	}
</script>

