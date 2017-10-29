<?php
namespace app\api\controller;

use app\admin\model\User;
use app\common\message\Result;
use app\admin\model\RescueInfo;

//需要身份验证的类需要引用（登陆接口除外）
use app\common\controller\Api;

class Index extends Api 
{
    public function index()
    {
    	$list = ["code"=>0,"message"=>"nihao"];
		
		$userModel = new User;
		$params = ['offset' => 0,'limit' => 10];
		$data =  $userModel->getList($params);
		
		$list['data1'] = $data;
		
		$userModel = new RescueInfo;
		$params = ['offset' => 0,'limit' => 10];
		$data =  $userModel->getList($params);
		
		$list['data2'] = $data;
		return json($list);
    }
	
	public function demo()
    {
    	$result = new Result;
		
		//[备注]上下文已有的用户数据
		//此处为了演示数据才赋值给$result。正式接口应该不需要返回这些值。
		$result->user_id = $this->user_id;
		$result->mobile = $this->mobile;
		$result->username = $this->username;
		$result->token = $this->token;
		
		//[必填]取width参数。
		$width = input('width');
		if(!isset($width)){
			exception("Width参数是必填的。",-1);
		}
	
		//[非必填]取size参数，未传入参size时，默认值为10
		$size = input('size',10);
		
		//数据查询
		$userModel = new User;
		$params = ['offset' => 0,'limit' => 10];
		$data =  $userModel->getList($params);
		
		//返回值赋值（Result对象的既有属性）
		$result->data = $data;
		//返回值赋值（Result对象的新属性）
		$result->width = $width;
		$result->size = $size;
		
		//json格式返回
		return json($result);
    }
}
