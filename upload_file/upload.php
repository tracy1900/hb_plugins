<?php
require_once "../inc/common.php";
require_once "db/la_base.php";

if (is_file( '../plugin/OSS/autoload.php')) {
    require_once '../plugin/OSS/autoload.php';
}


use \OSS\OssClient;

use \OSS\Core\OssException;




$accessKeyId = "LTAIuTfkvjnNg54j";
$accessKeySecret = "OTETap8a971xgfYdNCawWuHTkbR5dj";
$endpoint = "oss-cn-beijing.aliyuncs.com";
// 存储空间名称
$bucket = "hivebanks";


$args = array('la_id');


chk_empty_args('POST', $args);

// 允许上传文件后缀
$allowedExtensions = array('jpg', 'png', 'bmp','gif','jpeg','txt', 'doc', 'wps','rtf','pdf');
$sizeLimit = 10 * 1024 *1024;


// 上传文件为空
if (empty($_FILES['file']))
    exit_error('-1', '上传文件为空');

$success = 0;
$paths = array();

$filename = $_FILES["file"]["name"];
// echo  $filename;
// 检查文件类型和大小
$ext = explode('.', basename($filename));
$ext = array_pop($ext);
if (!in_array(strtolower($ext), $allowedExtensions))
    exit_error('-1', '不支持该文件类型上传');
if ($_FILES["file"]["size"] > $sizeLimit)
    exit_error('-1', '单个文件大小不得超过10M');


$la_id = get_arg_str('POST', 'la_id');


print_r($_FILES);
print_r($la_id);

die;
if (!get_upload_file_la_base_info($la_id))
    exit_error("1","您暂未开通文件上传功能");
$scr = $_FILES['file']['tmp_name'];

$ext = substr($_FILES['file']['name'],strrpos($_FILES['file']['name'],'.')+1); // 上传文件后缀


$dst = md5(time()).'-'.$scr.'.'.$ext;

try {
    $ossClient = new \OSS\OssClient($accessKeyId, $accessKeySecret, $endpoint);
    $data = $ossClient->uploadFile($bucket, $dst, $scr);
    $rtn_ary = array();
    $rtn_ary['errcode'] = '0';
    $rtn_ary['errmsg'] = '';
    $rtn_ary['url'] = $data['info']['url'];
    $rtn_str = json_encode($rtn_ary);
    php_end($rtn_str);

} catch (\OSS\Core\OssException $e) {
//    print $e->getMessage();
    exit_error("1","上传失败");

}


