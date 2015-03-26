<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require APPPATH.'controllers/My_controller.php';

    class CurlExp extends My_controller {

        public $m_send_data=array();
        public $per_page_show = 3;

        public function __construct(){
            parent::__construct();

            //$this->load->library('form_validation');
            //$this->load->helper('common_helper');     
            //$this->load->library('form_validation');
            //$this->load->model('my_model'); 
        }


        public function index(){
            
            
            //echo "1"; exit;
            
            $aff_name="Afffiliate In Curl";
            $aff_date="2009-08-01";
            $aff_email="test@ultra.com";
            $aff_url=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',6)),0,6);    
            $str='afname='.$aff_name.'&afemail='.$aff_email.'&afurl='.$aff_url.'&doa='.$aff_date.'';        
            $url = "http://ultraalarmsystems.com/affiliatesCurl/index";            
            $ch = curl_init();            
           // afname,afemail,afurl,doa
            curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // allow redirects
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
            curl_setopt($ch, CURLOPT_TIMEOUT, 0); // times out after Ns
            curl_setopt($ch, CURLOPT_POST, 1); // set POST method
            curl_setopt($ch, CURLOPT_POSTFIELDS,$str ); // add POST fields

            curl_setopt($ch, CURLOPT_FAILONERROR, 0);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_COOKIEFILE, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

            $result=curl_exec($ch);
            echo $result;
             
         //   $result = curl_exec($ch); // run the whole process 
        }
    }
?>
