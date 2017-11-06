<?php
header("Content-type:text/html;charset=utf-8");
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script type="text/javascript" src="../angular js/angular.js"></script>
		<link rel="stylesheet" type="text/css" href="layui-v2.1.5/layui/css/layui.css"/>
		<script type="text/javascript" src="layui-v2.1.5/layui/layui.js"></script>
		<link rel="stylesheet" type="text/css" href="css/header.css	"/>
		<style type="text/css">
			th{
			text-align: center;
			}
			table{
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<?php 
			include "header.php"
		?>
			<table class="layui-table">
  <colgroup>
    <col width="100">
    <col height="100">
    <col>
  </colgroup>
 
    <tr>
     			<th>图书</th>
				<th>书名</th>
				<th>数量</th>
				<th>单价</th>
				<th>结算</th>
				<th>删除</th>
    </tr> 
 
</table>
		
	</body>
	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	    var k;
	    var c;
	    var qty;
		getCar();
		function getCar(){
			
			$.ajax({
				type:"post",
				url:"shopcars.php",
				async:true,
				dataType:"json",
				data:"123",
				success:function(res){
					console.log(res)
					for(var i=0;i<res.length;i++){
						
						var tr = document.createElement("tr") ;
						var td1= document.createElement("td");
						td1.innerHTML="<img src="+res[i]['cover']+">"
						var td2= document.createElement("td");
						td2.innerText=res[i]['bookname'];
						var td3= document.createElement("td");
					
//						td3.innerHTML="<button>-</button><input type='text'value="+res[i]['qty']+"><button>+</button>";

//
                          
					    	
						
						var btn3=document.createElement("input");
						btn3.setAttribute("type","text")
						btn3.value=res[i]['qty']
						var btn1=document.createElement("button");
					    
                          (function(w){
                          	 btn1.onclick=function(){
                          	  btn3.value--
                          		$.ajax({
                          			type:"post",
                          			url:"qty.php",
                          			async:true,
                          			dataType:"json",
									data:{
										a1:1,
										k1:res[w]['bookid'],
										c1:res[w]['sessname'],
										qty:btn3.value
									},
                          			success:function(res){
                          				console.log(res)
                          			}
                          		});
                          }
                          
                          })(i)
                          var btn2=document.createElement("button"); 
                           (function(w){
                          	 btn2.onclick=function(){
                          	  btn3.value++
                          		$.ajax({
                          			type:"post",
                          			url:"qty.php",
                          			async:true,
                          			dataType:"json",
									data:{
										a1:2,
										k1:res[w]['bookid'],
										c1:res[w]['sessname'],
										qty:btn3.value
									},
                          			success:function(res){
                          				console.log(res)
                          			}
                          		});
                          }
                          
                          })(i)
                         
						var td4= document.createElement("td");
						td4.innerText="￥"+res[i]['price'];
						var td5= document.createElement("td");
						td5.innerText="￥"+(res[i]['price'])*(res[i]['qty']);
						var td6= document.createElement("td");
						td6.innerText="删除";
						(function(w){
							console.log(td6)
							td6.onclick=function(){
							$.ajax({
								type:"post",
								url:"removecar.php",
								async:true,
								dataType:"json",
								data:{
									bookid:res[w].bookid
									},
								  success:function(res){
								  	console.log(res)
								   if(res=1){
									tr.remove()
								}
								}
								
							});
							
						}
						})(i)
						btn1.innerText="-"
						btn2.innerText="+"
						 td3.appendChild(btn1)
                          td3.appendChild(btn3)
                          td3.appendChild(btn2)
						tr.appendChild(td1)
	                    tr.appendChild(td2)
	                    tr.appendChild(td3)
	                    tr.appendChild(td4)
	                    tr.appendChild(td5)
	                    tr.appendChild(td6)
						document.querySelector("table").appendChild(tr)
						}
					}
				
			});
		}
	</script>
</html>
