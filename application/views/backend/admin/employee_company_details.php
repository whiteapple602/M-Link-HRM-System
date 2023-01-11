

<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_id'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="user_code" value="<?php echo substr(md5(rand(100000000, 20000000000)), 0, 7); ?>" readonly="" />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('department'); ?></label>

    <div class="col-sm-5">
        <select name="department_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('select_a_department'); ?></option>
            <?php
            $department = $this->db->get('department')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['department_id']; ?>">
                    <?php echo $row['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('designation'); ?></label>

    <div class="col-sm-5">
        <select name="designation_id" class="form-control" id="designation_holder">
            <option value=""><?php echo get_phrase('select_a_department_first'); ?></option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('date_of_joining'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="date_of_joining" value=""
            data-start-view="2" required data-format="dd-mm-yyyy" />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('joining_salary'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="joining_salary" value="" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>

    <div class="col-sm-5">
        <select name="status" class="form-control selectboxit">
            <option value="1"><?php echo get_phrase('active'); ?></option>
            <option value="2"><?php echo get_phrase('inactive'); ?></option>
        </select>
    </div>
</div>

<script type="text/javascript">

    function get_designation_val(department_id) {
        if(department_id != '')
            $.ajax({
                url: '<?php echo site_url('admin/get_designation/');?>' + department_id,
                success: function(response)
                {
                    console.log(response);
                    jQuery('#designation_holder').html(response);
                }
            });
        else
            jQuery('#designation_holder').html('<option value=""><?php echo get_phrase("select_a_department_first"); ?></option>');
    }

</script>
