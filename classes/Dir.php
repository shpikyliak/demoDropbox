<?php


namespace classes;


class Dir {
    public function takeList($dbxClient,$dir)
    {

        $files = $dbxClient->getMetadataWithChildren($dir);

        return $files;
    }

    public  function  dir($begin, $fold)
    {
        if ($fold=="")
        {
            $dir=$begin;
        }
        else
        {
            $dir=$fold;
        }
        return $dir;
    }

}