<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

if (! function_exists('find_class_app')) {
    function find_class_app($items, $string)
    {
        $finded = 0;

        foreach ($items as $item){
            if(trim($item) == trim($string)){
                $finded = 1;
            }
        }
        return $finded;
    }
}
