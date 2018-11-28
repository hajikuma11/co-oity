<?php
date_default_timezone_set('Asia/Tokyo');
$Ntime = date("G");
$tmFlag = 0;
$NSFlag = 1;
//==============================================
if (6 <= $Ntime && $Ntime <= 8) {
  $TM = '6~8';
  if ($Ntime == 8) {
    $tmFlag++;
    $TM2 = '9~11';
  }
}
elseif (9 <= $Ntime && $Ntime <= 11) {
  $TM = '9~11';
  if ($Ntime == 11) {
    $tmFlag++;
    $TM2 = '12~14';
  }
}
elseif (12 <= $Ntime && $Ntime <= 14) {
  $TM = '12~14';
  if ($Ntime == 14) {
    $tmFlag++;
    $TM2 = '15~17';
  }
}
elseif (15 <= $Ntime && $Ntime <= 17) {
  $TM = '15~17';
  if ($Ntime == 17) {
    $tmFlag++;
    $TM2 = '18~20';
  }
}
elseif (18 <= $Ntime && $Ntime <= 20) {
  $TM = '18~20';
  if ($Ntime == 20) {
    $tmFlag++;
    $TM2 = '21~23';
  }
}
elseif (21 <= $Ntime && $Ntime <= 23) {
  $TM = '21~24';
}
elseif (0 <= $Ntime && $Ntime <= 5) {
  $TM = '運行していないようです';
  $NSFlag++;
}
//===============================================
if (strstr($text,'きた') or strstr($text,'bu') or strstr($text,'北')) {
  $loc = "bu";
  $label = "長尾駅発 北山中央行";
  if ($Ntime == "21") {
    $TM = '21';
  }
  elseif (22 <= $Ntime && $Ntime <= 23){
    $TM = '運行';
    $loc = 'していません';
    $label = "運行していません";
    $NSFlag++;
  }
}

elseif (strstr($text,'bd') or strstr($text,'なが') or strstr($text,'長') or strstr($text,'長尾')) {
  $loc = "bd";
  $label = "北山中央発 長尾駅行";
  if ($TM == "6~8"){
    $TM = '運行';
    $loc = 'していません';
    $label = "運行していません";
    $NSFlag++;
  }
  elseif ($Ntime == "21") {
    $TM = '21';
  }
  elseif (22 <= $Ntime && $Ntime <= 23){
    $TM = '運行';
    $loc = 'していません';
    $label = "運行していません";
    $NSFlag++;
  }
}

elseif (strstr($text,'kk')) {
  $loc = "kk";
  $label = "北山中央発 樟葉駅行";
  if ($TM == "6~8"){
    $TM = 'データが';
    $loc = 'ありません';
    $label = "データがありません";
    $NSFlag++;
  }
  elseif (10 <= $Ntime && $Ntime <= 11){
    $TM = '10~11';
    if ($Ntime == 11) {
      $tmFlag++;
    }
  }
}

elseif (strstr($text,'kh') or strstr($text,'京橋発') or strstr($text,'京橋から')) {
  $loc = "kh";
  $label = "京橋駅発 長尾駅行";
}

$Tresult = $TM.$loc;

if ($tmflag == 0 || $NSFlag <= 1) {
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
} else {
  $msgFlag = 1;
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

$Tresult = $TM2.$loc;
  $messageData2 = [
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
}
