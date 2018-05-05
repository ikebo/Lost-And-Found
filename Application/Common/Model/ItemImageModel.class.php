<?php
namespace Common\Model;
use Think\Model;
use Think\Upload;

/**
 * 图片上传类
 */

class ItemImageModel extends Model {
    private $_uploadObj = '';
    const UPLOAD = 'uploads/items/';

    public function __construct() {
        $config = array(
            'rootPath' => self::UPLOAD,
            'subName'  => array('date','Y-m-d')
        );

        $this->_uploadObj = new Upload($config);
    }

    public function imageUpload() {
        $res = $this->_uploadObj->upload();

        if($res) {
            return self::UPLOAD.$res['img']['savepath'].$res['img']['savename'];
        } else {
            return false;
        }
    }
}