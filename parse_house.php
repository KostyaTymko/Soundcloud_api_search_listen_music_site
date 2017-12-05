<?php
 require_once("simplehtmldom_1_5/simple_html_dom.php");
 
$url = "http://classic.beatport.com/genre/house/5/top-100";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
curl_setopt($ch, CURLOPT_PROXY, "10.75.1.206:3128");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch); // run the whole process


echo "\n\ncURL error number:" .curl_errno($ch);
echo "\n\ncURL error:" . curl_error($ch);
curl_close($ch);
echo $result;


$filename = 'top_100_house_beatport.txt';
$f=fopen($filename,'w');
fwrite($f,$result);
fclose($f);




?> 