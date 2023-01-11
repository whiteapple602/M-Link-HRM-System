<?php 
$employee = $this->db->get_where('user', array('user_id' => $this->session->userdata('login_user_id')))->result_array();
foreach ($employee as $row): ?>
         <div class="row">
        
            <div class="col-md-12">
        
                <div class="panel-group joined" id="accordion-test-2" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2">
                                    <?php echo get_phrase('personal_details'); ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne-2" class="panel-collapse collapse">
                            <div class="panel-body" style="background-color: white;">
                                <?php  echo form_open(site_url('employee/profile/personal_details/'). $row['user_code'], array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>
                                        <?php include 'employee_personal_details_edit.php'; ?>
                                <?php echo form_close(); ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseThree-2" class="collapsed">
                                    <?php echo get_phrase('bank_account_details'); ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree-2" class="panel-collapse collapse">
                            <div class="panel-body" style="background-color: white;">
                                <?php  echo form_open(site_url('employee/profile/bank_account_details/'). $row['user_code'], array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>
                                        <?php include 'employee_bank_account_details_edit.php'; ?>
                                <?php echo form_close(); ?>
                                  
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseFour-2" class="collapsed">
                                    <?php echo get_phrase('documents'); ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour-2" class="panel-collapse collapse">
                            <div class="panel-body" style="background-color: white;">
                                <?php  echo form_open(site_url('employee/profile/documents/'). $row['user_code'], array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>
                                        <?php include 'employee_document_edit.php'; ?>
                                <?php echo form_close(); ?>
                               
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseFive-2" class="collapsed">
                                    <?php echo get_phrase('job_history'); ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive-2" class="panel-collapse collapse">
                            <div class="panel-body" style="background-color: white;">
                                
                                
                                <div class="col-md-12">
                        
                                    <a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_job_history_add'); ?>');" 
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
                                                        $award = $this->db->get_where('job_history',array('user_id'=>$this->session->userdata('login_user_id')))->result_array();
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
                                                                    <button type="button" class="btn btn-info btn-sm " onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_job_history_edit/'.$row['job_history_id'].'/'.$this->session->userdata('login_user_id')); ?>');">
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
                    </div>
                    
                    
                    
                </div>
        
            </div>
        
            
    <?php echo form_close();

endforeach; ?>

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