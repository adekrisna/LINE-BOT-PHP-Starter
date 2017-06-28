<?php 
$proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';   
$strAccessToken = "QQ4FDBydERg5R34tFiff7M+OOuRNzYKDA/btJh4Whsgl0ztKiDparY2v3TyaoL1LQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctP74gTqe5/G/kLHS2Ixe3w0jsLIaN0guHlHI+3q9c9ZQdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$get_mid =  $arrJson['events'][0]['source']['userId'];
// require 'connecBD.php';
//  $sql =  "insert into member(mid) values('$mid')" ;
//      $result = mysqli_query($connect,$sql);
     
//      if($result)    {
//            echo "เพิ่มข้อมุลเรียบร้อบ";
//            echo "<a href='showMember.php'>ดูข้อมูล</a>" ;
//      }   else{
//           echo "เกิดข้อผิดพลาด".mysqli_error($connect);
//      } 
     
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

$arrPostData = array();
$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];    

if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ";
}else{
   $arrPostData = array();
   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = "text";
   $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
 }
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close ($ch);
echo "ok";


?>
 
