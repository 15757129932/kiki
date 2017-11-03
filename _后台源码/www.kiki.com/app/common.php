<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * @param array $list 要转换的结果集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 */
function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = 'child', $root = 0) {
	//创建Tree
	$tree = array();

	if (is_array($list)) {
		//创建基于主键的数组引用
		$refer = array();

		foreach ($list as $key => $data) {
			$refer[$data[$pk]] = &$list[$key];
		}

		foreach ($list as $key => $data) {
			//判断是否存在parent
			$parantId = $data[$pid];

			if ($root == $parantId) {
				$tree[] = &$list[$key];
			} else {
				if (isset($refer[$parantId])) {
					$parent = &$refer[$parantId];
					if(!isset($parent[$child])){
						$parent[$child] = array();
					}
					$parent[$child][] = &$list[$key];
				}
			}
		}
	}

	return $tree;
}

/**
 * 调试输出
 * @param unknown $data
 */
function print_data($data, $var_dump = false) {
	header("Content-type: text/html; charset=utf-8");
	echo "<pre>";
	if ($var_dump) {
		var_dump($data);
	} else {
		print_r($data);
	}
	exit();
}

/**
 * 输出json格式数据
 * @param unknown $object
 */
function print_json($object) {
	header("content-type:text/plan;charset=utf-8");
	echo json_encode($object);
	exit();
}

/**
 * 账户密码加密
 * @param  string $str password
 * @return string(32)
 */
function md6($str) {
	$key = 'account_nobody';
	return md5(md5($str) . $key);
}

/**
 * 替换字符串中间位置字符为星号
 * @param  [type] $str [description]
 * @return [type] [description]
 */
function replaceToStar($str) {
	$len = strlen($str) / 2;
	//a0dca4d0****************ba444758]
	return substr_replace($str, str_repeat('*', $len), floor(($len) / 2), $len);
}

function mduser($str) {
	$user_auth_key = \think\Config::get('user_auth_key');
	return md5(md5($user_auth_key) . $str);
}

/**
 * 救援编码生成
 * @param  救援ID
 * @return
 * @author fang-bin
 */
function build_rescuecode($id) {
	$code = sprintf("%05d", $id);
	$code = date('Y') . date('m') . date('d') . $code;
	return $code;
}

/**
 * (通用递归)
 * @param type $data
 * @param type $pid
 * @param type $ck
 * @return array
 */
function forMatCityOld($data ,$pid = 0, $ck= 'child'){
    $result  = [];
    foreach($data as $k =>$v){
        if($v['pid']==$pid){
            $v[$ck] = forMatCityOld($data,$v['id']);
            array_push($result,$v);
        }   
    }
    return $result;
}

/**
 * 格式化distpicker插件所需的城市数据(初始化一次)
 * @param type $data
 * @param type $pid
 * @param type $ck
 * @return array
 */
function fmtCity($data){

  $result = [];
  $tmpItem = [];
  $tmpItem2 = [];
  $tmpItem3 = [];
  foreach($data as $k =>$v){
    
    if(!empty($v['child'])){//;;;;;;;;

     foreach($v['child'] as $k2 =>$v2){//--------------
      $tmpItem2[(string)$v2['id']]=$v2['name'];

    if(!empty($v2['child'])){//=====
     foreach($v2['child'] as $k3 =>$v3){
     $tmpItem3[(string)$v3['id']]=$v3['name'];
     } 
     $result[(string)$v2['id']]=$tmpItem3;
     $tmpItem3 = [];
    }//======
     } //--------------
$result[(string)$v['id']]=$tmpItem2;
    
    $tmpItem2 = [];
    }//;;;;;;;;

     $tmpItem[(string)$v['id']]=$v['name'];
  }
  $result["0"]=$tmpItem;
    return $result;
}

