<?php

/**
* function for encoding password
* 
* @param string $s_str
* @return string
*/

function get_dd($arr=array()){
    $html="";
    foreach($arr as $key=>$value){
        $html.="<option value=".$key.">".$value."</option>";
    }
    return($html);
}

function get_image_all(){
    $html = '';
    $s_select = '';
    $img_id = '';
    $CI = & get_instance();
    $o_res = $CI->db->select('*')->from('image_details')->get();
    if($o_res->num_rows()){
        $m_res = $o_res->result_array();
        if(count($m_res)>0){
            $i=0;
            foreach($m_res as $m_row){
                $s_select = ''; 
                /*if(intval($i_sel_id)==intval($m_row['i_model_id'])){
                $s_select = "selected='selected'";
                } */  
                if($i==count($m_res)-1){
                    $str="";
                }          
                else{
                    $str="," ;
                }        
                $img_id.=$m_row['s_img_name'].$str;  
                $i++;
            }
        }
    }
    unset($CI, $i_sel_id, $o_res, $m_res);
    return $img_id;
}
function get_model_id($cat_id=0,$cattype_id=0){      
    $html = '';
    $s_select = '';
    $img_id = '';
    $i_model_id="";
    $img_mod_id="";
    $img_mod_id1="";
    $CI = & get_instance();
    $o_res = $CI->db->select('*')->from('image_details')->where(array('i_id'=>$cat_id,'i_img_type_id'=>$cattype_id))->get();

    if($o_res->num_rows()){
        $m_res = $o_res->result_array();
        // pr($m_res,true);
        $i_cat_id=$m_res[0]['i_id']; 
        if(count($m_res)>0){
            $i=0;


            $o_res1= $CI->db->select('*')->from('model_catagory_details')->where(array('i_cat_id'=>$i_cat_id))->get();
            $m_res1=$o_res1->result_array(); 
            for($i=0;$i<count($m_res1);$i++){

                if($i==count($m_res1)-1){
                    $str="";
                }          
                else{
                    $str="," ;
                }   

                $i_model_id.=$m_res1[$i]['i_model_id'].$str;  
                //   $o_res = $CI->db->select('*')->from('image_details')->where(array('i_id'=>$cat_id,'i_img_type_id'=>$cattype_id))->get();  
            }


            $img_mod_id=explode(',',$i_model_id);
            //   pr($img_mod_id,true);
            $o_res2= $CI->db->select('*')->from('image_details')->where_in('i_id',$img_mod_id)->where(array('i_img_type_id'=>'1'))->get();
            $m_res2=$o_res2->result_array();  
            //pr($m_res2,true);     exit;
            for($i=0;$i<count($m_res2);$i++){

                if($i==count($m_res2)-1){
                    $str="";
                }          
                else{
                    $str="," ;
                }       

                $img_mod_id1.=$m_res2[$i]['s_img_name'].$str;

            }
            //echo $img_mod_id1;exit;  
            foreach($m_res as $m_row){
                $s_select = ''; 
                /*if(intval($i_sel_id)==intval($m_row['i_model_id'])){
                $s_select = "selected='selected'";
                } */  
                if($i==count($m_res)-1){
                    $str="";
                }          
                else{
                    $str="," ;
                }        

                $img_id.=$m_row['s_img_name'].$str;  

                $i++;
            }
        }
    }
    // echo $img_id; exit;
    $img_id=$img_id.$img_mod_id1;  
    unset($CI, $i_sel_id, $o_res, $m_res);
    return $img_id;
}



function strEncode1($s_str) {
    /*  $s_str = base64_encode("@####@".base64_encode("##pmetro##".$s_str));     /// Salt are hard coded here for security reason
    $s_str = str_replace("==", "-EEQL-", $s_str);
    return str_replace("=", "-EQL-", $s_str); */
    return base64_encode($s_str);
}

function strEncode($s_str){
    $s_str = base64_encode("@####@".base64_encode("##pmetro##".$s_str));     /// Salt are hard coded here for security reason
    $s_str = str_replace("==", "-EEQL-", $s_str);
    return str_replace("=", "-EQL-", $s_str); 
    //return base64_encode($s_str);
}

/**
* function for decoding password
* 
* @param string $s_str
* @return string
*/
function strDecode1($s_str='') {
    /*  $s_str = str_replace("-EQL-", "=", $s_str);
    $s_str = str_replace("-EEQL-", "==", $s_str);
    $s_str = base64_decode($s_str);
    $s_str = str_replace("@####@", "", $s_str);
    $s_str = base64_decode($s_str);
    $s_str = str_replace("##pmetro##", "", $s_str);
    return $s_str; */
    return base64_decode($s_str);
}

function strDecode($s_str='') {
    $s_str = str_replace("-EQL-", "=", $s_str);
    $s_str = str_replace("-EEQL-", "==", $s_str);
    $s_str = base64_decode($s_str);
    $s_str = str_replace("@####@", "", $s_str);
    $s_str = base64_decode($s_str);
    $s_str = str_replace("##pmetro##", "", $s_str);
    return $s_str;
    //return base64_decode($s_str);
}

/**
* function for generating random password
* 
* @return string
*/
function generate_random_password() {
    return base64_encode(rand(999,99999)."pm");
}




/**
* function for preview data in formatted way
* 
* @param mixed $s_str
* @param mixed $b_is_exit
*/
function pr($s_str='', $b_is_exit=FALSE) {
    echo "<pre>";
    print_r($s_str);
    echo "</pre>";
    if($b_is_exit){
        exit();
    }
}

function isMultiArray($a){
    foreach($a as $v) if(is_array($v)) return TRUE;
        return FALSE;
}


/**
* function for getting safe input data
* 
* @param mixed $s_str
* @return string
*/
function get_safe($s_str){
    return htmlentities($s_str, ENT_QUOTES, 'utf-8');
}

function put_safe($s_str){
    return html_entity_decode($s_str, ENT_QUOTES, 'utf-8');
}

/**
* function for making the video name as url
* uses 2 helper 1. text_helper, 2. url_helper
* 
* @param mixed $s_title
*/
function make_title_url($s_title=''){
    $s_title = convert_accented_characters($s_title);
    $s_title = str_replace("/", "-", $s_title);
    $s_title = character_limiter($s_title, 50);
    return strtolower(url_title(strip_quotes($s_title)));
}

/**
* Function for checking an user is logged in or not
* 
* @return true iff user is logged in
*/
function is_logged(){
    $CI = & get_instance();
    $m_login_info = $CI->session->userdata('ses_user_data');
    // pr($m_login_info);
    return (!empty($m_login_info) && $m_login_info['i_user_id']>0 && $m_login_info['b_is_logged']==TRUE )?TRUE:FALSE;
}

/**
* Function for checking the logged in user is admin or not 
* 
* @return true iff user is admin
*/
function is_superadmin(){
    $CI = & get_instance();
    $m_login_info = $CI->session->userdata('ses_user_data');
    // pr($m_login_info)
    if(!empty($m_login_info) && $m_login_info['i_user_id']>0){
        return (strtolower($m_login_info['s_user_role'])=='super admin')?TRUE:FALSE;
    }
    return FALSE;    
}


function getAffTypeDet(){
    $CI = & get_instance();
    $sql="select i_id,s_aff_type from influxiq_affiliation_type";
    //  $o_res = $CI->db->select('i_id,s_aff_type')->from('influxiq_affiliation_type')->get();
    $o_res=$CI->db->query($sql);
    $m_res=$o_res->result_array();
    return($m_res);
}


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}




function show_user(){
    $CI = & get_instance();
    $m_login_info = $CI->session->userdata('ses_user_data');
    if(empty($m_login_info)){
        redirect(admin_url()."home/login");
    }
    else{
        return($m_login_info['s_username']);
    } 
}

function show_id(){
    $CI = & get_instance();
    $m_login_info = $CI->session->userdata('ses_user_data');
    return($m_login_info['i_user_id']);
}


function is_admin(){
    $CI = & get_instance();
    $m_login_info = $CI->session->userdata('ses_user_data');
    if(!empty($m_login_info) && $m_login_info['i_user_id']>0){
        return (strtolower($m_login_info['s_user_role'])=='admin')?TRUE:FALSE;
    }
    return FALSE;    
}

/**
* function for getting admin url
*/
function admin_url(){
    return BASE_URL.ADMIN_FOLDER.'/';
}

/**
* function for storing messages
* 
* @param mixed $s_str_msg
* @param mixed $s_msg_type => 'err', 'ok', 'info'
*/
function add_msg($s_str_msg='', $s_msg_type='err'){
    $CI = & get_instance();
    // getting session message    
    $m_ses_msg = $CI->session->userdata('ses_msg');
    switch($s_msg_type){
        case 'err':
        {
            $s_str_msg = "<div class='error'>" . $s_str_msg . "</div>";
            if(is_array($m_ses_msg)) {
                $s_err_msg = !empty($m_ses_msg['s_err_msg'])?$m_ses_msg['s_err_msg']:"";
            }else{
                $s_err_msg = '';
            }
            $m_ses_msg['s_err_msg'] = $s_err_msg.$s_str_msg;
            $CI->session->set_userdata('ses_msg', $m_ses_msg);
            break;
        }
        case 'info':
        {
            $s_str_msg = "<div class='info'>" . $s_str_msg . "</div>";
            if(is_array($m_ses_msg)) {
                $s_info_msg = !empty($m_ses_msg['s_info_msg'])?$m_ses_msg['s_info_msg']:"";
            }else{
                $s_info_msg = '';
            }
            $m_ses_msg['s_info_msg'] = $s_info_msg.$s_str_msg;
            $CI->session->set_userdata('ses_msg', $m_ses_msg);
            break;
        }
        case 'ok':
        {
            $s_str_msg = "<div class='ok'>" . $s_str_msg . "</div>";
            if(is_array($m_ses_msg)) {
                $s_ok_msg = !empty($m_ses_msg['s_ok_msg'])?$m_ses_msg['s_ok_msg']:"";
            }else{
                $s_ok_msg = '';
            }
            $m_ses_msg['s_ok_msg'] = $s_ok_msg.$s_str_msg;
            $CI->session->set_userdata('ses_msg', $m_ses_msg);
            break;
        }
    }
}

/**
* function for getting the messages
* 
* @param mixed $s_type
*/
function show_msg($s_type=''){
    $CI = & get_instance();
    // getting session message    
    $m_ses_msg = $CI->session->userdata('ses_msg');
    if(empty($m_ses_msg))
        return FALSE;

    switch($s_type){
        case 'err':
        {
            $s_msg = !empty($m_ses_msg['s_err_msg'])?$m_ses_msg['s_err_msg']:"";
            $m_ses_msg['s_err_msg'] = '';
            $CI->session->set_userdata('ses_msg', $m_ses_msg);
            return $s_msg;
            break;
        }
        case 'info':
        {
            $s_msg = !empty($m_ses_msg['s_info_msg'])?$m_ses_msg['s_info_msg']:"";
            $m_ses_msg['s_info_msg'] = '';
            $CI->session->set_userdata('ses_msg', $m_ses_msg);
            return $s_msg;
            break;
        }
        case 'ok':
        {
            $s_msg = !empty($m_ses_msg['s_ok_msg'])?$m_ses_msg['s_ok_msg']:"";
            $m_ses_msg['s_ok_msg'] = '';
            $CI->session->set_userdata('ses_msg', $m_ses_msg);
            return $s_msg;
            break;
        }
        default:
        {
            $s_msg = !empty($m_ses_msg['s_err_msg'])?$m_ses_msg['s_err_msg']:"";
            $s_msg .= !empty($m_ses_msg['s_info_msg'])?$m_ses_msg['s_info_msg']:"";
            $s_msg .= !empty($m_ses_msg['s_ok_msg'])?$m_ses_msg['s_ok_msg']:"";
            $m_ses_msg = '';
            $CI->session->set_userdata('ses_msg', $m_ses_msg);
            return $s_msg;
        }
    }
}

/**
* function for getting extension from filename
* 
* @param mixed $s_imgname
* @return mixed
*/
function getExt($s_imgname=''){
    $m_det_ = explode(".", $s_imgname);
    return $m_det_[count($m_det_)-1];
}
/**
* function for getting name from filename
* 
* @param mixed $s_imgname
* @return string
*/
function getName($s_imgname=''){
    $m_det_ = explode(".", $s_imgname);
    unset($m_det_[count($m_det_)-1]);
    return implode('.',$m_det_);
}

/**
* function for fetching the site default values
* 
* @param mixed $s_field_name
* @param mixed $m_where
*/
function get_site_settings($s_field_name="all", $m_where=array()){
    $CI = & get_instance();
    $o_res = $CI->db->select('*')->from('site_settings')->where($m_where)->get();
    if($o_res->num_rows()){
        $m_res_ = $o_res->row_array();
        if($s_field_name=='all'){
            return $m_res_;
        }else{
            return (!empty($s_field_name))?$m_res_[$s_field_name]:"";
        }
    } else {
        return "";
    }
}


function do_mail($m_mail_data=array(), $b_is_local=FALSE){

    $s_from_email = (!empty($m_mail_data['from']))?$m_mail_data['from']:"";
    $s_from_name = (!empty($m_mail_data['name']))?$m_mail_data['name']:"";
    $s_to_email = (!empty($m_mail_data['to']))?$m_mail_data['to']:"";
    $s_bcc_email = (!empty($m_mail_data['bcc']))?$m_mail_data['bcc']:"";
    $s_cc_email = (!empty($m_mail_data['cc']))?$m_mail_data['cc']:"";
    $s_subject  = (!empty($m_mail_data['subject']))?$m_mail_data['subject']:"";
    $s_msg  = (!empty($m_mail_data['message']))?$m_mail_data['message']:"";

    // getting CI instance
    $CI = & get_instance();
    // loading email library
    $CI->load->library('email');
    // email configuration [start]
    //$config['protocol'] = 'sendmail';
    $config['charset'] = 'utf-8';
    $config['mailtype'] = 'html';
    $CI->email->initialize($config);
    // email configuration [end]

    // email parameter set [start]
    $CI->email->from($s_from_email, $s_from_name);
    $CI->email->to($s_to_email);   
    (!empty($s_bcc_email))?$CI->email->bcc($s_bcc_email):"";
    (!empty($s_cc_email))?$CI->email->cc($s_cc_email):"";
    $CI->email->subject($s_subject);
    $CI->email->message($s_msg);
    // email parameter set [end]

    // email sending [start]
    if($b_is_local){
        echo $s_msg;
        //echo $CI->email->print_debugger();
    } else {
        return $CI->email->send();
        // echo $CI->email->print_debugger();exit;
        //return TRUE;
    }
    // email sending [end]
}

function get_email_header(){
    return '<html>
    <head>
    </head>
    <body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>
    <table width="800" border="0" cellspacing="0" cellpadding="0" align="center" style="font: 14px/20px Arial,Helvetica,sans-serif; color:#000; background:#c7cddf; ">
    <tr>
    <td width="275" style="padding:20px; border-right:dashed 1px #FFFFFF; border-bottom:solid 2px #f1f6fa;">
    <img src="'.base_url().'images/logo.png" width="310" height="75" alt="Material Girlz" /></td>
    <td width="525" style="padding:0 5px 0 30px; border-bottom:solid 2px #f1f6fa;">
    <span style="color:#4f5f8c; font-size:18px; text-align:justify;">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </span></td>
    </tr>
    <tr>
    <td colspan="2"><div style="padding:20px">';
}

function get_email_footer(){
    return '</div></td>
    </tr>
    <tr>
    <td colspan="2" style="border-top:solid 2px #f1f6fa; padding:0 5px 0 5px;" >
    <span style="width:500px; float:left; border-right:solid 2px #f1f6fa; text-align:justify; padding:10px; font-size:12px;">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.
    </span>
    <span style="width:auto; float:left; padding:15px 0 0 30px; text-align:right;">
    <a href="#" style="color:#43527a; text-decoration:none;">www.lifdsfdsfnk.com</a>
    </span></td>
    </tr>
    </table></td>
    </tr>
    </table>
    </body>
    </html>';
}


function get_ses_data($s_var = ''){
    $CI = & get_instance();
    $m_login_info = $CI->session->userdata('ses_user_data');
    if(!empty($s_var)){
        return $m_login_info[$s_var];
    }else{
        return $m_login_info;
    }
}