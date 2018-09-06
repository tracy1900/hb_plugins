<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午10:14
 */

require_once "../inc/common.php";
$args = array('la_id');
chk_empty_args('POST', $args);
$la_id = get_arg_str('POST', 'la_id');
$type = get_arg_str('POST', 'type');

$data = array();
$data["la_id"] = $la_id;
$data["type"] = $type;

ins_upload_file_service($data);