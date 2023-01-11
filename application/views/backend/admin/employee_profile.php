<?php
$employee = $this->db->get_where('user', array('user_code' => $user_code))->result_array();
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
    <li><?php echo get_phrase('employee_profile') ?></li>
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
            <li>
                <a href="#job_history" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('job_history'); ?></span>
                </a>
            </li>
            <li>
                <?php $complaints_count = $this->db->get_where('complaints', array('user_id' => $row['user_id']))->num_rows(); ?>
                <a href="#complaints" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs">
                        <?php echo get_phrase('complaints/dispute'); ?> (<?php echo $complaints_count;?>)
                    </span>
                </a>
            </li>
        </ul>

        <br>



                <div class="tab-content" style="padding: 20px;">
                    <div class="tab-pane active" id="personal_details">

                        <table class="table table-striped">

                            <tr>
                                <td><?php echo get_phrase('photo');?></td>
                                <td>
                                    <?php
                                    $image_path = base_url().'uploads/user_image/' . $user_code . '.jpg';
                                    if(!file_exists($image_path))
                                        $image_path = base_url().'uploads/user.jpg';
                                    ?>
                                    <img src="<?php echo $image_path; ?>" width="200" />
                                </td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('name');?></td>
                                <td><b><?php echo $row['name']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('email');?></td>
                                <td><b><?php echo $row['email']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('father_name'); ?></td>
                                <td><b><?php echo $row['father_name']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('date_of_birth');?></td>
                                <td><b><?php if($row['date_of_birth'] != '') echo date('d/m/Y', $row['date_of_birth']); ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('gender');?></td>
                                <td><b><?php echo $row['gender']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('phone');?></td>
                                <td><b><?php echo $row['phone']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('local_address');?></td>
                                <td><b><?php echo $row['local_address']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('permanent_address');?></td>
                                <td><b><?php echo $row['permanent_address']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('nationality');?></td>
                                <td><b><?php echo $row['nationality']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('martial_status');?></td>
                                <td><b><?php if($row['martial_status']!= null) { echo get_phrase($row['martial_status']); } ?></b></td>
                            </tr>

                        </table>

                    </div>

                    <div class="tab-pane" id="company_details">

                        <table class="table table-striped">

                            <tr>
                                <td><?php echo get_phrase('department');?></td>
                                <td><b><?php if($row['department_id']!=null ) echo $this->db->get_where('department', array('department_id' => $row['department_id']))->row()->name; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('designation');?></td>
                                <td><b><?php if($row['department_id']!=null ) echo $this->db->get_where('designation', array('designation_id' => $row['designation_id']))->row()->name; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('date_of_joining');?></td>
                                <td><b><?php if($row['date_of_joining'] != '') echo date('d/m/Y', $row['date_of_joining']); ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('joining_salary'); ?></td>
                                <td><b><?php echo $row['joining_salary']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('date_of_leaving');?></td>
                                <td><b><?php if($row['date_of_leaving'] != '') echo date('d/m/Y', $row['date_of_leaving']); ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('status');?></td>
                                <td><b><?php if($row['status'] == 1) echo get_phrase('active'); else echo get_phrase('inactive'); ?></b></td>
                            </tr>

                        </table>

                    </div>

                    <div class="tab-pane" id="bank_account_details">

                        <?php
                        $bank = $this->db->get_where('bank', array('bank_id' => $row['bank_id']))->result_array();
                        foreach ($bank as $row2) { ?>

                            <table class="table table-striped">

                                <tr>
                                    <td><?php echo get_phrase('account_holder_name'); ?></td>
                                    <td><b><?php echo $row2['account_holder_name']; ?></b></td>
                                </tr>

                                <tr>
                                    <td><?php echo get_phrase('account_number'); ?></td>
                                    <td><b><?php echo $row2['account_number']; ?></b></td>
                                </tr>

                                <tr>
                                    <td><?php echo get_phrase('bank_name');?></td>
                                    <td><b><?php echo $row2['name']; ?></b></td>
                                </tr>

                                <tr>
                                    <td><?php echo get_phrase('branch');?></td>
                                    <td><b><?php echo $row2['branch']; ?></b></td>
                                </tr>

                            </table>

                        <?php } ?>

                    </div>

                    <div class="tab-pane" id="document">

                        <?php
                        if($row['document_id'] != 0) {
                            $documents = $this->db->get_where('document', array('document_id' => $row['document_id']))->row(); ?>

                            <table class="table table-striped">

                                <?php if($documents->resume != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('resume_file'); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('uploads/document/resume/'). $documents->resume; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->resume . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->offer_letter != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('offer_letter'); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('uploads/document/offer_letter/'). $documents->offer_letter; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->offer_letter . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->joining_letter != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('joining_letter'); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('uploads/document/joining_letter/'). $documents->joining_letter; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->joining_letter . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->contract_agreement != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('contract_&_agreement'); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('uploads/document/contract_agreement/'). $documents->contract_agreement; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->contract_agreement . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->others != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('other'); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('uploads/document/others/'). $documents->others; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->others . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>

                        <?php } ?>

                    </div>

                    <div class="tab-pane" id="job_history">
                        <div class="row">
                            <?php
                                $job_history = $this->db->get_where('job_history', array(
                                    'user_id' => $row['user_id']
                                ))->result_array();
                                foreach ($job_history as $history) {
                             ?>

                             <div class="col-sm-6">
                         		<div class="tile-stats tile-gray">
                         			<h2 style="color: rgba(55, 62, 74, 0.6);">
                                        <?php echo $history['company_name']; ?>
                                    </h2>

                         			<h3><?php echo $history['department']; ?></h3>
                         			<p><?php echo $history['designation']; ?></p>
                                     <p>
                                         <strong>
                                             <?php echo date('d M Y', $history['timestamp_from']); ?> - <?php echo date('d M Y', $history['timestamp_to']); ?>
                                         </strong>
                                     </p>
                         		</div>
                             </div>

                         <?php } ?>
                        </div>

                    </div>

                    <div class="tab-pane" id="complaints">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-info btn-sm"
                                    onclick="showAjaxModal('<?php echo site_url('modal/popup/complaints_add/'.$row['user_code']); ?>')">
                                    <i class="entypo-plus"></i> &nbsp; <?php echo get_phrase('add_complaint'); ?>
                                </a>
                            </div>
                        </div>
                        <?php
                            $this->db->where('user_id', $row['user_id']);
                            $this->db->order_by('timestamp', 'desc');
                            $complaints = $this->db->get('complaints')->result_array();
                            foreach ($complaints as $complaint) {
                         ?>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-12">
                                    <div class="panel panel-default panel-shadow" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
                            			<!-- panel body -->
                            			<div class="panel-body">
                                            <strong style="font-size: 16px;">
                                                <?php echo $complaint['title']; ?>
                                            </strong>
                                            <strong class="pull-right" style="font-size: 12px;">
                                                <i class="entypo-calendar"></i> &nbsp; <?php echo date('d M Y', $complaint['timestamp']); ?>
                                            </strong>
                                            <hr>
                                            <p style="font-size: 13px;">
                                                <?php echo $complaint['summary']; ?>
                                            </p>
                                            <hr>
                                            <a href="#" class="btn btn-default btn-sm"
                                                onclick="showAjaxModal('<?php echo site_url('modal/popup/complaint_edit/'.$complaint['complaints_id']); ?>')">
                                                <i class="entypo-pencil"></i> &nbsp; <?php echo get_phrase('edit'); ?>
                                            </a>
                                            <a href="#" class="btn btn-default btn-sm"
                                                onclick="confirm_modal_hard_reload('<?php echo site_url('admin/employee/complaint_delete/'. $complaint['complaints_id']); ?>')">
                                                <i class="entypo-trash"></i> &nbsp; <?php echo get_phrase('delete'); ?>
                                            </a>
                            			</div>
                            		</div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>


    </div>
</div>
<?php endforeach; ?>
