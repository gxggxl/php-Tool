<?php
/**
 * @author   ：gxggxl
 * @BlogURL  : https://gxusb.com
 * @DateTime : 2020/11/18 22:40
 * @FilePath : get.php
 */
header('content-type:text/html;charset=utf-8');
error_reporting(0);
function F_get($url, $timeout = 10) {
	$user_agent = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (HTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($curl, CURLOPT_REFERER, $url);
	curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	//SSL debug(0)/production environment(2,1)
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl, CURLOPT_ENCODING, '');
	return curl_exec($curl);
	//curl_close($curl);
}

$json =  F_get('https://gxusb.com');
//echo $json;
