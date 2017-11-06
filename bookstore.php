<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		
	<style type="text/css">
		.con{
			width: 80vw;
			margin: 1vh auto 0;
		}
		.list{
			width: 30%;
			border: 1px solid black;
			float: left;
			border-radius: 5px;
			margin: 1%;
		}
		.buy{
			background: green;
			border-radius: 5px;
		}
		.pic img{
			width: 100%;
		    height: 40vh;
		}
		.pic{
			width: 90%;
			
			margin: 1vh auto;
		}
		.price{
			float: left;
			margin:2% 3% 2% 3%;
		}
		.buy{
			float: right;
			margin:2% 3% 2% 3%;
		}
		.bookname{
			font: "微软雅黑";
			font-size: 20px;
			text-align: center;
		}
		.wel{
			margin-left:60%;
		}
		
	</style>
	</head>
	<body>
	<?php 
	include "header.php" ;
	?>
	 
	 <div class="wel">	
	 	<?php  
            if(@$_SESSION['username']){
			echo $_SESSION['username'].",欢迎您~ | " ; ?>
			<a href="exit.php">退出登录</a>
			<?php   }?>
	 </div>	
	 <div class="con">
	 	
	 </div>
	</body>
	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	
	<script type="text/javascript">

		init();
		var div3
		var id
		var id1
		function init(){
			
			$.ajax({
				type:"post",
				url:"bookstores.php",
				async:true,
				dataType:"json",
				data:"123",
				success:function(res){
					console.log(res)
					for(var i=0;i<res.length;i++){
						var div = document.createElement("div") ;
						div.className="list"
						var div0 = document.createElement("div") ;
						div0.className="pic"
						div0.innerHTML="<img src="+res[i]['cover']+">"
                        var div1 = document.createElement("div") ;
                        div1.className="bookname"
                        div1.innerText=res[i]['name']
                        var div2 = document.createElement("div") ;
                        div2.className="price"
                        div2.innerText='￥'+res[i]['price']
                        div3 = document.createElement("button") ;
                        div3.innerText="立即购买"
                        div3.className="buy";
                         (function(w){div3.onclick=function(){
                        	window.location.href="bookshow.php?bookid="+res[w]['id']
                        }})(i)
                        div.appendChild(div0)
                        div.appendChild(div1)
                        div.appendChild(div2)
                        div.appendChild(div3)
						document.querySelector(".con").appendChild(div)
						
					}
				}
			});
		}
		 
		  
	</script>
	</html>
		