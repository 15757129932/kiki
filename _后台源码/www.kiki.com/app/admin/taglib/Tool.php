<?php
namespace app\admin\taglib;

use think\template\TagLib;
use think\Request;
use think\Config;

/**
* 工具类标签
*/

class Tool extends Taglib
{

    // 标签定义
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        'toolbar'           => ['attr' => 'id,btns,target'],
        'filters'           => ['attr' => 'id','close' => 1],
        'filter'           => ['attr' => 'title,w,field,type,options,placeholder,caption','close' => 1],
    ];
	
	public function tagFilters($tag, $content){
		// 元素默认id
        if(empty($tag['id'])){
            $tag['id'] = 'filters';
        }
		$html  = '<form class="search-form" id="'.$tag['id'].'"><div class="row">';
		$html .= $content;
		$html .= '<div class="col-sm-1">'
                        . '<button type="submit" class="btn btn-primary">'
                        . '<i class="fa fa-search" aria-hidden="true" style="margin-right: 2px"> '
                        . '</i>{$Think.lang.Search}</button></div>';
        $html .= '</div></form>';
        
        return $html;
	}
	
	public function tagFilter($tag, $content){
		// 元素默认id
        if(empty($tag['id'])){
            $tag['id'] = 'filter';
        }
		
		// 元素默认id
        if(empty($tag['title'])){
            $tag['title'] = '';
        }
		if(empty($tag['options'])){
            $tag['options'] = 'default_options';
        }
		
		if(empty($tag['w'])){
            $tag['w'] = 2;
        }
		 if(empty($tag['field'])){
            $tag['field'] = '';
        }
		 if(empty($tag['type'])){
            $tag['type'] = 'text';
        }
		if(empty($tag['placeholder'])){
            $tag['placeholder'] = '';
        }
		if(empty($tag['caption'])){
            $tag['caption'] = '';
        }
		
		 $html  = '<div class="col-sm-'.$tag['w'].'"><div class="input-group"><span class="input-group-addon">'.$tag['title'].'</span>';
		 
		 if($tag['type'] == 'daterange'){
		 	 $html .= '<input type="text" name="'.$tag['field'].'" class="form-control daterange" placeholder="'.$tag['placeholder'].'" value="">';
		 }else if($tag['type'] == 'text'){
		 	 $html .= '<input type="text" name="'.$tag['field'].'" placeholder="'.$tag['placeholder'].'" class="form-control"  value="">';
		 }else if($tag['type'] == 'checkbox'){
		 	 $html .= '<label class="form-control"><input type="checkbox" name="'.$tag['field'].'" value="1" />'.$tag['caption'].'</label>';
		 }else if($tag['type'] == 'select'){
		 	$html .= ' <select name="'.$tag['field'].'" class="form-control"><option value="">请选择</option>';
		 	if(startwith($tag['options'],"$")){
				 $html .= '<?php foreach('.$tag["options"].' as $val=>$op){ ?>';
				 $html .= '<option value="<?php echo($op[\'id\']);?>" ><?php echo($op[\'name\']);?></option>';
				  $html .= '<?php  } ?>';
		 	}else{
		 		$options = Config::get($tag['options']);
				 foreach($options as $val=>$op){
				 	 $html .= '<option value="'.$val.'" >'.$op.'</option>';
				 }
			}
            $html .= '</select>';
		 }
		$html .= $content;
		$html  .= '</div></div>';
        
        return $html;
	}

    public function tagToolbar($tag, $content)
    {
       // 元素默认id
        if(empty($tag['id'])){
            $tag['id'] = 'toolbar';
        }
        
        if(empty($tag['btns'])){
            $tag['btns'] = array('add,delete');
        }else{
        	$btns_str = $tag['btns'];
        	$tag['btns'] = explode('|',$btns_str);
        }
	
	if(empty($tag['target'])){
            $tag['target'] = 'modal';
        }

        $request = Request::instance();
        $module = $request->module();
        $controller = $request->controller();
        $url = '/'.$module.'/'.$controller;

        $html  = '';
        $html .= '<div id="' . $tag['id'] . '" class="toolbar" data-module="'.$url.'">';
        $html .= '<div class="btn-group">';
        if(in_array('add',$tag['btns'])){
        $html .= '<button type="button" data-name="add" class="btn btn-primary" data-event-type="view" data-event-value=""  data-target="'.$tag['target'].'"><i class="fa fa-plus" aria-hidden="true" style="margin-right: 2px"> </i>{$Think.lang.Add}</button>';
        }
        if(in_array('delete',$tag['btns'])){
		 $html .= '<button type="button" data-name="delete" class="btn btn-primary" data-event-type="default" data-event-value="" data-target="modal"><i class="fa fa-trash" aria-hidden="true" style="margin-right: 2px"> </i>{$Think.lang.Delete}</button>';
		}
		if(in_array('import',$tag['btns'])){
		 $html .= '<a class="btn btn-primary" href="{:url(\'appcode/import\')}"><i class="fa fa-upload" aria-hidden="true" style="margin-right: 2px"> </i>{$Think.lang.import}</a>';
		}
		if(in_array('export',$tag['btns'])){
		 $html .= '<button type="button" data-name="export" class="btn btn-primary" data-event-type="view" data-event-value="" data-target="_blank"><i class="fa fa-file-excel-o" aria-hidden="true" style="margin-right: 2px"> </i>{$Think.lang.export}</button>';
		}
        $html .= '</div>';
        $html .= $content;
        $html .= '</div>';
        
        return $html;
    }

}
