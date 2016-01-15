<?php
// 页面静态化
$staticPath = "./cache/part-obsv-data.html";
if(file_exists($staticPath) &&  (filemtime($staticPath)+84000) > time()){
    echo file_get_contents($staticPath);
    exit;
}
ob_start();

function getfileList($filsDir){
    if(!$filsDir)return array();
    if(is_dir($filsDir)){
        $files = scandir($filsDir);
    }else{
        return array();
    }

    $fileArr = array();
    foreach ($files as $key => $file) {
        if($file!='.'&&$file!='..'&&is_file($filsDir.$file)){
            $fileArr[$file] = date('Y/m/d',filemtime($filsDir.$file));
        }
    }
    return $fileArr;
}

$obsrvData = getfileList('../data/obsrv/');
krsort($obsrvData);
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
        .detail div{height: 240px;float: left;line-height: 1.5;}
        .detail div img{width: 100%;height: 100%;border: 0}
        .datalist{width: 45%;float: left;font-size: 14px;line-height: 1.75}
        .datalist li{clear: both;width: 100%;cursor: pointer;transition:all .5s ease}
        .datalist li:hover{transition:none;color:#E69220;}
        .datalist li span:nth-child(1){overflow:hidden;width: 60%;white-space: nowrap;text-overflow: ellipsis;float: left}
        .datalist li span:nth-child(2){overflow:hidden;width: 40%;white-space: nowrap;text-overflow: ellipsis;float: right;text-align: right}
        .impress{width:50%;float: right}
    </style>
</head>
<body class="clearfix" style="min-height: 400px;">
<div class="detail" >
    <ul class="datalist">
        <?php foreach($obsrvData as $fileName=>$data){ ?>
            <li><span class="dataTitle" data-tar="./data/obsrv/<?php echo $fileName;?>"><?php echo explode('.',$fileName)[0];?></span><span><?php echo $data?></span></li>
        <?php } ?>
    </ul>
    <img class="impress" src="../UI/observ/image.png">
</div>
</body>

<script>
    (function(w){
        /* 初始化信息栏 */
        var tvDetail = window.parent.document.querySelector('#tvDetail');
        var closeShell = window.parent.document.querySelector('#closeShell');
        var parentWin = window.parent;
        if(!tvDetail)throw '找不到父框架指定容器#tvDetail';
        if(!closeShell)throw '找不到父框架指定容器#closeShell';
        if(!parentWin)throw '找不到父框架';

        Array.prototype.some.call(document.querySelectorAll('.dataTitle'),function(it){
           it.addEventListener('click',showDetail)
        });

        /*工具方法 - 展示子频道细节*/
        function showDetail() {
            console.log(1);
            var file = this.getAttribute('data-tar');
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
                    if (filetype == 'application/pdf') {
                        _iframe = document.createElement('iframe');
                        _iframe.id = 'tvDetail-fileDetail';//给包围框加ID
                    } else if (filetype == 'image/jpeg') {
                        wrap = document.createElement('div');
                        wrap.id = 'tvDetail-fileDetail';//给包围框加id
                        wrap.className = 'imgwrap';
                        _iframe = document.createElement('img');
                    } else {
                        throw 'filetype:' + filetype + '，没有加入逻辑，无法识别'
                    }
                    _iframe.id = 'tvDetail-fileDetail';
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

            /* 重置细节内容页 */
            tvDetail.innerHTML = '';
            tvDetail.style.display = 'block';
            /*----*/

        }
    })(window);
</script>

</html>

<?php
// 页面静态化
$pageContent = ob_get_contents();
file_put_contents($staticPath,ob_get_contents());
ob_end_flush();
?>