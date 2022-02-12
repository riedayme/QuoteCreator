<?php 

function Fetch_Redirect($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
	curl_exec($ch);
	$target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
	curl_close($ch);
	if ($target)
		return $target;
	return false;
}