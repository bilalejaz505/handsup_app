<?php
require('Unifonic/Autoload.php');
use \Unifonic\API\Client;
$client = new Client();

//Kindly note that the newly added sender ID nust me approved by our system if you have any issue please contact our support team
$phone = $_POST['mobile'];
$sms = $_POST['messge'];
try {
    $response = $client->Messages->Send($phone,$sms,'966530438287');
	//$response = $client->Messages->SendBulkMessages('966505050505,966555655555','Hello','UNIFONIC');

    /* Examples */
   // $response = $client->Account->AddSenderID('newSenderName');
    //$response = $client->Voice->Call('',f);
    //$response = $client->Account->GetBalance();
    
    echo json_encode($response);
     
} catch (Exception $e) {
   
    echo $e->getCode();
}

