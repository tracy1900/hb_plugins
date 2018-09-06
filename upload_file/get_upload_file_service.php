<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/6
 * Time: 上午10:27
 */


require_once "../inc/common.php";
require_once "db/la_base.php";
$args = array('la_id');
chk_empty_args('POST', $args);
$la_id = get_arg_str('POST', 'la_id');

//$data = array();
//$data["la_id"] = $la_id;
//$data["type"] = $type;
$row = array();
$row = get_upload_file_la_base_info($la_id);
// 返回数据做成
$rtn_ary = array();
$rtn_ary['errcode'] = '0';
$rtn_ary['errmsg'] = '';
$rtn_ary['row'] = $row;

$rtn_str = json_encode($rtn_ary);
php_end($rtn_str);