<?php
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../classes/Dir.php";

class DirTest extends \PHPUnit_Framework_TestCase {

    public  function  testDir()
    {
        $test = new \classes\Dir();

        $this -> assertNotEmpty($test-> dir("/",""));
    }

    public  function  testTakeList()
    {
        $test = new \classes\Dir();
        $dbxClient = new \Dropbox\Client("HIbE8OQDlP8AAAAAAAAfhxhDX5ssVq1WXsGsZtlf_lLqOdULZ0vGQAg9dFYlqT6q", 'dropboxManager/1.0');
        $this -> assertNotEmpty($test -> takeList($dbxClient,'/'));


    }
}