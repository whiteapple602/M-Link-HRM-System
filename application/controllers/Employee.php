<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
 *  @author     : Creativeitem
 *  date        : 10 February, 2017
 *  Human Resource Management System
 *  http://support.creativeitem.com
 */

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    // DEFAULT FUNCTION (redirects to login page if no user is logged in)
    public function index() {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($this->session->userdata('employee_login') == 1)
            redirect(site_url('employee/dashboard'), 'refresh');
        $this->load->view('backend/index');
    }

    // DASHBOARD
    function dashboard()
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['page_name']     = 'dashboard';
        $page_data['page_title']    = get_phrase('employee_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    // ATTENDANCE REPORT
    function attendance_report()
    {
        $page_data['month']         = date('m');
        $page_data['year']          = date('Y');
        $page_data['page_name']     = 'attendance_report';
        $page_data['page_title']    = get_phrase('attendance_report');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_selector()
    {
        $data['year']           = $this->input->post('year');
        $data['month']          = $this->input->post('month');
        redirect(site_url('employee/attendance_report_view/'). $data['year'] . '/' . $data['month'], 'refresh');
    }

    function attendance_report_view($year = '', $month = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $page_data['year']          = $year;
        $page_data['month']         = $month;
        $page_data['page_name']     = 'attendance_report_view';
        $page_data['page_title']    = get_phrase('attendance_report');
        $this->load->view('backend/index', $page_data);
    }

    function attendance_report_print_view($year = '', $month = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $page_data['year']          = $year;
        $page_data['month']         = $month;
        $this->load->view('backend/employee/attendance_report_print_view', $page_data);
    }

    // LEAVE
    function leave($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        if ($param1 == 'create') {
            $leave = $this->crud_model->create_leave();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(site_url('employee/leave'), 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(site_url('employee/leave'), 'refresh');
        }
        
        if ($param1 == 'delete') {
            $this->crud_model->delete_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(site_url('employee/leave'), 'refresh');
        }
        
        $page_data['page_name']     = 'leave';
        $page_data['page_title']    = get_phrase('leave_list');
        $this->load->view('backend/index', $page_data);
    }
    
    function payroll_list()
    {
        $page_data['page_name']     = 'payroll_list';
        $page_data['page_title']    = get_phrase('payslip_list');
        $this->load->view('backend/index', $page_data);
    }

    function get_employee($department_id) {
        $page_data['department_id'] = $department_id;
        $this->load->view('backend/admin/payroll_employee_select', $page_data);
    }

    // AWARD
    function award($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $page_data['page_name']     = 'award';
        $page_data['page_title']    = get_phrase('awards_list');
        $this->load->view('backend/index', $page_data);
    }

    // NOTICEBOARD
    function noticeboard($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $page_data['page_name']     = 'noticeboard';
        $page_data['page_title']    = get_phrase('notice_list');
        $this->load->view('backend/index', $page_data);
    }
    
    // PRIVATE MESSAGING
    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(site_url('employee/message/message_read/') . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(site_url('employee/message/message_read/'). $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }
    
    function profile($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        if($param1 == 'personal_details')
        {
            //user
            $data2['name']                  = $this->input->post('name');
            $data2['father_name']           = $this->input->post('father_name');
            $data2['date_of_birth']         = strtotime($this->input->post('date_of_birth'));
            $data2['gender']                = $this->input->post('gender');
            $data2['phone']                 = $this->input->post('phone');
            $data2['local_address']         = $this->input->post('local_address');
            $data2['permanent_address']     = $this->input->post('permanent_address');
            $data2['email']                 = $this->input->post('email');
            $data2['nationality']           = $this->input->post('nationality');
            $data2['martial_status']        = $this->input->post('martial_status');
            
            $id = $this->db->get_where('user',array('user_code'=>$param2))->row()->user_id;
            $validation = email_validation_for_edit($data2['email'], $id, 'user');
            if($validation == 1)
            {
                $this->db->where('user_code',$param2);
                $this->db->update('user',$data2);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $param2 . '.jpg');
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            }
            else
            {
                $this->session->set_flashdata('error_message' , get_phrase('this_email_id_is_not_available'));
            }
            redirect(site_url('employee/profile'), 'refresh');
        }
        if($param1 == 'bank_account_details')
        {
            //bank
            if($this->input->post('bank_name') != '' || $this->input->post('branch') != '' || $this->input->post('account_holder_name') != '' || $this->input->post('account_number') != '')
            {
                $bank_id = $this->db->get_where('user',array('user_code'=>$param2))->row()->bank_id;
                $data['name']                   = $this->input->post('bank_name');
                $data['branch']                 = $this->input->post('branch');
                $data['account_holder_name']    = $this->input->post('account_holder_name');
                $data['account_number']         = $this->input->post('account_number');
                if ($bank_id == null) 
                {
                   $this->db->insert('bank',$data);
                   $bank_id = $this->db->insert_id();

                   $data2['bank_id'] = $bank_id;
                   $this->db->where('user_code',$param2);
                   $this->db->update('user',$data2);
                }
                else
                {
                    $this->db->where('bank_id',$bank_id);
                    $this->db->update('bank',$data);
                } 
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(site_url('employee/profile'), 'refresh');
            }
            redirect(site_url('employee/profile'), 'refresh');
            
        }
        if($param1 == 'documents')
        {
            //document
            if($_FILES['resume']['name'] != '' || $_FILES['offer_letter']['name'] != '' || $_FILES['joining_letter']['name'] != '' || $_FILES['contract_agreement']['name'] != '' || $_FILES['others']['name'] != '') 
            {

                if($_FILES['resume']['name'] != '')
                    $data3['resume'] = $param2 . '_' . $_FILES['resume']['name'];
                if($_FILES['offer_letter']['name'] != '')
                    $data3['offer_letter'] = $param2 . '_' . $_FILES['offer_letter']['name'];
                if($_FILES['joining_letter']['name'] != '')
                    $data3['joining_letter'] = $param2 . '_' . $_FILES['joining_letter']['name'];
                if($_FILES['contract_agreement']['name'] != '')
                    $data3['contract_agreement'] = $param2 . '_' . $_FILES['contract_agreement']['name'];
                if($_FILES['others']['name'] != '')
                    $data3['others'] = $param2 . '_' . $_FILES['others']['name'];

                $document_id = $this->db->get_where('user', array('user_code' => $param2))->row()->document_id;

                if($document_id == 0) {
                    $this->db->insert('document', $data3);
                    $document_id = $this->db->insert_id();
                } else
                    $this->db->update('document', $data3, array('document_id' => $document_id));


                if($_FILES['resume']['name'] != '')
                    move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/document/resume/' . $data3['resume']);
                if($_FILES['offer_letter']['name'] != '')
                    move_uploaded_file($_FILES['offer_letter']['tmp_name'], 'uploads/document/offer_letter/' . $data3['offer_letter']);
                if($_FILES['joining_letter']['name'] != '')
                    move_uploaded_file($_FILES['joining_letter']['tmp_name'], 'uploads/document/joining_letter/' . $data3['joining_letter']);
                if($_FILES['contract_agreement']['name'] != '')
                    move_uploaded_file($_FILES['contract_agreement']['tmp_name'], 'uploads/document/contract_agreement/' . $data3['contract_agreement']);
                if($_FILES['others']['name'] != '')
                    move_uploaded_file($_FILES['others']['tmp_name'], 'uploads/document/others/' . $data3['others']);

                $data2['document_id'] = $document_id;
                $this->db->where('user_code',$param2);
                $this->db->update('user',$data2);
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(site_url('employee/profile'), 'refresh');
            }
        }

        // if ($param1 == 'edit') 
        // {

        //     $employee = $this->crud_model->edit_employee($param2);
        //     if ($employee == 'true') {
        //         $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
        //         redirect(site_url('employee/profile'), 'refresh');
        //     }
        // }
        
        $page_data['page_name']     = 'profile';
        $page_data['page_title']    = get_phrase('edit_profile');
        $this->load->view('backend/index', $page_data);
    }

    // EMPLOYEE JOB HISTORY
    function employee_job_history($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');

        if($param1 == 'create')
        {

            $job_history_data['user_id']        =   $this->session->userdata('login_user_id');
            $job_history_data['company_name']   =   $this->input->post('compnay_name');
            $job_history_data['department']     =   $this->input->post('department');
            $job_history_data['designation']    =   $this->input->post('designation');
            $job_history_data['timestamp_from'] =   strtotime($this->input->post('start_date'));
            $job_history_data['timestamp_to']   =   strtotime($this->input->post('end_date'));

            $this->db->insert('job_history', $job_history_data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('employee/profile/'),'refresh');
        }
        if($param1 == 'do_update')
        {
            $job_history_data['company_name']   =   $this->input->post('compnay_name');
            $job_history_data['department']     =   $this->input->post('department');
            $job_history_data['designation']    =   $this->input->post('designation');
            $job_history_data['timestamp_from'] =   strtotime($this->input->post('start_date'));
            $job_history_data['timestamp_to']   =   strtotime($this->input->post('end_date'));

            $this->db->where('job_history_id', $param2);
            $this->db->update('job_history', $job_history_data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(site_url('employee/profile'),'refresh');
        }

    }
    
    
    function change_password($param1 = '', $param2 = '')
    {
        if ($param1 == 'change') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
            
            $current_password = $this->db->get_where('user',
                array('user_id' => $this->session->userdata('login_user_id')))->row()->password;
            
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('user_id', $this->session->userdata('login_user_id'));
                $this->db->update('user', array('password' => $data['new_password']));
                
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(site_url('employee/change_password'), 'refresh');
        }
        
        $page_data['page_name']     = 'change_password';
        $page_data['page_title']    = get_phrase('change_password');
        $this->load->view('backend/index', $page_data);
    }
}

function test()
    {
        echo 'rjtoyr'; die();
        if ($this->session->userdata('employee_login') != 1)
            redirect(site_url('login'), 'refresh');
        
        $page_data['page_name']     = 'profile_backup';
        $page_data['page_title']    = get_phrase('awards_list');
        $this->load->view('backend/index', $page_data);
    }