<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo site_url('login'); ?>">
                <img src="<?php echo base_url();?>uploads/logo.png"  style="max-height:60px;"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>	
    <ul id="main-menu" class="">
        
        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo site_url('employee/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>
        
        <!-- ATTENDANCE REPORT -->
        <li class="<?php if (( $page_name == 'attendance_report' || $page_name == 'attendance_report_view')) echo 'active'; ?>">
            <a href="<?php echo site_url('employee/attendance_report'); ?>">
                <span>
                    <i class="entypo-chart-area"></i>
                    <?php echo get_phrase('attendance_report'); ?>
                </span>
            </a>
        </li>
        
        <!-- LEAVE -->
        <li class="<?php if ($page_name == 'leave') echo 'active'; ?> ">
            <a href="<?php echo site_url('employee/leave'); ?>">
                <i class="entypo-flight"></i>
                <span><?php echo get_phrase('leave'); ?></span>
            </a>
        </li>

        <!-- PAYROLL -->
        <li class="<?php if ($page_name == 'payroll_list') echo 'active'; ?> ">
            <a href="<?php echo site_url('employee/payroll_list'); ?>">
                <span><i class="entypo-tag"></i> <?php echo get_phrase('payroll'); ?></span>
            </a>
        </li>

        <!-- AWARD -->
        <li class="<?php if ($page_name == 'award') echo 'active'; ?> ">
            <a href="<?php echo site_url('employee/award'); ?>">
                <i class="entypo-trophy"></i>
                <span><?php echo get_phrase('award'); ?></span>
            </a>
        </li>

        <!-- NOTICEBOARD -->
        <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
            <a href="<?php echo site_url('employee/noticeboard'); ?>">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- MESSAGE -->
        <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
            <a href="<?php echo site_url('employee/message'); ?>">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('message'); ?></span>
            </a>
        </li>

        <!-- PROFILE -->
        <li class="<?php if ($page_name == 'profile' || $page_name == 'change_password')
            echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'profile') echo 'active'; ?> ">
                    <a href="<?php echo site_url('employee/profile'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('edit_profile'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'change_password') echo 'active'; ?> ">
                    <a href="<?php echo site_url('employee/change_password'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo get_phrase('change_password'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        
    </ul>

</div>