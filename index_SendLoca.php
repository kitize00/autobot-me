<?php 
require_once('./vendor/autoload.php'); 

// Namespace 
use \LINE\LINEBot\HTTPClient\CurlHTTPClient; 
use \LINE\LINEBot; 
use \LINE\LINEBot\MessageBuilder\LocationMessageBuilder;

// Token 
$channel_token = 'AaC6MGkTB53CyXHhSFQtJ0jB/7N3Us/ZIlUtYpDuaLY59fhT8NRXI13cV3TuBewRIz6To7lN29uWOYAELcimK1ihnHKnN7wZE0F0infoxvns9AAaKMULnrWd9U//hUALyqAIsBTVDt9EVWo0/ly93AdB04t89/1O/w1cDnyilFU=';
$channel_secret = '9b9944d9c68676a215b2efa60ae862c9'; 

// Get message from Line API 
$content = file_get_contents('php://input'); 
$events = json_decode($content, true); 
if (!is_null($events['events'])) { 

// Loop through each event 
foreach ($events['events'] as $event) { 

// Get replyToken 
$replyToken = $event['replyToken']; 

// Location 
$title = 'I am here'; 
$address = 'Fitness 7 Ratchada'; 
$latitude = '13.7743425'; 
$longitude = '100.5680782'; 
$httpClient = new CurlHTTPClient($channel_token); 
$bot = new LINEBot($httpClient, array('channelSecret' => $channel_secret)); 
$textMessageBuilder = new LocationMessageBuilder($title, $address, $latitude, $longitude); 
$response = $bot->replyMessage($replyToken, $textMessageBuilder); 
} 
} 
echo "OK SendLocation";
