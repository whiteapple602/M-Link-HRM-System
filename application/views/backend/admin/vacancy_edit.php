<?php
$edit_data = $this->db->get_where('vacancy', array('vacancy_id' => $param2))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_vacancy'); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(site_url('admin/vacancy/update/'). $param2, array('class' => 'form-horizontal form-groups-bordered validate',
                        'enctype' => 'multipart/form-data')); ?>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('position_name'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" required value="<?php echo $row['name']; ?>" autofocus />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('number_of_vacancies'); ?></label>

                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="number_of_vacancies" min="0" required value="<?php echo $row['number_of_vacancies']; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('last_date_of_application'); ?></label>

                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="last_date" value="<?php echo date('Y-m-d', $row['last_date']); ?>" />
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
