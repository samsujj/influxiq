<?php

/**
* function for getting html of video category dropdown
*/


function count_admin(){
    $CI = & get_instance();
    $b_res=$CI->db->select('*')->from('influxiq_user_details')->where(array('i_user_role'=>1))->get();
    if($b_res->num_rows()){
        $m_res = $b_res->result_array();
    }
    return(count($m_res));
}   

function get_user_role_dd($i_sel_id=0){
    $html = '';
    $s_select = '';
    $CI = & get_instance();
    $o_res = $CI->db->select('id, s_role_name')->from('influxiq_user_role')->get();
    if($o_res->num_rows()){
        $m_res = $o_res->result_array();
        if(count($m_res)>0){
            foreach($m_res as $m_row){
                $s_select = '';
                if(intval($i_sel_id)==intval($m_row['id'])){
                    $s_select = "selected='selected'";
                }
                // echo count_admin();exit;
                /*if(count_admin()>0){
                // $m_row['s_role_name']
                $html .= "<option value='2' ".$s_select." >"."Admin"."</option>";
                } */
                // else{
                $html .= "<option value='".$m_row['id']."' ".$s_select." >".$m_row['s_role_name']."</option>";  
                // }
            } 
        }
    }

    unset($CI, $i_sel_id, $o_res, $m_res);
    return $html;
}

function get_affiliate_type($i_sel_id=''){
    $html = '';
    $s_select = '';
    $CI = & get_instance();
    $sql="select i_id,s_aff_type from influxiq_affiliation_type";
    //  $o_res = $CI->db->select('i_id,s_aff_type')->from('influxiq_affiliation_type')->get();
    $o_res=$CI->db->query($sql);
    if($o_res->num_rows()){
        $m_res = $o_res->result_array();
        if(count($m_res)>0){
            foreach($m_res as $m_row){
                $s_select = '';
                if($i_sel_id==$m_row['s_aff_type']){
                    $s_select = "selected='selected'";
                }
                // echo count_admin();exit;
                /*if(count_admin()>0){
                // $m_row['s_role_name']
                $html .= "<option value='2' ".$s_select." >"."Admin"."</option>";
                } */
                // else{
                $html .= "<option value='".$m_row['s_aff_type']."' ".$s_select." >".$m_row['s_aff_type']."</option>";  
                // }
            } 
        }
    }

    unset($CI, $i_sel_id, $o_res, $m_res);
    return $html;
}


function get_affiliate_type1($i_sel_id=array()){
    $html = '';
    $s_select = '';
    $CI = & get_instance();
    $sql="select i_id,s_aff_type from influxiq_affiliation_type";
    //  $o_res = $CI->db->select('i_id,s_aff_type')->from('influxiq_affiliation_type')->get();
    $o_res=$CI->db->query($sql);
    if($o_res->num_rows()){
        $m_res = $o_res->result_array();
        $i=0;
        if(count($m_res)>0){
            foreach($m_res as $m_row){
                $s_select = '';
                if($i_sel_id[$i]['s_aff_type']==$m_row['s_aff_type']){
                    $s_select = "selected='selected'";
                }
                $i++;
                // echo count_admin();exit;
                /*if(count_admin()>0){
                // $m_row['s_role_name']
                $html .= "<option value='2' ".$s_select." >"."Admin"."</option>";
                } */
                // else{
                $html .= "<option value='".$m_row['s_aff_type']."' ".$s_select." >".$m_row['s_aff_type']."</option>";  
                // }
            } 
        }
    }

    unset($CI, $i_sel_id, $o_res, $m_res);
    return $html;
}


function get_affiliate_name($i_sel_name=""){
      $html = '';
    $s_select = '';
    $CI = & get_instance();
    $o_res = $CI->db->select('s_aff_name')->from('affiliation_details')->get();
    if($o_res->num_rows()){
        $m_res = $o_res->result_array();
        if(count($m_res)>0){
            foreach($m_res as $m_row){
                $s_select = '';
                if(intval($i_sel_id)==intval($m_row['s_aff_name'])){
                    $s_select = "selected='selected'";
                }
                // echo count_admin();exit;
                /*if(count_admin()>0){
                // $m_row['s_role_name']
                $html .= "<option value='2' ".$s_select." >"."Admin"."</option>";
                } */
                // else{
                $html .= "<option value='".$m_row['s_aff_name']."' ".$s_select." >".$m_row['s_aff_name']."</option>";  
                // }
            } 
        }
    }

    unset($CI, $i_sel_id, $o_res, $m_res);
    return $html;
}

function get_state_name($i_id="",$i_state_id=""){
        
        $CI = & get_instance();
        $o_res=$CI->db->get_where("state",array('cnt_id'=>intval($i_id)));
        $m_res=$o_res->result_array();
        $html="";
        $select="";
        foreach($m_res as $row){
            if($row['id']==$i_state_id){
                $select="selected='selected'";
            }
            else{
               $select=""; 
            }
            
            $html.="<option value='".$row['id']."' ".$select.">".$row['st_name']."</option>";
        }

        
       return $html;  
            
}
