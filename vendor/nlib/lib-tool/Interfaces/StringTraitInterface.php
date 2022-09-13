<?php

namespace nlib\Tool\Interfaces;

interface StringTraitInterface {

    /**
     *
     * @param string $string
     * @param string $separator
     * @param bool $replaceSeparator
     * @return string
     */
    public function str_slug(string $string, string $separator = '-', bool $replaceSeparator = false) : string;

    /**
     *
     * @param integer $length
     * @param boolean $specialCharacters
     * @return string
     */
    public function str_random(int $length, bool $specialCharacters = false) : string;
}