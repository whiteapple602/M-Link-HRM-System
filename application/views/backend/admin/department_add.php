<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_department'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/department/create'), array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('department_name'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="" required autofocus />
                    </div>
                </div>
                
                <span id="designation">
                    <br>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('designation'); ?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="designation[]" value="" required />
                        </div>
                    </div>
                </span>
                
                <span id="designation_input">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="text" class="form-control" name="designation[]"  value="" />
                        </div>
                        
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                <i class="entypo-trash"></i>
                            </button>
                        </div>
                    </div>
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
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('submit'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

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
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>