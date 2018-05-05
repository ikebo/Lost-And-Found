<?php
namespace Common\Model;
use Think\Model;

class InfoModel extends Model {
    private $_db = '';

    public function __construct() {
        $this->_db =  new Model("Info");
    }

    public function updateImgById($src) {
        $res = $this->_db->where(array('user_id'=>session('user.userId')))->save(array('real_img'=>$src));
        return $res;
    }

    public function isImgExists () {
        $res = $this->_db->where(array('user_id'=>session('user.userId')))->getField('real_img');
        if($res) return $res;
        return false;
    }

    public function getInfoByInfoId($info_id) {
        $res = $this->_db->where(array('info_id' => $info_id))->find();
        return $res;
    }

    public function getInfoByUserId($user_id) {
        $info = $this->_db->where(array('user_id'=>$user_id))->find();
        return $info;
    }
}