///* 窗口缩放绑定*/
(function(){
    var options = document.querySelectorAll('.frame-options li a');
    (function(){
        var division=2;
        var ww = document.body.clientWidth;
        if(ww>=1200)division=4;
        if(ww<1200)division=3;
        if(ww<960)division=2;
        if(ww<768)division=2;
        if(ww<=320)division=1;
        Array.prototype.some.call(options,function(it,id,ar){
            var newWidth = document.querySelector('.news-content').offsetWidth/division+'px';
            it.style.width=newWidth;
            it.parentNode.style.width=++(newWidth.split('px')[0])+'px';
        });
    })();
    var timeid;
    window.addEventListener('resize',function(){
        var division=2;
        var ww = document.body.clientWidth;
        if(ww>=1200)division=4;
        if(ww<1200)division=3;
        if(ww<960)division=2;
        if(ww<768)division=2;
        if(ww<=320)division=1;
        clearTimeout(timeid);
        timeid = setTimeout(function(){
            Array.prototype.some.call(options,function(it,id,ar){
                var newWidth = document.querySelector('.news-content').offsetWidth/division+'px';
                it.style.width=newWidth;
                it.parentNode.style.width=++(newWidth.split('px')[0])+'px';
            });
        },500);

    });
})();

/*事件绑定 - 每个分块的操作区*/
(function(){
    var options = document.querySelectorAll('.frame-options li a');
    Array.prototype.some.call(options,function(it,id,ar){

        it.addEventListener('mouseover',function(){
            it.className='frame-now-choice';
        });

        it.addEventListener('mouseout',function(){
            it.className=(it.getAttribute('data-choose')=='now'?'frame-now-choice':'')
        })
    });
})();

/*事件绑定 - 页面操作区*/
(function(){
    var options = document.querySelectorAll('.page-option-tag');
    Array.prototype.some.call(options,function(it,id,ar){
        it.addEventListener('mouseover',function(){
            it.parentNode.querySelector('.riTopTag').style.width='185px';//导航图标浮出长度
        });

        it.addEventListener('mouseout',function(){
            it.parentNode.querySelector('.riTopTag').style.width='0';
        })
    });
})();

/*事件绑定 - 区块左右控制*/
(function(){
    var left = document.querySelectorAll('.block .btn-option-left');
    var right = document.querySelectorAll('.block .btn-option-right');
    Array.prototype.some.call(right,function(it,id,ar){
        it.addEventListener('click',function(){
            var ul = it.parentNode.querySelector('.frame-options');
            $(ul.parentNode).animate({'scrollLeft':'+='+(ul.querySelector('li').offsetWidth+2)},500);
        });
    });

    Array.prototype.some.call(left,function(it,id,ar){
        it.addEventListener('click',function(){
            var ul = it.parentNode.querySelector('.frame-options');
            $(ul.parentNode).animate({'scrollLeft':'-='+(ul.querySelector('li').offsetWidth+2)},500);
        });
    });
})();




/*slider部分 -- 初始化与控制*/
(function(){


    var slider_news = $('#slider-news').myslider();
    var slider_about = $('#slider-about').myslider();
    var slider_case = $('#slider-case').myslider();

    $('#news').find('.frame-options').find('li').find('a').each(function(){
        var that =this;
        that.addEventListener('mouseover',function(){
            slider_news.turnTo(that.parentNode.getAttribute('data-tar'));
        })
    });

    $('#about').find('.frame-options').find('li').find('a').each(function(){
        var that =this;
        that.addEventListener('mouseover',function(){
            slider_about.turnTo(that.parentNode.getAttribute('data-tar'));
        })
    });

    $('#case').find('.frame-options').find('li').find('a').each(function(){
        var that =this;
        that.addEventListener('mouseover',function(){
            slider_case.turnTo(that.parentNode.getAttribute('data-tar'));
        })
    });

})();