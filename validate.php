<?php
header("Content-type:text/html;charset=utf-8");

$username = $_POST["username"];
$pwd = $_POST["pwd"];

//1.校验用户名   sql语句中的变量要加引号 ！！！
$sql = "SELECT * FROM `login` WHERE  `username`='$username' ";
$res = getSql($sql);
//print_r($res) ;
if($res){
	//2.校验密码
	if($res["password"] === $pwd ){
		//存session 一个页面启动一次即可
		session_start();
		//存储session，表明用户已成功登录
		$_SESSION['username'] = $username ;
	 echo "<script>window.location.href='bookstore.php';</script>";
	}
}else{
	//
	echo "<script>window.location.href='login_test0.php';</script>";
}


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
?>