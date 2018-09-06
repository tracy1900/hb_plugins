<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/5
 * Time: 下午3:57
 */
print_r(2222);

ini_set('display_errors','On');
Error_reporting(E_ALL);
require_once '../plugin/email/send_email.php';
require_once 'db/log_email.php';

require_once "../inc/common.php";

$args = array('email','title','body');
chk_empty_args('POST', $args);
$email = get_arg_str('POST', 'email');
$title = get_arg_str('POST', 'title');
$body = get_arg_str('POST', 'body');

print_r(1111);
print_r('\n'.$body);

