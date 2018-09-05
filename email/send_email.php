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

$ret = send_email($name='11', "1378333642@qq.com", "11", "222");
if(!$ret){
    exit_error('124','邮件发送失败请稍后重试！');
}
exit_ok('Please verify email as soon as possible!');