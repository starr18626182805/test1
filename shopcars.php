<?php
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
session_start();
$sessname=$_SESSION['username'];
function getSqls($sql){
	mysql_connect("localhost","root","root") or die("连接失败") ;
	mysql_select_db("bookinfo");
	mysql_query("set names utf8");
	$res = mysql_query($sql);
	while($one = @mysql_fetch_assoc($res)){
		$list[] = $one ;
//		print_r($list);
	}
	return $list ;	
}
$sql = "SELECT * FROM 	`shopcar` WHERE sessname='$sessname'" ;
  $res=json_encode(getSqls($sql));
echo $res;

?>