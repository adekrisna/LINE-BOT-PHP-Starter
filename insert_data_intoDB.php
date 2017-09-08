<html>
    <meta charset="utf-8">
    6
<title>@ME</title>

<h1 align = 'center'>@ME</h1>
    <P align=center>
        <img src="http://qr-official.line.me/L/oUypr1a-r8.png">
    </P>
    <div align=center>line@ffon</div>


<?php
function get_name($mid = null)
{
    
    $proxy = 'if_u_want_to_fix_url';
    $proxyauth = 'if_u_want_to_fix_url';
    $strAccessToken = "Token";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/profile/$mid";
    $header = array(
    'Content-Type: appl
    ication/json',
    'Authorization: Bearer ' . $strAccessToken
    );
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, $strUrl);
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
   // curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    echo "this is  result get name";
    var_dump($result);
    
    return $result;
}
function reply_get_mid()
{
        
        $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
        $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
        $strAccessToken = "f9/uoIUNEP1kL2paNPKAH+EGLrCz2VYyDLRzADLiG6cUM838OEmvwuLDaHOX8Y8gQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBcssXN77lyH4cRgzSRe+ubJT6jlMGO8SmAXXZaS0FNIeAQdB04t89/1O/w1cDnyilFU=";
        
        $content = file_get_contents('php://input');
        $arrJson = json_decode($content, true);
        $strUrl = "https://api.line.me/v2/bot/message/reply";
    
        $arrHeader = array();
        $arrHeader[] = "Content-Type: application/json";
        $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
        $get_mid =  $arrJson['events'][0]['source']['userId'];
        echo "aa";
        var_dump($arrJson['events'][0]['source']);
        $mid = get_name($get_mid);
    
    if ($arrJson['events'][0]['message']['text'] == "a") {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "สวัสดี ".$arrJson['events'][0]['source']['userId'];
        $get_mid =  $arrJson['events'][0]['source']['userId'];
        $mid = get_name($get_mid);
        
        if ($get_mid!=null) {
            $userObj = get_name($get_mid);
            $userObj_decode = json_decode($userObj);
            $name = $userObj_decode->displayName;
            $image = $userObj_decode->pictureUrl;
            $chAdd = curl_init();
            curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/line_member?mid='.$get_mid.'&line_name='.$name.'&image='.$image.'&addby=ffon3');
            curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
           // curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
                                        )
            );
            $result = curl_exec($chAdd);
            $err    = curl_error($chAdd);
            curl_close($chAdd);
            echo "this is  result line member";
            var_dump($result);
        }
    }
        
        
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
   // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($ch);
    $err    = curl_error($ch);
    curl_close ($ch);

    echo "result: ";
    var_dump($result);
    echo"mid : ";
    var_dump($get_mid);
    echo"err : ";
    var_dump($err);
}
    reply_get_mid();
    ?>
    
    </html>
