<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/vacancy_add'); ?>');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo get_phrase('add_new_vacancy'); ?>
</a> 
<br><br><br>

<table class="table table-bordered" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('position_name'); ?></div></th>
            <th><div><?php echo get_phrase('number_of_vacancies'); ?></div></th>
            <th><div><?php echo get_phrase('last_date_of_application'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('vacancy_id', 'desc');
        $vacancies = $this->db->get('vacancy')->result_array();
        foreach ($vacancies as $row):
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number_of_vacancies']; ?></td>
                <td><?php echo date('d/m/Y', $row['last_date']); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/vacancy_edit/'. $row['vacancy_id']); ?>');">
                                    <i class="entypo-pencil"></i>
                                <?php echo get_phrase('edit'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal_hard_reload('<?php echo site_url('admin/vacancy/delete/'. $row['vacancy_id']); ?>');">
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