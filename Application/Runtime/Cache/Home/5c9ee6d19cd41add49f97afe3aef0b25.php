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

<link rel="stylesheet" href="/TPs/infoBoard/Public/css/login.css">
<div class="container login-container">
<form action="/TPs/infoBoard/index.php/Home/User/do_login">
<h3 class="text-success text-center">登录</h3>
<div class="form-group">
    <label for="username">用户名</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="username">
</div>
<div class="form-group">
    <label for="password">密码</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="password">
</div>
<button type="button" class="btn btn-info" onclick="login.check()">登录</button>
<div class="require-register">
    <text class="text-primary">没有账号?</text>
    <a href="<?php echo U('User/register');?>" class="btn btn-default">注册</a>
</div>
</form>
</div>

<script>
    var login = {
        check : function() {
            // 获取登录页面中的用户名和密码
            var username = $('input[name="username"]').val();
            var password = $('input[name="password"]').val();

            if(!username) {
                dialog.error('用户名不能为空');
            }
            if(!password) {
                dialog.error('密码不能为空');
            }

            var url = "/TPs/infoBoard/index.php?m=home&c=user&a=do_login";
            var data = {'username':username,'password':password};
            // 执行异步请求
            $.post(url,data,function(result) {
                if(result.status == 0) {
                    return dialog.error(result.message);
                }
                if(result.status == 1) {
                    return dialog.success(result.message, '/TPs/infoBoard/index.php?m=home&c=index&a=index');
                }
            },'JSON');

        }
    };
</script>


</div>
</body>
</html>