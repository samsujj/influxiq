<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* controller for landing page of front end
* @author: Arnab Chattopadhyay
*/
require APPPATH.'controllers/My_controller.php';

class Authlead extends My_Controller {

    private $i_edit_id = 0;
    public $per_page_show = 20;

    public $arr;

    public function __construct(){
        parent::__construct();
        $this->chk_user_access('admin');
        $this->load->library('form_validation');
        $this->load->model('authlead_model');
        $this->load->helper('dropdown_helper');
        $this->load->helper('image');
        $this->s_menu_id = 'menu_auth_lead';
    }

    public function index() {
        $this->s_menu_id = 'list_auth_lead';
        redirect(admin_url()."authlead/listing");
    }

    /**
    * function for product addition purpose
    */


    /**
    * function for product listing purpose
    */
    public function listing($i_page=""){
        $this->s_title .= " :: Author Lead Listing";
        $this->s_sub_menu_id = 'list_auth_lead';
        $this->load->library('pagination'); 
       // $flag=0;
        //  $sdate=$this->input->post('sdate');
        //  $fdate=$this->input->post('fdate');

        //   $seg1=$this->uri->segment(4);
        // $this->m_data['s_aff_type']=$seg1; 

        $s_tab_name='author_details';
        $s_select='*';
        $m_where=array();
        $s_group_by = 'author_id';
        $s_order_by_name = "author_id";
        $s_order_by = "DESC";
        $i_perpage=$this->per_page_show;
        //   $this->session->set_userdata('csvarr1',$sess_arr);
        
        $sess_data=$this->session->userdata('sess_data');
        
        if(!empty($sess_data)){
          //  $s_select="*,CONCAT(s_fname , s_lname) AS `s_full_name`";
            $this->m_data['m_dataset1'] = $this->authlead_model->fetchSearchData($s_tab_name, $s_select, $sess_data, $s_group_by, $s_order_by_name, $s_order_by);    
         $this->m_data['m_dataset']=$this->authlead_model->fetchSearchData($s_tab_name,$s_select,$sess_data,$s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);
         //  pr($res,true);
        }
        else{          
        $this->m_data['m_dataset1'] = $this->authlead_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    
        $this->m_data['m_dataset'] = $this->authlead_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by,$i_perpage,$i_page);   
        }

        $config['base_url']=admin_url()."authlead/listing/"; 
        $config['total_rows']=count($this->m_data['m_dataset1']);
        $config['per_page']=$this->per_page_show;
        $config['num_links'] = 4;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        //    $config['full_tag_open'] = '<a>';
        //   $config['full_tag_close'] = '</a>';

        $this->pagination->initialize($config);






        //$this->m_data['s_aff_type']='product';
        // $this->m_data['s_aff_type']='product';
        $this->render();
    }


    public function listingprop(){
        $this->session->unset_userdata('csvarr1');
        redirect(admin_url()."lead/listing");
    }

    /**
    * function for product edit purpose
    * 
    * @param mixed $s_edit_id
    */


   
    
    
    public function search1($s_all=""){
        
        if(count($_POST)>0)
        {
            $s_search=get_safe($this->input->post('search'));
            $this->session->set_userdata('sess_data',$s_search);

        }
        if($s_all=="all"){
            $this->session->unset_userdata('sess_data','');
            
        }
        redirect(admin_url()."authlead/listing");
        
    }

    function download(){
        $this->load->helper('csv');
        $result=$this->session->userdata('csvarr1');
        //  pr($result,true);     
        if(empty($result)){
            $s_tab_name='influxiq_apply_details';
            $s_select='i_app_id,s_app_name,s_email,s_comment,s_aff_url,s_product_id,t_add_time';
            $m_where=array(); 
            // if($i_user_role>0)
            $m_where=array();
            $s_group_by='';
            $s_order_by_name = 's_app_name';
            $s_order_by = 'DESC';
            //  $i_perpage=$this->per_page_show;

            $retset=$this->lead_model->fetchMultiData($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name); 
        }
        else{
            $s_tab_name='apply_details';
            $s_select='i_app_id,s_app_name,s_email,s_comment,s_aff_url,s_product_id,t_add_time';
            $m_where="`t_add_time` between '".$result[0]."' and '".$result[1]."'";
            $s_group_by = 'i_app_id';
            $s_order_by_name = "i_app_id";
            $s_order_by = "DSC";
            $i_perpage=$this->per_page_show;
            $retset = $this->lead_model->fetchMultiDate($s_tab_name, $s_select, $m_where, $s_group_by, $s_order_by_name, $s_order_by);    

        }
        //pr($retset,true);
        $heading=array('Lead ID','Lead Name','Lead Email','Lead Comment','Lead Affiliate Code','Lead Product Name','Lead Add Time'); 
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"Leads.csv");

    }

    function download1(){
        $this->load->helper('csv');
        //  $result=$this->session->userdata('csvarr');
        //  pr($result,true);     
        $val=$this->session->userdata('arr_elm1234');

        $s_select='i_app_id,s_app_name,s_email,s_comment,s_aff_url,s_product_id,t_add_time';
        $retset=$this->lead_model->fetchSearchUser("influxiq_apply_details",$s_select,$val[0]);
        //pr($retset,true);

        $heading=array('Lead ID','Lead Name','Lead Email','Lead Comment','Lead Affiliate Code','Lead Product Name','Lead Add Time'); 
        $result1[0]=$heading;

        for($i=1;$i<=count($retset);$i++){
            $result1[$i]=$retset[$i-1];
        }
        $this->csv_array=$result1;
        array_to_csv($this->csv_array,"Leads.csv");
    }

    /**
    * function for product delete purpose
    * 
    * @param mixed $s_id
    */
    public function del($s_id='') {        
        (!is_superadmin())?redirect(admin_url()):"";

        $i_id = intval(strDecode($s_id));

        $m_where = array('author_id'=>$i_id);
        $ret_ = $this->my_model->delData('author_details', $m_where);


        if($ret_>0){ 
            add_msg('Author leads details deleted successfully!!', "ok");
        }else{
            add_msg('Author leads details not deleted!!', "err");
        }
        redirect(admin_url().'authlead/listing');
    }




    //manage-product-types-del
    /*   public function manage_product_types_del($s_id='') {

    // Checking admin access
    (!is_admin())?redirect(admin_url()):"";
    $i_id = intval(strDecode($s_id));

    // Deleting from package details table
    $m_where = array('id'=>$i_id);
    $ret_ = $this->product_model->delData('product_type', $m_where);
    if($ret_>0){            
    add_msg('Product deleted successfully!!', "ok");
    }else{
    add_msg('Product not deleted!!', "err");
    }
    redirect(admin_url().'product/manage-product-types.html');
    } */

    // testing purpose
    public function test(){
        /*$format = '%d/%m/%Y';
        echo strptime('20/10/2010', $format);*/
        echo strtotime('03/06/2012');
        echo "<br />".getExt('asd.ss');
        echo "<br />".getName('asd.ll.ss');
    }


    public function change_state($s_state='', $s_enc_id=''){
        $i_is_allow = ($s_state=='allow')?1:2;
        $i_id = intval(strDecode($s_enc_id));

        $ret_ = $this->mod_af->updateData('catagory_details', array('i_active'=>$i_is_allow), array('i_cat_id'=>$i_id));
        if($ret_){
            ($i_is_allow==1)?add_msg("Catagory is active now.", 'ok'):add_msg("Catagory is inactive now", 'ok');
        }else{
            add_msg("Blog status change not done");
        }
        redirect(admin_url().'product/listing.html');
    }

    public function category_name_check($s_name) {
        $val=$this->input->post('cid');
        //$arr1=explode('~',$val);
        // pr($arr1,TRUE);
        $ret1_=$this->mod_af->fetchMultiDataCount('catagory_details',array('s_cat_name'=>$val));
        $ret_ = $this->mod_af->fetchSingleData('catagory_details', array('i_cat_id !='=>$this->i_edit_id, 's_cat_name'=>$s_name));
        if (count($ret_)>0) {
            // pr($ret1_,TRUE);
            if($ret_['i_cat_id']==$ret1_[0]['i_cat_id']){
                return TRUE;
            }
            else{
                $this->form_validation->set_message('category_name_check', '%s already exists in database. Please select other.');
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }


    /*  public function category_pos_check($i_pos) {
    $val=$this->input->post('h_cpos');
    $arr1=explode('~',$val);
    // pr($arr1,TRUE);
    $ret1_=$this->product_model->fetchMultiDataCount('catagory_details',array('i_cat_position'=>$val));
    $ret_ = $this->product_model->fetchSingleData('catagory_details', array('i_cat_id !='=>$this->i_edit_id, 'i_cat_position'=>$i_pos));
    if (count($ret_)>0) {
    // pr($ret1_,TRUE);
    if($ret_['i_cat_id']==$ret1_[0]['i_cat_id']){
    return TRUE;
    }
    else{
    $this->form_validation->set_message('category_pos_check', '%s already exists in database. Please select other.');
    return FALSE;
    }
    } else {
    return TRUE;
    }
    } */


}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
