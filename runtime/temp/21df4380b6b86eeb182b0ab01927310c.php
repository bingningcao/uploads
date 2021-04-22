<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./oscshop/admin\view\goods\mobile.html";i:1618966407;s:65:"D:\wamp64\www\project\oscshop\oscshop\admin\view\public\base.html";i:1618966407;}*/ ?>
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

	</h1>
</div>
	<div class="row">
	<div class="col-xs-12">	
		<div class="panel-body">
        <form  method="post" enctype="multipart/form-data" id="form-goods" class="form-horizontal">

          <ul class="nav nav-tabs">
          	
          	<li class="active"><a href="#tab-data" data-toggle="tab"><?php echo $crumbs; ?></a></li>
           
          </ul>
          <div class="tab-content">
          		
	       	<!-- 关联 START -->
	          	<div class="tab-pane active" id="tab-data">	          		
	         
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
		                	 <tbody>
			                     <?php $mobile_image_row = 0; if(isset($mobile_images)){ foreach ($mobile_images as $mobile_image) { ?>
					                    <tr id="mobile-image-row<?php echo $mobile_image_row; ?>">
					                      <td class="text-left"><a href="#" id="mobile-thumb-image<?php echo $mobile_image_row; ?>" data-toggle="image" class="img-thumbnail"><img src="/<?php echo resize($mobile_image['image'],100,100); ?>" /></a><input type="hidden" name="goods_mobile_description_image[<?php echo $mobile_image_row; ?>][image]" value="<?php echo $mobile_image['image']; ?>" id="mobile-input-image<?php echo $mobile_image_row; ?>" /></td>
					                      <td class="text-right"><input type="text" name="goods_mobile_description_image[<?php echo $mobile_image_row; ?>][description]" value="<?php echo $mobile_image['description']; ?>" class="form-control" /></td>
					                      
					                      <td class="text-right"><input type="text" name="goods_mobile_description_image[<?php echo $mobile_image_row; ?>][sort_order]" value="<?php echo $mobile_image['sort_order']; ?>" size="1" class="form-control" /></td>
					                      <td class="text-left">
			                     			<input type="hidden" name="table" value="goods_mobile_description_image" />
							
											<input type="hidden" name="goods_id" value="<?php echo \think\Request::instance()->param('id'); ?>" />
											
											<input type="hidden" name="pk_id" value="mdi_id" />
											
											<input type="hidden" name="id" value="<?php echo $mobile_image['mdi_id']; ?>" />
											
											<input type="hidden" name="key" value="<?php echo $mobile_image_row; ?>" />
					                      	
					                      	<button type="button" bid="mobile-image-row<?php echo $mobile_image_row; ?>" class="btn save btn-primary"><i class="fa fa-floppy-o"></i></button>
					                      	<button type="button" bid="mobile-image-row<?php echo $mobile_image_row; ?>" class="btn del btn-danger"><i class="fa fa-trash"></i></button></td>
			                    		</tr>
				                    <?php $mobile_image_row++; } } ?>
			                  </tbody>
					          </table>
		               		 <div><a  onclick="add_mobile_image();" class="add_image btn btn-primary ">添加图片</a></div>
	          			
          		
            
            
              				</div>          		
          	
    						</div>
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

		
<script>	

var mobile_image_row = '<?php echo $mobile_image_row; ?>';

	function add_mobile_image() {
		html  = '<tr id="mobile-image-row' + mobile_image_row + '">';
		html += '  <td class="text-left"><a href="#" id="mobile-thumb-image' + mobile_image_row + '"data-toggle="image" class="img-thumbnail"><img src="/public/static/image/no_image_100x100.jpg" /><input type="hidden" name="goods_mobile_description_image[' + mobile_image_row + '][image]" value="" id="mobile-input-image' + mobile_image_row + '" /></td>';
		html += '<td class="text-right"><input type="text" name="goods_mobile_description_image['+mobile_image_row+'][description]" value="" class="form-control" /></td>';
		html += '  <td class="text-right"><input type="text" name="goods_mobile_description_image[' + mobile_image_row + '][sort_order]" value="'+mobile_image_row+'"  size="1" class="form-control" /></td>';
		
		html += '  <td class="text-left">';
		
		html += '<input type="hidden" name="table" value="goods_mobile_description_image" />';
  		
  		html += '<input type="hidden" name="goods_id" value="<?php echo \think\Request::instance()->param('id'); ?>" />';
  		
  		html += '<input type="hidden" name="pk_id" value="mdi_id" />';
  							
		html += '<input type="hidden" name="id" value="" />';
		
		html += '<input type="hidden" name="key" value="' + mobile_image_row + '" />';
		
		html += '<button type="button"  bid="mobile-image-row' + mobile_image_row + '"  class="btn save btn-primary"><i class="fa fa-floppy-o"></i></button>';
		html += '<button type="button"  bid="mobile-image-row' + mobile_image_row + '"  class="btn del btn-danger"><i class="fa fa-trash"></i></button>';
		html += '</td>';
		
		html += '</tr>';
		html += '</tr>';
		
		$('#mobile_images tbody').append(html);
		
		mobile_image_row++;
	}



	
$('.save').live('click', function() {
	
	var id='#'+$(this).attr('bid');	
	
	$.post(
		"<?php echo url('Goods/ajax_eidt'); ?>",
		$(id+' input[type=\'text\'],'+id+' input[type=\'hidden\']'),
		function(d){
			
			if(d.success){
				
				alert(d.success);
				
				if(d.id){
					$(id).find('input[name=\'id\']').val(d.id);
				}
				
			}else if(d.error){
				alert(d.error);
			}
		}
	);

});	
$('.del').live('click', function() {
	var f=confirm('确认要删除吗？');
	
	if(f==false){
		return false;
	}
	
	var id='#'+$(this).attr('bid');	
	
	$.post(
		"<?php echo url('Goods/ajax_del'); ?>",
		$(id+' input[type=\'hidden\']'),
		function(d){
			if(d.success){				
				alert(d.success);
				$(id).remove();
			}else if(d.error){
				alert(d.error);
				$(id).remove();
			}
		}
	);

});	
</script>

	</body>
</html>
