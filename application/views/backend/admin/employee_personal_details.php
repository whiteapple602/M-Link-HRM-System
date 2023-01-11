<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="name" value="" required />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('fathers_name'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="father_name" value="" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('date_of_birth'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="date_of_birth" value="" data-start-view="2"
            placeholder="date here" data-format="D, dd MM yyyy" required />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender'); ?></label>

    <div class="col-sm-5">
        <select name="gender" class="form-control selectboxit">
            <option value="male"><?php echo get_phrase('male'); ?></option>
            <option value="female"><?php echo get_phrase('female'); ?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="phone" value="" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('local_address'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="local_address" value="" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('permanent_address'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="permanent_address" value="" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nationality'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="nationality" value="" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('martial_status'); ?></label>

    <div class="col-sm-5">
        <select name="martial_status" class="form-control selectboxit">
            <option value="married"><?php echo get_phrase('married'); ?></option>
            <option value="unmarried"><?php echo get_phrase('unmarried'); ?></option>
            <option value="other"><?php echo get_phrase('other'); ?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo'); ?></label>

    <div class="col-sm-5">
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 0px;">
            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                <img src="http://placehold.it/200x200" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
                <span class="btn btn-white btn-file">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="userfile" accept="image/*">
                </span>
                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
    </div>
</div>
