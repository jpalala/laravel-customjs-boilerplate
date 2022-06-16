<?php
//first step: get access token
function github_exchange_tokens($code) {
  $client_id = $_ENV['GITHUB_CLIENT_ID'];
  $client_secret = $_ENV['GITHUB_CLIENT_SECRET'];
  $redirect_url = urlencode( $_ENV['GITHUB_REDIRECT_URL'] ?? 'http://localhost:3003/callback');
  $accesstokenurl = 'https://github.com/login/oauth/access_token';
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $accesstokenurl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  $params = "client_id=".$client_id. "&client_secret=".$client_secret."&code=".$code."&redirect_url=".$redirect_url."&state=ewanko";
  echo($params);

  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

  $headers = array();
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  Log::debug($result);
  return $result;
  curl_close($ch);

}
