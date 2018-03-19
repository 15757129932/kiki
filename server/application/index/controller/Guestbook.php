<?php

namespace app\index\controller;

use app\admin\model\Guestbook as Guestbooks;

class Guestbook extends Common {

    private $cModel;   //当前控制器关联模型

    public function _initialize() {
        parent::_initialize();
        $this->cModel = new Guestbooks;   //别名：避免与控制名冲突
    }

    public function create() { 
        $data = input();

        $result = $this->cModel->allowField(true)->save($data);

        if ($result) {
            return   $this->success("提交成功", "Contact/index");
        } else {
            return   $this->success("提交失败，请稍后再试～", "Contact/index");
        }
    }

}
