<?php
namespace app\common\controller;

use think\Config;
use think\Controller;
use think\Lang;

/**
 * 公用的控制器，pc、app、微信各端不需要控制权限的控制器，必须继承该控制器
 *
 * @author aierui github  https://github.com/Aierui
 * @version 1.0
 */

use app\admin\model\User;
use app\common\message\Result;

class Api extends Controller {
	public function _initialize() {
		
		$now_lang = $this -> getSetLang();
		$this -> assign('set_lang', $now_lang);
		
		//统一验证Token
		$this -> checktoken();
	}

	//暂时只做中英文切换
	public function getSetLang() {
		$lang = Lang::detect();
		if ($lang == 'zh-cn') {
			return 'en-us';
		}
		return 'zh-cn';
	}

	public function checktoken() {
		$token = input('token');
		if (!isset($token)) {
			exception('token值不能为空', -1);
		}
		$model = new User;
		$user = $model -> getUserByToken($token);

		if (isset($user)) {
			$this -> user_id = $user['id'];
			$this -> mobile = $user['mobile'];
			$this -> username = $user['username'];
			$this -> role_id = $user['role_id'];
			$this -> token = $token;
			$this -> user = $user;
		} else {
			exception('token已失效，请重新登录', -1);
		}

	}

}
