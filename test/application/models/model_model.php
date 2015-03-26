<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* An abstruct model for extending into other controllers.
* Here we will write the common functions
* 
* @author: Arnab Chattopadhyay
*/

require_once APPPATH.'models/my_model.php';
class Model_model extends My_model {

    public function __construct() {
        parent::__construct();
    }

    public function fetchMultiPackageData($i_product_id=""){
        
    }
    
}