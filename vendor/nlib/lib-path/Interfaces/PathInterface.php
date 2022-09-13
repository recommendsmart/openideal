<?php

namespace nlib\Path\Interfaces;

interface PathInterface {

    /**
     *
     * @param string $instance
     * @return Path
     */
    public static function i(string $instance = 'i');

    /**
     *
     * @param string $dir
     * @param integer $mod
     * @return self
     */
    public function _mkdir(string $dir, string $mode = '0764');

    /**
     *
     * @param string $dir
     * @return self
     */
    public function init(string $dir);

    /**
     *
     * @return string
     */
    public function getRoot() : string;

    /**
     *
     * @return string
     */
    public function getPublic() : string;

    /**
     *
     * @return string
     */
    public function getConfig() : string;

    /**
     *
     * @return string
     */
    public function getVar() : string;

    /**
     *
     * @return string
     */
    public function getLog() : string;

    /**
     *
     * @return string
     */
    public function getCache() : string;

    /**
     *
     * @return string
     */
    public function getVendor() : string;

    /**
     *
     * @param string $root
     * @param boolean $auto
     * @return self
     */
    public function setRoot(string $root, bool $auto = true);
    
    /**
     *
     * @param string $public
     * @param boolean $auto
     * @return self
     */
    public function setPublic(string $public = 'public', bool $auto = true);
    
    /**
     *
     * @param string $config
     * @param boolean $auto
     * @return self
     */
    public function setConfig(string $config = 'config', bool $auto = true);
    
    /**
     *
     * @param string $var
     * @param boolean $auto
     * @return self
     */
    public function setVar(string $var = 'var', bool $auto = true);
    
    /**
     *
     * @param string $log
     * @param boolean $auto
     * @return self
     */
    public function setLog(string $log = 'log', bool $auto = true);

    /**
     *
     * @param string $log
     * @param boolean $auto
     * @return self
     */
    public function setCache(string $cache = 'log', bool $auto = true);

    /**
     *
     * @param string $vendor
     * @param boolean $auto
     * @return self
     */
    public function setVendor(string $vendor = 'vendor', bool $auto = true);
}