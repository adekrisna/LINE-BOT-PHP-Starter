<?php
$proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
$access_token = 'Wrmy2j+qSD5kpeDpMTKc5UYXWSSA9h1wZ51d6hkzbhingG2bI0EJJtNC97coCiY/QPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctf3wF09jCF5XBhXzv8Y8+ESj41YUNx13e3fUjRj6cUIQdB04t89/1O/w1cDnyilFU=';


		


$url = 'https://api.line.me/v1/oauth/verify';


      
      
$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
    }
  }
}
echo "OK";


