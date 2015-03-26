<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/My_controller.php';

class affiliates extends My_controller {

    public $m_send_data=array();
    public $per_page_show = 3;

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('common_helper');     
        $this->load->library('form_validation');
        $this->load->model('my_model'); 
    }

    public function index($type='',$code=''){
        $type=$this->uri->segment(2);
        $code=$this->uri->segment(3);
        //  exit;
        //   $aff_url=base_url()."affiliates/index/".$code."/".$type;
        $aff_url=$code; 
        $this->session->set_userdata("aff_url",$aff_url);
        switch($type){
            case 'product':$ret1_=$this->my_model->fetchSingleData("affiliation_details",array('s_aff_url'=>$code)); 
                break; 

            case 'seo':$ret1_=$this->my_model->fetchSingleData("affiliation_details",array('s_seo_aff_url'=>$code)); 
                break;

            case 'service':$ret1_=$this->my_model->fetchSingleData("affiliation_details",array('s_service_aff_url'=>$code)); 
                break;
        }

       // pr($ret1_,true);
        $m_aff['t_affhit_time']=date("Y-m-d H:i:s");
        $m_aff['s_affhit_ip']=getRealIpAddr();  
        $m_aff['i_aff_id']=$ret1_['i_aff_id'];
        $m_aff['s_aff_type']=$type;
        $m_aff['is_active']=1;

        $insert_id=$this->my_model->insertData("affliationhit_details",$m_aff);
        if($insert_id>0){
            if($type=='product'){
                redirect(base_url()."home/products.html");
            }
            else if($type=='seo'){
                    redirect(base_url()."home/marketing.html"); 
                }
                else{
                    redirect(base_url()."home/services.html");
            }
        }
        else{
            add_msg("Error Occured","err");
            redirect(base_url()."home/index.html");
            //  echo "Error Occures";
            //   exit;
        }

        //   exit;
    }

    public function createAffl(){
        $adate=date_format(date_create($this->input->post('doa')),'Y-m-d');
        $m_send_data['s_aff_name'] = get_safe($this->input->post("afname"));
        $m_send_data['s_aff_email'] = get_safe($this->input->post("afemail"));
        $m_send_data['t_aff_time'] = $adate;
        $m_send_data['s_aff_url'] = get_safe($this->input->post("afurl"));
        $m_send_data['s_seo_aff_url'] = get_safe($this->input->post("asfurl"));
        $m_send_data['s_service_aff_url'] = $this->input->post("aserfurl");


        $i_inserted_id = $this->mod_af->insertData('affiliation_details', $m_send_data);

        // inserting data into product image table[end]
        add_msg('Affiliation inserted successfully!!', "ok");
        redirect(admin_url().'affiliate/listing');
    }
}
