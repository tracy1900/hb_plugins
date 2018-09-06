<?php
/**
 * Created by PhpStorm.
 * User: liangyi
 * Date: 2018/9/5
 * Time: 上午9:39
 */
function get_upload_file_la_base_info($la_id)
{
    $db = new DB_COM();
    $sql = "SELECT * FROM la_base WHERE la_id = '{$la_id}' and type = 1";
    $db->query($sql);
    $rows = $db->fetchAll();
    return $rows;
}

function ins_upload_file_service($data_base)
{
    $db = new DB_COM();
    $sql = $db ->sqlInsert("la_base", $data_base);
    $q_id = $db->query($sql);
    if ($q_id == 0)
        return false;
    return true;
}
