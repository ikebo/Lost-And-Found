<?php
namespace Home\Controller;
use Home\Model\ItemViewModel;
use Think\Controller;
use Think\Page;
use Think\Model;

class IndexController extends Controller {
    public function index(){
          $model = new ItemViewModel();
          $count = $model->count();

          $page = new Page($count,3);
          $show = $page->show();

          $list = $model->order('item_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();

          $this->assign('page',$show);
          $this->assign('list',$list);
          $this->display();
    }


    public function foundIndex() {
        $model = new Model('Item');
        $count = $model->where(array('type'=>1))->count();

        $page = new Page($count,3);
        $show = $page->show();

        $list = $model->where(array('type'=>1))->order('item_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
    }

    public function lostIndex() {
        $model = new Model('Item');
        $count = $model->where(array('type'=>0))->count();

        $page = new Page($count,3);
        $show = $page->show();

        $list = $model->where(array('type'=>0))->order('item_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
    }


    public function searchItem() {
        $content = $_GET['content'];
        $model = new Model('Item');

        $cond['detail'] = array('like','%'.$content.'%');

        $count = $model->where($cond)->count();
        $page = new Page($count,3);
        $show = $page->show();

        $list = $model->where($cond)->order('item_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
    }

    public function test() {
        $this->display();
    }


    public function about() {
        $this->display();
    }


}