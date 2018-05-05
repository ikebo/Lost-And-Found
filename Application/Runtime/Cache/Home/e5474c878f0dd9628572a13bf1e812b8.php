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

<div class="container">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
                <th class="text-center" colspan="2">物品信息</th>
                <th class="text-center" colspan="2">
                    <?php if($item["type"] == 1): ?>拾者信息
                        <?php else: ?>
                        失主信息<?php endif; ?>
                </th>
            </tr>
            <tr>
                <td class="text-center">名称</td>
                <td class="text-center text-danger"><b><?php echo (isEmpty($item["item_name"])); ?></b></td>
                <td class="text-center">姓名</td>
                <td class="text-center text-danger"><b><?php echo (isEmpty($info["real_name"])); ?></b></td>
            </tr>
            <tr>
                <td class="text-center">时间</td>
                <td class="text-center text-danger"><b><?php echo (isEmpty($item["time"])); ?></b></td>
                <td class="text-center">手机</td>
                <td class="text-center text-danger"><b><?php echo (isEmpty($info["phonenum"])); ?></b></td>
            </tr>
            <tr>
                <td class="text-center">地点</td>
                <td class="text-center text-danger"><b><?php echo (isEmpty($item["place"])); ?></b></td>
                <td class="text-center">扣扣</td>
                <td class="text-center text-danger"><b><?php echo (isEmpty($info["qqnum"])); ?></b></td>
            </tr>
            <tr>
                <td class="text-center">描述</td>
                <td class="text-center text-danger"><p><b><?php echo (isEmpty($item["detail"])); ?></b></p></td>
                <td class="text-center">微信</td>
                <td class="text-center text-danger"><b><?php echo (isEmpty($info["wxnum"])); ?></b></td>
            </tr>
            <tr>
                <td class="text-center">图片</td>
                <td class="text-center">
                    <?php if($item.item_img): ?><img src="<?php echo ($item["item_img"]); ?>" width="150px" height="150px">
                        <?php else: ?>
                        <b>无</b><?php endif; ?>
                </td>
                <td class="text-center">图片</td>
                <td class="text-center">
                    <?php if($info.real_img): ?><img src="<?php echo ($info["real_img"]); ?>" width="150px" height="150px">
                        <?php else: ?>
                        <b>无</b><?php endif; ?>
                </td>
            </tr>
        </table>
        <button class="btn btn-info btn-sm" style="float: right;" onclick="window.history.back()">返回</button>
    </div>
    <div class="col-md-2">

    </div>

</div>

</div>
</body>
</html>