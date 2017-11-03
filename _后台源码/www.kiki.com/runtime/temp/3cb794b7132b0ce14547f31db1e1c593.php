<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:83:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\index\index.html";i:1508258846;s:78:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\layout.html";i:1508258846;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\header.html";i:1508258847;s:89:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\sidebar.html";i:1508258846;s:85:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\top.html";i:1508852258;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\footer.html";i:1508258846;}*/ ?>
<!-- head -->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo \think\Config::get('website.name'); ?></title>
	<meta name="KeyWords" content="<?php echo \think\Config::get('website.keywords'); ?>">
	<meta name="Description" content="<?php echo \think\Config::get('website.description'); ?>">
	<link rel="stylesheet" type="text/css" href="__LIB__/bootstrap3/css/bootstrap.css" />
	<!-- <link rel="stylesheet" type="text/css" href="__LIB__/bootstrap3/css/bootstrap.min.css" /> -->

	<link rel="stylesheet" type="text/css" href="__CSS__/bootstrap-table.css" />
	<link rel="stylesheet" type="text/css" href="__LIB__/font-awesome-4.6/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/animate.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/style.css" />
	<script type="text/javascript" src="__LIB__/jquery-3.1.0.min.js"></script>



</head>
	
  
<body>
	<div id="wrapper">
		<!-- 左侧菜单 -->
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
    	<li class="nav-header"></li>
    <?php if(is_array($menus) || $menus instanceof \think\Collection): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(empty($vo['menu']) || ($vo['menu'] instanceof \think\Collection && $vo['menu']->isEmpty())): ?>
        <li>
            <a href="<?php echo url('admin/'.$key.'/index',isset($vo[2])?$vo[2]:null); ?>">
            	<i class="fa <?php echo $vo[0]; ?>"></i> 
            	<span class="nav-label"><?php echo lang($vo[1]); ?></span>
            </a>
        </li>
        <?php else: ?>
        <li>
            <a href="#">
            	<i class="fa <?php echo $vo[0]; ?>"></i>
            	<span class="nav-label"><?php echo lang($vo[1]); ?></span>
            	<span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level collapse">
            	<?php if(is_array($vo['menu']) || $vo['menu'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                	<li class=""><a href="<?php echo url('admin/'.$key.'/index'); ?>">
                		<i class="fa <?php echo $sub[0]; ?>"></i> 
                		<?php echo lang($sub[1]); ?>
                	</a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </li>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    
        <!-- 二级菜单 -->
        
    </ul>
</div>

    	</nav>
		
		<!-- 右侧 -->
		<div id="page-wrapper" class="gray-bg">
			<!-- 头部 -->
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        <form role="search" class="navbar-form-custom" action="#">
            <div class="form-group">
                <input type="text"  class="form-control" name="top-search" id="top-search">
            </div>
        </form>
    </div>
    <ul class="nav navbar-top-links navbar-right">
      <li><b><?php echo $user['username']; ?></b>
        	(<?php echo $user['mobile']; ?>)
        </li>
        <li>
            <a href="<?php echo url('Admin/Login/out');; ?>">
                <i class="fa fa-sign-out"></i> 退出
            </a>
        </li>
        
    </ul>
</nav>

			</div>
			<!-- 面包屑导航 下次更新做-- >
			<!-- <div class="row wrapper border-bottom white-bg page-heading">
				
			</div> -->
			<!-- 内容 -->
			<div>
				
				
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Total</span>
                    <h5>Star</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="github-star-count"></h1>
                    <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                    <a href="https://github.com/Astonep/tp-admin" target="_blank">
                        <small>Github</small>
                    </a>
                </div>


            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Annual</span>
                    <h5>Page view</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins" id="page-view">275,800</h1>
                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                    <small>Page view</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Today</span>
                    <h5>Unique Visitor</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">106,120</h1>
                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                    <small>New Visitor</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Today</span>
                    <h5>IP</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo isset($data['ip']) ? $data['ip'] :  ''; ?></h1>
                    <div class="stat-percent font-bold text-navy">38% <i class="fa fa-level-down"></i></div>
                    <small>In first month</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var data = {}
        $.ajax({
            url: 'https://api.github.com/repos/Astonep/tp-admin',
            type: 'get',
            data:  '',
            dataType:  'json',
            success:function(ajaxData){
                data.github = ajaxData.stargazers_count
                console.log(data.github)
                $("#github-star-count").text(data.github)
            }
        })

        if (localStorage.pagecount){
               localStorage.pagecount = Number(localStorage.pagecount)+1
           }
           else{
              localStorage.pagecount = 1
           }
           $("#page-view").text(localStorage.pagecount)
        
    })
</script>
			</div>
			
			<!-- 页脚 -->
			<div>
				<div class="footer">
    <div class="pull-right">
        Perfectly designed,Simplicity,Useful,Free.
    </div>
    <div>
        <strong>Copyright</strong> <a href="https://github.com/Astonep">Red-Team</a> &copy; 2016
    </div>
</div>
</div>

			</div>
		</div>
	</div>

	<!-- necessary ！！！-->
	<script type="text/javascript" src="__LIB__/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="__JS__/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script type="text/javascript" src="__JS__/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="__JS__/bootstrap-table.js"></script>
	<script type="text/javascript" src="__JS__/main.js"></script>
	<script type="text/javascript" src="__JS__/gridview.js"></script>
	<script type="text/javascript" src="__JS__/<?php echo \think\Lang::detect();?>.js"></script>

	<!-- custom and plugins -->
	<script type="text/javascript" src="__JS__/plugins/pace/pace.min.js"></script>
	
</body>
</html>