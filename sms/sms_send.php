<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午9:54
 */


require_once "../inc/common.php";
require_once "../plugin/sms/sendSms.php";


$args = array('phone','code');
chk_empty_args('POST', $args);
$cellphone = get_arg_str('POST', 'phone');
$code = get_arg_str('POST', 'code');

$callback = array();
// 验证发送短信(SendSms)接口
$sms = new \Aliyun\DySDKLite\Sms\SMS();
$res_obj = $sms->send_sms($cellphone,$code);
$res_arr = (array) $res_obj;
$res_code = $res_arr['Code'];

switch ($res_code){
    case 'OK':
        $callback["errcode"] = '0';
        $callback['errmsg'] = "发送成功";
        echo json_encode($callback);
        exit();


        break;
    default ;
        $callback["errcode"] = '1';
        $callback['errmsg'] = "短信发送失败请稍后重试！";
        echo json_encode($callback);
        exit();
        break;
}

