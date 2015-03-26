<?php 
    $cart[] = array();
    $cart = $this->session->userdata('contract');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-block.js"></script>
<script type="text/javascript">

    function showpopup(e)
    {
      var product_id= $(e).attr('product_id');
      var type = 2;
      var value ='NULL';
     
      $.post('<?php echo base_url()?>contract/addContract',
      {'product_id':product_id,'value':value,'type':type},
      function(result)
      {
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
      
      
      ) ;      
    }
    
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

</script>
<div class="body">
         <div class="design-banner"></div>

<!--......................................................... START MIDDLE PART ....................................................................-->
<?php
if(count($m_dataset))
{
    foreach($m_dataset as $m_row)
    {
        if($m_row['category_id'] == 2)
        {
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
                <p><?php echo  @$m_row['description'];?></p>
            </div>

             <div class="contractdiv">
             	<a href="javascript:void(0);" class="addcontract" onclick="showpopup(this)" product_id="<?php echo @$m_row['id'];?>"></a>
             	<!--<a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode($m_row['id']) ?>" class="viewdetails" target="_self"></a>-->
             </div>

            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>    


    <div class="clr"></div>

<?php
    }}}
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

<div style="display: none;" id="pop">
 <div class="popcontainer">
 <a href="javascript:void(0);" class="cross-contract" onclick="jQuery.unblockUI()"></a>
 <div class="popcontainer-black">Select Contract Option</div>
     <div class="popcontainer-white">
     <?php 
        if(!@array_key_exists(1, @$cart))
        {
     ?>
     <input type="radio" class="chkPage" name="chkPage" value="products">&nbsp;&nbsp;Platform<br>
     <?php 
        }
        if(!@array_key_exists(3, @$cart))
        {
     ?>
     <input type="radio" class="chkPage" name="chkPage" value="content">&nbsp;&nbsp;Content<br>
     <?php 
        }
        if(!@array_key_exists(4, @$cart))
        {
     ?>
     <input type="radio" class="chkPage" name="chkPage" value="marketing">&nbsp;&nbsp;Marketing<br>
     <?php 
        }
     ?>
     <input type="image" src="<?php echo base_url(); ?>images/contractgobtn.png" style="border:none; background:#ededed;" width="172" height="29" alt="go" value="ok" onclick="redir(this)" />
    </div>
 </div>
</div>