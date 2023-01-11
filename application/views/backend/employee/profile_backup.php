<?php 
$employee = $this->db->get_where('user', array('user_id' => $this->session->userdata('login_user_id')))->result_array();
foreach ($employee as $row):

    echo form_open(site_url('employee/profile/edit/'). $row['user_code'], array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>
        
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
                
                <div class="col-md-12">
                    <div class="panel panel-default panel-shadow" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title"><?php echo get_phrase('account_login');?></div>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>

                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" required />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

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