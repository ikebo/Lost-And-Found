<?php
/**
 * 公用的方法
 **/

function show($status, $message, $data=array()) {
    $result = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );
    exit(json_encode($result));
}

/**
 *  判断字段是否为空
 */

function isEmpty($field) {
    if(!$field) {
        return '未填写';
    }
    return $field;
}

