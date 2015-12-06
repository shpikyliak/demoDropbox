<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../classes/Upload.php";

class UploadTest extends \PHPUnit_Framework_TestCase {

    public  function  testUpload()
    {
        $test = new \classes\Upload();

        $dbxClient = new ClientMock();
        $files = array(
            'file' => array(
                'name' => 'test.jpg',
                'type' => 'image/jpeg',
                'size' => 542,
                'tmp_name' => 'test.jpg',
                'error' => 0
            )
        );
        $this -> assertNotEmpty($test -> upload($files,$dbxClient,'/'));

    }


}
class ClientMock
{
    public function uploadFile()
    {
        return "Done";
    }
}