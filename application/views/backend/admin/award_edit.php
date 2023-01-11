<?php
$edit_data = $this->db->get_where('award', array('award_id' => $param2))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_award'); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(site_url('admin/award/update/'). $param2, array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('award_name'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" required value="<?php echo $row['name']; ?>" autofocus />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gift'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="gift" required value="<?php echo $row['gift']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('amount'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="amount" required value="<?php echo $row['amount']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('employee'); ?></label>

                        <div class="col-sm-5">
                            <select name="user_id" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('select_an_employee'); ?></option>
                                <?php
                                $employees = $this->db->get_where('user', array('type' => 2))->result_array();
                                foreach ($employees as $row2) { ?>
                                    <option value="<?php echo $row2['user_id']; ?>" <?php if($row2['user_id'] == $row['user_id']) echo 'selected'; ?>>
                                        <?php echo $row2['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>

                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d', $row['date']); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

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
