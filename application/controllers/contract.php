<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/My_controller.php';

class Contract extends My_controller {

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

    public function index()
    {           

        $data['err_msg']="";
        $aff_url=$this->session->userdata("aff_url");   
        $aff_type=$this->session->userdata("aff_type");  
        $s_tab_name='contract';
        $s_select='*';

        $data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select);
        $header1=$data['m_dataset'][0]['header'];
        $terms1=$data['m_dataset'][0]['terms_conditions'];
        $footer1=$data['m_dataset'][0]['footer'];
        //pr($data['m_dataset'],true);
        $cat=$this->session->userdata('contract');
        $m_cart_val=$this->cart->contents();
        //pr($m_cart_val);
        $data['have_duration']="";
        if(count($m_cart_val))
        {
            //  pr($cat,true);
            // $m_cart_val=$this->cart->contents();
            $i=0;
            $data['have_duration']=0;
            foreach($m_cart_val as $key=>$val)
            {
                $prod_details[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                $s_tab_name='vw_product_details1';
                $s_select='id,cat_id,name,price,insall_charge,platform_cost,transaction_charge,codeonly_price,image,package_duration,package_price,package_status,cat_id,cat_name,contract,package_no';

                if($m_cart_val[$key]['package_id'] == 'NULL')
                    $m_where=array('id'=>$m_cart_val[$key]['prod_id'],'package_id'=>NULL);
                else
                    $m_where=array('id'=>$val['prod_id'],'package_id'=>$m_cart_val[$key]['package_id']);
                $s_group_by='id';
                $s_order_by_name = 'cat_id';
                $s_order_by = 'ASC';
                $data['details'][$key]=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by);
                $data['details'][$key]['qty'] = $m_cart_val[$key]['qty'];
                if($data['details'][$key][0]['package_duration']=="12 months"||$data['details'][$key][0]['package_duration']=="12 Months"){
					$data['have_duration']=1;
				}
				
                $i++;

            }
          //pr($data['details'],true);
           
















        }
        else{
            $prod_details=array();
        }

        if(count($_POST))
        {
            $this->form_validation->set_rules('fname','First Name','required');
            $this->form_validation->set_rules('lname','Last Name','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('signature','Signature','required');

            if($this->form_validation->run()!=FALSE)
            {
            if(!empty($prod_details)){  
                $send_data['fname']=$this->input->post('fname');  
                $send_data['lname']=$this->input->post('lname');  
                $send_data['phone']=$this->input->post('phone');  
                $send_data['email']=$this->input->post('email');  
                $send_data['signature']=$this->input->post('signature');  
                $send_data['price']=$this->input->post('price');  
               
                    $send_data['product']=serialize($prod_details);
              
                if(!empty($aff_url)){  
                    $send_data['aff_type']=$aff_type;                                                        
                    $send_data['aff_code']=$aff_url;                                                        
                    $send_data['aff_name']= getAffiliateName($aff_type,$aff_url); 
                }


                // pr($this->input->post('product'),true);
                //pr($send_data,true);
                //  $html.="Name:". $send_data['fname']." ".$send_data['fname']."<br/>Phone:".$send_data['phone']."<br/>
                // Email:".$send_data['email']."<br/>Price:".$send_data['price']."<br/>Product:<br/>";
              //  $html=$this->showMainPart($header1,$data['details'],$terms1,$footer1);       
                
              //  set_time_limit(0);    
           //     ini_set('memory_limit', '512M');
                 
                // echo $html;exit;
                $s_tab_name='order_details';
                $this->mod->insertData($s_tab_name, $send_data);
              //   $pdf_filename  = 'contract.pdf';


              //  $this->load->library('dompdf_lib');
               // $this->dompdf_lib->convert_html_to_pdf($html, $pdf_filename, TRUE);
                

                //$this->session->unset_userdata('contract');
                //redirect(base_url());

                $this->load->library('email');

                $this->email->from('info@influxiq.com', 'Info');
                $this->email->to($send_data['email']);


                $this->email->subject('Contract Email Verifacation');
                $this->email->message('This is verification message');

               // $this->email->send();
                $this->session->set_flashdata('pop_msg', 'Thank you for submitting the contract to InfluxIQ Development Group, a representative will be with you shortly to verify your order');
                redirect(base_url());
                }
                else{
                    $data['err_msg']="<div style='color:red;'>Error Occured..Pls add some product</div>";
                     $this->load->view('contract',$data);    
                } 
                

            }
            else
            {
                $this->load->view('contract',$data);   
            }


        }
        else
        {
            $this->load->view('contract',$data);

        }





        // pr($data['details'],true);



    }

    public function addContract($land_numb="")
    {


        $i=0;
        $flag=0;
        $prod_type=$this->input->post('type');
        $prod_id=$this->input->post('product_id');
        $package_id=$this->input->post('value');

        if($prod_type == 1)
            $this->cart->destroy();

        $m_cart_val=$this->cart->contents();

        if(empty($land_numb)){
            if(!empty($m_cart_val)){
                foreach($m_cart_val as $key=>$val){
                    $m_cart_type_val[$i]['type']=$m_cart_val[$key]['type'];
                    $m_cart_type_val[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                    $m_cart_type_val[$i]['package_id']=$m_cart_val[$key]['package_id'];  
                    if($m_cart_type_val[$i]['type']==$prod_type){


                        $flag=1;

                        break;
                    }  


                    $i++;
                }



                //   $this->m_data['m_cart_val']=$m_cart_type_val;
                // $this->m_data['m_is_cart_insert']=$m_is_insert;
            }

            if($prod_id==18){
                $flag=0;
            }




            if($flag==0){
                if(!empty($land_numb)){
                    $this->mod->updateData1('product',array('prodnum'=>$land_numb),array('id'=>$prod_id));
                }



                $m_cart_data['id']=time().$prod_type;    
                if($prod_id==18){  
                    $m_cart_data['qty']=$land_numb;    
                } 
                else{
                    $m_cart_data['qty']=1;  
                }                               
                $m_cart_data['price']=1;    
                $m_cart_data['name']=1;    
                $m_cart_data['prod_id']=$prod_id;       
                $m_cart_data['type']=$prod_type;
                $m_cart_data['package_id']=$package_id;



                $ret_=$this->cart->insert($m_cart_data); 
            }
            else{
                $prod_type=0;
            }
        }
        else{
            $m_cart_data['id']=time().$prod_type;    
            if($prod_id==18){  
                $m_cart_data['qty']=$land_numb;    
            } 
            else{
                $m_cart_data['qty']=1;  
            }                               
            $m_cart_data['price']=1;    
            $m_cart_data['name']=1;    
            $m_cart_data['prod_id']=$prod_id;       
            $m_cart_data['type']=$prod_type;
            $m_cart_data['package_id']=$package_id;

            $ret_=$this->cart->insert($m_cart_data); 
        }

        /*  $cart = $this->session->userdata('contract');
        $cart[$type]['product_id'] = $_POST['product_id'];
        $cart[$type]['val'] = $_POST['value'];

        $this->session->set_userdata('contract',$cart);
        */
        echo $prod_type;
    }


    /**
    * Update cart
    */
    public function updateCart(){
        $prod_type=$this->input->post('type');
        $prod_id=$this->input->post('product_id');
        $package_id=$this->input->post('value');
        $m_cart_val=$this->cart->contents();
        $flag=0;
        $cart_rowid="";
        $i=0;
        if(!empty($m_cart_val)){
            foreach($m_cart_val as $key=>$val){
                $m_cart_type_val[$i]['type']=$m_cart_val[$key]['type'];
                $m_cart_type_val[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                $m_cart_type_val[$i]['package_id']=$m_cart_val[$key]['package_id'];
                if($m_cart_type_val[$i]['type']==$prod_type){
                    $cart_rowid=$m_cart_val[$key]['rowid'];
                    $flag=1;
                    break;
                }

                $i++;
            }

            //   $this->m_data['m_cart_val']=$m_cart_type_val;
            // $this->m_data['m_is_cart_insert']=$m_is_insert;
        }
        if(!empty($cart_rowid)){
            $m_cart_data['rowid']=$cart_rowid;
            //$m_cart_data['id']=time().$prod_type;      
            $m_cart_data['qty']=0;
            //$m_cart_data['price']=1;    
            // $m_cart_data['name']=1;    
            //		$m_cart_data['prod_id']=$prod_id;       
            // $m_cart_data['type']=$prod_type;
            //	$m_cart_data['package_id']=$package_id;
            $this->cart->update($m_cart_data);

            unset($m_cart_data);
            $m_cart_data['id']=time().$prod_type;
            $m_cart_data['qty']=1;
            $m_cart_data['price']=1;
            $m_cart_data['name']=1;
            $m_cart_data['prod_id']=$prod_id;
            $m_cart_data['type']=$prod_type;
            $m_cart_data['package_id']=$package_id;

            $ret_=$this->cart->insert($m_cart_data);

        }

        echo $flag;
        // $arr=$this->cart->product_options($cart_rowid);
        //pr($arr);
    }

    public function updateCart1(){
    $prod_id=$this->input->post('prod_id');
    $qty=$this->input->post('land_numb');
    $m_cart_val=$this->cart->contents();
    $flag=0;
    $cart_rowid="";
    $i=0;

    if(!empty($m_cart_val)){
        foreach($m_cart_val as $key=>$val){
            $m_cart_type_val[$i]['qty']=$m_cart_val[$key]['qty'];
            $m_cart_type_val[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
            if($m_cart_type_val[$i]['prod_id']==$prod_id){
                $cart_rowid=$m_cart_val[$key]['rowid'];
                $flag=1;
                break;
            }

            $i++;
        }

        //   $this->m_data['m_cart_val']=$m_cart_type_val;
        // $this->m_data['m_is_cart_insert']=$m_is_insert;
    }


    if(!empty($cart_rowid)){
        $m_cart_data['rowid']=$cart_rowid;
        //$m_cart_data['id']=time().$prod_type;
        $m_cart_data['qty']=$qty;
        //$m_cart_data['price']=1;
        // $m_cart_data['name']=1;
        //		$m_cart_data['prod_id']=$prod_id;
        // $m_cart_data['type']=$prod_type;
        //	$m_cart_data['package_id']=$package_id;
        $this->cart->update($m_cart_data);

        unset($m_cart_data);


    }

    echo $flag;
    // $arr=$this->cart->product_options($cart_rowid);
    //pr($arr);
}


    /***
	 * Delete cart....
	 */ 
	public function deleteCart(){
		//$prod_type=$this->input->post('type');
        $prod_id=$this->input->post('product_id');
       // $package_id=$this->input->post('value');
        $m_cart_val=$this->cart->contents();
        $flag=0;    
        $cart_rowid="";
        $i=0;
        if(!empty($m_cart_val)){
            foreach($m_cart_val as $key=>$val){
                $m_cart_type_val[$i]['type']=$m_cart_val[$key]['type'];
                $m_cart_type_val[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                $m_cart_type_val[$i]['package_id']=$m_cart_val[$key]['package_id'];                            
                if($m_cart_type_val[$i]['prod_id']==$prod_id){
                    $cart_rowid=$m_cart_val[$key]['rowid'];
                    $flag=1;
                    break;
                }   

                $i++;
            }                      

            //   $this->m_data['m_cart_val']=$m_cart_type_val;
            // $this->m_data['m_is_cart_insert']=$m_is_insert;
        }
        if(!empty($cart_rowid)){
            $m_cart_data['rowid']=$cart_rowid;	
            //$m_cart_data['id']=time().$prod_type;      
            $m_cart_data['qty']=0;
           echo $this->cart->update($m_cart_data); 								

          }    
          else{
			echo 2;  
		}  
		
	}
	
	/**
	 * 
	 */
	 
	 public function updateLandingPage(){
		 $land_numb=get_safe($this->input->post('land_numb'));
		 $prod_id=get_safe($this->input->post('prod_id'));
		 echo $this->mod->updateData1('product',array('prodnum'=>$land_numb),array('id'=>$prod_id));
	 }  


    public function showCurCart($prod_type=""){
        $m_cart_val=$this->cart->contents();
        $i=0;
        $flag=0;
        //  $prod_type=$this->input->post('type');
        //$prod_id=$this->input->post('product_id');
        //$package_id=$this->input->post('value');


        if(!empty($m_cart_val)){
            foreach($m_cart_val as $key=>$val){
                $m_cart_type_val[$i]['type']=$m_cart_val[$key]['type'];
                $m_cart_type_val[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                $m_cart_type_val[$i]['package_id']=$m_cart_val[$key]['package_id'];                            
                if($m_cart_type_val[$i]['type']==$prod_type){
                    $prod_name=getProductName($m_cart_type_val[$i]['prod_id']);
                    $flag=1;
                    break;
                }   

                $i++;
            }



            //   $this->m_data['m_cart_val']=$m_cart_type_val;
            // $this->m_data['m_is_cart_insert']=$m_is_insert;
        }
        echo $prod_name;

    }


    public function addOrder()
    {
        if(count($_POST))
        {
            $this->form_validation->set_rules('fname','First Name','required');
            $this->form_validation->set_rules('lname','Last Name','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('signature','Signature','required');
            if($this->form_validation->run()!=FALSE)
            {
                $send_data['fname']=$this->input->post('fname');  
                $send_data['lname']=$this->input->post('lname');  
                $send_data['phone']=$this->input->post('phone');  
                $send_data['email']=$this->input->post('email');  
                $send_data['signature']=$this->input->post('signature');  
                $send_data['price']=$this->input->post('price');  
                $send_data['product']=serialize(@$this->session->userdata('contract'));
                // pr($this->input->post('product'),true);
                $s_tab_name='order_details';
                $this->mod->insertData($s_tab_name, $send_data);
                $this->session->unset_userdata('contract');
                redirect(base_url());

            }
            else
            {
                echo 2;

            }


        }
        else
        {
            redirect(base_url().'contract');
        }

    }


    public function showMainPart($header="",$details=array(),$terms="",$footer=""){
        // pr($details,true);
        $price = 0;
        $marketPack = '';
        $html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Influxiq</title>
        </head>
        <body>';
        $html.='<table border="0" cellpadding="0" cellspacing="0" style="width:960px; margin:0 auto;">
<tr>
	<td>
    <table border="0" cellpadding="0" cellspacing="0" style="background:#c9c9c9; border:#b6b6b6 1px solid; padding:19px;">
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" style="width:922px; background:#eeeeee; padding:10px;">
                <tr>
                    <td align="center" style="font-size:20.0pt;font-family:Arial,sans-serif; color:black; padding-bottom:10px;">Welcome the the InfluxIQ experience!</td>
                </tr>
                <tr><td style="font:normal 13px/18px Arial, Helvetica, sans-serif;color:#000; padding-bottom:10px;">'.put_safe($header).'</td>
                <tr>
            </table>
        </td>
    </tr>
    </table>
    </td>
</tr>';

        if(count(@$details))
        {
            //  $marketPack = strtoupper(trim(str_replace(' ', '', @$details[4][0]['package_duration'])));
            foreach(@$details as $row)
            {
                if(count($row))
                {
                    if(!empty($row[0]['package_duration'])){ 
                        //$pack_month=strtoupper(trim(str_replace(' ', '', @$row[0]['package_duration']))); 
                        //  if($row[0]['package_duration']==)
                        $marketPack=strtoupper(trim(str_replace(' ', '', @$row[0]['package_duration']))); 
                    }

                    $html.='<tr>
	<td>
    <table border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; width:960px; background:#1c1c1c; padding-bottom:10px;">
    <tr>
    	<td valign="top" style="font-size:18pt;font-family:Arial,sans-serif; color:#fff; padding-left:10px; padding-top:10px;">'.@$row[0]['cat_name'].'</td>
    </tr>
    <tr>
    	<td valign="top" style="padding-left:10px; font:normal 15px/15px Arial, Helvetica, sans-serif; color:#f67c00;">'.@$row[0]['name'].'</td>
    </tr>
    </table>
    </td>
</tr>
<tr>
	<td >
    	<table border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;">
        <tr>
        	<td valign="top">
            <table border="0" cellpadding="0" cellspacing="0" style="width:358px;background:#eeeeee; border:#b6b6b6 1px solid; padding:30px 10px;">
            	<tr>
                	<td align="center">
                    <img src="'.base_url().'uploads/product_image/image/'.@$row[0]['image'].'" /> 
                    </td>
                </tr>
                <tr>
                	<td align="center"><img src="'.base_url().'images/partitionc.jpg" alt="" width="310" height="65" /></td>
                </tr>
                <tr>
                	<td align="center" style="font:normal 20px/22px Arial, Helvetica, sans-serif;color:#004a6f;">'; 

                    if( @$row[0]['cat_id'] == 1)
                    {
                        $price += @$row[0]['price'];
                        $price += @$row[0]['platform_cost'];
                        $price += @$row[0]['insall_charge'];
                        $price += @$row[0]['transaction_charge'];

                        if(@$row[0]['price'] > 0)
                        {

                            $html.='Price : <span style="color:#e07300;">$'.@$row[0]['price'].'</span> <br>';           
                        }
                        if(@$row[0]['platform_cost'] > 0)
                        {
                            $pcost="";
                            $cost="";
                            $html.='Platform Cost : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$'.
                            $pcost=@$row[0]['platform_cost'].'</strong> <br>';           
                        }          
                        if(@$row[0]['insall_charge'] > 0)
                        {

                            $html.='Install Chrage : <span style="color:#e07300;">$'.@$row[0]['insall_charge'].'</span><br>';

                        }



                        if(@$row[0]['transaction_charge'] > 0)
                        {

                            $html.='Transaction Charge : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$'.@$row[0]['transaction_charge'].'</strong>';

                        }           
                    } 
                    if( @$row[0]['cat_id'] == 2)
                    {
                        $price += @$row[0]['price'];


                        $html.='Price : <span style="color:#e07300;">$'.@$row[0]['price'].'</span>'; 

                    } 
                    if(@$row[0]['cat_id'] == 3 || @$row[0]['cat_id'] == 4)
                    {
                        $price += @$row[0]['package_price']; 


                        $html.='Price : <span style="color:#e07300;">$'.@$row[0]['package_price'].'</span>'; 


                    }

                    $html.='</td>
                </tr>
            </table>
                      
                   
            </td>
        </tr>';


        }  }  }



        $html.='<tr>
	<td colspan="2" style="font:normal 18px/22px Arial, Helvetica, sans-serif;color:#e07300; padding:10px 0px;">Terms & Conditions:</td>
</tr>
<tr>
	<td>
    <table border="0" cellpadding="0" cellspacing="0" style="background:#c9c9c9; border:#b6b6b6 1px solid; padding:19px;">
    <tr>
        
        <td>
            <table border="0" cellpadding="0" cellspacing="0" style="width:922px; background:#eeeeee; padding:10px;">
               
                <tr>
                    <td style="">
        ';

        $html.=put_safe($terms).'</td></tr></table></td></tr>
                        <tr>
                    <td>
                    	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                        	<td>
                            	<table border="0" cellpadding="0" cellspacing="0" style="float:left; margin:10px 0 0 15px; width:70%;">
                                <tr>
                                	<td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">First Name:</label></td>
                                    <td width="60%" height="50">
<input id="fname" class="validate[required] text-input" type="text" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;" value="" name="fname">
<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p>
									</td>
                                </tr>
                                <tr>
                                	<td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Last Name:</label></td>
                                    <td height="50">
<input id="lname" class="validate[required] text-input" type="text" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;" value="" name="lname">
<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p>
</td>
                                </tr>
                                <tr>
                                <td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Telephone:</label></td>
                                <td height="50">
<input id="phone" class="validate[required] text-input" type="text" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;" value="" name="phone">
<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p>
</td>
                                </tr>
                                <tr>
                                	<td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Email:</label></td>
                                    <td height="50">
<input id="email" class="validate[required,custom[email]] text-input" type="text" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;" value="" name="email"><p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p></td>
                                </tr>
                                <tr>
                                <td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Digital Signature:</label></td>
                                <td height="50">
<input id="signature" class="validate[required] text-input" type="text" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;" value="" name="signature"><p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p>
</td>
							    </tr>
                                           <tr>
                                	<td height="50">&nbsp;</td>
                                    <td height="50">
<input id="submitBtn" type="submit" style="background:url(http://influxiq.com/images/submit1.jpg) no-repeat; width:138px; height:41px; cursor:pointer; border:none; margin:10px 0;" value="">
<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p>
</td>
                                </tr>
                                </table>
                            </td>
                           <td valign="top">
                            	<table border="0" cellpadding="0" cellspacing="0" style="margin-left:20px; padding-top:20px;">
                                <tr>          
        
        ';


        if($marketPack == '12MONTHS' || $marketPack == '12MONTH')
        {
            $newPrice =  $newPrice =  $price - $pcost;
			$html.='<td align="center" style="font:bold 24px/27px Arial, Helvetica, sans-serif; color:#004a6f;">Total Price<br /><span style="color:#e07300;"><strike>'.$newPrice.'</strike></span></td>
			<td align="center" style="font:bold 24px/27px Arial, Helvetica, sans-serif; color:#004a6f;">Total Price<br /><span style="color:#e07300;">'.$price.'</span></td>';
			
        }
        else
        {
			$html.='<td align="center" style="font:bold 24px/27px Arial, Helvetica, sans-serif; color:#004a6f;">Total Price<br /><span style="color:#e07300;">'.$price.'</span></td>';
        }


        $html.='<div style=" width:322px; float:right; margin:10px 80px 0 0; text-align:center;">
        <img src="logo.jpg"  alt="" style="margin:40px 0;"/>

        <span style="font-family:Arial, Helvetica, sans-serif; font-size:30px; color:#004a6f; text-align:center;"> Total Price<br />';

        //     echo   $marketPack; exit;

        if($marketPack == '12MONTHS' || $marketPack == '12MONTH')
        {
            $newPrice =  $price - $pcost;

            $html.='<strong style="font-weight:normal; color:#e07300; margin-top:10px;"><strike>$'.$price.'</strike></strong> <br />';
            $html.='<strong style="font-weight:normal; color:#e07300; margin-top:10px;">$'.$newPrice.'</strong>';

        }
        else
        {

            $html.='<strong style="font-weight:normal; color:#e07300; margin-top:10px;">$'.$price.'</strong> <br />';

        }


        $html.=' </tr>
                                </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                <tr>
                
            </table>
        </td>
    </tr>
    </table>
    </td>
</tr>

</table>'
.put_safe($footer).
'</body>
</html>
';


       // $html.='<div style="clear:both;"></div></div></div>';


       // $html.=put_safe($footer);      
        //$html.='</body></html>';

        return($html);







    }
    
    
    public function getHtml($header="",$details=array(),$terms="",$footer=""){
        
        $html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Influxiq</title>
</head>

<body>';
        
        $html='<table border="0" cellpadding="0" cellspacing="0" style="width:960px; margin:0 auto;">
<tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" style="background:#c9c9c9; border:#b6b6b6 1px solid; padding:19px;">
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" style="width:922px; background:#eeeeee; padding:10px;">
                <tr>
                    <td align="center" style="font-size:20.0pt;font-family:Arial,sans-serif; color:black; padding-bottom:10px;">Welcome the the InfluxIQ experience!</td>
                </tr>
                <tr>
                    <td style="font:normal 13px/18px Arial, Helvetica, sans-serif;color:#000; padding-bottom:10px;">'.put_safe($header).'</td>
                <tr>
            </table>
        </td>
    </tr>
    </table>
    </td>
</tr>';

  if(count(@$details))
        {
            //  $marketPack = strtoupper(trim(str_replace(' ', '', @$details[4][0]['package_duration'])));
            foreach(@$details as $row)
            {
                if(count($row))
                {
                    if(!empty($row[0]['package_duration'])){ 
                        //$pack_month=strtoupper(trim(str_replace(' ', '', @$row[0]['package_duration']))); 
                        //  if($row[0]['package_duration']==)
                        $marketPack=strtoupper(trim(str_replace(' ', '', @$row[0]['package_duration']))); 
                    }
$html.='<tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" style="margin-top:20px; width:960px; background:#1c1c1c; padding-bottom:10px;">
    <tr>
        <td valign="top" style="font-size:18pt;font-family:Arial,sans-serif; color:#fff; padding-left:10px; padding-top:10px;">'.@$row[0]['cat_name'].'</td>
    </tr>
    <tr>
        <td valign="top" style="padding-left:10px; font:normal 15px/15px Arial, Helvetica, sans-serif; color:#f67c00;">'.$row[0]['name'].'</td>
    </tr>
    </table>
    </td>
</tr>
<tr>
    <td>
        <table border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;">
        <tr>
            <td valign="top">
            <table border="0" cellpadding="0" cellspacing="0" style="width:358px;background:#eeeeee; border:#b6b6b6 1px solid; padding:30px 10px;">
                <tr>
                    <td align="center"><img src="'.base_url().'uploads/product_image/image/'.@$row[0]['image'].'" alt="" width="327" height="245" /></td>
                </tr>
                <tr>
                    <td align="center"><img src="'.base_url().'images/partitionc.jpg" alt="" width="310" height="65" /></td>
                </tr>
                <tr>
                    <td align="center" style="font:normal 20px/22px Arial, Helvetica, sans-serif;color:#004a6f;">';
                     if( @$row[0]['cat_id'] == 1)
                    {
                        $price += @$row[0]['price'];
                        $price += @$row[0]['platform_cost'];
                        $price += @$row[0]['insall_charge'];
                        $price += @$row[0]['transaction_charge'];

                        if(@$row[0]['price'] > 0)
                        {

                            $html.='Price : <span style="color:#e07300;">$'.@$row[0]['price'].'</span> <br>';           
                        }
                        if(@$row[0]['platform_cost'] > 0)
                        {
                            $pcost="";
                            $cost="";
                            $html.='Platform Cost : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$'.
                            $pcost=@$row[0]['platform_cost'].'</strong> <br>';           
                        }          
                        if(@$row[0]['insall_charge'] > 0)
                        {

                            $html.='Install Chrage : <span style="color:#e07300;">$'.@$row[0]['insall_charge'].'</span><br>';

                        }



                        if(@$row[0]['transaction_charge'] > 0)
                        {

                            $html.='Transaction Charge : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$'.@$row[0]['transaction_charge'].'</strong>';

                        }           
                    } 
                    if( @$row[0]['cat_id'] == 2)
                    {
                        $price += @$row[0]['price'];


                        $html.='Price : <span style="color:#e07300;">$'.@$row[0]['price'].'</span>'; 

                    } 
                    if(@$row[0]['cat_id'] == 3 || @$row[0]['cat_id'] == 4)
                    {
                        $price += @$row[0]['package_price']; 


                        $html.='Price : <span style="color:#e07300;">$'.@$row[0]['package_price'].'</span>'; 


                    }
                    $html.='</td>
                </tr>
            </table>            
            </td>
            <td valign="top">'.
             put_safe($row[0]['contract'])
            .'</td>
        </tr>';
                }}}
        $html.='</table>
    </td>
</tr>
<tr>
    <td style="font:normal 18px/22px Arial, Helvetica, sans-serif;color:#e07300; padding:10px 0px;">Terms & Conditions:</td>
</tr>
<tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" style="background:#c9c9c9; border:#b6b6b6 1px solid; padding:19px;">
    <tr>
        <td>'.
           $html.=put_safe($terms)
        .
        '</td>
    </tr>
    </table>
    </td>
</tr>

</table></body>
</html>' ;

return($html);
        
    }


 function add_contract(){

     $email = $this->input->post('email');
     $det_val = $this->input->post('det_val');

     $s_tab_name='contract_content';
     $this->mod->insertData($s_tab_name, array('content'=>$det_val));

     $_ins_id = $this->db->insert_id();

     $this->cart->destroy();

     $sub ="Contract notification from InfluxIQ";
     $msg = 'You have a contract for products and services with InfluxIQ awaiting your signature! Please <a href="'.base_url().'contract/contract-page/'.$_ins_id.'">click here</a> to view and sign your contract.<br /><br />Thank you!<br /><br />The InfluxIQ Development Group team';

     $config['mailtype'] = 'html';

     $this->load->library('email',$config);

     $this->email->from('info@influxiq.com', 'Info');
     $this->email->to($email);


     $this->email->subject($sub);
     $this->email->message($msg);

     $this->email->send();


     $this->session->set_flashdata('pop_msg', 'Thank you for submitting the contract to InfluxIQ Development Group, a representative will be with you shortly to verify your order');
     redirect(base_url());





 }

    public function contract_page($id=0)
    {



        $content1=$this->mod->fetchMultiData('contract_content', '*',array('id'=>$id));

        $content = $content1[0]['content'];

        $m_cart_val = unserialize($content);

        //print_r($m_cart_val);exit;

        if($content1[0]['is_active'] == 0){
            redirect(base_url().'contract/expire-page');
        }

        $data['err_msg']="";
        $aff_url=$this->session->userdata("aff_url");
        $aff_type=$this->session->userdata("aff_type");
        $s_tab_name='contract';
        $s_select='*';

        $data['m_dataset']=$this->mod->fetchMultiData($s_tab_name, $s_select);
        $header1=$data['m_dataset'][0]['header'];
        $terms1=$data['m_dataset'][0]['terms_conditions'];
        $footer1=$data['m_dataset'][0]['footer'];
        //pr($data['m_dataset'],true);
        $cat=$this->session->userdata('contract');
        //$m_cart_val=$this->cart->contents();
        //pr($m_cart_val);
        $data['have_duration']="";
        if(count($m_cart_val))
        {
            //  pr($cat,true);
            // $m_cart_val=$this->cart->contents();
            $i=0;
            $data['have_duration']=0;
            foreach($m_cart_val as $key=>$val)
            {
                $prod_details[$i]['prod_id']=$m_cart_val[$key]['prod_id'];
                $s_tab_name='vw_product_details1';
                $s_select='id,cat_id,name,price,insall_charge,platform_cost,transaction_charge,codeonly_price,image,package_duration,package_price,package_status,cat_id,cat_name,contract,package_no';

                if($m_cart_val[$key]['package_id'] == 'NULL')
                    $m_where=array('id'=>$m_cart_val[$key]['prod_id'],'package_id'=>NULL);
                else
                    $m_where=array('id'=>$val['prod_id'],'package_id'=>$m_cart_val[$key]['package_id']);
                $s_group_by='id';
                $s_order_by_name = 'cat_id';
                $s_order_by = 'ASC';
                $data['details'][$key]=$this->mod->fetchMultiData($s_tab_name, $s_select, $m_where,$s_group_by);
                $data['details'][$key]['qty'] = $m_cart_val[$key]['qty'];
                if($data['details'][$key][0]['package_duration']=="12 months"||$data['details'][$key][0]['package_duration']=="12 Months"){
                    $data['have_duration']=1;
                }

                $i++;

            }

        }
        else{
            $prod_details=array();
        }

        if(count($_POST))
        {

           //   pr($_POST,true);

            $this->form_validation->set_rules('fname','First Name','required');
            $this->form_validation->set_rules('lname','Last Name','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('signature','Signature','required');

            if($this->form_validation->run()!=FALSE)
            {



                if(!empty($prod_details)){
                    $send_data['fname']=$this->input->post('fname');
                    $send_data['lname']=$this->input->post('lname');
                    $send_data['phone']=$this->input->post('phone');
                    $send_data['email']=$this->input->post('email');
                    $send_data['signature']=$this->input->post('signature');
                    $send_data['price']=$this->input->post('price');

                    $send_data['product']=serialize($prod_details);

                    if(!empty($aff_url)){
                        $send_data['aff_type']=$aff_type;
                        $send_data['aff_code']=$aff_url;
                        $send_data['aff_name']= getAffiliateName($aff_type,$aff_url);
                    }


                    $this->db->where('id',$id);
                    $this->db->update('contract_content',array('is_active'=>0));


                    $s_tab_name='order_details';
                    $this->mod->insertData($s_tab_name, $send_data);


//exit;


                    $this->load->library('email');

                    $this->email->from('info@influxiq.com', 'Info');
                    $this->email->to($send_data['email']);


                    $this->email->subject('Contract Email Verifacation');
                    $this->email->message('This is verification message');

                   // $this->email->send();
                    $this->session->set_flashdata('pop_msg', 'Thank you for submitting the contract to InfluxIQ Development Group, a representative will be with you shortly to verify your order');
                    redirect(base_url());

                }
                else{
                    $data['err_msg']="<div style='color:red;'>Error Occured..Pls add some product</div>";
                    $this->load->view('contract1',$data);
                }


            }
            else
            {
                $this->load->view('contract1',$data);
            }


        }
        else
        {
            $this->load->view('contract1',$data);

        }
    }


    public function expire_page(){
        $this->load->view('exp_contract');
    }




}


