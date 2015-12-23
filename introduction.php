<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="./css/pclinet.css" type="text/css" rel="stylesheet" >
    <link href="./css/iconfont.css" type="text/css" rel="stylesheet">
    <link href="./css/framepage.css" type="text/css" rel="stylesheet">
    <link href="./css/common.css" type="text/css" rel="stylesheet">
    <script src="./js/jquery.js"></script>
    <title>顺风传媒 - 关于顺风</title>
    <style>
        body,p{padding: 0;margin: 0}
        ul{padding: 0;margin: 0}
        li{list-style: none;float: left}
        a{text-decoration: none;color: inherit;display: block}
        .block{position: relative;}
        .clearfix{overflow:hidden;_zoom:1;}
        .cannot_select{
            -moz-user-select:none;/*火狐*/
            -webkit-user-select:none;/*webkit浏览器*/
            -ms-user-select:none;/*IE10*/
            -khtml-user-select:none;/*早期浏览器*/
            user-select:none;
        }
        /* 电视局部样式 */
        .imgOfDetail{width: 100%;}
        #tvDetail{display: none;position:absolute;top: 80px;left: 15%;width: 70%;z-index: 1000}
        #tvDetail iframe,#tvDetail .imgwrap{background: #ffffff;float: left;width: 100%;height: 100%;border-radius: 5px;border:1px solid #cccccc;overflow: hidden;}
        #tvDetail iframe{min-height: 750px;}
        #tvDetail .imgwrap{min-height: 550px;}
        #tvDetail .imgwrap img{width: 100%;margin: 0 auto;}
        #closeShell{display: none;background: #15192F;opacity:.8;position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 999;}
        #tvDetail .siderbar{width: 28%;float: right;min-height: 200px;background: white;border-radius: 5px;border:1px solid #cccccc;overflow: hidden;}
        #filelist {overflow: hidden;_zoom:1;margin: 20px;padding-bottom: 20px;border-bottom: 1px solid #cccccc;}
        #filelist li{cursor: pointer;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;;background: #F7F3EF;margin-bottom: 5px;display: block;border-radius: 5px;padding: 5px 5%;width: 90%;}
        #filelist li:hover{color:#fff;background: #E69220;transition:all .5s ease}
        .sideBarHtmlBox{margin: 20px;overflow: hidden;_zoom:1;}
        #sideBarHead {border-bottom: 1px #cccccc solid}
        #sideBarHead p,#sideBarFoot p{color: grey;font-size: 12px;margin-bottom: 10px;}
        #sideBarHead div{width: 100%;}
        #sideBarHead img{height: 50px;float: left}
        #sideBarHead span{max-width: 69%;white-space: nowrap;overflow: hidden;text-overflow:ellipsis;margin-left: 10px;float: left;font-size: 18px;line-height: 50px;}
        /* -- */
    </style>
</head>
<body style="min-width: 768px">

<?php $isOpen=true; include './widget/pageControler.php';?>

<!-- 正文内容部分 -->
<?php
//    $frameBanner = 'UI/intro/banner-intro.png';
//    $menuInit = 'part-companyintro.html';
//    $menuList=Array(
//        '公司简介'=>'part-companyintro.html',
//        '顺风团队'=>'part-sunsgroup.html',
//        '顺风活动'=>'part-evt.php',
//        '公司荣誉'=>'part-honer.html',
//        '公司环境'=>'part-env.html',
//        '集团化运营'=>'part-jthyy.html'
//    );
//    include './widget/contentFrame.php';
//?>
<div id="content" class="first-block block clearfix">
    <img class="banner" src="UI/intro/banner-intro.png" >
    <div id="frame" class="clearfix">
        <ul class="content-nav cannot_select">
            <li id="currentA" data-url='./partpage/part-companyintro.html'>公司简介</li>
            <li data-url='./partpage/part-sunsgroup.html'>顺风团队</li>
            <li data-url='./partpage/part-evt.php'>顺风活动</li>
            <li data-url='./partpage/part-honer.html'>公司荣誉</li>
            <li data-url='./partpage/part-env.html'>公司环境</li>
            <li data-url='./partpage/part-jthyy.html'>集团化运营</li>
        </ul>
        <div class="content-detail">
            <iframe id="content-frame" width="100%" onload="this.style.height='150px';this.style.height = this.contentDocument.body.scrollHeight+10+'px';" src="./partpage/part-companyintro.html" ></iframe>
        </div>
        <script>
            $('#frame').find('.content-nav')[0].addEventListener('click',function(e){
                var ele= e.target;
                if(ele.tagName.toLowerCase()=='li'){
                    document.querySelector('#content-frame').src= e.target.getAttribute('data-url');
                    document.querySelector('#currentA').id=null;
                    ele.id='currentA';
                }
            })
        </script>
    </div>
</div>



<?php include './widget/linksModel.php';?>
<div id="closeShell"></div>
<div id="tvDetail" class="clearfix"></div>
<?php include './widget/foot.php';?>