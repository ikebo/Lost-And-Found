<?php
namespace Home\Controller;
use Home\Model\InfoViewModel;
use Think\Controller;
use Think\Model;

class UserController extends Controller {
    // 注册
    public function register() {
        $this->display();
    }

    // 注册处理
    public function do_register() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!trim($username)) {
            return show('0','用户名不能为空');
        }
        if(!trim($password)) {
            return show('0','密码不能为空');
        }

        // 检测用户名是否已存在
        $model = new Model('User');
        $user = $model->where(array('username'=>$username))->find();
        if(!empty($user)) {
            return show('0','用户名已存在');
        }

        $data = array(
          'username' => $username,
          'password' => md5($password)
        );


        if(!($model->create($data) && $model->add())) {
            return show('0','注册失败');
        } else {
            // 创建信息表
            $user = $model->where(array('username'=>$username))->find();
            $infomodel = new Model('Info');
            if($infomodel->add(array('user_id'=>$user['user_id'])) == false) {
                return show(0,'信息表创建失败');
            }
            return show('1','注册成功');
        }

    }


    // 登录
    public function login() {
        $this->display();
    }

    // 登录处理
    public function do_login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        if(!trim($password)) {
            return show(0,'密码不能为空');
        }

        $model =  new Model('User');
        $user = $model->where(array('username' => $username))->find();
        if(empty($user)) {
            return show(0,'用户不存在');
        } else if($user['password'] != md5($password)) {
            return show('0','密码错误');
        }

        // 写入session
        session('user.userId', $user['user_id']);
        session('user.username', $user['username']);

        // 登录成功,跳转首页
        return show('1','登录成功');

    }

    // 退出
    public function logout() {
        session_destroy();
        $this->redirect('/Home/Index/index');
    }


}
