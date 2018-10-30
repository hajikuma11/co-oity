<?php
date_default_timezone_set('Asia/Tokyo');
$Ntime = date("G");
//==============================================
if (6 <= $Ntime && $Ntime <= 8) {
  $TM = '6~8';
}
elseif (9 <= $Ntime && $Ntime <= 11) {
  $TM = '9~11';
}
elseif (12 <= $Ntime && $Ntime <= 14) {
  $TM = '12~14';
}
elseif (15 <= $Ntime && $Ntime <= 17) {
  $TM = '15~17';
}
elseif (18 <= $Ntime && $Ntime <= 20) {
  $TM = '18~20';
}
elseif (21 <= $Ntime && $Ntime <= 23) {
  $TM = '21~24';
}
elseif (0 <= $Ntime && $Ntime <= 5) {
  $TM = '運行していないようです';
}
//===============================================
if (strstr($text,'bu') || strstr($text,'北行き') || strstr($text,'北行') || strstr($text,'北')) {
  $loc = "bu";
  $label = "長尾駅発 北山中央行";
  if ($Ntime == "21") {
    $TM = '21';
  }
  elseif (22 <= $Ntime && $Ntime <= 23){
    $TM = '運行';
    $loc = 'していません';
    $label = "運行していません";
  }
}

elseif (strstr($text,'bd') || strstr($text,'長尾行き') || strstr($text,'長尾行') || strstr($text,'長尾')) {
  $loc = "bd";
  $label = "北山中央発 長尾駅行";
  if ($TM == "6~8"){
    $TM = '運行';
    $loc = 'していません';
    $label = "運行していません";
  }
  elseif ($Ntime == "21") {
    $TM = '21';
  }
  elseif (22 <= $Ntime && $Ntime <= 23){
    $TM = '運行';
    $loc = 'していません';
    $label = "運行していません";
  }
}

elseif (strstr($text,'kk')) {
  $loc = "kk";
  $label = "北山中央発 樟葉駅行";
  if ($TM == "6~8"){
    $TM = 'データが';
    $loc = 'ありません';
    $label = "データがありません";
  }
  elseif (10 <= $Ntime && $Ntime <= 11){
    $TM = '10~11';
  }
}

elseif (strstr($text,'kh') || strstr($text,'京橋発') || strstr($text,'京橋から')) {
  $loc = "kh";
  $label = "京橋駅発 長尾駅行";
}

$Tresult = $TM.$loc;
$messageData = [
    'type' => 'template',
    'altText' => '押して、時刻を表示！',
    'template' => [
        'type' => 'buttons',
        'title' => '下のボタンを押してください。',
        'text' => '今の時間帯の時刻表をお知らせします。',
        'actions' => [
            [
                'type' => 'postback',
                'label' => $label,

                'text' => $Tresult,
                'data' => 'value'
            ]
        ]
    ]
];
