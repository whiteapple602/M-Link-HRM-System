<?php
$edit_data = $this->db->get_where('user',
    array('user_id' => $this->session->userdata('login_user_id')))->result_array();

foreach ($edit_data as $row) { ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <?php echo form_open(site_url('employee/change_password/change'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('current_password'); ?></label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('new_password'); ?></label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="new_password" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('confirm_new_password'); ?></label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="confirm_new_password" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-success"><?php echo get_phrase('change_password'); ?></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>