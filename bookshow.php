<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
	<style type="text/css">
		.con{
			width: 90vw;
			margin: 0 auto;
			
		}
		.left{
			width: 50%;
			float: left;
		}
		.left img{
			width: 50%;
		
		}
		.right{
			margin-top: 5%;
			width: 50%;
			float: right;
		}
		.list{
			overflow: hidden;
			margin-top:5%;
		}
		.list p{
			margin-top:2%;
		}
		.list button{
			margin-top:3%;
			background: green;
			color: white;
			margin-right: 3%;
		}
	
	</style>
	</head>
	<body>
		<?php 
			include "header.php"
			?>
	 <div class="con">
	 	
	 </div>
	</body>
	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		
		show();
		function show(){
			var add=window.location.search.split("?")[1].split("=")[1];
			console.log(add)
			$.ajax({
				type:"post",
				url:"bookshows.php",
				async:true,
				dataType:"json",
				data:{id:add},
				success:function(res){
					console.log(res)
					console.log(res.id)
						var div = document.createElement("div") ;
						div.className="list"
						var div0 = document.createElement("div") ;
						div0.className="pic"
						div0.innerHTML="<img src="+res['cover']+">"
						var div4 = document.createElement("div") ;
						div4.className="left"
						div4.appendChild(div0)
						var div5 = document.createElement("div") ;
						div5.className="right"
					
                        var div1 = document.createElement("div") ;
                        div1.className="bookname"
                        div1.innerText=res['name']
                     
                        var p1=document.createElement("p");
                            p1.innerText="作者:"+res['author']
                        var p2=document.createElement("p");
                            p2.innerText="出版社:"+res['publishco']
                        var p3=document.createElement("p");
                            p3.innerText="出版时间:"+res['publishdate']
                        var p4=document.createElement("p");
                            p4.innerText="ISBN:"+res['ISBN']
                        var p5=document.createElement("p");
                            p5.innerText="友情价格:"+res['price']
                        
                       var btn1=document.createElement("button");
                           btn1.innerText="加入购物车"
                           btn1.className="btns1"
                          btn1.onclick=function(){
                         
			             $.ajax({
				       type:"post",
				       url:"shop.php",
				       async:true,
				      dataType:"json",
				        data:{
				     	id:add
				        },
				      success:function(res){
					     console.log(res)
					
				}
			});
		}
                       var btn2=document.createElement("button");
                           btn2.innerText="立即购买"
                             btn2.onclick=function(){
                      
                        	window.location.href="shopcar.php"
                        }
                        div5.appendChild(p1)
                        div5.appendChild(p2)
                        div5.appendChild(p3)
                        div5.appendChild(p4)
                        div5.appendChild(p5)
                        div5.appendChild(btn1)
                        div5.appendChild(btn2)
                        div.appendChild(div4)
                        div.appendChild(div5)
						document.querySelector(".con").appendChild(div)
                        
						
						//document.querySelector("table").appendChild(tr)
					
				}
			});
		}
		
		
	</script>
</html>
