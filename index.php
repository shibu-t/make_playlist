<?php

require_once('config.inc.php');
require_once('oauth.inc.php');

try {
    $response = $oauth->sendRequest('http://gdata.youtube.com/feeds/api/users/default/playlists?v=2',array(),'GET');
} catch (Exception $e) {
    echo($e->getMessage());
    exit();
}

echo('<pre>');
echo htmlspecialchars($response->getBody());