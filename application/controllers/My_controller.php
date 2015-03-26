<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Main controller for extending into other controllers.
* @author: Arnab Chattopadhyay
*/

class My_controller extends CI_Controller {
    public $m_data = array();  
    public $s_title;

    public $b_show_left_pannel = TRUE;  // Set this variable as FALSE to hide left panel
    public $b_show_right_pannel = TRUE; // Set this variable as FALSE to hide right panel
    public $b_show_lower_top_pannel = FALSE; // Set this variable as FALSE to hide lower top panel

    // layout variable [start] theme canbe implemented by changing these variables

    // layout variable [end]

    public $s_menu_id = "";
    public $s_sub_menu_id = "";
    public $s_cat_menu_id = "";

    // default js and css loading
    public $s_js = "";
    public $s_css = "";

    // user data store purpose
    public $m_user_data = array(
    "i_user_id"=>0,
    "b_is_logged"=>FALSE, 
    "s_user_email"=>"", 
    "s_user_role"=>"", 
    "s_username"=>""
    );

    public $m_page_arr = array(
    ""=>"Select Page First",
    "home"=>"Home Page",
    "login"=>"Login Page",
    "about"=>"About Us",
    "contact"=>"Contact",
    "prod_list"=>"Product List",
    "refund"=>"Refund Policy",
    "terms"=>"Terms and Condtions",
    "company"=>"Company",
    "blog"=>"Blog Page",
    "affiliate"=>"Affiliate"
    ); 
    public $s_cur_page = "";

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model'); 
        $this->load->helper('common_helper');
        // loading default js and css file

        if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){   
            //$this->add_css(array('layout','lionbars','material-girlz-style','vion-min','wt-scroller','wt-lightbox','wt-scroller','style','facebox', 'jquery-ui', 'style1','style2', 'tipsy','prettify','jquery.multiselect'));
            $this->add_css(array('jquery-ui','jquery.wysiwyg','green_style_all','validationEngine.jquery'));


            $this->add_js(array('jquery','jquery-ui','jquery.ui.autocomplete','jquery.ui.core','jquery.ui.position', 'jquery.ui.widget','jquery.wysiwyg','jquery-lightbox','jquery-ui-block','custom','scripts','jquery.validationEngine','ZeroClipboard'));
        }else{
            $this->add_css(array('reset','style','slider'));        
            $this->add_js(array('jquery-1.4.4','IE9','ggs','Museo_Slab.font','jquery.nivo.slider.pack','cufon-yui'));

        }

        //$this->add_css(array('style','facebox', 'jquery-ui', 'style1', 'tipsy'));
        //$this->add_js(array('jquery-ui', 'custom', 'facebox', 'tipsy'));
        //    $this->add_css(array('nmw-style'));
        //   $this->add_js(array('jquery','jquery-ui','script'));

        // loading the site page array
        $this->m_data['m_page_arr'] = $this->m_page_arr;


        //echo $this->router->fetch_directory();

        if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){
            //$this->s_lower_top = ADMIN_FOLDER."/layouts/lower_top.tpl.php";
            //$this->s_header_top = ADMIN_FOLDER."/layouts/header_top.tpl.php";
            $this->s_header = ADMIN_FOLDER."/layouts/header.tpl.php";
            $this->s_left_panel = ADMIN_FOLDER."/layouts/left_panel.tpl.php";
            $this->s_right_panel = ADMIN_FOLDER."/layouts/right_panel.tpl.php";
            $this->s_footer = ADMIN_FOLDER."/layouts/footer.tpl.php";
            //$this->s_footer = ADMIN_FOLDER."/layouts/footer.tpl.php";


            // ADMIN SPECIFIC JS FILE
            $this->add_js(array(ADMIN_FOLDER.'/common'));
            //    $this->add_js(array(ADMIN_FOLDER));
            // setting title
            $this->s_title .= " :: Administrative Console";
        }
        else{
            $this->s_title .= ":: Welcome to Influxiq";   
            $this->s_header = "layouts/header.tpl.php";
            //    $this->s_footer = "layouts/footer.tpl.php";
            //   $this->s_topsection = "layouts/body_topsection.tpl.php";
            //$this->r_topsection = "layouts/body_rightsection.tpl.php";
        }
    }

    public function index() {
        redirect(base_url());
    }

    /**
    * Function for loading the default features
    */
    public function load_default(){
        // echo $this->router->fetch_directory();
        // echo $this->session->userdata('current_url');  
        $m_cart_val=$this->cart->contents();
        $i=0;
        if(!empty($m_cart_val)){
            foreach($m_cart_val as $key=>$val){
                $m_cart_type_val[$i]['type']=$m_cart_val[$key]['type'];
                $m_cart_type_val[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                $m_cart_type_val[$i]['package_id']=$m_cart_val[$key]['package_id'];
                if($m_cart_val[$key]['type']==1){
                    $m_is_insert[$i]=1;
                }
                if($m_cart_val[$key]['type']==2){
                    $m_is_insert[$i]=2;
                }
                if($m_cart_val[$key]['type']==3){
                    $m_is_insert[$i]=3;
                }
                if($m_cart_val[$key]['type']==4){
                    $m_is_insert[$i]=4;
                }
                $i++;
            } 


            $this->m_data['m_cart_val']=$m_cart_type_val;
            $this->m_data['m_is_cart_insert']=$m_is_insert;
        }
        else{

            $this->m_data['m_cart_val']=array();
            $this->m_data['m_is_cart_insert']=array(); 
        }

        $ses_get_user_data = $this->session->userdata('ses_user_data');
        if(!is_null($ses_get_user_data) && count($ses_get_user_data)>0){
            $this->m_user_data = $ses_get_user_data;
        }
        // pr($ses_get_user_data);
        if($this->router->fetch_directory()==ADMIN_FOLDER.'/') {
            $this->m_data['s_menu_id'] = $this->s_menu_id;
            $this->m_data['s_sub_menu_id'] = $this->s_sub_menu_id;
            $this->m_data['s_cat_menu_id'] = $this->s_cat_menu_id;

            $this->m_data['s_js'] = $this->s_js;
            $this->m_data['s_css'] = $this->s_css;
            $this->m_data['s_header'] = $this->load->view($this->s_header, $this->m_data, TRUE);
            $this->m_data['s_left_panel'] = ($this->b_show_left_pannel)?$this->load->view($this->s_left_panel, $this->m_data, TRUE):"";
            $this->m_data['s_right_panel'] = ($this->b_show_right_pannel)?$this->load->view($this->s_right_panel, $this->m_data, TRUE):"";
            $this->m_data['s_footer'] = $this->load->view($this->s_footer, $this->m_data, TRUE);  
            $this->m_data['s_title'] = $this->s_title;
        }
        else{    



            // loading css and js
            $this->m_data['s_js'] = $this->s_js;
            $this->m_data['s_css'] = $this->s_css;
            // setting title
            $this->m_data['s_title'] = $this->s_title;
            // $this->m_data['r_topsection'] = $this->load->view($this->r_topsection, $this->m_data, TRUE);  
            // $this->m_data['s_topsection'] = $this->load->view($this->s_topsection, $this->m_data, TRUE);
            // $this->m_data['s_footer']=$this->load->view($this->s_footer,$this->m_data,TRUE);
            $this->m_data['s_header']=$this->load->view($this->s_header,$this->m_data,TRUE);

        }  
    }

    /**
    * Function for loading default layout into pages
    * 
    * @param mixed $m_load_tpl
    * @param mixed $s_main_tpl
    */
    public function render($m_load_tpl=array(), $s_main_tpl="main.tpl.php") {
        // echo $this->router->fetch_class() ."/". $this->router->fetch_method().".tpl.php";
        // Setting main.tpl [start]
        if(empty($s_main_tpl)){
            $s_main_tpl = "main.tpl.php";
            if($this->router->fetch_directory()==ADMIN_FOLDER.'/')
                $s_main_tpl = ADMIN_FOLDER."/main.tpl.php";

        }
        // Setting main.tpl [end]

        $s_view = '';
        if(is_array($m_load_tpl) && count($m_load_tpl)>0) {     // If array of string is given
            foreach($m_load_tpl as $s_tpl){
                $s_view .= $this->load->view($s_tpl.".tpl.php", $this->m_data, TRUE);
            }
        }else{  // If string given
            if(!empty($m_load_tpl)){
                $s_view .= $this->load->view($m_load_tpl, $this->m_data, TRUE);                
            }else if(count($m_load_tpl)==0){ // If no string is given
                    if(file_exists(APPPATH."views/".$this->router->fetch_directory().$this->router->fetch_class() ."/". $this->router->fetch_method().".tpl.php"))
                        $s_view .= $this->load->view($this->router->fetch_directory().$this->router->fetch_class() ."/". $this->router->fetch_method().".tpl.php", $this->m_data, TRUE);   
            }
        }

        $this->load_default();
        // Default data and View file loading [start]


        $this->m_data['s_tpl_data'] = $s_view;
        // Default data and View file loading [end]

        if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){
            $s_main_tpl = ADMIN_FOLDER.'/'.$s_main_tpl;
        }

        $this->load->view($s_main_tpl, $this->m_data);
    }

    /**
    * Function for checking the access for particular user
    * 
    * @param mixed $s_user_access   
    * access levels are : registered, non-registered, admin, customer_service, super_affiliate, affiliate, customer
    */
    public function chk_user_access($s_user_access = array('registered')) {
        if(!is_logged() && $s_user_access=='registered') {
            add_msg("Please login as adminstrator to access Admin Panel", "info");
            $this->session->set_userdata('current_url', current_url());
            //if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){
            // echo base_url().ADMIN_FOLDER.'/login.html'; exit();
            redirect(base_url().ADMIN_FOLDER.'/login.html');
            //}else{
            //    redirect(base_url().'login.html');
            //}
        }
        if(is_logged() && $s_user_access=='non-registered') {
            $this->session->set_userdata('current_url', current_url());
            $this->_redirect_home_page();
        }
        if(!is_superadmin() && $s_user_access=='Super Admin'){
            add_msg("You do not have the access to the page. Please login as administrator.", "info");
            $this->session->set_userdata('current_url', current_url());
            redirect(base_url());
        }

        if(!is_admin() && $s_user_access=='Admin'){
            add_msg("You do not have the access to the page. Please login as administrator.", "info");
            $this->session->set_userdata('current_url', current_url());
            redirect(base_url());
        }
    }

    public function _redirect_home_page(){
        /*$m_login_info = $this->session->userdata('ses_user_data');
        $s_role = $m_login_info['s_user_role'];
        if(strtolower($s_role)=='admin'){
        redirect(admin_url().'/login.html');
        }
        if(strtolower($s_role)=='customer service'){
        redirect(ADMIN_FOLDER.'/login.html');
        }
        if(strtolower($s_role)=='super affiliate'){
        redirect(ADMIN_FOLDER.'/login.html');
        }
        if(strtolower($s_role)=='affiliate'){
        redirect(ADMIN_FOLDER.'/login.html');
        }*/
        redirect(base_url().ADMIN_FOLDER.'/home.html');
    }

    /**
    * function for adding specific js to a page
    * 
    * @param mixed $s_js_files maybe array or string
    */
    /* public function add_js($s_js_files=array()){
    $s_href = "";

    if(is_array($s_js_files) && count($s_js_files)>0){
    // echo $this->router->fetch_directory();
    foreach($s_js_files as $s_js_file){
    $s_js_file = trim($s_js_file);
    $s_href = $this->_check_file_path($s_js_file);

    // pr($s_href);
    if(!empty($s_href)) {
    $this->s_js .= '<script type="text/javascript" src="'.$s_href.'"></script>';
    }
    }
    } else {
    // echo $this->router->fetch_directory(); 
    $s_js_file = trim($s_js_files);
    $s_href = $this->_check_file_path($s_js_files);
    //pr($s_href);
    if(!empty($s_href)) {
    $this->s_js .= '<script type="text/javascript" src="'.$s_href.'"></script>';
    }
    }         
    } */
    public function add_js($s_js_files=array()){
        if(is_array($s_js_files) && count($s_js_files)>0){
            foreach($s_js_files as $s_js_file){
                if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){
                    $this->s_js .= '<script type="text/javascript" src="'.base_url().'js/'.ADMIN_FOLDER.'/'.$s_js_file.'.js" ></script>';
                }else{
                    $this->s_js .= '<script type="text/javascript" src="'.base_url().'js/'.$s_js_file.'.js"></script>';
                }                
            }
        } 
        /*  else {
        if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){
        $this->s_js .= '<script type="text/javascript" src="'.base_url().'js/'.ADMIN_FOLDER.'/'.$s_js_file.'.js"/></script>';
        }else{
        $this->s_js .= '<script type="text/javascript" src="'.base_url().'js/'.$s_js_file.'.js" /></script>';
        } 
        } */
    }

    /**
    * Function for checking file existance into predefined path
    * 
    * @param mixed $s_file_name
    * @param mixed $s_file_ext
    */
    public function _check_file_path($s_file_name='', $s_file_ext = 'js') {
        $s_path = "";
        if(empty($s_file_name)){
            if(file_exists(FCPATH.$s_file_ext.'/'.$this->router->fetch_directory().$this->router->fetch_class() ."/".$this->router->fetch_method().'.'.$s_file_ext)){
                $s_path = base_url().$s_file_ext.'/'.$this->router->fetch_directory().$this->router->fetch_class() ."/".$this->router->fetch_method().'.'.$s_file_ext;
            }
        } else {
            if(file_exists(FCPATH.$s_file_ext.'/'.$s_file_name.'.'.$s_file_ext)){
                $s_path = base_url().$s_file_ext.'/'.$s_file_name.'.'.$s_file_ext;
            }
            if(file_exists(FCPATH.$s_file_ext.'/'.$this->router->fetch_directory().$this->router->fetch_class() ."/".$s_file_name.'.'.$s_file_ext)){
                $s_path = base_url().$s_file_ext.'/'.$this->router->fetch_directory().$this->router->fetch_class() ."/".$s_file_name.'.'.$s_file_ext;
            }
        }
        return $s_path;
    }

    /**
    * Function for adding specific css to a page
    * 
    * @param mixed $s_css_files maybe array or string
    */
    public function add_css($s_css_files=array()){
        if(is_array($s_css_files) && count($s_css_files)>0){
            foreach($s_css_files as $s_css_file){         
                if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){   
                    //$this->router->fetch_directory(); 
                    //echo $s_path=$this->_check_file_path($s_css_file,"css");    
                    $this->s_css .= '<link rel="stylesheet" href="'.base_url().'css/'.ADMIN_FOLDER.'/'.$s_css_file.'.css" type="text/css" />';    
                }else{                                

                    echo $this->router->fetch_directory();
                    $this->s_css .= '<link rel="stylesheet" href="'.base_url().'css/'.$s_css_file.'.css" type="text/css" />';
                }                
            }
        }         
        else {
            if($this->router->fetch_directory()==ADMIN_FOLDER.'/'){
                $this->s_css .= '<link rel="stylesheet" href="'.base_url().'css/'.ADMIN_FOLDER.'/'.$s_css_files.'.css" type="text/css" />';
            }else{
                $this->s_css .= '<link rel="stylesheet" href="'.base_url().'css/'.$s_css_files.'.css" type="text/css" />';
            } 
        }    
    }

    /**
    * Function for redirecting to previous url
    */
    public function back_to_prev_url() {
        $s_prev_url = $this->session->userdata('current_url');
        if(empty($s_prev_url)){
            redirect(base_url());
        } else {
            redirect($s_prev_url);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
