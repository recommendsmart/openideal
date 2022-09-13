<?php

namespace nlib\Tool\Traits;

trait UrlTrait {

    public function get_current_url() : string {
        return $this->get_current_domain() . $_SERVER['REQUEST_URI'];
    }

    public function get_current_domain() : string {
        return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'];
    }

    public function directory_to_url(string $path) : string {
        return str_replace('\\', '/', $path);
    }
}