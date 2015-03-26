<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Controller to maintain user 
* @author: Arnab Chattopadhyay
*/
require APPPATH.'controllers/My_controller.php';

class User extends My_Controller {

    private $i_edit_id = 0;
    public $per_page_show = 3;

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model','mod');
        $this->load->helper('csv_helper');
        $this->chk_user_access('admin');
        $this->s_menu_id = 'menu_user';
    }

    /**
    * function for registering an user
    */

    public function index(){
        $this->s_sub_menu_id = 'list_user';        
        redirect(admin_url()."user/listing");        
    }

    public function add() {
        $this->s_title .= " :: User Addition";
        // setting sub-menu items
        $this->s_sub_menu_id = 'add_user';

        $m_send_data = array();
        // If registration data posted        
        if(count($_POST)>0)
        {
            //pr($_POST, TRUE);
            $this->form_validation->set_rules('fname', 'First Name', 'required|callback_alpha_dash_space');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|callback_alpha_dash_space');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_details.s_email]'); 
            $this->form_validation->set_rules('phone', 'Phone Number', 'required|callback_user_phone_valid|is_unique[user_details.s_phone]|callback_user_phone_unique_check');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('user_role', 'User Role', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[user_details.s_username]');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]|min_length[6]');
            $this->form_validation->set_rules('repassword', 'Confirm Password', 'required');

            $this->form_validation->set_message('is_unique', '%s already exists in database. Please select other.');

            if ($this->form_validation->run() !== FALSE)    // If data is valid then insert into database
            {
                $m_send_data['s_username'] = get_safe($this->input->post("username"));
                $m_send_data['s_email'] = get_safe($this->input->post("email"));
                $password = get_safe($this->input->post("password"));
                $m_send_data['s_password'] = strEncode1($password);
                $m_send_data['s_firstname'] = get_safe($this->input->post("fname"));
                $m_send_data['s_lastname'] = get_safe($this->input->post("lname"));
                $m_send_data['s_phone'] = get_safe($this->input->post("phone"));
                $m_send_data['s_address'] = get_safe($this->input->post("address"));
                $m_send_data['s_gender'] = get_safe($this->input->post("gender"));
                $m_send_data['i_user_role'] = intval($this->input->post("user_role"));
                $m_send_data['i_active'] = 1;
                // Inserting user data into database
                $i_inserted_id = $this->mod->insertData('user_details', $m_send_data);
                if($i_inserted_id>0) {
                    // Adding message
                    add_msg("User added successfully.", "ok");
                    // redirecting the user to home page
                    redirect(admin_url().'user/listing.html');
                } else {
                    $this->m_data['s_msg'] = "Error occured!! Please try again..";
                }
            }

        }
        $this->add_js('add_edit_list');
        // $this->add_js('add_edit_list');
        $this->add_js(array('tiny_mce/tiny_mce'));
        $this->render();
    }

    /**
    * function for user listing
    */
    public function listing($i_page=''){
        $this->s_title .= " :: User Listing";

        $this->load->library('pagination');

        $this->s_sub_menu_id = 'list_user';

        $id=show_id();
        $s_tab_name='vw_user_details';
        $s_select='*';

        $m_where=array('uid'=>$id);
        $s_group_by='';
        $s_order_by_name = 'uid';
        $s_order_by = 'DESC';
        $i_perpage=$this->per_page_show;
        //  $i_perpage=$this->per_page_show;
        $result=$this->mod->fetchMultiData1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name);
      //  $this->session->set_userdata('result',$result);
        $this->m_data['m_dataset1']=$result;

        $this->m_data['m_dataset'] = $this->mod->fetchMultiData1($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);   

        $config['base_url']=admin_url()."user/listing/"; 
        $config['total_rows']=count($this->m_data['m_dataset1']);
        $config['per_page']=$this->per_page_show;
        $config['num_links'] = 4;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';

        $this->pagination->initialize($config);

        $this->render();
    }


    function download(){
       // echo 1;
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);     

        $s_tab_name='vw_user_details';
        $s_select='uid,s_username,s_email,s_firstname,s_lastname,s_phone,s_address,s_gender,t_login_time,t_logout_time,s_role_name';
        $m_where=array(); 
        // if($i_user_role>0)
        $m_where=array();
        $s_group_by='';
        $s_order_by_name = 'uid';
        $s_order_by = 'DESC';
        //  $i_perpage=$this->per_page_show;

        $retset=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name);
                //pr($retset,true);   
        $heading=array('User Id','User Name','User Email','First Name','Last Name','Phone Number','Address','Gender','Login Time','Logout Time','User Role');
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"apply.csv");
    }
    function download1(){
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);     
        $val=$this->session->userdata('arr_elm');
        $s_select="uid,s_username,s_email,s_firstname,s_lastname,s_phone,s_address,s_gender,t_login_time,t_logout_time,s_role_name";
        $retset=$this->mod->fetchSearchUser("influxiq_vw_user_details",$s_select,$val[0]);
        //pr($retset,true);

        $heading=array('User Id','User Name','User Email','First Name','Last Name','Phone Number','Address','Gender','Login Time','Logout Time','User Role');
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"apply.csv");
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

    public function details($s_edit_id='',$i_page=''){
        $this->s_title .= " :: User Login Details";
        $this->s_sub_menu_id = 'list_user';

        $this->load->library('pagination');

        $i_edit_id = intval(strDecode($s_edit_id));

        $s_tab_name='loggin_details';
        $s_select='*';
        // $m_where=array(); 
        // if($i_user_role>0)
        $m_where=array('i_user_id'=>$i_edit_id);
        $s_group_by='';
        $s_order_by_name = 't_loggin_time';
        $s_order_by = 'DESC';
        $i_perpage=$this->per_page_show;
        $this->m_data['m_dataset1']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name); 

        $this->m_data['m_dataset'] = $this->mod->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name,$s_order_by,$i_perpage,$i_page);

        $config['base_url']=admin_url()."user/details/".$s_edit_id."/"; 
        $config['total_rows']=count($this->m_data['m_dataset1']);
        $config['per_page']=$this->per_page_show;
        //  $config['suffix'] = '?'.http_build_query($_GET, '', "&");
        //  $config['page_query_string'] = TRUE;
        $config['num_links'] = 4;
        $config['uri_segment'] = 5;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open'] = '<a><a>';
        $config['full_tag_close'] = '</a></a>';
        // Multiple data fetching [end]
        // pr($this->m_data['m_dataset'],TRUE);

        // $this->add_js('add_edit_list');
        $this->pagination->initialize($config);

        $this->render();


    }


    public function myaccnt($s_id){
        if($s_id==''){
            redirect(admin_url()."home/index");
        }
        $i_id=intval(strDecode($s_id)); 
        if(count($_POST)>0){
            $this->form_validation->set_rules('cur_pass','Current Password','required|min_length[6]');
            $this->form_validation->set_rules('new_pass','New Password','required|min_length[6]|matches[re_pass]');
            $this->form_validation->set_rules('re_pass','Reenter New Password','required|min_length[6]');
            if($this->form_validation->run()!=FALSE){
                $curr_pwd=strEncode1($this->input->post('cur_pass'));
                $ret_=$this->mod->fetchMultiData("vw_user_details","*",array('s_password'=>$curr_pwd,'uid'=>$i_id),"","uid");  


                if(!empty($ret_)){
                    $new_pwd=$this->input->post('new_pass');
                    $m_arr['s_password']=strEncode1($new_pwd);
                    $ret1_=$this->mod->updateData1("vw_user_details",$m_arr,array('uid'=>$i_id));
                    if($ret1_>0){
                        add_msg("Password Updated Successfuly");
                        redirect(admin_url()."user/myaccnt/".$s_id); 
                    }


                } else{
                    add_msg("Invalid Password");
                    redirect(admin_url()."user/myaccnt/".$s_id);
                }
            } 

        }

        $s_tab_name="vw_user_details" ;
        $s_select='*';
        // $m_where=array(); 
        // if($i_user_role>0)
        $m_where=array('uid'=>$i_id);
        $s_group_by='';
        $s_order_by_name = 't_login_time';
        // $s_order_by = 'DESC';
        $this->m_data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name);

        $this->render();
    }

    /**
    * function for userdetails edit
    */
    public function edit($s_edit_id='') {
        $this->s_title .= " :: User Edit";
        // setting sub-menu items
        $this->s_sub_menu_id = 'add_user';
        $m_send_data = array();

        $i_edit_id = intval(strDecode($s_edit_id));
        if($i_edit_id<1)redirect(base_url().'user/listing.html');

        $this->i_edit_id = $i_edit_id;


        // Single data fetching [start]
        $s_tab_name='vw_user_details';
        $m_where=array('uid'=>$i_edit_id);
        $retset = $this->mod->fetchSingleData($s_tab_name, $m_where);  
        // pr($retset,TRUE);
        unset($s_tab_name, $m_where);  
        // Single data fetching [end]

        if(count($retset)==0){
            add_msg("No User details found to edit", "info");
            redirect(admin_url().'user/listing.html');
        }

        if(count($_POST)>0) {
            //pr($_FILES);
            //pr($_POST,true);



            try {
                /// Validation rule setting [start]
                $this->form_validation->set_rules('fname', 'First Name', 'required|callback_alpha_dash_space');
                $this->form_validation->set_rules('lname', 'Last Name', 'required|callback_alpha_dash_space');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
                $this->form_validation->set_rules('phone', 'Phone Number', 'required|callback_user_phone_valid|callback_user_phone_unique_check');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('user_role', 'User Role', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
                /// Validation rule setting [end]

                $this->form_validation->set_message('is_unique', '%s already exists in database. Please select other.');

                // data validation check
                if ($this->form_validation->run() !== FALSE) {

                    $m_send_data['s_firstname'] = get_safe($this->input->post("fname"));
                    $m_send_data['s_lastname'] = get_safe($this->input->post("lname"));
                    $m_send_data['s_email'] = get_safe($this->input->post("email"));
                    $m_send_data['s_phone'] = get_safe($this->input->post("phone"));
                    $m_send_data['s_address'] = get_safe($this->input->post("address"));
                    $m_send_data['s_gender'] = get_safe($this->input->post("gender"));
                    $m_send_data['i_user_role'] = intval($this->input->post("user_role"));
                    // data update into Database [start]
                    $s_tab_name='user_details';
                    $m_data_arr = $m_send_data;
                    $m_where=array('uid'=>$i_edit_id);
                    $b_ret_ = $this->mod->updateData($s_tab_name, $m_data_arr, $m_where);
                    unset($s_tab_name, $m_data_arr, $m_where);
                    // data update into Database [end]

                    if($b_ret_){
                        //  pr($b_ret_,true);
                        $s_tab_name1='user_details';
                        $m_data_arr1=array('i_user_role'=>2);
                        $m_where1=array('uid'=>"!".$i_edit_id,'i_user_role'=>1);
                        $b_ret1_ = $this->mod->updateData1($s_tab_name1, $m_data_arr1, $m_where1);
                        if($b_ret1_>0){
                            add_msg('User data updated successfully!!', "ok");
                            redirect(admin_url().'user/listing.html');
                        }
                        else{
                            $this->m_data['s_msg'] = "Error occured!! Please try again.."; 
                        }
                    } else {
                        $this->m_data['s_msg'] = "Error occured!! Please try again..";
                    }
                }
            } catch(Exception $e){
                echo $e->getMessage();
            }
        }
        if($i_edit_id>0){
            $m_send_data = $retset;
        }



        $this->m_data['m_send_data'] = $m_send_data;
        $this->add_js('add_edit_list');
        //$this->add_js('add_edit_list');
        // $this->add_js('add_edit_list');
        $this->add_js(array('tiny_mce/tiny_mce'));
        $this->render();
    }

    public function alpha_dash_space($str)
    {  //$this IS CI_Form_Validation
        $this->form_validation->set_message('alpha_dash_space', 'The %s field can only contain Alphabetical Characters, Spaces and Dashes.'); 
        return ( ! preg_match("/^([-a-z _-])+$/i", $str)) ? FALSE : TRUE;
    }  

    /*public function user_phone_valid($str){
    $this->form_validation->set_message('user_phone_valid', 'The %s field can only contain valid phone number.'); 
    return ( ! preg_match("/^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$/", $str)) ? FALSE : TRUE;
    }*/



    public function user_phone_valid($str){
        $this->form_validation->set_message('user_phone_valid', 'The %s field can only contain valid phone number.'); 
        if($str[0]=='0'){
            return FALSE;
        }
        else{
            return (!preg_match("/^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$/", $str))?FALSE:TRUE;

        }        
    }        

    public function user_phone_unique_check($str){
        $this->form_validation->set_message('user_phone_unique_check', 'The %s field can contain unique phone no.');
        $str1="";
        $var=explode("-",$str);
        //pr($var,true);
        for($i=0;$i<count($var);$i++){
            $str1.=$var[$i];
        }
        //echo $str1;exit;
        $o_res=$this->db->query("select * from influxiq_vw_user_details where `uid`!='".$this->i_edit_id."' and `s_phone`='".$str1."'");
        $m_res=$o_res->result_array();
        if(!empty($m_res)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }



    /**
    * function to test unique email
    * 
    * @param mixed $s_email
    */
    public function is_unique_email($s_email) {
        $this->i_edit_id; 
        if ($str == 'test') {
            $this->form_validation->set_message('is_unique_email', '%s already exists in database. Please select other.');
            return FALSE;
        }else{
            return TRUE;
        }
    }




    /**
    * function for deleting user
    * 
    * @param mixed $s_id
    */
    public function del($s_id='') {
        // (!is_admin())?redirect(admin_url()):"";
        // user data delete
        $i_id = intval(strDecode($s_id));
        $m_where = array('uid'=>$i_id);
        $ret_ = $this->mod->delData('user_details', $m_where);
        // Message setting
        if($ret_>0){
            add_msg('User deleted successfully!!', "ok");
        }else{
            add_msg('User not deleted!!', "err");
        }
        redirect(admin_url().'user/listing.html');
    }



    public function edit_account($i_user_id=0){
        if(count($_POST)>0)
        {
            //pr($_POST, TRUE);
            $i_edit_id = intval(strDecode($this->input->post("uid")));
            if(!$i_edit_id){
                echo ""; exit;
            }
            $this->i_edit_id = $i_edit_id;
            $password = trim($this->input->post("pass"));

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|callback_username_check');
            if(!empty($password)){
                $this->form_validation->set_rules('pass', 'Password', 'required|matches[repass]');
                $this->form_validation->set_rules('repass', 'Confirm Password', 'required');
            }

            $this->form_validation->set_message('is_unique', '%s already exists in database. Please select other.');

            if ($this->form_validation->run() !== FALSE)    // If data is valid then insert into database
            {
                $m_send_data['s_email'] = get_safe($this->input->post("email"));
                $m_send_data['s_username'] = get_safe($this->input->post("username"));
                $m_send_data['s_password'] = strEncode(get_safe($password));
                // data update into Database [start]
                $s_tab_name='user_details';
                $m_data_arr = $m_send_data;
                $m_where=array('uid'=>$i_edit_id);
                $b_ret_ = $this->mod->updateData($s_tab_name, $m_data_arr, $m_where);
                unset($s_tab_name, $m_data_arr, $m_where);
                // data update into Database [end]

                if($b_ret_){
                    add_msg('User data updated successfully!!', "ok");
                    echo show_msg();
                } else {
                    echo '<div id="error">'."Error occured!! Please try again..".'</div>';
                }
            }else{
                echo validation_errors('<div id="error">', '</div>'); 
            }
        }
    }

    public function email_check($s_email) {

        $o_res=$this->db->query("select * from influxiq_vw_user_details where `uid`!='".$this->i_edit_id."' and `s_email`='".$s_email."'");
        $m_res=$o_res->result_array();
        //  pr($m_res,true);
        if (count($m_res)>0) {
            $this->form_validation->set_message('email_check', '%s already exists in database. Please select other.');
            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function username_check($s_username) {        
        $ret_ = $this->mod->fetchSingleData('user_details', array('uid !='=>$this->i_edit_id, 's_username'=>$s_username));
        if (count($ret_)>0) {
            $this->form_validation->set_message('username_check', '%s already exists in database. Please select other.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
    * function for showing popup for user info account
    * 
    * @param mixed $s_id
    */


    public function change_state($s_state='', $s_enc_id=''){
        $i_is_allow = ($s_state=='allow')?1:2;
        $i_id = intval(strDecode($s_enc_id));

        $ret_ = $this->mod->updateData('user_details', array('i_active'=>$i_is_allow), array('uid'=>$i_id));
        if($ret_){
            ($i_is_allow==1)?add_msg("User is active now.", 'ok'):add_msg("User is inactive now", 'ok');
        }else{
            add_msg("User status change not done");
        }
        redirect(admin_url().'user/listing.html');
    }



    function get_config_pagination($class1,$class2)
    {

        $config['full_tag_open'] = '<div class="'.$class1.'">';
        $config['full_tag_close'] = '</div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '';
        $config['next_tag_close'] = '';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '';
        $config['prev_tag_close'] = '';

        $config['cur_tag_open'] = '<a class="'.$class2.'" href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a>';

        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';

        return $config;

    }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
