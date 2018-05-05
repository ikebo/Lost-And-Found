失物招领项目源码

项目暂时地址为: 
www.thinkbig.top/TPs/infoBoard/
or
140.82.46.148/TPs/infoBoard/

后端: thinkphp 3.2.3
前端: h5+c3+js+jq

插件or第三方库&API
uplodify  由于不兼容移动端最后弃用
layer.layui     第三方弹层组件

图片上传方案: 
异步: 将图片数据装入FormData对象，ajax传到服务器, 存入数据库后返回url再实现预览
同步: 将图片数据转成base64url格式, jquery操作DOM实现预览，点击确定直接存入数据库库


不足: 
目前仍存在些Bug, 还没加图片压缩，图片上传较慢。 后期会慢慢改进。

