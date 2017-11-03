<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:85:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\rescue\detail.html";i:1508858411;s:78:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\layout.html";i:1508258846;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\header.html";i:1508258847;s:89:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\sidebar.html";i:1508258846;s:85:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\top.html";i:1508852258;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\footer.html";i:1508258846;}*/ ?>
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
				
				<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=2.0&ak=tykm5FIkdiSmWLgfNKB5UIZi"></script>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>救援信息</h5>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-8">
                            <div  id="allmap" style="width:100%;height:600px;overflow:visible;"></div>
                        </div>                     
                        
                        <div class="col-md-4">
                            <h2><i class="fa fa-yelp"></i> 救援详情: 
                                    <?php switch($data['status']): case "1": ?><span class="label label-danger">等待受理 </span><?php break; case "2": ?><span class="label label-warning">已受理</span><?php break; case "3": ?><span class="label label-info">等待救援</span><?php break; case "4": ?><span class="label label-success">完成救援</span><?php break; default: ?>--
                                    <?php endswitch; ?>
                               </h2>

                            <ul class="list-group clear-list m-t">
                                 <li class="list-group-item">
                                    <span class="pull-right"><?php echo $rescue_type[$data['type']]; ?></span>
                                    <i class="fa fa-tags"></i>   救援类型</li>
                                <li class="list-group-item">
                                    <span class="pull-right"><?php if($data['casualty'] == 1): ?>>有<?php else: ?>无<?php endif; ?></span>
                                    <i class="fa fa-briefcase"></i>   有无人员伤亡</li>
                                <li class="list-group-item">
                                    <span class="pull-right"><?php if(($data['comburant'] == 1)): ?>有<?php else: ?>无<?php endif; ?></span>
                                    <i class="fa fa-fire"></i>   有无助燃物</li>


                              <?php if(empty($data['police_force']) || ($data['police_force'] instanceof \think\Collection && $data['police_force']->isEmpty())): ?>
                                <li class="list-group-item">
                                    <span class="pull-right"></span>
                                    <i class="fa fa-fire-extinguisher"></i>   救援队</li>
                                <?php else: ?>
                                <li class="list-group-item">
                                    <span class="pull-right"><?php echo $data['police_force']['name']; ?></span>
                                    <i class="fa fa-fire-extinguisher"></i>   救援队</li>
                                <?php endif; ?>
                                <li class="list-group-item">
                                    <span class="pull-right">
                                        <?php echo $data['create_time']; ?>
                                    </span>
                                    <i class="fa fa-clock-o"></i>   时间</li>
                                <li class="list-group-item">
                                    <span class="pull-right">
                                        <?php echo $data['alarm_person']; ?>
                                    </span>
                                    <i class="fa fa-male"></i>   报警人</li>
                                <li class="list-group-item">
                                    <span class="pull-right">
                                        <?php echo $data['alarm_phone']; ?>
                                    </span>
                                    <i class="fa fa-phone"></i> 报警电话</li>
                                <li class="list-group-item">
                                    <span class="pull-right">( <?php echo $data['longitude']; ?>,<?php echo $data['latitude']; ?>)</span>
                                    <i class="fa fa-map-marker"></i>  纬经度</li>
                            </ul>

                        </div>
                        <div class="col-md-4">
                            <div class="well">
                                <h2><i class="fa fa-map-marker"></i> <span class="label-muted"> 地址：北京市北京市东城区东华门街道文三路科技广场</span></h2>
                            </div>
                            <?php if(($data['status'] == 1)): ?><button class="btn btn-success pull-right" id="allocateBtn">分配救援</button><?php else: endif; ?>
                                                                <button class="btn btn-default" id="backBtn">返回列表</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var status = parseInt("<?php echo $data['status']; ?>");
    var longitudeEnd = parseFloat("<?php echo $data['longitude']; ?>");
    var latitudeEnd = parseFloat("<?php echo $data['latitude']; ?>");
  
    if(status==1 ){
       // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(longitudeEnd, latitudeEnd);
    map.centerAndZoom(point, 15); 
    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

  
    var marker = new BMap.Marker(point);// 创建标注
                    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                    map.addOverlay(marker);// 将标注添加到地图中
                    addClickHandler("<strong>报警地址：</strong>"+"<?php echo $data['address']; ?>",marker);
    
    
    var opts = {       width : 250,     // 信息窗口宽度
				height: 80,     // 信息窗口高度
				title : "<strong>地址详细</strong>" , // 信息窗口标题
				enableMessage:true//设置允许信息窗发送短息
			   };
    
            function addClickHandler(content,marker){
		marker.addEventListener("click",function(e){
			openInfo(content,e)}
		);
	     }
             
             
             function openInfo(content,e){
		var p = e.target;
		var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
		var infoWindow = new BMap.InfoWindow(content,opts);  // 创建信息窗口对象 
		map.openInfoWindow(infoWindow,point); //开启信息窗口
	}

    }else{
    
    var longitudeFrom = "<?php if(empty($data['police_force'])){echo 0;}else{echo $data['police_force']['longitude']; } ?>";
    var latitudeFrom = "<?php if(empty($data['police_force'])){echo 0;}else{echo $data['police_force']['latitude']; } ?>";
    

    // 百度地图API功能
    var map = new BMap.Map("allmap");
    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    var point = new BMap.Point(longitudeFrom, latitudeFrom);
    map.centerAndZoom(point, 15);

    var from = new BMap.Point(longitudeFrom, latitudeFrom);
    var end = new BMap.Point(longitudeEnd, latitudeEnd);


    var driving = new BMap.DrivingRoute(map, {renderOptions: {map: map, autoViewport: true}});
    driving.search(from, end);

    }

/**
 * 分配救援
 * @type type
 */
    $('#allocateBtn').on('click', function () {
        var param = {
            url: "<?php echo url('admin/rescue/policeSelect');; ?>",
            data: {
                rescueId: "<?php echo $data['id']; ?>"
            }
        };

        $(this).commonLoadModal(param.url, param.data);
    });


$('#backBtn').on('click', function () {
    window.history.back()
    });



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