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

<style>
    a:hover {
        color: lightskyblue;
    }
</style>
<div class="container container-info">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
            <li style="margin-bottom: 10px;"><a href="<?php echo U('Index/index');?>" style="color: grey; background-color: #eeeeee;">查看全部</a></li>
            <li style="margin-bottom: 10px;"><a href="<?php echo U('Index/foundIndex');?>">招领物品</a></li>
            <li><a href="<?php echo U('Index/lostIndex');?>">丢失物品</a></li>
        </ul>
    </div>
    <div class="col-md-8">
        <table class="table table-striped ">
            <tr>
                <th>物品</th>
                <th>名称</th>
                <th>类型</th>
                <th>时间</th>
                <th>地点</th>
                <th>详情</th>
            </tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                    <td>
                        <?php if($item["item_img"] == null): ?><img src="/TPs/infoBoard/Public/images/default.png" width="25" height="25">
                            <?php else: ?><img src="/TPs/infoBoard/<?php echo ($item["item_img"]); ?>" width="25" height="25"/><?php endif; ?>
                    </td>
                    <td><?php echo ($item["item_name"]); ?></td >
                    <td><?php if($item["type"] == 1): ?>招领<?php else: ?>失物<?php endif; ?></td>
                    <td><?php echo ($item["time"]); ?></td>
                    <td><?php echo ($item["place"]); ?></td>
                    <td><a style="text-decoration: none;" href="/TPs/infoBoard/index.php?m=home&c=item&a=detail&item_id=<?php echo ($item["item_id"]); ?>">查看</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div>
            <?php echo ($page); ?>
        </div>
    </div>
    <div class="col-md-2">

    </div>

</div>
</div>
</body>
</html>