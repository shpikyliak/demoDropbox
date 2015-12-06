<?php
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/getWebAuth.php";
use \Dropbox as dbx;
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
//var_dump($_GET);

function Auth()
{
    list($accessToken, $userId, $urlState) = getWebAuth()->finish($_GET);

    assert($urlState === null);  // Since we didn't pass anything in start()
    $_SESSION['accessToken']= $accessToken;
    $start = 'http://localhost:8888/';
    header("Location: $start");
    return $accessToken;
}

Auth();