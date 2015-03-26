<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* An abstruct model for extending into other controllers.
* Here we will write the common functions
* 
* @author: Arnab Chattopadhyay
*/

require_once APPPATH.'models/my_model.php';
class Product_model extends My_model {

    public function __construct() {
        parent::__construct();
    }    

    public function fetchSearchUser($s_tab_name="",$s_select="",$s_element){
        $s_element="%".$s_element."%";
        $s_sql="select ".$s_select." from `".$s_tab_name."` where s_aff_name like '".$s_element."' or t_aff_time like '".$s_element."' or s_aff_url like '".$s_element."'";
        $ret_ = $this->db->query($s_sql);
        //$ret_->free_result();
        //echo $this->db->last_query();
        return $ret_->result_array() ;
    }

    public function fetchAffiliate1($s_tab_name='', $s_select='*', $m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
        // select clause insertion
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

        $o_res = $this->db->select($s_select)->from($s_tab_name)->or_like($m_where)->get();   
        // echo $this->db->last_query();     
        //echo $this->db->last_query();
        if($o_res->num_rows()>0) {
            $m_res=$o_res->result_array();
            if($m_res[0]['i_aff_id']==0){
                $m_res=array();
            }
            return($m_res);
        } else{
            return array();
        }   
    }                

    public function fetchAffiliate2($s_tab_name='', $s_select='*', $m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
        // select clause insertion
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

        $o_res = $this->db->select($s_select)->from($s_tab_name)->or_like($m_where)->get();   
        // echo $this->db->last_query();     
        //echo $this->db->last_query();
        if($o_res->num_rows()>0) {
            $m_res=$o_res->result_array();

            return($m_res);
        } else{
            return array();
        }   
    }     

    public function fetchSearchUser1($s_tab_name='', $s_select='*',$m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
        
       // echo 1; exit;
      // pr($m_where,true);
        // select clause insertion
        $s_select = (empty($s_select))?'*':$s_select;
        // Limit inclution
        /* if(!empty($i_perpage))
        $this->db->limit($i_perpage, $i_page);
        */    
        // Group by clause add
        if(!empty($s_group_by)){
            $this->db->group_by($s_group_by);
        }   
        // Orderby clause add
        if(!empty($m_where)){
            $s_element="%".$m_where[1]."%" ;
        }


        $this->db->order_by($m_order_by_name, $m_order_by);
  //      $s_tab_name="ultra_vw_user_details";
        // echo show_id(); exit;
        //$o_res = $this->db->select($s_select)->from($s_tab_name)->or_like($m_where)->get();   
        if(!empty($i_perpage)){
            //$this->db->limit($i_perpage, $i_page);
            if($i_page==""){
                //$s_sql="select ".$s_select." from `".$s_tab_name."` where uid!=".show_id()." and s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."' limit ".$i_perpage."";

                $s_sql="select ".$s_select." from (select * from `".$s_tab_name."` where i_aff_id=".$m_where[0].") as x where i_affhit_id like '".$s_element."' or t_affhit_time like '".$s_element."' or s_affhit_ip like '".$s_element."' or s_aff_type like '".$s_element."' limit ".$i_perpage."";

            }
            else{
                //  $s_sql="select ".$s_select." from `".$s_tab_name."` where uid!=".show_id()." and s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."' limit ".$i_perpage." offset ".$i_page."";
                $s_sql="select ".$s_select." from (select * from `".$s_tab_name."` where i_aff_id=".$m_where[0].") as x where i_affhit_id like '".$s_element."' or t_affhit_time like '".$s_element."' or s_affhit_ip like '".$s_element."' or s_aff_type like '".$s_element."' limit ".$i_perpage." offset ".$i_page."";
            }
            $o_res= $this->db->query($s_sql);
        }
        else{
            //  $s_sql="select ".$s_select." from `".$s_tab_name."` where uid!=".show_id()." and s_username like '".$s_element."' or s_email like '".$s_element."' or s_firstname like '".$s_element."' or s_lastname like '".$s_element."' or s_phone like '".$s_element."' or s_address like '".$s_element."' or s_gender like '".$s_element."' or s_role_name like '".$s_element."'";
            $s_sql="select ".$s_select." from (select * from `".$s_tab_name."` where i_aff_id=".$m_where[0].") as x where i_affhit_id like '".$s_element."' or t_affhit_time like '".$s_element."' or s_affhit_ip like '".$s_element."' or s_aff_type like '".$s_element."'";
            $o_res = $this->db->query($s_sql);
        }
      //  echo $this->db->last_query();     
        //echo $this->db->last_query();
        if($o_res->num_rows()>0){
            $m_res=$o_res->result_array();
            //  pr($m_res,true);

            return $o_res->result_array();
        } else{
            return array();
        }   
    }                




    public function fetchMultiDate($s_tab_name='', $s_select='*', $m_where="", $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
        // select clause insertion
        $s_select = (empty($s_select))?'*':$s_select;
        // Limit inclution
        if(!empty($i_perpage))
            $this->db->limit($i_perpage, $i_page);
        // Group by clause add
        if(!empty($s_group_by))
            $this->db->group_by($s_group_by);
        // Orderby clause add
        $this->db->order_by($m_order_by_name, $m_order_by);

        $o_res = $this->db->select($s_select)->from($s_tab_name)->where($m_where)->get();        
        //echo $this->db->last_query();
        if($o_res->num_rows()>0) {
            return $o_res->result_array();
        } else{
            return array();
        }   
    }


    public function count_data($s_id=''){
        $s_sql="SELECT *.count(`credit_affliationhit_details`.`i_aff_id`) FROM `credit_affliationhit_details` where `credit_affliationhit_details`.`i_aff_id`=".$s_id;
        $ret_ = $this->db->query($s_sql);  
    }

    public function fetchMultiData1($s_tab_name='', $s_select='*', $m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
        // select clause insertion
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

        $o_res = $this->db->select($s_select,FALSE)->from($s_tab_name)->where($m_where)->get();   
        //echo $this->db->last_query();
        if($o_res->num_rows()>0) {
            return $o_res->result_array();
        } else{
            return array();
        }   
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
