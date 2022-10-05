<?php

class Executive_login extends CI_Controller {

    function __construct() {

        parent::__construct();

        if (isset($_SESSION['executive_id']) && isset($_SESSION['staff_role'])) {
            redirect('executive');
        }
    }

    public function index() {
        $this->load->model('Common_model', 'cm');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('executive/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->where('staff_username', $username);
            $this->db->where('staff_password', $password);
            $this->db->where('staff_type', 1);
            $this->db->where('active', 1);
            $user = $this->db->get('mst_staff')->row();

            if ($user != '') {
                $this->session->set_userdata('executive_id', $user->staff_id);
                $this->session->set_userdata('ex_staff_type', $user->staff_type);
                $this->session->set_userdata('ex_staff_username', $user->staff_username);
                $this->session->set_userdata('theme_type', $user->theme_type);
                redirect(base_url() . 'executive');
            } else {
                $this->session->set_flashdata('errorMsg', 'Invalid Username/Password');

                redirect(base_url() . 'executive_login');
            }
        }
    }

}

?>