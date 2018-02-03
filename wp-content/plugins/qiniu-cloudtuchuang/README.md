=== 七牛云图床插件 ===
Contributors:  verylove
Donate link: http://www.75271.com/
Tags: qiniu, tuchuang , 七牛 , 七牛云 , 图床
Requires at least: 4.7.4
Tested up to: 4.7.4
Stable tag: 4.7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

#七牛云图床插件

该插件让你直接在编辑器页面上传图片到七牛对象存储空间
上传完成后自动在编辑器中添加图片，不需要设置全站CDN
功能简单，更方便


#介绍

#详细介绍：
 [http://www.75271.com/2954.html](http://www.75271.com/2954.html)

#安装

1. 上传 `qiniu-cloudtuchaung`目录 到 `/wp-content/plugins/` 目录
2. 在后台插件菜单激活该插件
3. 在后台设置设置accesskey,screctkey,bucket,七牛绑定域名

== Screenshots == 

1. 七牛镜像存储设置
![](https://happyonion.github.io/qiniu-cloudtuchaung/qniu-setup.png)

2.编辑器
![](https://happyonion.github.io/qiniu-cloudtuchaung/screenshot.png)

3.后台设置
![](https://happyonion.github.io/qiniu-cloudtuchaung/screenshot-1.png)

== Changelog ==

2017-2-26

更新自动同步七牛云路径BUG

2017-2-25
初始版本

== Frequently Asked Questions ==

###为什么不能上传图片的同时同步上传到七牛云？
>后台 设置->七牛云图床->是否同步上传,勾选选项


###图片怎么能自动把图片同步七牛云存储时同步路径一起?
>后台 设置->七牛云图床->前缀 ,修改为空即可

###不能上传？

>上传前要设置accessKey和SecretKey还有bucket
不要有多余的 “/”或空格 哦

####自动添加的图片title,alt信息？

>信息默认为文章标题，如果标题为空则为空

###为什么我上传的图片不显示？

>请确定编辑器是在可视化下，文本模式不能正常添加链接


== Upgrade Notice == 

>更新最新七牛接口SDK 