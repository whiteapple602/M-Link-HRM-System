<table class="table table-bordered">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div>ID</div></th>
            <th><div><?php echo get_phrase('employee'); ?></div></th>
            <th><div><?php echo get_phrase('start_date'); ?></div></th>
            <th><div><?php echo get_phrase('end_date'); ?></div></th>
            <th><div><?php echo get_phrase('reason'); ?></div></th>
            <th><div><?php echo get_phrase('status'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('leave_id', 'desc');
        $leave = $this->db->get('leave')->result_array();
        foreach($leave as $row): ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['leave_code']; ?></td>
                <td>
                    <?php
                    $user = $this->db->get_where('user', array('user_id' => $row['user_id']))->row();
                    echo $user->name; ?>
                </td>
                <td><?php echo date('d/m/Y', $row['start_date']); ?></td>
                <td><?php echo date('d/m/Y', $row['end_date']); ?></td>
                <td><?php echo substr($row['reason'], 0, 50) . '...'; ?></td>
                <td>
                    <?php
                    if($row['status'] == 0)
                        echo '<div class="label label-info">' . get_phrase('pending') . '</div>';
                    if($row['status'] == 1)
                        echo '<div class="label label-success">' . get_phrase('approved') . '</div>';
                    if($row['status'] == 2)
                        echo '<div class="label label-danger">' . get_phrase('declined') . '</div>';
                    ?>
                </td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <?php if($row['status'] == 0 || $row['status'] == 2) { ?>
                                <li>
                                    <a href="<?php echo site_url('admin/leave/approve/'.$row['leave_id']); ?>">
                                        <i class="entypo-check"></i>
                                        <?php echo get_phrase('approve'); ?>
                                    </a>
                                </li>
                            <?php } if($row['status'] == 0 || $row['status'] == 1) { ?>
                                <li>
                                    <a href="<?php echo site_url('admin/leave/decline/'.$row['leave_id']); ?>">
                                        <i class="entypo-cancel"></i>
                                        <?php echo get_phrase('decline'); ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal_hard_reload('<?php echo site_url('admin/leave/delete/'. $row['leave_id']); ?>');">
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