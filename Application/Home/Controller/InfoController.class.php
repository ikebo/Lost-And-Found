<?php
namespace Home\Controller;
use Home\Model\InfoViewModel;
use Think\Controller;
use Think\Model;
use Think\Page;

class InfoController extends Controller {
    // 个人信息
    public function myinfo() {
        $infomodel = new Model('Info');
        $userinfo = $infomodel->where(array('user_id'=>session('user.userId')))->find();

        $usermodel = new Model('User');
        $user = $usermodel->where(array('user_id'=>session('user.userId')))->find();


        $this->assign('user',$user);
        $this->assign('userinfo',$userinfo);
        $this->display();
    }

    // 修改基本信息
    public function postBaseInfo() {
        $infomodel = new Model('Info');
        $userinfo = $infomodel->where(array('user_id'=>session('user.userId')))->find();


        $this->assign('userinfo',$userinfo);
        $this->display();
    }

    public function do_postBaseInfo() {
        $real_name = $_POST['real_name'];
        $clsname   = $_POST['clsname'];
        $qqnum     = $_POST['qqnum'];
        $wxnum     = $_POST['wxnum'];
        $phonenum  = $_POST['phonenum'];



        $data = array(
            'real_name' => $real_name,
            'clsname' => $clsname,
            'qqnum' => $qqnum,
            'wxnum' => $wxnum,
            'phonenum' => $phonenum,
            'user_id' => session('user.userId'),
        );

        $model = new Model('Info');


        // 如果对应信息表不存在，则创建
        if(($model->where(array('user_id'=>session('user.userId')))->find())===false) {
            if(!($model->add($data))) {
                return show(0,'数据更新失败');
            } else return show('1','数据更新成功');

        } else {    // 如果存在，则更新
            if(($model->where(array('user_id'=>session('user.userId')))->save($data))===false) {
                return show(0,'数据更新失败');
            } else {
                return show('1','数据更新成功');
            }
        }

    }




    // 个人展示
    public function usershow() {
        $res = D("Info")->isImgExists();
        if($res===false) {
            $this->assign('img_src',0);
        } else{
            $this->assign('img_src',$res);
        }

        if($_GET['status'] == 1) {
            $this->assign('img_src',0);
        } else {
            $this->assign('img_src',$res);
        }

        $this->display();

    }

    public function do_upload() {
        $res = D("UploadImage")->imageUpload();
        if(!$res) {// 上传错误提示错误信息
            $this->error('图片更新失败!');
        }else{// 上传成功
            $is_update = D("Info")->updateImgById($res);
            if($is_update === false) {
                $this->error('图片更新失败!');
            } else {
                $this->success('上传成功!', '/TPs/infoBoard/index.php?m=home&c=info&a=usershow');
            }
        }
    }



    public function itemInfo() {
        $user_id = session("user.userId");
        $items = new Model("Item");

        $count = $items->where(array('user_id'=>$user_id))->count();

        $page = new Page($count,3);
        $show = $page->show();

        $list = $items->where(array('user_id'=>$user_id))->order('item_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
    }


}