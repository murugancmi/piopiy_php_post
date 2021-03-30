<?php
  
// Create an array that contains another
// array with key value pair


$pcmo_action = array(
    array("action"=>"bridge",
    "duration"=>300,
    "timeout"=>20,
    "from" => 447,
    "loop" =>1,
    "connect" => array(
        array("type"=>"pstn",
        "number" => 9677551930) // second number to call
    )
    )
);

$options_data =  array(
    "appid" => 2222256, //your appid here
    "secret" => "6ee86ac8-xxxxx-xxxxxxxxx", //Your secret
    "from" => 44716, //your caller id
    "duration" => 300,
    "pcmo" => $pcmo_action,
    "to" => 9894 // FIrst number to call 
);

$piopiy_url = "https://piopiy.telecmi.com/v1/pcmo_make_call";

$ch = curl_init($piopiy_url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($options_data));                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json')                                                                       
);                                                                                                                   
$result = curl_exec($ch);
  
// Function to convert array into JSON
echo $result;
  
?>
