<?php

use App\Models\Tax;

if (!function_exists('activeSegment')) {
    function activeSegment($name, $segment = 2, $class = 'active')
    {
        return request()->segment($segment) == $name ? $class : '';
    }
}

function gstCalculation($amount)
{
    $tax = Tax::where('description','GST')->first();
    $output = ($amount  / 100) * $tax->rate;
    return number_format($output,2);
}

function shorting()
{
    return [
        '1'=>'Item Description Desc',
        '2'=>'Item Description Asc',
        '3'=>'Item Quantity Desc',
        '4'=>'Item Quantity Desc',
    ];
}
