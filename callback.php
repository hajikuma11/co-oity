<?php

 //***アクセストークン**********************************************************************************************************************************************************************
$accessToken = 'giGSB1hjJYQDOajwEg+W0jA+3bgstXKSsoxumgbYGZ3m0MPPqUoVD3xugDlPZOdjwPDiirs9LF8SQnvEJjUTiXpvVRVzSOJApgZrowDjByavjPshzsi/zrFg0Ip97l+7RUpV83ngNsQPTUwffnDL1QdB04t89/1O/w1cDnyilFU=';

 //***json系*****************************************************************************************************************************************************************************
$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$text = $message->{"text"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
$source = $jsonObj->{"events"}[0]->{"source"};
$userID = $source->{"userId"}

//***ID登録処理*************************************************************************************************************************
if ($text == 'RegID') {

  $messageData = [
   'type' => 'text',
   'text' => "$userID"
  ];

  }
//***レスポンス系*****************************************************************************************************************************************************************************
$response = [
    'replyToken' => $replyToken,
    'messages' => [$messageData]
];
error_log(json_encode($response));

$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
));
$result = curl_exec($ch);
error_log($result);
curl_close($ch);
