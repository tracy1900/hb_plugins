<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/5
 * Time: 上午9:39
 */
function get_la_base_info($la_id)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE la_id = '{$la_id}' limit 1";
    $db->query($sql);
    $row = $db->fetchRow();
    return $row;
}