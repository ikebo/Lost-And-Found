<?php
namespace Common\Model;
use Think\Model;

class ItemModel extends Model {
    private $_db = '';

    public function __construct() {
        $this->_db = new Model('Item');
    }

    public function updateImgById($src) {
        $res = $this->_db->where(array('user_id'=>session('user.userId')))->save(array('item_img'=>$src));
        return $res;
    }

    public function getItemByItemId($item_id) {
        $item = $this->_db->where(array('item_id'=>$item_id))->find();
        return $item;
    }

    public function getUserIdByItemId($item_id) {
        $user_id = $this->_db->where(array('item_id'=>$item_id))->getField('user_id');
        return $user_id;
    }

    public function getItemsByUserId($user_id) {
        $items = $this->_db->where(array('user_id'=>$user_id))->select();
        return $items;
    }

    public function delItemByItemId($item_id) {
        $res = $this->_db->where(array('item_id'=>$item_id))->delete();
        return $res;
    }
}