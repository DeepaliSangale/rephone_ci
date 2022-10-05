<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->home_brands = $this->cm->get_all_selected_by_condition('mst_brand', array('set_on_home' => 1));
        $this->home_models = $this->cm->get_all_selected_by_condition('mst_model', array('set_on_home' => 1));
        $this->store_city = $this->cm->get_all_selected_by_condition('mst_city', array('active' => 1));
		
		if(!empty($_SESSION['user_id'])){
			$this->pending_order = $this->db->select("*")->where(['order_status' => 1,'user_id' => $_SESSION['user_id']])->from('mst_sell_order')->get()->result_array();
			$this->user_profile = $this->db->select("user_id, user_name, user_phone, user_email,alt_no")->where(['user_phone' => $_SESSION['user_phone']])->from('mst_user')->get()->row();
		}
	}


	public function index()
	{	
		$data['slider'] = $this->cm->get_all_selected_by_condition('mst_slider', array('active' => 1));
		$data['review'] = $this->cm->get_all_selected_by_condition('client_review', array('active' => 1));
	
		$this->load->view('web/includes/header');
		$this->load->view('web/home',$data);
		$this->load->view('web/includes/footer');
	}

	public function change_default_pincode($val = '') {

        $_SESSION['default_pincode'] = $val;

    }

	
	public function request_price()
	{	
			
		$this->load->view('web/includes/header');
		$this->load->view('web/request_price');
		$this->load->view('web/includes/footer');
	}
    
	public function value_page($p_url)
	{	
		$data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_url' => $p_url])->from('mst_product')->get()->row();
		$data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();
        $data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();

		$this->load->view('web/includes/header');
		$this->load->view('web/value_not_found',$data);
		$this->load->view('web/includes/footer');
	}

	public function device_det_from(){
		$res['status'] = 'OK';
		echo json_encode($res);
	}
	public function save_req_price()
	{


		$user_image = '';
        if ($_FILES) {
            $config['upload_path'] = realpath('./assets/uploads/req_price/');
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
                $user_image = $image1;
            }
            unset($this->upload);
        }

	
				$data = $this->input->post();  
				$data['image'] = $user_image;
			
	    
       
		if($this->db->insert('request_price_enq',$data)){
		        $res['status'] = 'OK';
		        $res['type'] = 'success';
    	    	$res['message'] = 'Request Send successfully';			
    		}
    		else
    		{
    			$res['status'] = 'ERR';
    			$res['type'] = 'error';
    			$res['message'] = 'fails to add';
    	}
	   
		echo json_encode($res);
		
	}

	 public function sendm(){
	     	$this->load->library('Notification');
	     	 $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
             $this->email->set_header('Content-type', 'text/html');
		            
                         
                        // Compose a simple HTML email message
                        $message = '<html><body>';
                        $message .= '<html>
						<head>
						<style type="text/css">
						body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
						table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
						img { -ms-interpolation-mode: bicubic; }
						
						img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
						table { border-collapse: collapse !important; }
						body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
						
						
						a[x-apple-data-detectors] {
							color: inherit !important;
							text-decoration: none !important;
							font-size: inherit !important;
							font-family: inherit !important;
							font-weight: inherit !important;
							line-height: inherit !important;
						}
						
						@media screen and (max-width: 480px) {
							.mobile-hide {
								display: none !important;
							}
							.mobile-center {
								text-align: center !important;
							}
						}
						div[style*="margin: 16px 0;"] { margin: 0 !important; }
						</style>
						<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
						
						
						<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
						For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them. 
						</div>
						
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
								
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
									<tr>
										<td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#8bc43f">
									   
										<div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
												<tr>
													<td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
														<h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">Rephone</h1>
													</td>
												</tr>
											</table>
										</div>
										
										<div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
											<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
												<tr>
													<td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
														<table cellspacing="0" cellpadding="0" border="0" align="right">
															<tr>
																<td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
																
																</td>
																<td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;">
																	<a href="#" target="_blank" style="color: #ffffff; text-decoration: none;"><img src="'.base_url().'assets/site_img/logo/rephone-logo.png" width="100" height="100" style="display: block; border: 0px;"/></a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</div>
									  
										</td>
									</tr>
									<tr>
										<td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
										<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
											<tr>
												<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
													<img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
													<h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
														Thank You For Your Order!
													</h2>
												</td>
											</tr>
											<tr>
												<td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
													<p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
													Woohoo! We Love you already. Thank you for choosing to rephone for your devices.
													</p>
												</td>
											</tr>
											<tr>
												<td align="left" style="padding-top: 20px;">
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
																Order Id #
															</td>
															<td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
														
															</td>
														</tr>
														<tr>
															<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
															 Base Price
															</td>
															<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
														
															</td>
														</tr>
														<tr>
															<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
															Pickup Charges
															</td>
															<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
														
															</td>
														</tr>
														<tr>
															<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
																Sales Tax
															</td>
															<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
																$5.00
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td align="left" style="padding-top: 20px;">
													<table cellspacing="0" cellpadding="0" border="0" width="100%">
														<tr>
															<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
																TOTAL
															</td>
															<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
														
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										
										</td>
									</tr>
									 <tr>
										<td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
										<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
											<tr>
												<td align="center" valign="top" style="font-size:0;">
													<div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
						
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
															<tr>
																<td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
																	<p style="font-weight: 800;">Delivery Address</p>
																
						
																</td>
															</tr>
														</table>
													</div>
													<div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
															<tr>
																<td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
																	<p style="font-weight: 800;">Estimated Delivery Date</p>
																
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
										</table>
										</td>
									</tr>
						
									<tr>
										<td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
										<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
											<tr>
												<td align="center">
													<img src="'.base_url().'assets/site_img/logo/rephone-logo.png" width="37" height="37" style="display: block; border: 0px;"/>
												</td>
											</tr>
											<tr>
												<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
													<p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
													     405 Globle Business Hub<br>
														 Kharadi, 411014
													</p>
												</td>
											</tr>
										</table>
										</td>
									</tr>
								</table>
								</td>
							</tr>
						</table>';
					
                        $message .= '</body></html>';
                      
						$this->notification->email($_SESSION['user_email'],'Rephone order successfully placed!',$message);
						echo 'success';
	 }
	public function session_print(){
		print_r($_SESSION); die;
	}

	public function sess_dest(){
        echo session_destroy();
    }

	  public function get_brand_model(){ 
		$postData = $this->input->post();
		$data = $this->cm->get_brand_model($postData);
		echo json_encode($data); 
	  }
    
	  //search model
    public function sell_old_mobile_phone()
	{	
		$data['brands'] = $this->db->select("brand_name,brand_id,brand_image,brand_url")->where(['active' => 1])->from('mst_brand')->get()->result_array();
		$data['review'] = $this->cm->get_all_selected_by_condition('client_review', array('active' => 1));
		$this->load->view('web/includes/header');
		$this->load->view('web/sell_old_mobile_phone',$data);
		$this->load->view('web/includes/footer');
	}
	
	//search brands
	  public function brands()
	  {	
		
		  $data['review'] = $this->cm->get_all_selected_by_condition('client_review', array('active' => 1));
		  $this->load->view('web/includes/header');
		  $this->load->view('web/brands',$data);
		  $this->load->view('web/includes/footer');
	  }

	public function brand_wise_mobile($brand_url=NULL)
	{	

		$brand = $this->db->select("brand_name,brand_id,brand_image,brand_url,active")->where(['brand_url' => $brand_url,'active'=>1])->from('mst_brand')->get()->row();
        $data['brand_name'] = $brand->brand_name;
        $data['sell_phone'] = $this->cm->get_sell_phone_url($brand->brand_id);
		$data['review'] = $this->cm->get_all_selected_by_condition('client_review', array('active' => 1));

		$this->load->view('web/includes/header');
		$this->load->view('web/sell_phone',$data);
		$this->load->view('web/includes/footer');
	}

	public function choose_variant_model($model_url=NULL)
	{	
        if(!empty($_POST['model_id'])){
			$data1['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $_POST['model_id']])->from('mst_model')->get()->row();
			if($this->uri->segment(2)){
				redirect(base_url('sell-mobile-phone-used/'.$data1['model_data']->m_url)); die;
				
			}
		}
		
		$data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_url' => $model_url])->from('mst_model')->get()->row();
        $brand = $this->db->select("brand_name,brand_id")->where(['brand_id' => $data['model_data']->m_brand_id])->from('mst_brand')->get()->row();
        $data['brand_name'] = $brand->brand_name;
        $data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_m_id' => $data['model_data']->m_id])->from('mst_product')->get()->row();
        $data['variant_data'] =  $this->cm->get_variant_databyid(@$data['product_data']->p_m_id); 
        
		$this->load->view('web/includes/header');
		$this->load->view('web/choose_variant',$data);
		$this->load->view('web/includes/footer');
	}

	public function variant_wise_prize($variant_url=null)
	{	

		$data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_url' =>$variant_url])->from('mst_product')->get()->row();
        $data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();
		$brand = $this->db->select("brand_name,brand_id")->where(['brand_id' => $data['model_data']->m_brand_id])->from('mst_brand')->get()->row();
        $data['brand_name'] = $brand->brand_name;
		$data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();
        
		$this->load->view('web/includes/header');
		$this->load->view('web/variant_price',$data);
		$this->load->view('web/includes/footer');
	}

	public function question_calculator($p_url)
	{	

		$data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_url' =>$p_url])->from('mst_product')->get()->row();
        $data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();
        $data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();
        
        $data['mst_qsn'] =  $this->cm->get_product_question($data['product_data']->p_id);
        $data['p_accessories'] =  $this->cm->get_product_accessories($data['product_data']->p_id);
        $data['p_age'] =  $this->cm->get_product_age($data['product_data']->p_id);
		
		$data['tellus_qsn'] = $this->db->select("*")->where(['active' => 1])->from('tellus_qustion')->get()->result_array();
		$data['pickup_charges'] = $this->db->select("*")->where(['id' => 1])->from('pickup_charges')->get()->row();
		
		//sceeen condition question type wise
		$data['sc_qsn_dps'] = $this->db->select("*")->where(['active' => 1,'type'=>'dps1'])->from('screen_condition_qsn')->get()->result_array();
		$data['sc_qsn_vls'] = $this->db->select("*")->where(['active' => 1,'type'=>'vls2'])->from('screen_condition_qsn')->get()->result_array();
		$data['sc_qsn_spc'] = $this->db->select("*")->where(['active' => 1,'type'=>'spc3'])->from('screen_condition_qsn')->get()->result_array();
		
        //body defects qsn type wise
		$data['bd_qsn_sopb'] = $this->db->select("*")->where(['active' => 1,'type'=>'sopb'])->from('body_defects_qsn')->get()->result_array();
		$data['bd_qsn_dopb'] = $this->db->select("*")->where(['active' => 1,'type'=>'dopb'])->from('body_defects_qsn')->get()->result_array();
		$data['bd_qsn_psbpc'] = $this->db->select("*")->where(['active' => 1,'type'=>'psbpc'])->from('body_defects_qsn')->get()->result_array();
		$data['bd_qsn_bplc'] = $this->db->select("*")->where(['active' => 1,'type'=>'bplc'])->from('body_defects_qsn')->get()->result_array();

		$this->load->view('web/includes/header');
		$this->load->view('web/tell_us',$data);
		$this->load->view('web/includes/footer');
	}


	public function search_model(){
 
        $model = $this->input->get('model');
		$this->db->select('m_name,m_url');
        $this->db->like('m_name', $model);
        $data = $this->db->get("mst_model")->result_array();
	   
        echo json_encode($data);
    }

	public function check_user_login(){

		  $check = $this->db->select("user_id, user_name, user_phone, user_email")->where(['user_phone' => $_POST['user_phone']])->from('mst_user')->get()->row();
            if(empty($check->user_phone)){
                echo json_encode(array('status'=> 'New', 'type'=>'error', 'message' => "This number not registred on rephone",'u_phone'=>$_POST['user_phone']));
				
                die;

            }else
            {

                if(!empty($_POST['user_phone']))

                {

                    $otp = rand(1000,9999);
                    $this->session->set_userdata(['otp' => $otp]);
                    $this->load->library('Notification');
                    $msg = "Dear DMSPl user,Your OTP for DMSPL adword is ".$otp;
                    $this->notification->sms(array('mobile'=>$_POST['user_phone'],'msg'=>$msg));
                    @$this->notification->email($check->user_email,'OTP for Rephone',$msg);
                    $this->session->mark_as_temp('otp',120);
                    $_SESSION['login'] = '1';
                    $_SESSION['otpmob'] = $_POST['user_phone'];
                    echo json_encode(array('status' => 'OK', 'type'=>'success', 'otpmob'=>$_POST['user_phone'], 'message' => "OTP Has been sent on you registered Email Id and Mobile number. Resend after 5 minutes "));

                }
                else {

                    echo json_encode(array('status' => 'ERR', 'type'=>'error', 'message' => " We didn't found User having entered Email And mobile, please contact to  Support"));

                }

            }
	}

	public function send_otp_registration(){
		$otp = rand(1000,9999);
		$this->session->set_userdata(['otp' => $otp]);
		$this->load->library('Notification');
		$msg = "Dear DMSPl user,Your OTP for DMSPL adword is ".$otp;
		$this->notification->sms(array('mobile'=>$_POST['user_phone'],'msg'=>$msg));
		@$this->notification->email($_POST['user_email'],'OTP for Rephone',$msg);
		$this->session->mark_as_temp('otp',120);
		$_SESSION['otpmob'] = $_POST['user_phone'];
		echo json_encode(array('status'=> 'OK', 'type'=>'success', 'otpmob'=>$_POST['user_phone'], 'user_email'=>$_POST['user_email'], 'user_name'=>$_POST['user_name'], 'message' => "OTP Has been sent on you registered Email Id and Mobile number."));
		die;

	}

	public function verify_otp(){

		$sess_otp = $this->session->userdata('otp');
		if($sess_otp == $_POST['otp'])
		//if($_POST['otp'] == '1234')

		{
			if(isset($_SESSION['login'])){

			 $l_data = $this->db->select("user_id, user_name, user_phone, user_email")->where(['user_phone' => $_SESSION['otpmob']])->from('mst_user')->get()->row();

			$_SESSION['user_id'] = $l_data->user_id;
			$_SESSION['user_name'] = $l_data->user_name;
			$_SESSION['user_email'] = $l_data->user_email;
			$_SESSION['user_phone'] = $l_data->user_phone;

			}else{

			$data = array('user_name'=>$_POST['user_name'],'user_phone'=>$_POST['user_phone'],'user_email'=>$_POST['user_email']);

			$this->db->insert('mst_user',$data);

			$user_data = $this->db->select("user_id, user_name, user_phone, user_email")->where(['user_phone' => $_POST['user_phone']])->from('mst_user')->get()->row();

			$_SESSION['user_id'] = $user_data->user_id;
			$_SESSION['user_name'] = $user_data->user_name;
			$_SESSION['user_email'] = $user_data->user_email;
			$_SESSION['user_phone'] = $user_data->user_phone;

			}

			echo json_encode(array('status'=> 'OK', 'type'=>'success', 'message' => "OTP Verified"));
			exit;

		}

		else

		{
			 echo json_encode(array('status'=> 'ERR', 'type'=>'error', 'message' => "Invalid Otp"));
			 exit;
		}

		exit;
}


public function resend_otp(){
	$this->load->library('Notification');
	$otp = rand(1000,9999);
	$this->session->set_userdata(['otp' => $otp]);
	$msg = "Dear DMSPl user,Your OTP for DMSPL adword is ".$otp;
	$this->session->mark_as_temp('otp',120);
    if(isset($_SESSION['login'])){
		$check = $this->db->select("user_id, user_name, user_phone, user_email")->where(['user_phone' => $_SESSION['otpmob']])->from('mst_user')->get()->row();
		$this->notification->sms(array('mobile'=>$_SESSION['otpmob'],'msg'=>$msg));
	    @$this->notification->email($check->user_email,'OTP for Rephone',$msg);
		echo json_encode(array('status'=> 'OK', 'type'=>'success', 'otpmob'=>$_SESSION['otpmob'], 'user_email'=>$check->user_email, 'message' => "OTP Has been sent on you registered Email and Mobile number."));
	    die;
	}else{
	$this->notification->sms(array('mobile'=>$_POST['user_phone'],'msg'=>$msg));
	$this->notification->email($_POST['user_email'],'OTP for Rephone',$msg);
	echo json_encode(array('status'=> 'OK', 'type'=>'success', 'otpmob'=>$_POST['user_phone'], 'user_email'=>$_POST['user_email'], 'message' => "OTP Has been sent on you registered Email and Mobile number."));
	die;

	}

}


public function get_value_tellus(){
	if(empty($_POST['id'])){
		echo 'No id found';
	}
	$tell_us = $this->db->select("*")->where(['id' => $_POST['id']])->from('tellus_qustion')->get()->row();
	$mst_tell_qsn = $this->db->select("*")->where(['prod_id' => $_POST['product_id'],'tuq_id'=>$_POST['id']])->from('mst_tell_us_question')->get()->row();
	
   if($_POST['id']==1){
	if($_POST['value_type']=='No'){
		$value = $mst_tell_qsn->tu_value;
		$calc_type = $mst_tell_qsn->tu_type;
		$value_check_name = $tell_us->no_checked_value;
	}
  }
   if($_POST['value_type']=='Yes'){
	$value_check_name = $tell_us->yes_checked_value;
   }
   if($_POST['value_type']=='No'){
	$value_check_name = $tell_us->no_checked_value;
   }
   
    if(empty($value)){
		$val = '0.00';
	}else{
		$val= $value;
	}
	$response['tellus_value'] = $val;
	$response['tellus_type'] = @$calc_type;

	$response['id'] = $tell_us->id;
	$response['checked'] = $_POST['value_type'];
	$response['checked_name'] = $value_check_name;
	echo json_encode($response);
	
}

public function get_value_screen_condition(){
	if(empty($_POST['id'])){
		echo 'No id found';
	}
	$sc = $this->db->select("*")->where(['id' => $_POST['id']])->from('screen_condition_qsn')->get()->row();
	$mst_screen_cond = $this->db->select("*")->where(['prod_id' => $_POST['product_id'],'sq_id'=>$_POST['id']])->from('mst_screen_question')->get()->row();	
	if(empty($mst_screen_cond->sq_value)){
		$val = '0.00';
	}else{
		$val = $mst_screen_cond->sq_value;
	}
	$response['pq_type'] = $mst_screen_cond->sq_type;
	$response['pq_value'] = $val;
	echo json_encode($response);
	
}
//body defect
public function get_value_body_defects(){
	if(empty($_POST['id'])){
		echo 'No id found';
	}
	$sc = $this->db->select("*")->where(['id' => $_POST['id']])->from('body_defects_qsn')->get()->row();
	$mst_body = $this->db->select("*")->where(['prod_id' => $_POST['product_id'],'bd_id'=>$_POST['id']])->from('mst_body_defects_question')->get()->row();	
	if(empty($mst_body->bd_value)){
		$val = '0.00';
	}else{
		$val = $mst_body->bd_value;
	}
	$response['pq_type'] = $mst_body->bd_type;
	$response['pq_value'] = $val;
	echo json_encode($response);
	
}

//functional physical problem
public function get_value_fpp(){
	if(empty($_POST['id'])){
		echo 'No id found'; die;
	}
	
	$fpp = $this->cm->select('mst_product_question','*',array('pq_p_id' => $_POST['product_id'],'pq_q_id' => $_POST['id']))->row();
	
	$response['fpp_value'] = $fpp->pq_value;
	$response['fpp_type'] = $fpp->pq_type;
	echo json_encode($response);
	
}

// accessories
public function get_value_douahve(){
	if(empty($_POST['id'])){
		echo 'No id found'; die;
	}
  
   	                $this->db->select("*");
					$this->db->where('pa_p_id' , $_POST['product_id']);
					$this->db->where_in('pa_a_id', $_POST['id']);
					$this->db->from('mst_product_accessories');
				    $faa['data'] = $this->db->get()->result_array();
			
		echo json_encode($faa['data']);
	
}

//mobile age
public function get_value_age(){
	if(empty($_POST['id'])){
		echo 'No id found'; die;
	}
	
	$fpp = $this->cm->select('mst_product_age','*',array('page_p_id' => $_POST['product_id'],'page_age_id' => $_POST['id']))->row();
	
	$response['age_value'] = $fpp->page_value;
	$response['age_type'] = $fpp->page_type;
	echo json_encode($response);
	
}

public function check_session(){
	if(!empty($_SESSION['user_id'])){
		$resp['login'] = 1;
	}else{
		$resp['login'] = 0;
	}
	echo json_encode($resp);
}

public function checkout(){
	  if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
	 	redirect(base_url());
  	  }
		
	

		$data['tot_amt'] = $_POST['base_price'] - $_POST['pickup_charge'];
	    $data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' =>$_POST['p_id']])->from('mst_product')->get()->row();
		$data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();
		$data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();
	    $data['pickup_charges'] = $this->db->select("*")->where(['id' => 1])->from('pickup_charges')->get()->row();
	    $data['time_slot'] = $this->db->select("*")->where(['active' => 1])->from('time_avl')->get()->result_array();
		
		$data['user_address'] = $this->db->select("*")->where(['u_id' => @$this->user_profile->user_id])->from('user_address')->get()->result_array();
		$data['payment_mode'] = $this->db->select("*")->where(['u_id' => @$this->user_profile->user_id])->from('user_bank')->get()->result_array();
		$data['user_upi'] =  $this->db->select("*")->where(['u_id' => $this->user_profile->user_id])->from('user_upi')->get()->row();
		$this->load->view('web/includes/header');
		$this->load->view('web/checkout',$data);
		$this->load->view('web/includes/footer');
}

public function payment($order_id){
	if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
	   redirect(base_url());
	  }
	    
	  $data['order_details'] = $this->db->select("*")->where(['order_id' => $order_id])->from('mst_sell_order')->get()->row();
	  if(!empty($data['order_details']->payment_id)){
		  redirect(base_url('dashboard/order_details/'.$order_id));
	  }
	  $data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' => $data['order_details']->product_id])->from('mst_product')->get()->row();
	  $data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();
	  $data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();
	  $data['pickup_charges'] = $this->db->select("*")->where(['id' => 1])->from('pickup_charges')->get()->row();
		
	  $this->load->view('web/includes/header');
	  $this->load->view('web/payment_add',$data);
	  $this->load->view('web/includes/footer');
}




public function save_device_report(){
	   
	    $_SESSION['dvc_rpt'] = $_POST; 
		
}
public function thank_you(){
	   if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
		redirect(base_url());
	   }
		$data['order_details'] = $this->db->select("*")->where(['order_id' => $_SESSION['order_id']])->from('mst_sell_order')->get()->row();
		$data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' => $data['order_details']->product_id])->from('mst_product')->get()->row();
		$data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();
		$data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();

	    $this->load->view('web/includes/header');
		$this->load->view('web/thank_you',$data);
		$this->load->view('web/includes/footer');
}

public function search_model_city(){
 
	$city = $this->input->get('city');
	$this->db->select('mst_store.*,mst_city.active,mst_city.city_name,mst_city.city_id');
	$this->db->from('mst_store');
	$this->db->join('mst_city','mst_city.city_id = mst_store.city_id');
	$this->db->like('mst_store.city_id', $city);
	$this->db->where('mst_city.active', 1);
	$result = $this->db->get()->result_array();
		 
	echo json_encode($result);
}
public function store($sname=null){
	    if(!empty($sname)){
		 $data['store'] = $this->cm->get_store_bycity($sname);
		}else{
	     $data['store'] = $this->db->select("*")->where(['active' => 1])->from('mst_store')->get()->result_array();
		}
	    $this->load->view('web/includes/header');
		$this->load->view('web/store',$data);
		$this->load->view('web/includes/footer');
}

public function comming_soon(){
	
	$this->load->view('web/includes/header');
	$this->load->view('web/cooming_soon');
	$this->load->view('web/includes/footer');
}

public function contact(){
	
	$this->load->view('web/includes/header');
	$this->load->view('web/contact');
	$this->load->view('web/includes/footer');
}

public function about_us(){
	
	$data['about_data'] = $this->db->select("*")->where(['active' => 1])->from('about')->get()->row();
	$this->load->view('web/includes/header');
	$this->load->view('web/about',$data);
	$this->load->view('web/includes/footer');
}

public function logout(){
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_email']);
	unset($_SESSION['login']);
	redirect(base_url());

}  


}
