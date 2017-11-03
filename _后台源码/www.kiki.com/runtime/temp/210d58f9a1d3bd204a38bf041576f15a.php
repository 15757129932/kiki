<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\Software_Files\website\www.city119.com\public/../app/admin\view\rescue\edit.html";i:1508258847;}*/ ?>

<form data-method="post" data-action="<?php echo url('admin/rescue/saveData'); ?>" data-submit="ajax" data-validate="true" class="form-horizontal">
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"><?php echo !empty($data['id'])?lang('Edit'):lang('Add'); ?><?php echo lang('Rescue'); ?></h3>
                </div>
                <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] :  ''; ?>">
                <div class="modal-body">
                    <div class="modal-body-content">
                        <div class="form-group must">
                            <label class="col-sm-3 control-label"><?php echo lang('Rescue Name'); ?></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" maxlength="8"  placeholder="<?php echo lang('Up_characters',['langth' =>8]); ?>" required value="<?php echo isset($data['name']) ? $data['name'] :  ''; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo lang('Status'); ?></label>
                            <div class="col-sm-7">
                                <select name="status" class="form-control" required>
                                    <option value="1" <?php echo !empty($data['status']) && $data['status']==1?'selected' : ''; ?>><?php echo lang('Start'); ?></option>
                                    <option value="0" <?php echo !empty($data['status']) && $data['status']==0?'selected' : ''; ?>><?php echo lang('Off'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo lang('Note'); ?></label>
                            <div class="col-sm-7"> 
                                <input type="text" class="form-control" name="remark" maxlength="10" placeholder="<?php echo lang('Up_characters',['langth' =>10]); ?>"  value="<?php echo isset($data['remark']) ? $data['remark'] :  ''; ?>"  >
                            </div>
                        </div>

                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('Cancel'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('Save'); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>