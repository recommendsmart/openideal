<?php

namespace nlib\Tool\Interfaces;

use stdClass;

interface ClassTraitInterface {

    /**
     *
     * @param [type] $class
     * @param stdClass &$StdClass
     * @return unknow Object Type
     */
    public function stdClass_recast($class, stdClass &$StdClass);
}