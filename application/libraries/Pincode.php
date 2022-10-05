<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Bank_ifc class
 * Bank IFC API allows to get details of Bank details by its IFC code or
 * Post Office Branch Name of India. - See more at: https://ifsc-api.herokuapp.com/
 *
 */
class Pincode {

    public $pincode;
    private $api_url;
    private $CI;
    
    public function get_pincode_details() {
        $this->api_url = "https://api.postalpincode.in/pincode/";
        if (empty($this->pincode)) {
            $response['status'] = 'ERR';
            $response['message'] = 'Please provide a pincode code';
            echo json_encode($response);
            die();
        }
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->api_url . $this->pincode
        ));

        $response = curl_exec($curl);
        
      //  print_r($decode_json[0]['Message']); die;
        curl_close($curl);
        $decode_json = json_decode($response,true);
       
        if ($decode_json[0]['Status'] == "Error") {
            $data['status'] = 'ERR';
            $data['message'] = 'Invalid pin code please provide valid one';
            die(json_encode($data));
        } else {
            return $response;
        }
        
        
       /* $resp = curl_exec($curl);
        curl_close($curl);               

        $decode_json = json_decode($resp);
        if ($decode_json == "Error") {
            $data['status'] = 'ERR';
            $data['message'] = 'Invalid pin code please provide valid one';
            die(json_encode($data));
        } else {
            return $resp;
        }*/
    }

    
}
