<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/expense_add'); ?>');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo get_phrase('add_new_expense'); ?>
</a> 
<br><br><br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div>ID</div></th>
            <th><div><?php echo get_phrase('expense_title'); ?></div></th>
            <th><div><?php echo get_phrase('description'); ?></div></th>
            <th><div><?php echo get_phrase('amount'); ?></div></th>
            <th><div><?php echo get_phrase('date'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('expense_id', 'desc');
        $expense = $this->db->get('expense')->result_array();
        foreach ($expense as $row):
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['expense_code']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo substr($row['description'], 0, 50) . '...'; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo date('d/m/Y', $row['date']); ?></td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/expense_edit/'.$row['expense_id']); ?>');">
                                    <i class="entypo-pencil"></i>
                                <?php echo get_phrase('edit'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal_hard_reload('<?php echo site_url('admin/expense/delete/'.$row['expense_id']); ?>');">
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