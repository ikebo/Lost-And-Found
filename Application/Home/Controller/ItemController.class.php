<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class ItemController extends Controller {
    public function postItem() {
        $this->display();
    }

    public function do_postItem() {
        $item_name = $_POST['item_name'];
        $time = $_POST['time'];
        $place = $_POST['place'];
        $detail = $_POST['detail'];
        $type = $_POST['type'];
        $item_img = $_POST['item_img'];
        if(strpos($item_img,'postItem.html') === false) {
            $item_img = explode('//',$item_img,2)[1];
            $item_img = explode('/',$item_img,4)[3];
        } else {
            $item_img = 'Public/images/default1.png';
        }


        $data = array(
            'item_name' => $item_name,
            'time' => $time,
            'place' => $place,
            'detail' => $detail,
            'type' => $type,
            'user_id' => session('user.userId'),
            'item_img' => $item_img,
        );

        $model = new Model('Item');
        if(!($model->add($data))) {
            return show(0,'发布失败');
        } else {
            return show(1,'发布成功');
        }
    }

    public function do_upload() {
        $res = D("ItemImage")->imageUpload();
        if(!$res) {// 上传错误提示错误信息
            return show(0,'上传失败!');
        }else{// 上传成功
            $is_update = D("Info")->updateImgById($res);
            if($is_update === false) {
                return show(0, '上传失败!');
            } else {
                return show(1, '上传成功', $res);
            }
        }
    }

    public function detail() {
        $item_id = $_GET['item_id'];
        $item = D('Item')->getItemByItemId($item_id);
        $user_id = D('Item')->getUserIdByItemId($item_id);
        $info = D('Info')->getInfoByUserId($user_id);

        $this->assign('item',$item);
        $this->assign('info',$info);
        $this->display();

    }

    public function xdetail() {
        $item_id = $_GET['item_id'];
        $item = D('Item')->getItemByItemId($item_id);

        $this->assign('item',$item);
        $this->display();
    }

    public function do_del() {
        $item_id = $_POST['item_id'];
        if(!$item_id) {
            return show(0,'发生错误！');
        }

        $res = D('Item')->delItemByItemId($item_id);
        if(!$res) {
            return show(0,'删除失败!');
        } else {
            return show(1,'删除成功');
        }
    }

    public function editItem() {
        $item_id = $_GET['item_id'];
        $item = D("Item")->getItemByItemId($item_id);

        $this->assign('item',$item);
        $this->display();
    }

    public function do_editItem() {
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $time = $_POST['time'];
        $place = $_POST['place'];
        $detail = $_POST['detail'];
        $type = $_POST['type'];
        $item_img = $_POST['item_img'];
        if(strpos($item_img,'postItem.html') === false) {
            $item_img = explode('//',$item_img,2)[1];
            $item_img = explode('/',$item_img,4)[3];
        } else {
            $item_img = 'Public/images/default1.png';
        }


        $data = array(
            'item_name' => $item_name,
            'time' => $time,
            'place' => $place,
            'detail' => $detail,
            'type' => $type,
            'user_id' => session('user.userId'),
            'item_img' => $item_img,
        );

        $model = new Model('Item');
        if(!($model->where(array('item_id'=>$item_id))->save($data))) {
            return show(0,'修改失败');
        } else {
            return show(1,'修改成功');
        }
    }
}