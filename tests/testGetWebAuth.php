<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../classes/getWebAuth.php";

class AuthTest extends \PHPUnit_Framework_TestCase {

    public  function  test_getWebAuth()
    {

        $this -> assertNotEmpty(getWebAuth());
    }


}