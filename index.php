<?php
//是否使用缓存
$userCache = false;

if($userCache){
    // 页面静态化
    $staticPath = "./cache/index.html";
    if(file_exists($staticPath) &&  (filemtime($staticPath)+84000) > time()){
        echo file_get_contents($staticPath);
        exit;
    }
    ob_start();
}


/*--连接数据库--*/
require_once('./backstage/tools/Kodbc.class.php');
$Kodbc = new Kodbc('./backstage//Database/ADVTSDATA.xml');
$pageNow = $_GET['page'];
$sliceParam = 'page';

if(!$pageNow){$pageNow=1;}
$pagesize = 5;
$adCollection = $Kodbc->getAllItems(-$pagesize*$pageNow,$pagesize);
$count = $Kodbc->count();//总共条目数
$pageCount = ceil($count/$pagesize);//总页数

/*排序*/
usort($adCollection, function($a, $b) {
    $al = (int)$a['order'];
    $bl = (int)$b['order'];
    if ($al == $bl)
        return 0;
    return ($al < $bl) ? -1 : 1;
});
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include './widget/keywords.php';?>
    <link href="./css/pclinet.css" type="text/css" rel="stylesheet" >
    <link href="./css/iconfont.css" type="text/css" rel="stylesheet">
    <link href="./css/adapter.css" type="text/css" rel="stylesheet">
    <link href="./css/common.css" type="text/css" rel="stylesheet">
    <script src="./js/jquery.js"></script>
    <script src="./js/myslider.js"></script>
    <!--<script src="./js/preload.js"></script>-->
    <title>顺风传媒 - 首页</title>
    <style>
        body,p{padding: 0;margin: 0}
        /*div,img,ul,li{border: 1px dashed grey}*/
        ul{padding: 0;margin: 0}
        li{list-style: none;float: left}
        a{text-decoration: none;color: inherit;display: block}
        .block{position: relative;}
        .clearfix{overflow:hidden;_zoom:1;}
        .cannot_select{
            -moz-user-select:none;/*火狐*/
            -webkit-user-select:none;/*webkit浏览器*/
            -ms-user-select:none;/*IE10*/
            user-select:none;
        }
        .pice{width: 100%;height: 70.5%;background: 50% 50% no-repeat; background-size: cover}
        #news .pice{margin-top: 60px;}
        .bgp{width: 100%;height: 100%}
    </style>
</head>
<body style="min-width: 768px">

<?php $isOpen=false; include './widget/pageControler.php';?>

<!--  新闻部分  -->
<div id="news" class="block">
    <div class="news-content">
        <div id="slider-news" class="singleFrame">
            <?php foreach($adCollection as $items){?>
<!--                <div class="pice"><img class="bgp" src='./backstage/--><?php //echo $items["imgsrc"]; ?><!--'></div>-->
                <div class="pice" style="background-image: url('./backstage/<?php echo $items["imgsrc"]; ?>');"></div>

            <?php } ?>
        </div>
        <div class="news-option">
            <ul class="frame-options" style="left: 0;">
            <?php $i=0; foreach($adCollection as $items){?>
                <li data-tar="<?php echo $i++?>"><a data-choose href="./news.php"><p><?php echo $items["title"];?></p><p><?php echo $items["remark"];?></p><p><?php echo substr($items['update'],0,10);?></p><p class="plusTag iconfont icon-plus"></p></a></li>
            <?php } ?>
            </ul>
         </div>
    </div>
    <div class="btn-option btn-option-left cannot_select">
        <span style="background-image:url('./UI/a-left.png')"></span>
    </div>
    <div class="btn-option btn-option-right cannot_select">
        <span style="background-image: url('./UI/a-right.png')"></span>
    </div>
</div>


<!--  关于 部分  -->
<div id="about" class="block">
    <div class="news-content">
        <div class="title">
            <a href="introduction.php">
                <div class="tag-left">关于顺风 　 ></div>
            </a>
            <span class="tag-right">ABOUT US</span>
        </div>
        <div id="slider-about" class="about-content singleFrame clearfix">
            <div class="pice clearfix" style="background:#151745">
                <img class="impress" src="./img/about/img1.png">
                <div class="intro">
                    <p>关于顺风   ABOUT US</p>
                    <div>
                        成立于2006年的顺风传媒，是一家专注于媒体投放策略研究的媒介代理公司，生于湖南，布局全国。目前，顺风传媒已实现准集团化经营，下设3个子公司，整合媒介代理、影视制作、营销咨询业务，年营业额突破7个亿。顺风传媒以电视媒体代理为主业，与江苏卫视、湖南卫视、浙江卫视、安徽卫视、北京卫视、天津卫视、东方卫视、辽宁卫视、深圳卫视、云南卫视等省级卫星平台有了非常深入的合作，与央视1套、央视2套、央视3套、央视4套、央视5套、央视10套都有不同程度的合作。除电视媒体外，顺风传媒还集结网络、电台、地铁等媒体，致力于打造广告投放的全媒体平台！
                    </div>
                    <a href="./introduction.php"> MORE >></a>

                </div>
            </div>
            <div class="pice clearfix" style="background:#123170">
                <img class="impress" src="./img/about/img2.png">
                <div class="intro">
                    <p>顺风足迹</p>
                    <div>
                        2006-2008：项目涉及湖南卫视、浙江卫视、安徽卫视、湖南经视、湖南娱乐频道、等媒体，服务娇兰佳人、以纯服饰、美肤宝……<br>
                        2006-2008: 项目涉及湖南卫视、浙江卫视、安徽卫视、湖南经视、湖南娱乐频道、等媒体，服务娇兰佳人、以纯服饰、美肤宝、珀莱雅、加加酱油、亚华乳业、贵人鸟服饰等。<br>
                        2009-2010: 加深与安徽卫视、湖南卫视、江苏卫视、浙江卫视等媒体的合作；出版专业媒介刊物《风讯》，夯实顺风媒介专家的地位。与多个全国知名品牌如酒鬼酒、珀莱雅、美肤宝等深度合作，服务品牌超过30多个。<br>
                    </div>
                    <a href="#"> MORE >></a>
                </div>
            </div>
            <div class="pice clearfix" style="background:#301d6e">
                <img class="impress" src="./img/about/img3.png">
                <div class="intro">
                    <p>集团化运营</p>
                    <div>
                        湖南顺风传媒
                        湖南顺风传媒有限公司隶属于湖南顺风集团。目前，公司已实现准集团化运营，下设3个子公司，分别为湖南顺势营销咨询有限公司、北京顺风影视文化传媒有限公司和湖南盛美顺风互动广告有限公司，业务涉及媒介代理、影视制作、营销咨询、广告策划等。
                    </div>
                    <a href="./introduction.php"> MORE >></a>
                </div>
            </div>

            <div class="pice clearfix" style="background:#1a3c39">
                <img class="impress" src="./img/about/img4.png">
                <div class="intro">
                    <p>顺风活动</p>
                    <div>
                        我们每年有两次公司团队活动，年中进行员工素质拓展培训，年底外出旅游，让员工之间互相了解，团结合作，我们是一个友好的大家庭。
                    </div>
                    <a href="./introduction.php"> MORE >></a>

                </div>
            </div>

            <div class="news-option" onclick="location = './introduction.php'">
                <ul class="frame-options" style="left: 0;">
                    <li data-tar="0"><a data-choose href="javascript:void(0)"><p>关于顺风   ABOUT US</p><p>成立于2006年的顺风传媒，是一家专注于媒体投放策略研究的媒介代理公司，生于湖南，布局全国。目前，顺风传媒已实现准集团化经营，下设3个子公司，整合媒介代理、影视制作、营销咨询业务，年营业额突破7个亿...</p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>
                    <li data-tar="1"><a data-choose href="javascript:void(0)"><p>顺风足迹</p><p>2006-2008：项目涉及湖南卫视、浙江卫视、安徽卫视、湖南经视、湖南娱乐频道、等媒体，服务娇兰佳人、以纯服饰、美肤宝……</p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>
                    <li data-tar="2"><a data-choose href="javascript:void(0)"><p>集团化运营</p><p>湖南顺风传媒有限公司隶属于湖南顺风集团。目前，公司已实现准集团化运营，下设3个子公司，分别为湖南顺势营销咨询有限公司、北京顺风影视文化传媒有限公司和湖南盛美顺风互动广告有限公司，业务涉及媒介代理、影视制作、营销咨询、广告策划等</p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>
                    <li data-tar="3"><a data-choose href="javascript:void(0)"><p>顺风活动</p><p>我们每年有两次公司团队活动，年中进行员工素质拓展培训，年底外出旅游，让员工之间互相了解，团结合作，我们是一个友好的大家庭。</p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="btn-option btn-option-left cannot_select">
        <span style="background-image:url('./UI/a-left.png')"></span>
    </div>
    <div class="btn-option btn-option-right cannot_select">
        <span style="background-image: url('./UI/a-right.png')"></span>
    </div>
</div>



<!--  案例部分  -->
<div id="case" class="block">
    <div class="news-content clearfix">
        <div class="title">
            <div class="tag-left">顺风案例 　 ></div>
            <span class="tag-right">CASES</span>
        </div>
        <div id="slider-case" class="case-content singleFrame clearfix">
            <div class="pice clearfix" style="background:#151745">
                <div style="width: 100%;height:100%;position: relative" onclick="location = './cases.php'">
                    <!--内容部分-->
                    <div class="cases" > <img src="./img/cases/1.png">   </div>
                    <div class="cases" > <img src="./img/cases/2.png">   </div>
                    <div class="cases" > <img src="./img/cases/4.png">   </div>
                    <div class="cases" > <img src="./img/cases/6.png">   </div>
                    <div class="cases" > <img src="./img/cases/5.png">   </div>
                    <div class="cases" > <img src="./img/cases/3.png">   </div>
                    <div class="cases" > <img src="./img/cases/7.png">   </div>
                    <div class="cases" > <img src="./img/cases/8.png">   </div>
                    <div class="cases" > <img src="./img/cases/9.png">   </div>
                    <div class="cases" > <img src="./img/cases/10.png">  </div>
                    <div class="cases" > <img src="./img/cases/11.png">  </div>
                    <div class="cases" > <img src="./img/cases/12.png">  </div>
                    <div class="cases" > <img src="./img/cases/13.png">  </div>
                    <div class="cases" > <img src="./img/cases/14.png">  </div>
                    <div class="cases" > <img src="./img/cases/15.png">  </div>
                </div>
            </div>
            <div class="pice clearfix" style="background-image: url('./img/cases/slider2.png')"></div>
            <div class="pice clearfix" style="background-image: url('./img/cases/slider3.png')"></div>
            <div class="pice clearfix" style="background-image: url('./img/cases/slider4.png')"></div>
<!--            <div class="pice clearfix"><img class="bgp" src="./img/cases/slider3.png"></div>-->
<!--            <div class="pice clearfix"><img class="bgp" src="./img/cases/slider4.png"></div>-->

            <div class="news-option" onclick="location = './cases.php'">
                <ul class="frame-options" style="left: 0;">
                    <li data-tar="0"><a data-choose href="javascript:void(0)"><p>重点客户案例</p><p>珀莱雅／美肤宝／滋源／韩后／欧派／南诺信／
                        容园美／伊贝诗／倍康／林之神／腾讯游戏／
                        京润珍珠／口口香／云猴／酒鬼酒……</p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>

                    <li data-tar="1"><a data-choose href="javascript:void(0)"><p>滋源</p><p>滋源全方位跨媒介打通传播渠道
                        从新生代到实力派
                    </p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>

                    <li data-tar="2"><a data-choose href="javascript:void(0)"><p>美肤宝</p><p>携手湖南卫视为美肤宝执行《变形计》冠名，
                      赋予美肤宝公益传播的独特识别形象，线下开展美肤宝阳光计划，形成了电视传播、线下活动、网络二轮传播的大型社会性公益传播事件。
                            </p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>

                    <li data-tar="3"><a data-choose href="javascript:void(0)"><p>容园美</p><p>冠名湖南卫视周播剧场《青春进行时》，
                                开创以“剧场+剧本”相结合的方式，将品牌和产品形象植入到湖南卫视周播剧场——青春进行时《爱你万缕千丝》剧情中，实现理念植入。
                            </p><p>2015.10.29</p><p class="plusTag iconfont icon-plus"></p></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="btn-option btn-option-left cannot_select">
        <span style="background-image:url('./UI/a-left.png')"></span>
    </div>
    <div class="btn-option btn-option-right cannot_select">
        <span style="background-image: url('./UI/a-right.png')"></span>
    </div>

</div>

<?php include './widget/linksModel.php';?>
<!-- 遮罩部分 -->
<!--<div id="preMask">-->
    <!--<p class="logo"> 顺风传媒 </p>-->
    <!--<ul class="link">-->
        <!--<li><img data-ispre="false" src="#"></li>-->
        <!--<li><img data-ispre="false" src="#"></li>-->
        <!--<li><img data-ispre="false" src="#"></li>-->
        <!--<li><img data-ispre="false" src="#"></li>-->
    <!--</ul>-->
    <!--<p class="entrance">-->
        <!--<span id="enterbtn" class="disable" onclick="if(this.className=='enterable')document.querySelector('#preMask').style.display='none';">进入官网</span>-->
        <!--<span style="display:block;margin: auto;width: 150px;">-->
            <!--<span id="preProgress"></span>-->
        <!--</span>-->
    <!--</p>-->
<!--</div>-->
<?php include './widget/foot.php';?>

<?php
if($userCache){
    // 页面静态化
    $pageContent = ob_get_contents();
    file_put_contents($staticPath,ob_get_contents());
    ob_end_flush();
}

?>