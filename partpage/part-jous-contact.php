<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="../css/partpage.css" type="text/css" rel="stylesheet" >
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Gfzkol01hVtkuFUib7PM4jY0">
        //v2.0版本的引用方式：src="http://api.map.baidu.com/api?v=2.0&ak=您的密钥"
        //v1.4版本及以前版本的引用方式：src="http://api.map.baidu.com/api?v=1.4&key=您的密钥&callback=initialize"
    </script>
    <title>顺风传媒</title>
    <style>
        body,p{padding: 0;margin: 0}
        ul{padding: 0;margin: 0}
        li{list-style: none;float: left}
        a{text-decoration: none;color: inherit;display: block}
        .block{position: relative;}
        .clearfix{overflow:hidden;_zoom:1;}
        .detail div{float: left;line-height: 1.5;}
        .detail div img{width: 100%;height: 100%;border: 0}
        .detail .left{width: 50%;float: left}
        .detail .pice{width: 30%;float: left;margin-left: 18%;}
        .map{height:300px;width: 50%;margin:auto auto 50px 5px;border: 1px dashed grey}
    </style>
</head>
<body>
<div class="detail clearfix" >
    <div class="left">
        <p class="title">湖南顺风传媒有限公司</p>
        <p class="detail-text">传真: 0731-85362211<br>
            电话: 0731-85462211<br>
            微信：hnsfcm<br>
            邮箱: sunfunmedia@sina.com<br>
            网站：www.0731sf.com<br>
            地址: 湖南省长沙市天心区刘家冲北路129号喜民大厦4楼 </p>
    </div>
    <img class="pice" src="../UI/jous/qrcode.png">
</div>

<div id="map1" class="detail clearfix map" >

</div>

<div class="detail clearfix" >
    <div class="left">
        <p class="title">北京顺风影视有限公司</p>
        <p class="detail-text">传真: 010-65000096<br>
            电话: 010-65000096<br>
            微信：hnsfcm<br>
            邮箱: sunfunmedia@sina.com<br>
            网站：www.0731sf.com<br>
            地址: 北京市朝阳区农展馆南路13号瑞辰国际中心715 </p>
    </div>
    <img class="pice" src="../UI/jous/qrcode.png">
</div>

<div id="map2" class="detail clearfix map" >

</div>
<script>

    var shunfengicon = new BMap.Icon("../UI/jous/location.gif", new BMap.Size(33,50));

    var map1 = new BMap.Map("map1");          // 创建地图实例
    var map2 = new BMap.Map("map2");          // 创建地图实例

    var point1=new BMap.Point(112.997383,28.124185);
    var point2=new BMap.Point(116.472963,39.939832);

    var marker1  = new BMap.Marker(new BMap.Point(112.997383,28.124585),{icon:shunfengicon});
    var marker2  = new BMap.Marker(new BMap.Point(116.472963,39.939932),{icon:shunfengicon});

    marker1.setAnimation(BMAP_ANIMATION_BOUNCE);
    marker2.setAnimation(BMAP_ANIMATION_BOUNCE);

    map1.centerAndZoom(point1, 16);
    map2.centerAndZoom(point2, 18);

    map1.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map1.addControl(new BMap.NavigationControl());   //添加地图类型控件

    map2.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map2.addControl(new BMap.NavigationControl());


    map1.addOverlay(marker1);
    map2.addOverlay(marker2);
    //添加地图类型控件
    map1.setCurrentCity("长沙"); // 仅当设置城市信息时，MapTypeControl的切换功能才能可用
    map2.setCurrentCity("北京"); // 仅当设置城市信息时，MapTypeControl的切换功能才能可用
</script>
</body>
</html>