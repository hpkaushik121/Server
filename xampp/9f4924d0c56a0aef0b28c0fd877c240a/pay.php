<?php

$api = new Instamojo\Instamojo('e81f901dba2c18c1956ac6b85529987c', 'f4c634172ab11c4cc6eb954469a6f500', 'https://test.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "FIFA 16",
        "amount" => "30",
        "send_email" => true,
        "email" => "master@iserv.tech",
        "redirect_url" => "http://www.iserv.tech/privacy/"
        ));
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>
