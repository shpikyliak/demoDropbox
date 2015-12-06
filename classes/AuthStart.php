<?php
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/getWebAuth.php";
use \Dropbox as dbx;
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
$authorizeUrl = getWebAuth()->start();
header("Location: $authorizeUrl");


