<?php 
    $cart[] = array();
    $cart = $this->session->userdata('contract');
    $cart1 = $this->cart->contents();

?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-block.js"></script>
<script type="text/javascript">
	
    
     function redir(e)
    {
        jQuery.unblockUI();
        redirVal = jQuery(e).closest('div').find('input.chkPage:checked').val();
       // alert(redirVal);
        
        if(redirVal)
        {
                window.location.href='<?php echo base_url()?>home/'+redirVal+'.html';
        }
        
        
    }

    function showpopup(e)
    {
      var product_id= $(e).attr('product_id');
      var type = 2;
      var value ='NULL';
     
      $.post('<?php echo base_url()?>contract/addContract',
      {'product_id':product_id,'value':value,'type':type},
      function(result)
      {
		 if(result>0){ 
        jQuery.blockUI({ 
            message: $('#pop'), 
            css: {
                border : 'none', 
                top:  ($(window).height() - 335) /2 + 'px', 
                left: ($(window).width() - 530) /2 + 'px', 
                cursor: 'auto' 
            } 
        }); 
		}
		else{
			$("#up_cart").attr('prod_id',product_id);
			$("#up_cart").attr('prod_type',type);
               jQuery.get('<?php echo base_url()?>contract/showCurCart/'+type,
                {},function(res){
                    jQuery("#prod_chs_name").text(res);
                   // alert(res)
                });
                
			jQuery.blockUI({ 
				message: $('#pop_1'), 
				css: {
					border : 'none', 
					top:  ($(window).height() - 335) /2 + 'px', 
					left: ($(window).width() - 530) /2 + 'px', 
					cursor: 'auto' 
				} 
				}); 
		}
	
      }
      
      
      ) ;      
    }


     function showpopupdef(e){
         jQuery.blockUI({
             message: $('#pop_def'),
             css: {
                 border : 'none',
                 top:  ($(window).height() - 335) /2 + 'px',
                 left: ($(window).width() - 530) /2 + 'px',
                 cursor: 'auto'
             }
         });
     }
    
    function showpopup1(e){
		var prod_id=$(e).attr('product_id');
		$.get('<?php echo base_url()?>home/checkCart',
      {},
      function(result)
      {
		if(result==0){
			jQuery.blockUI({ 
            message: $('#pop_no'), 
            css: {
                border : 'none', 
                top:  ($(window).height() - 335) /2 + 'px', 
                left: ($(window).width() - 530) /2 + 'px', 
                cursor: 'auto' 
            } 
        }); 
		}
		else{
			jQuery.blockUI({ 
            message: $('#pop_form'), 
            css: {
                border : 'none', 
                top:  ($(window).height() - 335) /2 + 'px', 
                left: ($(window).width() - 530) /2 + 'px', 
                cursor: 'auto' 
            } 
        }); 
		}
      }
      
      
      ) ;
		//alert(prod_id);
	}
	
	function sub_val(){
		var land_numb=$("#land_num").val();
		var product_id=18;
		var type = 2;
		var value ='NULL';
		if(land_numb>0){
			tot_cost=parseFloat(1297.00*land_numb);
			$.post('<?php echo base_url() ?>contract/addContract/'+land_numb,
			{'product_id':product_id,'value':value,'type':type},
			function(res){
				jQuery.unblockUI();
				if(res>0){
				 jQuery.blockUI({ 
				message: $('#pop'), 
				css: {
					border : 'none', 
					top:  ($(window).height() - 335) /2 + 'px', 
					left: ($(window).width() - 530) /2 + 'px', 
					cursor: 'auto' 
				} 
				}); 
			}
			
			
			}
			);
		}
		
	}
    
    

</script>
<div class="body">
         <div class="design-banner"></div><br >
    <span class="mainheading">Website Designing</span><br><br>

    <p>The Design Packages we offer are powerful and robust as result of customized layout and construction.Our process is innovative and advanced, offering more than a simple website. We take every factor into

    consideration to ensure that each website is top-of-the-line, from the design itself to ensuringsatisfaction regarding services-rendered. We strive to provide each client with a website that stands tall

    against the competition, being both specialized and unique.</p>
<!--......................................................... START MIDDLE PART ....................................................................-->
<?php
if(count($m_dataset))
{
    foreach($m_dataset as $m_row)
    {
        if($m_row['category_id'] == 2)
        {
            if(!is_plat_cart($cart1)){
?>
    
    <div class="Productparts1">
        <div class="SC">
            <div class="Product_pics"><img style="border: 1px solid #CDCDCD;" src="<?php echo base_url(); ?>uploads/product_image/image/<?php echo  @$m_row['image'];?>" alt="" style="max-height: 248px; max-width: 328px;" /></div>
            <div class="Botom_left">
                <?php echo (@$form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;"><?php echo  ucwords(@$m_row['name']);?></span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo (@$form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo (@$form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>

                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo (@$form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>
                                <?php echo form_error('comments'); ?>
                            </div>
                            </td>

                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a><?php echo  ucwords(@$m_row['name']);?></span> <br/> <span class="orangefont"><?php echo  @$m_row['page_range'];?> pages- $<?php echo  @$m_row['price'];?> (Coding only $<?php echo  @$m_row['codeonly_price'];?>)</span><br />
                <p><?php echo  put_safe(@$m_row['description']);?></p>
            </div>

             <div class="contractdiv">
             	<a href="javascript:void(0);" class="addcontract" <?php if(!is_plat_cart($cart1)){ ?> onclick="showpopupdef(this)" <?php }else { if($m_row['id']==18){  ?> onclick="showpopup1(this)" <?php }else{ ?> onclick="showpopup(this)"<?php } } ?> product_id="<?php echo @$m_row['id'];?>"></a>
             	<!--<a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode($m_row['id']) ?>" class="viewdetails" target="_self"></a>-->
             </div>

            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>


    <div class="clr"></div>

<?php
        }else{

                if((get_plat_id($cart1)==32 && $m_row['id']==29) || (get_plat_id($cart1)==31 && $m_row['id']==20) || (get_plat_id($cart1)==30 && $m_row['id']==20) || (get_plat_id($cart1)==15 && $m_row['id']==20) || (get_plat_id($cart1)==15 && $m_row['id']==18) || (get_plat_id($cart1)==1 && $m_row['id']==18) || (get_plat_id($cart1)==1 && $m_row['id']==20) || (get_plat_id($cart1)==1 && $m_row['id']==19)){
        ?>
                <div class="Productparts1">
                    <div class="SC">
                        <div class="Product_pics"><img style="border: 1px solid #CDCDCD;" src="<?php echo base_url(); ?>uploads/product_image/image/<?php echo  @$m_row['image'];?>" alt="" style="max-height: 248px; max-width: 328px;" /></div>
                        <div class="Botom_left">
                            <?php echo (@$form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                            <form id='form7' name="form7" method="post" action="">
                                <table width="100%" cellspacing="5" cellpadding="0">
                                    <tr>
                                        <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;"><?php echo  ucwords(@$m_row['name']);?></span>?</td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                            <input name="name" id="name7" type="text" class="loginbox" placeholder="Name" onclick="ch1('7')"/>
                                            <div <?php echo (@$form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>
                                                <?php echo form_error('name'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" placeholder="Email" onclick="ch2('7')"/>
                                            <div <?php echo (@$form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>
                                                <?php echo form_error('email'); ?>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')" placeholder="Questions - Comments"></textarea>
                                            <div <?php echo (@$form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>
                                                <?php echo form_error('comments'); ?>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                                    </tr>
                                </table>
                            </form></div>         </div>

                    <div class="SR">
                        <div class="Headingarea_pro">
                            <span class="mainheading"><a name="level">&nbsp;</a><?php echo  ucwords(@$m_row['name']);?></span> <br/> <span class="orangefont"><?php echo  @$m_row['page_range'];?> pages- $<?php echo  @$m_row['price'];?> (Coding only $<?php echo  @$m_row['codeonly_price'];?>)</span><br />
                            <p><?php echo  put_safe(@$m_row['description']);?></p>
                        </div>

                        <div class="contractdiv">
                            <a href="javascript:void(0);" class="addcontract" <?php if(!is_plat_cart($cart1)){ ?> onclick="showpopupdef(this)" <?php }else { if($m_row['id']==18){  ?> onclick="showpopup1(this)" <?php }else{ ?> onclick="showpopup(this)"<?php } } ?> product_id="<?php echo @$m_row['id'];?>"></a>
                            <!--<a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode($m_row['id']) ?>" class="viewdetails" target="_self"></a>-->
                        </div>

                        <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
                    </div>
                    <div class="dotline"></div>
                </div>


                <div class="clr"></div>

            <?php

                }  } }}}
?>


<p>&nbsp;</p>            
	     <div class="footerdown">
                <div class="footerleft">
                    <p>Influx IQ can help you to take your business to the next level. Contact us today for a FREE QUOTE</p>
                </div>
                <div id="downbutton"><a href="<?php echo base_url()."home/contact.html"; ?>" class="buttondown"></a></div>
    	     </div>

<!--......................................................... END MIDDLE PART .............................................................................-->

<div class="copyright">&copy; 2010-2011, Influx IQ Development Group. All rights reserved.</div>
</div>

<div style="display: none;" id="pop_no">
 <div class="popcontainer">
 <a href="javascript:void(0);" class="cross-contract" onclick="jQuery.unblockUI()"></a>
 <div class="popcontainer-black">Select Contract Option</div>
 <div style="font-size: 14px;">You Must add to contract Affiliate or Market-launch  or CRM platforms</div>
     <input type="image" src="<?php echo base_url(); ?>images/contractgobtn.png" style="border:none; background:#ededed;" width="172" height="29" alt="go" value="ok" onclick="window.location.href='<?php echo base_url(); ?>home/products.html'" />
    </div>
 </div>
</div>

<div style="display: none;" id="pop_form">
 <div class="popcontainer">
 <a href="javascript:void(0);" class="cross-contract" onclick="jQuery.unblockUI()"></a>
 <div class="popcontainer-black">Select Contract Option</div>
 <div style="padding: 25px 0;">
 <form>
	 <span style="font-size: 14px;">How Many You want to add....?</span>
	 <select id="land_num" style="width: 60px; border: solid 1px #ddd;">
         <?php for($i=1;$i<=10;$i++){ ?>
         <option value="<?php echo $i;?>"><?php echo $i;?></option>
         <?php } ?>
     </select>

     <div style="clear: both;"></div>
	 <img src="<?php echo base_url(); ?>images/contractgobtn.png" style="border:none; background:#ededed;cursor:pointer; margin-top:25px;" width="172" height="29" alt="go" value="ok" onclick="sub_val();"/>
 </form>
 </div>
     </div>
 </div>
</div>



