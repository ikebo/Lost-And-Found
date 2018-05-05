<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAF</title>
    <link rel="stylesheet" href="/TPs/infoBoard/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/TPs/infoBoard/Public/css/index.css">
</head>
<body>
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo U('Index/index');?>" class="navbar-brand"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a href="#">关于</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(empty($_SESSION['user']['username'])): ?><li><a href="<?php echo U('User/login');?>">登录</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Item/postItem');?>">发布</a></li>
                    <li><a href="<?php echo U('Info/myinfo');?>">我的</a></li>
                    <li><a href="<?php echo U('User/logout');?>">退出</a></li><?php endif; ?>
                <li><a href="<?php echo U('User/register');?>">注册</a></li>
            </ul>
        </div>

    </div>
</div>

<script src="/TPs/infoBoard/Public/js/jquery.min.js"></script>
<script src="/TPs/infoBoard/Public/layer/layer.js"></script>
<script src="/TPs/infoBoard/Public/js/dialog.js"></script>
<script src="/TPs/infoBoard/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="/TPs/infoBoard/Public/js/home/common.js"></script>



<div class="content">

<div class="container">
<div>
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <h4 class="text-danger" style="font-weight: bold"><?php echo ($user); ?>:</h4>
    </div>
</div>

</div>

<div class="container">
<div class="col-md-3"></div>
<div class="col-md-6" style="margin: 0 auto;">
    <table class="table">
        <tr>
            <th>姓名</th>
            <th>性别</th>
            <th>专业</th>
            <th>班级</th>
        </tr>
        <tr>
            <td class="text-primary"><?php echo (isEmpty($info["name"])); ?></td>
            <td class="text-danger">
                <?php if($info.sex): if($info["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?>
                    <?php else: ?>
                    未填写<?php endif; ?>
            </td>
            <td class="text-success"><?php echo (isEmpty($info["major"])); ?></td>
            <td class="text-warning"><?php echo (isEmpty($info["cls"])); ?></td>
        </tr>
    </table>
    <button class="btn btn-info btn-sm" style="float: right" onclick="window.history.back()">返回</button>
</div>
<div class="col-md-3"></div>
</div>

</div>
</body>
</html>