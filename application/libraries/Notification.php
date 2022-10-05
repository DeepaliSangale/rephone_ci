<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification
{
	protected $CI;
    
	public function __construct()
	{
       $this->CI = & get_instance();
       
	}
	

	public function sms($data){
	    
	    $msg = urlencode($data['msg']);
        $mobile = $data['mobile'];
        
        $url = 'https://vsms.minavo.in/api/singlesms.php?auth_key=6fa71de2-a85b-4e5c-b99d-98206b02e77d&mobilenumber='.$mobile.'&message='.$msg.'&sid=DIGIMS&mtype=N&template_id=1007170905976505599';
     
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        
        return $response;

	}
	
	public function email($email_id,$subject,$message,$file=null)
	{
	    $this->email_conf();
	    $this->CI->email->from('info@dmspl.in', 'Rephone');
        $this->CI->email->to($email_id);
        
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);
       
        if(!empty($file))
        $this->CI->email->attach($file);
        return $this->CI->email->send();
	}
	
	public function email_conf()
	{
	    $config['useragent'] = "CodeIgniter";
        $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "localhost";
        $config['smtp_port'] = "25";
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $this->CI->load->library('email',$config);
	}
	
	

}
