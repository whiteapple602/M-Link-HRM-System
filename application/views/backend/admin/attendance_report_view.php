<hr />

<?php echo form_open(site_url('admin/attendance_report_selector')); ?>
    
    <div class="row">

        <div class="col-md-4">
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
                    <?php echo get_phrase('year'); ?>
                </label>
                <select name="year" class="form-control selectboxit">
                    <?php
                    $year_list = array("2016","2017","2018","2019","2020","2021","2022","2023","2024","2025","2026");
                    //$year_list = [2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026];
                    foreach($year_list as $row) { ?>
                        <option value="<?php echo $row; ?>"
                            <?php if($row == $year) echo 'selected'; ?>>
                                <?php echo $row; ?>
                        </option>
                    <?php } ?>
                </select>
             </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;">
                    <?php echo get_phrase('month'); ?>
                </label>
                <select name="month" class="form-control selectboxit">
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
                        
                        <option value="<?php echo $i; ?>"
                            <?php if($i == $month) echo 'selected'; ?>>
                                <?php echo $m; ?>
                        </option>
                    <?php endfor; ?>
                </select>
             </div>
        </div>

        <div class="col-md-2" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info"><?php echo get_phrase('show_report'); ?></button>
        </div>

    </div>

<?php echo form_close(); ?>


<?php if($department_id != '' && $year != '' && $month != '') { ?>

    <br>
    
    <div class="row">
        <div class="col-md-4"></div>
        
        <div class="col-md-4" style="text-align: center;">
            <div class="tile-stats tile-gray">
                <div class="icon"><i class="entypo-docs"></i></div>
                <h3 style="color: #696969;"><?php echo get_phrase('attendance_sheet'); ?></h3>
                <h4 style="color: #696969;">
                    <?php
                    if($department_id != 'all') {
                        $department_name = $this->db->get_where('department',
                            array('department_id' => $department_id))->row()->name;
                        $heading = get_phrase('department') . ' : ' . $department_name;
                    } else
                        $heading = get_phrase('all_employees');
                    
                    if ($month == 1)
                        $m = 'January';
                    else if ($month == 2)
                        $m = 'February';
                    else if ($month == 3)
                        $m = 'March';
                    else if ($month == 4)
                        $m = 'April';
                    else if ($month == 5)
                        $m = 'May';
                    else if ($month == 6)
                        $m = 'June';
                    else if ($month == 7)
                        $m = 'July';
                    else if ($month == 8)
                        $m = 'August';
                    else if ($month == 9)
                        $m = 'Sepetember';
                    else if ($month == 10)
                        $m = 'October';
                    else if ($month == 11)
                        $m = 'November';
                    else if ($month == 12)
                        $m = 'December';
                    
                    echo $heading . '<br>' . $m . ' ' . $year; ?>
                </h4>
            </div>
        </div>
        
        <div class="col-md-4"></div>
    </div>


    <hr />

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="my_table">
                <thead>
                    <tr>
                        <td style="text-align: center;">
                            <?php echo get_phrase('employees'); ?><i class="entypo-down-thin"></i> |
                            <?php echo get_phrase('date'); ?> <i class="entypo-right-thin"></i>
                        </td>
                        <td style="text-align: center;">
                            <?php echo get_phrase('summary') . '<br>( ' . get_phrase('total_presence') . ' / ' . get_phrase('total_absence') . ' )'; ?>
                        </td>
                        <?php
                        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                        for($i = 1; $i <= $days; $i++) { ?>
                            <td style="text-align: center;"><?php echo $i; ?></td>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if($department_id == 'all')
                        $employees = $this->db->get_where('user', array('type' => 2))->result_array();
                    else
                        $employees = $this->db->get_where('user',
                            array('type' => 2, 'department_id' => $department_id))->result_array();
                    
                    foreach($employees as $row) { ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo $row['name']; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                $total_presence_this_month  = 0;
                                $total_absence_this_month   = 0;
                                $month_start_date           = strtotime('1-' . $month . '-' . $year);
                                $month_end_date             = strtotime($days . '-' . $month . '-' . $year);

                                $total_presence = $this->db->get_where('attendance', array('user_id' => $row['user_id'], 'status' => 1))->result_array();
                                foreach($total_presence as $row_total_presence)
                                    if($row_total_presence['date'] >= $month_start_date && $row_total_presence['date'] <= $month_end_date)
                                        $total_presence_this_month++;

                                $total_absence = $this->db->get_where('attendance', array('user_id' => $row['user_id'], 'status' => 2))->result_array();
                                foreach($total_absence as $row_total_absence)
                                    if($row_total_absence['date'] >= $month_start_date && $row_total_absence['date'] <= $month_end_date)
                                        $total_absence_this_month++;

                                echo $total_presence_this_month . ' / ' . $total_absence_this_month;
                                ?>
                            </td>
                            <?php
                            for ($i = 1; $i <= $days; $i++) {
                                $date = strtotime($i . '-' . $month . '-' . $year);
                                $query = $this->db->get_where('attendance', array('user_id' => $row['user_id'], 'date' => $date));
                                if($query->num_rows() > 0)
                                    $status = $this->db->get_where('attendance', array('user_id' => $row['user_id'], 'date' => $date))->row()->status;
                                else
                                    $status = ''; ?>
                                <td style="text-align: center;">
                                    <?php if ($status == 1) { ?>
                                        <i class="entypo-record" style="color: #00a651;"></i>
                                    <?php } else if ($status == 2) { ?>
                                        <i class="entypo-record" style="color: #ee4749;"></i>
                                    <?php } ?>
                                </td>

                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <center>
                <a href="<?php echo site_url('admin/attendance_report_print_view/'.$department_id.'/'.$year.'/'.$month); ?>" 
                    class="btn btn-primary" target="_blank">
                        <?php echo get_phrase('print_attendance_sheet'); ?>
                </a>
            </center>
        </div>
    </div>
<?php } ?>

<script type="text/javascript">

    // ajax form plugin calls at each modal loading,
    $(document).ready(function() {

        // SelectBoxIt Dropdown replacement
        if($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function(i, el)
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