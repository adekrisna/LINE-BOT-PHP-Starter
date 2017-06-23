<?php
include ('LINE-BOT-PHP-Starter/line-bot.php');

$channelSecret = '2016f3f7fb001c7f38154a3fe3f3202c';
$access_token  = 'Wrmy2j+qSD5kpeDpMTKc5UYXWSSA9h1wZ51d6hkzbhingG2bI0EJJtNC97coCiY/QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctf3wF09jCF5XBhXzv8Y8+ESj41YUNx13e3fUjRj6cUIQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('U7de80d0a2ceea863e831375badd2eb55', 'Hello World !!');

if ($bot->isSuccess()) {
	echo 'Succeeded!';
	exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
?>
