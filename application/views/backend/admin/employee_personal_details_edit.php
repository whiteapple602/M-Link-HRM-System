<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('fathers_name'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="father_name" value="<?php echo $row['father_name'] ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('date_of_birth'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control datepicker" name="date_of_birth" data-start-view="2"
            placeholder="date here" data-format="D, dd MM yyyy"
            value="<?php echo date("D, d M Y", $row['date_of_birth']) ?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender'); ?></label>

    <div class="col-sm-8">
        <select name="gender" class="form-control selectboxit">
            <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>><?php echo get_phrase('male'); ?></option>
            <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>><?php echo get_phrase('female'); ?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('local_address'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="local_address" value="<?php echo $row['local_address'] ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('permanent_address'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="permanent_address" value="<?php echo $row['permanent_address'] ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nationality'); ?></label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality']; ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('martial_status'); ?></label>

    <div class="col-sm-8">
        <select name="martial_status" class="form-control selectboxit">
            <option value="married" <?php if ($row['martial_status'] == 'married') echo 'selected'; ?>><?php echo get_phrase('married'); ?></option>
            <option value="unmarried" <?php if ($row['martial_status'] == 'unmarried') echo 'selected'; ?>><?php echo get_phrase('unmarried'); ?></option>
            <option value="other" <?php if ($row['martial_status'] == 'other') echo 'selected'; ?>><?php echo get_phrase('other'); ?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo'); ?></label>

    <div class="col-sm-8">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                <?php if (file_exists('uploads/user_image/' . $row['user_code'] . '.jpg')): ?>
                    <img src="<?php echo base_url();?>uploads/user_image/<?php echo $row['user_code']; ?>.jpg" alt="...">
                <?php endif; ?>
                <?php if (!(file_exists('uploads/user_image/' . $row['user_code'] . '.jpg'))): ?>
                    <img src="<?php echo base_url();?>assets/no_image.png" alt="...">
                <?php endif; ?>
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
                <span class="btn btn-white btn-file">
                    <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                    <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                    <input type="file" name="userfile" accept="image/*">
                </span>
                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-5">
        <button type="submit" class="btn btn-info"><?php echo get_phrase('save_changes'); ?></button>
    </div>
</div>
