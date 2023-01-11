<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_vacancy'); ?>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open(site_url('admin/vacancy/create'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('position_name'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" required value="" autofocus />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('number_of_vacancies'); ?></label>

                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="number_of_vacancies" min="0" required value="" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('last_date_of_application'); ?></label>

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="last_date">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker();
    });
</script>
