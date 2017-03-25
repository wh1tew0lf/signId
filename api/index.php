<?php

$url = '';

if (isset($_GET['action'])) {
    $url = 'http://api.signtologin.com/api/v3/' . urldecode($_GET['action']);
}

$headers = array(
    'apiKey: 9b0823c8c17cb8a397e8aa3977a4e83c856301686aef8ff66a15a2fbe78a3536'
);
if (isset($_GET['token'])) {
    $headers[] = 'token: ' . $_GET['token'];
}

$ch = curl_init();

curl_setopt_array($ch, array(
    CURLOPT_TIMEOUT => 30,
    CURLOPT_AUTOREFERER => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_URL => $url,
    CURLOPT_DNS_USE_GLOBAL_CACHE => false,
    CURLOPT_DNS_CACHE_TIMEOUT => 2,
    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
    CURLOPT_HTTPHEADER => $headers
));

if (!empty($_POST)) {
    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $_POST
    ));
}

$result = curl_exec($ch);
$headers = curl_getinfo($ch);
$error = curl_error($ch);
curl_close($ch);

if (empty($result)) {
    echo json_encode(array('error' => $error, 'message' => 'Connection lost', 'headers' => $headers));
    die;
}
echo $result;
