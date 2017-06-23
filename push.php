<?php
// $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
// $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
 
include ('line-bot-api/php/line-bot.php');

$channelSecret = '2016f3f7fb001c7f38154a3fe3f3202c';
$access_token  = 'Wrmy2j+qSD5kpeDpMTKc5UYXWSSA9h1wZ51d6hkzbhingG2bI0EJJtNC97coCiY/QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctf3wF09jCF5XBhXzv8Y8+ESj41YUNx13e3fUjRj6cUIQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('fozenffon', 'Hello World !!');

if ($bot->isSuccess()) {
	echo 'Succeeded!';
	exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL,$strUrl);
// curl_setopt($ch, CURLOPT_HEADER, false);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, $httpClient);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($textMessageBuilder));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_PROXY, $proxy);
// curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
// $result = curl_exec($ch);
// curl_close ($ch);
// echo "ok";
?>
