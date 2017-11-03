<?php
namespace app\api\controller;

use app\admin\model\CityInfo;
use app\common\message\Result;

class City 
{
	public function index()
    {
    	$result = new Result;
		
		$pid = input('pid');
		
		//数据查询
		$model = new CityInfo;
		$params = ['pid' => $pid];
		

		$level = 0;
		$cityinfo = CityInfo::get($pid);
		if(isset($cityinfo)){
			$level = $cityinfo->level;
		}

		$data = $model->getList($params);
		
		if($level!=0){
			$result->data = $data['rows'];
		}else{
			$result->data = list_to_tree($data['rows']);
		}
		
		$result->total =$data['total'] ;
		
		//json格式返回
		return json($result);
    }
}
