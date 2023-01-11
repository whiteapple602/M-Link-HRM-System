<?php 
$employee = $this->db->get_where('user',array('user_code'=>$user_code))->result_array();
foreach ($employee as $row):

    echo form_open(site_url('admin/employee/edit/') . $row['user_code'], array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>
        <div style="padding-right: 20px">
            <button type="submit" class="btn btn-info pull-right" ><?php echo get_phrase('save_changes'); ?></button>
        </div>
        
        <br><br> 
        <div class="row">
            <div class="col-md-6">
                
                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title"><?php echo get_phrase('personal_details');?></div>
                        </div>

                        <div class="panel-body">
                            <?php include 'employee_personal_details_edit.php'; ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">

                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title"><?php echo get_phrase('company_details');?></div>
                        </div>

                        <div class="panel-body">
                            <?php include 'employee_company_details_edit.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title"><?php echo get_phrase('bank_account_details');?></div>
                        </div>

                        <div class="panel-body">
                            <?php include 'employee_bank_account_details_edit.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title"><?php echo get_phrase('documents');?></div>
                        </div>

                        <div class="panel-body">
                            <?php include 'employee_document_edit.php'; ?>
                        </div>
                    </div>
                </div>
                

                <div style="text-align: center; height: 184px;" class="col-md-offset-3 col-md-6">
                   <button type="submit" class="btn btn-lg btn-info" style="width: 100%; margin-top: 70px;">
                        <?php echo get_phrase('update'); ?>
                    </button>
                </div>

                <?php $user_id = $this->db->get_where('user',array('user_code'=>$user_code))->row()->user_id; ?>
                <div class="col-md-12">
        
                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_job_history_add/'.$user_id); ?>');" 
                       class="btn btn-primary pull-left">
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('add_job_history'); ?>
                    </a> <br><br>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title"><?php echo get_phrase('job_history');?></div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><div>#</div></th>
                                        <th><div><?php echo get_phrase('company_name'); ?></div></th>
                                        <th><div><?php echo get_phrase('department'); ?></div></th>
                                        <th><div><?php echo get_phrase('designation'); ?></div></th>
                                        <th><div><?php echo get_phrase('start_date'); ?></div></th>
                                        <th><div><?php echo get_phrase('end_date'); ?></div></th>
                                        <th><div><?php echo get_phrase('edit'); ?></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        $this->db->order_by('job_history_id', 'desc');
                                        $award = $this->db->get_where('job_history',array('user_id'=>$user_id))->result_array();
                                        foreach ($award as $row):
                                    ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['company_name'] ?></td>
                                            <td><?php echo $row['department'] ?></td>
                                            <td><?php echo $row['designation']; ?></td>
                                            <td><?php echo date("d M Y", $row['timestamp_from']); ?></td>
                                            <td><?php echo date("d M Y", $row['timestamp_to']); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm " onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_job_history_edit/'.$row['job_history_id'].'/'.$user_id); ?>');">
                                                        <?php echo get_phrase('edit') ?>
                                                    </button>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    <?php echo form_close();

endforeach; ?>


<div class="row">
    <div class="col-md-6">
        
        
       
    </div>
    
</div>

<script type="text/javascript">

    $( document ).ready(function() {

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