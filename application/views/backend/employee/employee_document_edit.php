<?php
if($row['document_id'] != 0)
    $documents = $this->db->get_where('document', array('document_id' => $row['document_id']))->row(); ?>

<div class="form-group" style="margin-bottom: 5px;">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('resume_file'); ?></label>

    <div class="col-sm-7">
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 0px;">
            <span class="btn btn-primary btn-file">
                <span class="fileinput-new"><?php echo get_phrase('choose'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="resume" />
            </span>
            <span class="fileinput-filename"></span>
            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
        </div>
    </div>
</div>

<?php 
    if($row['document_id'] != 0)
    {
        if($documents->resume != '') { ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
                <a href="<?php echo base_url().'uploads/document/resume/' . $documents->resume; ?>" class="btn btn-blue btn-icon icon-left">
                    <i class="entypo-download"></i>
                    <?php echo get_phrase('download_previous_file') ?>
                </a>
                <?php echo ' (' . $documents->resume . ')'; ?>
            </div>
        </div>
<?php } } ?>

<div class="form-group" style="margin-bottom: 5px;">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('offer_letter'); ?></label>

    <div class="col-sm-7">
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 0px;">
            <span class="btn btn-primary btn-file">
                <span class="fileinput-new"><?php echo get_phrase('choose'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="offer_letter" />
            </span>
            <span class="fileinput-filename"></span>
            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
        </div>
    </div>
</div>

<?php
    if($row['document_id'] != 0)
    {
        if($documents->offer_letter != '') { ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
                <a href="<?php echo base_url().'uploads/document/offer_letter/' . $documents->offer_letter; ?>" class="btn btn-blue btn-icon icon-left">
                    <i class="entypo-download"></i>
                    <?php echo get_phrase('download_previous_file') ?>
                </a>
                <?php echo ' (' . $documents->offer_letter . ')'; ?>
            </div>
        </div>
<?php } } ?>

<div class="form-group" style="margin-bottom: 5px;">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('joining_letter'); ?></label>

    <div class="col-sm-7">
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 0px;">
            <span class="btn btn-primary btn-file">
                <span class="fileinput-new"><?php echo get_phrase('choose'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="joining_letter" />
            </span>
            <span class="fileinput-filename"></span>
            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
        </div>
    </div>
</div>

<?php
    if($row['document_id'] != 0)
    { 
        if($documents->joining_letter != '') { ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
                <a href="<?php echo base_url().'uploads/document/joining_letter/' . $documents->joining_letter; ?>" class="btn btn-blue btn-icon icon-left">
                    <i class="entypo-download"></i>
                    <?php echo get_phrase('download_previous_file') ?>
                </a>
                <?php echo ' (' . $documents->joining_letter . ')'; ?>
            </div>
        </div>
<?php } } ?>

<div class="form-group" style="margin-bottom: 5px;">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('contract_&_agreement'); ?></label>

    <div class="col-sm-7">
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 0px;">
            <span class="btn btn-primary btn-file">
                <span class="fileinput-new"><?php echo get_phrase('choose'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="contract_agreement" />
            </span>
            <span class="fileinput-filename"></span>
            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
        </div>
    </div>
</div>

<?php
    if($row['document_id'] != 0)
    { 
        if($documents->contract_agreement != '') { ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
                <a href="<?php echo base_url().'uploads/document/contract_agreement/' . $documents->contract_agreement; ?>" class="btn btn-blue btn-icon icon-left">
                    <i class="entypo-download"></i>
                    <?php echo get_phrase('download_previous_file') ?>
                </a>
                <?php echo ' (' . $documents->contract_agreement . ')'; ?>
            </div>
        </div>
<?php } } ?>

<div class="form-group" style="margin-bottom: 5px;">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('other'); ?></label>

    <div class="col-sm-7">
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 0px;">
            <span class="btn btn-primary btn-file">
                <span class="fileinput-new"><?php echo get_phrase('choose'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="others" />
            </span>
            <span class="fileinput-filename"></span>
            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
        </div>
    </div>
</div>

<?php
    if($row['document_id'] != 0)
    { 
        if($documents->others != '') { ?>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
                <a href="<?php echo base_url().'uploads/document/others/' . $documents->others; ?>" class="btn btn-blue btn-icon icon-left">
                    <i class="entypo-download"></i>
                    <?php echo get_phrase('download_previous_file') ?>
                </a>
                <?php echo ' (' . $documents->others . ')'; ?>
            </div>
        </div>
<?php } }?>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" class="btn btn-info"><?php echo get_phrase('save_changes'); ?></button>
    </div>
</div>