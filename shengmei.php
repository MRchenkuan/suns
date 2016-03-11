<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">-->
    <?php include './widget/keywords.php';?>
    <link href="./css/pclinet.css" type="text/css" rel="stylesheet" >
    <link href="./css/iconfont.css" type="text/css" rel="stylesheet">
    <link href="./css/adapter.css" type="text/css" rel="stylesheet">
    <link href="./css/common.css" type="text/css" rel="stylesheet">
    <link href="./css/framepage.css" type="text/css" rel="stylesheet">
    <script src="./js/jquery.js"></script>
    <script src="./js/myslider.js"></script>
    <!--<script src="./js/preload.js"></script>-->
    <title>顺风传媒 - 盛美顺风</title>
    <style>
        body,p{padding: 0;margin: 0}
        /*div,img,ul,li{border: 1px dashed grey}*/
        ul{padding: 0;margin: 0}
        li{list-style: none;float: left}
        a{text-decoration: none;color: inherit;display: block}
        .clearfix{overflow:hidden;_zoom:1;}
        .cannot_select{
            -moz-user-select:none;/*火狐*/
            -webkit-user-select:none;/*webkit浏览器*/
            -ms-user-select:none;/*IE10*/
            user-select:none;
        }
        .detail-5-col{float: left;margin: 0 1% 1% 0;width: 19%;}
        /* 电视局部样式 */
        #tvDetail{display: none;position:absolute;top: 80px;left: 15%;width: 70%;z-index: 1000}
        #tvDetail iframe,#tvDetail .imgwrap{background: #ffffff;float: left;width: 100%;height: 100%;border-radius: 5px;border:1px solid #cccccc;overflow: hidden;}
        #tvDetail iframe{min-height: 750px;}
        #tvDetail .imgwrap{min-height: 550px;}
        #tvDetail .imgwrap img{width: 100%;margin: 0 auto;}
        #closeShell{background: url('./UI/loading.gif') #15192F no-repeat center center;display: none;opacity:.8;position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 999;}
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
<body>
<?php $isOpen=true; include './widget/pageControler.php';?>


<!-- 正文内容部分 -->

<div id="content" class="first-block block clearfix">
    <img class="banner" src="UI/shengmei/Group.png" >
    <div id="frame" class="clearfix" style="margin-top: 20px;">
        <div style="width: 100%" class="clearfix">
            <img style="width:28%;margin-right: 3.2%" src="./UI/shengmei/7.png">
            <img style="width:68%;" src="./UI/shengmei/6.png">
        </div>
        <div style="height: 120px;">
            <p style="text-align: center;font-size: 22px;padding-top: 40px;">
                连续5年位列中国创意50强前10名
            </p>
            <p style="text-align: center">
                是近年来获奖最多的中国本土公司（没有之一）
            </p>
        </div>
        <div class="clearfix">
            <img class="detail-5-col" src="./UI/shengmei/1.png">
            <img class="detail-5-col" src="./UI/shengmei/2.png">
            <img class="detail-5-col" src="./UI/shengmei/3.png">
            <img class="detail-5-col" src="./UI/shengmei/4.png">
            <img class="detail-5-col" src="./UI/shengmei/5.png">
        </div>
        <div style="height: 120px;margin: 20px 0;" class="clearfix">
            <p style="float: left;width:75%;line-height: 2">2009年有3家中国本土广告公司跻身前10，其中有家来自长沙的广告公司作为创意界的一匹黑马首度杀入中国广告创意圈顶尖阵营，后来历经五年的持续保持，证明了当时的这个事件不是偶然！</p>
            <img style="float:right;height: 120px;margin-right: 40px;" src="./UI/shengmei/Oval.png">
        </div>
        <p style="font-weight: bolder;margin: 20px 0;font-size: 20px;">行业成绩</p>
        <img src="./UI/shengmei/performence.png" class="clearfix">
        <p style="margin: 20px 0;line-height: 2;font-size: 14px;">
            连续三年摘获中国广告长城奖金奖<br>
            连续五年位列中国广告创意50强<br>
            获得艾菲奖、4A金印奖、IAI中国广告创作实力50强等多项大奖
        </p>
    </div>

</div>

<?php include './widget/linksModel.php';?>
<div id="closeShell"></div>
<div id="tvDetail" class="clearfix"></div>
<?php include './widget/foot.php';?>