<?php

namespace nlib\Instance\Traits;

trait InstanceTrait {

    protected $_iinstance = 'i';

    public function _i() { return $this->_iinstance; }

    public function setInstance(string $instance) { $this->_iinstance = $instance; return $this; }
}