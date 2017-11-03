<?php
namespace app\admin\controller;

use app\common\controller\Common;
use think\Controller;
use think\Loader;
use think\Session;
use think\Request;
use think\Config;
use think\Url;
use app\common\tools;


/**
* 后台controller基础类
* @author aierui github  https://github.com/Aierui
 *
* @version 1.0 
*/
class Admin extends Common
{
	protected $uid = 0;
	protected $role_id = 0;

	function _initialize()
	{
		parent::_initialize();
		//判断是否已经登录

		if( !Session::has('userinfo', 'admin') ) {
			//$this -> error(lang('Please login first'), url('admin/Login/index'));
			$this -> redirect(url('admin/Login/index'));
		}
		$userRow = Session::get('userinfo', 'admin');
		//验证权限
		$request = Request::instance();
		$rule_val = $request->module().'/'.$request->controller().'/'.$request->action();
		$this->uid = $userRow['id'];
		$this->role_id = $userRow['role_id'];
		if($userRow['administrator']!=1 && !$this->checkRule($this->uid, $rule_val)) {
			$this->error(lang('Without the permissions page'));
		}
		
		
		$this -> assign('user', $userRow);
		$this -> assign('menus', $this->FilterMenu(false));
	}
	
	public function FilterMenu($boolShowNoAuth = true){
		$menus = Config::get('menu');
		$request = Request::instance();
		foreach($menus as $key=>$menu_item){
			$rule_val = $request -> module() . '/' . $key . '/index';
			$auth = $this -> checkRule($this -> uid, $rule_val);
		
			$has_sub = false;
			if(isset($menu_item['menu'])){
				foreach($menu_item['menu'] as $subkey=>$menu_subitem){
					$rule_val = $request -> module() . '/' . $subkey . '/index';
					$sub_auth = $this -> checkRule($this -> uid, $rule_val);
					$has_sub = $has_sub || $sub_auth;
					$menus[$key]['menu'][$subkey]['auth'] = $sub_auth;
					
					if($boolShowNoAuth && $sub_auth == false){
						unset($menus[$key]['menu'][$subkey]);
					}
				}
			}
			
			$menus[$key]['auth'] = $auth || $has_sub;
			
			if($boolShowNoAuth && $auth == false){
				unset($menus[$key]);
			}
			if(isset($menus[$key]['menu'])){
				if(count($menus[$key]['menu']) == 0){
					unset($menus[$key]);
				}
			}
		}
		return $menus;
	}

	public function goLogin()
	{
		Session::clear();
		$this->redirect( url('admin/login/') );
	}

	public function checkRule($uid, $rule_val)
	{
		$authRule = Loader::model('AuthRule');
		if(!$authRule->isCheck($rule_val)) {
			return true;
		}
		$authAccess = Loader::model('AuthAccess');
		if(in_array($rule_val, $authAccess->getRuleVals($uid))){
			return true;
		}
		return false;
	}

	//执行该动作必须验证权限，否则抛出异常
	public function mustCheckRule( $rule_val = '' )
	{
		$userRow = Session::get('userinfo', 'admin');
		if( $userRow['administrator'] == 1 ) {
			return true;
		}
		if( empty($rule_val) ) {
			$request = Request::instance();
			$rule_val = $request->module().'/'.$request->controller().'/'.$request->action();
		}

		if(!model('AuthRule')->isCheck($rule_val)) {
			$this->error(lang('This action must be rule'));
		}
	}
}

