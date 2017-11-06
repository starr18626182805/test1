<?php
header("Content-type:text/html;charset=utf-8");	
session_start();
$sessname=$_SESSION['username'];
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

$bookname=getSql($sql)['name'];
$price=getSql($sql)['price'];
$writer=getSql($sql)['author'];
$avat=getSql($sql)['cover'];
$sql = "SELECT `qty` FROM `shopcar` where bookid='$id' and sessname='$sessname'" ;
Global $res2;
$res2=getSql($sql)['qty'];
echo $res2;
if($res2){
	$res2++;
	$sql1 = "UPDATE `shopcar` SET `qty`='$res2' WHERE bookid='$id' and sessname='$sessname'" ;
    mod($sql1) ;
}else{
	$sql2 = "INSERT INTO shopcar (writer,bookname, price,cover,qty,bookid,sessname) VALUES ('$writer','$bookname','$price','$avat','1','$id','$sessname')" ;
   add($sql2) ;
}
function mod($sql1){
	mysql_connect("localhost" , "root","root") ;
	$res = mysql_select_db("bookinfo") ;
	mysql_query(" set names utf8") ;
	$res1 = mysql_query($sql1) ;
	if($res1){
		//echo "添加ok";
		mysql_close();
		return 1 ;
	}else{
		//echo "添加ng";
		return 0 ;
	}
}

	function add($sql2){
	mysql_connect("localhost" , "root","root") ;
	$res = mysql_select_db("bookinfo") ;
	mysql_query(" set names utf8") ;
	$res1 = mysql_query($sql2) ;
//	$af = mysql_affected_rows($res1);
	if($res1){
		mysql_close();
		
//		var_dump($af) ;
		return 1 ;
	}else{
		
		return 0 ;
	}
}


?>