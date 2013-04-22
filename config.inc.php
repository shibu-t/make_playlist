<?php

define('BASE_DIR',          'http://www25324u.sakura.ne.jp/make_playlist/');
define('CONSUMER_KEY',      'www25324u.sakura.ne.jp');
define('CONSUMER_SECRET',   'GBUeVC13_4gH4vopTKCJ7PXb');
define('GET_REQUEST_TOKEN', 'https://www.google.com/accounts/OAuthGetRequestToken');
define('GET_AUTHORIZE',     'https://www.google.com/accounts/OAuthAuthorizeToken');
define('GET_ACCESS_TOKEN',  'https://www.google.com/accounts/OAuthGetAccessToken');
define('CALLBACK_URL',      BASE_DIR.'callback.php');

$additional = array(
    'scope' => 'http://gdata.youtube.com'
    //'hd' => '<Google Apps ドメイン名>'
);

require_once('HTTP/OAuth/Consumer.php');

// SSL でエラーが出るので証明書の確認を無効化
$http_request = new HTTP_Request2();
$http_request->setConfig('ssl_verify_peer', false);
$consumer_request = new HTTP_OAuth_Consumer_Request;
$consumer_request->accept($http_request);

$oauth = new HTTP_OAuth_Consumer(CONSUMER_KEY, CONSUMER_SECRET);
$oauth->accept($consumer_request);

session_start();