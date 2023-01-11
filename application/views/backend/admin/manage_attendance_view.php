<hr />

<?php echo form_open(site_url('admin/attendance_selector')); ?>
    
    <div class="row">

        <div class="col-md-offset-1 col-md-4">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('employees_by_department'); ?></label>
                <select name="department_id" class="form-control" required>
                    <option value=""><?php echo get_phrase('select_employees_of_a_department'); ?></option>
                    <option value="all" <?php if($department_id == 'all') echo 'selected'; ?>>
                        <?php echo get_phrase('all_employees'); ?>
                    </option>
                    <?php
                    $departments = $this->db->get('department')->result_array();
                    foreach ($departments as $row2): ?>
                        <option value="<?php echo $row2['department_id']; ?>"
                            <?php if($row2['department_id'] == $department_id) echo 'selected'; ?>>
                                <?php echo $row2['name'] . ' ' . get_phrase('department'); ?>
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
                    value="<?php echo date("d-m-Y", $date); ?>" required />
            </div>
        </div>

        <div class="col-md-3" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info" style="width: 100%;">
                <?php echo get_phrase('manage_attendance'); ?></button>
        </div>

    </div>

<?php echo form_close(); ?>

<hr />
<div class="row" style="text-align: center;">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="tile-stats tile-gray">
            <div class="icon"><i class="entypo-chart-area"></i></div>

            <h3 style="color: #696969;">
                <?php
                if($department_id != 'all')
                    $department_name = $this->db->get_where('department',
                        array('department_id' => $department_id))->row()->name . ' ' . get_phrase('department');
                else
                    $department_name = get_phrase('all_employees');
                
                echo get_phrase('attendance_for') . ' ' . $department_name; ?>
            </h3>
            <h4 style="color: #696969;">
                <?php echo date("d M Y", $date); ?>
            </h4>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>

<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">

        <?php echo form_open(site_url('admin/attendance_update/') .$department_id . '/' . $date); ?>
            <div id="attendance_update">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo get_phrase('name'); ?></th>
                            <th><?php echo get_phrase('status'); ?></th>
                            <th style="width: 40%;"><?php echo get_phrase('reason_of_absence'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valid_employee_ids = array();
                        $count = 0;
                        
                        $attendance = $this->db->get_where('attendance',
                            array('date' => $date))->result_array();
                        
                        if($department_id == 'all') {
                            foreach($attendance as $row3)
                                array_push($valid_employee_ids, $row3['user_id']);
                        } else {
                            foreach($attendance as $row3) {
                                $department_id_attendance = $this->db->get_where('user',
                                    array('type' => 2, 'user_id' => $row3['user_id']))->row()->department_id;
                                
                                if($department_id_attendance == $department_id)
                                    array_push($valid_employee_ids, $row3['user_id']);
                            }
                        }
                        
                        foreach($attendance as $row)
                            if(in_array($row['user_id'], $valid_employee_ids)) { ?>
                                <tr>
                                    <td><?php echo ++$count; ?></td>
                                    <td>
                                        <?php echo $this->db->get_where('user', array('user_id' => $row['user_id']))->row()->name; ?>
                                    </td>
                                    <td>
                                        <select class="form-control selectboxit" name="status_<?php echo $row['attendance_id']; ?>"
                                            onchange="get_reason_holder(this.value, <?php echo $row['attendance_id']; ?>)">
                                            <option value="1" <?php if ($row['status'] == 1) echo 'selected'; ?>>
                                                <?php echo get_phrase('present'); ?></option>
                                            <option value="2" <?php if ($row['status'] == 2) echo 'selected'; ?>>
                                                <?php echo get_phrase('absent'); ?></option>
                                        </select>	
                                    </td>
                                    <td>
                                        <span style="display: none;" id="reason_holder_<?php echo $row['attendance_id']; ?>">
                                            <input type="text" name="reason_<?php echo $row['attendance_id']; ?>"
                                                class="form-control" value="<?php echo $row['reason']; ?>" />
                                        </span>
                                        <?php if($row['status'] == 2) { ?>
                                            <span style="display: block;" id="reason_holder_2_<?php echo $row['attendance_id']; ?>">
                                                <input type="text" name="reason_<?php echo $row['attendance_id']; ?>"
                                                    class="form-control" value="<?php echo $row['reason']; ?>" />
                                            </span>
                                        <?php } if($row['status'] == 1) {?>
                                            <span style="display: block;" id="reason_holder_2_<?php echo $row['attendance_id']; ?>"></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <input type="hidden" name="attendance_id_<?php echo $count; ?>" value="<?php echo $row['attendance_id']; ?>" />
                            <?php } ?>
                    </tbody>
                </table>
            </div>

            <input type="hidden" name="number_of_attendances" value="<?php echo $count; ?>" />
        
            <center>
                <button type="submit" class="btn btn-success" id="submit_button">
                    <i class="entypo-check"></i> <?php echo get_phrase('save_changes'); ?>
                </button>
            </center>
        <?php echo form_close(); ?>

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
    
    function get_reason_holder(status, attendance_id)
    {
        $('#reason_holder_2_' + attendance_id).attr('style', 'display: none;');

        if(status == 2)
            $('#reason_holder_' + attendance_id).attr('style', 'display: block;');
        if(status == 1)
            $('#reason_holder_' + attendance_id).attr('style', 'display: none;');
    }

</script>