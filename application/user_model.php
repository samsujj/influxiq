<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* user model for writing user functions
* @author: Arnab Chattopadhyay
*/

require_once APPPATH.'models/my_model.php';
class User_model extends My_model{
    /**
    * constructor method
    */
    public function __construct() {
        parent::__construct();
    }

  //  /**
//    * function for login user
//    * 
//    * @param mixed $s_uname
//    * @param mixed $s_pass
//    */
   public function fetchSingleUser($s_uname, $s_pass, $i_active){
         //$s_user_data_sql = "call ultra_sp_authenticate_user('".$s_uname."','".$s_pass."','".$i_active."')";
       $s_user_data_sql="select * from `influxiq_vw_user_details` where `s_username`='".$s_uname."' and s_password='".$s_pass."' and i_active='".$i_active."'";
       $ret_ = $this->db->query($s_user_data_sql);
        //$ret_->free_result();
        //  echo $this->db->last_query(); 
        return $ret_->row_array();
   }


    public function fetchSearchUser($s_tab_name="",$s_select="",$s_element,$limit="",$offset=""){
        $s_element="%".$s_element."%";
        if($limit!="" && $offset!=""){
            $s_sql="select ".$s_select." from `".$s_tab_name."` where s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_address like '".$s_element."' LIMIT ".$limit." OFFSET ".$offset ;
       }else{
            $s_sql="select ".$s_select." from `".$s_tab_name."` where s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."'";
        }
       $ret_ = $this->db->query($s_sql);
        $ret_->free_result();
        //echo $this->db->last_query();
        return $ret_->result_array() ;
    }

    public function fetchMultiData1($s_tab_name='', $s_select='*', $m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
         //select clause insertion
        $s_select = (empty($s_select))?'*':$s_select;
        // Limit inclution
       if(!empty($i_perpage))
            $this->db->limit($i_perpage, $i_page);
        // Group by clause add
        if(!empty($s_group_by)){
            $this->db->group_by($s_group_by);
        }   
        // Orderby clause add
        $this->db->order_by($m_order_by_name, $m_order_by);

       $o_res = $this->db->select($s_select)->from($s_tab_name)->where_not_in('uid',$m_where)->get();   
        // echo $this->db->last_query();     
        //echo $this->db->last_query();
       if($o_res->num_rows()>0) {
            return $o_res->result_array();
        } else{
            return array();
       }   
    }

    public function fetchSearchUser1($s_tab_name='', $s_select='*',$m_where="", $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
        // select clause insertion
        $s_select = (empty($s_select))?'*':$s_select;
        // Limit inclution
//        /* if(!empty($i_perpage))
//        $this->db->limit($i_perpage, $i_page);
//        */    
        // Group by clause add
       if(!empty($s_group_by)){
           $this->db->group_by($s_group_by);
       }   
        // Orderby clause add
      
        $s_element="%".$m_where."%" ;
        $this->db->order_by($m_order_by_name, $m_order_by);
       $s_tab_name="influxiq_vw_user_details";
        // echo show_id(); exit;
        //$o_res = $this->db->select($s_select)->from($s_tab_name)->or_like($m_where)->get();   
       if(!empty($i_perpage)){
            //$this->db->limit($i_perpage, $i_page);
            if($i_page==""){
                //$s_sql="select ".$s_select." from `".$s_tab_name."` where uid!=".show_id()." and s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."' limit ".$i_perpage."";
                $s_sql="select ".$s_select." from (select * from `".$s_tab_name."` where uid!=".show_id().") as x where s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."' limit ".$i_perpage."";
            }
           else{
              //  $s_sql="select ".$s_select." from `".$s_tab_name."` where uid!=".show_id()." and s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."' limit ".$i_perpage." offset ".$i_page."";
               $s_sql="select ".$s_select." from (select * from `".$s_tab_name."` where uid!=".show_id().") as x where s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."' limit ".$i_perpage." offset ".$i_page."";
            }
           $o_res= $this->db->query($s_sql);
        }
       else{
          //  $s_sql="select ".$s_select." from `".$s_tab_name."` where uid!=".show_id()." and s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."'";
           $s_sql="select ".$s_select." from (select * from `".$s_tab_name."` where uid!=".show_id().") as x where s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."'";
            $o_res = $this->db->query($s_sql);
        }
        // echo $this->db->last_query();     
        //echo $this->db->last_query();
        if($o_res->num_rows()>0) {
           $m_res=$o_res->result_array();
          //  pr($m_res,true);
            
            return $o_res->result_array();
        } else{
                    return array();
       }   
   }                     




}
