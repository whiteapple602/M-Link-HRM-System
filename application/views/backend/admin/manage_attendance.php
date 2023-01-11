<hr />

<?php echo form_open(site_url('admin/attendance_selector')); ?>
    
    <div class="row">

        <div class="col-md-offset-1 col-md-4">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('employees_by_department'); ?></label>
                <select name="department_id" class="form-control" required>
                    <option value=""><?php echo get_phrase('select_employees_of_a_department'); ?></option>
                    <option value="all"><?php echo get_phrase('all_employees'); ?></option>
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
                <label class="control-label" style="margin-bottom: 5px;">
                    <?php echo get_phrase('date'); ?>
                </label>
                <input type="text" class="form-control datepicker" name="date" data-format="dd-mm-yyyy"
                    value="<?php echo date("d-m-Y"); ?>" required />
            </div>
        </div>

        <div class="col-md-3" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info" style="width: 100%;">
                <?php echo get_phrase('manage_attendance'); ?></button>
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

</script>