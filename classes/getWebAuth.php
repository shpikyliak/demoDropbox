<?php
require_once __DIR__."/../vendor/autoload.php";
use \Dropbox as dbx;

function getWebAuth()
{

    $appInfo = dbx\AppInfo::loadFromJsonFile(__DIR__.'/../test.json');
    $clientIdentifier = "my-app/1.0";
    $redirectUri = "http://localhost:8888/classes/Auth2.php";
    $csrfTokenStore = new dbx\ArrayEntryStore($_SESSION, 'dropbox-auth-csrf-token');
    return new dbx\WebAuth($appInfo, $clientIdentifier, $redirectUri, $csrfTokenStore, 'en');
}