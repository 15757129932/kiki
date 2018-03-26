<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:65:"/var/www/html/public/../application/index/view/contact/index.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/base.html";i:1521531649;s:67:"/var/www/html/public/../application/index/view/public/load_top.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/head.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/foot.html";i:1521531649;s:70:"/var/www/html/public/../application/index/view/public/load_bottom.html";i:1521531649;}*/ ?>
<?php if($box_is_pjax != 1): ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php endif; ?>
        
<title><?php echo confv('title'); ?></title>
<meta name="keywords" content="<?php echo confv('keywords'); ?>">
<meta name="description" content="<?php echo confv('description'); ?>">

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

        

    <section id="contact-info">

        <div class="gmap-area">
            <div class="container">
            </div>
        </div>
    </section>
    <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>联系我们</h2>
                <p class="lead">让女性更有尊严，更加品质的活在阳光和鲜花之中。</p>
                <p class="lead">当你在犹豫的时候，这个世界很小；当你做出行动的时候，这个世界就很大。</p>
            </div>
            <div class="row contact-wrap">
<!--                <div class="status alert alert-success" style="display: none"></div>-->
                <form action="<?php echo url('Guestbook/create'); ?>" method="post"  class="contact-form" name="contact-form"  >
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="required" placeholder="您的姓名">
                        </div>

                        <div class="form-group">
                            <input type="number" name="tel" class="form-control" placeholder="电话">
                        </div>

                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="邮箱">
                        </div>
                        <div class="form-group">
                            <input type="text" name="company" class="form-control" placeholder="公司名称">
                        </div>

                    </div>

                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="form-group">
                            <textarea id="message" name="content" required class="form-control" rows="8" placeholder="您的问题"></textarea>
                        </div>
                        <div class="form-group center">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" >提交</button>
                        </div>
                    </div>

                </form>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#contact-page-->


    <!-- Small modal -->

    <div class="modal fade bs-example-modal-sm ercode-modal wechat-1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <img src="__static__/global/obm/images/wechat_0.png" alt="">
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-sm ercode-modal wechat-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <img src="__static__/global/obm/images/wechat_1.png" alt="">
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