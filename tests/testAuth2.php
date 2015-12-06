<?php
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../classes/Auth2.php";


class Auth2Test extends \PHPUnit_Framework_TestCase {

    public  function  testAuth()
    {


        $this -> assertNotEmpty(Auth());
    }


}

function getWebAuth()
{
    return new WebAuthMock();
}

class WebAuthMock
{
    public function finish()
    {
        return "HHHHHH22hhhh";
    }
}