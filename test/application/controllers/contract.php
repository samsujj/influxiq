<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/My_controller.php';

class Contract extends My_controller {

    public $m_send_data=array();
    public $per_page_show = 3;

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('common_helper');     
        $this->load->library('form_validation');
        $this->load->model('my_model','mod'); 
    }

    /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    *         http://example.com/index.php/welcome
    *    - or -  
    *         http://example.com/index.php/welcome/index
    *    - or -
    * Since this controller is set as the default controller in 
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see http://codeigniter.com/user_guide/general/urls.html
    */

    public function index()
    {           
        $s_tab_name='contract';
        $s_select='*';

        $data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select);

        $cat=$this->session->userdata('contract');

        if(count($cat))
        {
            //  pr($cat,true);
            foreach($cat as $key=>$val)
            {
                $s_tab_name='vw_product_details';
                $s_select='id,cat_id,name,price,insall_charge,platform_cost,transaction_charge,codeonly_price,image,package_duration,package_price,package_status,cat_id,cat_name,contract';

                if($val['val'] == 'NULL')
                    $m_where=array('id'=>$val['product_id'],'package_id'=>NULL);
                else
                    $m_where=array('id'=>$val['product_id'],'package_id'=>$val['val']);
                $s_group_by='id';
                $s_order_by_name = 'cat_id';
                $s_order_by = 'ASC';
                $data['details'][$key]=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by);

            }
        }
            if(count($_POST))
            {
                $this->form_validation->set_rules('fname','First Name','required');
                $this->form_validation->set_rules('lname','Last Name','required');
                $this->form_validation->set_rules('phone','Phone','required');
                $this->form_validation->set_rules('email','Email','required|valid_email');
                $this->form_validation->set_rules('signature','Signature','required');
                if($this->form_validation->run()!=FALSE)
                {
                    $send_data['fname']=$this->input->post('fname');  
                    $send_data['lname']=$this->input->post('lname');  
                    $send_data['phone']=$this->input->post('phone');  
                    $send_data['email']=$this->input->post('email');  
                    $send_data['signature']=$this->input->post('signature');  
                    $send_data['price']=$this->input->post('price');  
                    $send_data['product']=serialize(@$this->session->userdata('contract'));
                    // pr($this->input->post('product'),true);
                    $s_tab_name='order_details';
                    $this->mod->insertData($s_tab_name, $send_data);
                $this->session->unset_userdata('contract');
                redirect(base_url());

                }
                else
                {
                    $this->load->view('contract',$data);   
                }


            }
            else
            {
                 $this->load->view('contract',$data);

            }



        

        // pr($data['details'],true);

      

    }

    public function addContract()
    {
        $product_id=$_POST['product_id'];
        $type = $_POST['type'];
        $cart = $this->session->userdata('contract');
        $cart[$type]['product_id'] = $_POST['product_id'];
        $cart[$type]['val'] = $_POST['value'];
        $this->session->set_userdata('contract',$cart);
        echo 1;
    }

    public function addOrder()
    {
        if(count($_POST))
        {
            $this->form_validation->set_rules('fname','First Name','required');
            $this->form_validation->set_rules('lname','Last Name','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('signature','Signature','required');
            if($this->form_validation->run()!=FALSE)
            {
                $send_data['fname']=$this->input->post('fname');  
                $send_data['lname']=$this->input->post('lname');  
                $send_data['phone']=$this->input->post('phone');  
                $send_data['email']=$this->input->post('email');  
                $send_data['signature']=$this->input->post('signature');  
                $send_data['price']=$this->input->post('price');  
                $send_data['product']=serialize(@$this->session->userdata('contract'));
                // pr($this->input->post('product'),true);
                $s_tab_name='order_details';
                $this->mod->insertData($s_tab_name, $send_data);
                $this->session->unset_userdata('contract');
                redirect(base_url());

            }
            else
            {
                echo 2;

            }


        }
        else
        {
            redirect(base_url().'contract');
        }

    }



}


