<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists("getTruncatedCCNumber")) {
function getTruncatedCCNumber($ccNum){
        return str_replace(range(0,9), "X", substr($ccNum, 0, -5)) .  substr($ccNum, -5);
    }
    
}

?>