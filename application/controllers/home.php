<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/My_controller.php';

class Home extends My_controller {

    public $m_send_data=array();
    public $per_page_show = 3;

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('common_helper');     
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

    public function name_check($str)
    {
        if ($str == 'Name')
        {
            $this->form_validation->set_message('name_check', 'The %s field is required.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }


    public function email_check($str)
    {
        if ($str == 'Email')
        {
            $this->form_validation->set_message('email_check', 'The %s field is required.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function comment_check($str)
    {
        if ($str == 'Questions - Comments')
        {
            $this->form_validation->set_message('comment_check', 'The %s field is required.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }


    public function sendmail($arr=array()){
        //  return($arr);
        $to="abir.involutiontech@gmail.com";
        $from=$arr['s_email'];
        $msgbody="LEAD DETAILS<br><strong>Affiliation Type:</strong>".$arr['s_aff_type']."<br><strong>Product Name:</strong>".$arr['s_product_id']."<br><strong>Lead Name:</strong>".$arr['s_app_name']."<br><strong>Lead Email:</strong>".$arr['s_email']."<br><strong>Message/Question:</strong>".$arr['s_comment']."";
        $msg="<html><body>".$msgbody."<html><body>";
        $subject="Lead Details";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from . "\r\n";
        return(@mail($to,$subject,$msg,$headers));

    }





    public function contactSendmail($arr=array()){
        // return($arr);
      //  $to="abir.involutiontech@gmail.com";
        $to="iftekar.involutiontech@gmail.com";
        $from=$arr['s_email'];
        $msgbody="CONTACT DETAILS<br><strong>Name:</strong>".$arr['s_name']."<br><strong>Email:</strong>".$arr['s_email']."<br>
        <strong>Phone No:</strong>".$arr['s_phone']."<br><strong>Query:</strong>".$arr['s_query']."";
        $msg="<html><body>".$msgbody."<html><body>";
        $subject="Contact Details";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from . "\r\n";
        return(@mail($to,$subject,$msg,$headers));

        //@mail()
    }




    public function index()
    {  	
        $this->m_data['page_active']="index";
        $this->s_title="Software Development Company | PHP Software & Web Developers | Website Design Services | Software Programming Services | Shopping Carts | Affiliate Software";
        $this->render();
    }


    public function design(){
        $this->m_data['page_active']="design";
        $this->s_title="Website Design | Branding | Website Design Services | Company Branding | Professional Web Designers | Web Design and Branding";

        $s_tab_name='product';
        $s_select='*';

        $m_where='`category_id` = 2';
        $s_group_by='';
        $s_order_by_name = 'order';
        $s_order_by = 'ASC';
        $this->m_data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name,$s_order_by);

        $this->render();
    }

    public function products(){

        $this->m_data['page_active']="products";
        $this->s_title="Website Software | Shopping Carts | Affilaite Marketing Systems | CRM Marketing Systems | Shopping Carts | Affiliate Software";

        $s_tab_name='product';
        $s_select='*';

        $m_where='`category_id` = 1 and `i_active`=1';
        $s_group_by='';
        $s_order_by_name = 'order';
        $s_order_by = 'ASC';
        $this->m_data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name,$s_order_by);

        foreach($this->m_data['m_dataset'] as $row)
        {
            $s_tab_name='product_feature';
            $s_select='*';

            $m_where=array('product_id'=>$row['id']);
            $s_group_by='';
            $s_order_by_name = 'id';
            $s_order_by = 'ASC';
            $this->m_data['feature'][$row['id']]=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name,$s_order_by);
        }

        $this->render();

    }

    public function content(){
        $this->m_data['page_active']="content";
        $this->s_title="Content Development | Content Writers | Copy Writers | Website Content and Copy | Professional Content Writers";

        $s_tab_name='product';
        $s_select='*';

        $m_where='`category_id` = 3';
        $s_group_by='';
        $s_order_by_name = 'order';
        $s_order_by = 'ASC';
        $this->m_data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name,$s_order_by);

        foreach($this->m_data['m_dataset'] as $row)
        {
            $s_tab_name='product_package';
            $s_select='*';

            $m_where=array('product_id'=>$row['id']);
            $s_group_by='';
            $s_order_by_name = 'id';
            $s_order_by = 'ASC';
            $this->m_data['package'][$row['id']]=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name,$s_order_by);
        }

        $this->render();

    }

    public function services(){
        $this->m_data['page_active']="services";
        $this->s_title="Software Development Services | PHP Software & Web Developers | Software Programming Services | Shopping Carts | Affiliate Software";

        $aff_url=$this->session->userdata('aff_url'); 
        if(count($_POST)>0){   
            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);
            // $this->m_data['form_name']=

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');


            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='services';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/services.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/services.html"); 
                }
            }

        }

        $this->render();
    }

    public function dproperties(){
        $this->m_data['page_active']="dproperties";
        $this->s_title="Digital Properties | Massive Online Content Networks | Online Marketing Websites | Large Blogging Websites | Natural Search Networks | Massive Affiliate Networks";
        $this->render();
    }

    public function marketing(){
        $this->m_data['page_active']="marketing";
        $this->s_title="SEO | Search Marketing | Search Engine Marketing | Online Traffic | Press Release Services | Online Article Directories";

        $s_tab_name='product';
        $s_select='*';

        $m_where='`category_id` = 4';
        $s_group_by='';
        $s_order_by_name = 'order';
        $s_order_by = 'ASC';
        $this->m_data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name,$s_order_by);

        foreach($this->m_data['m_dataset'] as $row)
        {
            $s_tab_name='product_package';
            $s_select='*';

            $m_where=array('product_id'=>$row['id']);
            $s_group_by='';
            $s_order_by_name = 'id';
            $s_order_by = 'ASC';
            $this->m_data['package'][$row['id']]=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by,$s_order_by_name,$s_order_by);
        }

        $this->add_js(array('slider'));
        $this->render();

    }

    public function aboutus(){
        $this->m_data['page_active']="aboutus";
        // $this->m_data['s_title']="ddddddddddddddddddddddddd";
        $this->s_title="About the InfluxIQ Development Group | Software Development Company | PHP Software & Web Developers | Website Design Services | Software Programming Services | Shopping Carts | Affiliate Software";
        $this->render();
    }

    public function contact(){
        //print_r($_SESSION);
      //  echo $_SESSION['kapcode'];
        $this->m_data['page_active']="contact";
        $this->s_title="Contact the InfluxIQ Development Group | Software Development Company | PHP Software & Web Developers | Website Design Services | Software Programming Services | Shopping Carts | Affiliate Software";
        if(count($_POST)>0){
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('query','Query','required');
            $this->form_validation->set_rules('captcha2','Captcha','required|callback_captcha_check');

            if($this->form_validation->run()!=FALSE){
                $m_arr['s_name']=get_safe($this->input->post('name'));
                $m_arr['s_email']=get_safe($this->input->post('email'));
                $m_arr['s_phone']=get_safe($this->input->post('phone'));
                $m_arr['s_query']=get_safe($this->input->post('query'));
                $ret_=$this->contactSendmail($m_arr);

                if($ret_>0){
                    add_msg("The Contact Details has been sent");
                    redirect(base_url()."home/contact.html");
                }
                else{
                    add_msg("Error Occured....Plese Try Again");
                    redirect(base_url()."home/contact.html");
                }
                // pr($arr,true);
            }
        }
        $this->add_js('jq1.6');
        $this->render(); 
    }
    public function captcha_check($str)
    {
      $ses_cap= $_SESSION['kapcode'];
      if($str!=$ses_cap) 
      {
      
      $this->form_validation->set_message('captcha_check','Enter correct capcha code');
       return false;   
      }
      else
      {
          return true;
      }
        
    }

    public function productdetails($product_id=''){
        $product_id=strDecode($product_id);
        $this->m_data['page_active']="products";
        $this->m_data['prod_types']=$product_id;
        $aff_url=$this->session->userdata('aff_url'); 

        $s_tab_name='product';
        $s_select='*';

        $m_where=array('id'=>$product_id);
        $s_group_by='id';
        // $s_order_by_name = 'cat_id';
        // $s_order_by = 'ASC';
        $this->m_data['details']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by);
        $s_tab_name='product_feature';
        $s_select='*';

        $m_where=array('product_id'=>$product_id);
        //$s_group_by='product_id';
        // $s_order_by_name = 'cat_id';
        // $s_order_by = 'ASC';
        $this->m_data['product_feature']=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where);



        if(count($_POST)>0){   
            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);
            // $this->m_data['form_name']=

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');


            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='product';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/productdetails.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/productdetails.html"); 
                }
            }

        }

        $this->add_css(array('global'));
        $this->add_js(array('jquery-1.4.4','jquery.min','slides.min.jquery'));

        $this->render();
    }


    public function shopexpress(){
        $this->m_data['page_active']="proexpress";
        //   $this->add_css(array('global'));
        $aff_url=$this->session->userdata('aff_url'); 
        if(count($_POST)>0){ 

            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');


            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='product';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/shopexpress.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/shopexpress.html"); 
                }
            }

        }


        $this->add_js(array('jquery-1.4.4'));

        $this->render(); 
    }



    public function shopdelux(){
        $this->m_data['page_active']="shopdelux";
        $aff_url=$this->session->userdata('aff_url'); 
        if(count($_POST)>0){   

            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');

            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='product';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/shopdelux.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/shopdelux.html"); 
                }
            }

        }

        $this->add_js(array('jquery-1.4.4'));
        //   $this->add_css(array('global'));
        //$this->add_js(array('jquery.min','slides.min.jquery'));

        $this->render();   
    }

    public function marketlaunch(){
        $this->m_data['page_active']="market_launch";
        $aff_url=$this->session->userdata('aff_url'); 
        if(count($_POST)>0){   

            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');

            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='product';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/marketlaunch.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/marketlaunch.html"); 
                }
            }

        }

        $this->add_css(array('global'));
        $this->add_js(array('jquery-1.4.4','jquery.min','slides.min.jquery'));

        $this->render();  
    }

    public function proaffiliate(){
        $this->m_data['page_active']="pro_affiliate";
        $aff_url=$this->session->userdata('aff_url'); 

        if(count($_POST)>0){   

            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');

            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='product';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/proaffiliate.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/proaffiliate.html"); 
                }
            }

        }

        $this->add_css(array('global'));
        $this->add_js(array('jquery-1.4.4','jquery.min','slides.min.jquery'));

        $this->render();  
    }


    public function prosocial(){
        $this->m_data['page_active']="prosocial";
        $aff_url=$this->session->userdata('aff_url');  

        if(count($_POST)>0){   

            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');

            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='product';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/prosocial.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/prosocial.html"); 
                }
            }

        }

        //   $this->add_css(array('global'));
        //$this->add_js(array('jquery.min','slides.min.jquery'));

        $this->render(); 
    }

    public function multilevel(){
        $this->m_data['page_active']="multilevel";
        $aff_url=$this->session->userdata('aff_url'); 

        if(count($_POST)>0){   

            $pack=$this->input->post('pack');
            $this->session->set_userdata('fname',$pack);

            $this->form_validation->set_rules('name','Name','required|callback_name_check');
            $this->form_validation->set_rules('email','Email','required|callback_email_check|valid_email');
            $this->form_validation->set_rules('comments','Comment','required|callback_comment_check');

            if($this->form_validation->run()!=FALSE){
                $m_arr['s_product_id']=$this->input->post('pack');
                $m_arr['s_aff_type']='product';
                $m_arr['s_app_name']=$this->input->post('name');
                $m_arr['s_email']=$this->input->post('email');
                $m_arr['s_comment']=$this->input->post('comments');
                $m_arr['s_aff_url']=$aff_url;
                $m_arr['t_add_time']=date("Y-m-d H:i:s");
                $m_arr['i_active']=1;
                $ret_=$this->my_model->insertData('apply_details',$m_arr);
                $ret1=$this->sendmail($m_arr);
                if($ret_>0){
                    add_msg("Lead Information Inserted Successfully","ok");
                    redirect(base_url()."home/multilevel.html");
                }
                else{
                    add_msg("Error Occured","error");
                    redirect(base_url()."home/multilevel.html"); 
                }
            }

        }


        $this->add_css(array('global'));
        $this->add_js(array('jquery-1.4.4','jquery.min','slides.min.jquery'));
        $this->render();   
    }


    /***
    * Landing page modification
    * @author Abirlal Mukherjee
    */

    public function checkCart(){
        $m_cart_val=$this->cart->contents();
        $i=0;
        $flag=0;
        if(!empty($m_cart_val)){
            foreach($m_cart_val as $key=>$val){
                $m_cart_type_val[$i]['type']=$m_cart_val[$key]['type'];
                $m_cart_type_val[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                $m_cart_type_val[$i]['package_id']=$m_cart_val[$key]['package_id'];

                if($m_cart_val[$key]['prod_id']==1||$m_cart_val[$key]['prod_id']==15||$m_cart_val[$key]['prod_id']==42){
                    $flag=1;
                    break;
                }

                /* if($m_cart_val[$key]['type']==1){
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
                } */
                $i++;
            }

            echo $flag; 
        }
    }

    /***
    * Val Submition for design portion
    */ 

    public function updatePackageNumber(){


    }

    /***
    * Unset the Cart
    * 
    * @author:Abirlal Mukherjee
    * @param mixed $arr
    */


    public function unsetCart(){
        echo  $this->cart->destroy();
    }







    public function post_val($arr=array()){


        //  pr($m_arr,true);
        $ret_=$this->my_model->insertData("apply_details",$arr);
        return($ret_);


    }        





    public function alpha_dash_space($str)
    {  //$this IS CI_Form_Validation
        $this->form_validation->set_message('alpha_dash_space', 'The %s field can only contain Alphabetical Characters, Spaces and Dashes.'); 
        return ( ! preg_match("/^([-a-z _-])+$/i", $str)) ? FALSE : TRUE;
    }  

    public function user_phone_valid($str){
        $this->form_validation->set_message('user_phone_valid', 'The %s field can only contain valid phone number.'); 
        return ( ! preg_match("/^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$/", $str)) ? FALSE : TRUE;
    }

    public function pin_check($str){
        $this->form_validation->set_message('pin_check', 'The %s field can not have zero at first.'); 
        if($str[0]=='0'){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }



    public function add_appl(){



        //    $this->m_data['page_active']="index";
        // $this->render();  
    }



    public function thankyou(){
        //  $this->add_css(array('thankyoupage'));
        $this->load->view("home/thankyou.tpl.php");
    }


}


