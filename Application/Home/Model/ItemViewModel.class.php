<?php
namespace Home\Model;
use Think\Model\ViewModel;
use Think\Model;

class ItemViewModel extends ViewModel {
    public $viewFields = array(
        'User' => array('user_id', 'username'),
        'Info' => array('info_id','real_name','qqnum','wxnum','phonenum','real_img','user_id','_on' => 'User.user_id=Info.user_id'),
        'Item' => array('item_id','item_name','time','place','detail','user_id', 'type', 'item_img', '_on'=>'Info.user_id=Item.user_id')
    );
}