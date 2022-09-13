<?php

namespace nlib\Tool\Traits;

use InvalidArgumentException;
use stdClass;

trait ClassTrait {

    public function stdClass_recast($class, stdClass &$StdClass) {

        if (!class_exists($class))
            throw new InvalidArgumentException(sprintf('Inexistant class %s.', $class));

        $Class = new $class;

        foreach($StdClass as $property => &$value) :
        
            if(method_exists($Class, $method = 'set' . $property)) $Class->$method($value);
            else $Class->$property = &$value;

            unset($StdClass->$property);
        endforeach;

        unset($value);
        unset($StdClass);

        return $Class;
    }
}