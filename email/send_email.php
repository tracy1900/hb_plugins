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

$timestamp = time();
$title = '邮箱验证链接';
$des = new Des();
$body = "www.baidu.com" . "?cfm_hash=";
$encryption_code = "1".','."15901839273@163.com".',' . $timestamp .',' ."11";
$body .=urlencode($des -> encrypt($encryption_code, "windwin"));
$ret = send_email($name='', "15901839273@163.com", $title, $body);
if(!$ret){
    exit_error('124','邮件发送失败请稍后重试！');
}
exit_ok('Please verify email as soon as possible!');