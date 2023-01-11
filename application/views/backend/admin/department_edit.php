<?php
$department_id  = $this->db->get_where('department', array('department_code' => $param2))->row()->department_id;
$department     = $this->db->get_where('department', array('department_id' => $department_id))->result_array();
foreach ($department as $row):
    $first_designation = $this->db->get_where('designation', array('department_id' => $department_id))->row(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_department'); ?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(site_url('admin/department/edit/'). $row['department_code'],
                        array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('department_name'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" autofocus required />
                        </div>
                    </div>

                    <span id="designation">
                        <br>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('designation'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="<?php echo $first_designation->name; ?>"
                                    name="designation_<?php echo $first_designation->designation_id; ?>" required />
                            </div>
                        </div>

                        <?php
                        $query = $this->db->get_where('designation', array('department_id' => $department_id));
                        if($query->num_rows() > 1) {
                            $count          = 1;
                            $designations   = $query->result_array();
                            foreach($designations as $row2) {
                                if($count > 1) { ?>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <input type="text" class="form-control" value="<?php echo $row2['name']; ?>"
                                                name="designation_<?php echo $row2['designation_id']; ?>" />
                                        </div>

                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-default" onclick="deleteParentElement(this, <?php echo $row2['designation_id']; ?>)">
                                                <i class="entypo-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php }
                                $count ++;
                            }
                        } ?>

                        <span id="designation_input">
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <input type="text" class="form-control" name="designation[]"  value="" />
                                </div>

                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-default" onclick="deleteNewParentElement(this)">
                                        <i class="entypo-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </span>
                    </span>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="button" class="btn btn-default btn-sm btn-icon icon-left" onClick="add_designation()">
                                <?php echo get_phrase('add_designation'); ?>
                                <i class="entypo-plus"></i>
                            </button>
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
<?php endforeach; ?>



<script>
    
    $('#designation_input').hide();
    
    // CREATING BLANK DESIGNATION INPUT
    var blank_designation = '';
    $(document).ready(function () {
        blank_designation = $('#designation_input').html();
    });

    function add_designation()
    {
        $("#designation").append(blank_designation);
    }

    // REMOVING DESIGNATION INPUT
    function deleteParentElement(n, designation_id) {
        $.ajax({
            url     : '<?php echo site_url('admin/delete_designation/'); ?>' + designation_id,
            success : function (response)
            {
                response = 'success';
            }
        });
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
    
    function deleteNewParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>

<script>
    $(document).ready(function () {
        var wrapper = $(".add-text-box"); //Fields wrapper
        var add_button = $(".add-designation"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-6"><input type="text" class="form-control" name="designation[]" value="" placeholder="designation" id="designation"></div>'); //add input box

        });


    });

</script>