<?php

namespace app\index\controller;

class Contact extends Common {

    public function _initialize() {
        parent::_initialize();
    }

    public function index() {

        
        return $this->fetch();
    }

}
