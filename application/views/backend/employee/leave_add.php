<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_leave'); ?>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open(site_url('employee/leave/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('start_date'); ?></label>

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="start_date" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('end_date'); ?></label>

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="end_date" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('reason'); ?></label>

                    <div class="col-sm-8">
                        <textarea class="form-control" name="reason" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('submit'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
