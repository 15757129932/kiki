<?php

namespace app\admin\model;

use think\Config;
use think\Db;
use think\Loader;
use think\Model;
use traits\model\SoftDelete;

class RescueInfo extends Admin {

    use SoftDelete;
	protected $deleteTime = 'delete_time';

	//格式化数据
	private function _fmtData($data) {
		if (isset($data['create_time'])) {
			$data['create_time'] = date('Y-m-d H:i:s', $data['create_time']);
		}

		if (isset($data['update_time'])) {
			$data['update_time'] = date('Y-m-d H:i:s', $data['update_time']);
		}
		return $data;
	}

	//格式化数据
	private function _fmtDatas($data) {
		if (empty($data) && is_array($data)) {
			return $data;
		}
		foreach ($data as $key => $value) {
			$data[$key] = $this -> _fmtData($data[$key]);
		}
		return $data;
	}

	/**
	 * 获取救援信息列表
	 * @author tang-minyi
	 */
	public function getList($request) {

		$request = $this -> fmtRequest($request);

		$map = $request['map'];

		$condition = array();

		if (isset($map['user_id'])) {
			$condition['user_id'] = $map['user_id'];
		}

		if (isset($map['police_id'])) {
			$condition['police_id'] = $map['police_id'];
		}

		if (isset($map['status'])) {
			$condition['status'] = $map['status'];
		}

		$count = $this -> where($condition) -> order($map['order']) -> limit($request['offset'], $request['limit']) -> count();

		$data = $this -> where($condition) -> order($map['order']) -> limit($request['offset'], $request['limit']) -> select();

		$res = array('total' => $count, 'rows' => $data);

		return $res;
	}

	/**
	 * 获取附近的救援信息列表
	 * @author tang-minyi
	 */
	public function getLocationList($request) {

		$request = $this -> fmtRequest($request);

		$map = $request['map'];
                
                //计算救援信息的坐标到指定的经纬度点的直线距离
                $field = '*,round(6378.138 * 2 * ASIN(SQRT(POW(SIN(('.
                        $map['latitude'].' * PI() / 180 - latitude * PI() / 180) / 2),2) + COS('.
                        $map['latitude'].' * PI() / 180) * COS(latitude * PI() / 180) * POW(SIN(('.
                        $map['longitude'].' * PI() / 180 - longitude * PI() / 180) / 2),2))) * 1000) as distance';
                
                $count = $this -> field($field) -> where('status','<>',4) -> limit($request['offset'], $request['limit']) -> count();
                
                $data = $this -> field($field) -> where('status','<>',4) ->order('distance asc') -> limit($request['offset'], $request['limit']) -> select();

		$res = array('total' => $count, 'rows' => $data);

		return $res;
	}

	/**
	 * 获取救援信息列表
	 * @author doublecong
	 * @date 2017/10/19
	 * @param type $request
	 * @return type 救援信息列表
	 */
	public function getListDc($request) {

		$request = $this -> fmtRequest($request);

		if ($request['search'] != null) {
			$s = $request['search'];
			$request['map']['code|address_cn|address|longitude|latitude|alarm_person|alarm_phone'] = array('like', '%' . $s . '%');
		}

		$map = $request['map'];

		$count = $this -> where($map) -> limit($request['offset'], $request['limit']) -> count();

		$data = $this -> where($map) -> order(" status asc,create_time asc") -> limit($request['offset'], $request['limit']) -> select();

		$data = $this -> _fmtDatas($data);

		$res = array('total' => $count, 'rows' => $data);

		return $res;
	}

	/**
	 * 根据编码取救援信息
	 * @author fang-bin
	 */
	public function getRescueInfoByCode($code, $fields = null) {
		$data = $this -> where('code', $code) -> find();
		if (!empty($fields)) {
			$fields = explode(',', $fields);
			foreach ($data->toArray() as $key => $value) {
				if (!in_array($key, $fields)) {
					unset($data[$key]);
				}
			}
		}
		return $data;
	}

	/**
	 * 根据编码和用户Id获取取救援信息
	 * @author tang-minyi
	 */
	public function getRescueInfoByCodeAndUser($code, $user_id) {
		$data = $this -> where('code', $code) -> where('user_id', $user_id) -> find();
		return $data;
	}

	/**
	 * 救援信息新增并返回id值
	 * @author tang-minyi
	 */
	public function addRescueInfo($request) {
		$request = $this -> fmtRequest($request);
		$map = $request['map'];
		//新增并返回id值
		$id = $this -> insertGetId($map);
		return $id;
	}

	/**
	 * 根据id更新code
	 * @author tang-minyi
	 */
	public function updateCode($id, $code) {
		$this -> allowField(true) -> save(array('code' => $code), array('id' => $id));
	}

	/**
	 * 救援进度更新(更新救援状态、救援最后更新时间)
	 * @author tang-minyi
	 */
	public function updateStatus($request) {
		$request = $this -> fmtRequest($request);
		$map = $request['map'];
		$condition = array('code' => $map['code']);
		$newInfo = array('status' => $map['status'], 'update_time' => time());
		$count = $this -> where($condition) -> update($newInfo);
		return $count;
	}

}
?>