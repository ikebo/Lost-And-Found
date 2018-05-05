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

<style type="text/css">
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
      margin: 0 auto 0 20px;
      float: left;
    }
</style>
<div class="container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="" class="form-horizontal">
            <h3 class="text-danger text-center">发布物品信息</h3>
            <div class="form-group">
                <label for="item_name" class="col-sm-2  control-label">名称</label>
                <div class="col-sm-8">
                    <input type="text" name="item_name" id="item_name" class="form-control" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="time" class="col-sm-2 control-label">时间</label>
                <div class="col-sm-8">
                    <input type="date" name="time" id="time" class="form-control" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="place" class="col-sm-2  control-label"><text class="center">地点</text></label>
                <div class="col-sm-8">
                    <input type="text" name="place" id="place" class="form-control" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="detail" class="col-sm-2  control-label">描述</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="detail" name="detail"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label for="img_input" id="img_label">选择图片+</label>
                     
                <div class="col-sm-8">
                    <input type="file"  name="item_img" id="img_input" accept="image/*" />
                    <img  style="display: none" src="" id="item_img" width="150" height="150">
                </div>
            </div>
            <div class="form-group">
                <label for="type0" class="col-sm-2 control-label">类型</label>

                <label class="radio-inline">
                    <input type="radio" name="type" id="type0" value="0" checked>
                    丢失的物品
                </label>
                <label class="radio-inline">
                    <input type="radio" name="type" id="type1" value="1">捡到的物品
                </label>
            </div>
        </form>
        <button style="float: right;" type="button" class="btn btn-primary ensure-postBaseInfo" onclick="postItem.check()">确定</button>
    </div>
    <div class="col-md-1"></div>
</div>

<script>
var postItem = {
    check: function() {
        // 获取页面中提交的值
        var item_name = $('input[name="item_name"]').val();
        var time = $('input[name="time"]').val();
        var place = $('input[name="place"]').val();
        var detail = $('textarea[name="detail"]').val();
        var item_img = $('#item_img')[0].src;

        var type=0;
        var radio = document.getElementsByName("type");
        for(i=0; i<radio.length;i++) {
            if(radio[i].checked) {
                type = radio[i].value;
            }
        }

        console.log("名称",item_name);
        console.log("时间",time);
        console.log("地点",place);
        console.log("描述",detail);
        console.log("类型",type);
        console.log("图片地址",item_img);

        if(!item_name) {
            return dialog.error('物品名称不能为空!');
        }
        if(!time) {
            return dialog.error('丢失或拾到物品时间不能为空!');
        }
        if(!place) {
            return dialog.error('丢失或拾到物品地点不能为空!');
        }



        var url = '/TPs/infoBoard/index.php?m=home&c=item&a=do_postItem';
        var data = {'item_name':item_name,'time':time,'place':place,'detail':detail,'type':type,'item_img':item_img};


        // 执行异步请求
        $.post(url,data,function(result) {
            if(result.status == 0) {
                return dialog.error(result.message);
            }
            if(result.status == 1) {
                return dialog.success(result.message,'/TPs/infoBoard/index.php');
            }
        },'JSON');

    }
}
</script>

<script type="text/javascript">
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


    var form_data = new FormData();
    var file_data = $("#img_input").prop("files")[0];

    // 把上传的数据放入form_data
    form_data.append("img", file_data);


    $.ajax({
        type: "POST", // 上传文件要用POST
        url: "<?php echo U('Item/do_upload');?>",
        dataType : "json",
        crossDomain: true, // 如果用到跨域，需要后台开启CORS
        processData: false,  // 注意：不要 process data
        contentType: false,  // 注意：不设置 contentType
        data: form_data,
        success: function(result) {
            console.log(result);
            $('#item_img').attr('src', '/TPs/infoBoard/'+result.data);
            $('#item_img').show();
        },
        fail: function(result) {
            console.log(result);
        }
    });

  }
});

</script>
</div>
</body>
</html>