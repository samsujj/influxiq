<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Controller to maintain user 
* @author: Arnab Chattopadhyay
*/
require APPPATH.'controllers/My_controller.php';

class contract extends My_Controller {

    private $i_edit_id = 0;
    public $per_page_show = 3;

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model','mod');
        $this->load->helper('csv_helper');
        $this->chk_user_access('admin');
        $this->s_menu_id = 'menu_product';
        $this->s_sub_menu_id = 'contract';
    }

    /**
    * function for registering an user
    */

    public function index(){
        $this->s_sub_menu_id = 'contract'; 
        
        $s_tab_name='contract';
        $s_select='*';

        $this->m_data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select);
        
        
               
        $this->render();        
    }
    
    public function add($s_id=""){
        $this->s_sub_menu_id = 'contract';
        $this->s_msg='';
        
        $this->m_data['i_id'] = $i_id = intval(strDecode($s_id)); 
        
        if($i_id < 0 || $i_id > 3)
        {
           redirect(admin_url().'contract'); 
        } 
        
        $s_tab_name='contract';
        $s_select='*';

        $this->m_data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select);
        
        if(count($_POST))
        {
            
                    $m_send_data[$this->input->post('type')] = get_safe($this->input->post('value')) ;
                    $s_tab_name='contract';
                    $m_where=array();
                    $m_data_arr = $m_send_data;
                    $b_ret_ = $this->mod->updateData($s_tab_name, $m_data_arr, $m_where);
                    
                    if($b_ret_)
                        redirect(admin_url().'contract');
                    else
                        $this->s_msg = 'Error Occured - Try Again';
                        
            
        }
        
        
               
        $this->render();        
    }
    
    

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
