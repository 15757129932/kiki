<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:84:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\rescue\index.html";i:1508857948;s:78:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\layout.html";i:1508258846;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\header.html";i:1508258847;s:89:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\sidebar.html";i:1508258846;s:85:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\top.html";i:1508852258;s:88:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\.\_layout\footer.html";i:1508258846;}*/ ?>
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
				
				<!-- Data Tables -->
<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=2.0&ak=tykm5FIkdiSmWLgfNKB5UIZi"></script>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>救助信息</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div  id="allmap" style="width:100%;height:700px;overflow:visible;"></div>
                            <!--                                    <div class="flot-chart">
                                                                    <div class="flot-chart-content" id="allmap"></div>
                                                                </div>-->
                        </div>
                        <div class="col-lg-6">
                            <!-- 表单内容 -->
                            <!-- 用户控件（操作） -->
                            <div class="form-group row" data-toggle="distpicker">
                                <label class="col-md-3 control-label"><?php echo lang('筛选报警区域：'); ?></label>
                                <div class="col-md-9">
                                    <div class="col-md-4 ">
                                        <select name="province"  class="form-control">
                                        </select>
                                    </div>
                                    <div class="col-sm-4  ">
                                        <select name="city"  class="form-control">
                                        </select>
                                    </div>
                                    <div class="col-sm-4  ">
                                        <select name="area"  class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="toolbar" class="toolbar" data-module="/admin/Rescue"><div class="btn-group"><button type="button" data-name="add" class="btn btn-primary" data-event-type="view" data-event-value=""  data-target="modal"><i class="fa fa-plus" aria-hidden="true" style="margin-right: 2px"> </i><?php echo \think\Lang::get('Add'); ?></button></div>

                            </div>
                            <!-- 表格数据 -->
                            <table id="table" data-toggle="gridview" class="table table-bordered text-nowrap table-striped" data-url="<?php echo url('admin/rescue/getList'); ?>" data-toolbar="#toolbar" data-show-columns="true" data-page-size="10" data-page-list="[10, 25, 50, All]" data-unique-id="id" data-pagination="true"  data-search="true" data-click-to-select="false">
                                <thead>
                                    <tr>
                                        <th data-width="80" data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">
                                            <?php echo lang('Operate'); ?></th>   
                                        <th data-width="100" data-field="status" data-formatter="statusFormatter">状态</th>
                                        <th data-width="100" data-field="create_time" >报警时间</th> 
                                        <th data-width="100" data-field="address">地址</th>
                                        <th data-width="100" data-field="alarm_person" >报警人</th>
                                        <th data-width="100" data-field="alarm_phone">报警电话</th>   

                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
<script type="text/javascript" src="__LIB__/distpicker/distpicker.data.js"></script>
<script type="text/javascript" src="__LIB__/distpicker/distpicker.js"></script>
<script type="text/javascript">

    $(function () {
        
        $('#table').on('load-success.bs.table', function (e, data) {
            freshMap(data['rows']);
        });
        
        $('#table').on('click-row.bs.table', function (e, row) {
            freshMap(row);
        });


//         ipLocation  = {'province':'北京市','city':'北京市'};
// 
//         $.ajax({
//　　url: "http://api.map.baidu.com/location/ip?ak=tykm5FIkdiSmWLgfNKB5UIZi&coor=bd09ll",
//　　type: "POST",
//　　dataType:'JSONP',
//    async : false,
//　　success:function(data){  
//             ipLocation['province'] = data['content']['address_detail']['province'];
//             ipLocation['city'] = data['content']['address_detail']['city'];
//            $('[data-toggle="distpicker"]').distpicker({
//            province: ipLocation['province'],
//            city: ipLocation['city'],
//            district: "",
//            placeholder: true
//        });
//            
//             },
//　　error:function(er){
//　　console.log(er);}
//});


//        $('[data-toggle="distpicker"]').distpicker({
//            province: ipLocation['province'],
//            city: ipLocation['city'],
//            district: "",
//            placeholder: true
//        });

        var distpicker = $('[data-toggle="distpicker"]');
        distpicker.on('change', 'select', function () {
            var params = {query: {'province': distpicker.find("select[name='province']").val(),
                    'city': distpicker.find("select[name='city']").val(),
                    'area': distpicker.find("select[name='area']").val()}};
            $('#table').bootstrapTable('refresh', params);
        });

    });




/**
 * 地图数据更新
 * @author doublecong
 * @param {type} data 数据源
 * @returns {undefined}
 */
    var freshMap = function (data) {

        $(function () {
            var point;
            // 百度地图API功能
            var map = new BMap.Map("allmap");
            point = new BMap.Point(120.15917, 30.289514);//杭州
            map.centerAndZoom(point, 15);
            map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
            map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

            var opts = {width: 250, // 信息窗口宽度
                height: 80, // 信息窗口高度
                title: "<strong>地址详细</strong>", // 信息窗口标题
                enableMessage: true//设置允许信息窗发送短息
            };


            if (data['longitude']) {
                var point = new BMap.Point(data['longitude'], data['latitude']);
                map.panTo(point);
                addMarker(point, data);

                return;
            }

            // 编写自定义函数,创建标注
            function addMarker(point, data) {
                var marker = new BMap.Marker(point);// 创建标注
                marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                map.addOverlay(marker);// 将标注添加到地图中
                addClickHandler("<strong>报警地址：</strong>" + data['address'], marker);
            }

            function addClickHandler(content, marker) {
                marker.addEventListener("click", function (e) {
                    openInfo(content, e)
                }
                );
            }

            function openInfo(content, e) {
                var p = e.target;
                var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
                var infoWindow = new BMap.InfoWindow(content, opts);  // 创建信息窗口对象 
                map.openInfoWindow(infoWindow, point); //开启信息窗口
            }

            for (var i = 0; i < data.length; i++) {
                var point = new BMap.Point(data[i]['longitude'], data[i]['latitude']);
                addMarker(point, data[i]);

            }

        });

    }




    function statusFormatter(value, row, index) {
        var style = '';
        var text = '';
        switch (row.status) {
            case 1: //等待受理(默认)
                this.style = 'text-danger';
                this.text = '等待受理'
                break;
            case 2 :  //已受理
                this.style = 'text-warning';
                this.text = '已受理'
                break;
            case 3: //等待救援
                this.style = 'text-info';
                this.text = '等待救援'
                break;
            case 4 : //完成救援
                this.style = 'text-success';
                this.text = '完成救援'
                break;
        }

        return "<span class='" + this.style + "'>" + this.text + "</span>";
    }

    function operateFormatter(value, row, index) {

        if (row.status === 1) {
            return [
                '<a class="btn btn-xs allocate" href="javascript:void(0)" data-toggle="tooltip" title="分配救助人员">',
                '分配',
                '</a>',
                '<a class="btn btn-xs detail" href="javascript:void(0)" data-toggle="tooltip" title="查看报警详情">',
                '详情',
                '</a>',
            ].join('');
        } else {
            return [
                '<a class="btn btn-xs detail" href="javascript:void(0)" data-toggle="tooltip" title="查看报警详情">',
                '详情',
                '</a>',
            ].join('');
        }
    }
    var operateEvents = {
        'click .allocate': function (e, value, row, index) {
            var param = {
                url: "<?php echo url('admin/rescue/policeSelect');; ?>",
                data: {
                    rescueId: row.id
                }
            }
            $("#table").gridView('loadModal', param.url, param.data);
        },
        'click .detail': function (e, value, row, index) {
            var param = {
                url: "<?php echo url('admin/rescue/detail');; ?>",
                data: {
                    id: row.id
                }
            }
            window.location.href = param.url + "/id/" + param.data.id;
        },
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