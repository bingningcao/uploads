<?php
/**
 * oscshop2 B2C电子商务系统
 *
 * ==========================================================================
 * @link      http://www.oscshop.cn/
 * @copyright Copyright (c) 2015-2016 oscshop.cn. 
 * @license   http://www.oscshop.cn/license.html License
 * ==========================================================================
 *
 * @author    李梓钿
 *
 */
 
namespace osc\mobile\controller;
use think\Db;

class User extends MobileBase
{
	protected function _initialize(){
		parent::_initialize();						
		define('UID',osc_service('mobile','user')->is_login());	
		//手机版
		if(!UID){
			if(!in_wechat()){
				$this->redirect('login/login');	
			}else{
				$this->error('系统错误');
			}			
		}		
	}
	
	function index(){
		
		$this->assign('no_pay',$this->order_count(config('default_order_status_id')));	
		$this->assign('paid',$this->order_count(config('paid_order_status_id')));			
		$this->assign('userinfo',Db::name('member')->where('uid',UID)->find());		
		$this->assign('SEO',['title'=>config('SITE_TITLE')]);
		
		$this->assign('flag','user');
		
		return $this->fetch();
	}
	
	function order_count($status){		
		return count(Db::name('order')->where(array('order_status_id'=>$status,'uid'=>UID))->select());		
	}
	
	function wish_list(){
		
		$this->assign('top_title','我的收藏');
		$this->assign('SEO',['title'=>'我的收藏-'.config('SITE_TITLE')]);
		return $this->fetch();
	}
	
	function ajax_wish_list(){
		
    	$page=(int)input('param.page');//页码
		
		$limit = (6 * $page) . ",6";			
			
		$list= Db::view('Goods','goods_id,image,price,name')
		->view('MemberWishlist','uid','Goods.goods_id=MemberWishlist.goods_id')						
		->where(array('MemberWishlist.uid'=>UID))->limit($limit)->select();
		
		if(isset($list)&&is_array($list)){
			foreach ($list as $k => $v) {				
				$list[$k]['image']=resize($v['image'], 200, 200);		
			}				
		}
		
		return $list;
		
	}
	function remove_wish(){
		
		$goods_id=(int)input('param.id');		
		Db::name('member_wishlist')->where(array('uid'=>UID,'goods_id'=>$goods_id))->delete();
		Db::name('member')->where('uid',UID)->setDec('wish',1);	
		storage_user_action(UID,user('nickname'),config('FRONTEND_USER'),'删除了收藏');
		
		$this->redirect('User/wish_list');
	}	
	
	function get_qr_code(){
		
		  $uid = user('uid');
		 
		  include_once EXTEND_PATH.'phpqrcode/phpqrcode.php';
		
		  $url=request()->domain().'/mobile/index/agent_share/osc_aid/'.hashids()->encode($uid);
		  	
		  $level=3;
		  
		  $size=4;	
		
		  $errorCorrectionLevel =intval($level) ;//容错级别 
		  
		  $matrixPointSize = intval($size);//生成图片大小 
		  
		  $path=DIR_IMAGE.'images/qrcode/';
		  
		  $fileName =$uid.'.png';
   
		    //判断文件是否存在，存在返回二维码图片名字
		  $checkFile = $path.$fileName;
		  
		  if (!is_dir($path)) {
				@mkdir($path, 0777);
		  }
		  
		  Db::name('wechat_share')->insert(['uid'=>UID,'type'=>'推广商城二维码','url'=>$url,'create_time'=>time()]);
		  
		  if(file_exists($checkFile)){	      
			  
			  return '/public/uploads/images/qrcode/'.$fileName;			  
		  } 
		  
		  //生成二维码图片 
		  \QRcode::png($url, $path.$fileName, $errorCorrectionLevel, $matrixPointSize);  
		 
		  return '/public/uploads/images/qrcode/'.$fileName;		 
	}








	

	


	function getUserInfo($uid){ //获取用户信息
		$res = Db::name('member')->where('uid',$uid)->field('uid,username')->find();
		return $res;
	}
	function getRandStr($length){ //随机数
		//字符组合
		$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$len = strlen($str)-1;
		$randstr = '';
		for ($i=0;$i<$length;$i++) {
		$num=mt_rand(0,$len);
		$randstr .= $str[$num];
		}
		return $randstr;
	}
	function uploadFile(){ //文件上传的方法
		$file = $_FILES;
		$file = $file['litpic'];
		$fileName = $file['name'];
		$format = strrchr($fileName, '.'); //文件后缀
		$name = $this->getRandStr(16) . '_' . date('YmdHis') . $format;
		$res = move_uploaded_file($_FILES["litpic"]["tmp_name"], 'public/uploads/images/osc1/customized/' . $name);
		if($res){
			return ['code'=>10000,'msg'=>'上传成功','path'=>'images/osc1/customized/' . $name];
		}else{
			return ['code'=>10001,'msg'=>'上传失败'];
		}
	}











	function uploads(){
		return $this->fetch(); 
	}


	function preview(){
		$uid = UID; //用户id
		$address = Db::name('address')->where('uid',$uid)->select();
		$this->assign('address',$address);
		// $params = input('get.');
		// $strsrc = $params['strsrc'];
		// $scale = $params['scale'];
		// $rotate = $params['rotate'];

		// $this->assign('strsrc',$strsrc);
		// $this->assign('scale',$scale);
		// $this->assign('rotate',$rotate);
		return $this->fetch();
	}





	function upImg(){
		$getUserInfo = $this->getUserInfo(UID);
		$imgPath = $this->uploadFile();
		$post = input('post.');
		$multiple = $post['multiple']; //放大比例
		$rotate = $post['rotate']; //旋转度数
		$imgPath = $imgPath['path']; //图片路径
		$contrast = $post['contrast']; //对比度
		$brightness = $post['brightness']; //明亮度

		$num = $post['num']; //订单数量
		$msg = $post['msg']; //订单留言
		$address = $post['address'];

		$uid = UID; //用户id
		$username = $getUserInfo['username']; //用户名

		$customized_params = array(
			'rotate'		=>	$rotate, //旋转多少度
			'multiple'		=>	$multiple, //放大缩小的倍数
			'contrast'		=>	$contrast, //对比度
			'brightness'	=>	$brightness,//明亮度
		);
		$customized_params = serialize($customized_params);

		$data = array(
			'is_customized'				=>				1,
			'name'						=>				$username.'_定制的酒瓶',
			'customized_userid'			=>				$uid,
			'date_added'				=>				date('Y-m-d H:i:s'), //提交时间
			'image'						=>				$imgPath, //上传的图片
			'status'					=>				1,//状态
			'quantity'					=>				$num,//数量
			'weight_class_id'			=>				2,//默认单位（克）
			'customized_params'			=>				$customized_params,
			'shipping'					=>				1, //是否需要运送
		);
		$goods_id = Db::name('goods')->insertGetId($data);

		if($goods_id){
			Db::name('goods_description')->insert(['goods_id'=>$goods_id]);
			Db::name('goods_to_category')->insert(['goods_id'=>$goods_id,'category_id'=>1]);

			//订单表
				$order = array();
				$order['pay_subject'] = $username.'_定制的酒瓶';
				$order['uid'] = $uid;
				$order['name'] = $username;
				$order['order_status_id'] = 3;
				$order['is_customized'] = 1; //是否定制
				session('order',$order);
			//订单表

			//订单商品表
				$order_goods = array();
				$order_goods['name'] = $username.'_定制的酒瓶';
				$order_goods['goods_id'] = $goods_id;
				$order_goods['quantity'] = $num;
				$_SESSION['order_goods'] = $order_goods;
				session('order_goods',$order_goods);
			//订单商品表


			//订单历史
				$history = array();
				$history['order_status_id'] = 3;
				$history['notify'] = 0;
				$history['date_added'] = time();
				$history['comment'] = $msg;
				session('history',$history);
			//订单历史

			//价格
				$order_total = array(
					[
						'code'=>'sub_total',
						'title'=>'商品价格',
						'text'=>'￥0',
						'value'=>'0.00',
						'sort_order'=>0
					],
					[
						'code'=>'shipping',
						'title'=>'运费',
						'text'=>'￥0',
						'value'=>'0.00',
						'sort_order'=>0
					],
					[
						'code'=>'total',
						'title'=>'总价	',
						'text'=>'￥0',
						'value'=>'0.00',
						'sort_order'=>0
					],
				);
				session('order_total',$order_total);
				// $_SESSION['order_total'] = $order_total;
				// foreach($order_total as $k=>$v){
				// 	Db::name('order_total')->insert($v);
				// }
			//价格

			//购物车
				$cart = array(
					'type'			=>			'money',
					'uid'			=>			$uid,
					'goods_id'		=>			$goods_id,
					'quantity'		=>			$num //数量
				);
				Db::name('cart')->insert($cart);
			//购物车
			return json(['code'=> 10000,'msg'=>'定制成功','gid'=>$goods_id]);
		}else{
			return json(['code'=>100001,'msg'=>'定制失败']);
		}
	}


	


	function xb_insertTable(){
		$order = input('post.');
		$order['date_added'] = time();
		$address_id = $order['address_id'];
		$address = Db::name('address')->where('address_id',$address_id)->find();
		$city_id = $address['city_id'];
		$country_id = $address['country_id'];
		$province_id = $address['province_id'];
		$order['shipping_city_id'] = $city_id;
		$order['shipping_province_id'] = $province_id;
		$order['shipping_country_id'] = $country_id;

		$order_id = Db::name('order')->insertGetId($order);
		
		//订单商品表
			$order_goods = session('order_goods');
			$order_goods['order_id'] = $order_id;
			Db::name('order_goods')->insert($order_goods);
		//订单商品表
		
		//订单历史
			$history = session('history');
			$history['order_id'] = $order_id;
			Db::name('order_history')->insert($history);
		//订单历史
		
		// 价格
			$order_total = session('order_total');
			foreach($order_total as $k=>$v){
				$order_total[$k]['order_id'] = $order_id;
			}
			foreach($order_total as $k=>$v){
				Db::name('order_total')->insert($v);
			}
		// 价格
		return json(['code'=> 10000,'msg'=>'定制成功','gid'=>$order_goods['goods_id']]);
	}


	
}

//2021 04 21 51991029