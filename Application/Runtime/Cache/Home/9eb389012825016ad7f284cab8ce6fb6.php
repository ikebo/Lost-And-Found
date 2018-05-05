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

<link rel="stylesheet" href="/TPs/infoBoard/Public/uploadify/uploadify.css" />
<style>
    .myinfo-ul li {
        margin-bottom: 20px;
    }
    .preview_box img {
      width: 200px;
    }

    #img_input {
        display: none;
    }

    #img_label {
      background-color: #f2d547;
      border-radius: 5px;
      display: inline-block;
      padding: 10px;
    }

    #sub_input {
        display: block !important;
        margin-top: 10px;  
    }
</style>
<div class="container">
    <div class="col-md-2">
        <nav>
            <ul class="nav nav-pills nav-stacked myinfo-ul">
                <li role="presentation"><a href="<?php echo U('Info/myinfo');?>">基本信息</a></li>
                <li role="presentation"><a href="<?php echo U('Info/itemInfo');?>">物品信息</a></li>
                <li role="presentation" class="active"><a href="<?php echo U('Info/usershow');?>">个人展示</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-1">

    </div>
    <div class="col-md-7">
        <?php if($img_src): $res = '/TPs/infoBoard/'.$img_src ?>
        <h4 class="text-primary" style="margin-bottom: 20px">个人展示</h4>
        <img src="<?php echo ($res); ?>" width="200" height="200" style="margin-left: 20%; display: block"/>  
            <button class="btn btn-info" id="btn_change_img" style="float: right;">修改</button>
        <?php else: ?>
        
        <form action="<?php echo U('Info/do_upload');?>" class="form-horizontal" method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <div class="col-sm-6">
                <label for="img_input" id="img_label" >选择图片+</label>    
                <input id="img_input" name='photo'  type="file" accept="image/*"/> 
                <div class="preview_box"></div>                
                <input type="submit"  id="sub_input" value="修改" class="btn btn-default">
                    

            </div>
            <div class="col-sm-6">
                
            </div>
        </div>
        </form><?php endif; ?>
    </div>
</div>

<script>
$('#btn_change_img').click(function(){
    // 异步请求usershow方法
    var url = '/TPs/infoBoard/index.php?m=home&c=info&a=usershow';
    window.location.href = url + '&status=1';
});

$("#img_input").on("change", function(e){

  var file = e.target.files[0]; //获取图片资源

  // 只选择图片文件
  if (!file.type.match('image.*')) {
    return false;
  }

  var reader = new FileReader();

  reader.readAsDataURL(file); // 读取文件

  // 渲染文件
  reader.onload = function(arg) {

    var img = '<img class="preview" src="' + arg.target.result + '" alt="preview"/>';
    $(".preview_box").empty().append(img);
    }
});

</script>



</div>
</body>
</html>