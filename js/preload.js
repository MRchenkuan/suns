///////* 界面预加载 */
$(document).ready(function(){
    /* 固定页面 */
    document.body.style.overflow='hidden';

    /* 获取所有的图片地址 */
    var _imgs = document.querySelectorAll('img');
    var imgs = [];
    Array.prototype.some.call(_imgs,function(it){
        if(it.getAttribute('data-ispre')!='false'){
            imgs.push(it);
        }
    });
    /* 获取所有有背景的元素 */
    var _bgis = document.querySelectorAll('div,span,a');
    var bgis=[];
    Array.prototype.some.call(_bgis,function(it){
        var urlstr = it.style.backgroundImage;
        if(urlstr&&urlstr!='initial'&&(it.getAttribute('data-ispre')!='false')){
            bgis.push(it);
        }
    });
    var fonts = [];
    var imgsArr = [];
    var progress = document.querySelector('#preProgress');

    Array.prototype.some.call(imgs,function(it){
        if(it.src){
            /*压入地址组*/
            imgsArr.push(it.src);
            /*图片掩盖真实地址*/
            it.setAttribute('data-preLoad',it.src);
            it.src = '#';
        }
    });
    console.log(imgsArr);


    Array.prototype.some.call(bgis,function(it,id){
        var urlstr=it.style.backgroundImage;
        /*压入地址组*/
        imgsArr.push(urlstr.slice(4,-1));
        /*背景掩盖真实地址*/
        it.setAttribute('data-bg-preLoad',urlstr.slice(4,-1));
        it.style.backgroundImage='url()';

    });

    Array.prototype.push.apply(imgsArr, fonts);

    /*开始预加载*/
    var count = 0;

    /*倒计时,时间结束则强制取消遮罩*/
    var timeid = setTimeout(function(){
        /* 完成遮罩 */
        completeMask();
    },10000);

    imgsArr.map(function(it,id){
        var _img = document.createElement('img');
        _img.src = it;
        $(_img).load(function(){
            count++;
            var per = Math.floor(100*count/imgsArr.length);
            progress.innerHTML = per+'%';
            progress.style.width = per+'%';

            if(count===imgsArr.length){
                /* 完成遮罩 */
                completeMask();
                clearTimeout(timeid);
            }
        });
    });

    /*工具方法 - 完成遮罩*/
    function completeMask(){
        document.body.style.overflow='auto';
        document.querySelector('#enterbtn').className='enterable';
        Array.prototype.some.call(imgs,function(it){
            if(it.src){
                /*最终替换回地址*/
                it.src = it.getAttribute('data-preLoad');
            }
        });
        Array.prototype.some.call(bgis,function(it){
            /*最终替换回地址*/
            it.style.backgroundImage = 'url(\''+it.getAttribute('data-bg-preLoad')+'\')'
        })
    }
});