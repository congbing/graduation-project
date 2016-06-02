<?php
$connect = @ mysql_connect("localhost","root","") or die("数据库连接错误");
mysql_select_db("mrcao",$connect);
mysql_query("set names 'utf8'");

function Htmltocode($content){
	return str_replace("\n", "<br>", str_replace(" ", "&nbsp", $content));
}
?>