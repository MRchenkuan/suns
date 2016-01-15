<?php
// 页面静态化
$staticPath = "./cache/part-evt.html";
if(file_exists($staticPath) &&  (filemtime($staticPath)+30) > time()){
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
    <title>顺风传媒</title>
    <style>
        body,p{padding: 0;margin: 0}
        ul{padding: 0;margin: 0}
        li{list-style: none;float: left}
        a{text-decoration: none;color: inherit;display: block}
        .block{position: relative;}
        .clearfix{overflow:hidden;_zoom:1;}
        .detail div{height: 240px;float: left;line-height: 1.5;}
        .detail div img{width: 100%;height: 100%;border: 0}
    </style>
</head>
<body>
<img class="detail" src="../UI/intro/detail-env-1.png">
</body>
</html>
<?php
// 页面静态化
$pageContent = ob_get_contents();
file_put_contents($staticPath,ob_get_contents());
ob_end_flush();
?>