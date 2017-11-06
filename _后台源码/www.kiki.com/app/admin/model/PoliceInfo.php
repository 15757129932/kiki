<?php

namespace app\admin\model;
use think\Config;
use think\Db;
use think\Loader;
use think\Model;

class PoliceInfo extends Admin {
    public function updateStatus($userId,$status)
    {
         //警员状态更新
        $this->allowField(true)->isUpdate(true)->save(['status'=>$status,'update_time'=>time()],['user_id'=>$userId]);
    }
    public function getPoliceInfo($userId)
    {
        if (empty($userId))
        {
            return null;
        }
        $user=Db::table('police_info')
        ->alias('info')
        ->join('police_force force','info.police_force_id = force.id')
        ->field('force.name policeforce,info.status')
        ->where('info.user_id',$userId)
        ->find();
        return $user;
    }
    
    /**
    * 根据user_id得到所属警队ID
    * @author tang-minyi
    */
    public function getPoliceForceIdByUserId($user_id){
        $data = $this -> field('police_force_id') -> where('user_id',$user_id) -> find();
        return $data['police_force_id'];
    }
}
?>