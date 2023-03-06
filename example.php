<?php
  
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} elseif(isset($_SERVER['REMOTE_ADDR'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
} else {
    $ip = 'unknown';
}

$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
  if($query && ($query['country'] == 'China'|| $query['country'] == 'Russia'|| $query['country'] == 'Indonesia')){
    die("died");
    
 }
  if ($query && $query['status'] == 'success') {
    echo 'Użytkownik z ' . $query['country'] . ', ' . $query['city'] . '!';
  }


?>