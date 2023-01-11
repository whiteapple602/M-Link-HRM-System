<?php
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
//$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$logged_in_user_type = $this->session->userdata('login_type');
$loggd_in_user_id = $this->session->userdata('login_user_id');
?>

<!DOCTYPE html>
<html lang="en">

    <!-- INCLUDES THE CSS FILES AND MAIN JQUERY LIBRARY -->
    <?php include 'includes_top.php'; ?>

    <body class="page-body" data-url="http://neon.dev">

        <div class="page-container">

            <!-- INCLUDES THE NAVIGATION MENU FOR USERS -->
            <?php include $logged_in_user_type . '/navigation.php'; ?>

            <div class="main-content">

                <!-- INCLUDES THE HEADER -->
                <?php include 'header.php'; ?>

                <h3 style="margin:20px 0px; color:#818da1; font-weight:200;">
                    <i class="entypo-right-circled"></i>
                    <?php echo $page_title; ?>
                </h3>

                <!-- INCLUDES THE MAIN BODY FOR EACH PAGE -->
                <?php include $logged_in_user_type . '/' . $page_name . '.php'; ?>

                <!-- INCLUDES THE FOOTER -->
                <?php include 'footer.php'; ?>

            </div>

        </div>

        <!-- INCLUDES ALL JAVASCRIPT FILES -->
        <?php include 'modal.php'; ?>
        <?php include 'includes_bottom.php'; ?>

    </body>
</html>
