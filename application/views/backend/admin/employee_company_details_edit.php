<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('department'); ?></label>

    <div class="col-sm-5">
        <select name="department_id" class="form-control" onchange="get_designation_val(this.value)">
            <option value=""><?php echo get_phrase('select_a_department'); ?></option>
            <?php if($row['department_id'] != null) 
            { 
                $department = $this->db->get('department')->result_array();
                foreach ($department as $row1):
                    ?>
                <option value="<?php echo $row1['department_id']; ?>" <?php if($row['department_id'] == $row1['department_id']) echo 'selected'; ?>>
                    <?php echo $row1['name']; ?>
                    </option>
                <?php endforeach; 
            }
            else
            { 
                $department = $this->db->get('department')->result_array();
                foreach ($department as $row1):
                    ?>
                <option value="<?php echo $row1['department_id']; ?>">
                    <?php echo $row1['name']; ?>
                    </option>
                <?php endforeach; 
            } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('designation'); ?></label>

    <div class="col-sm-5">
        <select name="designation_id" class="form-control" id="designation_holder">
            <?php
            $designation = $this->db->get_where('designation', array('department_id' => $row['department_id']))->result_array();
            foreach($designation as $row2) { ?>
                <option value="<?php echo $row2['designation_id']; ?>"
                    <?php if($row2['designation_id'] == $row['designation_id']) echo 'selected'; ?>>
                        <?php echo $row2['name']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('date_of_joining'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="date_of_joining"
            value="<?php if($row['date_of_joining'] != null) { echo date('d-m-Y',$row['date_of_joining']); } ?>" data-start-view="2" 
            data-format="dd-mm-yyyy" />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('joining_salary'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="joining_salary" value="<?php echo $row['joining_salary']; ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('date_of_leaving'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="date_of_leaving"
            value="<?php if($row['date_of_leaving'] != null) {  echo date('d-m-Y',$row['date_of_leaving']); }?>" data-start-view="2"
            data-format="dd-mm-yyyy" />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>

    <div class="col-sm-5">
        <select name="status" class="form-control selectboxit">
            <option value="1" <?php if($row['status'] == '1') echo 'selected' ?>><?php echo get_phrase('active'); ?></option>
            <option value="2"  <?php if($row['status'] == '2') echo 'selected' ?>><?php echo get_phrase('inactive'); ?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" class="btn btn-info"><?php echo get_phrase('save_changes'); ?></button>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

        // SelectBoxIt Dropdown replacement
        if ($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function (i, el)
            {
                var $this = $(el),
                        opts = {
                            showFirstOption: attrDefault($this, 'first-option', true),
                            'native': attrDefault($this, 'native', false),
                            defaultText: attrDefault($this, 'text', ''),
                        };

                $this.addClass('visible');
                $this.selectBoxIt(opts);
            });
        }

    });

</script>

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
