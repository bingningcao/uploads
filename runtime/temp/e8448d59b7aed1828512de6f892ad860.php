<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:36:"./oscshop/admin\view\goods\edit.html";i:1618966407;s:65:"D:\wamp64\www\project\oscshop\oscshop\admin\view\public\base.html";i:1618966407;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo \think\Config::get('SITE_NAME'); ?>-后台管理中心</title>

		<meta name="description" content="<?php echo \think\Config::get('SITE_NAME'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/public/static/js/bt/bootstrap.min.css" />
		<link rel="stylesheet" href="/public/static/view_res/admin/ace/font-awesome/4.2.0/css/font-awesome.min.css" />


		<!-- ace styles -->
		<link rel="stylesheet" href="/public/static/view_res/admin/ace/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/public/static/view_res/admin/ace/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/public/static/view_res/admin/ace/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="/public/static/view_res/admin/ace/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/public/static/view_res/admin/ace/js/html5shiv.min.js"></script>
		<script src="/public/static/view_res/admin/ace/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.table thead > tr > td, .table tbody > tr > td {
			    vertical-align: middle;
			}	
			.table thead td span[data-toggle="tooltip"]:after, label.control-label span:after {
				font-family: FontAwesome;
				color: #1E91CF;
				content: "\f059";
				margin-left: 4px;
			}
		</style>
		
		
			
		
		
		
		<script src="/public/static/js/jquery/jquery-2.0.3.min.js"></script>
		<script src="/public/static/js/jquery/jquery-migrate-1.2.1.min.js"></script>
			
		
		<script src="/public/static/artDialog/artDialog.js"></script>
		<link href="/public/static/artDialog/skins/default.css" rel="stylesheet" type="text/css" />			
		
		<script>
			var filemanager_url="<?php echo url('admin/FileManager/index'); ?>";
		</script>
		<script src="/public/static/js/oscshop_common.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="<?php echo url('admin/Index/index'); ?>" class="navbar-brand">
						<small>							
							<?php echo \think\Config::get('SITE_NAME'); ?> 后台管理
						</small>
					</a>
					<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
						<span class="sr-only">Toggle sidebar</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<?php echo session('user_auth.username'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li>
									<a target="_blank" href="<?php echo \think\Request::instance()->root(true); ?>">网站前台</a>
								</li>
								
								<li>
									<a href="<?php echo url('admin/User/edit',array('id'=>session('user_auth.uid'))); ?>">修改密码</a>
								</li>
								
								<li><a href="<?php echo url('admin/Index/clear'); ?>">清空缓存</a></li>

								<li>
									<a href="<?php echo url('admin/Index/logout'); ?>">退出系统</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			
			<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				
				<ul class="nav nav-list">
					<li class="hover">
						<a target="_blank" href="<?php echo \think\Request::instance()->root(true); ?>">
							<i class="menu-icon fa fa fa-home fa-lg"></i>
							<span class="menu-text">前台 </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
					</li>
					
					<?php if(is_array($admin_menu) || $admin_menu instanceof \think\Collection || $admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>					
					<li class="hover <?php if(isset($breadcrumb1) AND ($breadcrumb1 == $m["title"])): ?> active open <?php endif; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa <?php echo $m['icon']; ?>"></i>
							<span class="menu-text"> <?php echo $m['title']; ?> </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<?php if(isset($m['children'])): ?>
						<ul class="submenu">
							
							<?php if(is_array($m['children']) || $m['children'] instanceof \think\Collection || $m['children'] instanceof \think\Paginator): if( count($m['children'])==0 ) : echo "" ;else: foreach($m['children'] as $key=>$vo): ?>   
							<li class="hover">
								<a href="<?php echo \think\Request::instance()->root(true); ?>/<?php echo $vo['url']; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo $vo['title']; if(isset($vo['children'])): ?>
										<b class="arrow fa fa-angle-down"></b>
									<?php endif; ?>
								</a>

								<b class="arrow"></b>
								
									<?php if(isset($vo['children'])): ?>
										<ul class="submenu">
											<?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v2): ?> 
												<li class="hover">
													<a href="<?php echo \think\Request::instance()->root(true); ?>/<?php echo $v2['url']; ?>">
														<i class="menu-icon fa fa-caret-right"></i>
														<?php echo $v2['title']; ?>
													</a>
			
													<b class="arrow"></b>
												</li> 
											<?php endforeach; endif; else: echo "" ;endif; ?> 
										</ul>	
									<?php endif; ?>
								
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							
						</ul>
						<?php endif; ?>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul><!-- /.nav-list -->

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
							
<div class="page-header">
		<h1>
			<?php echo $breadcrumb1; ?>
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				<?php echo $breadcrumb2; ?>
			</small>
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				<?php echo $crumbs; ?>
			</small>			
			<button id="send" form="form-goods" type="submit" style="float:right;"  class="btn btn-sm btn-primary">提交</button>			
		</h1>
</div>
	<div class="row">
	<div class="col-xs-12">	
		<div class="panel-body">
        <form action="<?php echo url('Goods/add'); ?>" method="post" enctype="multipart/form-data" id="form-goods" class="form-horizontal">
        
    
          <ul class="nav nav-tabs">
          	
          	<li class="active"><a href="#tab-data" data-toggle="tab">基本信息</a></li>
          	
            <li><a href="#tab-general" data-toggle="tab">商品描述</a></li>
            
            <li><a href="#tab-links" data-toggle="tab">关联</a></li>   
            <li><a href="#tab-option" data-toggle="tab">选项</a></li>  
            <li><a href="#tab-discount" data-toggle="tab">折扣</a></li>                    
            <li><a href="#tab-image" data-toggle="tab">商品相册</a></li>      
            <li><a href="#tab-mobile" data-toggle="tab">手机端描述</a></li>       
          </ul>
          <div class="tab-content">
          		
	          	<!-- 基本信息 START -->
	          	<div class="tab-pane active" id="tab-data">
	          		
	          		<div class="form-group required">
		                <label class="col-sm-2 control-label" for="input-image">
		                	<span title="" data-toggle="tooltip" data-original-title="上传800x800的图片">缩略图：</span>
		                </label>
		                
		                <div class="col-sm-10" id="thumb">
		                  <a id="thumb-image" href="#" data-toggle="image" class="img-thumbnail"><img src="/public/static/image/no_image_100x100.jpg" /></a>
		                  <input type="hidden" name="image" value="" id="input-image" />
		            	</div>
		            
		            </div>   
		            
		            <div class="form-group required">
						<label class="col-sm-2 control-label" for="input-name2">商品名称：</label>
						<div class="col-sm-10">
							<input id="input-name2" class="form-control" type="text" placeholder="商品名称" value="" name="name">
						</div>
					</div>
		            
		            <div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">商品型号：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="商品型号" value="" name="model">
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">库存单位：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="库存单位" value="" name="sku">
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">生产地：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="商品位置" value="" name="location">
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">销售价格：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="销售价格" value="" name="price">
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">商品数量：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="商品数量" value="" name="quantity">
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">购买可得积分：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="购买可得积分" value="" name="points">
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">兑换所需积分：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="兑换所需积分" value="" name="pay_points">
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">最小起订量：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="最小起定量" value="1" name="minimum">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="input-subtract">扣减库存：</label>
						
							<div class="col-sm-10">
								<label class="radio-inline">
								<input type="radio" checked="checked" value="1" name="subtract">是</label>
								<label class="radio-inline">
								<input type="radio" value="0" name="subtract">否</label>
							</div>
						
					</div>		           
					
					<div class="form-group">
						<label class="col-sm-2 control-label">需要配送：</label>
						<div class="col-sm-10">
							<label class="radio-inline">
							<input type="radio" checked="checked" value="1" name="shipping">是</label>
							<label class="radio-inline">
							<input type="radio" value="0" name="shipping">否</label>
						</div>
					</div>					
					
					<div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">重量：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="重量" value="" name="weight">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="input-length-class">重量单位：</label>
						<div class="col-sm-10">
							
							<select id="input-length-class" class="form-control" name="weight_class_id">
								<?php if(is_array($weight_class) || $weight_class instanceof \think\Collection || $weight_class instanceof \think\Paginator): $i = 0; $__LIST__ = $weight_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo $v['weight_class_id']; ?>"  ><?php echo $v['title']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
		            
		            <div class="form-group">
						<label class="col-sm-2 control-label" for="input-length">尺寸(L x W x H)：</label>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-4">
									<input id="input-length" class="form-control" type="text" placeholder="长度" value="" name="length">
								</div>
								<div class="col-sm-4">
									<input id="input-width" class="form-control" type="text" placeholder="宽度" value="" name="width">
								</div>
								<div class="col-sm-4">
									<input id="input-height" class="form-control" type="text" placeholder="高度" value="" name="height">
								</div>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label" for="input-length-class">尺寸单位：</label>
						<div class="col-sm-10">
							
							<select id="input-length-class" class="form-control" name="length_class_id">
								<?php if(is_array($length_class) || $length_class instanceof \think\Collection || $length_class instanceof \think\Paginator): $i = 0; $__LIST__ = $length_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo $v['length_class_id']; ?>"><?php echo $v['title']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
		            
		            <div class="form-group">
						<label class="col-sm-2 control-label">商品状态：</label>
						<div class="col-sm-10">
							<label class="radio-inline">
							<input type="radio" checked="checked" value="1" name="status">启用</label>
							<label class="radio-inline">
							<input type="radio" value="2" name="status">停用</label>
						</div>
					</div>
		            
		            <div class="form-group required">
						<label class="col-sm-2 control-label" for="input-meta-title2">排序：</label>
						<div class="col-sm-10">
							<input id="input-meta-title2" class="form-control" type="text" placeholder="排序" value="" name="sort_order">
						</div>
					</div>
		            
	          	</div>
	          	<!-- 基本信息 END -->
	          	
	          	<!-- 商品描述  START -->
	          	<div class="tab-pane" id="tab-general">	          		
					
					<div class="form-group">
	                    <label class="col-sm-2 control-label" for="input-description">商品简介：</label>
	                    <div class="col-sm-10">
	                      <textarea name="goods_description[summary]" class="form-control" rows="5"></textarea>	
	                    </div>
                  	</div>
					
					<div class="form-group">
	                    <label class="col-sm-2 control-label" for="input-description">商品详情：</label>
	                    <div class="col-sm-10">
	                      <textarea name="goods_description[description]" id="description"></textarea>	
	                    </div>
                  	</div>
		
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="input-meta-description2">Meta标签描述：</label>
						<div class="col-sm-10">
							<textarea id="input-meta-description2" class="form-control" placeholder="Meta标签描述" rows="5" name="goods_description[meta_description]"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="input-meta-keyword2">Meta标签关键词：</label>
						<div class="col-sm-10">
							<textarea id="input-meta-keyword2" class="form-control" placeholder="Meta标签关键词" rows="5" name="goods_description[meta_keyword]"></textarea>
						</div>
					</div>
					
					
					
	          	</div>
	          	<!-- 商品描述 END --> 	          	
	          	
	          	<!-- 关联 START -->
	          	<div class="tab-pane" id="tab-links">
	          		
	          		<div class="form-group">
		                <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="(自动完成)">商品分类</span></label>
		                <div class="col-sm-10">
		                  <input type="text" name="category" value="" placeholder="商品分类" id="input-category" class="form-control" />
		                  <div id="goods-category" class="well well-sm" style="height: 150px; overflow: auto;"></div>	                  
		                </div>
	              	</div>	 
	              	
	              	<div class="form-group">
		                <label class="col-sm-2 control-label" for="input-attribute"><span data-toggle="tooltip" title="(自动完成)">商品属性</span></label>
		                <div class="col-sm-10">
		                  <input type="text" name="attribute" value="" placeholder="商品属性" id="input-attribute" class="form-control" />
		                  <div id="goods-attribute" class="well well-sm" style="height: 150px; overflow: auto;"></div>	                  
		                </div>
	              	</div>	
	              	
	              	<div class="form-group">
		                <label class="col-sm-2 control-label" for="input-brand"><span data-toggle="tooltip" title="(自动完成)">商品品牌</span></label>
		                <div class="col-sm-10">
		                  <input type="text" name="brand" value="" placeholder="商品品牌" id="input-brand" class="form-control" />
		                  <div id="goods-brand" class="well well-sm" style="height: 150px; overflow: auto;"></div>	                  
		                </div>
	              	</div>
	              	             
	          	</div>
	          	<!-- 关联 END -->
	          	
	       		<!-- 选项 START -->
	       		<div class="tab-pane" id="tab-option">
	       			<div class="row">
	       				<div class="col-sm-2">
	       					<ul class="nav nav-pills nav-stacked" id="option">
	       						
			                    <li>
			                      <input type="text" name="option" value="" id="input-option" class="form-control" />
			                    </li>
			                </ul>
	       				</div>
	       				<div class="col-sm-10">
	       					<div class="tab-content">	       						
	       						
	       					</div>
	       				</div>
	       			</div>
	       		</div>
	       		<!-- 选项 END -->
	       		
        		<!--折扣 START -->
	          	<div class="tab-pane" id="tab-discount">
	          		<div class="table-responsive">
	                	<table id="discount" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
								  <td class="text-left">数量</td>
								  <td class="text-right">价格</td>
								  <td></td>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
		                <div><a  onclick="addDiscount();" class="add_image btn btn-primary ">添加折扣</a></div>
                  </div>	          		
	          	</div>
	          	<!--折扣 END -->
	          	
	          	<!-- 商品相册 START -->
	          	<div class="tab-pane" id="tab-image">
	          		<div class="table-responsive">
	                	<table id="images" class="table table-striped table-bordered table-hover">
			                  <thead>
			                    <tr>
			                      <td class="text-left">商品图片</td>
			                      <td class="text-right">选项排序</td>
			                      <td></td>
			                    </tr>
			                  </thead>
		                	 <tbody></tbody>		                  
				          </table>
		                <div><a  onclick="addImage();" class="add_image btn btn-primary ">添加图片</a></div>
                  </div>
	          	</div>
	          	<!-- 商品相册 END -->
	          	
	          	
	          	<!-- 手机端描述 START -->
	          	<div class="tab-pane" id="tab-mobile">
	          		<div class="table-responsive">
	                	<table id="mobile_images" class="table table-striped table-bordered table-hover">
		                  <thead>
		                    <tr>
		                      <td class="text-left">详情图片</td>
		                      <td class="text-left">图片描述</td>
		                      <td class="text-right">选项排序</td>
		                      <td></td>
		                    </tr>
		                  </thead>
		                	 <tbody></tbody>
			              </table>  					          
		               	  <div><a  onclick="add_mobile_image();" class="add_image btn btn-primary ">添加图片</a></div>
                  </div>
	          	</div>
	          	<!-- 手机端描述 END -->
	          	
          </div>
        </form>
	</div>
	</div>
</div>

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->



			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/public/static/view_res/admin/ace/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/public/static/view_res/admin/ace/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/public/static/view_res/admin/ace/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/public/static/view_res/admin/ace/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/public/static/js/bt/bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="/public/static/view_res/admin/ace/js/ace-elements.min.js"></script>
		<script src="/public/static/view_res/admin/ace/js/ace.min.js"></script>

		

<script src="/public/static/js/ckeditor/ckeditor.js"></script> 
<script>

$('#send').click(function(){
	
	var name=$('input[name="name"]').val();
	
	var category=$('input[name="goods_category[]"]').val();
	
	var option_quantity=$('.quantity').size();
	
	var option=$(".option").size();
	
	var send=true;
	
	if(option_quantity>0){
		
		$('.quantity').each(function(i){			
			if($(this).val()==''){				
				alert('选择数量必填');		
				send=false;
				return false;
			}			
		});
		
	}else{
		if(option>0){
			alert('选项值不能为空');
			return false;
		}
	}
	
	if(name==''){
		alert('商品名称必填');
		return false;
	}
	if(category==null){
		alert('分类必填');
		return false;
	}	

	
	if(send==true){
		return true;
	}
	return false;
}); 

//CKEDITOR
CKEDITOR.replace('description', {
	filebrowserImageUploadUrl: '<?php echo url("FileManager/ckupload"); ?>',	
	toolbar: [
				[ 'Source', 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],
				[ 'FontSize', 'TextColor', 'BGColor' ],
				[ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock','Image','Format']
			]	
});

/*******************************************************************************************************************/

var option_row =0;

$('input[name=\'option\']').autocomplete({
	
	'source': function(request, response) {
		$.ajax({
			url:'<?php echo url("Option/autocomplete"); ?>' +'/filter_name/'+  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						category: item['category'],
						label: item['name'],
						value: item['option_id'],
						type: item['type'],
						option_value: item['option_value']
					}
				}));
			}
		});
	},
	'select': function(item) {
		html  = '<div class="tab-pane" id="tab-option' + option_row + '">';
		html += '	<input type="hidden" class="option" name="goods_option[' + option_row + '][goods_option_id]" value="" />';
		html += '	<input type="hidden" name="goods_option[' + option_row + '][name]" value="' + item['label'] + '" />';
		html += '	<input type="hidden" name="goods_option[' + option_row + '][option_id]" value="' + item['value'] + '" />';
		html += '	<input type="hidden" name="goods_option[' + option_row + '][type]" value="' + item['type'] + '" />';
		
		html += '	<div class="form-group">';
		html += '	  <label class="col-sm-2 control-label" for="input-required' + option_row + '">必选</label>';
		html += '	  <div class="col-sm-10"><select name="goods_option[' + option_row + '][required]" id="input-required' + option_row + '" class="form-control">';
		html += '	      <option value="1">是</option>';
		html += '	      <option value="0">否</option>';
		html += '	  </select></div>';
		html += '	</div>';
			
		if (item['type'] == 'select' || item['type'] == 'radio' || item['type'] == 'checkbox') {		
			
			html += '<div class="table-responsive">';
			html += '  <table id="option-value' + option_row + '" class="table table-striped table-bordered table-hover">';
			html += '  	 <thead>'; 
			html += '      <tr>';
			
			if(item['type']!='select'){			
				html += '    <td class="text-right">图片</td>';				
			}else{
				html += '    <td class="text-right"></td>';	
			}	
			
			html += '        <td class="text-left">选项值</td>';			
			html += '        <td class="text-right">商品数量</td>';
			html += '        <td class="text-left">扣减库存</td>';
			html += '        <td class="text-right">销售价格</td>';				
			html += '        <td class="text-right">重  量</td>';					
			html += '        <td></td>';
			html += '      </tr>';
			html += '  	 </thead>';
			html += '  	 <tbody>';
			html += '    </tbody>';
			html += '    <tfoot>';
			html += '      <tr>';
			html += '        <td colspan="6"></td>';
			html += '        <td class="text-left"><button type="button" onclick="addOptionValue(' + option_row+",'"+item['type']+"'"+');" data-toggle="tooltip" class="btn btn-primary">新增</button></td>';
			html += '      </tr>';
			html += '    </tfoot>';
			html += '  </table>';
			html += '</div>';
			
            html += '  <select id="option-values' + option_row + '" style="display: none;">';
			
            for (i = 0; i < item['option_value'].length; i++) {
				html += '  <option value="' + item['option_value'][i]['option_value_id'] + '">' + item['option_value'][i]['name'] + '</option>';
            }

            html += '  </select>';	
			html += '</div>';	
		}
		
		$('#tab-option .tab-content').append(html);
			
		$('#option > li:last-child').before('<li><a href="#tab-option' + option_row + '" data-toggle="tab"><i class="fa fa-minus-circle" onclick="$(\'a[href=\\\'#tab-option' + option_row + '\\\']\').parent().remove(); $(\'#tab-option' + option_row + '\').remove(); $(\'#option a:first\').tab(\'show\')"></i> ' + item['label'] + '</li>');
		
		$('#option a[href=\'#tab-option' + option_row + '\']').tab('show');		
				
		option_row++;
	}	
});	
	
var option_value_row =0;

function addOptionValue(option_row,type) {	
	html  = '<tr id="option-value-row' + option_value_row + '">';
	
	if(type=='select'){
		html+='		<td></td>';
	}else{			
		html+= '  <td class="text-left"><a href="#" id="option-image-row' + option_value_row + '"data-toggle="image" class="img-thumbnail"><img src="/public/static/image/no_image_100x100.jpg" /><input type="hidden" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][option_value_image]" value="" id="option-input-image' + option_value_row + '" /></td>';
	}
	
	html += '  <td class="text-left"><select name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][option_value_id]" class="form-control">';
	html += $('#option-values' + option_row).html();
	html += '  </select><input type="hidden" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][goods_option_value_id]" value="" /></td>';
	html += '  <td class="text-right"><input type="text" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][quantity]" value=""  class="form-control quantity" /></td>'; 
	html += '  <td class="text-left"><select name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][subtract]" class="form-control">';
	html += '    <option value="1">是</option>';
	html += '    <option value="0">否</option>';
	html += '  </select></td>';
	html += '  <td class="text-right"><select name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][price_prefix]" class="form-control">';
	html += '    <option value="+">+</option>';
	html += '    <option value="-">-</option>';
	html += '  </select>';
	html += '  <input type="text" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][price]" value="" class="form-control" /></td>';
	
	html += '  <td class="text-right"><select name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][weight_prefix]" class="form-control">';
	html += '    <option value="+">+</option>';
	html += '    <option value="-">-</option>';
	html += '  </select>';	
	html += '  <input type="text" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][weight]" value="" class="form-control" /></td>';	
	
	html += '  <td class="text-left"><button type="button" onclick="$(this).tooltip(\'destroy\');$(\'#option-value-row' + option_value_row + '\').remove();" data-toggle="tooltip" rel="tooltip" class="btn btn-danger"><i class="fa fa-trash bigger-120"></i></button></td>';
	html += '</tr>';
	
	$('#option-value' + option_row + ' tbody').append(html);
        $('[rel=tooltip]').tooltip();
        
	option_value_row++;
}	
	
$('input[name=\'category\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: '<?php echo url("Category/autocomplete"); ?>' +'/filter_name/'+  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['category_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'category\']').val('');
		
		$('#goods-category' + item['value']).remove();
		
		$('#goods-category').append('<div id="goods-category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="goods_category[]" value="' + item['value'] + '" /></div>');	
	}
});	

$('#goods-category').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
});	


$('input[name=\'attribute\']').autocomplete({
	'source': function(request, response) {

		$.ajax({
			url: '<?php echo url("Attribute/autocomplete"); ?>' +'/filter_name/'+  encodeURIComponent(request),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						category: item.attribute_group,
						label: item.name,
						value: item.attribute_id
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'attribute\']').val('');
		
		$('#goods-attribute' + item['value']).remove();
		
		$('#goods-attribute').append('<div id="goods-attribute' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="goods_attribute[]" value="' + item['value'] + '" /></div>');	
	
	}
});

$('#goods-attribute').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
});	

$('input[name=\'brand\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: '<?php echo url("Brand/autocomplete"); ?>' +'/filter_name/'+  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['brand_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'brand\']').val('');
		
		$('#goods-brand' + item['value']).remove();
		
		$('#goods-brand').append('<div id="goods-brand' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="goods_brand[]" value="' + item['value'] + '" /></div>');	
	}
});	

$('#goods-brand').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
});	
	
	var image_row =0;

	function addImage() {
		html  = '<tr id="gallery-image-row' + image_row + '">';
		html += '  <td class="text-left"><a href="#" id="thumb-image' + image_row + '"data-toggle="image" class="img-thumbnail"><img src="/public/static/image/no_image_100x100.jpg" /><input type="hidden" name="goods_image[' + image_row + '][image]" value="" id="gallery-input-image' + image_row + '" /></td>';
		html += '  <td class="text-right"><input type="text" name="goods_image[' + image_row + '][sort_order]" value="'+image_row+'" class="form-control" /></td>';
		html += '  <td class="text-left"><button type="button" onclick="$(\'#gallery-image-row' + image_row  + '\').remove();" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
		html += '</tr>';
		
		$('#images tbody').append(html);
		
		image_row++;
	}

	
	var mobile_image_row =0;

	function add_mobile_image() {
		html  = '<tr id="mobile-image-row' + mobile_image_row + '">';
		html += '  <td class="text-left"><a href="#" id="mobile-thumb-image' + mobile_image_row + '"data-toggle="image" class="img-thumbnail"><img src="/public/static/image/no_image_100x100.jpg" /><input type="hidden" name="mobile_image[' + mobile_image_row + '][image]" value="" id="mobile-input-image' + mobile_image_row + '" /></td>';
		html += '<td class="text-right"><input type="text" name="mobile_image['+mobile_image_row+'][description]" value="" class="form-control" /></td>';
		html += '  <td class="text-right"><input type="text" name="mobile_image[' + mobile_image_row + '][sort_order]" value="'+mobile_image_row+'"  size="1" class="form-control" /></td>';
		html += '  <td class="text-left"><button type="button" onclick="$(\'#mobile-image-row' + mobile_image_row  + '\').remove();" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
		html += '</tr>';
		
		$('#mobile_images tbody').append(html);
		
		mobile_image_row++;
	}
	

	var discount_row =0;

	function addDiscount() {
		html  = '<tr id="discount-row' + discount_row + '">'; 
		html += '  <td class="text-left"><input type="text" name="goods_discount[' + discount_row + '][quantity]" value="" class="form-control" /></td>';
		html += '  <td class="text-left"><input type="text" name="goods_discount[' + discount_row + '][price]" value="" class="form-control" /></td>';
		html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row  + '\').remove();" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
		html += '</tr>';
		
		$('#discount tbody').append(html);
		
		discount_row++;
	}
	
$('#option a:first').tab('show');	
	


</script>

	</body>
</html>
