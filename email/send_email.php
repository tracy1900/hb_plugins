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
require_once 'db/log_email.php';

require_once "../inc/common.php";

$args = array('email','title','body');
chk_empty_args('POST', $args);
$email = get_arg_str('POST', 'email');
$title = get_arg_str('POST', 'title');
$body = get_arg_str('POST', 'body','1000');




$callback = array();
$ret = send_email($name='', $email, $title, $body);

$log_data = array();

if(!$ret){

    $data_log['status'] = 1;
    $data_log['log_id'] = get_guid();
    $data_log['la_id'] = 'email';
    $data_log['action_id'] = 'action_id';
    $data_log['email'] = $email;
    $data_log['ctime'] = time();
    action_log_email($data_log);

    $callback["errcode"] = '1';
    $callback['errmsg'] = "邮件发送失败请稍后重试！";
    echo json_encode($callback);
    exit();
}
$callback = array();

$data_log['status'] = 0;
$data_log['log_id'] = get_guid();
$data_log['la_id'] = 'email';
$data_log['action_id'] = 'action_id';
$data_log['email'] = $email;
$data_log['ctime'] = time();
action_log_email($data_log);

$callback["errcode"] = '0';
$callback['errmsg'] = "Please verify email as soon as possible!";
echo json_encode($callback);
exit();
