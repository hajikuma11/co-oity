<?php
$pos = strpos($text,'数');
$s_text = substr($text,$pos+3);

if (strstr($text,'2進数')) {//２進数から
  $ten =bindec($s_text);
  $eig =decoct($ten);
  $sixt =dechex($ten);

  $messageData = [
   'type' => 'text',
   'text' => "[8]$eig\n[10]$ten\n[16]$sixt"
  ];
}

elseif (strstr($text,'8進数')) {//８進数から
  $ten =octdec($s_text);
  $sec =decbin($ten);
  $sixt =dechex($ten);

  $messageData = [
   'type' => 'text',
   'text' => "[2]$sec\n[10]$ten\n[16]$sixt"
  ];
}

elseif (strstr($text,'16進数')) {//１６進数から
  $ten =hexdec($s_text);
  $sec =decbin($ten);
  $eig =decoct($ten);

  $messageData = [
   'type' => 'text',
   'text' => "[2]$sec\n[8]$eig\n[10]$ten"
  ];
}

elseif (strstr($text,'進数')) {//１０進数から
  $sec =decbin($s_text);
  $eig =decoct($s_text);
  $sixt =dechex($s_text);

  $messageData = [
   'type' => 'text',
   'text' => "[2]$sec\n[8]$eig\n[16]$sixt"
  ];
}
