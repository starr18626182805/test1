<?php
//清除session
session_start();
unset($_SESSION["username"]); 

//session全删/清空  session_unset() , session_destory( )

//跳转到首页  （返回）
header("Location:login_test0.php");
?>