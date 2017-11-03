<?php
namespace app\common\message;

class Result {
	public $code;
	public $message;
	public $data;

	function __construct($code = 0, $message = '', $data = null) {// 构造函数
		$this -> code = $code;
		$this -> message = $message;
		$this -> data = null;
	}

}
?>