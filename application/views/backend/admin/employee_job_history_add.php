<div id="company_entry">
    <div class="row">
        <hr>
        <div class="col-sm-3">
            <strong><?php echo get_phrase('compnay_name'); ?></strong>
            <input type="text" name="company_name[]" class="form-control" value=""
                placeholder="" required>
        </div>
        <div class="col-sm-2">
            <strong><?php echo get_phrase('department'); ?></strong>
            <input type="text" name="department[]" class="form-control" value=""
                placeholder="" required>
        </div>
        <div class="col-sm-2">
            <strong><?php echo get_phrase('designation'); ?></strong>
            <input type="text" name="designation[]" class="form-control" value=""
                placeholder="" required>
        </div>
        <div class="col-sm-2">
            <strong><?php echo get_phrase('start_date'); ?></strong>
            <input type="text" class="form-control datepicker" name="timestamp_from[]" value=""
                data-start-view="2" required data-format="dd-mm-yyyy" required/>
        </div>
        <div class="col-sm-2">
            <strong><?php echo get_phrase('end_date'); ?></strong>
            <input type="text" class="form-control datepicker" name="timestamp_to[]" value=""
                data-start-view="2" required data-format="dd-mm-yyyy" required/>
        </div>
        <a href="#" style="margin-top: 20px;" onclick="delete_entry(this)"
            class="btn btn-default btn-sm">
            <i class="entypo-trash"></i>
        </a>
    </div>
</div>

<div id="new_entry">

</div>

<hr>
<button type="button" class="btn btn-info btn-sm" id="add_button" style="margin-top: 20px;">
    <?php echo get_phrase('add_another_compnay'); ?>
</button>

<script type="text/javascript">

    var company_entry_count = 1;
    var blank_entry_html = $('#company_entry').html();

    $('#add_button').click(function() {
        $('#new_entry').append(blank_entry_html);
        company_entry_count++;
    });

    function delete_entry(n) {
        if (company_entry_count > 1) {
            n.parentNode.parentNode.removeChild(n.parentNode);
            company_entry_count = company_entry_count - 1;
        }
    }

</script>
