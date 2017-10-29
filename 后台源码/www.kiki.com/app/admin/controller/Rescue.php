<?php
namespace app\admin\controller;

use think\Loader;


/**
* 救助信息管理
* @author zhou-yucheng
* @version 1.0 
*/
class Rescue extends Admin
{

    /**救援信息列表
     * @author doublecong
     * @return type
     */
    public function index()
    {
        
        return $this->fetch();
    }

    /**
     * 异步获取列表数据
     *
     * @author chengbin
     * @return mixed
     */
    public function getList()
    {
        if(!request()->isAjax()) {
            $this->error(lang('Request type error'), 4001);
        }

        $request = request()->param();
        $data = model('RescueInfo')->getListDc( $request );
        return $data;
    }
	
	
    /**
     * 保存数据
     * @param array $data
     *
     * @author chengbin
     */
    public function saveData()
    {
        //$this->mustCheckRule( 'admin/terminal/edit' );
        if(!request()->isAjax()) {
            return info(lang('Request type error'));
        }

        $data = input('post.');
        return model('RescueInfo')->saveData( $data );
    }
	
    /**
     * 添加
     */
    public function add()
    {

    }
    
       public function detail($id = 0)
    {
       if(intval($id) < 0){
            return info(lang('Data ID exception'), 0);
        }

        $data = model('RescueInfo')->get(['id'=>$id]);
        $data['create_time'] = date('Y-m-d H:i:s', $data['create_time']);

        if(!empty($data['police_id'])){
         $data['police_force'] = model('PoliceForce')->get($data['police_id']);
         }
         
        $rescue_type = config('rescue_type');
        
        $this->assign('rescue_type',$rescue_type);
        $this->assign('data',$data);
        return $this->fetch();
    }

        /**
     * 编辑
     * @param  string $id 数据ID（主键）
     */
    public function edit($id = 0)
    {   
        if(intval($id) < 0){
            return info(lang('Data ID exception'), 0);
        }

        $data = model('RescueInfo')->get(['id'=>$id]);
        $this->assign('data',$data);
        return $this->fetch();
    }
	

    /**
     * 删除
     * @param  string $id 数据ID（主键）
     */
    public function delete($id = 0){
        if(empty($id)){
            return info(lang('Data ID exception'), 0);
        }
        return model('RescueInfo')->deleteById($id);
    }
    
    public function  updateStatus($id,$status){
 
        $r = model('RescueInfo')->updateStatus($id,$status);
        if($r!== false){
            return info(lang('Edit succeed'), 1);
        }else{
            return info(lang('Edit failed'), 0);
        }
    }
    
    /**救援队下拉列表
     * @author doublecong
     * @return type
     */
    public function policeSelect(){
        
         $rescueId = input('rescueId',0);//救援ID
         if(intval($rescueId) < 0){
           return info(lang('Data ID exception'), 0);
         }
        
        
        $request = ["limit"=>100000000];
        $data = model("PoliceForce")->getList($request);
        
        $this->assign('data',$data['rows']);
        $this->assign('rescueId',$rescueId);
        
         return $this->fetch();
    }
    
    
    
    
    /**分配救援队
     * @author doublecong
     * @return type
     */
    public function allocatePolice(){
        
      
         $rescueId = input('rescueId',0);//救援信息ID     
         $policeForceInfo = input('policeForceInfo');//救援队信息
         
         if(intval($rescueId) <= 0 || empty($policeForceInfo) ){
           return info(lang('Data Params exception'), 0);
         }
         $policeForceInfo = explode('_',$policeForceInfo);
         
         $policeForceId = $policeForceInfo[0];//救援队ID
         $longitude = $policeForceInfo[1];//经度
         $latitude = $policeForceInfo[2];//纬度
         
         $rescueInfo = ['id'=>$rescueId,'status'=>2,'police_id'=>$policeForceId];
         $rescueLog = ['rescue_id'=>$rescueId,'longitude'=>$longitude,'latitude'=>$latitude]; 
         
         $r = model('RescueInfo')->update($rescueInfo);
         $r2 =  model('RescueLog')->save($rescueLog);

          return info(lang('Edit succeed'), 1);     
         
    }

   
}