<?php
// $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
// $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
 
include ('line-bot-api/php/line-bot.php');

$channelSecret = '551ec4feee0.....43cff0';
$access_token  = '2og9ogezC8k.......5ZUEQQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('[Your userId / User Id]', 'Hello World !!');

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
