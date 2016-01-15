<?php
// 页面静态化
$staticPath = "./cache/part-evt.html";
if(file_exists($staticPath) &&  (filemtime($staticPath)+84000) > time()){
    echo file_get_contents($staticPath);
    exit;
}
ob_start();
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
        .eventCover:hover p{height:48px;transition: all .4s ease}
        .eventCover p{height:32px;transition: all .4s ease}
    </style>
</head>
<body>
<?php
# 设置路径
function getPureDirs($path){
    $_eventFiles = array();
    $eventFiles = scandir($path);
    foreach($eventFiles as $k=>$v) {
        if ($v != '.' && $v != '..' && is_dir($path.$v)) {
            array_push($_eventFiles, $v);
        }
    }
    return $_eventFiles;
}

function getPureFiles($path,$exlude){
    $_eventFiles = array();
    $eventFiles = scandir($path);
    foreach($eventFiles as $k=>$v) {
        if ($v != '.' && $v != '..' && $v!=".DS_Store" &$v!=$exlude) {
            array_push($_eventFiles, $v);
        }
    }
    return $_eventFiles;
}

$eventRoot = '../data/event/';
$eventFiles = getPureDirs($eventRoot);
# json
$eventFilesForJson = array();
# 初始化文件夹列表
foreach($eventFiles as $k=>$v) {
    if (is_dir($eventRoot.$v)) {
        scandir($eventRoot.$v);
        ?>
        <div class="eventCover detail-3-col" data-tar="<?php echo $v?>"><img src="../data/event/<?php echo $v?>/封面.jpg"><p><?php echo $v?></p></div>
        <?php
    }
    # 组成json
    $JPGS = getPureFiles($eventRoot.$v,"封面.jpg");
    $eventFilesForJson[$v] = $JPGS;
}
?>
<script>

    (function(){
        var eventData = eval(<?php echo json_encode($eventFilesForJson);?>);
        console.log(eventData);

        /* 初始化信息栏 */
        var tvDetail = window.parent.document.querySelector('#tvDetail');
        var closeShell = window.parent.document.querySelector('#closeShell');
        var parentWin = window.parent;
        if(!tvDetail)throw '找不到父框架指定容器#tvDetail';
        if(!closeShell)throw '找不到父框架指定容器#closeShell';
        if(!parentWin)throw '找不到父框架';

        Array.prototype.some.call(document.querySelectorAll('.eventCover'),function(it){
            it.addEventListener('click',showDetail)
        });

        /*工具方法 - 展示子频道细节*/
        function showDetail() {
            /* 重置细节内容页 */
            tvDetail.innerHTML = '';
            tvDetail.style.display = 'block';
            var eventName = this.getAttribute('data-tar');
            var file = eventData[eventName];
            /*初始化遮罩*/
            parentWin.scrollToTop();
            $(closeShell).fadeIn();
            closeShell.addEventListener('click', function () {
                $(closeShell).fadeOut();
                $(tvDetail).fadeOut();
            });
            /* ---- */

            var eventContent = document.createElement('div');
            for(var i=0;i<file.length;i++){
                var img = document.createElement('img');
                img.src ='./data/event/'+eventName+"/"+file[i];
                img.setAttribute('class','imgOfDetail');
                eventContent.appendChild(img);
            }
            tvDetail.appendChild(eventContent);
        }
    })()
</script>
</body>
</html>
<?php
// 页面静态化
$pageContent = ob_get_contents();
file_put_contents($staticPath,ob_get_contents());
ob_end_flush();
?>