<?php

function get_Name()
{
    $proxy = 'if_u_want_to_fix_url';
    $proxyauth = 'if_u_want_to_fix_url';   
    $strAccessToken = "Token";
    
    $content = file_get_contents('php://input');
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
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    var_dump($result)."<br>";
    
    insert_to_tb($result);
}
function insert_to_tb($data)
{
    $result_decode = json_decode($data);
    var_dump($result_decode);
    
    $name = $result_decode->displayName;
    var_dump($name);
    echo "<br>";
    $mid=$result_decode->userId;
    echo "<br>";
    $image=$result_decode->pictureUrl;
    echo "<br>";
    $status=$result_decode->statusMessage;
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'url/parm?mid='.$mid.'&line_name='.$name.'&image='.$image.'&add_by=1');
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    // curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                                )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    echo "result return : ";
    var_dump($result);
}
get_name();
