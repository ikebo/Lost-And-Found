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

<style>
    .myinfo-ul li {
        margin-bottom: 20px;
    }
</style>
<div class="container container-postBaseInfo">
    <div class="col-md-2">
        <nav>
            <ul class="nav nav-pills nav-stacked myinfo-ul">
                <li role="presentation" class="active"><a href="<?php echo U('Info/myinfo');?>">基本信息</a></li>
                <li role="presentation"><a href="<?php echo U('Info/itemInfo');?>">物品信息</a></li>
                <li role="presentation"><a href="<?php echo U('Info/usershow');?>">个人展示</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-8">
        <form action="/" class="form-horizontal">
            <h3 class="text-danger text-center">修改基本信息</h3>
            <div class="form-group">
                <label for="real_name" class="col-sm-2  control-label">姓名</label>
                <div class="col-sm-8">
                    <input type="text" name="real_name" id="real_name" class="form-control" value="<?php echo ($userinfo["real_name"]); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="clsname" class="col-sm-2 control-label">班级</label>
                <div class="col-sm-8">
                    <input type="text" name="clsname" id="clsname" class="form-control" value="<?php echo ($userinfo["clsname"]); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="qqnum" class="col-sm-2  control-label"><text class="center">扣扣</text></label>
                <div class="col-sm-8">
                    <input type="text" name="qqnum" id="qqnum" class="form-control" value="<?php echo ($userinfo["qqnum"]); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="wxnum" class="col-sm-2  control-label">微信</label>
                <div class="col-sm-8">
                    <input type="text" name="wxnum" id="wxnum" class="form-control" value="<?php echo ($userinfo["wxnum"]); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="phonenum" class="col-sm-2  control-label">手机</label>
                <div class="col-sm-8">
                    <input type="text" name="phonenum" id="phonenum" class="form-control" value="<?php echo ($userinfo["phonenum"]); ?>">
                </div>
            </div>
        </form>
        <button style="float: right;" type="button" class="btn btn-primary ensure-postBaseInfo" onclick="postBaseInfo.check()">确定</button>
        <!--<input type="submit" class="btn btn-primary" value="确定">-->
    </div>

</div>
<script>
    var postBaseInfo = {
        check: function () {
            // 获取页面中提交的值
            var real_name = $('input[name="real_name"]').val();
            var clsname   = $('input[name="clsname"]').val();
            var qqnum     = $('input[name="qqnum"]').val();
            var wxnum     = $('input[name="wxnum"]').val();
            var phonenum  = $('input[name="phonenum"]').val();

            // console.log('(',real_name,')','(',clsname,')');
            // alert('1');
            var url = '/TPs/infoBoard/index.php?m=home&c=info&a=do_postBaseInfo';
            var data = {'real_name':real_name,'clsname':clsname,'qqnum':qqnum,'wxnum':wxnum,'phonenum':phonenum};

            // 执行异步请求
            $.post(url,data,function(result) {
                if(result.status == 0) {
                    return dialog.error(result.message);
                }
                if(result.status ==1) {
                    return dialog.success(result.message,'/TPs/infoBoard/index.php?m=home&c=info&a=myinfo')
                }
            },'JSON');
        }
    };
</script>


</div>
</body>
</html>