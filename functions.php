<?php


function hashText($data)
{
    // replace with your secret key
    $secret_key = '602681150d5a80.90373291';

    $str_data = '';
    foreach ($data as $key => $val) {
        if($key != 'customerip'){
            $str_data .= $val.'|';
        }
    }
    
    //append secret key
    $output = hash ("sha512", $str_data.$secret_key);

    return $output;
}
