<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./themes/default/mobile/user\uploads.html";i:1618998214;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width,user-scalable=no" />
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>




	<style type="text/css">
		@font-face {
		  font-family: 'iconfont';  /* project id 2499793 */
		  src: url('//at.alicdn.com/t/font_2499793_l927eid8e0e.eot');
		  src: url('//at.alicdn.com/t/font_2499793_l927eid8e0e.eot?#iefix') format('embedded-opentype'),
		  url('//at.alicdn.com/t/font_2499793_l927eid8e0e.woff2') format('woff2'),
		  url('//at.alicdn.com/t/font_2499793_l927eid8e0e.woff') format('woff'),
		  url('//at.alicdn.com/t/font_2499793_l927eid8e0e.ttf') format('truetype'),
		  url('//at.alicdn.com/t/font_2499793_l927eid8e0e.svg#iconfont') format('svg');
		}
	</style>

	<style type="text/css">
		*{
		margin: 0 auto;
		padding: 0;
		}
		body{
		max-width: 375px;
		margin: 0 auto;
		}
		.warrp{
		width: 100%;
		margin: 0 auto;
		}
		.warrp .fileBox{
		width: 150px;
		height: 150px;
		position: relative;
		margin: 0 auto;
		}
		.warrp .fileBox .file{
		display: inline-block;
		width: 150px;
		height: 150px;
		opacity: 0;
		position: relative;
		z-index: 1
		}
		.warrp .fileBox .imgbox{
			width: 150px;
			height: 150px;
			border: 1px solid red;
			position: absolute;
			left: 0;
			top: 0;
		}
		.warrp .fileBox .imgbox .img{
		display: inline-block;
		width: 150px;
		height: 150px;
		border: 1px solid red;
		}
		.warrp .fileBox .btn{
			width: auto;
			height: 100%;
			position: absolute;
			top: -10px;
			right: -80px;
		}
		.warrp .fileBox .btn p{
			font-family: iconfont !important;
			font-size: 36px;
			margin-bottom: 5px;
		}
		.warrp .fileBox .btn p:last-child{
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<div class="warrp">
		<form action="/" method="post">
			<div class="fileBox">
				<input type="file" class="file" name="litpic" id="litpic" accept="image/gif,image/png,image/jpg,image/jpeg">
				<div class="imgbox" style="" id="imgbox">
					<img src="/public/uploads/no.jpg" alt="" class="img" id="img">
				</div>

				<input type="hidden" name="multiple" value="1" id="multiple" /> <!--放大 缩小的倍数-->
				<input type="hidden" name="rotate" value="0" id="rotate" />  <!--旋转的角度-->
				<input type="hidden" name="imgPath" id="imgPath" /> <!--图片路径-->

				<div class="btn">
					<p style="font-family: iconfont" onclick="big()">&#xe661;</p>
					<p style="font-family: iconfont" onclick="small()">&#xeda2;</p>
					<p style="font-family: iconfont" onclick="rotateEvent()">&#xe627;</p>
				</div>
			</div>
			
			<div class="ok" style="width: 150px; margin: 0 auto; margin-top: 20px;">
				<input type="button" onclick="uploadImg()" value="上传" style="width: 150px; line-height: 30px; margin: 0 auto; border: 1px solid #999; border-radius: 6px;">
			</div>
		</form>

		<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.3.0/layer.js"></script>
		<script type="text/javascript">
			var scale = 1; //放大倍数
			var rotate = 0; //角度数

			function getObjectURL(file) { //预览
			    var url = null ;
			    if (window.createObjectURL!=undefined) { // basic
			        url = window.createObjectURL(file) ;
			    } else if (window.URL!=undefined) { // mozilla(firefox)
			        url = window.URL.createObjectURL(file) ;
			    } else if (window.webkitURL!=undefined) { // webkit or chrome
			        url = window.webkitURL.createObjectURL(file) ;
			    }
			    return url ;
			}


			document.getElementById('litpic').onchange = function() { //预览
			    var strsrc = getObjectURL(this.files[0]);
			    $('#img').attr('src',strsrc);
			}


			function big(){ //放大
				var src = $('#img').attr('src');
				if(src == '/public/uploads/no.jpg'){
					return false;
				}else{
					scale = scale + 0.05;
					if(scale >= 1.3){
						scale = 1.3
					}

					$('#img').css({
						transform:'scale(' +  scale + ')'
					})
					$('#multiple').val(scale);
				}
			}


			function small(){ //缩小
				var src = $('#img').attr('src');
				if(src == '/public/uploads/no.jpg'){
					return false;
				}else{
					scale = scale - 0.05;
					if(scale <= 1){
						scale = 1
					}

					$('#img').css({
						transform:'scale(' +  scale + ')'
					})
					$('#multiple').val(scale);
				}
			}


			function rotateEvent(){ //旋转
				var src = $('#img').attr('src');
				if(src == '/public/uploads/no.jpg'){
					return false;
				}else{
					rotate = rotate + 90;
					if(rotate >= 360){
						rotate = 0;
					}

					$('#imgbox').css({
						transform:'rotate(' +  rotate + 'deg)'
					})
					$('#rotate').val(rotate);
				}
			}


			function uploadImg(){ //点击上传
				var litpic = document.getElementById('litpic').files[0];
				// var formData = new FormData();
				// formData.append('litpic',litpic);


				var formData = new FormData();
				formData.append('litpic',litpic);
				formData.append('multiple',scale);
				formData.append('rotate',rotate);

				$.ajax({
					type: "POST",
		            url: "/mobile/user/upImg",  //同目录下的php文件
		            data:formData,
		            dataType:"json", //声明成功使用json数据类型回调
		            //如果传递的是FormData数据类型，那么下来的三个参数是必须的，否则会报错
		            cache:false,  //默认是true，但是一般不做缓存
		            processData:false, //用于对data参数进行序列化处理，这里必须false；如果是true，就会将FormData转换为String类型
		            contentType:false,  //一些文件上传http协议的关系，自行百度，如果上传的有文件，那么只能设置为false
		            success: function(msg){  //请求成功后的回调函数
		            	if(msg['code'] == 10000){
		            		var domain = document.domain;
		            		console.log(msg);
							
							layer.open({
								content: '订制成功，请等待管理员审核',
								btn: '我知道了',
								shadeClose: false,
								yes: function(){
									window.location.href = 'http://' + domain + '/mobile/order/index/status/3'
								}
							});



		            	}
		            }
				})
			}

















			







			$(function(){

			})
		</script>
	</div>
</body>
</html>