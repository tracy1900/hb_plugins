<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午10:14
 */

require_once "../inc/common.php";
require_once "db/la_base.php";
$args = array('la_id','type');
chk_empty_args('POST', $args);
$la_id = get_arg_str('POST', 'la_id');
$type = get_arg_str('POST', 'type');

$data = array();
$data["la_id"] = $la_id;
$data["type"] = $type;

if(!get_upload_file_la_base_info($la_id))
    exit_error("1","请勿重复提交");

if(!ins_upload_file_service($data))
    exit_error("1","提交失败");
else
    exit_ok("提交成功，请等待审核");


