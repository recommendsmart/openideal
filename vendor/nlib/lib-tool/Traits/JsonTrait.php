<?php

namespace nlib\Tool\Traits;

trait JsonTrait {

    public function _json_decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0) {
        $decoded = json_decode($json, $assoc, $depth, $options);
        return (json_last_error() == JSON_ERROR_NONE) ? $decoded : null;
    }

    public function jsonResponse($response) : void {
        header('Content-type: application/json');
        echo json_encode($response);
    }

}