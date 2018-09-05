<?php

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
chk_empty_args('GET', $args);

$la_id = get_arg_str('GET', 'la_id');
print_r(1);
if (!get_la_base_info($la_id))
    exit_error("1","您暂未开通文件上传功能");
print_r(2);
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
    print $e->getMessage();

}


