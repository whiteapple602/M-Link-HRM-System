<div class="row">

    <div class="col-md-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><div>#</div></th>
                    <th><div><?php echo get_phrase('date'); ?></div></th>
                    <th><div><?php echo get_phrase('notice_title'); ?></div></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $this->db->order_by('date', 'desc');
                $noticeboard = $this->db->get_where('noticeboard', array('status' => 1))->result_array();
                foreach ($noticeboard as $row):
                    ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo date('d/m/Y', $row['date']); ?></td>
                        <td><?php echo $row['title']; ?></td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="col-md-6">
        <div class="row">
            <!-- CALENDAR-->
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





















