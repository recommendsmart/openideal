<?php

namespace nlib\Log\Interfaces;

interface LogTraitInterface {

    /**
     *
     * @param array $values
     * @param string $file
     * @return string
     */
    public function log(array $values, string $file = 'log_') : string;

    /**
     *
     * @param [type] ...$parameters
     * @return string
     */
    public function vlog(...$parameters) : string;

    /**
     *
     * @param [type] ...$parameters
     * @return void
     */
    public function dvlog(...$parameters) : void;

    /**
     *
     * @param string $file
     * @return void
     */
    public function endlog(string $file = 'log_') : void;

    /**
     *
     * @param array $values
     * @param string $file
     * @return void
     */
    public function dlog(array $values, string $file = 'log_') : void;

    /**
     *
     * @param array $values
     * @param string $file
     * @return void
     */
    public function jlog(array $values, string $file = 'log_') : void;

    /**
     *
     * @param integer|null $day
     * @return void
     */
    public function clog(?int $day = null) : void;

    /**
     *
     * @return string
     */
    public function getLog() : string;

    /**
     *
     * @param string $offset
     * @return string
     */
    public function l(string $offset = '1') : string;
}