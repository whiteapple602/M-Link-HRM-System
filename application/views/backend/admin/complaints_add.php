<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_complaint'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/employee/complaint_add/') .$param2,
                    array('class' => 'form-horizontal form-groups', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" value="" required autofocus />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('summary'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="summary" rows="8" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="timestamp" value="" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('add_complaint'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
