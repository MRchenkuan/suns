<?php

// 页面静态化
$staticPath = "./cache/part-obsv-idea.html";
if(file_exists($staticPath) &&  (filemtime($staticPath)+84000) > time()){
    echo file_get_contents($staticPath);
    exit;
}
ob_start();

    /*--连接数据库--*/
    require_once('../backstage/tools/Kodbc.class.php');
    $Kodbc = new Kodbc('../backstage//Database/IDEADATA.xml');
    $pageNow = $_GET['page'];
    $sliceParam = 'page';

    if(!$pageNow){$pageNow=1;}
    $pagesize = 20;
    $adCollection = $Kodbc->getAllItems(-$pagesize*$pageNow,$pagesize);
    $count = $Kodbc->count();//总共条目数
    $pageCount = ceil($count/$pagesize);//总页数

    /*排序*/
    usort($adCollection, function($a, $b) {
        $al = (int)$a['pubdata'];
        $bl = (int)$b['pubdata'];
        if ($al == $bl)
            return 0;
        return ($al > $bl) ? -1 : 1;
    });
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="../css/partpage.css" type="text/css" rel="stylesheet" >
    <script src="../js/jquery.js"></script>
    <title>顺风传媒 - 首页</title>
    <style>
        body,p{padding: 0;margin: 0}
        ul{padding: 0;margin: 0}
        li{list-style: none;float: left}
        a{text-decoration: none;color: inherit;display: block}
        .block{position: relative;}
        .clearfix{overflow:hidden;_zoom:1;}
        .detail-3-col{width:32.1%}
        .detail-3-col p{position: relative;border-top:1px solid grey;background: #fff}
        .detail-3-col .title{background: #fff;color:black;text-indent: 20px;text-align: left}
        .detail-3-col{border:1px solid grey}
        .detail-3-col .foot span{color:grey}
        .detail-3-col .foot span:nth-child(1){float:left;margin-left: 20px;}
        .detail-3-col .foot span:nth-child(2){float:right;margin-right: 20px;}
        .title{cursor: pointer}
    </style>
</head>
<body>
<div class="detail">
    <?php foreach($adCollection as $items){?>
    <div class="detail-3-col">
        <img class="cover" src="../backstage/<?php echo $items['cover']?>">
        <p class="title" data-tar="./backstage/newstxt-idea.php?id=<?php echo $items['id']?>"><?php echo $items['title']?></p>
        <p class="foot">
            <span><?php echo substr($items['pubdata'],0,10)?></span>
            <span>by: <?php echo $items['auth']?></span>
        </p>
    </div>
    <?php } ?>
    <script>
        var coverFrame = document.querySelector('.detail-3-col');
        var copBoxWidth = coverFrame.offsetWidth*.75;
        Array.prototype.some.call(document.querySelectorAll('.cover'),function(it){it.style.height = Math.floor(copBoxWidth*.75)+'px';});

        (function(){
            /* 初始化信息栏 */
            var tvDetail = window.parent.document.querySelector('#tvDetail');
            var closeShell = window.parent.document.querySelector('#closeShell');
            var parentWin = window.parent;
            if(!tvDetail)throw '找不到父框架指定容器#tvDetail';
            if(!closeShell)throw '找不到父框架指定容器#closeShell';
            if(!parentWin)throw '找不到父框架';

            Array.prototype.some.call(document.querySelectorAll('.title'),function(it){
                it.addEventListener('click',showDetail)
            });

            /*工具方法 - 展示子频道细节*/
            function showDetail() {
                /* 重置细节内容页 */
                tvDetail.innerHTML = '';
                tvDetail.style.display = 'block';
                console.log(1);
                var file = this.getAttribute('data-tar');
                if(!file)throw "title标签没有data-tar属性";
                var filetype;
                var _iframe, wrap;

                /*初始化遮罩*/
                parentWin.scrollToTop();
                $(closeShell).fadeIn();
                closeShell.addEventListener('click', function () {
                    $(closeShell).fadeOut();
                    $(tvDetail).fadeOut();
                });
                /* ---- */

                /* 初始化细节内容页 */
                $.ajax({
                    type: 'GET',
                    url: '../' + file,
                    success: function (data, status, xhr) {
                        filetype = xhr.getResponseHeader('Content-Type');
                        if (filetype == 'application/pdf'||filetype == 'text/html') {
                            _iframe = document.createElement('iframe');
                            _iframe.id = 'tvDetail-fileDetail';//给包围框加ID
                            //重新计算大小
                        } else if (filetype == 'image/jpeg') {
                            wrap = document.createElement('div');
                            wrap.id = 'tvDetail-fileDetail';//给包围框加id
                            wrap.className = 'imgwrap';
                            _iframe = document.createElement('img');
                            //重新计算大小
                        } else {
                            throw 'filetype:' + filetype + '，没有加入逻辑，无法识别'
                        }
                        _iframe.id = 'tvDetail-fileDetail';
                        _iframe.addEventListener('load',function(){
                            console.log(this.style.height);
                            console.log(this.contentDocument.body.offsetHeight);
                            this.style.height = this.contentDocument.body.scrollHeight+10+'px';
                        });
                        _iframe.src = file;
                        tvDetail.appendChild(_iframe);
                        //如果是图片则包装一层容器
                        if (filetype == 'image/jpeg') {
                            tvDetail.appendChild(wrap);
                            wrap.appendChild(_iframe);
                        }
                    }
                });
                /*----*/
            }
        })()
    </script>
</div>
</body>
</html>
<?php
// 页面静态化
$pageContent = ob_get_contents();
file_put_contents($staticPath,ob_get_contents());
ob_end_flush();
?>