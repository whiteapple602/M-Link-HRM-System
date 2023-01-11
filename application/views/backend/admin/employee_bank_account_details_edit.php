<?php
if($row['bank_id'] != null)
{
    $bank_id = $this->db->get_where('bank', array('bank_id' => $row['bank_id']))->row();
} ?>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('account_holder_name'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="account_holder_name" value="<?php if($row['bank_id']!= null) { if($bank_id->account_holder_name != null) { echo $bank_id->account_holder_name; }} ?>"  />
    </div>
</div>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('account_number'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="account_number" value="<?php if($row['bank_id']!= null) { if($bank_id->account_number != null)  { echo $bank_id->account_number; }} ?>"  />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('bank_name'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="bank_name" value="<?php if($row['bank_id']!= null) { if($bank_id->name != null) {echo $bank_id->name; }} ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('branch'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="branch" value="<?php if($row['bank_id']!= null) { if($bank_id->branch != null) {echo $bank_id->branch; }} ?>" >
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" class="btn btn-info"><?php echo get_phrase('save_changes'); ?></button>
    </div>
</div>
