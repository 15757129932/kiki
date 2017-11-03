<?php

namespace app\admin\model;

use think\Config;
use think\Db;
use think\Loader;
use think\Model;

class RescueResource extends Admin {
        /**
	 * 救援资源表中新增数据
	 * @author tang-minyi
	 */
	public function addRescueResource($rescue_id,$resource) {
            
            $count = 0;
            foreach ($resource as $key => $value) {
                $data =array('rescue_id'=>$rescue_id,'resource_id'=>$value);
                $p = $this->insert($data);
                if($p > 0){
                    $count = $count + 1;
                }
            }

            return $count;
	}
        
        /**
	 * 根据救援ID获取资源ID
	 * @author tang-minyi
	 */
	public function getResourceById($rescue_id) {
            
            $resource = $this -> field('resource_id') -> where('rescue_id',$rescue_id) -> select();
            
            return $resource;
	}

	//格式化数据
	private function _fmtData($data) {
		if (empty($data) && is_array($data)) {
			return $data;
		}
		foreach ($data as $key => $value) {
			if (!isset($data[$key]['create_time'])) {
				$data[$key]['create_time'] = date('Y-m-d H:i:s', $value['create_time']);
			}

			if (!isset($data[$key]['update_time'])) {
				$data[$key]['update_time'] = date('Y-m-d H:i:s', $value['create_time']);
			}
			//$data[$key]['status'] = $value['status'] == 1 ? lang('Start') : lang('Off');
		}

		return $data;
	}

}
?>