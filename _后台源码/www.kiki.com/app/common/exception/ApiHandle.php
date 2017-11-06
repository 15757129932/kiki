<?php
namespace app\common\exception;

use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use app\common\message\Result;

class ApiHandle extends Handle {

	public function render(Exception $e) {
		$result = new Result();
		$result -> code = $e -> getCode()==0?-99:$e -> getCode();
		$result -> message = $e -> getMessage();
		return json($result);
		
	}

}
