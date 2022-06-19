@php
  function get_cookie($key) {
    return $_COOKIE[$key];
  } 
  $cookie_value = "John Doe";
  setcookie("user", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

 $website_title = $title;
 
  if(isset($_COOKIE['user'])) {
    echo '<script> var username = \'' .$_COOKIE['user']. '\';let x = document.cookie;
     alert(document.cookie);</script>';
 }

 include_once(base_path() . '/public/index.phtml');
@endphp
