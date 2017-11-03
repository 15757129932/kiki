<?php

namespace app\admin\model;

use think\Config;
use think\Db;
use think\Loader;
use think\Model;
use traits\model\SoftDelete;

class PoliceForce extends Admin {
    
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    /**
     * 获取救援队信息列表
     * @author doublecong
     * @date 2017/10/22
     * @param type $request
     * @return 
     */
    public function getList($request) {

        $request = $this->fmtRequest($request);

        $map = $request['map'];

        $count = $this->where($map)->limit($request['offset'], $request['limit'])->count();

        $data = $this->where($map)->limit($request['offset'], $request['limit'])->select();

        $data = $this->_fmtData($data);

        $res = array('total' => $count, 'rows' => $data);

        return $res;
    }
    
    /**
     * 根据警队ID得到警队名，经度，纬度
     * @author tang-minyi
     */
    public function getPoliceForceInfo($polieId) {

        $rescueTeam = $this -> field('name,latitude,longitude') -> where('id',$polieId) -> find();

        return $rescueTeam;
    }
	
    //格式化数据
    private function _fmtData($data) {
        if (empty($data) && is_array($data)) {
            return $data;
        }
        foreach ($data as $key => $value) {
                $data[$key]['create_time'] = date('Y-m-d H:i:s', $value['create_time']);
        }

        return $data;
    }

   

}

?>