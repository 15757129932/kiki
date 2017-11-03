<?php
namespace app\admin\model;

use app\common\model\Common;
use think\Db;
use think\Model;

/**
 * 后台model基础类
 *
 * Class Admin
 * @package app\admin\model
 */
class Admin extends Common
{
    //格式化请求参数
    protected function fmtRequest( $request = [] )
    {
        if( empty($request) ) {
            return $request;
        }
        $offset = 0;
        $limit = 50;
		
        if (isset($request['offset']) && is_numeric($request['offset']) ) {
            $offset = $request['offset'];
            unset($request['offset']);
        }
        if (isset($request['limit']) && is_numeric($request['limit']) ) {
            $limit = $request['limit'];
            unset($request['limit']);
        }
		if (isset($request['page_size']) && is_numeric($request['page_size']) ) {
            $limit = $request['page_size'];
            unset($request['page_size']);
        }
        if (isset($request['page_no']) && is_numeric($request['page_no']) ) {
        	$page_no = $request['page_no'];
            $offset =  ($page_no -1) * $limit;
			if($offset<0){$offset =0;}
            unset($request['page_no']);
		}
                
        $search= null;
        if (isset($request['search']) ) {
            $search = $request['search'];
            unset($request['search']);
        }       
                
        $ret = [
            'offset'=>$offset,
            'limit'=>$limit,
            'map'=>$request,
            'search'=>$search
        ];
        return $ret;
    }
}
