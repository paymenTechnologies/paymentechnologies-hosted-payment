<?php


function hashText($data)
{
    $str_data = '';
    foreach ($data as $key => $val) {
        if($key != 'customerip'){
            if($key != 'secret_key') {
                $str_data .= $val.'|';
                } else {
                    $str_data .= $val;
                }
        }
    }
    
    $output = hash ("sha512", $str_data);

    return $output;
}
