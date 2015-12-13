<div id="nav">
    <img onclick="window.location='./index.php'" id="logo" src="./UI/logo.png"/>

    <ul class="nav-option <?php if($isOpen)echo 'open'; ?>">
        <li><a href="javascript:void(0)"><span class="iconfont icon-wechat"></span></a></li>
        <li><a href="javascript:void(0)"><span class="iconfont icon-weibo"></span></a></li>
        <li><a href="javascript:void(0)"><span class="iconfont icon-email"></span></a></li>
        <li onclick="var es = this.parentNode.classList;this.parentNode.className.indexOf('open')>0?es.remove('open'):es.add('open')"><a href="javascript:void(0)"><span class="iconfont icon-menu"></span></a></li>

        <li><a href="./joinus.php">加入顺风</a></li>
        <li><a href="javascript:void(0)">盛美顺风</a></li>
        <li><a href="./news.php">顺风新闻</a></li>
        <li><a href="./observation.php">顺风观察</a></li>
        <li><a href="./cases.php">顺风案例</a></li>
        <li><a href="./resource.php">顺风资源</a></li>
        <li><a href="./idea.php">顺风思想</a></li>
        <li><a href="./introduction.php">关于顺风</a></li>
        <li><a href="./index.php">首页</a></li>
        <li><a href="javascript:void(0)">MENU</a></li>
    </ul>
</div>


<div id="page-operator">
    <ul class="page-option">
        <li onclick="to('news')"><a href="javascript:void(0)">
                <div class="riTopTag">LATEAT NEWS 新闻</div>
                <span class="page-option-tag iconfont icon-news"></span></a></li>
        <li onclick="to('about')"><a href="javascript:void(0)">
                <div class="riTopTag">ABOUT US 关于</div>
                <span class="page-option-tag iconfont icon-about"></span></a></li>
        <li onclick="to('case')"><a href="javascript:void(0)">
                <div class="riTopTag">CASES 案例</div>
                <span class="page-option-tag iconfont icon-cases"></span></a></li>
        <li onclick="to('contact')"><a href="javascript:void(0)">
                <div class="riTopTag">CONTACT 联系我们</div>
                <span class="page-option-tag iconfont icon-contact"></span></a></li>
    </ul>
</div>