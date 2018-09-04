<?php

require_once "common.php";
require_once "es_imagecls.php";
if (is_file( '../plugin/OSS/autoload.php')) {
    require_once '../plugin/OSS/autoload.php';
}

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
use \OSS\OssClient;

use \OSS\Core\OssException;
$accessKeyId = "LTAIuTfkvjnNg54j";
$accessKeySecret = "OTETap8a971xgfYdNCawWuHTkbR5dj";
$endpoint = "oss-cn-beijing.aliyuncs.com";
// 存储空间名称
$bucket = "hivebanks";

$scr = $_FILES['file']['tmp_name'];

$ext = substr($_FILES['file']['name'],strrpos($_FILES['file']['name'],'.')+1); // 上传文件后缀



$dst = md5(time()).'-'.$scr.'.'.$ext;

try {
    $ossClient = new \OSS\OssClient($accessKeyId, $accessKeySecret, $endpoint);
    $data = $ossClient->uploadFile($bucket, $dst, $scr);
    print_r($data['info']['url']);

} catch (\OSS\Core\OssException $e) {
    print $e->getMessage();

}


