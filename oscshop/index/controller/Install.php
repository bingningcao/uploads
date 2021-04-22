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
 
namespace osc\index\controller;
use osc\common\controller\ModuleInstall;
use think\Db;
class Install extends ModuleInstall{
	
	//此操作软删除相关配置，并未删除代码，如有需要请自行处理
	public function uninstall(){		
		//软删除模块表中相关信息
		Db::name('module')->where('module','index')->update(array('disabled'=>0));		
		storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'删除了index模块');
		//清除缓存
		clear_cache();		
		$this->success('卸载成功',url('admin/module/index'));
	}
	public function install(){
		$module='index';
		Db::name('module')->where('module',$module)->update(array('disabled'=>1,'updatetime'=>date('Y-m-d',time())));			
		storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'安装了模块'.$module);		
		clear_cache();		
		$this->success('安装成功',url('admin/module/index'));
	}
}
?>