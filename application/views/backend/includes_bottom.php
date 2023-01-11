<!-- Imported styles -->

<link rel="stylesheet" href="<?php echo base_url();?>assets/js/datatables/responsive/css/datatables.responsive.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/selectboxit/jquery.selectBoxIt.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/icheck/skins/flat/_all.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-icons/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-select.css">

<!-- Bottom scripts (common) -->
<script src="<?php echo base_url();?>assets/js/datatables/datatables.js"></script>
<script src="<?php echo base_url();?>assets/js/gsap/TweenMax.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/joinable.js"></script>
<script src="<?php echo base_url();?>assets/js/resizeable.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-api.js"></script>
<script src="<?php echo base_url();?>assets/js/toastr.js"></script>
<script src="<?php echo base_url();?>assets/js/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/icheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/js/fileinput.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-chat.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-select.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>assets/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />


<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url();?>assets/js/neon-custom.js"></script>

<!--<script src="assets/js/jquery.dataTables.min.js"></script>-->
<script src="<?php echo base_url();?>assets/js/datatables/TableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/lodash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/responsive/js/datatables.responsive.js"></script>


<script src="<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-calendar.js"></script>

<!-- Demo Settings -->
<script src="<?php echo base_url();?>assets/js/neon-demo.js"></script>

<?php if(($this->session->flashdata('flash_message')) != ''):?>
    <script type="text/javascript">
        toastr.success('<?php echo $this->session->flashdata('flash_message'); ?>')
    </script>
<?php endif;?>
<?php if(($this->session->flashdata('error_message')) != ''):?>
    <script type="text/javascript">
        toastr.error('<?php echo $this->session->flashdata('error_message'); ?>')
    </script>
<?php endif;?>

<?php if(($this->session->flashdata('update_message')) != ''):?>
	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata('update_message');?>' , '<?php echo get_phrase('success');?>')
	</script>
<?php endif;?>

<?php if(($this->session->flashdata('success_message')) != ''):?>
	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata('success_message');?>' , '<?php echo get_phrase('success');?>')
	</script>
<?php endif;?>