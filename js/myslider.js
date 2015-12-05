/*slider 部分 -- 主插件*/
(function($){

    $.fn.myslider = function(){
        var method={};
        var $this = $(this);

        /* 组建容器 */
        var frame = document.createElement('div');
        frame.className='myslider_framebox';
        $this.parent()[0].appendChild(frame);
        frame.appendChild($this[0]);
        $(frame).css({
            'width':'100%',
            'height':'100%',
            'overflow':'hidden'
        });

        /* 设置宽度 */
        var childs = $this.find('.pice');
        $this.css({
            'width':childs.length+'00%'
        });

        /*工具方法*/
        method.now='0';
        method.turnTo = function(i){
            if(i==method.now)return;
            method.now = i;
            console.log($this.parent('.myslider_framebox'));
            $this.parent('.myslider_framebox').stop().animate({
                'scrollLeft':childs[i].offsetLeft
            },500);
        };

        return method;
    }

})($);