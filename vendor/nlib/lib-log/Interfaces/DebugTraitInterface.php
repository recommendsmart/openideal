<?php

namespace nlib\Log\Interfaces;

interface DebugTraitInterface {

    /**
     *
     * @return array
     */
    public function dd() : array;

    /**
     *
     * @param boolean $debug
     * @param boolean $die
     * @return self
     */
    public function setDebug(bool $debug = false, bool $die = false);
}