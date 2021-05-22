<?php

use SpireGG\OAuth2\Client\Provider\Twitter;

require '../vendor/autoload.php';

$config = [
    'clientId' => "",
    'clientSecret' => "",
    'redirectUri' => ""
];

$provider = new Twitter(
    $config
);

if (isset($_GET['code']) && $_GET['code']) {
    $token = $provider->getAccessToken("authorization_code", [
        'code' => $_GET['code']
    ]);

    $user = $provider->getResourceOwner($token);
    var_dump($user);


} else {
    header('Location: ' . $provider->getAuthorizationUrl());
}
