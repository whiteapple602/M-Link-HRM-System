<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/application_add'); ?>');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo get_phrase('add_new_application'); ?>
</a> 
<br><br><br>

<div class="row">

    <div class="col-md-2">

        <a style="text-align: left;" href="<?php echo site_url('admin/application/applied');?>" 
            class="<?php if ($status == 'applied') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('applied');?>
        </a>

        <a style="text-align: left;" href="<?php echo site_url('admin/application/on_review');?>" 
            class="<?php if ($status == 'on_review') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('on_review');?>
        </a>

        <a style="text-align: left;" href="<?php echo site_url('admin/application/interview');?>" 
            class="<?php if ($status == 'interview') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('interview');?>
        </a>

        <a style="text-align: left;" href="<?php echo site_url('admin/application/offered');?>" 
            class="<?php if ($status == 'offered') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('offered');?>
        </a>

        <a style="text-align: left;" href="<?php echo site_url('admin/application/hired');?>" 
            class="<?php if ($status == 'hired') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('hired');?>
        </a>

        <a style="text-align: left;" href="<?php echo site_url('admin/application/declined');?>" 
            class="<?php if ($status == 'declined') 
                    echo 'btn btn-primary';
                else 
                    echo 'btn btn-default';?> btn-block icon-left">
            <?php echo get_phrase('declined');?>
        </a>

    </div>

    <div class="col-md-10">

        <table class="table table-bordered" id="table_export">
            <thead>
                <tr>
                    <th><div>#</div></th>
                    <th><div><?php echo get_phrase('applicant_name'); ?></div></th>
                    <th><div><?php echo get_phrase('position'); ?></div></th>
                    <th><div><?php echo get_phrase('application_date'); ?></div></th>
                    <th><div><?php echo get_phrase('status'); ?></div></th>
                    <th><div><?php echo get_phrase('options'); ?></div></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $this->db->order_by('application_id', 'desc');
                $applications= $this->db->get_where('application', array('status' => $status))->result_array();
                foreach ($applications as $row):
                    ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $row['applicant_name']; ?></td>
                        <td><?php echo $this->db->get_where('vacancy', array('vacancy_id' => $row['vacancy_id']))->row()->name; ?></td>
                        <td><?php echo date('d/m/Y', $row['apply_date']); ?></td>
                        <td><?php echo get_phrase($row['status']); ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/application_edit/').$row['application_id']; ?>');">
                                            <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('edit'); ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick="confirm_modal_hard_reload('<?php echo site_url('admin/application/delete/') . $row['application_id'] ; ?>');">
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

    </div>

</div>