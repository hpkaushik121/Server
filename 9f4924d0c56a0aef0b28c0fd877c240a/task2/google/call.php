<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

use Twilio\Rest\Client;
if(isset($_GET['number'])&& isset($_GET['message'])){
require_once 'autoload.php';
$xml= simplexml_load_file("twiml.xml");
foreach($xml->children() as $res){
   $dom=dom_import_simplexml($res);
$dom->nodeValue = $_GET['message'];
}
file_put_contents("twiml.xml",$xml->saveXML());

// Your Account Sid and Auth Token from twilio.com/console
$sid    = "ACfb5bf79565b16c6ab852285c628dd736";
$token  = "6dd2b02359564f75af2374c9aa189634";
$twilio = new Client($sid, $token);

$call = $twilio->calls
               ->create($_GET['number'],
                        "+18033355502",
                        array("url" => "http://iserv.tech/task2/google/twiml.xml")
               );

echo "calling....";
}else{
	echo "failed to call";
}

?>