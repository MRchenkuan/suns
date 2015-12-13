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
        .datalist{width: 100%;float: left;font-size: 12px;line-height: 1.75}
        .datalist li{clear: both;width: 100%;cursor: pointer;transition:all .5s ease;}
        .datalist li:hover{color:#E69220;transition:none;}

        .datalist li span{overflow:hidden;white-space: nowrap;text-overflow: ellipsis;}
        .datalist li span:nth-child(1){width: 60%;float: left}
        .datalist li span:nth-child(2){width: 35%;padding-right: 5%;text-align: right;float: right;}
    </style>
</head>
<body class="clearfix" style="min-height: 400px;">
<div class="detail" >
    <ul class="datalist">
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
        <li><span class="dataTitle" data-tar="./UI/map/files/上海/东方卫视/2016年广告刊例价.pdf">2015年9月台网收视数据月度汇总</span><span>2015／01／31</span></li>
    </ul>
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
        }
    })(window);
</script>

</html>