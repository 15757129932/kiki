<?php if (!defined('THINK_PATH')) exit(); /*a:11:{s:106:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/archive/edit.html";i:1519436593;s:105:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/public/base.html";i:1520400732;s:113:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/public/admin_load_t.html";i:1519436593;s:110:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/public/admin_top.html";i:1519972965;s:111:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/public/admin_left.html";i:1519436593;s:106:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/archive/base.html";i:1519436593;s:107:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/archive/video.html";i:1519436593;s:107:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/archive/album.html";i:1519436593;s:110:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/archive/advanced.html";i:1519436593;s:113:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/public/admin_bottom.html";i:1520400972;s:113:"/home/doublecong/dev_dc/gitcode/kiki/Tp5-TuFanInc-Admin/public/../application/admin/view/public/admin_load_b.html";i:1519436593;}*/ ?>
<?php if($box_is_pjax != 1): ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<?php endif; ?>
<title><?php if($data): ?><?php echo \think\Lang::get('edit'); else: ?><?php echo \think\Lang::get('create'); endif; ?></title>

<?php if($box_is_pjax != 1): ?>
<link rel="stylesheet" type="text/css" href="__static__/global/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/global/bootstrap/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/system/iCheck/minimal/blue.css" />
<link rel="stylesheet" type="text/css" href="__static__/system/select2/select2.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/system/dist/css/AdminLTE.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/system/dist/css/skins/skin-blue.min.css" />

<script type="text/javascript" src="__static__/global/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="__static__/global/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__static__/system/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="__static__/system/dist/js/app.min.js"></script>
<script type="text/javascript" src="__static__/global/jQuery/jquery.pjax.js"></script>

<link rel="stylesheet" type="text/css" href="__static__/system/kindeditor/themes/default/default.css" />
<script type="text/javascript" src="__static__/system/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" src="__static__/system/kindeditor/lang/zh-CN.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="__static__/system/dist/js/html5shiv.min.js"></script>
<script type="text/javascript" src="__static__/system/dist/js/respond.min.js"></script>
<![endif]-->
<?php endif; if($box_is_pjax != 1): ?>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
<?php endif; if($box_is_pjax != 1): ?>
    <header class="main-header">
        <a href="#" class="logo"><span class="logo-mini">OBM</span><span class="logo-lg">OBMCARE</span></a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="/" target="_blank" ><?php echo \think\Lang::get('web_home'); ?></a>
                    </li>
                    <li class="dropdown messages-menu">
                        <a href="javascript:void(0);" class="delete-one" data-url="<?php echo url('Index/cleanCache'); ?>" data-id="-1" ><?php echo \think\Lang::get('clean_cache'); ?></a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo cookie('avatar'); ?>" class="user-image">
                            <span class="hidden-xs"><?php echo cookie('name'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?php echo cookie('avatar'); ?>" class="img-circle">
                                <p><?php echo cookie('name'); ?><small>Member since admin</small></p>
                            </li>
                            <li c  lass="user-footer">
                                <div class="pull-left"><a href="<?php echo url('User/edit', ['id' => cookie('uid')]); ?>" class="btn btn-default btn-flat">个人设置</a></div>
                                <div class="pull-right"><a href="<?php echo url('Login/loginOut'); ?>" class="btn btn-default btn-flat">退出</a></div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<?php endif; if($box_is_pjax != 1): ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image"><img src="<?php echo cookie('avatar'); ?>" class="img-circle" alt="<?php echo cookie('name'); ?>"></div>
                <div class="pull-left info">
                    <p><?php echo cookie('name'); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i>在线</a>
                </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="搜索">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <ul class="sidebar-menu">
                <li class="header">菜单</li>
                <?php if(is_array($treeMenu) || $treeMenu instanceof \think\Collection || $treeMenu instanceof \think\Paginator): $i = 0; $__LIST__ = $treeMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$oo): $mod = ($i % 2 );++$i;if($oo['level'] == '1' && $oo['name'] == 'Index/index'): ?>
                    <li><a href="<?php echo url(MODULE_NAME.'/'.$oo['name']); ?>"><i class="<?php echo $oo['icon']; ?>"></i><span><?php echo $oo['title']; ?></span></a></li>
                    <?php elseif($oo['level'] == '1'): ?>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="<?php echo $oo['icon']; ?>"></i><span><?php echo $oo['title']; ?></span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if(is_array($treeMenu) || $treeMenu instanceof \think\Collection || $treeMenu instanceof \think\Paginator): $i = 0; $__LIST__ = $treeMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;if($to['pid'] == $oo['id']): ?>
                            <li><a href="<?php echo url(MODULE_NAME.'/'.$to['name']); ?>"><i class="<?php echo $to['icon']; ?>"></i><?php echo $to['title']; ?></a></li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </section>
    </aside>
<?php endif; ?>
    
    
    <div class="content-wrapper" id="pjax-container">
        
<section class="content-header">
    <h1>文章信息</h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> 文章信息</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="" onsubmit="return false" >
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                <input type="hidden" name="mod" value="<?php echo $mods; ?>" />
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_base" data-toggle="tab"><?php echo \think\Lang::get('base_param'); ?></a></li>
                        
                        <?php if($mods == 'addonvideo'): ?>
                        <li><a href="#tab_video" data-toggle="tab"><?php echo \think\Lang::get('video_param'); ?></a></li>
                        <?php elseif($mods == 'addonalbum'): ?>
                        <li><a href="#tab_album" data-toggle="tab"><?php echo \think\Lang::get('album_param'); ?></a></li>
                        <?php else: endif; ?>
                        
                        <li><a href="#tab_advanced" data-toggle="tab"><?php echo \think\Lang::get('advanced_param'); ?></a></li>
                        <li class="pull-right"><a href="javascript:history.back(-1)" class="btn btn-sm" style="padding:10px 2px;"><i class="fa fa-list"></i> <?php echo \think\Lang::get('back'); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_base">
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('typeid'); ?></label>
        <div class="col-sm-7">
            <select class="form-control select2" name="typeid" style="width:100%;">
                <?php if(is_array($arctypeList) || $arctypeList instanceof \think\Collection || $arctypeList instanceof \think\Paginator): $i = 0; $__LIST__ = $arctypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $data['typeid']): ?>selected="selected"<?php endif; if(($vo['mid'] == 20 || $vo['mid'] == 22) || $vo['mid'] != $data['mid']): ?>disabled="disabled"<?php endif; ?> >
                    <?php if($vo['h_layer'] == 1): else: $__FOR_START_1569029184__=1;$__FOR_END_1569029184__=$vo['h_layer'];for($i=$__FOR_START_1569029184__;$i < $__FOR_END_1569029184__;$i+=1){ ?>　　<?php } ?>├
                    <?php endif; ?>
                    <?php echo $vo['typename']; ?>
                </option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('title'); ?></label>
        <div class="col-sm-7"><input class="form-control" name="title" value="<?php echo $data['title']; ?>" placeholder="<?php echo \think\Lang::get('title'); ?>"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('flag'); ?></label>
        <div class="col-sm-7">
            <label class="checkbox-inline"><input type="checkbox" name="flag[]" value="c" <?php if(in_array('c', $data['flag'])): ?>checked="checked"<?php endif; ?> class="minimal"> <?php echo \think\Lang::get('flag_c'); ?> [c]</label>
            <label class="checkbox-inline"><input type="checkbox" name="flag[]" value="a" <?php if(in_array('a', $data['flag'])): ?>checked="checked"<?php endif; ?> class="minimal"> <?php echo \think\Lang::get('flag_a'); ?> [a]</label>
            <label class="checkbox-inline"><input type="checkbox" name="flag[]" value="h" <?php if(in_array('h', $data['flag'])): ?>checked="checked"<?php endif; ?> class="minimal"> <?php echo \think\Lang::get('flag_h'); ?> [h]</label>
            <label class="checkbox-inline"><input type="checkbox" name="flag[]" value="s" <?php if(in_array('s', $data['flag'])): ?>checked="checked"<?php endif; ?> class="minimal"> <?php echo \think\Lang::get('flag_s'); ?> [s]</label>
            <label class="checkbox-inline"><input type="checkbox" name="flag[]" value="p" <?php if(in_array('p', $data['flag'])): ?>checked="checked"<?php endif; ?> class="minimal"> <?php echo \think\Lang::get('flag_p'); ?> [p]</label>
            <label class="checkbox-inline"><input type="checkbox" name="flag[]" value="j" <?php if(in_array('j', $data['flag'])): ?>checked="checked"<?php endif; ?> class="minimal" id="ck-jumplink"> <?php echo \think\Lang::get('flag_j'); ?> [j]</label>
        </div>
    </div>
    <div class="form-group <?php if(!in_array('j', $data['flag'])): ?>hide<?php endif; ?>" id="jumplink">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('jumplink'); ?></label>
        <div class="col-sm-7"><input class="form-control" name="jumplink" value="<?php echo $data['jumplink']; ?>" placeholder="<?php echo \think\Lang::get('jumplink'); ?>"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('litpic'); ?></label>
        <div class="col-sm-7">
            <div class="input-group">
                <input class="form-control" name="litpic" value="<?php echo $data['litpic']; ?>" placeholder="<?php echo \think\Lang::get('litpic'); ?>" >
                <span class="input-group-btn">
                    <a href="<?php echo (isset($data['litpic']) && ($data['litpic'] !== '')?$data['litpic']:'/static/global/face/no-image.png'); ?>" target="_blank" >
                        <img src="<?php echo (isset($data['litpic']) && ($data['litpic'] !== '')?$data['litpic']:'/static/global/face/no-image.png'); ?>" style="height:34px; width:68px;" />
                    </a>
                    <button class="btn btn-success btn-flat up-btn" type="button" data-url="<?php echo url('Uploads/upload'); ?>?dir=image">
                        <i class="fa fa-cloud-upload"> <?php echo \think\Lang::get('Upload'); ?></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('content'); ?></label>
        <div class="col-sm-7"><textarea class="form-control" name="content" placeholder="<?php echo \think\Lang::get('content'); ?>"><?php echo $data['addondata']['content']; ?></textarea></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('writer'); ?>/<?php echo \think\Lang::get('id'); ?></label>
        <div class="col-sm-7"><input class="form-control" name="writer" value="<?php echo $data['writer']; ?>" placeholder="<?php echo \think\Lang::get('writer'); ?>"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('source'); ?></label>
        <div class="col-sm-7"><input class="form-control" name="source" value="<?php echo $data['source']; ?>" placeholder="<?php echo \think\Lang::get('source'); ?>"></div>
    </div>
</div>
                        
                        <?php if($mods == 'addonvideo'): ?>
                        <div class="tab-pane" id="tab_video">
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('video_url'); ?></label>
        <div class="col-sm-7">
            <div class="input-group">
                <input class="form-control" name="video_url" value="<?php echo $data['addondata']['video_url']; ?>" placeholder="<?php echo \think\Lang::get('video_url'); ?>" >
                <span class="input-group-btn"><button class="btn btn-success btn-flat up-btn" type="button" data-url="<?php echo url('Uploads/upload'); ?>"><i class="fa fa-cloud-upload"> <?php echo \think\Lang::get('Upload'); ?></i></button></span>
            </div>
        </div>
    </div>
</div>
                        <?php elseif($mods == 'addonalbum'): ?>
                        <div class="tab-pane" id="tab_album">
    <div class="form-group">
        <label class="col-sm-2 control-label">相册模型</label>
        <div class="col-sm-7">
            <div class="input-group">
                <p>拓展模型可自行再添加其他数据字段</p>
            </div>
        </div>
    </div>
</div>
                        <?php else: endif; ?>
                        
                        <div class="tab-pane" id="tab_advanced">
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('keywords'); ?></label>
        <div class="col-sm-7"><input class="form-control" name="keywords" value="<?php echo $data['keywords']; ?>" placeholder="<?php echo \think\Lang::get('keywords'); ?>"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('description'); ?></label>
        <div class="col-sm-7"><textarea class="form-control" style="resize:none;height:155px;" name="description" placeholder="<?php echo \think\Lang::get('description'); ?>"><?php echo $data['description']; ?></textarea></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('click'); ?></label>
        <div class="col-sm-7"><input class="form-control" name="click" value="<?php echo (isset($data['click']) && ($data['click'] !== '')?$data['click']:'0'); ?>" placeholder="<?php echo \think\Lang::get('click'); ?>"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('status'); ?></label>
        <div class="col-sm-7">
            <select class="form-control select2" name="status" style="width:100%;">
                <option value="1" <?php if($data['status'] == '1'): ?>selected="selected"<?php endif; ?> ><?php echo \think\Lang::get('status1'); ?></option>
                <option value="0" <?php if($data['status'] == '0'): ?>selected="selected"<?php endif; ?> ><?php echo \think\Lang::get('status0'); ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo \think\Lang::get('create_time'); ?></label>
        <div class="col-sm-7">
            <div class="input-group">
                <input class="form-control timepicker" name="create_time" value="<?php echo $data['create_time']; ?>" placeholder="<?php echo \think\Lang::get('create_time'); ?>" >
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            </div>
        </div>
    </div>
</div>
                    </div>
                    <div class="box-footer">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-7">
                            <div class="btn-group pull-right">
                                <button type="submit" class="btn btn-info pull-right submits" data-loading-text="&lt;i class='fa fa-spinner fa-spin '&gt;&lt;/i&gt; <?php echo \think\Lang::get('submit'); ?>"><?php echo \think\Lang::get('submit'); ?></button>
                            </div>
                            <div class="btn-group pull-left">
                                <button type="reset" class="btn btn-warning"><?php echo \think\Lang::get('reset'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
var KDEDT_DELETE_URL = '<?php echo url("Uploads/delete"); ?>';   //【删除地址】如果有使用到KindEditor编辑器的文件空间删除功能，必须添加该删除地址全局变量

$(function(){
    /*ajax页面加载icheck，有该控件的页面才需要*/
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    
    /*ajax页面加载icheck，有该控件的页面才需要*/
    $(".select2").select2({language:"zh-CN"});
    
    $('.timepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',   //YYYY-MM-DD HH:mm:ss
        locale: moment.locale('zh-cn')
    });
    
    $("#ck-jumplink").on('ifChecked', function(event){
        $("#jumplink").removeClass("hide");
    });
    $('#ck-jumplink').on('ifUnchecked', function(event){
        $("#jumplink").addClass("hide");
    });
    
    KindEditor.create('textarea[name="content"]',{
        width : '100%',   //宽度
        height : '320px',   //高度
        resizeType : '0',   //禁止拖动
        allowFileManager : true,   //允许对上传图片进行管理
        uploadJson : '<?php echo url("Uploads/upload"); ?>',   //文件上传地址
        fileManagerJson : '<?php echo url("Uploads/manager"); ?>',   //文件管理地址
        //urlType : 'domain',   //带域名的路径
        formatUploadUrl: true,   //自动格式化上传后的URL
        autoHeightMode: false,   //开启自动高度模式
        afterBlur: function () { this.sync(); }   //同步编辑器数据
    });
    
    <?php if($rest_login == 1): ?>
    restlogin('<?php echo $rest_login_info; ?>');   //登录超时
    <?php endif; ?>
})
</script>

    </div>
    
        
<?php if($box_is_pjax != 1): ?>
    <footer class="main-footer">
        <div class="pull-right">Version 1.0</div>
        Copyright &copy; 2018-2028 <a href="http://www.theobmcare.com/" target="_blank">OBMCARE</a>
    </footer>
<?php endif; if($box_is_pjax != 1): ?>
</div>
<?php endif; if($box_is_pjax != 1): ?>
<script type="text/javascript" src="__static__/global/jQuery/jquery.form.js"></script>

<script type="text/javascript" src="__static__/system/editable/bootstrap-editable.js"></script>
<link rel="stylesheet" type="text/css" href="__static__/system/editable/bootstrap-editable.css" />

<script type="text/javascript" src="__static__/global/nprogress/nprogress.js"></script>
<link rel="stylesheet" type="text/css" href="__static__/global/nprogress/nprogress.css" />

<link rel="stylesheet" type="text/css" href="__static__/global/jQuery-gDialog/animate.min.css" />
<link rel="stylesheet" type="text/css" href="__static__/global/Amaranjs/amaran.min.css" />
<script type="text/javascript" src="__static__/global/Amaranjs/jquery.amaran.min.js"></script>
<link rel="stylesheet" type="text/css" href="__static__/global/bootstrap/js/bootstrap-dialog.min.css" />
<script type="text/javascript" src="__static__/global/bootstrap/js/bootstrap-dialog.min.js"></script>

<script type="text/javascript" src="__static__/system/datetimepicker/moment-with-locales.min.js"></script>
<link rel="stylesheet" type="text/css" href="__static__/system/datetimepicker/bootstrap-datetimepicker.min.css" />
<script type="text/javascript" src="__static__/system/datetimepicker/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="__static__/system/multiselect/multiselect.min.js"></script>

<script type="text/javascript" src="__static__/system/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="__static__/system/select2/select2.min.js"></script>
<script type="text/javascript" src="__static__/system/select2/i18n/zh-CN.js"></script>

<link rel="stylesheet" type="text/css" href="__static__/system/bootstrap-switch/bootstrap-switch.min.css" />
<script type="text/javascript" src="__static__/system/bootstrap-switch/bootstrap-switch.min.js"></script>

<link rel="stylesheet" type="text/css" href="__static__/global/cropper/cropper.min.css" />
<script type="text/javascript" src="__static__/global/cropper/cropper.min.js"></script>
<link rel="stylesheet" type="text/css" href="__static__/global/cropper/cropper.main.css" />
<script type="text/javascript" src="__static__/global/cropper/cropper.main.js"></script>

<script type="text/javascript" src="__static__/system/chart/Chart.min.js"></script>

<script type="text/javascript" src="__static__/system/dist/js/common.js"></script>
<?php endif; if($box_is_pjax != 1): ?>
</body>
</html>
<?php endif; ?>