<?php
    $proxy = 'if_u_want_to_fix_url';
    $proxyauth = 'if_u_want_to_fix_url';
    $strAccessToken = "Token";
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/profile/mid";
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
