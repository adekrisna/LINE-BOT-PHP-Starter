<?php 
  
// $strAccessToken = "QQ4FDBydERg5R34tFiff7M+OOuRNzYKDA/btJh4Whsgl0ztKiDparY2v3TyaoL1LQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctP74gTqe5/G/kLHS2Ixe3w0jsLIaN0guHlHI+3q9c9ZQdB04t89/1O/w1cDnyilFU="; 
  
// $content = file_get_contents('php://input'); 
// $arrJson = json_decode($content, true); 
  
// $strUrl = "https://api.line.me/v2/bot/message/reply"; 
  
// $arrHeader = array(); 
// $arrHeader[] = "Content-Type: application/json"; 
// $arrHeader[] = "Authorization: Bearer {$strAccessToken}"; 
  
// if($arrJson['events'][0]['message']['text'] == "สวัสดี"){ 
//   $arrPostData = array(); 
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken']; 
//   $arrPostData['messages'][0]['type'] = "text"; 
//   $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId']; 
// }else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){ 
//   $arrPostData = array(); 
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken']; 
//   $arrPostData['messages'][0]['type'] = "text"; 
//   $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ"; 
// }else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){ 
//   $arrPostData = array(); 
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken']; 
//   $arrPostData['messages'][0]['type'] = "text"; 
//   $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ"; 
// }else{ 
//   $arrPostData = array(); 
//   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken']; 
//   $arrPostData['messages'][0]['type'] = "text"; 
//   $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง"; 
// } 
    
// $ch = curl_init(); 
// curl_setopt($ch, CURLOPT_URL,$strUrl); 
// curl_setopt($ch, CURLOPT_HEADER, false); 
// curl_setopt($ch, CURLOPT_POST, true); 
// curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader); 
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData)); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
// $result = curl_exec($ch); 
// curl_close ($ch);

//-----------------------------------------------------------------------------

$proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80'; 
$access_token = 'Wrmy2j+qSD5kpeDpMTKc5UYXWSSA9h1wZ51d6hkzbhingG2bI0EJJtNC97coCiY/QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctf3wF09jCF5XBhXzv8Y8+ESj41YUNx13e3fUjRj6cUIQdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
	
}
echo "OK";



?>
 
