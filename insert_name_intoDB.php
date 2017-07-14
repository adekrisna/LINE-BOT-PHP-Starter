<html>
    8
    <meta charset="utf-8">
<?php
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

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($ch);
    $err    = curl_error($ch);
    curl_close($ch);
    var_dump($result)."<br>";
    $result_decode = json_decode($result);
    var_dump($result_decode);

    $name = $result_decode->displayName;
    echo "<br>".$result_decode->userId;
    echo "<br>".$result_decode->pictureUrl;
    echo "<br>".$result_decode->statusMessage; 
    
    $ch_add = curl_init();
    curl_setopt($ch_add, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/testem?mid='.$name.'&addby=ffon2');
    curl_setopt($ch_add, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch_add, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_add, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
                                                )
        );
    curl_setopt($ch_add, CURLOPT_PROXY, $proxy);
    curl_setopt($ch_add, CURLOPT_PROXYUSERPWD, $proxyauth);
    $results = curl_exec($ch_add);
    $err    = curl_error($ch_add);
    curl_close($ch_add);
    var_dump($results);
    ?>
    </html>
