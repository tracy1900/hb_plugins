<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/5
 * Time: 下午3:57
 */
ini_set('display_errors','On');
Error_reporting(E_ALL);
require_once '../plugin/email/send_email.php';

require_once "../inc/common.php";

$args = array('email','title','body');
chk_empty_args('POST', $args);
$email = get_arg_str('POST', 'email');
$title = get_arg_str('POST', 'title');
$body = get_arg_str('POST', 'body');

$callback = array();
$ret = send_email($name='1646', $email, $title, $body);
if(!$ret){

    $callback["errcode"] = '1';
    $callback['errmsg'] = "邮件发送失败请稍后重试！";
    echo json_encode($callback);
    exit();
}
$callback = array();
$callback["errcode"] = '0';
$callback['errmsg'] = "Please verify email as soon as possible!";
echo json_encode($callback);
exit();
