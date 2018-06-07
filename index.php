<?php

//includeの代わりに、composerがvendorフォルダにダウンロードしたすべてのライブラリを参照できる
require_once __DIR__ . '/vendor/autoload.php';
require_once('bot/func.php');
require_once('bot/satbot.php');

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv('CHANNEL_SECRET')]);
$GLOBALS['step'] = 0;

//LINEからPOSTされてきたデータだけをパースし、Eventの配列である変数$eventsに格納する
$signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
try {
  $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
} catch(\LINE\LINEBot\Exception\InvalidSignatureException $e) {
  error_log("parseEventRequest failed. InvalidSignatureException => ".var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownEventTypeException $e) {
  error_log("parseEventRequest failed. UnknownEventTypeException => ".var_export($e, true));
} catch(\LINE\LINEBot\Exception\UnknownMessageTypeException $e) {
  error_log("parseEventRequest failed. UnknownMessageTypeException => ".var_export($e, true));
} catch(\LINE\LINEBot\Exception\InvalidEventRequestException $e) {
  error_log("parseEventRequest failed. InvalidEventRequestException => ".var_export($e, true));
}
foreach ((array)$events as $event) {
  // if (!($event instanceof \LINE\LINEBot\Event\MessageEvent)) {
  //   error_log('Non message event has come');
  //   continue;
  // }else
  // if (!($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)) {
  //   error_log('Non text message has come');
  //   continue;
  // }else {
    satbot($bot, $event);
  // }
}
//   $postdata = array("input" => array("text" => $event->getText()));
//   /*-------------test------------*/
//   if(getLastConversationData($event->getUserId())['conversationId']) {
//     $lastConversationData = getLastConversationData($event->getUserId());

//     $postdata["context"] = array("conversation_id" => $lastConversationData["conversationId"],
//       "system" => array("dialog_stack" => array(array("dialog_node" => $lastConversationData["dialogNode"])), 
//       "dialog_turn_counter" => $lastConversationData["dialog_turn_counter"],
//       "dialog_request_counter" =>  $lastConversationData["dialog_request_counter"])); 
//   }
//   /*------------------------------*/
//   $api_response = watson_personality_insights($postdata);
//   /*-------------test------------*/
//   $conversationId = $api_response["context"]["conversation_id"];
//   $dialogNode = $api_response["context"]["system"]["dialog_stack"][0]["dialog_node"];
//   $dialog_turn_counter = $api_response["context"]["system"]["dialog_turn_counter"];
//   $dialog_request_counter = $api_response["context"]["system"]["dialog_request_counter"];
//   $conversationData = array('conversation_id' => $conversationId, 'dialog_node' => $dialogNode,
//     "dialog_turn_counter" => $dialog_turn_counter, "dialog_request_counter" => $dialog_turn_counter);

//   setLastConversationData($event->getUserId(), $conversationData);
//   /*------------------------------*/
//   $outputText = $api_response['output']['text'][count($json['output']['text'])];
//   replyTextMessage($bot, $event->getReplyToken(), $outputText);
// }

// function watson_personality_insights($postdata) {
//     $api_url = "https://gateway.watsonplatform.net/conversation/api/v1/workspaces/46c631fc-27ad-4253-96ae-4037b7eeefee/message?version=2017-11-05";
//     $ch = curl_init($api_url);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     //watson username and password 
//     curl_setopt($ch, CURLOPT_USERPWD, "d0994402-75cf-4c2c-921a-0b0471f88427:ZMoC7XRU4y5n");
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));
//     error_log('input:'.print_r(json_encode($postdata),true));
//     $response= curl_exec($ch);
//     $response_decoded=json_decode($response, true);
//     error_log('output:'.print_r($response, true));
//     return $response_decoded;
// }
//  /*-------------test------------*/
// function setLastConversationData($userId, $lastConversationData) {
//   $conversationId = $lastConversationData['conversation_id'];
//   $dialogNode = $lastConversationData['dialog_node'];
//   $dialog_turn_counter = $lastConversationData['dialog_turn_counter'];
//   $dialog_request_counter = $lastConversationData['dialog_request_counter'];
//   error_log('setlast:'.print_r($lastConversationData,true));
//   if(!getLastConversationData($userId)['conversationId']){
//     DBinsert($userId,'', $conversationId, $dialogNode, $dialog_turn_counter, $dialog_request_counter);
//   }
//   else{
//     DBupdate($userId,'', $conversationId, $dialogNode, $dialog_turn_counter, $dialog_request_counter);
//   }

// }
//  /*-------------test------------*/
// function getLastConversationData($userId) {
//   $selectedData = DBselect($userId);
//   $last = array('conversationId' => $selectedData['conversationId'], 
//     'dialogNode' => $selectedData['dialogNode'],
//     'dialog_turn_counter' => $selectedData['dialog_turn_counter'], 
//     'dialog_request_counter' => $selectedData['dialog_request_counter']);
//   error_log('getlast:'.print_r($last,true));
//   return $last;
// }

 ?>