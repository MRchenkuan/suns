<?php if(!$menuList) {echo '菜单数据没有定义';} ?>
<?php if(!$frameBanner){echo '菜单数据没有定义';} ?>
<?php if(!$menuInit) {echo '初始数据没有定义';} ?>

<div id="content" class="first-block block clearfix">
    <img class="banner" src="<?php echo $frameBanner?>" >
    <div id="frame" class="clearfix">
        <ul class="content-nav cannot_select">
            <?php $menuIndex=0;foreach($menuList as $menu=>$link){ ?>
                <li <?php if($menuIndex==0){echo "id='currentA'";$menuIndex++;} ?> data-url='./partpage/<?php echo $link; ?>'><?php echo $menu; ?></li>
            <? } ?>
        </ul>
        <div class="content-detail">
            <iframe id="content-frame" width="100%" onload="this.style.height = this.contentDocument.body.scrollHeight+10+'px';" src="./partpage/<?php echo $menuInit?>" ></iframe>
        </div>
        <script>
            $('#frame').find('.content-nav')[0].addEventListener('click',function(e){
                var ele= e.target;
                if(ele.tagName.toLowerCase()=='li'){
                    document.querySelector('#content-frame').src= e.target.getAttribute('data-url');
                    document.querySelector('#currentA').id=null;
                    ele.id='currentA';
                }
            })
        </script>
    </div>
</div>