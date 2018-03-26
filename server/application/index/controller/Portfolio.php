<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Arctype;
use app\index\model\Archive;

class Portfolio extends Common {

    public function _initialize() {
        parent::_initialize();
    }

    public function index() {
        
        return $this->fetch();
    }

}
