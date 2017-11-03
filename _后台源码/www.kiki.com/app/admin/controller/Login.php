<?php
namespace app\admin\controller;

use app\common\controller\Common;
use think\Controller;
use think\Loader;
use think\Request;
use think\Url;
use think\Session;
use think\Config;

/**
* 登录
* @author aierui github  https://github.com/Aierui
* @version 1.0 
*/
class Login extends Common
{
	/**
	 * 后台登录首页
	 */
	public function index()
	{
		if( Session::has('userinfo', 'admin') ) {
			$this->redirect( $this->GetHomeUrl());
		}
		return view();
	}

	/**
	 * 登录验证
	 */
	public function doLogin()
	{
		if( !Request::instance()->isAjax() ) {
			return $this->success( lang('Request type error') );
		}

		$postData = input('post.');
		$captcha = $postData['captcha'];
		if(!captcha_check($captcha)){
			return $this->error( lang('Captcha error') );
		};
		$loginData = array(
			'mobile'=>$postData['mobile'],
			'password'=>$postData['password']
		);
		$ret = Loader::model('User')->login( $loginData );
		if ($ret['code'] !== 1) {
			return $this->error( $ret['msg'] );
		}
		unset($ret['data']['password']);
		Session::set('userinfo', $ret['data'], 'admin');
		Loader::model('LogRecord')->record( lang('Login succeed') );
		return $this -> success($ret['msg'], $this->GetHomeUrl());
	}

	private function GetHomeUrl() {
		$goto_url = url('admin/index/index');
		return $goto_url;
	}
	/**
	 * 退出登录
	 */
	public function out()
	{
		session::clear('admin');
		return $this->success('退出成功！', url('admin/login/index'));
	}
}