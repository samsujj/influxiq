<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/My_controller.php';

class Author extends My_controller {

    public $m_send_data=array();
    public $per_page_show = 3;

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('common_helper');  
        $this->load->helper('dropdown_helper');        
        $this->load->library('form_validation');
        $this->load->model('my_model','mod'); 
        $this->load->library('cart');
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

    public function index($stat="")
    {   
        //   echo '====================';
        //$config = Array("protocol" => "smtp",
        //        "smtp_host" => "ssl://smtp.googlemail.com",
        //        "smtp_port" => 465,
        //        "smtp_user" => "abhranil.involutiontech@gmail.com",
        //        "smtp_pass" => "involution" );
        // $this->load->library("email");
        //        $this->email->set_newline("\r\n"); /* for some reason it is needed */
        //        $this->email->from("abhranil.involutiontech@gmail.com", "Aditya Lesmana Test");
        //        $this->email->to("indrajit.involution@gmail.com");
        //        $this->email->subject("This is an email test");
        //        $this->email->message("it is working Darling :D");
        //        $this->email->set_mailtype("html");
        //$this->email->send();

        //        if($this->email->send())
        //        {
        //            echo "Your email was sent, dammit";
        //        }
        //        else
        //        {
        //            show_error($this->email->print_debugger());
        //        }

        //  exit;

        $data['i_state_id']="";
        if(count($_POST)>0){
            $this->form_validation->set_rules('fname','First Name','required');
            $this->form_validation->set_rules('lname','Last Name','required');
            $this->form_validation->set_rules('email','First Name','required|valid_email');
            $this->form_validation->set_rules('state','State','required');
            $this->form_validation->set_rules('city','City','required');
            $data['i_state_id']=get_safe($this->input->post('state'));
            if($this->form_validation->run()!=FALSE){
                $m_send_data['s_fname']=get_safe($this->input->post('fname'));
                $m_send_data['s_lname']=get_safe($this->input->post('lname'));
                $m_send_data['s_email']=get_safe($this->input->post('email'));
                $m_send_data['s_phone']=get_safe($this->input->post('phone'));
                $m_send_data['i_state']=get_safe($this->input->post('state'));
                $m_send_data['s_city']=get_safe($this->input->post('city'));
                $ret=$this->mod->insertData("author_details",$m_send_data);
                if($ret>0){

                    //$to = $m_send_data['s_email'];
//                    $subject = "Welcome Message";
//                    $txt = "Welcome Our New leads";
//                    $headers = "From: admin@influxiq.com" . "\r\n" ;
//                    mail($to,$subject,$txt,$headers);

                   $to ="debasiskar007@gmail.com,beto@influxiq.com,beto@influxiq.onmicrosoft.com";
                  //  $to ="debasiskar007@gmail.com";
                    $subject = "A new author lead registerd";
                    $str="A new lead has been registered at Influxiq author landing page.Please Login at influxiq.com/admin to view.<br/>
                     Details of the lead are<br/>
                     Name:".$m_send_data['s_fname']." ".$m_send_data['s_lname']."<br />Email:". $m_send_data['s_email']."<br />Phone:".$m_send_data['s_phone']."<br />State:".getStateName($m_send_data['i_state'])."<br />City:".$m_send_data['s_city']."";
                    $headers = "From: admin@influxiq.com" . "\r\n" ;
                    mail($to,$subject,$str,$headers);
                   // exit;






                    //  $this->email->cc('another@another-example.com');
                    // $this->email->bcc('them@their-example.com');

                    /* $this->email->subject('Welcome Message');
                    $this->email->set_newline("\r\n");
                    $this->email->message('Welcome Our New leads');
                    $this->email->send();

                    $this->email->from('i.auddy@rocketmail.com', 'Admin');
                    // $this->email->from('admin@influxiq.com', 'Your Name');
                    $this->email->to("abir.involutiontech@gmail.com");
                    //  $this->email->cc('another@another-example.com');
                    // $this->email->bcc('them@their-example.com');

                    $this->email->subject('A new author lead registerd');
                    $this->email->set_newline("\r\n");
                    //  $str="";
                    $str="Name:".$m_send_data['s_fname']." ".$m_send_data['s_lname']."<br />Email:". $m_send_data['s_email']."<br />Phone:".$m_send_data['s_phone']."<br />State:".getStateName($m_send_data['i_state'])."<br />City:".$m_send_data['s_city']."";

                    $this->email->message($str);
                    $this->email->send(); */

                   // add_msg("Author Add Success Fully","ok");
                }
                else{
                   // add_msg("Error Occured..Please Try Again","err");
                }
                redirect(base_url()."author/index/success");

            }
        }
        $data['s_js']=$this->add_js('jquery','jquery-ui','jquery.validationEngine','languages/jquery.validationEngine-en');
         $data['s_css']=$this->add_css('jquery-ui','validationEngine.jquery');
        $this->load->view('author',$data);

    }

    public function search($i_page=''){
        // echo $i_page; exit;

        $this->s_sub_menu_id = 'list_user';

        $this->load->library('pagination');
        $this->form_validation->set_rules("search","Search","required");
        $s_id=$this->input->post('search');


        if($this->form_validation->run()!=FALSE){
            $arr_elm=array($s_id);
            // pr($arr_elm,true);
            $this->session->set_userdata('arr_elm',$arr_elm);

            $s_tab_name='vw_user_details';
            $s_select='*';
            //$m_where=array('s_username'=>$s_id,'s_email'=>$s_id,'s_firstname'=>$s_id,'s_lastname'=>$s_id,'s_phone'=>$s_id,'s_address'=>$s_id,'s_gender'=>$s_id,'s_role_name'=>$s_id); 
            $m_where=$arr_elm[0];
            // if($i_user_role>0)
            // $m_where=array();
            $s_group_by='';
            $s_order_by_name = 'uid';
            $s_order_by = 'DESC';
            //  $i_perpage=$this->per_page_show;

            $retset1=$this->mod->fetchSearchUser1($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name); 
            $retset=$this->mod->fetchSearchUser1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name,$s_order_by,$this->per_page_show,$i_page);   
            $this->m_data['s_search']=$s_id;
            $this->m_data['search_arr']=$retset;
            $config['base_url']=admin_url()."user/search/"; 
            $config['total_rows']=count($retset1);
            $config['per_page']=$this->per_page_show;
            $config['num_links'] = 4;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            //   $config['full_tag_open'] = '<a>';
            //  $config['full_tag_close'] = '</a>';

        } 
        else{
            //$arr_elm=array($s_id);
            $sess_id=$this->session->userdata('arr_elm');
            //pr($sess_id,true); 
            if(!empty($sess_id)){

                $s_tab_name='vw_user_details';
                $s_select='*';
                // $m_where=array('s_username'=>$sess_id[0],'s_email'=>$sess_id[0],'s_firstname'=>$sess_id[0],'s_lastname'=>$sess_id[0],'s_phone'=>$sess_id[0],'s_address'=>$sess_id[0],'s_gender'=>$sess_id[0],'s_role_name'=>$sess_id[0]); 
                // if($i_user_role>0)
                // $m_where=array();
                $m_where=$sess_id[0];
                $s_group_by='';
                $s_order_by_name = 'uid';
                $s_order_by = 'DESC';
                //  $i_perpage=$this->per_page_show;

                $retset1=$this->mod->fetchSearchUser1($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name); 
                $retset=$this->mod->fetchSearchUser1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name,$s_order_by,$this->per_page_show,$i_page);   

                $this->m_data['s_search']=$s_id;
                $this->m_data['search_arr']=$retset;
                $config['base_url']=admin_url()."user/search/"; 
                $config['total_rows']=count($retset1);
                $config['per_page']=$this->per_page_show;
                $config['num_links'] = 4;
                $config['uri_segment'] = 4;
                $config['first_link'] = 'First';
                $config['last_link'] = 'Last';
                //$config['full_tag_open'] = '<a><a>';
                //$config['full_tag_close'] = '</a></a>';
            }
            else{
                add_msg("Please Enter the searching element",'ok');
                redirect(admin_url()."user/listing");
            }
        }

        /*    
        $config['base_url']=admin_url()."user/search/"; 
        $config['total_rows']=count($this->m_data['search_arr1']);
        $config['per_page']=$this->per_page_show;
        $config['num_links'] = 4;
        $config['uri_segment'] = 5;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open'] = '<a>';
        $config['full_tag_close'] = '</a>'; */
        // Multiple data fetching [end]
        // pr($this->m_data['m_dataset'],TRUE);

        // $this->add_js('add_edit_list');                       
        $this->pagination->initialize($config);
        $this->m_data['s_search']=$s_id;
        $this->render();
        //   $this->session->set_userdata('sarr',$m_arr);
        // redirect(admin_url().'user/listing');

        //echo $s_id;

    }
}


