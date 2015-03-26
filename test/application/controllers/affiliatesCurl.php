<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/My_controller.php';
class affiliatesCurl extends My_controller {

    public $m_send_data=array();
    public $per_page_show = 3;

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('common_helper');     
        $this->load->library('form_validation');
        $this->load->model('my_model'); 
    }
   public function index(){
      // echo 1; exit;
        $adate=date_format(date_create($_POST['doa']),'Y-m-d');
        $m_send_data['s_aff_name'] = get_safe($_POST['afname']);
        $m_send_data['s_aff_email'] = get_safe($_POST['afemail']);
        $m_send_data['t_aff_time'] = $adate;
        $m_send_data['s_aff_url'] = get_safe($_POST['afurl']);
       // print_r($m_send_data);s
       
      //  $m_send_data['s_seo_aff_url'] = get_safe($this->input->post("asfurl"));
      //  $m_send_data['s_service_aff_url'] = $this->input->post("aserfurl");
      
      /*  $adate="2012-03-02";
        $m_send_data['s_aff_name'] = "Test Affiliate";
        $m_send_data['s_aff_email'] = "test@gmail.com";
        $m_send_data['t_aff_time'] = $adate;
        $m_send_data['s_aff_url'] ="ffdex";
        
       */ 
        


        $i_inserted_id = $this->my_model->insertData('affiliation_details', $m_send_data);
        //echo "aaaa".$i_inserted_id;
        return($i_inserted_id);

        // inserting data into product image table[end]
       // add_msg('Affiliation inserted successfully!!', "ok");
       // redirect(admin_url().'affiliate/listing');
    }
    function index_seo()
{
    // echo 1; exit;
        $adate=date_format(date_create($_POST['doa']),'Y-m-d');
        $m_send_data['s_aff_name'] = get_safe($_POST['afname']);
        $m_send_data['s_aff_email'] = get_safe($_POST['afemail']);
        $m_send_data['t_aff_time'] = $adate;
        $m_send_data['s_seo_aff_url'] = get_safe($_POST['afurl']);
             $i_inserted_id = $this->my_model->insertData('affiliation_details', $m_send_data);
        //echo "aaaa".$i_inserted_id;
       // return($i_inserted_id);

      }


function index_service()
{
    // echo 1; exit;
        $adate=date_format(date_create($_POST['doa']),'Y-m-d');
        $m_send_data['s_aff_name'] = get_safe($_POST['afname']);
        $m_send_data['s_aff_email'] = get_safe($_POST['afemail']);
        $m_send_data['t_aff_time'] = $adate;
        $m_send_data['s_service_aff_url'] = get_safe($_POST['afurl']);
             $i_inserted_id = $this->my_model->insertData('affiliation_details', $m_send_data);
        //echo "aaaa".$i_inserted_id;
       // return($i_inserted_id);

      }
      
      function index_product()
{
    // echo 1; exit;
        $adate=date_format(date_create($_POST['doa']),'Y-m-d');
        $m_send_data['s_aff_name'] = get_safe($_POST['afname']);
        $m_send_data['s_aff_email'] = get_safe($_POST['afemail']);
        $m_send_data['t_aff_time'] = $adate;
        $m_send_data['s_aff_url'] = get_safe($_POST['afurl']);
             $i_inserted_id = $this->my_model->insertData('affiliation_details', $m_send_data);
        //echo "aaaa".$i_inserted_id;
       // return($i_inserted_id);

      }



    
    
}
