<?php  $job_data = $this->db->get_where('job_history', array('job_history_id' => $param2))->row(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('edit_job_history'); ?>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open(site_url('employee/employee_job_history/do_update/'.$param2), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                
				<div class="form-group">
				    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('compnay_name'); ?></label>

				    <div class="col-sm-5">
				        <input type="text" class="form-control" name="compnay_name" value="<?php echo $job_data->company_name; ?>" required>
				    </div>
				</div>

				<div class="form-group">
				    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('department'); ?></label>

				    <div class="col-sm-5">
				        <input type="text" class="form-control" name="department" value="<?php echo $job_data->department; ?>" required>
				    </div>
				</div>

				<div class="form-group">
				    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('designation'); ?></label>

				    <div class="col-sm-5">
				        <input type="text" class="form-control" name="designation" value="<?php echo $job_data->designation; ?>" required>
				    </div>
				</div>
				<div class="form-group">
				    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('start_date'); ?></label>
	
				    <div class="col-sm-5">
				        <input type="date" class="form-control datepicker" name="start_date" value="<?php echo date("Y-m-d", $job_data->timestamp_from); ?>" />
				        <!-- <input type="date" class="form-control datepicker" name="start_date" value="2018-07-22" /> -->
				    </div>
				</div>
				
				<div class="form-group">
				    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('end_date'); ?></label>

				    <div class="col-sm-5">
				        <input type="date" class="form-control datepicker" name="end_date" value="<?php echo date("Y-m-d", $job_data->timestamp_to); ?>"
				            data-start-view="2" required data-format="dd-mm-yyyy" />
				    </div>
				</div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save_changes'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
