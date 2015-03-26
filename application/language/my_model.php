<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* An abstruct model for extending into other controllers.
* Here we will write the common functions
* 
* @author: Arnab Chattopadhyay
*/
//require APPPATH.'interfaces/inf_model.php';
class My_model extends CI_Model {
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
    public function insertData($s_tab_name='', $m_data_arr=array()){
        //pr($m_data_arr,true);
        if(!isMultiArray($m_data_arr)){
            $this->db->insert($s_tab_name, $m_data_arr);
        }
        else{
            $this->db->insert_batch($s_tab_name, $m_data_arr); 
        }

        return intval($this->db->insert_id());
    }

    /**
    * method to update data into database according to a where clause
    * 
    * @param string $s_tab_name
    * @param mixed $m_data_arr
    * @param mixed $m_where
    */
    public function updateData($s_tab_name='', $m_data_arr=array(), $m_where=array()){
        $s_sql = $this->db->update_string($s_tab_name, $m_data_arr, $m_where);
        // echo $this->db->last_query();
        // echo $this->db->simple_query($s_sql);
        return $this->db->simple_query($s_sql);
    }

    public function updateData1($s_tab_name='', $m_data_arr=array(), $m_where=array()){
        return($this->db->update($s_tab_name, $m_data_arr, $m_where));
      // return ($this->db->last_query());

        // echo $this->db->simple_query($s_sql);
        //    return $this->db->simple_query($s_sql);
    }


    /**
    * method to fetch single data by where clause
    * 
    * @param string $s_tab_name
    * @param mixed $m_where
    */
    public function fetchSingleData($s_tab_name="", $m_where=array()){
        $o_res = $this->db->get_where($s_tab_name, $m_where);
        //echo $this->db->last_query();
        if($o_res->num_rows()> 0) {
            return $o_res->row_array();
        } else {
            return array();
        }
    }


    public function joinTable($tabname1="",$tabname2="",$str=""){
        $this->db->select('*');
       // $str="comments.id = blogs.id";
        $this->db->from($tabname1);
        $this->db->join($tabname2,$str);
        $query = $this->db->get();
        if($query->num_rows > 0) {
            return $query->row_array();
        } else {
            return array();
        }
    }


    /**
    * method to fetch multiple data by where clause
    * 
    * @param string $s_tab_name
    * @param mixed $m_where
    */
    public function fetchMultiData($s_tab_name='', $s_select='*', $m_where=array(), $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
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

        $o_res = $this->db->select($s_select)->from($s_tab_name)->where($m_where)->get();   
        // echo $this->db->last_query();     
        //echo $this->db->last_query();
        if($o_res->num_rows()>0) {
            return $o_res->result_array();
        } else{
            return array();
        }   
    }

    /**
    * method to fetch multiple data by where clause
    * 
    * @param string $s_tab_name
    * @param mixed $m_where
    */
    public function fetchMultiDataCount($s_tab_name='', $m_where=array()){
        /* if(!empty($i_perpage))
        $this->db->limit($i_perpage, $i_page); */
        $o_res = $this->db->select('*')->from($s_tab_name)->where($m_where)->get();        
        // echo $this->db->last_query();
        if($o_res->num_rows()>0) {
            return $o_res->result_array();
        } 
        else{
            return array();
        }   
    }

    /**
    * method to delete data depending on where clause
    * 
    * @param mixed $s_tab_name
    * @param mixed $m_where
    */
    public function delData($s_tab_name='', $m_where=array()){
        if(count($m_where)>0){
            $this->db->where($m_where);
        }
        $this->db->delete($s_tab_name);
        return $this->db->affected_rows();
    }

    function select_user_data($tab_name,$m_where=array(),$per_page='', $page=0){
        //   $data=$this->session->userdata('admin_data');
        $this->db->limit($per_page, $page);
        // $this->db->where(array('user_id'=>$data['user_id']));
        $query=$this->db->get($tab_name);
        return($query->result_array());   
    }
    
     public function fetchSearchUser1($s_tab_name='', $s_select='*',$m_where="", $s_group_by='', $m_order_by_name='id', $m_order_by='DESC', $i_perpage='', $i_page=''){
         
         echo $this->session->userdata('sess_data');   exit;
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
