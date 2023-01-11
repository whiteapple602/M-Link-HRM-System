<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/department_add/'); ?>');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo get_phrase('add_new_department'); ?>
</a> 
<br><br><br>

<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('department_name'); ?></div></th>
            <th><div><?php echo get_phrase('designation'); ?></div></th>
            <th><div><?php echo get_phrase('total_employees'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
</thead>
<tbody>
    <?php
    $count = 1;
    $this->db->order_by('department_id', 'desc');
    $department = $this->db->get('department')->result_array();
    foreach ($department as $row):
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                <?php
                $count2 = 1;
                 $designation = $this->db->get_where('designation', array('department_id' => $row['department_id']))->result_array();
                 foreach ($designation as $row1):
                     echo $count2++.'.';
                     echo $row1['name'];
                     echo '<br>';
                 endforeach;
                ?>
            </td>
            <td><?php echo $this->db->get_where('user', array('type' => 2, 'department_id' => $row['department_id']))->num_rows(); ?></td>
            <td>

                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                        <!-- teacher EDITING LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/department_edit/'.$row['department_code'] ); ?>');">
                                <i class="entypo-pencil"></i>
                            <?php echo get_phrase('edit'); ?>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <!-- teacher DELETION LINK -->
                        <li>
                            <a href="#" onclick="confirm_modal_hard_reload('<?php echo site_url('admin/department/delete/'.$row['department_code']); ?>');">
                                <i class="entypo-trash"></i>
                                <?php echo get_phrase('delete'); ?>
                            </a>
                        </li>
                    </ul>
                </div>

            </td>
        </tr>
<?php endforeach; ?>
</tbody>
</table>
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function ($)
    {


        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "xls",
                        "mColumns": [1, 2]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1, 2]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText": "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(0, false);
                            datatable.fnSetColumnVis(3, false);

                            this.fnPrint(true, oConfig);

                            window.print();

                            $(window).keyup(function (e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(0, true);
                                    datatable.fnSetColumnVis(3, true);
                                }
                            });
                        },
                    },
                ]
            },
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>