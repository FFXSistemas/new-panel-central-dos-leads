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
