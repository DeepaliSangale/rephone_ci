<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) {
            redirect(base_url());
        }
         $this->home_brands = $this->cm->get_all_selected_by_condition('mst_brand', array('set_on_home' => 1));
         $this->home_models = $this->cm->get_all_selected_by_condition('mst_model', array('set_on_home' => 1));
          $this->user_profile = $this->db->select("user_id, user_name, user_phone, user_email,alt_no")->where(['user_phone' => $_SESSION['user_phone']])->from('mst_user')->get()->row();
		  $this->pending_order = $this->db->select("*")->where(['order_status' => 1,'user_id' => $_SESSION['user_id']])->from('mst_sell_order')->get()->result_array();
    }

    public function index() {
            
        $data['home_brands'] = $this->cm->get_all_selected_by_condition('mst_brand', array('set_on_home' => 1));
        $data['home_models'] = $this->cm->get_all_selected_by_condition('mst_model', array('set_on_home' => 1));

        $data['order_details'] = $this->db->select("*")->where(['user_id' => $this->user_profile->user_id])->from('mst_sell_order')->get()->result_array();
        $data['user_banks'] =  $this->db->select("*")->where(['u_id' => $this->user_profile->user_id])->from('user_bank')->get()->result_array();
        $data['user_upi'] =  $this->db->select("*")->where(['u_id' => $this->user_profile->user_id])->from('user_upi')->get()->row();
        $data['user_address'] = $this->db->select("*")->where(['u_id' => $this->user_profile->user_id])->from('user_address')->get()->result_array();
        
		$this->load->view('web/includes/header');
		$this->load->view('user/dashboard',$data);
		$this->load->view('web/includes/footer');
    }
   
     
    
    	public function update_user_profile()
	{
	    
	    $data = $this->input->post();
		if($this->db->update('mst_user',$data,array('user_id' => $_SESSION['user_id']))){
		        $res['status'] = 'OK';
		        $res['type'] = 'success';
    	    	$res['message'] = 'Updated successfully';
    		}
    		else
    		{
    			$res['status'] = 'ERR';
    			$res['type'] = 'error';
    			$res['message'] = 'fails to update';
    	}
	   
		echo json_encode($res);
		
	}
	
	
	public function get_bank_details(){

        $this->load->library('bank_ifc');
        $this->bank_ifc->ifc_code = $this->input->post('bank_ifc_code');
        $data['api_response'] = $this->bank_ifc->get_data();
	
		if($data['api_response']->BANK == ''){
			$response['status'] = "ERR";
			$response['type'] = "error";
			$response['message'] = 'Invalid IFSC Code';
			echo json_encode($response);
			die();
		}
	
        $response['status'] = "OK";
        $response['type'] = "success";
        $response['bank_name'] = $data['api_response']->BANK;
        $response['branch_name'] = $data['api_response']->BRANCH;
        $response['ifsc_code'] = $data['api_response']->IFSC;
        echo json_encode($response);
    }
    
    public function save_bank_details()
	{
	       
	       $postData['acct_no'] = $this->input->post('acct_no');
	       $postData['bank_name'] = $this->input->post('bank_name');
	       $postData['benef_name'] = $this->input->post('benef_name');
	       $postData['bank_ifsc_code'] = $this->input->post('bank_ifsc_code');
	       $postData['u_id'] = $this->user_profile->user_id;
	    
	       if(empty($postData)){
	           die;
	       }
                        $this->db->select('u_id');
                        $this->db->from('user_bank');
                        $this->db->where('u_id', $this->user_profile->user_id);
                        $this->db->where('acct_no', $this->input->post('acct_no'));
                       
                        $query = $this->db->get();
                        $num = $query->num_rows();
                        if ($num > 0) {
                            
                            $res['status'] = 'ERR';
                            $res['type'] = 'error';
                            $res['message'] = 'Sorry!..This Bank already added';
                             echo json_encode($res);
                            return FALSE;
                        } else {
                    if ($lastid = $this->cm->insert('user_bank', $postData)) {
        	  
                        $res['status'] = 'OK';
                        $res['type'] = 'success';
                        $res['message'] = 'Bank Add Successfully..!';
						$res['payment_id'] = $lastid;
                        } else {
                            $res['status'] = 'ERR';
                            $res['type'] = 'error';
                            $res['message'] = 'Sorry...we couldn\'t save right now please try later';
                        }
                    
	    echo json_encode($res);
                        }
	}
	
	
	public function delete_bank_account($id)
    {
	    if($this->cm->delete('user_bank',array('id'=>$id))){
		    
			$res['status']  = "OK";
			$res['message'] = "Successfully deleted";
		
		}else{
			$res['status'] = 'ERR';
    		$res['message'] = 'fails to delete';
		}
			echo json_encode($res);
	}
	
	
    public function save_upi_id()
	{
	    
	    $data = $this->input->post();
	    $data['u_id'] =$this->user_profile->user_id;
        $this->db->select('u_id');
        $this->db->from('user_upi');
        $this->db->where('u_id', $this->user_profile->user_id);
        $this->db->where('upi_id', $this->input->post('upi_id'));
       
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            
            $res['status'] = 'ERR';
            $res['type'] = 'error';
            $res['message'] = 'Sorry!..This UPI already added';
             echo json_encode($res);
            return FALSE;
        }else 
		if($lastid = $this->db->insert('user_upi',$data)){
		        $res['status'] = 'OK';
		        $res['type'] = 'success';
    	    	$res['message'] = 'Inserted successfully';
				$res['payment_id'] = $lastid;
    		}
    		else
    		{
    			$res['status'] = 'ERR';
    			$res['type'] = 'error';
    			$res['message'] = 'fails to add';
    	}
	   
		echo json_encode($res);
		
	}

    public function delete_upi_id($id)
    {
	    if($this->cm->delete('user_upi',array('id'=>$id))){
		    
			$res['status']  = "OK";
			$res['message'] = "Successfully deleted";
		
		}else{
			$res['status'] = 'ERR';
    		$res['message'] = 'fails to delete';
		}
			echo json_encode($res);
	}

	public function save_address()
	{
	    
	    $data['landmark'] = $this->input->post('landmark');
	    $data['pincode'] = $this->input->post('pincode');
	    $data['city'] = $this->input->post('city');
	    $data['flat_office_floor'] = $this->input->post('flat_office_floor');
	    $data['state'] = $this->input->post('state');
	    $data['address_type'] = $this->input->post('address_type');
	    $data['u_id'] =$this->user_profile->user_id;

		if($this->db->insert('user_address',$data)){
		        $res['status'] = 'OK';
		        $res['type'] = 'success';
    	    	$res['message'] = 'Inserted successfully';
    		}
    		else
    		{
    			$res['status'] = 'ERR';
    			$res['type'] = 'error';
    			$res['message'] = 'fails to add';
    	}
	   
		echo json_encode($res);
		
	}

	public function edit_details_address(){
		if(empty($_POST['id'])){
			echo 'No id found';
		}
		$data['ad_details']= $this->db->select("*")->where(['id' => $_POST['id']])->from('user_address')->get()->row();
		$this->load->view('user/edit_address',$data);
	}
	public function update_address_details()
	{
	    $pId = $this->input->post('id');
        $data['landmark'] = $this->input->post('landmark_edit');
	    $data['pincode'] = $this->input->post('pincode_edit');
	    $data['city'] = $this->input->post('city_edit');
	    $data['flat_office_floor'] = $this->input->post('flat_office_floor_edit');
	    $data['state'] = $this->input->post('state_edit');
	    $data['address_type'] = $this->input->post('address_type_edit');
	    $data['u_id'] =$this->user_profile->user_id;
		if($this->cm->update('user_address',$data,array('id' => $pId))){
    		    $res['status'] = 'OK';
    	    	$res['message'] = 'Updated successfully';
    		}
    		else
    		{
    			$res['status'] = 'ERR';
    			$res['message'] = 'fails to update';
    	}
	   
		echo json_encode($res);
		
	}
	public function check_address_exist($address_type){

		$this->db->select('u_id,address_type');
        $this->db->from('user_address');
        $this->db->where('u_id', $this->user_profile->user_id);
        $this->db->where('address_type', $address_type);
       
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            
            $res['status'] = 'ERR';
            $res['type'] = 'error';
            $res['message'] = 'Sorry!..This '.$address_type.' address already added';
             echo json_encode($res);
            return FALSE;
        }

	}
	
	public function delete_address($id)
    {
	    if($this->cm->delete('user_address',array('id'=>$id))){
		    
			$res['status']  = "OK";
			$res['message'] = "Successfully deleted";
		
		}else{
			$res['status'] = 'ERR';
    		$res['message'] = 'fails to delete';
		}
			echo json_encode($res);
	}

	public function get_pincode_details(){

        $this->load->library('pincode');
        $this->pincode->pincode = $this->input->post('pincode');
        $data['api_response'] = $this->pincode->get_pincode_details();
		$decode_json = json_decode($data['api_response'],true);
		
		if($decode_json[0]['Status'] == 'Error'){
			$response['status'] = "ERR";
			$response['type'] = "error";
			$response['message'] = 'Invalid Pin Code';
			echo json_encode($response);
			die();
		}
        $response['status'] = "OK";
        $response['type'] = "success";
        $response['city'] = $decode_json[0]['PostOffice'][0]['Block'];
        $response['state'] = $decode_json[0]['PostOffice'][0]['Circle'];
        echo json_encode($response);
    }

	public function check_pincode(){

		$check = $this->db->select("pincode_id,pincode_code,active,timestamp,update_timestamp")->where(['pincode_code' => $_POST['pincode']])->from('mst_pincode')->get()->row();
		  if(empty($check->pincode_code)){
			  echo json_encode(array('status'=> 'ERR', 'type'=>'error', 'message' => "This Pincode Location Unavailable for Pickup"));
			  die;
		  }else{
			echo json_encode(array('status'=> 'OK', 'type'=>'success', 'message' => "Location available for Pickup"));
		  }
	}

	public function update_order_payment(){
	    if($_POST['payment_mode']=='COD'){
			$data['payment_id'] = 'COD';
		}else{
			$data['payment_id'] = $_POST['payment_id'];
		}
	    $data['payment_mode'] = $_POST['payment_mode'];
	    $this->cm->update('mst_sell_order',$data,array('order_id' => $_POST['order_id']));
	}

	public function create_order()
	{
		   $order_id = 'RPHN'.uniqid();
	       $postData['product_id'] = $this->input->post('product_id');
	       $postData['user_id'] = $this->user_profile->user_id;
	       $postData['pickup_charge'] = $this->input->post('pickup_charge');
	       $postData['sell_amt'] = $this->input->post('sell_amt');
	       $postData['pickup_address'] = $this->input->post('address_type_order');
	       $postData['time_slot'] = $this->input->post('time_avil');
	       $postData['pickup_date'] = $this->input->post('pickup_date');
	       $postData['payment_mode'] = $this->input->post('payment_mode');
	       $postData['order_id'] = $order_id;
           if(!empty($_POST['payment_id'])){
			$postData['payment_id'] = $this->input->post('payment_id');
		   }
		   if($_POST['payment_mode']=='COD'){
			 $postData['payment_id'] = 'COD';
		   }

		   $amt = $postData['sell_amt'] - $postData['pickup_charge'];
					
		   			if(empty($postData)){
						die;
					}

					$dvc_rpt_data = json_encode($_SESSION['dvc_rpt'],true);
					$dvcData['product_id'] = $this->input->post('product_id');
					$dvcData['u_id'] = $_SESSION['user_id'];
					$dvcData['history'] = $dvc_rpt_data;
					$dvcData['order_id'] = $order_id;
					$this->cm->insert('device_report', $dvcData);

                    if ($this->cm->insert('mst_sell_order', $postData)) {
        	            $_SESSION['order_id'] =  $order_id;
						
						$this->load->library('Notification');
						$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
                        $this->email->set_header('Content-type', 'text/html');
                        
						$emailmsg = '<html><body>';
                        $emailmsg .= '<html>
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
															'.$order_id.'
															</td>
														</tr>
														<tr>
															<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
															 Base Price
															</td>
															<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
															'.$postData['sell_amt'].'
															</td>
														</tr>
														<tr>
															<td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
															Pickup Charges
															</td>
															<td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
																'.$postData['pickup_charge'].'
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
															'.$amt.'
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
																	<p>'. $postData['pickup_address'].'</p>
						
																</td>
															</tr>
														</table>
													</div>
													<div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
														<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
															<tr>
																<td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
																	<p style="font-weight: 800;">Estimated Delivery Date</p>
																	<p>'. $postData['pickup_date'].'</p>
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
													<img src="'.base_url().'assets/site_img/logo/rephone-logo.png" width="50" height="50" style="display: block; border: 0px;"/>
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
					    $emailmsg .= '</body></html>';
						@$this->notification->email($_SESSION['user_email'],'Rephone order placed successfully!',$emailmsg);
						
                        $res['status'] = 'OK';
                        $res['type'] = 'success';
                        $res['message'] = 'Order Add Successfully..!';
                        } else {
                            $res['status'] = 'ERR';
                            $res['type'] = 'error';
                            $res['message'] = 'Sorry...we couldn\'t save right now please try later';
                        }
                    
	   				 echo json_encode($res);
                        
	}


	public function order_details($order_id){

		$data['order_details'] = $this->db->select("*")->where(['order_id' => $order_id])->from('mst_sell_order')->get()->row();
		$data['product_data'] =  $this->db->select("p_id,p_url,p_m_id,p_variant_id,p_price")->where(['p_id' => $data['order_details']->product_id])->from('mst_product')->get()->row();
		$data['model_data'] = $this->db->select("m_name,m_id,m_image,m_brand_id,m_url")->where(['m_id' => $data['product_data']->p_m_id])->from('mst_model')->get()->row();
		$data['variant_data'] =  $this->db->select("*")->where(['variant_id' => $data['product_data']->p_variant_id],['active' => 1])->from('mst_variant')->get()->row();
		$data['cancel_reason'] = $this->db->select("*")->where(['active' => 1])->from('reason_cancel')->get()->result_array();
		
		$data['excqsn'] =  $this->db->select("*")->where(['active' => 1,'type' =>'Excellent'])->from('feedback_qsn')->get()->result_array();
		$data['goodqsn'] =  $this->db->select("*")->where(['active' => 1,'type' =>'Good'])->from('feedback_qsn')->get()->result_array();
		$data['okqsn'] =  $this->db->select("*")->where(['active' => 1,'type' =>'OK'])->from('feedback_qsn')->get()->result_array();
		$data['badqsn'] =  $this->db->select("*")->where(['active' => 1,'type' =>'Bad'])->from('feedback_qsn')->get()->result_array();
		$data['terriqsn'] =  $this->db->select("*")->where(['active' => 1,'type' =>'Terrible'])->from('feedback_qsn')->get()->result_array();

		$data['feedback'] = $this->db->select("*")->where(['order_id' => $order_id])->from('rating')->get()->row();

		$this->load->view('web/includes/header');
		$this->load->view('web/order_details',$data);
		$this->load->view('web/includes/footer');
	}

	
	public function cancel_order($id)
    {
	
		$data['order_status'] = 3;
		$data['reason_cancel'] = $_POST['reason'];
		$data['comment'] = $_POST['comment'];
		$data['order_update_date'] = date('Y-m-d H:i:s');
	    if($this->cm->update('mst_sell_order',$data,array('id' => $id))){
			$res['status'] = 'OK';
			$res['message'] = 'order cancelled  successfully';
		}
		else
		{
			$res['status'] = 'ERR';
			$res['message'] = 'fails to update';
		}
   
	   echo json_encode($res);
	}

	public function save_feedback()
    {
	   
		$data['rating'] = $_POST['rating'];
		$data['u_id'] = $this->user_profile->user_id;
		$data['order_id'] = $_POST['order_id'];
		$data['recommended'] = $_POST['recommended'];
		$data['feed_comment'] = $_POST['feed_comment'];
		$data['rating_list'] = json_encode($_POST['qsn_feedback'],true);
	    if($this->cm->insert('rating',$data)){
			$res['status'] = 'OK';
			$res['type'] = 'success';
			$res['message'] = 'Thank you for your valuable feedback';
		}
		else
		{
			$res['status'] = 'ERR';
			$res['type'] = 'error';
			$res['message'] = 'fails to add';
		}
   
	   echo json_encode($res);
	}


}


?>