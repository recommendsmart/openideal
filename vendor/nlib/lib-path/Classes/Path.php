<?php

namespace nlib\Path\Classes;

use nlib\Path\Interfaces\PathInterface;

class Path implements PathInterface {

    private static $_i = [];

    private $_root = '';
    private $_public = '';
    private $_config = '';
    private $_src = '';
    private $_resources = '';
    private $_var = '';
    private $_log = '';
    private $_cache = '';
    private $_vendor = '';

    private function __construct() {}

    public static function i(string $instance = 'i') : Path { 
        if(empty(self::$_i) || !(array_key_exists($instance, self::$_i) && !empty(self::$_i[$instance])))
            self::$_i[$instance] = new Path;

        return self::$_i[$instance];
    }

    public function init(string $dir) : self {
        $this->setRoot($dir)
        ->setPublic()
        ->setConfig()
        ->setSrc()
        ->setResources()
        ->setVar()
        ->setLog()
        ->setCache()
        ->setVendor();

        return $this;
    }

    public function _mkdir(string $dir, string $mode = '0770') : self {
        
        // $perm = octdec(substr(sprintf('%o', fileperms($dir)), -4));
        // $mode = octdec($mode);
        // if(!is_dir($dir)) mkdir($dir, $mode);
        // if(!empty($perm) && ($mode > $perm)) chmod($dir, $mode);

        return $this;
    }

    #region Getter

    public function getRoot() : string { return $this->_root; }
    public function getPublic() : string { return $this->_public; }
    public function getConfig() : string { return $this->_config; }
    public function getSrc() : string { return $this->_src; }
    public function getResources() : string { return $this->_resources; }
    public function getVar() : string { return $this->_var; }
    public function getLog() : string { return $this->_log; }
    public function getCache() : string { return $this->_cache; }
    public function getVendor() : string { return $this->_vendor; }

    #endregion

    #region Setter

    public function setRoot(string $root, bool $auto = true) : self { $this->_root = $auto ? $this->getRoot() . $root . DIRECTORY_SEPARATOR : $root; return $this; }
    public function setPublic(string $public = 'public', bool $auto = true) : self { $this->_public = $auto ? $this->getRoot() . $public . DIRECTORY_SEPARATOR : $public; return $this; }
    public function setConfig(string $config = 'config', bool $auto = true) : self { $this->_config = $auto ? $this->getRoot() . $config . DIRECTORY_SEPARATOR : $config; return $this; }
    public function setSrc(string $src = 'src', bool $auto = true) : self { $this->_src = $auto ? $this->getRoot() . $src . DIRECTORY_SEPARATOR : $src; return $this; }
    public function setResources(string $resources = 'Resources', bool $auto = true) : self { $this->_resources = $auto ? $this->getSrc() . $resources . DIRECTORY_SEPARATOR : $resources; return $this; }
    public function setVar(string $var = 'var', bool $auto = true) : self { $this->_var = $auto ? $this->getRoot() . $var . DIRECTORY_SEPARATOR : $var; $this->_mkdir($this->_var); return $this; }
    public function setLog(string $log = 'log', bool $auto = true) : self { $this->_log = $auto ? $this->getVar() . $log . DIRECTORY_SEPARATOR : $log; $this->_mkdir($this->_log); return $this; }
    public function setCache(string $cache = 'cache', bool $auto = true) : self { $this->_cache = $auto ? $this->getVar() . $cache . DIRECTORY_SEPARATOR : $cache; $this->_mkdir($this->_cache); return $this; }
    public function setVendor(string $vendor = 'vendor', bool $auto = true) : self { $this->_vendor = $auto ? $this->getRoot() . $vendor . DIRECTORY_SEPARATOR : $vendor; return $this; }

    #endregion
}