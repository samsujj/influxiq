<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* An abstruct model for extending into other controllers.
* Here we will write the common functions
* 
* @author: Arnab Chattopadhyay
*/
//require APPPATH.'interfaces/inf_model.php';
class Authlead_model extends My_model {
    /**
    * constructor method
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }


    /**
    * method to insert data into database
    * 
    * @param string $s_tab_name
    * @param mixed $m_data_arr
    */
   /* public function searchdata($match)
    {
        $array = array('s_fname' => $match, 's_lname' => $match, 's_email' => $match,'s_phone'=> $match,'i_state'=>$match,'s_city'=>$match); 
        // $this->db->or_like();
        $o_res = $this->db->select($array)->from($s_tab_name)->or_like($m_where)->get();   
        $m_res=$o_res->result_array();
        return($m_res)    ;
    }
*/

    public function fetchSearchData($s_tab_name='', $s_select='*', $match="", $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
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

        $m_where = array('s_fname' => $match, 's_lname' => $match, 's_email' => $match,'s_phone'=> $match,'i_state'=>$match,'s_city'=>$match); 

        $o_res = $this->db->select($s_select)->from($s_tab_name)->or_like($m_where)->get();   
        // echo $this->db->last_query();     
        //echo $this->db->last_query();
        if($o_res->num_rows()>0) {
            return $o_res->result_array();
        } else{
            return array();
        }   
    }
}
