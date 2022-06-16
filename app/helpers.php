<?php
//first step: get access token
function github_exchange_tokens($code) {
    // if(is_string($code)) {
    //     var_dump($code);
    // } else {
    //     $code = $code['code'];
    // }
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

  $headers = array();
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Accept: application/json';

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch,CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  //($postData);
  if(!is_string($result)) {
    echo "<a href=\"http://localhost:3003/reset?code=".$code."&clear=true\">GO here</a>";
    die('Error: Unexpected' . $code);

  }
  if(isset($jsonData) ) {
   //dd($jsonData);
    $err_object = ['message' => 'We have an error', 'status' => false, 'response' => $jsonData];
    dd($err_object);

    return $err_object;
  } else {
    parse_str($result, $res);
    return $res;
  }
  curl_close($ch);
}

function get_user($access_token = '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'): ?array {
    if(strlen($access_token) < 40) {
        echo 'Error: access token too short';
        return null;
    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/user');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
    curl_setopt($ch, CURLOPT_USERAGENT, $config['useragent']);
    $headers = array();
    $headers[] = 'Authorization: token ';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    $github = json_decode($result);
    $user = [
        'username' => $github->login,
         'userid' => $github->id,
         'useremail' => $github->email,
         'timestamp' => time()
    ];
    var_dump($user); //. "\r\n" . $github['id'] . $github['email'];
    curl_close($ch);
}
