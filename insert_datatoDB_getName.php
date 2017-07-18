<?php

function get_Name()
{
    $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $strAccessToken = "f9/uoIUNEP1kL2paNPKAH+EGLrCz2VYyDLRzADLiG6cUM838OEmvwuLDaHOX8Y8gQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBcssXN77lyH4cRgzSRe+ubJT6jlMGO8SmAXXZaS0FNIeAQdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
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
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    var_dump($result)."<br>";
    // $result_decode = json_decode($result);
    // var_dump($result_decode);
    
    // $name = $result_decode->displayName;
    // var_dump($name);
    // echo "<br>".$result_decode->userId;
    // echo "<br>".$result_decode->pictureUrl;
    // echo "<br>".$result_decode->statusMessage;
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
    curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/line_member?mid='.$mid.'&line_name='.$name.'&image='.$image.'&addby=ffon3');
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    // curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                                )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
}
get_name();
