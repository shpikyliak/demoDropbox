<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once "vendor/autoload.php";
include( "classes/Dir.php" );
include( "classes/Upload.php" );

use \Dropbox as dbx;
session_start();
//session_destroy();

if(isset($_SESSION['accessToken']) && $_SESSION['accessToken'] != null)
{
    $accessToken = $_SESSION['accessToken'];
    $dbxClient = new dbx\Client($accessToken, 'dropboxManager/1.0');
    $begin = "/";
    $fold = (isset($_GET['fold'])) ? $_GET['fold'] : "";
    $qwe = new \classes\Dir();
    $dir = $qwe -> dir($begin,$fold);
    $files = new \classes\Upload();
    $moveFile = $files ->upload($_FILES,$dbxClient,$dir);
    $fileList = $qwe -> takeList($dbxClient,$dir);
}

//?>
<!DOCTYPE html>
<html>
<head>
    <title>Dropbox Manager</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php if (isset($accessToken) == false){ ?>
    <form action="classes/AuthStart.php" method="get" class="dopInf">

        <button type="submit" class="btn btn-xs "><b>Dropbox signUp</b></button>
    </form>
    <!--<a class="btn" href="https://www.dropbox.com/1/oauth2/authorize?response_type=code&client_id=k5nkwor0ugvv7hb&redirect_uri=http://localhost:8888/dropboxManager/"><b>Sign in Dropbox</b></a>-->
<?php }else{?>
<ol class="breadcrumb">
    <!--for ()-->
        <?php echo($dir);?>
    <!--endfor-->
    <button onclick="history.back()" class="btn btn-default" id="back">Back</button>
</ol>
<table class="table table-striped">
    <?php for ($i=0;$i<count($fileList['contents']);$i++) {?>
    <?php if($fileList['contents'][$i]['is_dir']=='1'){?>
            <tr>
                <td>
                    <?php echo(basename($fileList['contents'][$i]['path']));  ?>
                    <form action="index.php" method="get" class="dopInf">
                        <input type="hidden" name="fold" value="<?php echo($fileList['contents'][$i]['path']);?>">

                        <button class="btn btn-xs "><b>Open</b></button>
                     </form>
                    <form action="classes/delete.php"  method="post" >
                        <input type="hidden" name="file" value="<?php echo($fileList['contents'][$i]['path'])?>">
                        <button type="submit" class="btn btn-danger btn-xs">X</button>
                    </form>
                </td>
            </tr>
        <?php }else {?>
            <tr>
                <td>
                    <?php echo(basename($fileList['contents'][$i]['path']));  ?>
                    <form action="classes/delete.php"  method="post" >
                        <input type="hidden" name="file" value="<?php echo($fileList['contents'][$i]['path'])?>">
                        <button type="submit" class="btn btn-danger btn-xs">X</button>
                    </form>
                </td>
            </tr>
        <?php }?>
    <?php }?>
</table>
<div id="formUpload">
    <form action="index.php"  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000000">
            <input type="hidden" name="dirUpload" value="<?php if (isset($fold)){echo($fold);} ?>">
            <input type="file" id="InputFile" name="file">
            <p class="help-block"></p>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

</div>
<?php }?>
</body>
</html>
