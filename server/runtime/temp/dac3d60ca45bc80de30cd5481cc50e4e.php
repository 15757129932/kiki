<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:63:"/var/www/html/public/../application/index/view/index/index.html";i:1521981471;s:63:"/var/www/html/public/../application/index/view/public/base.html";i:1521531649;s:67:"/var/www/html/public/../application/index/view/public/load_top.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/head.html";i:1521531649;s:63:"/var/www/html/public/../application/index/view/public/foot.html";i:1521531649;s:70:"/var/www/html/public/../application/index/view/public/load_bottom.html";i:1521531649;}*/ ?>
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

        
<section id="main-slider" class="no-margin" data-ride="carousel" data-interval="3000">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(__static__/global/obm/images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">众人还在谈论生殖的技术，我们已致力于传播生育的艺术</h2>
                                    <!-- <a class="btn-slide animation animated-item-3" href="#">Read More</a> -->
                                </div>
                            </div>

                            <!-- <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" class="img-responsive">
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(__static__/global/obm/images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">生命早期的守护，岂止42天！</h2>
                                    <!-- <a class="btn-slide animation animated-item-3" href="#">Read More</a> -->
                                </div>
                            </div>

                            <!-- <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img2.png" class="img-responsive">
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(__static__/global/obm/images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">每一次服务都将给客人留下一个“完美”印象。</h2>
                                    <!-- <a class="btn-slide animation animated-item-3" href="#">Read More</a> -->
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <!-- <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a> -->
       <!--  <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a> -->
    </section><!--/#main-slider-->
    <section id="ourService">
        <div class="container" >
            <div class="center wow fadeInDown">
                <h2>我们的服务</h2>
                <p class="lead">OBM通过以协助而不替代父母为重心的服务 推动那些想要科学养育甚至追求完美的中国女性<br/>
                    用全天候一对一的咨询服务来解决她们的孕、产、育问题<br/>
                    从知识体系上全面的科学输出  从服务体系上尊重科学的同时着重人文关怀<br />
                    让家庭获得轻松而卓越的生活品质</p>
            </div>

            <div class="row">
                <?php if(is_array($dataList) || $dataList instanceof \think\Collection || $dataList instanceof \think\Paginator): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="col-xs-12 col-sm-4 col-md-3"><a href="<?php echo $vo['arcurl']; ?>">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php echo $vo['litpic']; ?>" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="<?php echo $vo['arcurl']; ?>"><?php echo $vo['title']; ?></a> </h3>
                                <a class="preview" href="<?php echo $vo['arcurl']; ?>"><i class="fa fa-eye"></i> View</a>
                            </div> 
                        </div>
                            </a>
                    </div>
                </div>   
                <?php endforeach; endif; else: echo "" ;endif; ?>
                
                 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#ourService-->
    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>我们的团队</h2>
                <p class="lead">欧贝尔曼核心服务产品结合了六大服务团队(私人管家、生育教育、临床营养、哺育支持、产后康复、家庭成长) <br />从孕期开始介入直至产后 42 天产褥期结束，最长服务周期可跟踪至宝宝36 个月。</p>
            </div>

            <div class="row">
                <div class="features">
                    
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <img src="__static__/global/obm/images/team/ICON-06.png"/> 
                            <h2>私人管家</h2>
                            <h3>服务，竭尽所能<br />关爱，随处可见</h3>
                        </div>
                    </div><!--/.col-md-4-->
                    
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <img src="__static__/global/obm/images/team/ICON-02.png"/> 
                            <h2>生育教育</h2>
                            <h3>分娩因了解而从容</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <img src="__static__/global/obm/images/team/ICON-01.png"/> 
                            <h2>临床营养</h2>
                            <h3>享受美食 零负担</h3>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <img src="__static__/global/obm/images/team/ICON-03.png"/> 
                            <h2>哺育支持</h2>
                            <h3>守护你身为人母的哺喂本能</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <img src="__static__/global/obm/images/team/ICON-04.png"/> 
                            <h2>产后康复</h2>
                            <h3>完美重塑<br />何止是形体，更是神形</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <img src="__static__/global/obm/images/team/ICON-05.png"/> 
                            <h2>家庭成长</h2>
                            <h3>育儿即驭己<br />“看见”生命，共同成长</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>合作伙伴</h2>
                <p class="lead">我们的合作伙伴遍布全球，且在母婴领域里成就卓越</p>
            </div>    

            <div class="partners">
                <ul>
                    <li> <a href="http://www.apollogen.com/" target="_blank"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="__static__/global/obm/images/partners/partner6.png"></a></li>
                    <li> <a href="http://www.alondra.es/" target="_blank"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="__static__/global/obm/images/partners/partner3.png"></a></li>
                    <li> <a href="https://www.ccefinland.org/" target="_blank"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="__static__/global/obm/images/partners/cce.png"></a></li>
                    <li> <a href="https://iblce.org/" target="_blank"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="__static__/global/obm/images/partners/partner4.png"></a></li>
                    <li> <a href="https://www.lamaze.org/" target="_blank"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="__static__/global/obm/images/partners/partner5.png"></a></li>
                    <li> <a href="http://www.micuna.com/es/"  target="_blank"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="__static__/global/obm/images/partners/micuna.jpg"></a></li>
                </ul>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->

    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <!-- <h2>Have a question or need a custom quote?</h2> -->
                            <p>欧贝尔曼®是一个专注高端孕婴健康体验式服务的品牌。我们致力于倡导及引领健康科学的孕产育生活方式；提供准妈妈从备孕至产后的全程健康服务以及0-3岁婴幼儿健康生活及早期家庭成长教育。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->


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