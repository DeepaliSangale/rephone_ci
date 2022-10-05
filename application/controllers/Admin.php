<?php

class Admin extends CI_Controller {

    //rephone
    public function __construct() {
        parent::__construct(); 
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('common_model', 'ccm');
        if (!isset($_SESSION['staff_id']) && !isset($_SESSION['staff_type'])) {
            redirect('admin_login');
        }
    }

    public function index() {

//        print('<pre>' . print_r($data['web_l_count'], true) . '</pre>');
//        die;
//        $data['current_page'] = 'Dashboard';
//        $data['title'] = 'Dashboard';
//        $data['viewfile'] = "admin/dashboard";
//        $this->load->view('admin/layout', $data);
       // print_r($_SESSION); die;
       if($_SESSION['staff_type']==1){
        $this->manage_sell_order();
       }else{
        $this->manage_pincode();
       }
    }
    
     public function change_theme($val = '') {
        $_SESSION['theme_type'] = $val;
        $this->db->where('staff_id', $_SESSION['staff_id']);
        $this->db->update('mst_staff', array('theme_type' => $val));
        echo 0;
    }

    public function signOut() {
        $this->session->unset_userdata('staff_id');
        $this->session->unset_userdata('staff_type');
        $this->session->unset_userdata('staff_username');
//        $this->session->sess_destroy();
        redirect(base_url() . 'admin_login');
    }

    public function change_password() {
        $this->db->where('staff_id', $_SESSION['staff_id']);

        $res = $this->db->update('mst_staff', array('staff_password' => $_POST['a_password']));
        redirect('admin/signOut');
    }
   
    
    //pincode
    public function manage_pincode() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_pincode';
        $config['total_rows'] = $this->ccm->get_all_count('mst_pincode', 'pincode_code', '', 'pincode_code');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = "<li class = 'page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Pincode';
        $data['title'] = 'List Pincode';
        $data['Pincodes'] = $this->ccm->get_all_data('mst_pincode', 10, 'pincode_code', '', 'pincode_code');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_pincode/manage_pincode";
        $this->load->view('admin/layout', $data);
    }

    public function active_pincode($id, $status) {
        $data["active"] = $status;
        $this->db->where('pincode_id', $id);
        if ($this->db->update("mst_pincode", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Pincode Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Pincode Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Pincode did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_pincode($id) {
        $data["active"] = '2';
        $this->db->where('pincode_id', $id);
        $res = $this->db->update("mst_pincode", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Pincode Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Pincode did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_pincode() {

        if ($_POST) {

            $data = array(
                'pincode_code' => $this->input->post('pincode_code'),
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['pincode_id'] != '') {
                $this->db->where('pincode_id', $_POST['pincode_id']);
                $res = $this->db->update('mst_pincode', $data);
                $msg = 'Pincode Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_pincode', array('pincode_code' => $this->input->post('pincode_code'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Pincode Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_pincode', $data);
                $msg = 'Pincode Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Pincode Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function pincode_form($id = '') {
        $data['current_page'] = 'Pincode';

        if ($id != '') {
            $data['title'] = 'Edit Pincode';
            $data['pincode'] = $this->ccm->get_single_row('mst_pincode', array('pincode_id' => $id));
        } else {
            $data['title'] = 'Add Pincode';
        }
        $data['viewfile'] = 'admin/manage_pincode/pincode_form';
        $this->load->view('admin/layout', $data);
    }

    //brand
    public function manage_brand() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_brand';
        $config['total_rows'] = $this->ccm->get_all_count('mst_brand', 'brand_name', '', 'brand_name');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = "<li class = 'page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Brand';
        $data['title'] = 'List Brand';
        $data['Brands'] = $this->ccm->get_all_data('mst_brand', 10, 'brand_name', '', 'brand_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_brand/manage_brand";
        $this->load->view('admin/layout', $data);
    }

    public function active_brand($id, $status) {
        $data["active"] = $status;
        $this->db->where('brand_id', $id);
        if ($this->db->update("mst_brand", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Brand Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Brand Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Brand did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function set_on_home_brand($id, $status) {
        $data["set_on_home"] = $status;
        $this->db->where('brand_id', $id);
        if ($this->db->update("mst_brand", $data)) {
            if ($status == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Brand added to Home...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Brand removed from Home...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Brand did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_brand($id) {
        $data["active"] = '2';
        $this->db->where('brand_id', $id);
        $res = $this->db->update("mst_brand", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Brand Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Brand did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_brand() {

        if ($_POST) {

            $user_image = '';
            if ($_FILES) {
                $config['upload_path'] = realpath('./assets/uploads/brand/');
                $config['allowed_types'] = '*';
                $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['brand_image']['name']);
                $config['file_name'] = $image1;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('brand_image')) {
                    $messge = $this->upload->display_errors();
                    if ($messge != '<p>You did not select a file to upload.</p>') {
                        $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                        echo json_encode($data);
                        exit;
                    }
                } else {
                    $user_image = $image1;
                }
                unset($this->upload);
            }
            $data = array(
                'brand_name' => $this->input->post('brand_name'),
                'brand_desc' => $this->input->post('brand_desc'),
                'brand_url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('brand_name')),
                'brand_image' => $user_image,
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['brand_id'] != '') {
                $this->db->where('brand_id', $_POST['brand_id']);
                $res = $this->db->update('mst_brand', $data);
                $msg = 'Brand Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_brand', array('brand_name' => $this->input->post('brand_name'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Brand Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_brand', $data);
                $msg = 'Brand Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Brand Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function brand_form($id = '') {
        $data['current_page'] = 'Brand';

        if ($id != '') {
            $data['title'] = 'Edit Brand';
            $data['brand'] = $this->ccm->get_single_row('mst_brand', array('brand_id' => $id));
        } else {
            $data['title'] = 'Add Brand';
        }
        $data['viewfile'] = 'admin/manage_brand/brand_form';
        $this->load->view('admin/layout', $data);
    }

    //variant
    public function manage_variant() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_variant';
        $config['total_rows'] = $this->ccm->get_all_count('mst_variant', 'variant_name', '', 'variant_code');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = "<li class = 'page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Variant';
        $data['title'] = 'List Variant';
        $data['Variants'] = $this->ccm->get_all_data('mst_variant', 10, 'variant_name', '', 'variant_code');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_variant/manage_variant";
        $this->load->view('admin/layout', $data);
    }

    public function active_variant($id, $status) {
        $data["active"] = $status;
        $this->db->where('variant_id', $id);
        if ($this->db->update("mst_variant", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Variant Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Variant Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Variant did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_variant($id) {
        $data["active"] = '2';
        $this->db->where('variant_id', $id);
        $res = $this->db->update("mst_variant", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Variant Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Variant did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_variant() {

        if ($_POST) {
            if(empty($_POST['ram'])){
                $url = '';
                $ramv= $this->input->post('rom').' '.$this->input->post('type');
            }else{
                $url = $this->input->post('ram').' '.$this->input->post('type').'-';
                $ramv= $this->input->post('ram').' '.$this->input->post('type').'/'.$this->input->post('rom').' '.$this->input->post('type');
            }
            $data = array(
                'variant_name' => $ramv,
                'ram' => $this->input->post('ram'),
                'rom' => $this->input->post('rom'),
                'type' => $this->input->post('type'),
                'variant_url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $url.$this->input->post('rom').' '.$this->input->post('type')),
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['variant_id'] != '') {
                $this->db->where('variant_id', $_POST['variant_id']);
                $res = $this->db->update('mst_variant', $data);
                $msg = 'Variant Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_variant', array('variant_url' => $data['variant_url'])) != 0) {
                    $data = array('type' => 'error', 'message' => 'Variant Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_variant', $data);
                $msg = 'Variant Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Variant Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function variant_form($id = '') {
        $data['current_page'] = 'Variant';

        if ($id != '') {
            $data['title'] = 'Edit Variant';
            $data['variant'] = $this->ccm->get_single_row('mst_variant', array('variant_id' => $id));
        } else {
            $data['title'] = 'Add Variant';
        }
        $data['viewfile'] = 'admin/manage_variant/variant_form';
        $this->load->view('admin/layout', $data);
    }

    //model
    public function manage_model() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_model';
        $config['total_rows'] = $this->ccm->get_all_count('mst_model', 'm_name', '', 'm_name');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = "<li class = 'page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Model';
        $data['title'] = 'List Model';
        $data['Models'] = $this->ccm->get_all_data('mst_model', 10, 'm_name', '', 'm_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_model/manage_model";
        $this->load->view('admin/layout', $data);
    }

    public function active_model($id, $status) {
        $data["active"] = $status;
        $this->db->where('m_id', $id);
        if ($this->db->update("mst_model", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Model Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Model Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Model did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function set_on_home_model($id, $status) {
        $data["set_on_home"] = $status;
        $this->db->where('m_id', $id);
        if ($this->db->update("mst_model", $data)) {
            if ($status == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Model added to Home...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Model removed from Home...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Model did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_model($id) {
        $data["active"] = '2';
        $this->db->where('m_id', $id);
        $res = $this->db->update("mst_model", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Model Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Model did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_model() {

        if ($_POST) {

            $user_image = '';
            if ($_FILES) {
                $config['upload_path'] = realpath('./assets/uploads/model/');
                $config['allowed_types'] = '*';
                $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['m_image']['name']);
                $config['file_name'] = $image1;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('m_image')) {
                    $messge = $this->upload->display_errors();
                    if ($messge != '<p>You did not select a file to upload.</p>') {
                        $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                        echo json_encode($data);
                        exit;
                    }
                } else {
                    $user_image = $image1;
                }
                unset($this->upload);
            }
            $data = array(
                'm_brand_id' => $this->input->post('m_brand_id'),
                'm_name' => $this->input->post('m_name'),
                'm_desc' => $this->input->post('m_desc'),
                'm_url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('m_name')),
                'm_image' => $user_image,
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['m_id'] != '') {
                $this->db->where('m_id', $_POST['m_id']);
                $res = $this->db->update('mst_model', $data);
                $msg = 'Model Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_model', array('m_name' => $this->input->post('m_name'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Model Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_model', $data);
                $msg = 'Model Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Model Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function model_form($id = '') {
        $data['brands'] = $this->ccm->get_all_selected_by_condition2('mst_brand', array('active' => 1));
        $data['current_page'] = 'Model';

        if ($id != '') {
            $data['title'] = 'Edit Model';
            $data['model'] = $this->ccm->get_single_row('mst_model', array('m_id' => $id));
        } else {
            $data['title'] = 'Add Model';
        }
        $data['viewfile'] = 'admin/manage_model/model_form';
        $this->load->view('admin/layout', $data);
    }

    //product
    public function manage_product() {

        $where='';
        $type = @$_REQUEST['brand_id'];
        if($type=='All'){
           redirect(base_url() . 'admin/manage_product');
        }
        if($type){
           $where =  "and brand_id=\"".$type."\" ";
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_product';
        $config['total_rows'] = $this->ccm->get_all_count('mst_product', 'p_id', '', 'p_id',$where);
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['nup_tag_open'] = "<li class = 'page-item'>";
        $config['nup_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Product';
        $data['title'] = 'List Product';
        $data['Products'] = $this->ccm->get_all_data('mst_product', 10, 'p_id', '', 'p_url',$where);
        $data['brands'] = $this->ccm->get_all_selected_by_condition2('mst_brand', array('active' => 1));
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_product/manage_product";
        $this->load->view('admin/layout', $data);
    }

    public function active_product($id, $status) {
        $data["active"] = $status;
        $this->db->where('p_id', $id);
        if ($this->db->update("mst_product", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Product Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Product Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Product did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function set_on_home_product($id, $status) {
        $data["set_on_home"] = $status;
        $this->db->where('p_id', $id);
        if ($this->db->update("mst_product", $data)) {
            if ($status == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Product added to Home...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Product removed from Home...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Product did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_product($id) {
        $data["active"] = '2';
        $this->db->where('p_id', $id);
        $res = $this->db->update("mst_product", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Product Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Product did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_product() {

        if ($_POST) {
            
            $variant = $this->ccm->get_single_row('mst_variant', array('variant_id' => $this->input->post('p_variant_id')));
            $model = $this->ccm->get_single_row('mst_model', array('m_id' => $this->input->post('p_m_id')));
            $data = array(
                'p_price' => $this->input->post('p_price'),
                'p_variant_id' => $this->input->post('p_variant_id'),
                'p_m_id' => $this->input->post('p_m_id'),
                'p_url' => $model->m_url . "-" . $variant->variant_url,
                'brand_id' => $this->input->post('brand_id'),
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            $p_id = 0;
            if ($_POST['p_id'] != '') {
                $p_id = $_POST['p_id'];
                $this->db->where('p_id', $_POST['p_id']);
                $res = $this->db->update('mst_product', $data);
                $msg = 'Product Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_product', array('p_url' => $data['p_url'])) != 0) {
                    $data = array('type' => 'error', 'message' => 'Model with same variant already exists Please add another product...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_product', $data);
                $p_id = $this->db->insert_id();
                $msg = 'Product Added Successfully..!';
            }

            //insert tells us ,screen defect,question,accessories,ages entry in table
            if ($res == 1) {

                 //tell us 
                 $p_tellus_id = $_POST['p_tellus_id'];
                 $p_tellus_percent_value = $_POST['p_tellus_percent_value'];
                 $p_tellus_rs_value = $_POST['p_tellus_rs_value'];
                 for ($i = 0; $i < count($p_tellus_id); $i++) {
                     $dt = array(
                         'prod_id' => $p_id,
                         'tuq_id' => $p_tellus_id[$i]
                     );
                     $dt2 = array(
                         'tu_type' => ($p_tellus_rs_value[$i] != '') ? 2 : ($p_tellus_percent_value[$i] != '' ? 1 : 0),
                         'tu_value' => ($p_tellus_rs_value[$i] != '') ? $p_tellus_rs_value[$i] : ($p_tellus_percent_value[$i] != '' ? $p_tellus_percent_value[$i] : '')
                     );
 //                    if ($dt2['tu_type'] != 0) {
                     if ($this->ccm->get_row_count('mst_tell_us_question', $dt) == 0) {
                         $dt = array_merge($dt, $dt2);
                         $this->db->insert('mst_tell_us_question', $dt);
                     } else {
                         $this->db->where($dt);
                         $this->db->update('mst_tell_us_question', $dt2);
                     }
 //                    }
                 }

                   //screen Defect
                   $p_screen_defect_id = $_POST['p_screen_defect_id'];
                   $p_screen_defect_percent_value = $_POST['p_screen_defect_percent_value'];
                   $p_screen_defect_rs_value = $_POST['p_screen_defect_rs_value'];
                   for ($i = 0; $i < count($p_screen_defect_id); $i++) {
                       $dt = array(
                           'prod_id' => $p_id,
                           'sq_id' => $p_screen_defect_id[$i]
                       );
                       $dt2 = array(
                           'sq_type' => ($p_screen_defect_rs_value[$i] != '') ? 2 : ($p_screen_defect_percent_value[$i] != '' ? 1 : 0),
                           'sq_value' => ($p_screen_defect_rs_value[$i] != '') ? $p_screen_defect_rs_value[$i] : ($p_screen_defect_percent_value[$i] != '' ? $p_screen_defect_percent_value[$i] : '')
                       );
   //                    if ($dt2['sq_type'] != 0) {
                       if ($this->ccm->get_row_count('mst_screen_question', $dt) == 0) {
                           $dt = array_merge($dt, $dt2);
                           $this->db->insert('mst_screen_question', $dt);
                       } else {
                           $this->db->where($dt);
                           $this->db->update('mst_screen_question', $dt2);
                       }
   //                    }
                   }

                     //Body Defect
                     $p_body_defects_id = $_POST['p_body_defects_id'];
                     $p_body_defects_percent_value = $_POST['p_body_defects_percent_value'];
                     $p_body_defects_rs_value = $_POST['p_body_defects_rs_value'];
                     for ($i = 0; $i < count($p_body_defects_id); $i++) {
                         $dt = array(
                             'prod_id' => $p_id,
                             'bd_id' => $p_body_defects_id[$i]
                         );
                         $dt2 = array(
                             'bd_type' => ($p_body_defects_rs_value[$i] != '') ? 2 : ($p_body_defects_percent_value[$i] != '' ? 1 : 0),
                             'bd_value' => ($p_body_defects_rs_value[$i] != '') ? $p_body_defects_rs_value[$i] : ($p_body_defects_percent_value[$i] != '' ? $p_body_defects_percent_value[$i] : '')
                         );
     //                    if ($dt2['bd_type'] != 0) {
                         if ($this->ccm->get_row_count('mst_body_defects_question', $dt) == 0) {
                             $dt = array_merge($dt, $dt2);
                             $this->db->insert('mst_body_defects_question', $dt);
                         } else {
                             $this->db->where($dt);
                             $this->db->update('mst_body_defects_question', $dt2);
                         }
     //                    }
                     }
                //question
                $p_question_id = $_POST['p_question_id'];
                $p_question_percent_value = $_POST['p_question_percent_value'];
                $p_question_rs_value = $_POST['p_question_rs_value'];
                for ($i = 0; $i < count($p_question_id); $i++) {
                    $dt = array(
                        'pq_p_id' => $p_id,
                        'pq_q_id' => $p_question_id[$i]
                    );
                    $dt2 = array(
                        'pq_type' => ($p_question_rs_value[$i] != '') ? 2 : ($p_question_percent_value[$i] != '' ? 1 : 0),
                        'pq_value' => ($p_question_rs_value[$i] != '') ? $p_question_rs_value[$i] : ($p_question_percent_value[$i] != '' ? $p_question_percent_value[$i] : '')
                    );
//                    if ($dt2['pq_type'] != 0) {
                    if ($this->ccm->get_row_count('mst_product_question', $dt) == 0) {
                        $dt = array_merge($dt, $dt2);
                        $this->db->insert('mst_product_question', $dt);
                    } else {
                        $this->db->where($dt);
                        $this->db->update('mst_product_question', $dt2);
                    }
//                    }
                }
                //accessories
                $p_accessories_id = $_POST['p_accessories_id'];
                $p_accessories_percent_value = $_POST['p_accessories_percent_value'];
                $p_accessories_rs_value = $_POST['p_accessories_rs_value'];
                for ($i = 0; $i < count($p_accessories_id); $i++) {
                    $dt = array(
                        'pa_p_id' => $p_id,
                        'pa_a_id' => $p_accessories_id[$i]
                    );
                    $dt2 = array(
                        'pa_type' => ($p_accessories_rs_value[$i] != '') ? 2 : ($p_accessories_percent_value[$i] != '' ? 1 : 0),
                        'pa_value' => ($p_accessories_rs_value[$i] != '') ? $p_accessories_rs_value[$i] : ($p_accessories_percent_value[$i] != '' ? $p_accessories_percent_value[$i] : 0)
                    );
//                    if ($dt2['pa_type'] != 0) {
                    if ($this->ccm->get_row_count('mst_product_accessories', $dt) == 0) {
                        $dt = array_merge($dt, $dt2);
                        $this->db->insert('mst_product_accessories', $dt);
                    } else {
                        $this->db->where($dt);
                        $this->db->update('mst_product_accessories', $dt2);
                    }
//                    }
                }
                //age
                $p_age_id = $_POST['p_age_id'];
                $p_age_percent_value = $_POST['p_age_percent_value'];
                $p_age_rs_value = $_POST['p_age_rs_value'];

                for ($i = 0; $i < count($p_age_id); $i++) {
                    $dt = array(
                        'page_p_id' => $p_id,
                        'page_age_id' => $p_age_id[$i]
                    );
                    $dt2 = array(
                        'page_type' => ($p_age_rs_value[$i] != '') ? 2 : ($p_age_percent_value[$i] != '' ? 1 : 0),
                        'page_value' => ($p_age_rs_value[$i] == '') ? ($p_age_percent_value[$i] != '' ? $p_age_percent_value[$i] : 0) : $p_age_rs_value[$i]
                    );
//                    if ($dt2['page_type'] != 0) {
                    if ($this->ccm->get_row_count('mst_product_age', $dt) == 0) {
                        $dt = array_merge($dt2, $dt);
                        $this->db->insert('mst_product_age', $dt);
                    } else {
                        $this->db->where($dt);
                        $this->db->update('mst_product_age', $dt2);
                    }
//                    }
                }
            }

            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Product Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function product_form($id = '') {
        $data['brands'] = $this->ccm->get_all_selected_by_condition2('mst_brand', array('active' => 1));
        $data['variants'] = $this->ccm->get_all_selected_by_condition2('mst_variant', array('active' => 1));
        $data['models'] = $this->ccm->get_all_selected_by_condition2('mst_model', array('active' => 1));
        $data['tellus'] = $this->ccm->get_all_selected_by_condition2('tellus_qustion', array('active' => 1,'id'=>1));
        $data['screen_defect'] = $this->ccm->get_all_selected_by_condition2('screen_condition_qsn', array('active' => 1));
        $data['body_defect'] = $this->ccm->get_all_selected_by_condition2('body_defects_qsn', array('active' => 1));
        $data['questions'] = $this->ccm->get_all_selected_by_condition2('mst_question', array('active' => 1));
        $data['accessories'] = $this->ccm->get_all_selected_by_condition2('mst_accessories', array('active' => 1, 'a_id !=' => 0));
        $data['ages'] = $this->ccm->get_all_selected_by_condition2('mst_age', array('active' => 1));
        $data['current_page'] = 'Product';
        if ($id != '') {
            $data['title'] = 'Edit Product';
            $data['product'] = $this->ccm->get_single_row('mst_product', array('p_id' => $id));
        } else {
            $data['title'] = 'Add Product';
        }
        $data['viewfile'] = 'admin/manage_product/product_form';
        $this->load->view('admin/layout', $data);
    }

    public function product_view($id = '') {
        $data['brands'] = $this->ccm->get_all_selected_by_condition2('mst_brand', array('active' => 1));
        $data['variants'] = $this->ccm->get_all_selected_by_condition2('mst_variant', array('active' => 1));
        $data['models'] = $this->ccm->get_all_selected_by_condition2('mst_model', array('active' => 1));
        $data['tellus'] = $this->ccm->get_all_selected_by_condition2('tellus_qustion', array('active' => 1,'id'=>1));
        $data['screen_defect'] = $this->ccm->get_all_selected_by_condition2('screen_condition_qsn', array('active' => 1));
        $data['body_defect'] = $this->ccm->get_all_selected_by_condition2('body_defects_qsn', array('active' => 1));
        $data['questions'] = $this->ccm->get_all_selected_by_condition2('mst_question', array('active' => 1));
        $data['accessories'] = $this->ccm->get_all_selected_by_condition2('mst_accessories', array('active' => 1, 'a_id !=' => 0));
        $data['ages'] = $this->ccm->get_all_selected_by_condition2('mst_age', array('active' => 1));
        $data['current_page'] = 'Product';
        if ($id != '') {
            $data['title'] = 'View Product';
            $data['product'] = $this->ccm->get_single_row('mst_product', array('p_id' => $id));
        } else {
            $data['title'] = 'Add Product';
        }
        $data['viewfile'] = 'admin/manage_product/product_view';
        $this->load->view('admin/layout', $data);
    }

    //question
    public function manage_question() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_question';
        $config['total_rows'] = $this->ccm->get_all_count('mst_question', 'q_title', '', 'q_title');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['nuq_tag_open'] = "<li class = 'page-item'>";
        $config['nuq_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Question';
        $data['title'] = 'List Question';
        $data['Questions'] = $this->ccm->get_all_data('mst_question', 10, 'q_title', '', 'q_title');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_question/manage_question";
        $this->load->view('admin/layout', $data);
    }

    public function active_question($id, $status) {
        $data["active"] = $status;
        $this->db->where('q_id', $id);
        if ($this->db->update("mst_question", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_question($id) {
        $data["active"] = '2';
        $this->db->where('q_id', $id);
        $res = $this->db->update("mst_question", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Question Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_question() {

        if ($_POST) {

            $user_image = '';
            if ($_FILES) {
                $config['upload_path'] = realpath('./assets/uploads/question/');
                $config['allowed_types'] = '*';
                $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['q_image']['name']);
                $config['file_name'] = $image1;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('q_image')) {
                    $messge = $this->upload->display_errors();
                    if ($messge != '<p>You did not select a file to upload.</p>') {
                        $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                        echo json_encode($data);
                        exit;
                    }
                } else {
                    $user_image = $image1;
                }
                unset($this->upload);
            }
            $data = array(
                'q_title' => $this->input->post('q_title'),
                'q_url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('q_title')),
            );
            if ($user_image != '')
                $data['q_image'] = $user_image;
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['q_id'] != '') {
                $this->db->where('q_id', $_POST['q_id']);
                $res = $this->db->update('mst_question', $data);
                $msg = 'Question Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_question', array('q_title' => $this->input->post('q_title'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Question Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_question', $data);
                $msg = 'Question Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Question Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function question_form($id = '') {
        $data['current_page'] = 'Questions';

        if ($id != '') {
            $data['title'] = 'Edit Question';
            $data['question'] = $this->ccm->get_single_row('mst_question', array('q_id' => $id));
        } else {
            $data['title'] = 'Add Question';
        }
        $data['viewfile'] = 'admin/manage_question/question_form';
        $this->load->view('admin/layout', $data);
    }

    //accessories
    public function manage_accessories() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_accessories';
        $config['total_rows'] = $this->ccm->get_all_count('mst_accessories', 'a_title', '', 'a_title');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['nua_tag_open'] = "<li class = 'page-item'>";
        $config['nua_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Accessories';
        $data['title'] = 'List Accessories';
        $data['Accessoriess'] = $this->ccm->get_all_data('mst_accessories', 10, 'a_title', '', 'a_title');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_accessories/manage_accessories";
        $this->load->view('admin/layout', $data);
    }

    public function active_accessories($id, $status) {
        $data["active"] = $status;
        $this->db->where('a_id', $id);
        if ($this->db->update("mst_accessories", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Accessories Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Accessories Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Accessories did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_accessories($id) {
        $data["active"] = '2';
        $this->db->where('a_id', $id);
        $res = $this->db->update("mst_accessories", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Accessories Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Accessories did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_accessories() {

        if ($_POST) {

            $user_image = '';
            if ($_FILES) {
                $config['upload_path'] = realpath('./assets/uploads/accessories/');
                $config['allowed_types'] = '*';
                $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['a_image']['name']);
                $config['file_name'] = $image1;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('a_image')) {
                    $messge = $this->upload->display_errors();
                    if ($messge != '<p>You did not select a file to upload.</p>') {
                        $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                        echo json_encode($data);
                        exit;
                    }
                } else {
                    $user_image = $image1;
                }
                unset($this->upload);
            }
            $data = array(
                'a_title' => $this->input->post('a_title'),
                'a_url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('a_title')),
            );
            if ($user_image != '')
                $data['a_image'] = $user_image;
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['a_id'] != '') {
                $this->db->where('a_id', $_POST['a_id']);
                $res = $this->db->update('mst_accessories', $data);
                $msg = 'Accessories Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_accessories', array('a_title' => $this->input->post('a_title'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Accessories Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_accessories', $data);
                $msg = 'Accessories Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Accessories Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function accessories_form($id = '') {
        $data['current_page'] = 'Accessories';

        if ($id != '') {
            $data['title'] = 'Edit Accessorie';
            $data['accessories'] = $this->ccm->get_single_row('mst_accessories', array('a_id' => $id));
        } else {
            $data['title'] = 'Add Accessories';
        }
        $data['viewfile'] = 'admin/manage_accessories/accessories_form';
        $this->load->view('admin/layout', $data);
    }

    //question_category
    public function manage_question_category() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_question_category';
        $config['total_rows'] = $this->ccm->get_all_count('mst_question_category', 'qc_name', '', 'qc_name');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['nuqc_tag_open'] = "<li class = 'page-item'>";
        $config['nuqc_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Question_Category';
        $data['title'] = 'List Question_Category';
        $data['Question_Categorys'] = $this->ccm->get_all_data('mst_question_category', 10, 'qc_name', '', 'qc_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_question_category/manage_question_category";
        $this->load->view('admin/layout', $data);
    }

    public function active_question_category($id, $status) {
        $data["active"] = $status;
        $this->db->where('qc_id', $id);
        if ($this->db->update("mst_question_category", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Category Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Category Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Question Category did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_question_category($id) {
        $data["active"] = '2';
        $this->db->where('qc_id', $id);
        $res = $this->db->update("mst_question_category", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Question Category Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Question Category did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_question_category() {

        if ($_POST) {

            $user_image = '';
            if ($_FILES) {
                $config['upload_path'] = realpath('./assets/uploads/question_category/');
                $config['allowed_types'] = '*';
                $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['qc_option_image']['name']);
                $config['file_name'] = $image1;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('qc_option_image')) {
                    $messge = $this->upload->display_errors();
                    if ($messge != '<p>You did not select a file to upload.</p>') {
                        $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                        echo json_encode($data);
                        exit;
                    }
                } else {
                    $user_image = $image1;
                }
                unset($this->upload);
            }
            $data = array(
                'qc_name' => $this->input->post('qc_name'),
                'qc_q_id' => implode(",", $this->input->post('qc_q_id')),
                'qc_option_title' => $this->input->post('qc_option_title'),
                'qc_option_decrement_type' => $this->input->post('qc_option_decrement_type'),
                'qc_optiin_decrement_value' => $this->input->post('qc_optiin_decrement_value'),
                'qc_url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('qc_name')),
            );
            if ($user_image != '')
                $data['qc_option_image'] = $user_image;
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['qc_id'] != '') {
                $this->db->where('qc_id', $_POST['qc_id']);
                $res = $this->db->update('mst_question_category', $data);
                $msg = 'Question Category Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_question_category', array('qc_name' => $this->input->post('qc_name'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Question_Category Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_question_category', $data);
                $msg = 'Question_Category Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Question Category Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function question_category_form($id = '') {
        $data['questions'] = $this->ccm->get_all_selected_by_condition2('mst_question', array('active' => 1, 'q_id <' => 4));
        $data['current_page'] = 'Question_Categorys';

        if ($id != '') {
            $data['title'] = 'Edit Question_Category';
            $data['question_category'] = $this->ccm->get_single_row('mst_question_category', array('qc_id' => $id));
        } else {
            $data['title'] = 'Add Question_Category';
        }
        $data['viewfile'] = 'admin/manage_question_category/question_category_form';
        $this->load->view('admin/layout', $data);
    }

    //slider
    public function manage_slider() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_slider';
        $config['total_rows'] = $this->ccm->get_all_count('mst_slider', 'slider_title', '', 'slider_title');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = "<li class = 'page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Slider';
        $data['title'] = 'List Slider';
        $data['Sliders'] = $this->ccm->get_all_data('mst_slider', 10, 'slider_title', '', 'slider_title');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_slider/manage_slider";
        $this->load->view('admin/layout', $data);
    }

    public function active_slider($id, $status) {
        $data["active"] = $status;
        $this->db->where('slider_id', $id);
        if ($this->db->update("mst_slider", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Slider Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Slider Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Slider did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_slider($id) {
        $data["active"] = '2';
        $this->db->where('slider_id', $id);
        $res = $this->db->update("mst_slider", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Slider Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Slider did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_slider() {

        if ($_POST) {

            $user_image = '';
            if ($_FILES) {
                $config['upload_path'] = realpath('./admin_assets/uploads/slider/');
                $config['allowed_types'] = '*';
                $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['slider_image']['name']);
                $config['file_name'] = $image1;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('slider_image')) {
                    $messge = $this->upload->display_errors();
                    if ($messge != '<p>You did not select a file to upload.</p>') {
                        $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                        echo json_encode($data);
                        exit;
                    }
                } else {
                    $user_image = $image1;
                }
                unset($this->upload);
            }
            $data = array(
                'slider_title' => $this->input->post('slider_title'),
                'slider_image' => $user_image,
                'four_word' => $this->input->post('four_word'),
                'back_color' => $this->input->post('back_color'),
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['slider_id'] != '') {
                $this->db->where('slider_id', $_POST['slider_id']);
                $res = $this->db->update('mst_slider', $data);
                $msg = 'Slider Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_slider', array('slider_title' => $this->input->post('slider_title'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Slider Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_slider', $data);
                $msg = 'Slider Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Slider Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function slider_form($id = '') {
        $data['current_page'] = 'Slider';

        if ($id != '') {
            $data['title'] = 'Edit Slider';
            $data['slider'] = $this->ccm->get_single_row('mst_slider', array('slider_id' => $id));
        } else {
            $data['title'] = 'Add Slider';
        }
        $data['viewfile'] = 'admin/manage_slider/slider_form';
        $this->load->view('admin/layout', $data);
    }

    //age
    public function manage_age() {

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_age';
        $config['total_rows'] = $this->ccm->get_all_count('mst_age', 'age_id', '', 'age_title');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = "<li class = 'page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Age';
        $data['title'] = 'List Age';
        $data['Ages'] = $this->ccm->get_all_data('mst_age', 10, 'age_id', '', 'age_title');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_age/manage_age";
        $this->load->view('admin/layout', $data);
    }

    public function active_age($id, $status) {
        $data["active"] = $status;
        $this->db->where('age_id', $id);
        if ($this->db->update("mst_age", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Age Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Age Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Age did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_age($id) {
        $data["active"] = '2';
        $this->db->where('age_id', $id);
        $res = $this->db->update("mst_age", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Age Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Age did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_age() {

        if ($_POST) {

            $data = array(
                'age_title' => $this->input->post('age_title'),
                'age_url' => preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('age_title')),
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            if ($_POST['age_id'] != '') {
                $this->db->where('age_id', $_POST['age_id']);
                $res = $this->db->update('mst_age', $data);
                $msg = 'Age Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_age', array('age_title' => $this->input->post('age_title'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Age Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_age', $data);
                $msg = 'Age Added Successfully..!';
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Age Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function age_form($id = '') {
        $data['current_page'] = 'Age';

        if ($id != '') {
            $data['title'] = 'Edit Age';
            $data['age'] = $this->ccm->get_single_row('mst_age', array('age_id' => $id));
        } else {
            $data['title'] = 'Add Age';
        }
        $data['viewfile'] = 'admin/manage_age/age_form';
        $this->load->view('admin/layout', $data);
    }

    //executive
    public function manage_executive() {
        $where = ' and staff_type=1';
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/manage_executive';
        $config['total_rows'] = $this->ccm->get_all_count('mst_staff', 'staff_username', '', 'staff_username');
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
        $config['full_tag_close'] = '</ul>';
        $config['nue_tag_open'] = "<li class = 'page-item'>";
        $config['nue_tag_close'] = "</li>";
        $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
        $config['cur_tag_close'] = "</a></li>";
        $config['attributes'] = array('class' => 'page-link');
        $config['first_tag_open'] = '<div class="first">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="next">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="prev">';
        $config['prev_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['current_page'] = 'Executive';
        $data['title'] = 'List Executive';
        $data['Executives'] = $this->ccm->get_all_data('mst_staff', 10, 'staff_username', '', 'staff_username',$where);
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
        $data['viewfile'] = "admin/manage_executive/manage_executive";
        $this->load->view('admin/layout', $data);
    }

    public function active_executive($id, $status) {
        $data["active"] = $status;
        $this->db->where('staff_id', $id);
        if ($this->db->update("mst_staff", $data)) {
            if ($status == 0) {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Executive Deactivated...!');
            } else {
                $message = array('success' => '1', 'type' => 'success', 'message' => 'Executive Activated...!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Executive did not updated please try after some time..!');
        }
        echo json_encode($message);
    }

    public function delete_executive($id) {
        $data["active"] = '2';
        $this->db->where('staff_id', $id);
        $res = $this->db->update("mst_staff", $data);
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'error', 'message' => 'Executive Deleted Successfully...!');
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Executive did not deleted please try after some time..!');
        }
        echo json_encode($message);
    }

    public function submit_executive() {


        if ($_POST) {

//            $user_image = '';
//            if ($_FILES) {
//                $config['upload_path'] = realpath('./assets/uploads/executive/');
//                $config['allowed_types'] = '*';
//                $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['e_image']['name']);
//                $config['file_name'] = $image1;
//                $this->upload->initialize($config);
//                if (!$this->upload->do_upload('e_image')) {
//                    $messge = $this->upload->display_errors();
//                    if ($messge != '<p>You did not select a file to upload.</p>') {
//                        $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
//                        echo json_encode($data);
//                        exit;
//                    }
//                } else {
//                    $user_image = $image1;
//                }
//                unset($this->upload);
//            }
            $data = array(
                'staff_fullname' => $this->input->post('e_fullname'),
                'staff_username' => $this->input->post('e_username'),
                'staff_password' => $this->input->post('e_password'),
                'staff_address' => $this->input->post('e_address'),
                'staff_type' => 1,
//                'e_image' => $user_image,
            );
            $data = array_filter($data);
            $data = $this->security->xss_clean($data);
            $e_id = 0;
            if ($_POST['e_id'] != '') {
                $e_id = $_POST['e_id'];
                $this->db->where('staff_id', $_POST['e_id']);
                $res = $this->db->update('mst_staff', $data);
                $msg = 'Executive Updated Successfully..!';
            } else {
                if ($this->ccm->get_row_count('mst_staff', array('staff_username' => $this->input->post('e_username'))) != 0) {
                    $data = array('type' => 'error', 'message' => 'Executive Name already exists Please change it...!', 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
                $res = $this->db->insert('mst_staff', $data);
                $msg = 'Executive Added Successfully..!';
                $e_id = $this->db->insert_id();
            }
            if ($res == 1) {
                //submit pincodes
                $this->db->where('ep_e_id', $e_id);
                $this->db->delete('mst_executive_pincode');
                
                $e_pincodes_id = $_POST['e_pincodes_id'];
                for ($i = 0; $i < count($e_pincodes_id); $i++) {
                    $dt = array(
                        'ep_e_id' => $e_id,
                        'ep_pincode_id' => $e_pincodes_id[$i]
                    );
                    if ($this->ccm->get_row_count('mst_executive_pincode', $dt) == 0) {
                        $this->db->insert('mst_executive_pincode', $dt);
                    }
                }
            }
            if ($res == 1) {
                $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
                $this->session->set_flashdata('response_message', $message);
            } else {
                $message = array('success' => '0', 'type' => 'error', 'message' => 'Executive Didnt Added, Please try after some time..!');
            }
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
        }
        echo json_encode($message);
    }

    public function executive_form($id = '') {
        $data['pincodes'] = $this->ccm->get_all_selected_by_condition2('mst_pincode', array('active' => 1), 'pincode_code');
        $data['current_page'] = 'Executive';

        if ($id != '') {
            $data['title'] = 'Edit Executive';
            $data['executive'] = $this->ccm->get_single_row('mst_staff', array('staff_id' => $id));
        } else {
            $data['title'] = 'Add Executive';
        }
        $data['viewfile'] = 'admin/manage_executive/executive_form';
        $this->load->view('admin/layout', $data);
    }


//Order
public function manage_sell_order() {

    $data['current_page'] = 'Sell Order';
    $data['title'] = 'Sell Order';
    if($_SESSION['staff_type']==1){
        $data['order'] = $this->ccm->get_all_data_sell_order($_SESSION['staff_id']);
    }else{
        $data['order'] = $this->ccm->get_all_data_sell_order();
    }
   
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_sell_order/manage_sell_order";
    $this->load->view('admin/layout', $data);
}

public function order_form($id = ''){
    $data['current_page'] = 'Sell Order';
    if ($id != '') {
        $data['title'] = 'Sell Order';
        $data['order'] = $this->ccm->get_single_sell_order($id);
        $data['pincode'] = $this->db->select("*")->where(['active' => 1])->from('mst_pincode')->get()->result_array();
        $data['feedback'] = $this->db->select("*")->where(['order_id' =>  $data['order']->order_id])->from('rating')->get()->row();
    } else {
        $data['title'] = 'Order';
    }

    $data['viewfile'] = 'admin/manage_sell_order/order_form';
    $this->load->view('admin/layout', $data);
}



public function get_exiutive_bypincode(){ 
    $postData = $this->input->post();
    $data = $this->ccm->get_exicutive_bypin($postData);
    echo json_encode($data); 
  }


  public function submit_order() {
    if ($_POST) {

        if(empty($_POST['order_status'])){
            $sts = 2;
        }else{
            $sts = $_POST['order_status'];
        }

        $data = array(
            'pincode_id' => $this->input->post('pincode_id'),
            'executive_id' => $this->input->post('executive_id'),
            'order_status' => $sts,
            'order_update_date' => date('Y-m-d H:i:s'),
            'updated_by' => $_SESSION['staff_id'],
              
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        $e_id = 0;
        if ($_POST['id'] != '') {
            $e_id = $_POST['id'];
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('mst_sell_order', $data);
            $msg = 'Order Updated Successfully..!';
        } 
       
        if ($res) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Order Didnt Update, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}



 //stores
 public function manage_store() {

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_store';
    $config['total_rows'] = $this->ccm->get_all_count('mst_store', 's_name', '', 's_name');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Stores';
    $data['title'] = 'List Store';
    $data['stores'] = $this->ccm->get_all_data('mst_store', 10, 's_name', '', 's_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_stores/manage_store";
    $this->load->view('admin/layout', $data);
}

public function active_store($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("mst_store", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Store Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Store Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Store did not updated please try after some time..!');
    }
    echo json_encode($message);
}

public function delete_store($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("mst_store", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Store Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Store did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_store() {

    if ($_POST) {

        $data = array(
            'pincode_id' => $this->input->post('pincode_id'),
            'city_id' => $this->input->post('city_id'),
            's_name' => $this->input->post('s_name'),
            's_address' => $this->input->post('s_address'),
            's_phone' => $this->input->post('s_phone'),
            's_email' => $this->input->post('s_email'),
            'map_link' => $this->input->post('map_link'),
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('mst_store', $data);
            $msg = 'Store Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('mst_store', array('s_name' => $this->input->post('s_name'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Store Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('mst_store', $data);
            $msg = 'Store Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Store Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function store_form($id = '') {
    $data['current_page'] = 'Stores';
    $data['pincode'] = $this->db->select("*")->where(['active' => 1])->from('mst_pincode')->get()->result_array();
    $data['city'] = $this->db->select("*")->where(['active' => 1])->from('mst_city')->get()->result_array();
    if ($id != '') {
        $data['title'] = 'Edit Store';
        $data['store'] = $this->ccm->get_single_row('mst_store', array('id' => $id));
       
    } else {
        $data['title'] = 'Add Store';
    }
    
    $data['viewfile'] = 'admin/manage_stores/store_form';
    $this->load->view('admin/layout', $data);
}




//city
public function manage_city() {
    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_city';
    $config['total_rows'] = $this->ccm->get_all_count('mst_city', 'city_name', '', 'city_name');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'City';
    $data['title'] = 'List City';
    $data['Citys'] = $this->ccm->get_all_data('mst_city', 10, 'city_name', '', 'city_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_city/manage_city";
    $this->load->view('admin/layout', $data);
}

public function active_city($id, $status) {
    $data["active"] = $status;
    $this->db->where('city_id', $id);
    if ($this->db->update("mst_city", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'City Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'City Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'City did not updated please try after some time..!');
    }
    echo json_encode($message);
}

public function delete_city($id) {
    $data["active"] = '2';
    $this->db->where('city_id', $id);
    $res = $this->db->update("mst_city", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'City Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'City did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_city() {

    if ($_POST) {

        $data = array(
            'city_name' => $this->input->post('city_name'),
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['city_id'] != '') {
            $this->db->where('city_id', $_POST['city_id']);
            $res = $this->db->update('mst_city', $data);
            $msg = 'City Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('mst_city', array('city_name' => $this->input->post('city_name'))) != 0) {
                $data = array('type' => 'error', 'message' => 'City Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('mst_city', $data);
            $msg = 'City Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'City Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function city_form($id = ''){
    $data['current_page'] = 'City';

    if ($id != '') {
        $data['title'] = 'Edit City';
        $data['city'] = $this->ccm->get_single_row('mst_city', array('city_id' => $id));
    } else {
        $data['title'] = 'Add City';
    }
    $data['viewfile'] = 'admin/manage_city/city_form';
    $this->load->view('admin/layout', $data);
}

 //tell us 
 public function manage_tellus_question() {

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_tellus_question';
    $config['total_rows'] = $this->ccm->get_all_count('tellus_qustion', 'qsn_name', '', 'qsn_name');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Tell Us Questions';
    $data['title'] = 'List Questions';
    $data['Questions'] = $this->ccm->get_all_data('tellus_qustion', 10, 'qsn_name', '', 'qsn_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_tellus_question/manage_tellus_question";
    $this->load->view('admin/layout', $data);
}

public function active_tellus_question($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("tellus_qustion", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not updated please try after some time..!');
    }
    echo json_encode($message);
}

public function delete_tellus_question($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("tellus_qustion", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Question Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_tellus_form() {

    if ($_POST) {
        $data = array(
            'qsn_name' => $this->input->post('qsn_name'),
            'qsn_desc' => $this->input->post('qsn_desc'),
            'yes_checked_value' => $this->input->post('yes_checked_value'),
            'no_checked_value' => $this->input->post('no_checked_value'),
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('tellus_qustion', $data);
            $msg = 'Question Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('tellus_qustion', array('qsn_name' => $this->input->post('qsn_name'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Question Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('tellus_qustion', $data);
            $msg = 'Question Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Question Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function tellus_form($id = '') {
    $data['current_page'] = 'Tell Us Questions';

    if ($id != '') {
        $data['title'] = 'Edit Question';
        $data['question'] = $this->ccm->get_single_row('tellus_qustion', array('id' => $id));
    } else {
        $data['title'] = 'Add question';
    }
    $data['viewfile'] = 'admin/manage_tellus_question/tellus_question_form';
    $this->load->view('admin/layout', $data);
}

  //review
  public function manage_review() {

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_review';
    $config['total_rows'] = $this->ccm->get_all_count('client_review', 'c_name', '', 'c_name');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Review';
    $data['title'] = 'List Review';
    $data['Review'] = $this->ccm->get_all_data('client_review', 10, 'c_name', '', 'c_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_review/manage_review";
    $this->load->view('admin/layout', $data);
}

public function active_review($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("client_review", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Review Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Review Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Review did not updated please try after some time..!');
    }
    echo json_encode($message);
}


public function delete_review($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("client_review", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Review Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Review did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_review() {

    if ($_POST) {

        $user_image = '';
        if ($_FILES) {
            $config['upload_path'] = realpath('./assets/uploads/review/');
            $config['allowed_types'] = '*';
            $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['c_photo']['name']);
            $config['file_name'] = $image1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('c_photo')) {
                $messge = $this->upload->display_errors();
                if ($messge != '<p>You did not select a file to upload.</p>') {
                    $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
            } else {
                $user_image = $image1;
            }
            unset($this->upload);
        }
        $data = array(
            'id' => $this->input->post('id'),
            'c_name' => $this->input->post('c_name'),
            'c_comment' => $this->input->post('c_comment'),
            'c_photo' => $user_image,
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('client_review', $data);
            $msg = 'Review Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('client_review', array('c_name' => $this->input->post('c_name'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Review Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('client_review', $data);
            $msg = 'Review Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Review Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function review_form($id = ''){
    $data['brands'] = $this->ccm->get_all_selected_by_condition2('client_review', array('active' => 1));
    $data['current_page'] = 'Review';

    if ($id != ''){
        $data['title'] = 'Edit Review';
        $data['review'] = $this->ccm->get_single_row('client_review', array('id' => $id));
    } else {
        $data['title'] = 'Add Model';
    }
    $data['viewfile'] = 'admin/manage_review/review_form';
    $this->load->view('admin/layout', $data);
}

//about
public function manage_about() {

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_about';
    $config['total_rows'] = $this->ccm->get_all_count('about', 'about', '', 'about');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'About';
    $data['title'] = 'List About';
    $data['about_data'] = $this->ccm->get_all_data('about', 10, 'about', '', 'about');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_about/manage_about";
    $this->load->view('admin/layout', $data);
}

public function active_about($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("about", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'did not updated please try after some time..!');
    }
    echo json_encode($message);
}


public function delete_about($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("about", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_about() {

    if ($_POST) {

        $data = array(
            'id' => $this->input->post('id'),
            'about' => $this->input->post('about'),
            
        );
        $data = array_filter($data);
       // $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('about', $data);
            $msg = 'Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('about', array('about' => $this->input->post('about'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Review Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('about', $data);
            $msg = 'Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function about_form($id = ''){
    $data['about_data'] = $this->ccm->get_all_selected_by_condition2('about', array('active' => 1));
    $data['current_page'] = 'about';

    if ($id != ''){
        $data['title'] = 'Edit About';
        $data['about_data'] = $this->ccm->get_single_row('about', array('id' => $id));
    } else {
        $data['title'] = 'Add About';
    }
    $data['viewfile'] = 'admin/manage_about/about_form';
    $this->load->view('admin/layout', $data);
}


//Screen Condition
public function manage_screen_cond($type=null) {
    $where='';
    $type = @$_POST['type'];
    if($type=='All'){
       redirect(base_url() . 'admin/manage_screen_cond');
    }
    if($type){
       $where =  "and type=\"".$type."\" ";
    }
    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_screen_cond';
    $config['total_rows'] = $this->ccm->get_all_count('screen_condition_qsn', 'qsn_name', '', 'qsn_name',$where);
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Screen Condition';
    $data['title'] = 'List Questions';
    $data['Questions'] = $this->ccm->get_all_data('screen_condition_qsn', 10, 'qsn_name', '', 'qsn_name',$where);
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_screen_cond/manage_screen_cond";
    $this->load->view('admin/layout', $data);
}

public function active_screen_cond($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("screen_condition_qsn", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not updated please try after some time..!');
    }
    echo json_encode($message);
}

public function delete_screen_cond($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("screen_condition_qsn", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Question Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_screen_cond_form() {

    if ($_POST) {
        $screen_image = '';
        if ($_FILES) {
            $config['upload_path'] = realpath('./assets/uploads/screen_cond/');
            $config['allowed_types'] = '*';
            $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['image']['name']);
            $config['file_name'] = $image1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $messge = $this->upload->display_errors();
                if ($messge != '<p>You did not select a file to upload.</p>') {
                    $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
            } else {
                $screen_image = $image1;
            }
            unset($this->upload);
        }
        $data = array(
            'qsn_name' => $this->input->post('qsn_name'),
            'type' => $this->input->post('type'),
            'image' => $screen_image,
           
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('screen_condition_qsn', $data);
            $msg = 'Question Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('screen_condition_qsn', array('qsn_name' => $this->input->post('qsn_name'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Question Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('screen_condition_qsn', $data);
            $msg = 'Question Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Question Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function screen_cond_form($id = '') {
    $data['current_page'] = 'Screen Condition';

    if ($id != '') {
        $data['title'] = 'Edit Question';
        $data['question'] = $this->ccm->get_single_row('screen_condition_qsn', array('id' => $id));
    } else {
        $data['title'] = 'Add question';
    }
    $data['viewfile'] = 'admin/manage_screen_cond/screen_cond_form';
    $this->load->view('admin/layout', $data);
}




//Body defect master
public function manage_body_defects() {

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_body_defects';
    $config['total_rows'] = $this->ccm->get_all_count('body_defects_qsn', 'qsn_name', '', 'qsn_name');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Body Defects';
    $data['title'] = 'List Questions';
    $data['Questions'] = $this->ccm->get_all_data('body_defects_qsn', 10, 'qsn_name', '', 'qsn_name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_body_defects/manage_body_defects";
    $this->load->view('admin/layout', $data);
}

public function active_body_defects($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("body_defects_qsn", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Question Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not updated please try after some time..!');
    }
    echo json_encode($message);
}

public function delete_body_defects($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("body_defects_qsn", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Question Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Question did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_body_defects_form() {

    if ($_POST) {
        $screen_image = '';
        if ($_FILES) {
            $config['upload_path'] = realpath('./assets/uploads/body_defects/');
            $config['allowed_types'] = '*';
            $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['image']['name']);
            $config['file_name'] = $image1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $messge = $this->upload->display_errors();
                if ($messge != '<p>You did not select a file to upload.</p>') {
                    $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
            } else {
                $screen_image = $image1;
            }
            unset($this->upload);
        }
        $data = array(
            'qsn_name' => $this->input->post('qsn_name'),
            'type' => $this->input->post('type'),
            'image' => $screen_image,
           
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('body_defects_qsn', $data);
            $msg = 'Question Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('body_defects_qsn', array('qsn_name' => $this->input->post('qsn_name'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Question Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('body_defects_qsn', $data);
            $msg = 'Question Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Question Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function body_defects_form($id = '') {
    $data['current_page'] = 'Body Defects';

    if ($id != '') {
        $data['title'] = 'Edit Question';
        $data['question'] = $this->ccm->get_single_row('body_defects_qsn', array('id' => $id));
    } else {
        $data['title'] = 'Add question';
    }
    $data['viewfile'] = 'admin/manage_body_defects/body_defects_form';
    $this->load->view('admin/layout', $data);
}


//users
public function manage_users() {
  
    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_users';
    $config['total_rows'] = $this->ccm->get_all_count('mst_user', 'user_phone', '', 'user_phone');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['nue_tag_open'] = "<li class = 'page-item'>";
    $config['nue_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Users';
    $data['title'] = 'List Users';
    $data['user'] = $this->ccm->get_all_data('mst_user', 10, 'user_phone', '', 'user_phone');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_users/manage_users";
    $this->load->view('admin/layout', $data);
}


public function users_form($id = ''){
    $data['current_page'] = 'Users';
    if ($id != '') {
        $data['title'] = 'Account Details';
        $data['user'] = $this->ccm->get_single_row('mst_user', array('user_id' => $id));
        $data['user_address'] = $this->db->select("*")->where(['u_id' =>$id])->from('user_address')->get()->result_array();
        
    } else {
        $data['title'] = 'Users';
    }

    $data['viewfile'] = 'admin/manage_users/users_form';
    $this->load->view('admin/layout', $data);
}



public function edit_device_report($id = ''){
    $data['current_page'] = 'Sell Order';
    if ($id != '') {
        $data['title'] = 'Sell Order';
        $data['order'] = $this->ccm->get_single_sell_order($id);
        $data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' => $data['order']->product_id])->from('mst_product')->get()->row();
        $data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();
        $data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();
        $data['pickup_charges'] = $this->db->select("*")->where(['id' => 1])->from('pickup_charges')->get()->row();

        $data['tellus_qsn'] = $this->db->select("*")->where(['active' => 1])->from('tellus_qustion')->get()->result_array();
        $data['mst_qsn'] =  $this->cm->get_product_question($data['product_data']->p_id);
        $data['p_accessories'] =  $this->cm->get_product_accessories($data['product_data']->p_id);
        $data['p_age'] =  $this->cm->get_product_age($data['product_data']->p_id);
        //sceeen condition question
		$data['sc_qsn_dps'] = $this->db->select("*")->where(['active' => 1,'type'=>'dps1'])->from('screen_condition_qsn')->get()->result_array();
		$data['sc_qsn_vls'] = $this->db->select("*")->where(['active' => 1,'type'=>'vls2'])->from('screen_condition_qsn')->get()->result_array();
		$data['sc_qsn_spc'] = $this->db->select("*")->where(['active' => 1,'type'=>'spc3'])->from('screen_condition_qsn')->get()->result_array();

        // body question
        $data['bd_qsn_sopb'] = $this->db->select("*")->where(['active' => 1,'type'=>'sopb'])->from('body_defects_qsn')->get()->result_array();
        $data['bd_qsn_dopb'] = $this->db->select("*")->where(['active' => 1,'type'=>'dopb'])->from('body_defects_qsn')->get()->result_array();
        $data['bd_qsn_psbpc'] = $this->db->select("*")->where(['active' => 1,'type'=>'psbpc'])->from('body_defects_qsn')->get()->result_array();
        $data['bd_qsn_bplc'] = $this->db->select("*")->where(['active' => 1,'type'=>'bplc'])->from('body_defects_qsn')->get()->result_array();
		
    } else {
        $data['title'] = 'Update Order';
    }

    $data['viewfile'] = 'admin/manage_device_report/device_report_question';
    $this->load->view('admin/layout', $data);
}



public function update_order_report()
	{
		   $order_id = 	$_POST['order_id'];     
	       
           $postData['pickup_charge'] = $this->input->post('pickup_charge');
	       $postData['sell_amt'] = $this->input->post('base_price');

		   $postData['sell_amt'] - $postData['pickup_charge'];
		   $postData['updated_by'] = $_SESSION['staff_id'];

					
		   			if(empty($postData)){
						die;
					}

					$dvc_rpt_data = json_encode($_SESSION['dvc_rpt'],true);
				
					$dvcData['history'] = $dvc_rpt_data;
					$dvcData['updated_by'] = $_SESSION['staff_id'];
					$this->cm->update('device_report', $dvcData,array('order_id' =>$order_id));

                    if ($this->cm->update('mst_sell_order', $postData,array('id' =>$_POST['order_row_id']))) {
        	            $_SESSION['order_id'] =  $order_id;
						
						
                        $res['status'] = 'OK';
                        $res['type'] = 'success';
                        $res['message'] = 'Order Updated Successfully..!';
                        } else {
                            $res['status'] = 'ERR';
                            $res['type'] = 'error';
                            $res['message'] = 'Sorry...we couldn\'t save right now please try later';
                        }
                    
	   				 echo json_encode($res);
                        
	}


//pickup_charges
public function manage_pickup_charge() {

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_pickup_charge';
    $config['total_rows'] = $this->ccm->get_all_count('pickup_charges', 'pickup_charge', '', 'pickup_charge');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Pickup Charge';
    $data['title'] = 'List Charge';
    $data['pickup'] = $this->ccm->get_all_data('pickup_charges', 10, 'pickup_charge', '', 'pickup_charge');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_pickup_charge/manage_pickup_charge";
    $this->load->view('admin/layout', $data);
}

public function active_pickup_charge($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("pickup_charges", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'did not updated please try after some time..!');
    }
    echo json_encode($message);
}

public function delete_pickup_charge($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("pickup_charges", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_pickup_charge() {

    if ($_POST) {

        $data = array(
            'pickup_charge' => $this->input->post('pickup_charge'),
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('pickup_charges', $data);
            $msg = 'Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('pickup_charges', array('pickup_charge' => $this->input->post('pickup_charge'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('pickup_charges', $data);
            $msg = 'Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function pickup_charge_form($id = '') {
    $data['current_page'] = 'Pickup Charge';

    if ($id != '') {
        $data['title'] = 'Edit Charges';
        $data['pickup'] = $this->ccm->get_single_row('pickup_charges', array('id' => $id));
    } else {
        $data['title'] = 'Add Charges';
    }
    $data['viewfile'] = 'admin/manage_pickup_charge/pickup_charge_form';
    $this->load->view('admin/layout', $data);
}


//request price 
public function manage_request_price() {

    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'admin/manage_request_price';
    $config['total_rows'] = $this->ccm->get_all_count('request_price_enq', 'name', '', 'name');
    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-split justify-content-end">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = "<li class = 'page-item'>";
    $config['num_tag_close'] = "</li>";
    $config['cur_tag_open'] = " <li class = 'page-item active'> <a class = 'page-link '>";
    $config['cur_tag_close'] = "</a></li>";
    $config['attributes'] = array('class' => 'page-link');
    $config['first_tag_open'] = '<div class="first">';
    $config['first_tag_close'] = '</div>';
    $config['last_tag_open'] = '<div class="last">';
    $config['last_tag_close'] = '</div>';
    $config['next_tag_open'] = '<div class="next">';
    $config['next_tag_close'] = '</div>';
    $config['prev_tag_open'] = '<div class="prev">';
    $config['prev_tag_close'] = '</div>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['current_page'] = 'Request Price';
    $data['title'] = 'List Price';
    $data['request_price'] = $this->ccm->get_all_data('request_price_enq', 10, 'name', '', 'name');
//       print("<pre>".print_r( $data['leads'],true)."</pre>"); die;
    $data['viewfile'] = "admin/manage_request_price/manage_request_price";
    $this->load->view('admin/layout', $data);
}

public function active_request_price($id, $status) {
    $data["active"] = $status;
    $this->db->where('id', $id);
    if ($this->db->update("request_price_enq", $data)) {
        if ($status == 0) {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Deactivated...!');
        } else {
            $message = array('success' => '1', 'type' => 'success', 'message' => 'Activated...!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'did not updated please try after some time..!');
    }
    echo json_encode($message);
}


public function delete_request_price($id) {
    $data["active"] = '2';
    $this->db->where('id', $id);
    $res = $this->db->update("request_price_enq", $data);
    if ($res == 1) {
        $message = array('success' => '1', 'type' => 'error', 'message' => 'Deleted Successfully...!');
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'did not deleted please try after some time..!');
    }
    echo json_encode($message);
}

public function submit_request_price() {

    if ($_POST) {

        $user_image = '';
        if ($_FILES) {
            $config['upload_path'] = realpath('./assets/uploads/request_price/');
            $config['allowed_types'] = '*';
            $image1 = date('dmYhis') . '_' . rand(0, 999999) . "_" . preg_replace('/\s+/', '-', $_FILES['c_photo']['name']);
            $config['file_name'] = $image1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('c_photo')) {
                $messge = $this->upload->display_errors();
                if ($messge != '<p>You did not select a file to upload.</p>') {
                    $data = array('type' => 'error', 'message' => $messge, 'success' => 0);
                    echo json_encode($data);
                    exit;
                }
            } else {
                $user_image = $image1;
            }
            unset($this->upload);
        }
        $data = array(
            'id' => $this->input->post('id'),
            'c_name' => $this->input->post('c_name'),
            'c_comment' => $this->input->post('c_comment'),
            'c_photo' => $user_image,
        );
        $data = array_filter($data);
        $data = $this->security->xss_clean($data);
        if ($_POST['id'] != '') {
            $this->db->where('id', $_POST['id']);
            $res = $this->db->update('request_price_enq', $data);
            $msg = 'Updated Successfully..!';
        } else {
            if ($this->ccm->get_row_count('request_price_enq', array('name' => $this->input->post('name'))) != 0) {
                $data = array('type' => 'error', 'message' => 'Name already exists Please change it...!', 'success' => 0);
                echo json_encode($data);
                exit;
            }
            $res = $this->db->insert('request_price_enq', $data);
            $msg = 'Added Successfully..!';
        }
        if ($res == 1) {
            $message = array('success' => '1', 'type' => 'success', 'message' => $msg);
            $this->session->set_flashdata('response_message', $message);
        } else {
            $message = array('success' => '0', 'type' => 'error', 'message' => 'Didnt Added, Please try after some time..!');
        }
    } else {
        $message = array('success' => '0', 'type' => 'error', 'message' => 'Please Fill the details before submitting..!');
    }
    echo json_encode($message);
}

public function request_price_form($id = ''){
    $data['request_p'] = $this->ccm->get_all_selected_by_condition2('request_price_enq', array('active' => 1));
    $data['current_page'] = 'Request Price';

    if ($id != ''){
        $data['title'] = 'Edit Price';
        $data['request_price'] = $this->ccm->get_single_row('request_price_enq', array('id' => $id));
    } else {
        $data['title'] = 'Add Price';
    }
    $data['viewfile'] = 'admin/manage_request_price/request_price_form';
    $this->load->view('admin/layout', $data);
}

public function request_price_form_view($id = ''){
    
    $data['current_page'] = 'Request Price';

    if ($id != ''){
        $data['title'] = 'Request Price Details';
        $data['request_price'] = $this->ccm->get_single_row('request_price_enq', array('id' => $id));
    } 
    $data['viewfile'] = 'admin/manage_request_price/request_price_form_view';
    $this->load->view('admin/layout', $data);
}



}

?>