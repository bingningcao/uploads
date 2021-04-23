<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"./themes/default/mobile/user\preview.html";i:1619163685;}*/ ?>
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
			min-height: 100px;
			margin: 0 auto;
		}
		.warrp .result{
			width: 100%;
		}
		.warrp .result .previewImg {
			width: 250px;
			height: 375px;
			overflow: hidden;
			border: 1px solid red;
		}

		.warrp .result .previewImg .box img{
			width: 100%;
			max-width: 100%;
		}

		.warrp .result .myForm{
			width: 250px;
			margin: 0 auto;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="warrp">
		<div class="result">	
			<div class="previewImg" style="">
				<div class="box" id="imgBox" style="">
					<img style="" src="" id="img">
				</div>
			</div>

			<div class="myForm">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="num" class="col-sm-2 col-xs-3 control-label" style="line-height: 34px;">数量</label>
						<div class="col-sm-10 col-xs-9">
							<input type="number" class="form-control" id="num" placeholder="请输入数量">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 col-xs-3">留言</label>
						<textarea class="form-control" rows="3" id="msg"></textarea>
					</div>
					<button type="button" id="submit" class="btn btn-default">提交</button>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.bootcdn.net/ajax/libs/layer/3.3.0/layer.js"></script>
	<script type="text/javascript">
		$(function(){
			var scale = window.localStorage.getItem('scale');
			var rotate = window.localStorage.getItem('rotate');
			var base64 = window.localStorage.getItem('base64');

			$('#img').attr('src',base64);
			$('#img').css({transform:'rotate(' +  rotate + 'deg)'});
			$('#imgBox').css({transform:'scale(' +  scale + ')'});

			var fileName = window.localStorage.getItem('fileName');
			var litpic = dataURLtoFile(base64,fileName); //base64转file对象

			$('#submit').click(function(){
				var num = $('#num').val();
				var msg = $('#msg').val();

				if(num == ''){
					layer.open();
					return false;
				}
				if(msg == ''){
					layer.open();
					return false;
				}


				var formData = new FormData();
				formData.append('litpic',litpic);
				formData.append('multiple',scale);
				formData.append('rotate',rotate);
				formData.append('num',num);
				formData.append('msg',msg);

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
			})


			function dataURLtoFile(dataurl, filename) {
				var arr = dataurl.split(',');
				var mime = arr[0].match(/:(.*?);/)[1];
				var bstr = atob(arr[1]);
				var n = bstr.length; 
				var u8arr = new Uint8Array(n);
				while(n--){
					u8arr[n] = bstr.charCodeAt(n);
				}
				//转换成file对象
				return new File([u8arr], filename, {type:mime});
				//转换成成blob对象
				//return new Blob([u8arr],{type:mime});
			}
		})
	</script>
</body>
</html>