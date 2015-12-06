<?php
/**
 * Created by PhpStorm.
 * User: shpikyliak
 * Date: 12.07.15
 * Time: 12:37
 */

namespace classes;
use \Dropbox as dbx;

class Upload {
    public function upload($files,$dbxClient,$dir)
    {

        if (count($files)==0)
        {

        }else{
            
            $f = fopen($files['file']['tmp_name'], "rb");
            $result = $dbxClient->uploadFile($dir."/".$files['file']['name'], dbx\WriteMode::add(), $f);
            fclose($f);
            return $result;
        }
    }
}
//"/Users/shpikyliak/Desktop/sms.txt"