<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* An abstruct model for extending into other controllers.
* Here we will write the common functions
* 
* @author: Arnab Chattopadhyay
*/

require_once APPPATH.'models/my_model.php';
class Lead_model extends My_model {

    public function __construct() {
        parent::__construct();
    }    

    public function fetchSearchUser($s_tab_name="",$s_select="",$s_element){
        $s_element="%".$s_element."%";
        $s_sql="select ".$s_select." from `".$s_tab_name."` where s_app_name like '".$s_element."' or s_email like '".$s_element."' or s_comment like '".$s_element."' or s_product_id like '".$s_element."' or t_add_time like '".$s_element."'";
        $ret_ = $this->db->query($s_sql);
        //$ret_->free_result();
        //echo $this->db->last_query();
        return $ret_->result_array() ;
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
    
    public function fetchLeads($s_tab_name='', $s_select='*', $m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
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
            return $o_res->result_array();
        } else{
            return array();
        }   
    }  
    


    /* public function fetchMultiData1($s_tab_name='', $s_select='*', $m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
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
    } */

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
