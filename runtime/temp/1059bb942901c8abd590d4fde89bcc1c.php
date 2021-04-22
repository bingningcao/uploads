<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./oscshop/admin\view\goods\option.html";i:1618966407;s:65:"D:\wamp64\www\project\oscshop\oscshop\admin\view\public\base.html";i:1618966407;}*/ ?>
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
	<button type="submit" style="float:right;" form="form-goods"  class="btn button btn-sm btn-primary">提交</button>
	</h1>
</div>
	<div class="row">
	<div class="col-xs-12">	
		<div class="panel-body">
        <form action="<?php echo url('Goods/edit_option'); ?>" method="post" enctype="multipart/form-data" id="form-goods" class="form-horizontal">
        
        <?php if(\think\Request::instance()->param('id')): ?>
			<input name="goods_id" type="hidden" value="<?php echo \think\Request::instance()->param('id'); ?>" />
		<?php endif; ?>
          <ul class="nav nav-tabs">
          	
          	<li class="active"><a href="#tab-data" data-toggle="tab"><?php echo $crumbs; ?></a></li>
           
          </ul>
          <div class="tab-content">
          		
	      
	          	<div class="tab-pane active" id="tab-option">	          		
	         
	          		<div class="row">
	       				<div class="col-sm-2">
	       					<ul class="nav nav-pills nav-stacked" id="option">
	       						
			                    <?php $option_row = 0; $option_value_row = 0; if(isset($goods_options)){ foreach ($goods_options as $goods_option) { ?>
					                    <li><a href="#tab-option<?php echo $option_row; ?>" type="<?php echo $goods_option['type']; ?>" data-toggle="tab"><i class="fa fa-minus-circle" onclick="$('a[href=\'#tab-option<?php echo $option_row; ?>\']').parent().remove(); $('#tab-option<?php echo $option_row; ?>').remove(); $('#option a:first').tab('show');"></i> <?php echo $goods_option['name']; ?></a></li>
										<?php $option_row++; } } ?>
			                    <li>
			                      <input type="text" name="option" value="" id="input-option" class="form-control" />
			                    </li>
			                </ul>
	       				</div>
	       				<div class="col-sm-10">
	       					<div class="tab-content">
	       						
					<?php $option_row = 0; $option_value_row = 0; if(isset($goods_options)){ foreach ($goods_options as $goods_option) { ?>
                    <div class="tab-pane" id="tab-option<?php echo $option_row; ?>">
                      <input type="hidden" name="goods_option[<?php echo $option_row; ?>][goods_option_id]" value="<?php echo $goods_option['goods_option_id']; ?>" />
                      <input type="hidden" name="goods_option[<?php echo $option_row; ?>][name]" value="<?php echo $goods_option['name']; ?>" />
                      <input type="hidden" name="goods_option[<?php echo $option_row; ?>][option_id]" value="<?php echo $goods_option['option_id']; ?>" />
                      <input type="hidden" name="goods_option[<?php echo $option_row; ?>][type]" value="<?php echo $goods_option['type']; ?>" />
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-required<?php echo $option_row; ?>">必选</label>
                        <div class="col-sm-10">
                          <select name="goods_option[<?php echo $option_row; ?>][required]" id="input-required<?php echo $option_row; ?>" class="form-control">
                            <?php if ($goods_option['required']) { ?>
                            <option value="1" selected="selected">是</option>
                            <option value="0">否</option>
                            <?php } else { ?>
                            <option value="1">是</option>
                            <option value="0" selected="selected">否</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      <?php if ($goods_option['type'] == 'select' || $goods_option['type'] == 'radio' || $goods_option['type'] == 'checkbox') { ?>
                      <div class="table-responsive">
                        <table id="option-value<?php echo $option_row; ?>" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              
                              <?php if($goods_option['type'] == 'select'){ ?>
                              	<td class="text-left"></td>
                              <?php }else{ ?>
                              	<td class="text-left">图片</td>
                              <?php } ?>
                              
                              <td class="text-left">选项值</td>
                              <td class="text-right">商品数量</td>
                              <td class="text-left">扣减库存</td>
                              <td class="text-right">销售价格</td>
                             
                              <td class="text-right">重 量</td>
                              <td></td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($goods_option['goods_option_value'] as $goods_option_value) { ?>
                            <tr id="option-value-row<?php echo $option_value_row; ?>">
                              
                              <?php if($goods_option['type'] == 'select'){ ?>
                              	<td class="text-left"></td>
                              <?php }else{ ?>
                              	<td class="text-left">
                              		<a href="#" id="option-image-row<?php echo $option_value_row; ?>" data-toggle="image" class="img-thumbnail" >
                              		<img src="<?php if(!empty($goods_option_value['image'])){echo '/'.resize($goods_option_value['image'],100,100);}else{ echo '/public/static/image/no_image_100x100.jpg'; } ?>" alt="" title="" />
                              		<input type="hidden" name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][option_value_image]" value="<?php echo $goods_option_value['image']; ?>" id="input-image<?php echo $option_value_row; ?>" />
                              		</a>
                              	</td>
                              <?php } ?>
                              
                              <td class="text-left"><select name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][option_value_id]" class="form-control">
                                  <?php if (isset($option_values[$goods_option['option_id']])) { foreach ($option_values[$goods_option['option_id']] as $option_value) { ?>                                  
		                                  
		                                  <option value="<?php echo $option_value['option_value_id']; ?>" <?php if ($option_value['option_value_id'] == $goods_option_value['option_value_id']) {echo '  selected="selected"';} ?>><?php echo $option_value['value']; ?></option>
		                                                                   
	                                  <?php } } ?>
                                </select>
                                <input type="hidden" name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][goods_option_value_id]" value="<?php echo $goods_option_value['goods_option_value_id']; ?>" /></td>
                              <td class="text-right"><input type="text" name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][quantity]" value="<?php echo $goods_option_value['quantity']; ?>"  class="form-control" /></td>
                              <td class="text-left"><select name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][subtract]" class="form-control">
                                  <?php if ($goods_option_value['subtract']) { ?>
	                                  <option value="1" selected="selected">是</option>
	                                  <option value="0">否</option>
                                  <?php } else { ?>
	                                  <option value="1">是</option>
	                                  <option value="0" selected="selected">否</option>
                                  <?php } ?>
                                </select></td>
                              <td class="text-right"><select name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][price_prefix]" class="form-control">
                                  <?php if ($goods_option_value['price_prefix'] == '+') { ?>
                                  	<option value="+" selected="selected">+</option>
                                  <?php } else { ?>
                                  	<option value="+">+</option>
                                  <?php } if ($goods_option_value['price_prefix'] == '-') { ?>
                                  	<option value="-" selected="selected">-</option>
                                  <?php } else { ?>
                                  	<option value="-">-</option>
                                  <?php } ?>
                                </select>
                                <input type="text" name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][price]" value="<?php echo $goods_option_value['price']; ?>"  class="form-control" /></td>
                             <td class="text-right"><select name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][weight_prefix]" class="form-control">
                                  <?php if ($goods_option_value['weight_prefix'] == '+') { ?>
                                  	<option value="+" selected="selected">+</option>
                                  <?php } else { ?>
                                  	<option value="+">+</option>
                                  <?php } if ($goods_option_value['weight_prefix'] == '-') { ?>
                                  	<option value="-" selected="selected">-</option>
                                  <?php } else { ?>
                                  	<option value="-">-</option>
                                  <?php } ?>
                                </select>
                                <input type="text" name="goods_option[<?php echo $option_row; ?>][goods_option_value][<?php echo $option_value_row; ?>][weight]" value="<?php echo $goods_option_value['weight']; ?>"  class="form-control" /></td>
                              <td class="text-left"><button type="button" onclick="$(this).tooltip('destroy');$('#option-value-row<?php echo $option_value_row; ?>').remove();" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-trash bigger-120"></i></button></td>
                            </tr>
                            <?php $option_value_row++; } ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="6"></td>
                              <td class="text-left"><button type="button" onclick="addOptionValue('<?php echo $option_row; ?>','<?php echo $goods_option['type']; ?>');" data-toggle="tooltip"  class="btn btn-primary">添加选项</button></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <select id="option-values<?php echo $option_row; ?>" style="display: none;">
                        <?php if (isset($option_values[$goods_option['option_id']])) { foreach ($option_values[$goods_option['option_id']] as $option_value) { ?>
                        <option value="<?php echo $option_value['option_value_id']; ?>"><?php echo $option_value['value']; ?></option>
                        <?php } } ?>
                      </select>
                      <?php } ?>
                    </div>
                    <?php $option_row++; } } ?>	
	       						
	       						
	       					</div>
	       				</div>
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
var option_row = '<?php echo $option_row; ?>';

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
		html += '	<input type="hidden" name="goods_option[' + option_row + '][goods_option_id]" value="" />';
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
	
var option_value_row = '<?php echo $option_value_row; ?>';

function addOptionValue(option_row,type) {	
	html  = '<tr id="option-value-row' + option_value_row + '">';
	
	if(type=='select'){
		html+='		<td></td>';
	}else{			
		html+= '  <td class="text-left"><a href="#" id="option-image-row' + option_value_row + '"data-toggle="image" class="img-thumbnail"><img src="/public/static/image/no_image_100x100.jpg" /><input type="hidden" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][option_value_image]" value="" id="input-image' + option_value_row + '" /></td>';
	}
	
	html += '  <td class="text-left"><select name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][option_value_id]" class="form-control">';
	html += $('#option-values' + option_row).html();
	html += '  </select><input type="hidden" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][goods_option_value_id]" value="" /></td>';
	html += '  <td class="text-right"><input type="text" name="goods_option[' + option_row + '][goods_option_value][' + option_value_row + '][quantity]" value=""  class="form-control" /></td>'; 
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
	
$('#option a:first').tab('show');		

</script>

	</body>
</html>
