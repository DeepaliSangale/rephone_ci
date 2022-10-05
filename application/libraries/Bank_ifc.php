<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Bank_ifc class
 * Bank IFC API allows to get details of Bank details by its IFC code or
 * Post Office Branch Name of India. - See more at: https://ifsc-api.herokuapp.com/
 *
 */
class Bank_ifc {

    public $ifc_code;
    private $api_url;
    private $CI;
    
    public function ifc_request_herokuapp() {
        $this->api_url = "http://ifsc-api.herokuapp.com/";
        if (empty($this->ifc_code)) {
            $response['status'] = 'ERR';
            $response['message'] = 'Please provide a bank IFC code';
            echo json_encode($response);
            die();
        }
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->api_url . $this->ifc_code
        ));
        $resp = curl_exec($curl);
        curl_close($curl);               

        $decode_json = json_decode($resp);
        if ($decode_json == "Not Found") {
            $data['status'] = 'ERR';
            $data['message'] = 'Invalid IFC code please provide valid one';
            die(json_encode($data));
        } else {
            return $resp;
        }
    }

    public function ifc_request_firstatom() {
        $this->api_url = "http://ifsc.firstatom.org/key/N4ej37do61iDfH0n0a23GP87w/ifsc/".$this->ifc_code;
        
        if (empty($this->ifc_code)) {
            $response['status'] = 'ERR';
            $response['message'] = 'Please provide a bank IFC code';
            die(json_encode($response));
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->api_url
        ));
        $result = curl_exec($curl);
        
        $decode_json = json_decode($result, true);
        
        if ($decode_json == "invalid ifs code") {
            $data['status'] = 'ERR';
            $data['message'] = 'Invalid IFC code please provide valid one';
            die(json_encode($data));
        } else {
            $apiResponse = new stdClass();
            $apiResponse->IFSC = $this->ifc_code;
            $apiResponse->BANK = $decode_json['Bank'];
            $apiResponse->BRANCH = $decode_json['Branch'];
            $apiResponse->ADDRESS = $decode_json['Address'];
            $apiResponse->CONTACT = $decode_json['Contact'];
            $apiResponse->CITY = $decode_json['City'];
            $apiResponse->DISTRICT = $decode_json['District'];
            $apiResponse->STATE = $decode_json['State'];
            $apiResponse->MICR = $decode_json['MICR'];
                    
            return $apiResponse;
        }
    }
    
    public function get_data($api=NULL) {
        switch($api) {
            case 1:
                $response = $this->ifc_request_herokuapp();
                break;
            default :
                $response = $this->ifc_request_firstatom();
                break;
        }
        return $response;
    }
}
