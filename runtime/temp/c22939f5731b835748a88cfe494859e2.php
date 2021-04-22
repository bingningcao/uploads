<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:45:"./themes/default/mobile/order\order_info.html";i:1619056452;s:68:"D:\wamp64\www\project\oscshop\themes\default\mobile\public\base.html";i:1618966408;s:71:"D:\wamp64\www\project\oscshop\themes\default\mobile\public\top-nav.html";i:1618966408;s:74:"D:\wamp64\www\project\oscshop\themes\default\mobile\public\footer-nav.html";i:1618966408;}*/ ?>
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
    
    <script src="/public/static/js/jquery/jquery-1.10.2.min.js"></script>   
      
    
<link href="/public/static/view_res/mobile/css/uc.css" type="text/css" rel="Stylesheet" />
    
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


<?php use think\Db; ?>
<div class="exp-item-info clearfix" style="margin-top:0;">
    <span class="order-status"><?php echo get_order_status_name($order['order']['order_status_id']); ?></span>
    <span class="order-id">订单号： <?php echo $order['order']['order_num_alias']; ?> </span>
</div>
<?php if($order['order']['address_id'] != 0): ?>
<div class="exp-item-info" style="background:url(/public/static/view_res/mobile/images/icon/od-exp-bh.png) left top repeat-x #fff;padding:0;padding-top:15px;">
    <div style="padding:0 10px;">
        <div class="clearfix">
            <span class="od-name"><?php echo $order['order']['shipping_name']; ?></span>
            <span class="od-tel"><?php echo $order['order']['shipping_tel']; ?></span>
        </div>
        <div class="od-address">
        	<?php echo get_area_name($order['order']['city_id']).','.get_area_name($order['order']['country_id']).','.$order['order']['address']; ?>
		</div>
    </div>
    <div style="height:15px;background:url(/public/static/view_res/mobile/images/icon/od-exp-bh.png) left bottom repeat-x #fff;"></div>
</div>
<?php endif; ?>
<div class="exp-item-info">
    <div class="exp-item-caption">物品信息</div>
    <?php if(is_array($order['order_product']) || $order['order_product'] instanceof \think\Collection || $order['order_product'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['order_product'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?>
        <div class="clearfix items" onclick="location = '<?php echo url("goods/detail",array("id"=>$d["goods_id"])); ?>';">
            <img class="ucoi-pic" src="/<?php echo resize($d['image'],100,100); ?>">
            <div class="ucoi-con">
                <span class="title Elipsis"><?php echo $d['name']; ?></span>                        
                <?php if($option_list=Db::query('select * from '.config('database.prefix').'order_option where order_goods_id='.$d['order_goods_id'].' and order_id='.$d['order_id'])){ foreach ($option_list as $option) { ?>		               
                &nbsp;<span class="spec"><?php echo $option['name']; ?>: <?php echo $option['value']; ?></span>
                <?php } } if($order['order']['points_order']==0){ ?>                       
                <span class="price"><span class="prices">&yen; <?php echo round($d['price'],2); ?></span> x <span class="dcount"><?php echo $d['quantity']; ?></span></span>
               <?php } ?>
               
            </div>
        </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="exp-item-info">
    <div class="exp-item-caption">订单信息</div>
    
    <div class="exp-payinfo clearfix">
        <span class="left">订单编号：</span>
        <span class="right" style="color:#777;"><?php echo $order['order']['order_num_alias']; ?></span>
    </div>    

    <?php if($order['order']['return_points'] != 0): ?>	
        <div class="exp-payinfo clearfix">
            <span class="left">获得积分：</span>
            <span class="right" style="color:#777;"><?php echo $order['order']['return_points']; ?></span>
        </div>
    <?php endif; if($order['order']['points_order'] == 0): ?>	
        <div class="exp-payinfo clearfix">
            <span class="left">订单总额：</span>
            <span class="right prices"><?php echo $order['order_total'][2]['text']; ?></span>
        </div>
        <?php if($order['order']['address_id'] != 0): ?>
        <div class="exp-payinfo clearfix">
            <span class="left">运费：</span>
            <span class="right prices"><?php echo $order['order_total'][1]['text']; ?></span>
        </div>
        <?php endif; else: ?>
   		<div class="exp-payinfo clearfix">
            <span class="left">使用积分：</span>
            <span class="right prices"><?php echo $order['order']['pay_points']; ?></span>
        </div>
   <?php endif; ?>
</div>

<div class="exp-item-info">
    <div class="exp-item-caption">订单历史</div>    
  <?php if(is_array($order['order_history']) || $order['order_history'] instanceof \think\Collection || $order['order_history'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['order_history'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?>
    <div class="exp-payinfo clearfix">
        <span class="left"><?php echo date("Y-m-d H:i:s",$d['date_added']).' '.get_order_status_name($d['order_status_id']); ?> </span>
        <span class="right"><?php if(!empty($d['comment'])): ?>留言 : <?php echo $d['comment']; endif; ?> </span>
    </div>
  <?php endforeach; endif; else: echo "" ;endif; ?>
</div>



<footer id="footer">
<div class="bottom_nav"><a class="nav_index <?php if(isset($flag) AND ($flag == 'index')): ?> hover<?php endif; ?>" href="<?php echo url('/mobile'); ?>"><i></i>购物</a>
<a class="nav_search <?php if(isset($flag) AND ($flag == 'search')): ?> hover<?php endif; ?>" href="<?php echo url('category/index'); ?>"><i></i>搜索</a>	
<a class="nav_shopcart" href="<?php echo url('cart/index'); ?>"><i></i>购物车</a>	
<a class="nav_me <?php if(isset($flag) AND ($flag == 'user')): ?> hover<?php endif; ?>" href="<?php echo url('user/index'); ?>"><i></i>个人中心</a></div>		
</footer>

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

</script>

</html>