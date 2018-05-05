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
                <li><a href="<?php echo U('Index/about');?>">关于</a></li>
            </ul>
            <div class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                </div>
                <button  class="btn btn-default"  onclick="search.check()">Submit</button>
            </div>
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
<script>
    var search = {
        check: function() {
            var content = $('input[name="search"]').val();
            if(!content) {
                return 0;
            } else {
                var url = '/TPs/infoBoard/index.php?m=home&c=index&a=searchItem';
                var data = {'content':content};
                $.get(url,data, function() {
                    window.location.href='/TPs/infoBoard/index.php?m=home&c=index&a=searchItem&content=' + content;
                });
            }

        }
    };
</script>


<div class="content">

<link rel="stylesheet" href="/TPs/infoBoard/Public/css/myinfo.css">
<style>
    .info-changeBtn {
        float: right;
    }
</style>
<div class="container">
    <div class="col-md-2">
    <nav>
        <ul class="nav nav-pills nav-stacked myinfo-ul">
            <li role="presentation" class="active"><a href="<?php echo U('Info/myinfo');?>">基本信息</a></li>
            <li role="presentation"><a href="<?php echo U('Info/itemInfo');?>">物品信息</a></li>
            <li role="presentation"><a href="<?php echo U('Info/usershow');?>">个人展示</a></li>
        </ul>
    </nav>
    </div>
    <div class="col-md-1">

    </div>
    <div class="col-md-7">
        <table class="table table-hover table-striped">
            <tr>
                <th>用户名</th>
                <td><text class="center"><?php echo ($user["username"]); ?></text></td>
            </tr>
            <tr class="danger">
                <th>姓名</th>
                <td><?php echo ($userinfo["real_name"]); ?></td>
            </tr>
            <tr class="warning">
                <th>班级</th>
                <td><?php echo ($userinfo["clsname"]); ?></td>
            </tr>
            <tr class="success">
                <th>QQ</th>
                <td><?php echo ($userinfo["qqnum"]); ?></td>
            </tr>
            <tr class="warning">
                <th>微信</th>
                <td><?php echo ($userinfo["wxnum"]); ?></td>
            </tr>
            <tr class="info">
                <th>手机</th>
                <td><?php echo ($userinfo["phonenum"]); ?></td>
            </tr>

        </table>
        <a href="<?php echo U('Info/postBaseInfo');?>"><button class="btn btn-info info-changeBtn">修改</button></a>
    </div>
    <div class="col-md-1"></div>

</div>
</div>
</body>
</html>