<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\rescue\policeselect.html";i:1508652701;}*/ ?>

<form data-method="post" data-action="<?php echo url('admin/rescue/allocatePolice'); ?>" data-submit="ajax" success = "refresh" data-validate="true" class="form-horizontal">
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">分配救援队</h3>
                </div>
                <input type="hidden" name="rescueId" value="<?php echo isset($rescueId) ? $rescueId :  ''; ?>">
                
                <div class="modal-body">
                    <div class="modal-body-content">
              
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">救援队列表</label>
                            <div class="col-sm-7">
                                <select name="policeForceInfo" class="form-control" required>
                                    <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $item['id']; ?>_<?php echo $item['longitude']; ?>_<?php echo $item['latitude']; ?>"><?php echo $item['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>    
                                            
                                </select>
                            </div>
                        </div>



                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('Cancel'); ?></button>
                    <button type="submit" class="btn btn-primary" ><?php echo lang('Save'); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>

  
