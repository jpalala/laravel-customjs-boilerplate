<?php
//first step: get access token
function github_exchange_tokens($code) {
  $client_id = $_ENV['GITHUB_CLIENT_ID'];
  $client_secret = $_ENV['GITHUB_CLIENT_SECRET'];
  $redirect_uri = $_ENV['GITHUB_REDIRECT_URL'] ?? 'http://localhost:3003/callback';
  $accesstokenurl = 'https://github.com/login/oauth/access_token';
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $accesstokenurl);
  curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $debug ="client_id=".$client_id. "&client_secret=".$client_secret."&code=".$code."&redirect_url=".$redirect_uri."&state=ewanko";

  $postData = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'code' => $code,
    'state' => 'ewanko',
    'redirect_uri' => $redirect_uri);
  $params = http_build_query($postData);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

  $headers = array('Content-Type: application/x-www-form-urlencoded');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  return $result;
  curl_close($ch);
}
