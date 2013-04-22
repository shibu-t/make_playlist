<?php

if (empty($_SESSION['AUTH_TOKEN']) || empty($_SESSION['TOKEN_SECRET'])) {
    try {
        $oauth->getRequestToken(GET_REQUEST_TOKEN, CALLBACK_URL, $additional);
        $_SESSION['callback_token'] = $oauth->getToken();
        $_SESSION['callback_secret'] = $oauth->getTokenSecret();
        $redirect = $oauth->getAuthorizeUrl(GET_AUTHORIZE, $additional);

        $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI'];

        header('location: '.$redirect);
    } catch (Exception $e) {
        echo($e->getMessage());
    }
    exit();
}

$oauth->setToken($_SESSION['AUTH_TOKEN']);
$oauth->setTokenSecret($_SESSION['TOKEN_SECRET']);