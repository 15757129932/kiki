<?php
namespace app\api\controller;
use app\common\message\Result;
use app\common\controller\Api;
use app\admin\model\user as userinfo;
use app\admin\model\PoliceInfo;
class User extends Api  {
	//格式化数据
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

	public function get() {
		$result = new Result;
                $policeModel=new PoliceInfo;
                $userModel=  new userinfo;
                //token
		$token = input('token');
		if (!isset($token)) {
                    exception('token不能为空', -1);
		}
                
                $user=$userModel->getUserByToken($token);
                $data['username']=$user['username'];
                $data['token']=$user['token'];
                $data['mobile']=$user['mobile']; 
                $data['role_id']=$user['role_id'];
                $data['create_time']=$user['create_time'];
                $data['update_time']= $user['update_time'];
                  
            if ($user['role_id']==3)
                {
                    //警员用户，警员信息取得
                     $policeData=$policeModel->getPoliceInfo($user['id']);
                     $data['policeforce']=$policeData['policeforce'];
                     $data['status']=$policeData['status'];
                }
		$result -> data = $this -> _fmtData($data);
		return json($result);
	} 
        public function update()
        {
                $result = new Result;
                $userModel=  new userinfo;
                $policeModel=new PoliceInfo;
                //token
		$token = input('token');
		if (!isset($token)) {
                    exception('token不能为空', -1);
		}
                //用户名
                $username = input('username');
                //警员状态 0：待命；1：救急；2：事假；
                $status = input('status');
 
                if (isset($username))
                {
                   //用户名更新                  
                   $blnResult= $userModel->updateUserInfo($username,$token);
                   if ($blnResult===false)
                   {
                        exception('用户名更新失败', -1);
                   }
                }
                $userInfo= $userModel->getUserByToken($token);
                $data['username']=$userInfo['username'];
                $data['token']=$userInfo['token'];
                $data['mobile']=$userInfo['mobile']; 
                $data['role_id']=$userInfo['role_id'];
                $data['create_time']=$userInfo['create_time'];
                $data['update_time']=$userInfo['update_time'];
                if ($userInfo['role_id']==3 &&isset($status) )
                {
                        //警员更新
                        $blnResult=$policeModel->updateStatus($userInfo['id'],$status);
                         //警员用户，警员信息取得
                        $policeData=$policeModel->getPoliceInfo($userInfo['id']);
                        $data['policeforce']=$policeData['policeforce'];
                        $data['status']=$policeData['status'];
                        if ($blnResult===false)
                       {
                            exception('状态更新失败', -1);
                       }
                }
                else
                {
                     exception('该用户为普通用户，无法修改状态', -1);
                }
                $result->data =$this->_fmtData($data);
                $result->code=0; 
                $result->message="";
                          
                return json($result);
       }
}
?>