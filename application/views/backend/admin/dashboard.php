<?php
$logged_in_user = $this->db->get_where('user', array('user_id' => $this->session->userdata('login_user_id')))->row(); ?>

<div class="row">

	<div class="col-md-4" style="text-align:center; margin-top: 200px;">
    	<img src="<?php echo $this->crud_model->get_image_url('admin', $this->session->userdata('login_user_id')); ?>" alt="" class="img-circle" style="height:60px;">
    	<br>
    	<span style="font-size: 20px; font-weight: 100;">
    		<?php echo get_phrase('welcome'); ?>,
	    	<span style="font-size: 30px; font-weight: 300;">
	    		<?php echo $logged_in_user->name; ?>
	    	</span>
            <br>
            <?php echo date ('d/m/Y'); ?>
    	</span>
	</div>
    
	<div class="col-md-8">

		<div class="row">

			<div class="col-md-4">
            
                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('user', array('type' => 2))->num_rows(); ?>" 
                    		data-postfix="" data-duration="1500" data-delay="0">0</div>
                    
                    <h3><?php echo get_phrase('total_employee');?></h3>
                </div>

            </div>

            <div class="col-md-4">

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-chart-area"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('attendance', array('date' => strtotime(date('m/d/Y')), 'status' => 1))->num_rows(); ?>" 
                    		data-postfix="" data-duration="1500" data-delay="0">0</div>
                    
                    <h3><?php echo get_phrase('present_today');?></h3>
                </div>
                
            </div>

            <?php
            $on_leave           = 0;
            $current_date       = strtotime(date('m/d/Y'));
            $approved_leaves    = $this->db->get_where('leave', array('status' => 1))->result_array();
            foreach($approved_leaves as $row)
                if($current_date >= $row['start_date'] && $current_date <= $row['end_date'])
                    $on_leave++;
            ?>

            <div class="col-md-4">
            
                <div class="tile-stats tile-aqua">
                    <div class="icon"><i class="entypo-flight"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $on_leave; ?>" 
                    		data-postfix="" data-duration="1500" data-delay="0">0</div>
                    
                    <h3><?php echo get_phrase('on_leave');?></h3>
                </div>

            </div>

		</div>

		<div class="row">

            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            <?php echo get_phrase('event_schedule');?>
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body" style="float: none;width: 100%;">
                                <div id="notice_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		</div>
    	
	</div>
</div>

<style type="text/css">

	.calendar-env .calendar-body .fc-header .fc-header-left {
		text-align: left;
	}

</style>

<script>
    $(document).ready(function() {
        var calendar = $('#notice_calendar');
        $('#notice_calendar').fullCalendar({
            header: {
                left: 'title',
                right: 'month,agendaWeek,agendaDay today prev,next'
            },
            
            //defaultView: 'basicWeek',
            
            editable: false,
            firstDay: 1,
            height: 530,
            droppable: false,
            
            events: [
                <?php 
                $notices = $this->db->get_where('noticeboard', array('status' => 1))->result_array();
                foreach($notices as $row): ?>
                {
                    title: "<?php echo $row['title'];?>",
                    start: new Date(<?php echo date('Y',$row['date']);?>, <?php echo date('m',$row['date'])-1;?>, <?php echo date('d',$row['date']);?>),
                    end:    new Date(<?php echo date('Y',$row['date']);?>, <?php echo date('m',$row['date'])-1;?>, <?php echo date('d',$row['date']);?>) 
                },
                <?php endforeach; ?>
            ]
        });
    });
</script>