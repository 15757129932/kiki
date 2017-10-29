<?php
namespace app\api\controller;
use app\common\message\Result;
use app\admin\model\User as userinfo;

class Login {

	//格式化数据
	private function _fmtData($data) {
		if (empty($data)) {
			return $data;
		}

		if (isset($data['create_time'])) {
			$data['create_time'] = date('Y-m-d H:i:s', $data['create_time']);
		}

		if (isset($data['update_time'])) {
			$data['update_time'] = date('Y-m-d H:i:s', $data['update_time']);
		}
		if (isset($data['role_id'])) {
			//1为普通用户，2为警员
			$data['usertype'] = $data['role_id'] == 3 ? 2 : 1;
			unset($data['role_id']);
		}

		return $data;
	}

	public function index() {
		$result = new Result;
		$newData;
		$policeModel = new \app\admin\model\PoliceInfo;
		$usercheck = new userinfo;
		//手机号
		$mobile = input('mobile');
		if (!isset($mobile)) {
			exception('手机号码不能为空', -1);
		}

		//登录类型   默认值=1
		$logintype = input('logintype', 1);
		if ($logintype != 1 and $logintype != 2) {
			exception('登陆模式错误', -1);
		}

		if ($logintype == 2) {
			//密码
			$password = input('password');
			if (!isset($password)) {
				exception('当前模式下密码不能为空', -1);
			}
			$para['password'] = mduser($password);
		}

		$para['mobile'] = $mobile;
		$para['logintype'] = $logintype;

		$data = $usercheck -> checkUser($para);
		if (empty($data)) {
			if ($logintype == 1) {
				//普通用户登陆不存在，user表添加
				$addinfo['mobile'] = $mobile;
				$addinfo['username'] = "游客" . substr($mobile, strlen($mobile) - 4, 4);
				$addinfo['status'] = 1;
				$addinfo['role_id'] = 4;
				$blnResule = $usercheck -> addUser($addinfo);
				if ($blnResule == false) {
					//用户增加失败
					exception("用户增加失败", -1);
				} else {
					$data = $model -> checkUser($para);
				}
			} else {
				//警员模式登陆者不存在
				exception("用户名或密码错误", -1);
			}
		} else {
			if ($logintype == 2) {
				//警员登陆
				$policeData = $policeModel -> getPoliceInfo($data['id']);
				$newData = $policeData;
			}
		}

		$data['token'] = md5($mobile . $logintype . time());
		$usercheck -> updateToken($data['id'], $data['token']);

		$newData['username'] = $data['username'];
		$newData['token'] = $data['token'];
		$newData['mobile'] = $data['mobile'];
		$newData['role_id'] = $data['role_id'];
		$newData['create_time'] = $data['create_time'];
		$newData['update_time'] = $data['update_time'];
		$result -> data = $this -> _fmtData($newData);
		return json($result);
	}

}
?>