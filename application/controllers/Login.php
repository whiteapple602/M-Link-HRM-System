<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author     : Creativeitem
 *  date        : 10 February, 2017
 *  Human Resource Management System
 *  http://support.creativeitem.com
 */


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('admin_login') == 1)
            redirect(site_url('admin/dashboard'), 'refresh');
        if ($this->session->userdata('employee_login') == 1)
            redirect(site_url('employee/dashboard'), 'refresh');

        $this->load->view('backend/login');

    }

    //Validating login informations from ajax request
    function validate_login() {
        $email      =   $this->input->post('email');
        $password   =   $this->input->post('password');
        $credential	=	array(	'email' => $email , 'password' => sha1($password) );

        // Checking login credential for users of the system
        $query = $this->db->get_where('user' , $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            //setting the session parameters for admin
            if ($row->type == 1) {
                $this->session->set_userdata('admin_login' , '1');
                $this->session->set_userdata('login_type' , 'admin');
            }

            //setting the session parameters for employees
            if ($row->type == 2) {
                $this->session->set_userdata('employee_login' , '1');
                $this->session->set_userdata('login_type' , 'employee');
            }
            //setting the common session parameters for all type of users of the system
            $this->session->set_userdata('login_user_id' , $row->user_id);
            redirect(site_url($this->session->userdata('login_type').'/dashboard'), 'refresh');
        } else {
            $this->session->set_flashdata('login_error', 'Invalid Login');
            redirect(site_url('login'), 'refresh');
        }
    }

    function forgot_password() {
        $this->load->view('backend/forgot_password');
    }

    function reset_password() {
        $email = $this->input->post('email');
        $query = $this->db->get_where('user', array('email' => $email));
        if ($query->num_rows() > 0) {
            // create a new password
            $new_password   =   substr( md5( rand(100000000,20000000000) ) , 0,7);
            // update the password in database
            $this->db->where('email', $email);
            $this->db->update('user', array('password' => sha1($new_password)));
            // send an email with the new password
            $this->email_model->password_reset_email($new_password, $email);
            $this->session->set_flashdata('reset_success', get_phrase('check_your_email_for_new_password'));
            redirect(site_url('login/forgot_password'),'refresh');

        } else {
            $this->session->set_flashdata('reset_error', get_phrase('failed_to_reset_password'));
            redirect(site_url('login/forgot_password'),'refresh');
        }
    }


    // logout
    function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login') , 'refresh');
    }

}
