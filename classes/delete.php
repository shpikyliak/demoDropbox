<?php
require_once "../vendor/autoload.php";
use \Dropbox as dbx;
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$accessToken = $_SESSION['accessToken'];
$dbxClient = new dbx\Client($accessToken, "PHP-Example/1.0");
$file=$_POST['file'];
var_dump($file);
$deleteFile = $dbxClient->delete($file);


if (($deleteFile['is_deleted']==true)||($deleteFile=null))
{
    echo "File deleted successfully<br>";
    echo '<a href="http://localhost:8888/">Back</a>';
}else
{
    echo "Deleting failed<br>";
    echo '<a href="http://localhost:8888/>Back</a>';
}