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
if (! function_exists('array_sort_for_role')) {
    function array_sort_for_role($items)
    {
        $finded = [];
        
        foreach ($items as $item){
            if ($item->id == 4){
                $finded[0] = $item;
            }else if ($item->id == 5){
                $finded[1] = $item;
            }else if ($item->id == 2){
                $finded[5] = $item;
            }else if ($item->id == 6){
                $finded[3] = $item;
            }else if ($item->id == 1){
                $finded[4] = $item;
            }else if ($item->id == 3){
                $finded[2] = $item;
            }else if ($item->id == 7){
                $finded[6] = $item;
        }
    }
    ksort($finded);
    // dd($finded);
        return $finded;
        }
}
