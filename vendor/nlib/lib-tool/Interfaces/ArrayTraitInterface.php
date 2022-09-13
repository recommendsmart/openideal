<?php

namespace nlib\Tool\Interfaces;

interface ArrayTraitInterface {

    /**
     *
     * @param array $values
     * @param integer $substr
     * @return string
     */
    public function assoc_to_GET(array $values, int $substr = 0) : string;

    /**
     *
     * @param array $values
     * @param integer $substr
     * @return string
     */
    public function array_to_GET(array $values, int $substr = 0) : string;

    /**
     *
     * @param array $var
     * @return boolean
     */
    public function is_assoc(array $var) : bool;

    /**
     *
     * @param array $keys
     * @param array $array
     * @return boolean
     */
    public function array_keys_exists(array $keys, array $array) : bool;
}