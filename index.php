<?php

require_once 'functions.php';
include_once 'payment.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // important
    // please change the credentials to your own credentials
    $data['secret_key'] = '5e888e00ebb8d0.00099005';  // comment from this line to get data from request
    $data['authenticate_id'] = '1234567c8aef906300afd0001cb112bb';
    $data['authenticate_pw'] = '0cf12345678d38e1513dcc7e31234fdd';

    $data['orderid'] = '159';
    $data['amount'] = '1';
    $data['currency'] = 'USD';
    $data['customerip'] = '127.0.0.1'; // comment up to this line to get data from request

    $data['hash'] = hashText($data);

    var_dump($data);


    $result = new Payment($data);

    echo 'result: '.$result->Pay();


} else {
    // set response code - 504 Not found
    http_response_code(504);
  
    echo json_encode(
        array("message" => "Invalid Request.")
    );
}
