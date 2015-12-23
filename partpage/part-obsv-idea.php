<?php
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
    </style>
</head>
<body>
<div class="detail">
    <?php foreach($adCollection as $items){?>
    <div class="detail-3-col">
        <img src="../backstage/<?php echo $items['cover']?>">
        <p class="title"><?php echo $items['title']?></p>
        <p class="foot">
            <span><?php echo substr($items['pubdata'],0,10)?></span>
            <span>by: <?php echo $items['auth']?></span>
        </p>
    </div>
    <?php } ?>
</div>
</body>
</html>