<?php
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
echo "<pre>";
print_r($_POST);
echo "<pre>";
$k1=$_POST['name'];
$k2=$_POST['price'];
$k3=$_POST['author'];
$k4=$_POST['publishco'];
$k5=$_POST['publishdate'];
$k6=$_POST['isbn'];
$k7=$_POST['intro'];
$k8=$_FILES["cover"];

var_dump($_FILES["cover"]);
if(is_uploaded_file($_FILES['cover']['tmp_name'])){
	echo "有文件";
	if(!file_exists("./upload")){
		mkdir("upload");
	}

	$filename="./upload"."/".$_FILES['cover']['name'];
	$res=move_uploaded_file($_FILES['cover']['tmp_name'],$filename);
	if($res){
		echo "<script>window.location.href='bookstore.php';</script>";
	}else{
		echo "文件存储失败";
	}
}else{
	echo "没文件";
}
	function add($sql){
	mysql_connect("localhost" , "root","root") ;
	$res = mysql_select_db("bookinfo") ;
	mysql_query(" set names utf8") ;
	$res1 = mysql_query($sql) ;
//	$af = mysql_affected_rows($res1);
	if($res1){
		mysql_close();
	
//		var_dump($af) ;
		return 1 ;
	}else{
	
		return 0 ;
	}
}
$sql = "INSERT INTO booklist (name, price,author,publishco,publishdate,ISBN,intro,cover) VALUES ('$k1','$k2','$k3','$k4','$k5','$k6','$k7','$filename')" ;
add($sql) ;
?>