<?php

namespace nlib\Log\Traits;

// use nlib\Log\Traits\LogTrait;

trait DebugTrait {

    // use LogTrait;

    private $_debug = false;
    private $_die = false;

    protected function debug(...$debug) : void {
        if($this->_debug) :
            var_dump($debug);
            $logs = [__CLASS__ . '::' . __FUNCTION__ => json_encode($debug)];
            if(!$this->_die) $this->log($logs); else $this->dlog($logs);
        endif;
    }

    public function dd() : array { return [$this->_debug, $this->_die]; }

    public function setDebug(bool $debug = false, bool $die = false) : self { $this->_debug = $debug; $this->_die = $die; return $this; }
}