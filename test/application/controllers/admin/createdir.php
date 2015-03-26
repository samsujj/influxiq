<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* controller for landing page of front end
* @author: Arnab Chattopadhyay
*/
require APPPATH.'controllers/My_controller.php';

class Createdir extends My_Controller {

    private $i_edit_id = 0;
    public $per_page_show = 3;  

    public function __construct(){
        parent::__construct();
        $this->chk_user_access('admin');
        $this->load->library('form_validation');
        $this->load->model('product_model','mod_af');
        $this->load->helper('dropdown_helper');
        $this->load->helper('image');
        //$this->s_menu_id = 'menu_affle';
    }

    public function index() {  
        $thisdir = "192.168.1.27";
        $name = "Ryan-Hart";

        if(count($_POST)>0){
            //  pr($_POST,true);
            // mkdir($thisdir."ultra/".$name, 0700); 
            if(mkdir("./".$name, 0777)){
                echo "Directory is created";
                exit;
            }
            else{
               echo "Directory is not created";
                exit; 
            }
        }
        $this->render();
        //   mkdir(admin_url()."my_folder", 0777);
    }
    public function crd() {  
        //  $this->render();

    } 

}
