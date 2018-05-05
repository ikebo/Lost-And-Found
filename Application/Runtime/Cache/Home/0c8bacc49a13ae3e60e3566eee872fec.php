<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>
    <link rel="stylesheet" href="/TPs/infoBoard/Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/TPs/infoBoard/Public/css/index.css">
    <!--<link rel="stylesheet" href="/TPs/infoBoard/Public/css/register.css">-->
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
                <li><a href="<?php echo U('User/logout');?>">退出</a></li><?php endif; ?>
            <li><a href="<?php echo U('User/register');?>">注册</a></li>
        </ul>
    </div>
</div>

<script src="/TPs/infoBoard/Public/js/jquery.min.js"></script>
<script src="/TPs/infoBoard/Public/layer/layer.js"></script>
<script src="/TPs/infoBoard/Public/js/dialog.js"></script>

<script>
    // var logout = function () {
    //     return dialog.success('退出成功','/TPs/infoBoard/index.php?m=home&c=index&a=index');
    // }
</script>
<div class="content">

<script src="/TPs/infoBoard/Public/js/jquery.min.js"></script>
<script src="/TPs/infoBoard/Public/layer/layer.js"></script>
<script src="/TPs/infoBoard/Public/js/dialog.js"></script>

<div class="container">
    <h1>111</h1>
</div>
<script>
    dialog.success('退出成功','/TPs/infoBoard/index.php?m=home&c=index&a=index');
</script>
</div>
</body>
</html>