<?php

 //***アクセストークン**********************************************************************************************************************************************************************
$accessToken = '3SO5+xOCmVwoZZk8ueOVvXJUJAWdxRD+emfHXzqQZdla6zBBXiBnq40VPsyWmCVez0qCq6oar6sef6xBWuFqKEV+pk4OEU15IumsBaR8TgUlgK7VYzXUyyszZd2UIc3XYSrBnk6ymcIVXJa5H6GlRgdB04t89/1O/w1cDnyilFU=';

//***変数宣言****************************************************************************************************************************************************************************
$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$text = $message->{"text"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
$line_source = $jsonObj->{"events"}[0]->{"source"};
$userID = $line_source->{"userId"};
$msgFlag = 0;

if ($jsonObj->events[0]->type == 'postback') {
    if ($jsonObj->events[0]->postback->data != 'value') {
        $postback = $jsonObj->events[0]->postback->data;
        parse_str($postback, $data);
        $text = $data["mess"];
    }
}
$text = trim($text);

//***天気予報********************************************************************************************************************************************************************************
if ($text == 'forecast' or $text == '天気予報' or $text == 'てんきよほう') {

    $json = file_get_contents(__DIR__.'/main/flexJson/calTenki.json');
    $json = json_decode($json,true);

    $messageData = [
        'type' => 'flex',
        'altText' => '地域選択',
        'contents' => $json
    ];

}

elseif ($text == 'WeekOsaka' or $text == 'WeekKyoto' or $text == 'WeekHyogo') {
    require_once __DIR__ . ("/main/weath.php");
}

//***交通機関選択**************************************************************************************************************************************************************************
elseif (strstr($text,'今')) {
    require_once __DIR__ . ("/main/now.php");
}

elseif ($text == 'Train' or $text == '電車' or $text == 'train' or $text == 'KyobashiSt'
    or $text == '京橋発' or $text == '京橋から' or $text == 'kh2' or $text == 'NagaoSt'
    or $text == '長尾駅発' or $text == 'Localbus' or $text == 'バス' or $text == 'bus'
    or $text == 'goNag' or $text == 'goNag2' or $text == 'goKita' or $text == 'goKita2'
    or $text == 'goKuz' or $text == 'goKuz2' or $text == 'goKitafK' or $text == 'goKitafK2'
    or $text == '時刻' or $text == 'じこく') {

    require_once __DIR__ . ("/main/Tr-Bs.php");
}

elseif ($text == 'オールなう' or $text == 'オールナウ' or $text == 'おナウ' or $text == 'おーるなう' or $text == 'AN') {
    require_once __DIR__ . ("/main/allNow.php");
}

elseif (strstr($text,'進数')) {
    require_once __DIR__ . ("/main/decimal.php");
}
//***レスポンス系*****************************************************************************************************************************************************************************
if ($msgFlag == 1) {
    $response = [
        'replyToken' => $replyToken,
        'messages' => [$messageData,$messageData2]
    ];
} else if ($msgFlag == 2) {
    $response = [
        'replyToken' => $replyToken,
        'messages' => [$messageData,$messageData2,$messageData3]
    ];
} else {
    $response = [
        'replyToken' => $replyToken,
        'messages' => [$messageData]
    ];
}
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
