<?php

namespace nlib\Tool\Interfaces;

interface JsonTraitInterface {

    /**
     *
     * @param string $json
     * @param boolean $assoc
     * @param integer $depth
     * @param integer $options
     * @return null|mixed
     */
    public function _json_decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0);

    /**
     *
     * @param [type] $response
     * @return void
     */
    public function jsonResponse($response);
}