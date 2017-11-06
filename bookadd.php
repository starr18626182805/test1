<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<link rel="stylesheet" type="text/css" href="layui-v2.1.5/layui/css/layui.css"/>
		<script type="text/javascript" src="layui-v2.1.5/layui/layui.js"></script>
		<style type="text/css">
			
		</style>
	</head>
	<body>
		<?php
			include "header.php"
			
		?>
		<form class="layui-form" action="bookadds.php" method="post" enctype="multipart/form-data"> 
    <div class="layui-form-item">
    <label class="layui-form-label">书名:</label>
    <div class="layui-input-block">
      <input type="text" name="name" placeholder="书名" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">简介:</label>
    <div class="layui-input-block">
      <input type="text" name="intro" placeholder="简介" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">作者:</label>
    <div class="layui-input-block">
      <input type="text" name="author" placeholder="作者" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">出版社:</label>
    <div class="layui-input-block">
      <input type="text" name="publishco" placeholder="出版社" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">出版日期:</label>
    <div class="layui-input-block">
      <input type="text" name="publishdate" placeholder="出版日期" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">价格:</label>
    <div class="layui-input-block">
      <input type="text" name="price" placeholder="价格" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">ISBN:</label>
    <div class="layui-input-block">
      <input type="text" name="isbn" placeholder="ISBN" autocomplete="off" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">书籍图片:</label>
    <div class="layui-input-block">
      <input type="file" name="cover" id="avatar" value="" class=""/>
    </div>
  </div>
 
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn"  onclick="add()"lay-submit lay-filter="formDemo">添加</button>
    </div>
  </div>

</form>
<script src="layui.js"></script>
<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
	</body>
	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	function add(){
		
	}	
	</script>
</html>