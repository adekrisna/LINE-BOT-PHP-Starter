<?php
    $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $strAccessToken = "XDEio/U+1tLcglINRntoiWnm3xBRzApRnLm5FHhpqHGEtU21j01yqjlxr83equ5W6qVYXGI80LOObJe1H9EaoK4ZfSiSHwpUrRgQxlREc/aSZQavLqwyHsT1rDcxjzf9ekwtwN1VXkZsCGo9bRxI5AdB04t89/1O/w1cDnyilFU="; $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/profile/U7de80d0a2ceea863e831375badd2eb55";
    $header = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $strAccessToken
    );

    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, $strUrl);
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER,$header);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    var_dump($result)."<br>";
    $result_decode = json_decode($result);
    var_dump($result_decode);
    
    $name = $result_decode->displayName;
    var_dump($name);
    echo "<br>".$result_decode->userId;
    echo "<br>".$result_decode->pictureUrl;
    echo "<br>".$result_decode->statusMessage; 
