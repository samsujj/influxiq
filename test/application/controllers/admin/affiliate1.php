<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* controller for landing page of front end
* @author: Arnab Chattopadhyay
*/
require APPPATH.'controllers/My_controller.php';

class Affiliate extends My_Controller {

    private $i_edit_id = 0;
    public $per_page_show = 3;  

    public function __construct(){
        parent::__construct();
        $this->chk_user_access('admin');
        $this->load->library('form_validation');
        $this->load->model('product_model','mod_af');
        $this->load->helper('dropdown_helper');
        $this->load->helper('image');
        $this->s_menu_id = 'menu_affle';
    }

    public function index() {
        $this->s_menu_id = 'menu_affle';
        redirect(admin_url()."affiliate/listing");
    }

    /**
    * function for product addition purpose
    */
    public function add() {
        $this->s_title .= " :: Affiliation Addition";
        $this->s_sub_menu_id = 'add_affle';
        // $this->chk_user_access('admin');

        $m_send_data = array();   
        $this->m_data['s_msg'] = ''; 
        if(count($_POST)>0) {
            try {
                /// Validation rule setting [start]
                $this->form_validation->set_rules('afname', 'Affiliate Name', 'required|callback_alpha_dash_space');
                $this->form_validation->set_rules('doa', 'Affiliate Date', 'required');
                $this->form_validation->set_rules('afurl', 'Affiliate URL', 'required|is_unique[affiliation_details.s_aff_url]');

                // $this->form_validation->set_message('is_unique', '%s already exists in database. Please select other.');

                /// Validation rule setting [end]
                $adate=date_format(date_create($this->input->post('doa')),'Y-m-d');
                $m_send_data['s_aff_name'] = get_safe($this->input->post("afname"));
                $m_send_data['t_aff_time'] = $adate;
                $m_send_data['s_aff_url'] = get_safe($this->input->post("afurl"));
                $m_send_data['i_active'] = 1;

                // data validation check
                if ($this->form_validation->run() !== FALSE) {

                    $i_inserted_id = $this->mod_af->insertData('affiliation_details', $m_send_data);

                    if($i_inserted_id>0){                    
                        // inserting data into product image table[end]
                        add_msg('Affiliation inserted successfully!!', "ok");
                        redirect(admin_url().'affiliate/listing');
                    } else {
                        $this->m_data['s_msg'] .= "Error occured!! Please try again..";
                    }

                }             
            } catch(Exception $e){
                echo $e->getMessage();
            }
        }
        $this->m_data['m_send_data'] = $m_send_data;
        $this->add_js('add_edit_list');
        // $this->add_js('add_edit_list');
        $this->add_js(array('tiny_mce/tiny_mce'));
        $this->render();
    }

    /**
    * function for product listing purpose
    */
    public function listing($i_page=""){
        $this->s_title .= " :: Affiliation Listing";
        $this->s_sub_menu_id = 'list_affle';

        $this->load->library('pagination');  
        $flag=0;
        //  $sdate=$this->input->post('sdate');
        //  $fdate=$this->input->post('fdate');
        $this->form_validation->set_rules('sdate', 'Starting Date', 'required');
        $this->form_validation->set_rules('fdate', 'Finishing Date', 'required');
        if ($this->form_validation->run() !== FALSE)
        {
            $sdate=date_format(date_create($this->input->post('sdate')),'Y-m-d');
            $fdate=date_format(date_create($this->input->post('fdate')),'Y-m-d'); 
            //exit;
            $date_val=array($sdate,$fdate);

            $s_tab_name='affiliation_details';
            $s_select='*';
            $m_where="`t_aff_time` between '".$sdate."' and '".$fdate."'";
            $s_group_by = 'i_aff_id';
            $s_order_by_name = "i_aff_id ";
            $s_order_by = "ASC";
            $i_perpage=$this->per_page_show;
            $this->m_data['m_dataset1'] = $this->product_model->fetchMultiDate($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    
            $retset= $this->product_model->fetchMultiDate($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);   

            // $fdate = date('Y-m-d', strtotime($fdate .' +1 day')); 
            //$m_where="`t_aff_time` between '".$sdate."' and '".$fdate."'";
            // $retset=$this->product_model->fetchMultiDate('affiliation_details',$m_where);
            // pr($retset,true);
            $this->session->set_userdata('csvarr1',$date_val);
            $this->m_data['m_dataset']=$retset;

            $config['base_url']=admin_url()."affiliate/listing/"; 
            $config['total_rows']=count($this->m_data['m_dataset1']);
            $config['per_page']=$this->per_page_show;
            $config['num_links'] = 4;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['full_tag_open'] = '<a>';
            $config['full_tag_close'] = '</a>';
            //  pr($this->m_data['m_dataset'],true);
            $this->pagination->initialize($config);
            $flag=1;
        }


        // Multiple data fetching [start]
        if($flag==0){
            $s_tab_name='affiliation_details';
            $s_select='*';
            $m_where=array();
            $s_group_by = 'i_aff_id';
            $s_order_by_name = "t_aff_time ";
            $s_order_by = "ASC";
            $i_perpage=$this->per_page_show;
            $this->m_data['m_dataset1'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    
            $this->m_data['m_dataset'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);   
            $sess_arr=array();
            $this->session->set_userdata('csvarr1',$sess_arr);    

            // $sess_arr=$this->m_data['m_dataset1']; 
            //pr($sess_arr);
            //$this->session->set_userdata('csvarr',$sess_arr);
            $config['base_url']=admin_url()."affiliate/listing/"; 
            $config['total_rows']=count($this->m_data['m_dataset1']);
            $config['per_page']=$this->per_page_show;
            $config['num_links'] = 4;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['full_tag_open'] = '<a>';
            $config['full_tag_close'] = '</a>';
            // Multiple data fetching [end]
            // pr($this->m_data['m_dataset'],TRUE);

            // $this->add_js('add_edit_list');
            $this->pagination->initialize($config);
            // Multiple data fetching [end] */
        }
        //   $this->add_js('add_edit_list');
        $this->render();
    }

    /**
    * function for product edit purpose
    * 
    * @param mixed $s_edit_id
    */
    public function edit($s_edit_id='') {
        $this->s_title .= " :: Affiliate Edit";
        $this->s_sub_menu_id = 'add_affle';
        $m_send_data = array();
        $i_edit_id = intval(strDecode($s_edit_id));
        if($i_edit_id<1)redirect(admin_url().'affiliate/listing');


        // Multiple data fetching [start]
        $s_tab_name='affiliation_details';
        $s_select='*';
        $m_where=array('i_aff_id'=>$i_edit_id);
        $s_group_by='';
        $retset = $this->mod_af->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by,'i_aff_id');
        unset($s_tab_name, $s_select, $m_where, $s_group_by);  
        // Multiple data fetching [end]

        if(count($retset)==0){
            add_msg("No product details found to edit", "info");
            redirect(admin_url().'affiliate/listing');
        }

        if(count($_POST)>0) {
            //pr($_FILES);
            //pr($_POST,true);
            try {
                /// Validation rule setting [start]

                $this->form_validation->set_rules('afname', 'Affiliate Name', 'required|callback_alpha_dash_space');
                $this->form_validation->set_rules('doa', 'Affiliate Date', 'required');
                $this->form_validation->set_rules('afurl', 'Affiliate URL', 'required|callback_affiliate_code_check');

                /// Validation rule setting [end]

                $m_send_data[0]['s_aff_name'] = get_safe($this->input->post("afname"));
                $adate=date_format(date_create($this->input->post('doa')),'Y-m-d');
                $m_send_data[0]['t_aff_time'] = $adate;
                $m_send_data[0]['s_aff_url'] = $this->input->post("afurl");


                // data validation check
                if ($this->form_validation->run()!== FALSE) {


                    //************ Multiple image upload and checking [start]

                    $s_tab_name='affiliation_details';
                    $m_data_arr = $m_send_data[0];
                    //  pr($m_data_arr,true);
                    $m_where=array('i_aff_id'=>$i_edit_id);
                    $b_ret_ = $this->mod_af->updateData($s_tab_name, $m_data_arr, $m_where);
                    unset($s_tab_name, $m_data_arr, $m_where);
                    // data update into Database [end]

                    if($b_ret_){
                        // inserting data into product image table[end]
                        add_msg('Affiliation updated successfully!!', "ok");
                        redirect(admin_url().'affiliate/listing');
                    } else {
                        $this->m_data['s_msg'] .= "Error occured!! Please try again..";
                    }
                }             
            } catch(Exception $e){
                echo $e->getMessage();
            }
        }else{
            if($i_edit_id>0){
                $m_send_data = $retset;
            }
        }

        $this->m_data['m_send_data'] = $m_send_data;
        $this->add_js('add_edit_list');
        $this->add_js(array('tiny_mce/tiny_mce'));
        $this->render();
    }

    public function search($i_page=""){

        //  echo $_SERVER['HTTP_REFERER'];
        $this->s_title .= " :: Affiliation Listing";
        $this->s_sub_menu_id = 'list_affle';

        $this->load->library('pagination');
        $this->form_validation->set_rules("search","Search","required");
        if($this->form_validation->run()!=FALSE){
            $s_id=$this->input->post('search');
            $arr_elm=array($s_id);
            $this->session->set_userdata('arr_elm',$arr_elm); 
            $s_tab_name='affiliation_details';
            $s_select='*';
            $m_where=array('i_aff_id'=>$s_id,'s_aff_name'=>$s_id,'t_aff_time'=>$s_id,'s_aff_url'=>$s_id); 
            // if($i_user_role>0)
            // $m_where=array();
            $s_group_by='';
            $s_order_by_name = 'i_aff_id';
            $s_order_by = 'DESC';
            //  $i_perpage=$this->per_page_show;

            $retset1=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name); 
            $retset=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name,$s_order_by,$this->per_page_show,$i_page);   

            $this->m_data['search_arr']=$retset;
            $config['base_url']=admin_url()."affilate/search/"; 
            $config['total_rows']=count($retset1);
            $config['per_page']=$this->per_page_show;
            $config['num_links'] = 4;
            $config['uri_segment'] = 5;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['full_tag_open'] = '<a>';
            $config['full_tag_close'] = '</a>';

            // $this->m_data['search_arr']=$this->mod_af->fetchSearchUser("ultra_affiliation_details","*",$s_id);
        } 
        else{
            $sess_id=$this->session->userdata('arr_elm');          
            if(!empty($sess_id)){
                $s_tab_name='affiliation_details';
                $s_select='*';
                $m_where=array('i_aff_id'=>$sess_id[0],'s_aff_name'=>$sess_id[0],'t_aff_time'=>$sess_id[0],'s_aff_url'=>$s_id[0]); 
                // if($i_user_role>0)
                // $m_where=array();
                $s_group_by='';
                $s_order_by_name = 'i_aff_id';
                $s_order_by = 'DESC';
                //  $i_perpage=$this->per_page_show;

                $retset1=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name); 
                $retset=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name,$s_order_by,$this->per_page_show,$i_page);   

                $this->m_data['search_arr']=$retset;
                $config['base_url']=admin_url()."affilate/search/"; 
                $config['total_rows']=count($retset1);
                $config['per_page']=$this->per_page_show;
                $config['num_links'] = 4;
                $config['uri_segment'] = 5;
                $config['first_link'] = 'First';
                $config['last_link'] = 'Last';
                $config['full_tag_open'] = '<a>';
                $config['full_tag_close'] = '</a>'; 
            }else{
                add_msg("Please Enter the searching element",'ok');
                redirect(admin_url()."affiliate/listing");
            }
        }
        $this->m_data['s_search']=$s_id;
        $this->render();
    }

    public function affiliatetrack($i_page=''){
        $this->s_title .= " :: Affiliation Track Listing";
        $this->s_sub_menu_id = 'list_affle_track';

        $this->load->library('pagination');  

        // Multiple data fetching [start]
        $s_tab_name='vw_affiliatehit_details';
        $s_select='i_aff_id,s_aff_name,s_affhit_ip,t_affhit_time,count(`i_aff_id`) as `counthit`';
        /* if($aff_id==''){
        }
        else{ */    
        $m_where=array();
        //  }
        //  $s_group_by = 'i_affhit_id';
        $s_order_by_name = "t_affhit_time";
        $s_order_by = "ASC";
        $i_perpage=$this->per_page_show;

        $s_group_by = 's_aff_name';
        $this->m_data['m_dataset1'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    
        $this->m_data['m_dataset'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$this->per_page_show,$i_page);    

        $config['base_url']=admin_url()."affiliate/affiliatetrack/"; 
        $config['total_rows']=count($this->m_data['m_dataset1']);
        $config['per_page']=$this->per_page_show;
        $config['num_links'] = 4;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open'] = '<a>';
        $config['full_tag_close'] = '</a>';
        // Multiple data fetching [end]
        // pr($this->m_data['m_dataset'],TRUE);

        // $this->add_js('add_edit_list');
        $this->pagination->initialize($config);
        //  $this->m_data['m_dataset'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);   
        $this->render();


    }


    public function afftrackdetails($s_aff_id="",$i_page=""){
        $this->s_title .= " :: Affiliation Track Listing Details";
        $this->s_sub_menu_id = 'list_affle_track';

        $this->session->set_userdata('aff_id',$s_aff_id);

        $this->load->library('pagination');  

        // Multiple data fetching [start]
        $s_tab_name='affliationhit_details';
        $s_select='*';
        if($s_aff_id==''){
            $m_where=array();
        }
        else{  
            $aff_id=intval(strDecode($s_aff_id));   
            $m_where=array('i_aff_id'=>$aff_id);
        }
        $s_group_by = 'i_affhit_id';
        $s_order_by_name = "t_affhit_time";
        $s_order_by = "ASC";
        $i_perpage=$this->per_page_show;

        $this->m_data['m_dataset1'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);
        $this->m_data['m_dataset'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);    

        $config['base_url']=admin_url()."affiliate/afftrackdetails/".$s_aff_id."/"; 
        $config['total_rows']=count($this->m_data['m_dataset1']);
        $config['per_page']=$this->per_page_show;
        $config['num_links'] = 4;
        $config['uri_segment'] = 5;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open'] = '<a>';
        $config['full_tag_close'] = '</a>';
        // Multiple data fetching [end]
        // pr($this->m_data['m_dataset'],TRUE);

        // $this->add_js('add_edit_list');
        $this->pagination->initialize($config);

        //  $this->m_data['m_dataset'] = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);   
        $this->render();
    }


    public function affsearchtrack($i_page=""){

        $this->s_title .= " :: Affiliation Tracking Listing";
        $this->s_sub_menu_id = 'list_affle_track';

        $this->load->library('pagination');
        $this->form_validation->set_rules("search","Search","required");
        if($this->form_validation->run()!=FALSE){
            $s_id=$this->input->post('search');
            $arr_elm=array($s_id);
            $this->session->set_userdata('arr_elm_track',$arr_elm);
            $s_tab_name='vw_affiliatehit_details';
            //$s_select='*';
            $s_select='i_aff_id,s_aff_name,s_affhit_ip,t_affhit_time,count(`i_aff_id`) as `counthit`'; 
            $m_where=array('i_aff_id'=>$s_id,'s_aff_name'=>$s_id); 
            // if($i_user_role>0)
            // $m_where=array();
            $s_group_by='';
            $s_order_by_name = 'i_aff_id';
            $s_order_by = 'DESC';
            //  $i_perpage=$this->per_page_show;

            $retset1=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name); 
            $retset=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name,$s_order_by,$this->per_page_show,$i_page);   

            $this->m_data['search_arr']=$retset;
            $config['base_url']=admin_url()."affilate/affsearchtrack/"; 
            $config['total_rows']=count($retset1);
            $config['per_page']=$this->per_page_show;
            $config['num_links'] = 4;
            $config['uri_segment'] = 5;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['full_tag_open'] = '<a>';
            $config['full_tag_close'] = '</a>';

            //  $this->m_data['search_arr']=$this->mod_af->fetchSearchAfftrack("ultra_vw_affiliatehit_details","i_aff_id,s_aff_name,s_affhit_ip,t_affhit_time,count(`i_aff_id`) as `counthit`",$s_id);
        } 
        else{
            add_msg("Please Enter the searching element",'ok');
            redirect(admin_url()."affiliate/affiliatetrack");
        }
        $this->m_data['s_search']=$s_id; 
        $this->render();   
    }

    public function affsearchtrackdet($s_aff_id='',$i_page=""){
        // if()
        $i_aff_id=strDecode($s_aff_id);
        if($s_aff_id==""){
            $this->m_data['s_aff_id']=$this->session->userdata('aff_id');
        }
        else{
            $this->m_data['s_aff_id']=$this->session->userdata('aff_id');   
        }
        $this->s_title .= " :: Affiliation Listing";
        $this->s_sub_menu_id = 'list_affle_track';
        //i_aff_id=intval(strDecode($s_aff_id));
        $this->load->library('pagination');
        $this->form_validation->set_rules("search","Search","required");
        if($this->form_validation->run()!=FALSE){
            $s_id=$this->input->post('search');
            $arr_elm=array($s_id);
            $this->session->set_userdata('arr_elm_track',$arr_elm);

            $s_tab_name='affliationhit_details';
            //$s_select='*';
            $s_select='*'; 
            $m_where=array('i_affhit_id'=>$s_id,'t_affhit_time'=>$s_id,'s_affhit_ip'=>$s_id); 
            $m_where1=array('i_aff_id');  


            // if($i_user_role>0)
            // $m_where=array();
            $s_group_by='';
            $s_order_by_name = 'i_affhit_id';
            $s_order_by = 'DESC';
            //  $i_perpage=$this->per_page_show;

            $retset1=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name); 
            $retset=$this->mod_af->fetchAffiliate1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name,$s_order_by,$this->per_page_show,$i_page);   

            $this->m_data['search_arr']=$retset;
            $config['base_url']=admin_url()."affilate/affsearchtrackdet/".$s_aff_id."/"; 
            $config['total_rows']=count($retset1);
            $config['per_page']=$this->per_page_show;
            $config['num_links'] = 4;
            $config['uri_segment'] = 5;
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['full_tag_open'] = '<a>';
            $config['full_tag_close'] = '</a>';



            // $this->m_data['search_arr']=$this->mod_af->fetchSearchAfftrackDet("ultra_affliationhit_details","*",$s_id,$i_aff_id);
            /*if(empty($this->m_data['search_arr'])){
            redirect(admin_url()."affiliate/affsearchtrackdet/".$s_aff_id); 
            }   */
        } 
        else{
            add_msg("Please Enter the searching element",'ok');
            $this->session->set_userdata('m_id',$s_aff_id);
            redirect(admin_url()."affiliate/affsearchtrackdet/".$s_aff_id);
        }
        $this->m_data['s_search']=$s_id;
        $this->render();   
    }


    function download(){
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);     
        $arr1=$this->session->userdata('csvarr1'); 
        if(empty($arr1)){
            $s_tab_name='ultra_affiliation_details';
            $s_select='i_aff_id,s_aff_name,t_aff_time,s_aff_url';
            $m_where=array(); 
            // if($i_user_role>0)
            $m_where=array();
            $s_group_by='';
            $s_order_by_name='i_aff_id';
            $s_order_by = 'ASC';
            //  $i_perpage=$this->per_page_show;

            $retset=$this->mod_af->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name); 
        }
        else{

            $s_tab_name='affiliation_details';
            $s_select='i_aff_id,s_aff_name,t_aff_time,s_aff_url';
            $m_where="`t_aff_time` between '".$arr1[0]."' and '".$arr1[1]."'";
            $s_group_by = 'i_aff_id';
            $s_order_by_name = "i_aff_id ";
            $s_order_by = "ASC";
            $i_perpage=$this->per_page_show;
            $retset=$this->product_model->fetchMultiDate($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    
        }
        //pr($retset,true);
        $heading=array('Affiliation ID','Affiliation Name','Affiliation Time','Affiliation URL');
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"Affiliation.csv");
    }

    function download1(){
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);     
        $val=$this->session->userdata('arr_elm');
        $s_select="i_aff_id,s_aff_name,t_aff_time,s_aff_url";
        $retset=$this->mod_af->fetchSearchUser("ultra_affiliation_details",$s_select,$val[0]);
        //pr($retset,true);

        $heading=array('Affiliation ID','Affiliation Name','Affiliation Time','Affiliation URL');
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"Affiliation.csv");
    }


    function downloadafftrack(){
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);     
        $s_tab_name='vw_affiliatehit_details';
        $s_select='i_aff_id,s_aff_name,count(`i_aff_id`) as `counthit`';
        /* if($aff_id==''){
        }
        else{ */    
        $m_where=array();
        //  }
        //  $s_group_by = 'i_affhit_id';
        $s_order_by_name = "t_affhit_time";
        $s_order_by = "ASC";
        $i_perpage=$this->per_page_show;

        $s_group_by = 's_aff_name';
        $retset = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    

        //pr($retset,true);
        $heading=array('Affiliation ID','Affiliation Name','Total Hits');
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"AffiliationTracking.csv");
    }

    function downloadafftrackdetails($s_aff_id=""){
        $this->load->helper('csv');


        $s_tab_name='ultra_affliationhit_details';
        $s_select='i_affhit_id,t_affhit_time,s_affhit_ip';
        /* if($aff_id==''){
        }
        else{ */    
        $m_where=array('i_aff_id'=>$s_aff_id);
        //  }
        //  $s_group_by = 'i_affhit_id';
        $s_order_by_name = "t_affhit_time";
        $s_order_by = "ASC";
        // $i_perpage=$this->per_page_show;

        $s_group_by = 'i_affhit_id';
        $retset = $this->product_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    

        //pr($retset,true);
        $heading=array('Affiliate ID','Hitting Time','Hitting IP');
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"AffiliationTrackingDetails.csv");
    }


    function downloadaffserchtrackdetails($s_aff_id=""){
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);    
        // $sess_aff_id=$this->session->userdata('aff_id');
        // pr($sess_aff_id,true);
        $i_aff_id=strDecode($s_aff_id);
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);    
        // $sess_aff_id=$this->session->userdata('aff_id');
        // pr($sess_aff_id,true);
        $sess_aff=$this->session->userdata('arr_elm_track'); 
        $retset=$this->mod_af->fetchSearchAfftrackDet("ultra_affliationhit_details","i_affhit_id,t_affhit_time,s_affhit_ip",$sess_aff[0],$i_aff_id);

        //pr($retset,true);


        //pr($retset,true);
        $heading=array('Affiliate ID','Hitting Time','Hitting IP');
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"AffiliationTrackingDetails.csv");
    }



    function downloadaffsearchtrack(){
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);     
        $val=$this->session->userdata('arr_elm_track');
        //pr($val,true);
        $s_tab_name='ultra_vw_affiliatehit_details';
        $s_select='i_aff_id,s_aff_name,count(`i_aff_id`) as `counthit`';
        $retset=$this->mod_af->fetchSearchAfftrack($s_tab_name,$s_select,$val[0]);
        //pr($retset,true);

        $heading=array('Affiliation ID','Affiliation Name','Total Hits');  
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"AffiliationTracking.csv");
    }

    /**
    * function for product delete purpose
    * 
    * @param mixed $s_id
    */
    public function del($s_id='') {        
        (!is_superadmin())?redirect(admin_url()):"";

        $i_id = intval(strDecode($s_id));

        $m_where = array('i_aff_id '=>$i_id);
        $ret_ = $this->mod_af->delData('affiliation_details', $m_where);


        if($ret_>0){ 
            add_msg('Affiliation deleted successfully!!', "ok");
        }else{
            add_msg('Affiliation not deleted!!', "err");
        }
        redirect(admin_url().'affiliate/listing');
    }

    public function delafftrack($s_id='') {        
        (!is_superadmin())?redirect(admin_url()):"";

        $i_id = intval(strDecode($s_id));

        $m_where = array('i_affhit_id'=>$i_id);
        $ret_ = $this->mod_af->delData('affliationhit_details', $m_where);


        if($ret_>0){ 
            add_msg('Affiliation hitting details deleted successfully!!', "ok");
        }else{
            add_msg('Affiliation hitting details not deleted!!', "err");
        }
        redirect(admin_url().'affiliate/affiliatetrack');
    }

    public function alpha_dash_space($str)
    {  //$this IS CI_Form_Validation
        $this->form_validation->set_message('alpha_dash_space', 'The %s field can only contain Alphabetical Characters, Spaces and Dashes.'); 
        return ( ! preg_match("/^([-a-z _-])+$/i", $str)) ? FALSE : TRUE;
    }  


    public function affiliate_code(){
        echo $str=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',6)),0,6);
        //  exit;        
    }





    //manage-product-types-del
    /*   public function manage_product_types_del($s_id='') {

    // Checking admin access
    (!is_admin())?redirect(admin_url()):"";
    $i_id = intval(strDecode($s_id));

    // Deleting from package details table
    $m_where = array('id'=>$i_id);
    $ret_ = $this->product_model->delData('product_type', $m_where);
    if($ret_>0){            
    add_msg('Product deleted successfully!!', "ok");
    }else{
    add_msg('Product not deleted!!', "err");
    }
    redirect(admin_url().'product/manage-product-types.html');
    } */

    // testing purpose
    public function test(){
        /*$format = '%d/%m/%Y';
        echo strptime('20/10/2010', $format);*/
        echo strtotime('03/06/2012');
        echo "<br />".getExt('asd.ss');
        echo "<br />".getName('asd.ll.ss');
    }


    public function change_state($s_state='', $s_enc_id=''){
        $i_is_allow = ($s_state=='allow')?1:2;
        $i_id = intval(strDecode($s_enc_id));

        $ret_ = $this->mod_af->updateData('catagory_details', array('i_active'=>$i_is_allow), array('i_cat_id'=>$i_id));
        if($ret_){
            ($i_is_allow==1)?add_msg("Catagory is active now.", 'ok'):add_msg("Catagory is inactive now", 'ok');
        }else{
            add_msg("Blog status change not done");
        }
        redirect(admin_url().'product/listing.html');
    }

    public function affiliate_code_check($s_aff_code) {
        $val=$this->input->post('afurl');
        //$arr1=explode('~',$val);
        // pr($arr1,TRUE);
        $ret1_=$this->mod_af->fetchMultiDataCount('affiliation_details',array('s_aff_url'=>$val));
        $ret_ = $this->mod_af->fetchSingleData('affiliation_details', array('i_aff_id'=>$this->i_edit_id,'s_aff_url'=>$s_aff_code));
        if (count($ret_)>0) {
            // pr($ret1_,TRUE);
            if($ret_['i_aff_id']==$ret1_[0]['i_aff_id']){
                return TRUE;
            }
            else{
                $this->form_validation->set_message('affiliate_code_check', '%s already exists in database. Please select other.');
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }


    /*  public function category_pos_check($i_pos) {
    $val=$this->input->post('h_cpos');
    $arr1=explode('~',$val);
    // pr($arr1,TRUE);
    $ret1_=$this->product_model->fetchMultiDataCount('catagory_details',array('i_cat_position'=>$val));
    $ret_ = $this->product_model->fetchSingleData('catagory_details', array('i_cat_id !='=>$this->i_edit_id, 'i_cat_position'=>$i_pos));
    if (count($ret_)>0) {
    // pr($ret1_,TRUE);
    if($ret_['i_cat_id']==$ret1_[0]['i_cat_id']){
    return TRUE;
    }
    else{
    $this->form_validation->set_message('category_pos_check', '%s already exists in database. Please select other.');
    return FALSE;
    }
    } else {
    return TRUE;
    }
    } */


}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
