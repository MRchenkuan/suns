<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include './widget/keywords.php';?>
    <link href="./css/pclinet.css" type="text/css" rel="stylesheet" >
    <link href="./css/iconfont.css" type="text/css" rel="stylesheet">
    <link href="./css/framepage.css" type="text/css" rel="stylesheet">
    <link href="./css/common.css" type="text/css" rel="stylesheet">
    <script src="./js/jquery.js"></script>
    <title>顺风传媒 - 顺风案例</title>
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
    </style>
</head>
<body style="min-width: 768px">

<?php $isOpen=true; include './widget/pageControler.php';?>

<!-- 正文内容部分 -->

<div id="content" class="first-block block clearfix">
    <img class="banner" src="UI/cases/banner.png" >
    <div id="frame" class="clearfix">
        <ul class="content-nav cannot_select">
            <li id="currentA" data-url='./partpage/part-cases-important.html'>重点客户案例</li>
            <li data-url='./partpage/part-cases-coprator.html'>顺风合作客户</li>
        </ul>
        <div class="content-detail">
            <iframe id="content-frame" width="100%" onload="this.style.height='150px';this.style.height = this.contentDocument.body.scrollHeight+10+'px';" src="./partpage/part-cases-important.html" ></iframe>
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
<?php include './widget/foot.php';?>