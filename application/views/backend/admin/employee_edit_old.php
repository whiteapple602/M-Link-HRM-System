<?php 
$employee = $this->db->get_where('user',array('user_code'=>$user_code))->result_array();
foreach ($employee as $row):
?>
<ol class="breadcrumb" style="margin-bottom: 0px;">
    <li>
        <a href="<?php echo site_url('admin/dashboard') ?>">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/employee/list'); ?>">
            <?php echo get_phrase('employee_list') ?>
        </a>
    </li>
    <li><?php echo get_phrase('edit_employee') ?></li>
</ol>
<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
            <li class="active">
                <a href="#personal_details" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('personal_details'); ?></span>
                </a>
            </li>
            <li>
                <a href="#account_login" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('account_login'); ?></span>
                </a>
            </li>
            <li>
                <a href="#company_details" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('company_details'); ?></span>
                </a>
            </li>
            <li>
                <a href="#bank_account_details" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('bank_account_details'); ?></span>
                </a>
            </li>
            <li>
                <a href="#document" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('documents'); ?></span>
                </a>
            </li>
        </ul>

        <br>
        <?php
        echo form_open(site_url('admin/employee/edit/') .$row['user_code'], array('class' => 'form-horizontal form-bordered',
            'data-parsley-validate' => 'true', 'enctype' => 'multipart/form-data')); ?>
            
        <div class="panel panel-default" data-collapsed="0">

            <div class="panel-body">

                <div class="tab-content">
                    <div class="tab-pane active" id="personal_details">

                        <?php include 'employee_personal_details_edit.php'; ?>

                    </div>
                    <div class="tab-pane" id="account_login">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" required />
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="company_details">

                        <?php include 'employee_company_details_edit.php'; ?>

                    </div>
                    <div class="tab-pane" id="bank_account_details">

                        <?php include 'employee_bank_account_details_edit.php'; ?>

                    </div>
                    <div class="tab-pane" id="document">

                        <?php include 'employee_document_edit.php'; ?>

                    </div>

                </div>

            </div>


        </div>
        <div class="form-group">
            
            <div class="col-md-offset-3 col-md-2">
                <input type="submit" class="form-control btn btn-success m-r-5 m-b-5 fa-fa-upload " value="Update" />
            </div>
        </div>
        <?php echo form_close(); ?> 
    </div>
</div> 
<?php endforeach; ?>