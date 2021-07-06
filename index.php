<?php

require_once 'functions.php';
include_once 'payment.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // important
    // please change the credentials to your own credentials
    
    // comment from this line to get data from request
    $data['authenticate_id'] = 'f0640b40293234fb6e74af58e4386736'; 
    $data['authenticate_pw'] = '7bac1d2672b919480e5308716fce2ab4';

    $data['orderid'] = date("Y").strtotime('now');
    $data['amount'] = '1';
    $data['currency'] = 'USD';
    $data['customerip'] = '127.0.0.1';
    // comment up to this line to get data from request

    $data['hash'] = hashText($data);

    // var_dump($data);

    $payment['authenticate_id'] = $data['authenticate_id'];
    $payment['authenticate_pw'] = $data['authenticate_pw'];
    $payment['orderid'] = $data['orderid'] ;
    $payment['amount'] = '1';
    $payment['currency'] = 'USD';
    $payment['customerip'] = '127.0.0.1';
    $payment['hash'] = $data['hash'];


    $result = new Payment($payment);

    echo 'result: '.$result->Pay();


} else {
    // set response code - 504 Not found
    http_response_code(504);
  
    echo json_encode(
        array("message" => "Invalid Request.")
    );
}
