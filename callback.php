<?php

 //***アクセストークン**********************************************************************************************************************************************************************
$accessToken = '3SO5+xOCmVwoZZk8ueOVvXJUJAWdxRD+emfHXzqQZdla6zBBXiBnq40VPsyWmCVez0qCq6oar6sef6xBWuFqKEV+pk4OEU15IumsBaR8TgUlgK7VYzXUyyszZd2UIc3XYSrBnk6ymcIVXJa5H6GlRgdB04t89/1O/w1cDnyilFU=';

 //***json系*****************************************************************************************************************************************************************************
$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$text = $message->{"text"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
$line_source = $jsonObj->{"events"}[0]->{"source"};
$userID = $line_source->{"userId"};

//***天気系********************************************************************************************************************************************************************************
if ($text == '天気' || $text == 'てんき' || $text == '気象' || $text == '気象情報') {
    // ボタンタイプ
    $messageData = [
        'type' => 'template',
        'altText' => '情報選択',
        'template' => [
            'type' => 'buttons',
            'title' => '気象情報',
            'text' => 'どの情報？',
            'actions' => [
              [
                  'type' => 'postback',
                  'label' => '天気予報',

                  'text' => 'forecast',
                  'data' => 'value'
              ],
              [
                  'type' => 'postback',
                  'label' => '台風情報',

                  'text' => 'typhoon',
                  'data' => 'value'
              ],
              [
                  'type' => 'postback',
                  'label' => '雨雲レーダー',

                  'text' => 'rainmap',
                  'data' => 'value'
              ]
            ]
        ]
    ];
}

//***天気予報********************************************************************************************************************************************************************************
elseif ($text == 'forecast' || $text == 'forecast' || $text == '天気予報' || $text == 'てんきよほう') {
    // ボタンタイプ
    $messageData = [
        'type' => 'template',
        'altText' => '天気選択',
        'template' => [
            'type' => 'buttons',
            'title' => '天気予報',
            'text' => 'どこの予報？',
            'actions' => [
                [
                    'type' => 'uri',
                    'label' => '『枚方市』',
                    'uri' => 'https://goo.gl/xocMKr'
                ],
                [
                    'type' => 'uri',
                    'label' => '『大阪府』',
                    'uri' => 'https://goo.gl/zDoPwU'
                ],
                [
                    'type' => 'uri',
                    'label' => '『京都府』',
                    'uri' => 'https://goo.gl/sbXiYv'
                ],
                [
                    'type' => 'uri',
                    'label' => '『兵庫県』',
                    'uri' => 'https://goo.gl/3AuVUs'
                ]
            ]
        ]
    ];
}

//***交通機関選択**************************************************************************************************************************************************************************
elseif ($text == '時刻' || $text == 'じこく') {

    require_once "Tr-Bs.php";
}

 elseif (strstr($text,'今')) {
 	require_once "now.php";
 }

 elseif ($text == 'オールなう' || $text == 'オールナウ' || $text == 'おなう') {
   require_once "allNow.php";
 }

//***電車の駅選択**************************************************************************************************************************************************************************
elseif ($text == 'Train' || $text == '電車' || $text == 'train') {

    require_once "Tr-Bs.php";
  }
//***京橋発長尾方面**************************************************************************************************************************************************************************
elseif ($text == 'KyobashiSt' || $text == '京橋発' || $text == '京橋から') {

  require_once "Tr-Bs.php";
}
elseif ($text == 'kh2') {

    require_once "Tr-Bs.php";
}

//***長尾駅の向き**************************************************************************************************************************************************************************
elseif ($text == 'NagaoSt' || $text == '長尾駅発') {

    require_once "Tr-Bs.php";
}

//***バスの行き先選択***********************************************************************************************************************************************************************
elseif ($text == 'Localbus' || $text == 'バス' || $text == 'bus') {

    require_once "Tr-Bs.php";
}

//***北山中央から長尾駅行き時間帯選択*******************************************************************************************************************************************************************
elseif ($text == 'goNag') {

    require_once "Tr-Bs.php";
}
elseif ($text == 'goNag2') {

    require_once "Tr-Bs.php";
}

//***長尾駅から北山中央行き時間帯選択******************************************************************************************************************************************************************
elseif ($text == 'goKita') {

    require_once "Tr-Bs.php";
}
elseif ($text == 'goKita2') {

    require_once "Tr-Bs.php";
}

//***北山中央から楠葉駅行き時間帯選択*******************************************************************************************************************************************************************
elseif ($text == 'goKuz') {

    require_once "Tr-Bs.php";
}
elseif ($text == 'goKuz2') {

    require_once "Tr-Bs.php";
}

//***楠葉駅から北山中央行き時間帯選択******************************************************************************************************************************************************************
elseif ($text == 'goKitafK') {

    require_once "Tr-Bs.php";
}
elseif ($text == 'goKitafK2') {

    require_once "Tr-Bs.php";
}

//***進数*****************************************************************************************************************************************************************************
elseif (strstr($text,'進数')) {
  require_once "decimal.php";
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
