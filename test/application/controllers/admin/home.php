<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Controller to maintain home page 
* @author: Arnab Chattopadhyay
*/
require APPPATH.'controllers/My_controller.php';

class Home extends My_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model' , 'mod_pm');
        $this->load->library('email');
    }

    public function index(){
        // check for register user
        $arr=$this->session->userdata('i_log_id'); 
        // pr($arr,true);
        $this->chk_user_access('registered');
        $this->s_menu_id = 'menu_home';
        $this->render();
    }


    /**
    * function for registering an user
    */
    public function register(){
        $this->chk_user_access('non-registered');
        $m_send_data = array();
        $m_send_data1 = array();

        // If registration data posted        
        if(count($_POST)>0)
        {
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]');
            $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'required');
            // $this->form_validation->set_rules('')

            if ($this->form_validation->run() !== FALSE)    // If data is valid then insert into database
            {
                $m_send_data['s_username'] = get_safe($this->input->post("username"));
                $m_send_data['s_email'] = get_safe($this->input->post("email"));
                $password = get_safe($this->input->post("password"));
                $m_send_data['s_password'] = strEncode($password);
                $m_send_data['s_firstname'] = get_safe($this->input->post("fname"));
                $m_send_data['s_lastname'] = get_safe($this->input->post("lname"));
                $m_send_data['s_phone'] = get_safe($this->input->post("phone"));
                $m_send_data['s_gender'] = get_safe($this->input->post("gender"));
                $m_send_data['i_user_role'] = 2;
                // Inserting user data into database
                $i_inserted_id = $this->mod_pm->insertData('user', $m_send_data);
                if($i_inserted_id>0) {
                    // After registration login the user
                    $this->login_user($m_send_data['s_username'], $m_send_data['s_password']);
                    // Adding message
                    add_msg("You have successfully Registered and Logged in..", "ok");
                    // redirecting the user to home page
                    redirect(base_url().'home.html');
                } else {
                    $this->m_data['s_msg'] = "Error occured!! Please try again..";
                }
            }

        }
        $this->render();
    }


    /**
    * Function for showing login user page
    */
    public function login() {
        //  echo "1111";
        $this->chk_user_access('non-registered');
        $m_send_data = array(); 
        $this->b_show_left_pannel = FALSE;
        $this->m_data['s_title'] = 'Login';
        if(count($_POST)>0)
        {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');   

            if ($this->form_validation->run() !== FALSE)
            {
                $m_send_data['s_username'] = get_safe($this->input->post("username"));         
                $password = get_safe($this->input->post("password"));
                $m_send_data['s_password'] = strEncode($password);
                $m_send_data['i_active']=1;
                //$ip=getRealIpAddr();
                // After registration login the user
                
               // pr($m_send_data,true);
                $ret_ = $this->login_user($m_send_data['s_username'], $m_send_data['s_password'],$m_send_data['i_active']);
                // pr($ret_, true);
                //redirecting the user to home page
                //redirect(base_url().'home.html');
                if($ret_){
                    //   $m_ip_user_data['i_user_id']=$m_arr['uid'];
                    $m_arr=$this->session->userdata('ses_user_data');
                    //pr($m_arr,true);
                    $m_ip_user_data['i_user_id']=$m_arr['i_user_id'] ;
                    $m_ip_user_data['s_user_name']=$m_arr['s_username'];
                    $m_ip_user_data['s_user_ip']=getRealIpAddr();
                    $m_ip_user_data['t_loggin_time']=date('Y-m-d h:i:s');
                    $m_ip_user_data['b_is_logged']=$m_arr['b_is_logged'];
                    //$m_ip_user_data['t_logout_time']=date('Y-m-d h:i:s');
                    // $m_ip_user_data['t_loggin_time']=date('Y-m-d h:i:s');
                    //    $m_ip_user_data['s_usermail']=$m_arr['s_email'];
                    
                    $i_id=$this->mod_pm->insertData('loggin_details',$m_ip_user_data); 
                    $log_arr=array('i_log_id'=>intval($i_id));                                     
                    $this->session->set_userdata('i_log_id',$log_arr); 
                    // $this->m_data['log_id']=$i_id
                    // return $i_id;
                    if($i_id>0){  
                        add_msg("You have successfully Logged in..", "ok");                    
                        redirect(admin_url().'home.html');
                    }
                    else{
                        add_msg("IP Information is not stored..");
                        redirect(admin_url().'login.html', $this->m_data);
                    } 
                }else{
                    add_msg("Your username or password did not match/user not activated");
                    redirect(admin_url().'login.html', $this->m_data);
                }                
            }
            else
            {
                //$this->m_data['s_msg'] = "Error occured!! Please try again..";
            }
        }
        //        $this->render();
        $this->load->view('admin/home/login.tpl.php', $this->m_data);
    }


    /**
    * Function for login the user
    * 
    * @param mixed $s_username
    * @param mixed $s_password
    */
    public function storIpInfo($m_arr=array()){
        // $m_ip_user_data=array();
        $m_ip_user_data['i_user_id']=$m_arr['uid'];
        $m_ip_user_data['s_user_ip']=getRealIpAddr();
        $m_ip_user_data['t_loggin_time']=$m_arr['t_login_time'];
        //$m_ip_user_data['t_logout_time']=date('Y-m-d h:i:s');
        // $m_ip_user_data['t_loggin_time']=date('Y-m-d h:i:s');
        $m_ip_user_data['s_usermail']=$m_arr['s_email'];
        $i_id=$this->mod_pm->insertData('loggin_details',$m_ip_user_data); 
        return $i_id;
    }

    public function login_user($s_username, $s_password,$i_active) {
        //echo $s_username, $s_password;exit;
        // fetch data after login for session [start]
        $m_arr = $this->mod_pm->fetchSingleUser($s_username, $s_password,$i_active);

        //pr($m_arr,true);


        //pr($m_arr, true);
        if(!empty($m_arr)){
            $m_user_data['i_user_id'] = $m_arr['uid'];
            $m_user_data['b_is_logged'] = TRUE;
            $m_user_data['s_user_email'] = $m_arr['s_email'];
            $m_user_data['s_username'] = $m_arr['s_firstname']." ".$m_arr['s_lastname'];   
            $m_user_data['s_user_role'] = $m_arr['s_role_name'];  

            //Login Info shoe

            $this->session->set_userdata('ses_user_data',$m_user_data);

            return TRUE;

        } else {
            return FALSE;
        }        
        // fetch data after login for session [end]
    }

    public function submitemail(){      
        $this->load->view('admin/home/submitemail.tpl.php', $this->m_data);  
    }

     public function changepwd(){
        $this->m_data['s_title']='Forgot Password'; 
        $this->m_data['show_det']="non_codeaccess";
        
        if(count($_POST)>0){
            $email=$this->input->post('email');
            $retset=$this->mod_pm->fetchSingleData("user_details",array('s_email'=>$email,'i_active'=>1));
            //pr($retset,true); 
            if(!empty($retset)){
                //pr($retset,true);

                $m_dataset['uid']=$retset['uid'];
                $m_dataset['s_email']=$retset['s_email'];
                $m_dataset['s_acc_code']=$this->forgot_pwd_code();
		  		
                $ret_=$this->mod_pm->insertData("access_code",$m_dataset); 
                if($ret_>0){
               		$this->load->library('email');
                            $this->email->from("Admin");
				            $this->email->reply_to("abir.involutiontech@gmail.com");
                            $this->email->to($m_dataset['s_email']);
                            $this->email->subject("Forgot Password Link");
                            $this->email->message($m_dataset['s_acc_code']);
                            if($this->email->send()){
                                $this->m_data['show_det']="codeaccess";
                            }
                            else{
                                add_msg("Email is not Send.Pls Try again");
                                redirect(admin_url()."home/changepwd");
                            }

                }else{
                    add_msg("Error Occurred","err");
                    redirect(admin_url()."home/changepwd");
                }
                
            }
	     else{
		  add_msg("Email ID is not Matched","err");
		
	     }	
            
           // exit;
        }
        $this->load->view('admin/home/changepwd.tpl.php',$this->m_data);
    }
    
     public function check_code(){
         $this->m_data['s_title']='Forgot Password'; 
        $this->m_data['show_det']="non_codeaccess";
        //$this->load->library('email');
        $this->form_validation->set_rules('s_code','required');
        
       // $this->form_validation->set_message('is_unique', '%s already exists in database. Please select other.');
        
        if(count($_POST)>0){
            $code=$this->input->post('s_code');
            $retset=$this->mod_pm->fetchSingleData("access_code",array('s_acc_code'=> trim($code," ")));
            if(!empty($retset)){
                $this->mod_pm->delData("access_code",array('s_acc_code'=>$code));
                redirect(admin_url()."home/newpassword/".strEncode($retset['uid']));
            }
            else{
                  add_msg("Invalid Code","err");
                  redirect(admin_url()."home/changepwd");
            }
        } 
    }
    
    
   public function newpassword($s_uid=""){
        $this->m_data['s_title']='Forgot Password'; 

        if(count($_POST)>0){
            $this->form_validation->set_rules('npwd','required|matches[cnpwd]|min_length[6]');
            $this->form_validation->set_rules('cnpwd','required');
            if($this->form_validation->run()==TRUE){    
                $i_uid=intval(strDecode($s_uid));
                $pwd=$this->input->post('npwd');
                $ret1_=$this->mod_pm->updateData1("user_details",array('s_password'=>strEncode1($pwd)),array('uid'=>$i_uid));
                if($ret1_>0){
                    add_msg("Password Is Updated");
                    redirect(admin_url()."home/login");
                }
            }  
        }
        $this->load->view('admin/home/newpassword.tpl.php',$this->m_data);
    } 

     public function forgot_pwd_code(){
         $str=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',6)),0,6);
         return($str);
        //  exit;        
    }



    /**
    * Function for logout the user
    */
    public function logout() {
        //  echo "hhhhhh";exit;
        //  echo 1;exit;
        $arr=$this->session->userdata('i_log_id');
        // pr($arr,true);
        $m_arr['t_logout_time']=date('Y-m-d h:i:s');
        $m_arr['b_is_logged']=0;
        //$this->mod_pm->updateData("loggin_details",$m_arr,array('i_log_id'));
        $this->session->unset_userdata('ses_user_data',array());
        $this->session->unset_userdata('current_url',"");
        $this->session->unset_userdata('csvarr1');
        $this->session->sess_destroy();
        add_msg("You have logout successfully.", "ok");
        redirect(admin_url());
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


// D:\\xampp\\htdocs\\pornmetro\\php\\extensions\\ffmpeg -i D:\\xampp\\htdocs\\pornmetro\\php\\uploads\\temp\\bb5.avi -f flv D:\\xampp\\htdocs\\pornmetro\\php\\uploads\\user_videos\\bb5.flv
