<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:73:"/var/www/html/public/../application/index/view/category/list_article.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/base.html";i:1521531649;s:67:"/var/www/html/public/../application/index/view/public/load_top.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/head.html";i:1521531649;s:60:"/var/www/html/public/../application/index/view/inc/left.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/foot.html";i:1521531649;s:70:"/var/www/html/public/../application/index/view/public/load_bottom.html";i:1521531649;}*/ ?>
<?php if($box_is_pjax != 1): ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php endif; ?>
        
<title><?php echo $arctype['typename']; ?> - <?php echo confv('title'); ?></title>
<meta name="keywords" content="<?php echo $arctype['keywords']; ?>">
<meta name="description" content="<?php echo $arctype['description']; ?>">

        <?php if($box_is_pjax != 1): ?>
<link rel="stylesheet" type="text/css" href="__static__/global/obm/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/global/obm/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/global/obm/css/animate.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/global/obm/css/prettyPhoto.css" />
<link rel="stylesheet" type="text/css" href="__static__/global/obm/css/main.css" />
<link rel="stylesheet" type="text/css" href="__static__/global/obm/css/responsive.css" />






<script type="text/javascript" src="__static__/global/obm/js/jquery.min.js"></script>

<?php endif; ?>
    </head>
    <body class="homepage">


        <?php if($box_is_pjax != 1): ?>
    <header id="header">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="__static__/global/obm/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo url('index/index'); ?>#ourService">我们的服务</a>
                        </li>
                        <li>
                            <a href="<?php echo url('index/index'); ?>#feature">我们的团队</a>
                        </li>
                        <li class="dropdown">  
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">教育培训 <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo url('portfolio/index'); ?>?show=tab1">生育家庭课堂</a></li>
                                <li><a href="<?php echo url('portfolio/index'); ?>?show=tab2">OBMCC</a></li>
                            </ul>
                        </li>
                        <li >
                            <a href="<?php echo url('contact/index'); ?>">联系我们</a>
                        </li>                     
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
<?php endif; ?>

        
<div class="container">
    <div class="row">
        <div class="col-sm-4" >
            <div class="user-info bg-white hidden-xs">
    <div class="avatar">
        <img src="<?php echo confv('logo'); ?>" />
    </div>
    <div class="infos bg-theme1">
        <div class="name"><?php echo confv('person'); ?></div>
        <div class="introduce">QQ群：<?php echo confv('address'); ?></div>
    </div>
</div>
<div class="notice bg-white hidden-xs">公告：更新会第一时间在群里通知</div>
<div class="search bg-theme1 hidden-xs">
    <div class="title">搜索</div>
    <div class="search-box bg-white clearfix">
        <form action="" method="get" >
            <div class="col-sm-8 col-xs-8" >
                <input type="text" class="texts" name="" placeholder="请输入搜索输入内容" />
            </div>
            <div class="col-sm-4 col-xs-4" >
                <button class="btn bg-theme1" type="submit">搜索</button>
            </div>
        </form>
    </div>
</div>

<div class="side-box bg-white hidden-xs">
    <div class="title bg-theme1">文档分类</div>
    <div class="category clearfix">
        <?php echo channel(1, '', '', '', '', 'col-sm-4 col-xs-6 ui-ellipsis'); ?>
    </div>
</div>

<div class="side-box bg-white hidden-xs">
    <div class="title bg-theme1">热门文档</div>
    <ul class="lists">
        <?php  $hotarc = arclist(1, 10, '', 'click desc');  if(is_array($hotarc) || $hotarc instanceof \think\Collection || $hotarc instanceof \think\Paginator): $i = 0; $__LIST__ = $hotarc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="clearfix">
            <a href="<?php echo $vo['arcurl']; ?>" class="col-sm-8 col-xs-8 ui-ellipsis"><?php echo $vo['title']; ?></a>
            <span class="col-sm-4 col-xs-4 ui-ellipsis"><?php echo date('Y-m-d',strtotime($vo['create_time'])); ?></span>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
        </div>
        
        <div class="col-sm-8" >
            <div class="side-box bg-white">
                <div class="title bg-theme1">文档分类</div>
                <div class="category clearfix">
                    <?php echo channel(1, $arctype['id'], '', '', '', 'col-sm-4 col-xs-6 ui-ellipsis'); ?>
                </div>
            </div>
            
            <?php if(is_array($dataList) || $dataList instanceof \think\Collection || $dataList instanceof \think\Paginator): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="side-box bg-white">
                <div class="article">
                    <h1><a href="<?php echo $vo['arcurl']; ?>" class="ui-ellipsis"><?php echo $vo['title']; ?></a></h1>
                    <div class="litpic">
                        <?php if(!(empty($vo['litpic']) || (($vo['litpic'] instanceof \think\Collection || $vo['litpic'] instanceof \think\Paginator ) && $vo['litpic']->isEmpty()))): ?>
                        <img src="<?php echo $vo['litpic']; ?>" />
                        <?php endif; if(!(empty($vo['description']) || (($vo['description'] instanceof \think\Collection || $vo['description'] instanceof \think\Paginator ) && $vo['description']->isEmpty()))): ?>
                        <p><?php echo $vo['description']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="tags clearfix">
                        <div class="tags-l col-sm-4">
                            <i class="fa fa-tags"> <?php echo $vo->Arctype->typename; ?></i>
                        </div>
                        <div class="tags-r col-sm-8">
                            <i class="fa fa-clock-o"> <?php echo date('Y-m-d',strtotime($vo['create_time'])); ?></i>
                            <i class="fa fa-eye"> <?php echo $vo['click']; ?></i>
                            <i class="fa fa-commenting-o"> 0</i>
                            <i class="fa fa-thumbs-o-up"> 0</i>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            
            <?php echo $dataList->render(); ?>
        </div>
    </div>
</div>

            <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="row">
                        <div class="center wow fadeInDown footer-center text-center animated" style="visibility: visible; animation-name: fadeInDown;">
                            <h2>联系我们</h2>
                            <br />
                            <p>当你在犹豫的时候，这个世界很小；当你做出行动的时候，这个世界就很大。</p>
                            <p>邮箱 | info@theobmcare.com</p>
                            <p>电话 | +86 0571 85265535</p>
    
                            <ul class="social-icons">
                                <li>
                                    <a data-toggle="modal" data-target=".wechat-1" href="#">
                                        官方微信号 | <img src="__static__/global/obm/images/wechat.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="modal" data-target=".wechat-2" href="#">
                                        微信公众号 | <img src="__static__/global/obm/images/wechat.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

        <?php if($box_is_pjax != 1): ?>
<script type="text/javascript" src="__static__/global/obm/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__static__/global/obm/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="__static__/global/obm/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="__static__/global/obm/js/main.js"></script>
<script type="text/javascript" src="__static__/global/obm/js/wow.min.js"></script>
<?php endif; if($box_is_pjax != 1): ?>
    </body>
</html>
<?php endif; ?>