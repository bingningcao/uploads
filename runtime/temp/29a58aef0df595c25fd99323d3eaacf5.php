<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./themes/default/mobile/user\uploads.html";i:1619163269;}*/ ?>
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
			overflow: hidden;
			border: 1px solid red;
			position: absolute;
			left: 0;
			top: 0;
		}
		.warrp .fileBox .imgbox .box{

		}
		.warrp .fileBox .imgbox .box .img{
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
				<input type="file" class="file" name="litpic" id="imgurl_file" accept="image/gif,image/png,image/jpg,image/jpeg">
				<div class="imgbox" style="" id="imgbox">
					<div class="box" id="box">
						<img src="/public/uploads/no.jpg" alt="" class="img" id="img">
					</div>
				</div>

				<input type="hidden" name="multiple" value="1" id="multiple" /> <!--?????? ???????????????-->
				<input type="hidden" name="rotate" value="0" id="rotate" />  <!--???????????????-->
				<input type="hidden" name="imgPath" id="imgPath" /> <!--????????????-->

				<div class="btn">
					<p style="font-family: iconfont" onclick="big()">&#xe661;</p>
					<p style="font-family: iconfont" onclick="small()">&#xeda2;</p>
					<p style="font-family: iconfont" onclick="rotateEvent()">&#xe627;</p>
				</div>
			</div>
			
			<div class="ok" style="width: 150px; margin: 0 auto; margin-top: 20px;">
				<input type="button" id="preview" value="??????" style="width: 150px; line-height: 30px; margin: 0 auto; border: 1px solid #999; border-radius: 6px;" onclick="previewEvent()">
				<!-- <input type="button" onclick="uploadImg()" value="??????" style="width: 150px; line-height: 30px; margin: 0 auto; border: 1px solid #999; border-radius: 6px;"> -->
			</div>
		</form>

		<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.3.0/layer.js"></script>
		<script type="text/javascript">
			var scale = 1; //????????????
			var rotate = 0; //?????????
			var strsrc = null; //????????????

			function big(){ //??????
				var src = $('#img').attr('src');
				if(src == '/public/uploads/no.jpg'){
					return false;
				}else{
					scale = scale + 0.05;
					if(scale >= 1.3){
						scale = 1.3
					}
					window.localStorage.setItem('scale', scale);
					$('#img').css({
						transform:'scale(' +  scale + ')'
					})
					$('#multiple').val(scale);
				}
			}

			function small(){ //??????
				var src = $('#img').attr('src');
				if(src == '/public/uploads/no.jpg'){
					return false;
				}else{
					scale = scale - 0.05;
					if(scale <= 1){
						scale = 1
					}
					window.localStorage.setItem('scale', scale);
					$('#img').css({
						transform:'scale(' +  scale + ')'
					})
					$('#multiple').val(scale);
				}
			}

			function rotateEvent(){ //??????
				var src = $('#img').attr('src');
				if(src == '/public/uploads/no.jpg'){
					return false;
				}else{
					rotate = rotate + 90;
					if(rotate >= 360){
						rotate = 0;
					}
					window.localStorage.setItem('rotate', rotate);
					$('#box').css({
						transform:'rotate(' +  rotate + 'deg)'
					})
					$('#rotate').val(rotate);
				}
			}


			$("#imgurl_file").change(function (event) {
		        //console.info(event.target.files[0]);//????????????
		        var fileName = event.target.files[0].name; //???????????????????????????
		        window.localStorage.setItem('fileName', fileName); 

		        var dom =$("#imgurl_file")[0];
		        //console.info(dom.value);//???????????????????????? C:\fakepath\icon (5).png
		        //console.log(event.target.value);//???????????????????????????????????????dom.value????????????
		        var reader = new FileReader();
		        reader.onload = (function (file) {
		            return function (event) {
		                console.info(this.result); //????????????base64????????????
		                $("#imgurl_value").val(this.result);
		                var sss=$("#img");
		                $("#img")[0].src = this.result;

		                window.localStorage.setItem('base64', this.result);
		            };
		        })(event.target.files[0]);
		        reader.readAsDataURL(event.target.files[0]);
		    });


			function previewEvent(){ //????????????
				var host = window.location.host;
				var url = 'http://' + host + '/mobile/user/preview/';
				window.location = url;
			}
		</script>
	</div>
</body>
</html>