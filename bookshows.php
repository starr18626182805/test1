<?php
header("Content-type:text/html;charset=utf-8");	
$id=$_POST["id"];

function getSql($sql){
	mysql_connect("localhost","root","root") or die("连接失败");
	mysql_select_db("bookinfo");
	mysql_query("set names utf8");
	$res =mysql_query($sql);
	$one = mysql_fetch_assoc($res);
	if($one){
		return $one;
	}else{
		return false;
	}
}
$sql = "SELECT* FROM `booklist` where id='$id'" ;
$res=json_encode(getSql($sql));
echo $res;

?>