<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:82:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\user\index.html";i:1508258846;s:78:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\layout.html";i:1508258846;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\header.html";i:1508258847;s:89:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\sidebar.html";i:1508258846;s:85:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\top.html";i:1508258846;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\footer.html";i:1508258846;}*/ ?>
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
                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
            </div>
        </form>
    </div>
    <ul class="nav navbar-top-links navbar-right">
      <li><b><?php echo $user['username']; ?></b>
        	(<?php echo $user['mobile']; ?>)
        </li>
        <li>
            <a href="<?php echo url('Admin/Login/out');; ?>">
                <i class="fa fa-sign-out"></i> Log out
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
				
				<!-- Data Tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins" style="background: white;padding: 10px">
                <!-- 表单标题概要 -->
                <div class="ibox-title">
                    <h5><?php echo lang('Account List'); ?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <!-- 表单内容 -->
                <div class="ibox-content">
                    <!-- 用户控件（操作） -->
                    <div id="toolbar" class="toolbar" data-module="/admin/User"><div class="btn-group"></div>
                        
                    </div>
                    <!-- 表格数据 -->
                    <table id="table" data-toggle="gridview" class="table" data-url="<?php echo url('admin/user/getList'); ?>" data-toolbar="#toolbar" data-show-columns="true" data-page-size="10" data-page-list="[10, 25, 50, All]" data-unique-id="id" data-pagination="true" data-side-pagination="client" data-search="true" data-click-to-select="false">
                        <thead>
                            <tr>
                                <th data-width="10" data-align="center" data-checkbox="true"></th>
                                <th data-width="50" data-field="username" ><?php echo lang('Account'); ?></th>
                                <th data-width="80" data-field="mobile" data-align="center"><?php echo lang('Mobile'); ?></th>
                                <th data-width="50" data-field="status" ><?php echo lang('Status'); ?></th>
                                <th data-width="80" data-field="create_time" data-align="center"><?php echo lang('Create Time'); ?></th>
                                <th data-width="80" data-field="operate"   data-align="center" data-formatter="operateFormatter" data-events="operateEvents"><?php echo lang('Operate'); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function operateFormatter(value, row, index) {
        return [
            '<a class="btn btn-xs edit" href="javascript:void(0)" title="<?php echo \think\Lang::get('Edit'); ?>">',
            '<i class="fa fa-edit"></i>',
            '</a>  ',
            '<a class="btn btn-xs delete" href="javascript:void(0)" title="<?php echo \think\Lang::get('Delete'); ?>">',
            '<i class="fa fa-trash"></i>',
            '</a>'
        ].join('');
    }

    var operateEvents = {
        'click .edit': function (e, value, row, index) {
            var param = {
                url: "<?php echo url('admin/user/edit');; ?>",
                data: {id: row.id}
            }
            $("#table").gridView('loadModal', param.url,param.data)
        },
        'click .delete': function (e, value, row, index) {
            $("#table").gridView('deleteModal', 'delete', row)
            
        }
    };

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