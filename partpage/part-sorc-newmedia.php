<?php
function getPureFiles($path,$exlude){
    $_Files = array();
    $Files = scandir($path);
    foreach($Files as $k=>$v) {
        if ($v != '.' && $v != '..' && $v!=".DS_Store" &$v!=$exlude) {
            array_push($_Files, $v);
        }
    }
    return $_Files;
}

function getTvFileMap($tvName,$remark){
    $filsRoot = '../data/nmdi/';
    $itrDir = $filsRoot.$tvName."/2016资源简概/";
    $nowDir = $filsRoot.$tvName."/现推资源/";

    $itrFiles = $nowFiles = array();
    if(is_dir($itrDir)){
        $itrFiles = getPureFiles($itrDir,null);
    }

    if(is_dir($nowDir)){
        $nowFiles = getPureFiles($nowDir,null);
    }

    return array(
        "itr"=>$itrFiles,
        "now"=>$nowFiles,
        "rmk"=>$remark,
        "idx"=>$tvName
    );

}

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
        .clearfix{overflow:hidden;_zoom:1;}
        .detail-6-col{margin-top: 1%;transition:all .5s ease}
        .detail-6-col:hover{transform:scale(1.08);transition:all .5s ease}
        .bigbtn{margin: 1% auto 3% auto;transition:all .5s ease;width: 45%;height:80px;line-height: 80px;text-align: center;background: #3b76d1;color:#fff;float: left}
        .bigbtn:hover{font-size: 120%;}
        .bigbtn:nth-child(1){margin-right:9%;margin-left:1%}
    </style>
</head>
<body>
<p class="detail title" style="width: 98%;margin-left: 1%;margin-bottom: 2%" >五大视频网站优势资源</p>
<div class="detail clearfix" >
    <img class="detail-6-col" data-tar="youku" data-tarcol="#3b76d1" src="../UI/sorc/newmedia/1.png">
    <img class="detail-6-col" data-tar="aiqiyi" data-tarcol="#4ea20a" src="../UI/sorc/newmedia/2.png">
    <img class="detail-6-col" data-tar="mangotv" data-tarcol="#d04325" src="../UI/sorc/newmedia/3.png">
    <img class="detail-6-col" data-tar="leshi" data-tarcol="#ad1f1f" src="../UI/sorc/newmedia/4.png">
    <img class="detail-6-col" data-tar="souhu" data-tarcol="#ebb926" src="../UI/sorc/newmedia/5.png">
    <img class="detail-6-col" data-tar="tengxun" data-tarcol="#2d2d2d" src="../UI/sorc/newmedia/6.png">
</div>
<script>
    var imgs = document.querySelectorAll(".detail-6-col");
    Array.prototype.some.call(imgs,function(it){
        it.addEventListener('mouseover',function(){
            var bigbtn = document.querySelectorAll(".bigbtn");
            Array.prototype.some.call(bigbtn,function(it2){
               it2.style.backgroundColor = it.getAttribute("data-tarcol");
               it2.setAttribute("data-tar",it.getAttribute("data-tar"));
            });
        })
    })
</script>
<p class="detail title" style="margin-left: 1%;margin-top: 2%;width: 98%" >DSP程序化购买</p>
<div class="detail">
    <div class="bigbtn" data-tar="youku">资源简介</div>
    <div class="bigbtn" data-tar="youku">现推资源</div>
</div>
<div class="detail clearfix" style="margin-left: 1%;width: 98%;" >
    <div style="width: 35%;float: left;overflow: hidden">
        <img style="width: 98%" src="../UI/sorc/nm-pyhudon.png">
        <p class="title" style="padding: 1%;margin: 3% 0;color: #000">中国最大的程序化购买DSP平台</p>
        <p style="padding: 1%;line-height: 1.5;text-align: justify;">自搜索引擎的创新之后，程序化购买是最重要的数字营销技术，成为最受企业青睐的广告投放方式。快消，汽车，IT，金融，电商，游戏等行业里几乎所有领导品牌都已使用品友互动的程序化购买平台，来提升自身的品牌及运营效率。权威数据显示，品友互动已经占据中国品牌程序化购买市场59.8%的份额。</p>
    </div>
    <img style="width: 48%;float: right" src="../UI/sorc/nm-mix.png">
</div>
<script>
    (function(w){
        /* 初始化信息栏 */

        var dataMap = {
            "youku":<?php echo json_encode(getTvFileMap("优酷","优酷的rml"))?>,
            "tengxun":<?php echo json_encode(getTvFileMap("腾讯","fdsafdsa"))?>,
            "souhu":<?php echo json_encode(getTvFileMap("搜狐","fdsafdsa"))?>,
            "aiqiyi":<?php echo json_encode(getTvFileMap("爱奇艺","fdsafdsa"))?>,
            "mangotv":<?php echo json_encode(getTvFileMap("芒果TV","fdsafdsaf"))?>,
            "leshi":<?php echo json_encode(getTvFileMap("乐视","fdsafdsaf"))?>
        };
        console.log(dataMap);
        var tvDetail = window.parent.document.querySelector('#tvDetail');
        var closeShell = window.parent.document.querySelector('#closeShell');
        var parentWin = window.parent;
        if(!tvDetail)throw '找不到父框架指定容器#tvDetail';
        if(!closeShell)throw '找不到父框架指定容器#closeShell';
        if(!parentWin)throw '找不到父框架';

        // 绑定点击事件
        var bigbtn = document.querySelectorAll(".bigbtn");
        bigbtn[0].addEventListener("click",function(){
            console.log(this);
            var self = this;
            var selfObj = dataMap[self.getAttribute("data-tar")];
            showDetail.call(selfObj["itr"],selfObj["rmk"],selfObj["idx"],"2016资源简概");
        });
        bigbtn[1].addEventListener("click",function(){
            console.log(this);
            var self = this;
            var selfObj = dataMap[self.getAttribute("data-tar")];
            showDetail.call(selfObj["now"],selfObj["rmk"],selfObj["idx"],"现推资源");
        });




        /*工具方法 - 展示频道细节*/
        function showDetail() {

            var chanelRemark = arguments[0];
            var Pathindex = arguments[1];
            var PathindexLef = arguments[2];
            var links = this;
            /* 重置细节内容页 */
            tvDetail.innerHTML = '';
            tvDetail.style.display = 'block';
            var file = links[0];
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
            var iframeSrc = '../data/nmdi/'+Pathindex+"/"+PathindexLef+"/"+ file;
            $.ajax({
                type: 'GET',
                url: iframeSrc,
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
                        this.style.height = this.contentDocument.body.scrollHeight+10+'px';
                    });
                    _iframe.src = "./data/"+iframeSrc;
                    tvDetail.appendChild(_iframe);
                    //如果是图片则包装一层容器
                    if (filetype == 'image/jpeg') {
                        tvDetail.appendChild(wrap);
                        wrap.appendChild(_iframe);
                    }
                }
            });
            /*----*/

            /*初始化 侧边栏文件列表ullist 模块 */
            var ullist = document.createElement('ul');
            ullist.id = 'filelist';
            for(var i=0;i<links.length;i++){
                var _li = document.createElement('li');
                _li.setAttribute('data-tar',links[i]);
                _li.innerHTML = links[i];
                _li.setAttribute('title',links[i]);
                ullist.appendChild(_li);
                _li.addEventListener('click',function(){
                    var thisli = this;
                    var iframeSrc = "../data/nmdi/"+Pathindex+"/"+PathindexLef+"/"+thisli.getAttribute('data-tar');
                    $.ajax({
                        type:'GET',
                        url:iframeSrc,
                        success:function(data, status, xhr){
                            filetype = xhr.getResponseHeader('Content-Type');
                            if(filetype=='application/pdf'){
                                _iframe = document.createElement('iframe');
                                _iframe.id='tvDetail-fileDetail';//给包围框加ID
                            }else if(filetype=='image/jpeg'){
                                wrap = document.createElement('div');
                                wrap.id = 'tvDetail-fileDetail';//给包围框加id
                                wrap.className = 'imgwrap';
                                _iframe = document.createElement('img');
                            }else{
                                throw 'filetype:'+filetype+'，没有加入逻辑，无法识别'
                            }
                            _iframe.src = "./data/"+iframeSrc;
                            // 移除文件展示节点
                            var _temp = parentWin.document.getElementById('tvDetail-fileDetail');
                            _temp.parentNode.removeChild(_temp);
                            tvDetail.style.display='block';
                            // 然后重设文件展示节点
                            tvDetail.appendChild(_iframe);
                            if(filetype=='image/jpeg'){
                                tvDetail.appendChild(wrap);
                                wrap.appendChild(_iframe);
                            }
                        }
                    });
                });
            }
            /* ---- */

            /* 初始化 侧边栏head 模块*/
            var sideBarHead = document.createElement('div');
            sideBarHead.id='sideBarHead';
            /* ---- */

            /* 初始化 侧边栏foot 模块*/
            var sideBarFoot = document.createElement('div');
            sideBarFoot.id='sideBarFoot';
            /* ---- */

            /* 组成侧边栏 */
            var sidebar = document.createElement('div');
            sidebar.className = 'siderbar';
            sideBarHead.className=sideBarFoot.className='sideBarHtmlBox';//统一样式
            sidebar.appendChild(sideBarHead);//加入文件列表
            sidebar.appendChild(ullist);//加入文件列表
            sidebar.appendChild(sideBarFoot);//加入文件列表
            tvDetail.appendChild(sidebar);
            /*----*/

            /* 初始化 内容 of head模块*/
            (function(){
                var title = document.createElement('p');
                title.innerHTML = Pathindex+" - "+PathindexLef;
                sideBarHead.appendChild(title);
            })();
            /*----*/

            /* 初始化 内容 of foot模块*/
            (function(){
                var remark = document.createElement('p');
                remark.innerHTML = chanelRemark;
                sideBarFoot.appendChild(remark);
            })();
            /*----*/
        }
    })(window);
</script>
</body>
</html>