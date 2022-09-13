<?php

namespace nlib\Log\Traits;

use Exception;
use nlib\Path\Classes\Path;

trait LogTrait {

    private $_logignores = [];

    #region Public Method

    public function log(array $values, string $file = 'log_') : string {
        
        $log = $this->ilog($file);
        $string = '';
        
        $date = date('Y-m-d H:i:s');
        if(!empty($values = $this->rlog($values))) :
            if(reset($values) === "\n") $string = "\n";
            else foreach($values as $key => $value) $string .= '[' . $date . '] [' . $key . '] ' . (is_array($value) ? json_encode($value) : $value) . PHP_EOL;
        else : $string = '[' . $date . '] [' . __CLASS__ . '::' . __FUNCTION__ .'] Empty log values.' . PHP_EOL; endif;

        file_put_contents($log, $string, FILE_APPEND);

        return $string;
    }

    public function vlog(...$parameters) : string {

        $log = $this->ilog('vdlog_', 3);
        $vardump = '';

        ob_start();
        echo "\n". date('Y-m-d H:i:s') . "\n";
        var_dump($parameters);
        echo  "\n";
        $vardump = ob_get_clean();

        file_put_contents($log, $vardump, FILE_APPEND);

        return $vardump;
    }

    public function dvlog(...$parameters) : void {
        $vardump = $this->vlog(...$parameters);
        $this->endlog('vdlog_');
        die($vardump);
    }

    public function endlog(string $file = 'log_') : void { $this->log(["\n"], $file); }

    public function dlog(array $values, string $file = 'log_') : void {
        $message = $this->log($values, $file);
        $this->endlog($file);
        die($message);
    }

    public function jlog(array $values, string $file = 'log_') : void {
        header('Content-type: application/json');
        echo json_encode($values);
        $this->log($values, $file);
        $this->endlog($file);
        die;
    }

    public function clog(?int $day = null) : void {

        if(empty($log = $this->getLog())) die('[' . __CLASS__ . '::' . __FUNCTION__ .'] Log cannot be empty');

        if(empty($day)) $day = defined('LOG_LIFE_TIME') ? LOG_LIFE_TIME : 365;
        $excludes = ['.', '..', 'index.php', '.gitkeep', '.gitignore'];

        if($folder = opendir($log)) :

            while(false !== ($file = readdir($folder))) :
                
                if(!in_array($file, $excludes)) :

                    $time = explode('_', explode('.', $file)[0]);
                    if(strtotime(end($time)) < time() - $day * 24 * 3600) unlink($log . $file);

                endif;
            endwhile;

            closedir($folder);

        endif;
    }

    #endregion

    #region Getter

    public function getLog() : string {
        $i = (method_exists($this, $method = '_i')) ? $this->{$method}() : 'i';
        return Path::i($i)->getLog();
    }

    public function l(string $offset = '1') : string {
        return array_key_exists($offset, $traces = (new Exception())->getTrace())
        && array_key_exists($c = 'class', $traces[$offset])
        && array_key_exists($f = 'function', $traces[$offset]) ?
            $traces[$offset][$c] . '::' . $traces[$offset][$f] : '';
    }

    #endregion

    #region Setter
    
    public function setLogIgnores(array $ignores) : self { $this->_logignores = $ignores; return $this; }

    #endregion

    #region Private Method

    private function ilog(string $file, ?int $day = null) : string {

        if(empty($log = $this->getLog())) die('[' . __CLASS__ . '::' . __FUNCTION__ .'] Log cannot be empty');
        date_default_timezone_set('Europe/Brussels');
        // if(empty(is_dir($log))) mkdir($log, 0777);

        $this->clog($day);
        $log .= DIRECTORY_SEPARATOR . $file . date('Y-m-d') .'.log';
        $log = str_replace(DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, $log);

        return $log;
    }

    private function rlog(array $values) : array {
        
        if(!empty($ignores = $this->_logignores))
            foreach($values as $key => $value)
                foreach($ignores as $ignore)
                    $values[$key] = str_replace($ignore, '', $value);

        return $values;
    }
    
    #endregion
}