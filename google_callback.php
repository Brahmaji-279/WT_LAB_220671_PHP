<?php
session_start();
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    $_SESSION['user_name'] = $userInfo->name;
    $_SESSION['user_email'] = $userInfo->email;

    echo "<h2>Login Successful</h2>";
    echo "Welcome: " . $userInfo->name . "<br>";
    echo "Email: " . $userInfo->email . "<br>";
    header("Location: /php_CyberAwarenessWebsite/CybersecurityAwarenessWebsite/Task-3/index.html");
}
