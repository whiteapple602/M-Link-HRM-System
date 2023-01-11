<hr />

<?php echo form_open(site_url('admin/payroll_selector')); ?>
    
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('department'); ?></label>
                <select name="department_id" class="form-control" onchange="get_employees(this.value);" required>
                    <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                    <?php
                    $departments = $this->db->get('department')->result_array();
                    foreach($departments as $row): ?>
                        <option value="<?php echo $row['department_id']; ?>">
                            <?php echo $row['name'] . ' ' . get_phrase('department'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('employee'); ?></label>
                <select name="employee_id" class="form-control" id="employee_holder" required>
                    <option value=""><?php echo get_phrase('select_a_department_first'); ?></option>
                </select>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('month'); ?></label>
                <select name="month" class="form-control" required>
                    <option value=""><?php echo get_phrase('select_a_month'); ?></option>
                    <?php
                    for ($i = 1; $i <= 12; $i++):
                        if ($i == 1)
                            $m = get_phrase('january');
                        else if ($i == 2)
                            $m = get_phrase('february');
                        else if ($i == 3)
                            $m = get_phrase('march');
                        else if ($i == 4)
                            $m = get_phrase('april');
                        else if ($i == 5)
                            $m = get_phrase('may');
                        else if ($i == 6)
                            $m = get_phrase('june');
                        else if ($i == 7)
                            $m = get_phrase('july');
                        else if ($i == 8)
                            $m = get_phrase('august');
                        else if ($i == 9)
                            $m = get_phrase('september');
                        else if ($i == 10)
                            $m = get_phrase('october');
                        else if ($i == 11)
                            $m = get_phrase('november');
                        else if ($i == 12)
                            $m = get_phrase('december'); ?>
                        <option value="<?php echo $i; ?>">
                            <?php echo $m; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('year'); ?></label>
                <select name="year" class="form-control" required>
                    <option value=""><?php echo get_phrase('select_a_year'); ?></option>
                    <?php
                    for($i = 2016; $i <= 2026; $i++): ?>
                        <option value="<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="col-md-2" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info" style="width: 100%;">
                <?php echo get_phrase('submit'); ?></button>
        </div>

    </div>

<?php echo form_close(); ?>

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
    
    
    function get_employees(department_id)
    {
        if(department_id != '')
            $.ajax({
                url     : '<?php echo site_url('admin/get_employees/'); ?>' + department_id,
                success : function(response)
                {
                    jQuery('#employee_holder').html(response);
                }
            });
        else
            jQuery('#employee_holder').html('<option value=""><?php echo get_phrase("select_a_department_first"); ?></option>');
    }

</script>