<?php

require_once('config.inc.php');

$oauth->setToken($_SESSION['callback_token']);
$oauth->setTokenSecret($_SESSION['callback_secret']);

try {
    $oauth->getAccessToken(GET_ACCESS_TOKEN, $_GET['oauth_verifier']);
    $_SESSION['AUTH_TOKEN']   = $oauth->getToken();
    $_SESSION['TOKEN_SECRET'] = $oauth->getTokenSecret();
} catch (Exception $e) {
    echo($e->getMessage());
    exit();
}

header('location: '.$_SESSION['REQUEST_URI']);