<?php

class Admin_login extends CI_Controller {

    function __construct() {

        parent::__construct();

        if (isset($_SESSION['staff_id']) && isset($_SESSION['staff_role'])) {
            redirect('admin');
        }
    }

    public function index() {
        $this->load->model('Common_model', 'cm');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->where('staff_username', $username);
            $this->db->where('staff_password', $password);
            $this->db->where('staff_type', 0);
            $user = $this->db->get('mst_staff')->row();

            if ($user != '') {
                $this->session->set_userdata('staff_id', $user->staff_id);
                $this->session->set_userdata('staff_type', $user->staff_type);
                $this->session->set_userdata('staff_username', $user->staff_username);
                $this->session->set_userdata('theme_type', $user->theme_type);
                redirect(base_url() . 'admin');
            } else {
                $this->session->set_flashdata('errorMsg', 'Invalid Username/Password');

                redirect(base_url() . 'admin_login');
            }
        }
    }

}

?>