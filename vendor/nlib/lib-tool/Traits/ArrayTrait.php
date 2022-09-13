<?php

namespace nlib\Tool\Traits;

trait ArrayTrait {

    public function assoc_to_GET(array $values, int $substr = 0) : string {

        $string = '';

        if(!empty($values)) :
            foreach($values as $key => $value) $string .= '&' . $key . '=' . ($value);
            $string = substr($string, $substr);
        endif;

        return $string;
    }

    public function array_to_GET(array $values, int $substr = 0) : string {

        $string = '';

        if(!empty($values)) :
            foreach($values as $value) $string .= '&' . ($value);
            $string = substr($string, $substr);
        endif;

        return $string;
    }

    public function is_assoc(array $var) : bool {
        return array_values($var) !== $var;
    }

    public function array_keys_exists(array $keys, array $array) : bool {

        $badattempts = [];

        foreach($keys as $key)
            if(!array_key_exists($key, $array)) $badattempts[] = $key;

        return empty($badattempts);
    }

    public function array_search_method(bool $onkey) : string {
        return $onkey ? 'array_key_exists' : 'in_array';
    }

    public function array_merge(array $defaults, array $values) : array {

        foreach($values as $key => $value) $defaults[$key] = $value;

        return $defaults;
    }

    public function array_key_last(array $array) {
        end($array);
        return key($array);
    }

    public function array_key_first(array $array) {
        reset($array);
        return key($array);
    }
}