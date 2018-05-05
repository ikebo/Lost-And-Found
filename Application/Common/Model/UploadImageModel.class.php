<?php
namespace Common\Model;
use Think\Model;
use Think\Upload;

/**
 * 图片上传类
 */

class UploadImageModel extends Model {
    private $_uploadObj = '';
    const UPLOAD = 'uploads/users/';

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
            return self::UPLOAD.$res['photo']['savepath'].$res['photo']['savename'];
        } else {
            return false;
        }
    }
}