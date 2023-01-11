<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs"><!-- available classes "bordered", "right-aligned" -->
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

        <?php echo form_open(site_url('admin/employee/create'),
            array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-body">

                    <div class="tab-content">

                        <div class="tab-pane active" id="personal_details">

                            <?php include 'employee_personal_details.php'; ?>

                        </div>

                        <div class="tab-pane" id="account_login">

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>

                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="email" value="" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('password'); ?></label>

                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" value="" required />
                                </div>
                            </div>


                        </div>

                        <div class="tab-pane" id="company_details">

                            <?php include 'employee_company_details.php'; ?>

                        </div>

                        <div class="tab-pane" id="bank_account_details">

                            <?php include 'employee_bank_account_details.php'; ?>

                        </div>

                        <div class="tab-pane" id="document">

                            <?php include 'employee_document.php'; ?>

                        </div>

                    </div>

                </div>


            </div>
        
            <div class="form-group" style="padding-top: 0px;">
                <div class="col-sm-offset-3 col-sm-5" style="padding-left: 25px;">
                    <button type="submit" class="btn btn-info">
                        <?php echo get_phrase('submit'); ?>
                    </button>
                </div>
            </div>

            <!--<div class="form-group">

                <div class="col-md-3">
                    <input type="submit" class="form-control btn btn-success m-r-5 m-b-5 fa-fa-upload " value="Save" />
                </div>
            </div>-->
        <?php echo form_close(); ?> 
    </div>
</div>