<?php

if(! function_exists('convertUtf8')){
    /**
     * @param $value
     * @return null|string|string[]
     */
    function convertUtf8( $value ) {
        return mb_detect_encoding($value, mb_detect_order(), true) === 'UTF-8' ? $value : mb_convert_encoding($value, 'UTF-8');
    }
}

if(! function_exists('emailType')) {
    /**
     * @param $key
     * @return mixed|null
     */
    function emailType($key)
    {
        switch ($key) {
            case 1:
                return "<button class='btn btn-info btn-xs'>Crivo</button>";
                break;
            case 2:
                return "<button class='btn btn-danger btn-xs'>CPF Irregular</button>";
                break;
            case 3:
                return "<button class='btn btn-warning btn-xs'>Data Divergente</button>";
                break;
            default:
                return "<button class='btn btn-info btn-xs'>Crivo</button>";
                break;
        }
    }
}

if(! function_exists('strpos_recursive')) {
    /**
     * @param $haystack
     * @param $needle
     * @param int $offset
     * @param array $results
     * @return array
     */
    function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {
        $offset = strpos($haystack, $needle, $offset);
        if($offset === false) {
            return $results;
        } else {
            $results[] = $offset;
            return strpos_recursive($haystack, $needle, ($offset + 1), $results);
        }
    }

}

