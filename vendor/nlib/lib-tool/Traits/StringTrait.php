<?php

namespace nlib\Tool\Traits;

use DateTime;

trait StringTrait {

    public function str_slug(string $string, string $separator = '-', bool $replaceSeparator = false) : string {

        $slug = '';
    
        if($separator !== '-' && $separator !== '_') $separator = '-';
    
        $array = [
            'À'=>'a', 'Á'=>'a', 'Â'=>'a', 'Ã'=>'a', 'Ä'=>'a', 
            'Å'=>'a', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 
            'ä'=>'a', 'å'=>'a', 'Ç'=>'c', 'ç'=>'c', 'È'=>'e', 
            'É'=>'e', 'Ê'=>'e', 'Ë'=>'e', 'è'=>'e', 'é'=>'e', 
            'ê'=>'e', 'ë'=>'e', 'Ì'=>'i', 'Í'=>'i', 'Î'=>'i', 
            'Ï'=>'i', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 
            'Ò'=>'o', 'Ó'=>'o', 'Ô'=>'o', 'Õ'=>'o', 'Ö'=>'o', 
            'ð'=>'o', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 
            'ö'=>'o', 'Ù'=>'u', 'Ú'=>'u', 'Û'=>'u', 'Ü'=>'u', 
            'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'Ý'=>'y', 
            'ý'=>'y', 'ÿ'=>'y'
        ];
    
        $s = ($replaceSeparator) ? '\-\_' : '';
        
        $slug = strtr($string, $array);
        $slug = strtolower($slug);
        $slug = preg_replace('/([^a-z0-9' . $s . ']+)/i', $separator, $slug);
        $slug = trim($slug, $separator);
    
        return $slug;
    }

    public function str_random(int $length, bool $specialCharacters = false) : string {
        
        $alphabet = '0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN';
        if(!empty($specialCharacters)) $alphabet .= '#%$';
        
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    public function str_token(int $length, bool $specialCharacters = false) : string {
        
        $length -= 6;
        $token = $this->str_random($length, $specialCharacters) . (new DateTime('NOW'))->format('His');

        return str_shuffle($token);
    }
}