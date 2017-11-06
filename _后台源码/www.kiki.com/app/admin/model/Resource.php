<?php
namespace app\admin\model;
class Resource extends Admin {

    /**
     * 资源信息新增
     * by wu-mengyao
     */
    public function addResourceInfo($para) {
        //新增
       $id =  $this->insertGetId($para);
        return $id;
    }
    
    /**
     * 根据资源Id获取资源信息（图片，视频）
     * @author tang-minyi
     */
    public function getResourceInfoById($resourceId) {
        foreach ($resourceId as $key => $value) {
            $resourceInfo[$key] = $this -> field('id,size,mime,root,dir,file_name') -> where('id',$value['resource_id']) -> find();
            if ($resourceInfo[$key] != null){
                $resourceInfo[$key]['url'] = $resourceInfo[$key]['root'].$resourceInfo[$key]['dir'].$resourceInfo[$key]['file_name'];
                unset($resourceInfo[$key]['root']);
                unset($resourceInfo[$key]['dir']);
                unset($resourceInfo[$key]['file_name']);
            }
        }

        return $resourceInfo;
    }
    
    /**
     * 根据资源Id获取语音资源url（语音）
     * @author tang-minyi
     */
    public function getVoiceInfoById($resourceId) {
        $voiceInfo = $this -> field('root,dir,file_name') -> where('id',$resourceId) -> find();
        $voice_url = $voiceInfo['root'].$voiceInfo['dir'].$voiceInfo['file_name'];
        return $voice_url;
    }
}
?>

