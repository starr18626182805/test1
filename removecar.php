<?php
	header("Content-type:text/html;charset=utf-8");	
session_start();
$sessname=$_SESSION['username'];
$bokid=$_POST['bookid'];
function mod($sql){
	mysql_connect("localhost" , "root","root") ;
	$res = mysql_select_db("bookinfo") ;
	mysql_query(" set names utf8") ;
	$res1 = mysql_query($sql) ;
	if($res1){
		echo 1;
		mysql_close();
		
	}else{
		echo 0;
		
	}
}
$sql = "DELETE FROM `shopcar` WHERE bookid= '$bokid' and sessname='$sessname'" ;
mod($sql) ; 

?>