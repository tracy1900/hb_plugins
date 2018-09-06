<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午9:54
 */


require_once "../inc/common.php";

$cellphone = "15901839273";
$code = "1234";
// 验证发送短信(SendSms)接口
$sms = new \Aliyun\DySDKLite\Sms\SMS();
$res_obj = $sms->send_sms($cellphone,$code);
$res_arr = (array) $res_obj;
$res_code = $res_arr['Code'];

switch ($res_code){
    case 'OK':
        exit_ok();
        break;
    default ;
        exit_error('124','发送失败:'.$res_arr['Message']);
        break;
}

