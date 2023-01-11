<?php
    $info = $this->db->get_where('complaints', array(
        'complaints_id' => $param2
    ))->result_array();
    foreach ($info as $row) {
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('edit_complaint'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/employee/complaint_edit/') .$param2,
                    array('class' => 'form-horizontal form-groups', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>"
                            required />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('summary'); ?></label>
                    <div class="col-sm-8">
                        <textarea name="summary" rows="8" class="form-control"><?php echo $row['summary'];?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="timestamp"
                            value="<?php echo date('Y-m-d', $row['timestamp']);?>"
                            required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php } ?>
