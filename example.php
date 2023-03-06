<?php
header('Content-Type: application/json');
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} elseif(isset($_SERVER['REMOTE_ADDR'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
} else {
    $ip = 'unknown';
}

$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if ($query && $query['status'] == 'success') {
    $result = array(
        'country' => $query['country'],
    );
    echo json_encode($result);
}
?>