<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>info信息网</title>
    <link rel="stylesheet" href="/TPs/infoBoard/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/TPs/infoBoard/Public/css/index.css">
</head>
<body>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="<?php echo U('Index/index');?>" class="navbar-brand"></a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="<?php echo U('Index/index');?>">首页</a></li>
            <li><a href="#">关于</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if(empty($_SESSION['user']['username'])): ?><li><a href="<?php echo U('User/login');?>">登录</a></li>
                <?php else: ?>
                <li><a href="<?php echo U('Info/myinfo');?>">我的</a></li>
                <li><a href="<?php echo U('User/logout');?>">退出</a></li><?php endif; ?>
            <li><a href="<?php echo U('User/register');?>">注册</a></li>
        </ul>
    </div>
</div>

<script src="/TPs/infoBoard/Public/js/jquery.min.js"></script>
<script src="/TPs/infoBoard/Public/layer/layer.js"></script>
<script src="/TPs/infoBoard/Public/js/dialog.js"></script>
<script src="/TPs/infoBoard/Public/bootstrap/js/bootstrap.min.js"></script>


<div class="content">

<link rel="stylesheet" href="/TPs/infoBoard/Public/css/myinfo.css">
<style>
    .info-changeBtn {
        float: right;
        margin-top: 10px;
    }
    textarea {
        font-weight: bold;
        font-size: large;
    }
</style>
<div class="container">
    <div class="col-md-2">
        <nav>
            <ul class="nav nav-pills nav-stacked myinfo-ul">
                <li role="presentation"><a href="<?php echo U('Info/myinfo');?>">基本信息</a></li>
                <li role="presentation" class="active"><a href="<?php echo U('Info/eduInfo');?>">教育背景</a></li>
                <li role="presentation"><a href="<?php echo U('Info/usershow');?>">个人展示</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-1">

    </div>
    <div class="col-md-7">
        <h3 class="text-primary">教育背景</h3>
        <!--<h2><?php echo ($eduBg); ?></h2>-->
        <textarea name="" id="" cols="30" rows="10" class="form-control" readonly><?php echo ($eduBg); ?></textarea>

        <a href="<?php echo U('Info/postEduInfo');?>"><button class="btn btn-info info-changeBtn">修改</button></a>
    </div>
    <div class="col-md-1"></div>

</div>


</div>
<script src="/TPs/infoBoard/Public/js/home/common.js"></script>
</body>
</html>