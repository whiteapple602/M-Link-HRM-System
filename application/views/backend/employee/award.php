<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div>ID</div></th>
            <th><div><?php echo get_phrase('award_name'); ?></div></th>
            <th><div><?php echo get_phrase('gift'); ?></div></th>
            <th><div><?php echo get_phrase('amount'); ?></div></th>
            <th><div><?php echo get_phrase('awarded_employee'); ?></div></th>
            <th><div><?php echo get_phrase('date'); ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('award_id', 'desc');
        $award = $this->db->get_where('award',
            array('user_id' => $this->session->userdata('login_user_id')))->result_array();
        foreach ($award as $row): ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['award_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['gift']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $this->db->get_where('user', array('user_id' => $row['user_id']))->row()->name; ?></td>
                <td><?php echo date('d/m/Y', $row['date']); ?></td>
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
                        "mColumns": [1, 2, 3, 4, 5, 6]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1, 2, 3, 4, 5, 6]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText": "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(7, false);

                            this.fnPrint(true, oConfig);

                            window.print();

                            $(window).keyup(function (e) {
                                if (e.which == 27) {
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