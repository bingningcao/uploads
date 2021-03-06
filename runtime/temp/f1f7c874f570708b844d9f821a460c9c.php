<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:39:"./themes/default/mobile/cart\index.html";i:1618966408;s:68:"D:\wamp64\www\project\oscshop\themes\default\mobile\public\base.html";i:1618966408;s:71:"D:\wamp64\www\project\oscshop\themes\default\mobile\public\top-nav.html";i:1618966408;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8" />
    <title><?php echo (isset($SEO['title']) && ($SEO['title'] !== '')?$SEO['title']:''); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">    
    
<script src="/public/static/jquery-weui/dist/lib/jquery-2.1.4.js"></script>
  
    
<link href="/public/static/view_res/mobile/css/cart.css" type="text/css" rel="Stylesheet" />
<link href="/public/static/jquery-weui/dist/lib/weui.min.css" type="text/css" rel="Stylesheet" />
<link href="/public/static/jquery-weui/dist/css/jquery-weui.min.css" type="text/css" rel="Stylesheet" />
<script src="/public/static/jquery-weui/dist/lib/fastclick.js"></script>
<script src="/public/static/jquery-weui/dist/js/jquery-weui.min.js"></script>
<script src="/public/static/jquery-weui/dist/js/city-picker.js"></script>
<script src="/public/static/js/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/public/static/artTemplate/template.js"></script>
<script src="/public/static/view_res/mobile/load_list.js"></script>
    
</head>
<body>

<div class="listTopcaption">
<div class="holder">
    <a class="listTopArrow"  onclick="history.go(-1)"></a>
    <a class="listTopArrow home"  href="<?php echo url('/mobile'); ?>"></a>
    <p><?php echo $top_title; ?></p>
</div>
</div>
<div class="TopcaptionPos"></div>



<input type="hidden" id="weight" value="<?php echo $weight; ?>" />
<input type="hidden" id="shipping" value="<?php echo (isset($shipping) && ($shipping !== '')?$shipping:''); ?>" />
<input type="hidden" id="city_id" value="<?php echo (isset($address['city_id']) && ($address['city_id'] !== '')?$address['city_id']:''); ?>" />
<input type="hidden" id="address_id" value="<?php echo (isset($address['address_id']) && ($address['address_id'] !== '')?$address['address_id']:''); ?>" />

<!-- ???????????? start -->
<?php if(!empty($goods)): if($shipping): ?>
		<div id="shipping_box">
			<div id="addrPick"></div>
			<header class="Thead">????????????</header>
			<div id="express-bar"></div>
			<div id="express_address">	
			<?php if(isset($address)): ?>   
			<div class="express-person-info clearfix">
			    <div class="express-person-name">
			        <span id="express-name"><?php echo (isset($address['name']) && ($address['name'] !== '')?$address['name']:''); ?></span><span id="express-person-phone"><?php echo (isset($address['telephone']) && ($address['telephone'] !== '')?$address['telephone']:''); ?></span>
			    </div>
			</div>
			<div class="express-address-info">
			    <span  id="express-address"><?php echo (isset($address['address']) && ($address['address'] !== '')?$address['address']:''); ?></span>
			</div>
			<?php else: ?>
				<div id="wrp-btn">????????????????????????</div>
				<div class="express-person-info clearfix">
			    <div class="express-person-name">
			        <span id="express-name"></span><span id="express-person-phone"></span>
			    </div>
			</div>
			<div class="express-address-info">
			    <span id="express-address"></span>
			</div>
			<?php endif; ?>
			</div>
		</div>
	<?php endif; endif; ?>	
<!-- ???????????? end -->

<header class="Thead">????????????</header>

<div id="orderDetailsWrapper" data-minheight="68px">
	
	<?php if(!empty($goods)): if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?>
	<section class="cartListWrap clearfix" id="goods<?php echo $d['cart_id']; ?>">
	
    <a href="<?php echo url('goods/detail',array('id'=>$d['goods_id'])); ?>"><img alt="<?php echo $d['name']; ?>"  src="/<?php echo $d['image']; ?>" /></a>
    
    <div class="cartListDesc">
        <p class="title">
            <a style="color:#000;" href="<?php echo url('goods/detail',array('id'=>$d['goods_id'])); ?>"><?php echo $d['name']; ?></a>
        </p>
        <p class="count">
        	<?php if($d['shipping'] == 0): ?>
        	<span class="spec Elipsis" style="border:1px solid #f60;color:#f60;">?????????</span><br />
        	<?php endif; ?>
            <span class="spec Elipsis">
              
                <?php if(is_array($d['option']) || $d['option'] instanceof \think\Collection || $d['option'] instanceof \think\Paginator): $i = 0; $__LIST__ = $d['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?>	
				<small><?php echo $option['name']; ?>:<?php echo $option['value']; ?></small><br />
				<?php endforeach; endif; else: echo "" ;endif; ?>
				
            </span>
            <?php if(isset($points)): ?>
            	<span class="dprice prices">?????????<?php echo round($d['pay_points'],2); ?></span>
            <?php else: ?>
            	<span class="dprice prices" id="prices<?php echo $d['cart_id']; ?>">&yen;<?php echo round($d['price'],2); ?>	</span>
            <?php endif; ?>	
            
            
        </p>
        <?php if(!isset($points)): ?>
        <dl id="select_number<?php echo $d['cart_id']; ?>" class="pd-dsc clearfix">
            <dt class="productCount clearfix">
            <a onclick='changeQty(0,"<?php echo $d['goods_id']; ?>","<?php echo $d['cart_id']; ?>","<?php echo $d['cart_id']; ?>"); return false;' class="btn productCountMinus" ></a>
            <span class="productCountNum"><input  onkeyup='change_quantity("<?php echo $d['goods_id']; ?>",this,"<?php echo $d['cart_id']; ?>","<?php echo $d['cart_id']; ?>");' minimum='<?php echo $d['minimum']; ?>' id="quantity<?php echo $d['cart_id']; ?>" size="5" type='text' value='<?php echo $d['quantity']; ?>' class="dcount productCountNumi" /></span>
            <a onclick='changeQty(1,"<?php echo $d['goods_id']; ?>","<?php echo $d['cart_id']; ?>","<?php echo $d['cart_id']; ?>"); return false;' class="btn productCountPlus" ></a>
            </dt>
        </dl>
		<?php endif; ?>
			
        <a class='cartDelbtn' cart_id='<?php echo $d['cart_id']; ?>'></a>
    </div>
	</section>
	<?php endforeach; endif; else: echo "" ;endif; else: if(!isset($points)): ?>
			<div id="cartnothing" onclick="location='<?php echo url("/mobile"); ?>'">????????????????????????????????????</div>
		<?php else: ?>
			<div id="cartnothing" onclick="location='<?php echo url("points/index"); ?>'">????????????????????????????????????</div>
		<?php endif; endif; ?>
</div>



<?php if(!empty($goods)): ?>		
		<section class="orderopt inp" id="beizhu">
            <span class="label">????????????</span>
            <input type="text" class="Elipsis" value="" id="comment" name="comment" id="input-remark" placeholder="????????????????????????????????????" />
        </section>	
			
        <!-- ???????????? -->
        <div id="orderSummay">
        	<?php if(!isset($points)): if($shipping): ?>
	            <div>
	                ?????? :<b class="prices"> &yen;</b> <b class="prices font13" id="order_yunfei"><?php echo $transport; ?></b>
	            </div>
				
	            <div>
	                ?????? : <b class="prices"> &yen;</b> <b class="prices font13 last" id="order_amount_sig"><?php echo $total_price; ?></b>
	            </div>
	            <div>
	                ?????? : <b class="prices"> &yen;</b> <b class="prices last" id="order_amount"><?php echo $total_price+$transport; ?></b>
	            </div>
	            
	            <?php else: ?>
	            <div>
	                ?????? : <b class="prices"> &yen;</b> <b class="prices last" id="order_amount"><?php echo $total_price; ?></b>
	            </div>
	            <?php endif; else: ?>
	            <div>
	                ?????? : <b class="prices"> </b> <b class="prices last" id="order_amount"><?php echo $total_point; ?> ??????</b>
	            </div>
            <?php endif; ?>
            
        </div>
	
		<?php if(!isset($points)): if(in_wechat()): ?>
	        	<div class="weui_btn_area">
				   <a class="weui_btn weui_btn_primary payment" id="wechat-payment-btn">??????????????????</a>
				</div>
	       <?php else: ?>
	       		<div class="weui_btn_area">
				   <a class="weui_btn weui_btn_primary payment" id="alipay-payment-btn">???????????????</a>
				</div>
	       <?php endif; else: ?>   
	    		<div class="weui_btn_area">
				   <a class="weui_btn weui_btn_primary payment" id="points-payment-btn">????????????</a>
				</div>
		<?php endif; endif; ?>



<script id="address_list" type="text/html">
    	<@each list as value i@>	        
	        <div class="weui-row">
		        <label class="weui_cell weui_check_label weui-col-80" for="s<@value.address_id@>">			        	
		          <div class="weui_cell_hd weui-col-20">
		          		<input type="hidden" id="city_id_<@value.address_id@>" value="<@value.city_id@>">
			            <input type="radio" class="weui_check" aid='<@value.address_id@>' name="choice_address" id="s<@value.address_id@>">
			            <i class="weui_icon_checked"></i>
		          </div>
		          <div class="weui_cell_bd weui_cell_primary weui-col-80">
			            <div>
					        <span id="name<@value.address_id@>"><@value.name@></span><span id="tel<@value.address_id@>"><@value.telephone@></span>
					    </div>
					    <div>
					    	<span id="address<@value.address_id@>"><@value.address@></span>
						</div>
		          </div>				          			
		        </label>
		        <div class="weui-col-20">
		          	<a href="javascript:;" aid='<@value.address_id@>' class="edit_address"></a>
		        </div>
	        </div>
        <@/each@>
</script>

<div id="choice" class='weui-popup-container popup-bottom'>
      <div class="weui-popup-overlay"></div>
      <div class="weui-popup-modal">
        <div class="toolbar">
          <div class="toolbar-inner">
            <a href="javascript:;" class="picker-button close-popup">??????</a>
            <h1 class="title">??????????????????</h1>
          </div>
        </div>
        <div class="modal-content">
            <div id="address">
          		<div class="weui_cells weui_cells_checkbox" id='mobile_address_list'>
          			
		        </div>          
          </div>
		  <div id="add_address" class="weui-row">
		  	<div class="weui-col-20">
		  		<a class="add_address"></a>
		  	</div>
		  	<div class="weui-col-80 weui_panel_access"><a class="weui_panel_ft" href="javascript:void(0);">???????????????</a></div>
		  </div>	
        </div>
      </div>
    </div>

<div id="eidt_address_form" class='weui-popup-container popup-bottom'>
<div class="weui-popup-overlay"></div>
      <div class="weui-popup-modal">
        <div class="toolbar">
          <div class="toolbar-inner">
            <a href="javascript:;" class="picker-button close-popup">??????</a>
            <h1 class="title">????????????</h1>
          </div>
        </div>
        
        <input type="hidden" id="update_type" value="add"> 
        <input type="hidden" id="update_address_id" value="0">      
          
        <div class="modal-content">
        	<div class="weui_cells weui_cells_form">
        		<div class="weui_cell">
			        <div class="weui_cell_hd"><label class="weui_label">?????????</label></div>
			        <div class="weui_cell_bd weui_cell_primary">
			          <input class="weui_input" name="name" type="text" placeholder="??????????????????">
			        </div>
			    </div>
			    <div class="weui_cell">
			        <div class="weui_cell_hd"><label class="weui_label">????????????</label></div>
			        <div class="weui_cell_bd weui_cell_primary">
			          <input class="weui_input" name="tel" type="text" placeholder="?????????????????????">
			        </div>
			    </div>
			    <div class="weui_cell">
			        <div class="weui_cell_hd"><label class="weui_label">????????????</label></div>
			        <div class="weui_cell_bd weui_cell_primary">
			          <input class="weui_input" name="area" id="area" type="text" placeholder="?????????????????????">
			        </div>
			    </div>
			    <div class="weui_cell">
			        <div class="weui_cell_hd"><label class="weui_label">????????????</label></div>
			        <div class="weui_cell_bd weui_cell_primary">
			           <input class="weui_input" name="address" type="text" placeholder="?????????????????????"> 			          
			        </div>
			    </div>
			    <div class="weui_btn_area">
			        <a class="weui_btn weui_btn_primary" href="javascript:" id="add_address_button">??????</a>
			      </div>
        	</div>
        </div>
      </div>	
</div>    
    
<script>

//???????????????????????????
function clear_form(){
	$('input[name="name"]').val('');
	$('input[name="tel"]').val('');
	$('input[name="area"]').val('');
	$('input[name="address"]').val('');
}

$(function(){
	
/**
 * ??????????????????
 */
$('.weui_check').live('click', function() {
	
	var address_id=$(this).attr('aid');
	
	var name=$('#name'+address_id).text();
	var tel=$('#tel'+address_id).text();
	var address=$('#address'+address_id).text();
	var city_id=$('#city_id_'+address_id).val();
	
	$('#express-name').html(name);
    $('#express-person-phone').html(tel);
    $('#express-address').html(address);
    
    $('#city_id').val(city_id);
    $('#address_id').val(address_id);
    
    $.showLoading();
    
    update_transport(address_id,city_id,$('#weight').val());
    
    setTimeout(function (){
        $.hideLoading();
        $.closePopup(); 
    }, 500);

});
/**
 * ??????????????????
 */
$('.edit_address').live('click', function() {
	$.closePopup()
	clear_form();
	$.showLoading();
	var aid=$(this).attr('aid');
	$.get(
		'<?php echo url("cart/get_address"); ?>',
		{
			aid:aid
		},
		function(d){
			if(d.error){
				$.hideLoading();
				$.toast(d.error, "forbidden");
			}else{				
					$('#update_type').val('edit');
					$('#update_address_id').val(aid);
					
					$('input[name="name"]').val(d['address']['name']);
					$('input[name="tel"]').val(d['address']['telephone']);
					$('input[name="area"]').val(d['area']);
					$('input[name="address"]').val(d['address']['address']);
			}
		}
	);
	   
	setTimeout(function (){
        $.hideLoading();
        $("#eidt_address_form").popup();
    }, 500);   

});
/**
 * ??????????????????
 */
$('#add_address').live('click', function() {
	$.closePopup(); 
	clear_form();
	
	$('#update_type').val('add');
	$('#update_address_id').val('0');
	
	$("#eidt_address_form").popup();
});
$("#area").cityPicker({
        title: "????????????"
});
//??????????????????
$('#add_address_button').live('click', function() {
	
	var name=$('input[name="name"]').val();
	var tel=$('input[name="tel"]').val();
	var area=$('input[name="area"]').val();
	var address=$('input[name="address"]').val();
	
	if(name==''){
		$.toast('???????????????',"forbidden");
	}
	if(tel==''){
		$.toast('??????????????????',"forbidden");
	}
	if(area==''){
		$.toast('??????????????????',"forbidden");
	}
	if(address==''){
		$.toast('??????????????????',"forbidden");
	}


	var strs= new Array();
	strs=area.split(" "); //???????????? 
	
	$.showLoading();
	
	$.post(
		'<?php echo url("cart/update_address"); ?>',
		{	
			name:name,
			tel:tel,			
			address:address,
			province:strs[0],
			city_id:strs[1],
			country_id:strs[2],
			type:$('#update_type').val(),
			address_id:$('#update_address_id').val(),
			weight:$('#weight').val(),
			
		},
		function(d){
			if(d.error){
				$.toast(d.error, "forbidden");
			}else{
				
				$('#city_id').val(d.city_id);
				$('#address_id').val(d.address_id);
				$('#express-name').html(name);
			    $('#express-person-phone').html(tel);
			    $('#express-address').html(address);
				$('#wrp-btn').remove();
				
				<?php if('points'!=input('param.type')){ ?>
					$('#order_yunfei').text(d['transport']['price']);				
					t=parseFloat($('#order_amount_sig').text())+parseFloat(d['transport']['price']); 				
					$('#order_amount').text(t.toFixed(2));
				<?php } ?>
			}
		}
	);

	setTimeout(function (){
        $.hideLoading();
        $.closePopup(); 
    }, 500);
	
});	
//??????????????????
$('#express_address').click(function(){
	
	$.showLoading();
	$("#mobile_address_list").html('');
	$.get(
		'<?php echo url("cart/get_address_list"); ?>',
		function(d){
			if(d.list){
				var data ={
                    list:d.list
                };           
                       
                var html = template('address_list', data);     
                            
                $("#mobile_address_list").append(html); 
               
            }     
		}
		
	);
	
	setTimeout(function (){
        $.hideLoading();
        $("#choice").popup();
    }, 500);
	
});

//???????????????
$('#alipay-payment-btn').click(function(){
	
	var city_id=$('#city_id').val();
	var address_id=$('#address_id').val();
	var comment=$('#comment').val();
	
	$.post(
		'<?php echo url("payment/alipay_pay"); ?>',
		{
			city_id:city_id,
			comment:comment,
			address_id:address_id
		},
		function(d){
			
			if(d.error){
				$.toast(d.error, "forbidden");
			}
			
			if(d.url){
				location=d.url;
			}
		}
	);
	
});

});	
</script>    
    






</body>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?32e3cb4cf7e5c6772c4dc1f5d496b6af";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>



<script>
<?php if(isset($error)){ ?>
	$.toast.prototype.defaults.duration='4000';
	$.toast('<?php echo $error; ?>', "forbidden");
<?php } ?>

//??????,????????????
function update_transport(address_id,city_id,weight){
	
	$.post(
		'<?php echo url("cart/update_transport"); ?>',
		{	address_id:address_id,	
			city_id:city_id,			
			weight:weight
		},
		function(d){
			if(d.error){
				$.toast(d.error, "forbidden");
			}else{
				$('#city_id').val(city_id);				
				 $('#wrp-btn').remove();
				<?php if('points'!=input('param.type')){ ?>
					$('#order_yunfei').text(d['transport']['price']);				
					t=(parseFloat($('#order_amount_sig').text())+parseFloat(d['transport']['price'])).toFixed(2); 				
					$('#order_amount').text(t);
				<?php } ?>
			}
		}
	);
	
}

function change_quantity(goods_id,input,cart_id,key){
	var qty=parseFloat(input.value);	
	
	var min=$(input).attr('minimum');	
	
	if(qty<min){		
		$.toast('??????????????????'+min,"forbidden");
		qty=min;
	}
	
	update_cart(goods_id,qty,cart_id,key);
}
/***???????????? start*****/
function changeQty(increase,goods_id,cart_id,key) {
    var qty = parseFloat($('#quantity' + key).val()); 

    if ( !isNaN(qty) ) {
    	//??????
		if(increase){			
			update_cart(goods_id,(qty+1),cart_id,key);
		}else{
			update_cart(goods_id,(qty-1),cart_id,key);
		}     
    }
}	

function update_cart(id,qty,cart_id,key){
	
	var city_id=$('#city_id').val();

	$.post(
		'<?php echo url("cart/update"); ?>',
		{id:id,q:qty,cart_id:cart_id,city_id:city_id},
		function(json){
			
			if(json.error){
		
				$.toast(json.error,"forbidden");
				if(json.url){
					setTimeout(function (){
				        location.href=json.url;
				    }, 1000);
				}
				if(json.minimum){
					$('#quantity' + key).val(json.minimum);	
				}
			}else{
				$('#quantity' + key).val(qty);		
					
				$('#prices' + key).text('???'+json['price']);			
				
				$('#order_amount_sig').text(json['total_all_price']);
				
				$('#order_amount').text((parseFloat(json.total_all_price)+parseFloat(json.transport)).toFixed(2));
				
				$('#order_yunfei').text(json['transport']);
				
				$('#weight').val(json['weight']);
			}
		}
	);
}
/***???????????? end *****/

/***?????? *****/
$('.cartDelbtn').click(function(){
	
	var key=$(this).attr('cart_id');
	var city_id=$('#city_id').val();
	
	$.showLoading();
	
	$.post(
		"<?php echo url('cart/remove'); ?>",
		{cart_id:key,
		city_id:city_id,
		<?php if('points'==input('param.type')){ ?>
		type:'points'	
		<?php } ?>	
		},
		function(json){
			
			if(json.error){
			
				$.toast(json.error,"forbidden");
				if(json.url){
					setTimeout(function (){
				        location.href=json.url;
				    }, 1000);
				}
				
				return;
			}
			
			$('#goods'+key).remove();
			
			if (json['total_num']!=0) {	
				
				<?php if(!isset($points)){ ?>
								
					if(city_id== ''){						
						
						$('.last').text(json['total_all_price']);
						
						$('#weight').val(json['weight']);
					}else{							
						//??????
						$('#order_amount_sig').text(json['total_all_price']);
						
						if(json['transport']){
							//??????
							$('#order_amount').text((parseFloat(json.total_all_price)+parseFloat(json.transport)).toFixed(2));
							//??????
							$('#order_yunfei').text(json['transport']);
						}else{
							//????????????
							//??????
							$('#order_amount').text((parseFloat(json.total_all_price)+parseFloat(0)).toFixed(2));
							//??????
							$('#order_yunfei').text(0);
							$('#shipping_box').remove();
							
							$('#city_id').val('');
							$('#address_id').val('');
						}
						
						$('#weight').val(json['weight']);
					}
				
				<?php }else{ ?>
					$('#order_amount').text(json.total_pay_points+' ??????');
					if(json['transport']){
						
					}else{
						//????????????						
						$('#shipping_box').remove();				
						$('#city_id').val('');
						$('#address_id').val('');
					}	
				<?php } ?>
			}else if(json['total_num']==0){
				<?php if(!isset($points)){ ?>
					$('#orderDetailsWrapper').append('<div id="cartnothing" onclick="location=\'<?php echo url("/mobile"); ?>\'">????????????????????????????????????</div>');
				<?php }else{ ?>
					$('#orderDetailsWrapper').append('<div id="cartnothing" onclick="location=\'<?php echo url("/mobile"); ?>\'">????????????????????????????????????</div>');	
				<?php } ?>	
				$('#beizhu').remove();
				$('#shipping_box').remove();
				$('#orderSummay').remove();
				$('.weui_btn_area').remove();
			}
			
			
			
		}
		
	);
	
	setTimeout(function (){
        $.hideLoading();
    }, 500);
	
});

//????????????
$('#points-payment-btn').click(function(){
	
	var city_id=$('#city_id').val();
	var address_id=$('#address_id').val();
	var comment=$('#comment').val();
	
	$.post(
		'<?php echo url("payment/points_pay"); ?>',
		{
			city_id:city_id,
			comment:comment,
			address_id:address_id
		},
		function(d){
			
			if(d.error){
				$.toast(d.error, "forbidden");
			}
			
			if(d.success){
				$.toast('????????????');
				
				setTimeout(function (){
			      location='<?php echo url("order/index"); ?>'; 
			    }, 500);
			
			}
		}
	);
	
});



</script>

<?php if(in_wechat()){ ?>
<!-- ??????JSSDK -->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<!-- ??????JSSDK -->
<script type="text/javascript">
wx.config({
    debug: false,
    appId: '<?php echo $signPackage['appId']; ?>',
    timestamp: <?php echo $signPackage['timestamp']; ?>,
    nonceStr: '<?php echo $signPackage['nonceStr']; ?>',
    signature: '<?php echo $signPackage['signature']; ?>',
    jsApiList: ['chooseWXPay']
});



//??????????????????
function count_transport(area_id,weight,name,tel,address,first_name,third_name){
	
	$.post(
		"<?php echo url('Cart/weixin_update_transport'); ?>",
		{area_id:area_id,weight:weight,name:name,tel:tel,address:address,province:first_name,country:third_name},
		function(d){
			
			if(d.city_id){
				
				$('#city_id').val(d['city_id']);
				
				$('#address_id').val(d['address_id']);	
				
				$('#order_yunfei').text(d['transport']['price']);
				
				t=parseFloat($('#order_amount_sig').text())+parseFloat(d['transport']['price']);  
				
				$('#order_amount').text(t.toFixed(2));
			}
		}
	);
} 

var o = {};
// localStorage??????
o.Storage = window.localStorage;
 // ????????????????????????
window.addressloaded = false;
// order id ????????????
window.orderId = false;


/**
 * ??????????????????
 */
$('#wechat-payment-btn').click(wepayCall);

/**
 * ??????????????????
 * @returns {undefined}
 */
function wepayCall() {

	
    //??????????????????????????????????????????????????????    
    <?php if($shipping){ ?>
    var address=$('#address_id').val();

    if (address=='') {
        alert('?????????????????????');
        return false;
    }     
	<?php } ?>
	
	var city_id=$('#city_id').val();
	var address_id=$('#address_id').val();
	var comment=$('#comment').val();

    	
    $('#wechat-payment-btn').addClass('disable').html('???????????????...');             

  	$.post("<?php echo url('Payment/weixin_pay'); ?>",
  	{
  		city_id:city_id,
		comment:comment,
		address_id:address_id
  	},
  	function (r) {
  		
  		if(r.error){
			$.toast(r.error, "forbidden");
			return;
		}
  		      		
        if (r.ret_code === 0) {
        
          if (r.bizPackage.package !== 'prepay_id=') {
                // ??????????????????
                r.bizPackage.success = wepayCallback;
                // ??????????????????
                r.bizPackage.cancel = wepayCancel;
                // ??????????????????
                r.bizPackage.fail = wepayError;
                // ??????????????????
                
                wx.chooseWXPay(r.bizPackage);
                // ????????????
                $('#wechat-payment-btn').removeClass('disable').html('??????????????????');
            } else {
                wepayError();
            }
        } else if(r.ret_code === 11){
            $('#wechat-payment-btn').removeClass('disable').html('??????????????????');
            alert('?????????????????????' + r.ret_msg);
        }
    });
      	
    
}
/**
 * ??????????????????
 * @param {type} res
 * @returns {undefined}
 */
function wepayCallback(res) {
	
	 if(res.errMsg == "chooseWXPay:ok" ) {
        location.href = "<?php echo url('PaySuccess/index'); ?>";
    
    	$('#wechat-payment-btn').removeClass('disable').html('??????????????????');
        }else{
            alert(res.errMsg);
        }
        
    }
   /**
 * ??????????????????
 */
function wepayError() {
    alert('????????????????????????');
    // ????????????
    $('#wechat-payment-btn').removeClass('disable').html('??????????????????');
    }      
   /**
 * ????????????????????????
 */
function wepayCancel() {
    // ????????????
    $('#wechat-payment-btn').removeClass('disable').html('??????????????????');
}         
    
</script>
	
<?php } ?>

</html>