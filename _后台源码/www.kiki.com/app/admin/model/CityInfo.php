<?php

namespace app\admin\model;

use think\Config;
use think\Db;
use think\Loader;
use think\Model;

class CityInfo extends Admin {


	protected $table = "city";
	public function getList($request) {

		$request = $this -> fmtRequest($request);

		$map = $request['map'];
		
		if(!isset($map['pid']) || $map['pid'] == null){
			$map['level'] = ['<',3];
			unset($map['pid']);
		}
		//查询，并缓存结果1小时
		$count = $this -> where($map)->cache(3600) -> order('id')  -> count();
		$data = $this -> where($map) ->cache(3600) -> order('id')  -> select();
		
		$data = $this -> _fmtData($data);

		$res = array('total' => $count, 'rows' => $data);

		return $res;
	}

	//格式化数据
	private function _fmtData($data) {
		if (empty($data) && is_array($data)) {
			return $data;
		}
		$res = array();
		foreach($data as $key=>$value){
			$res[] = [
				'id' => $value['id'],
				'name' => $value['name'],
				'pid' => $value['pid'],
				'level' => $value['level'],
			];
		}
		
		return $res;
	}
        
        //根据省，市，区，街道ID得到详细的地址
        public function getAddress($result){
            
            $province = $this->field('name')->where('id',$result['province'])->find();
            $city = $this->field('name')->where('id',$result['city'])->find();
            $area = $this->field('name')->where('id',$result['area'])->find();
            $street = $this->field('name')->where('id',$result['street'])->find();
            
            //直辖市的情况
            if($province['name'] == $city['name']){
                $address = $province['name'].$area['name'].$street['name'];
            }else{
                $address = $province['name'].$city['name'].$area['name'].$street['name'];
            }
            
            return $address;
        }
}
?>