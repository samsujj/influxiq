<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.4.js"></script>
<link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css" media="screen"/>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/languages/jquery.validationEngine-en.js"></script>
<script>
    $(function()
    {
        //  alert(1); 
        $("input[class1]").each(function (i) {
            //  $(this).addClass($(this).attr('class1'));
            //  $(this).css('color','black');

        }); 
        
          
    });
    
    
    //alert(jQuery("strong").text());



    //jQuery("a").remove(":contains('&nbsp;')");

</script>

<script type="text/javascript">
jQuery(function()
{
   jQuery("#contact_form").validationEngine();  
   
   jQuery(".removeBut").click(function(){
	   var prod_id=jQuery(this).attr('attr');
	   jQuery.post('<?php echo base_url(); ?>contract/deleteCart',{'product_id':prod_id},function(res){
		   if(res==1){
			   alert('This Product removed from cart');
			   window.location.reload(true);
			 }
			 else{
				 alert('Please Try again');
			  }
		   });
	  // alert(prod_id);
	  });
	  
	jQuery(".addnty").click(function(){
		    var prod_id=jQuery(this).attr('attr');
			var land_numb=jQuery('#qnty').val();
			jQuery.post('<?php echo base_url() ?>contract/updateLandingPage',{'prod_id':prod_id,'land_numb':land_numb},
			function(res){				
				if(res==1){
					alert('Number of Landing page updated');
					window.location.reload(true);
				}
				else{
						alert('Please Try Again');
				}
			})
			
	});
	
	jQuery(".unsetCart").click(function(){
        alert("The Cart is Unset...");      
		jQuery.get('<?php echo base_url(); ?>home/unsetCart',{},function(html){
			if(html==""){
				
                  window.location.href='<?php echo base_url(); ?>';  
			}
			});
      //       
	});
   
   //alert(jQuery(".marketpack").val());
   
   jQuery("#submitBtn").click(function(){
       // jQuery("#contact_form").validationEngine().submit();
         var isValid = $('#contact_form').validationEngine('validate');
                if (!isValid) {
               //     alert("not valid");
                    evt.preventDefault();
                }
                else {
                    window.print();
                    //alert("valid");
                }
        //$("#form").validationEngine('detach');
    });
    jQuery("#but11").click(function(){
		alert('<html>' + $("html").html() + '</html>');
	});
}

);
     
</script>

<title>Contract</title>

</head>
<body>
	<?php /*<input type=button id="but11" value="click Here"> */ ?>
<div style="width:960px; margin:0 auto;">

  <div style="width:926px; background:#c9c9c9; border:#b6b6b6 solid 1px; padding:0 15px 0 18px;">
       <div style="width:905px; margin:20px auto; background:#eeeeee; padding:10px;">
  <?php echo put_safe($m_dataset[0]['header']);?>      

       </div>
     </div>


    <?php 


    $m_cart_val=$this->cart->contents();
    $price = 0;
    $marketPack = '';
       $pcost="";
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
                      
                    // exit;
                   }
    ?>
    
    <input type="hidden" class="marketpack" value="<?php echo $marketPack ?>">
  <div style="width:960px; margin:20px 0 30px 0;">
     <div style="width:960px; background:#1c1c1c; margin:0 0 10px 0;">
        <p style="font-family:Arial, Helvetica, sans-serif; color:#ffffff; font-size:24px; padding:10px 0 0 10px; margin:0;"><?php echo @$row[0]['cat_name'];?></p>
      <p style="font-family:Arial, Helvetica, sans-serif; color:#f67c00; font-size:18px; padding:10px 0 10px 10px; margin:0;"><?php echo @$row[0]['name'];?></p>
     
     </div>
  
  </div>   
  
  <div style="width:960px; margin:0 0 10px 0;">
    <div style="width:309px; float:left; border:#b6b6b6 solid 1px; background:#efeeee; padding:40px 20px 40px 20px; text-align:center;">
	<?php if(!empty($row[0]['image'])){ ?>	
      <img src="<?=base_url()?>uploads/product_image/image/<?php echo @$row[0]['image'];?>" /> 
      <?php }else{
        if(@$row[0]['cat_name'] == 'Content') {
            ?>
            <img src="<?=base_url()?>images_product/content.jpg" />
        <?php
        }
        elseif(@$row[0]['cat_name'] == 'Marketing') {
            ?>
            <img src="<?=base_url()?>images_product/marketing.jpg" />
        <?php
        }
        else {
            ?>
            <img src="<?=base_url()?>uploads/product_image/default/defaultimage.jpg" />
        <?php
        } } ?>
      <img src="<?=base_url()?>images/partitionc.jpg" />
       <span style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#004a6f; text-align:center;"> 
       <?php 
        if( @$row[0]['cat_id'] == 1)
        {
            $mh = @$row[0]['platform_cost'];
            $pt = @$row[0]['insall_charge'];

            $price += @$row[0]['price'];
            //$price += @$row[0]['platform_cost'];
            //$price += @$row[0]['insall_charge'];
            //$price += @$row[0]['transaction_charge'];
       ?>
           <?php
              if(@$row[0]['price'] > 0)
              {
           ?>
       <?php /*   Price : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo $row[0]['price'];?></strong> <br> */
       ?>
           <?php
              }
            ?>
       
           <?php
              if(@$row[0]['platform_cost'] > 0)
              {
				  
           ?>
           Monthly Hosting : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php
           $pcost=0;
           $cost="";
           //echo "--------".$have_duration;
              if($have_duration==1){
				  echo  '<strike>'.$pcost=@$row[0]['platform_cost'].'</strike>';
			  }
			  else{
				  echo $pcost=@$row[0]['platform_cost'];
			  }
          /*    if($marketPack == '12MONTHS' || $marketPack == '12MONTH'){
                echo  '<strike>'.$pcost=@$row[0]['platform_cost'].'</strike>';
              } 
              else{
                echo $pcost=@$row[0]['platform_cost'];
              } */
            ?></strong> <br>
           <?php
              }
            ?>
       
           <?php
              if(@$row[0]['insall_charge'] > 0)
              {
           ?>
           Per Transaction : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @$row[0]['insall_charge'];?></strong><br>
           <?php
              }
            ?>
       
           <?php
              if(@$row[0]['transaction_charge'] > 0)
              {
           ?>
           Transaction Charge : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @$row[0]['transaction_charge'];?></strong> 
           <?php
              }
            ?>
       
       <?php
        } 
        if( @$row[0]['cat_id'] == 2)
        {
            $price += @($row['qty']*$row[0]['price']);
       ?>
           
         Price : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @($row['qty']*$row[0]['price']);?></strong>
       
       <?php
        } 
        if(@$row[0]['cat_id'] == 3 || @$row[0]['cat_id'] == 4)
        {
            $price += @$row[0]['package_price']; 
       ?>
       
         Price : <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo @$row[0]['package_price'];?></strong> 
       
       <?php 
        }
       ?>
       </span> 
       <?php //pr(array_keys($row)) ;?>
       <?php if($row[0]['id']==18){ ?>
       <br/>
<!--       <input type="text" id="qnty" value="<?php /*echo $row['qty']; */?>">
       <input type="button" style="background:url(http://influxiq.com/images/edit.jpg) no-repeat; width:138px; height:41px; cursor:pointer; border:none; margin:10px 0;" value="" class="addnty" attr="<?php /*echo $row[0]['id']; */?>">
-->
       Quantity:<?php echo $row['qty']; ?>
       <?php } ?>
			
       <br/>
       

    </div>
    
     <div style="width:559px; float:right; border:#b6b6b6 solid 1px; background:#efeeee; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#1c1c1c; line-height:24px; text-align:left; margin:0 0 20px 0;">
               <?php echo put_safe(@$row[0]['contract']);?>
     </div>
  
  
  <div style="clear:both;"></div>
  
  </div>
    <?php
        }  }  }
    ?>

 <div style="width:960px; height:90px; display:table-cell; vertical-align:middle;">
    <h2 style=" font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#f67c01;">Terms & Conditions:</h2>
        </div> 
   <div style="width:926px; background:#c9c9c9; border:#b6b6b6 solid 1px; padding:0 15px 0 18px;">
       <div style="width:905px; margin:20px auto; background:#eeeeee; padding:10px;">
          
  <?php echo put_safe(@$m_dataset[0]['terms_conditions']);?> 
  
        <form action="" id="contact_form" method="post">
          <?php //if($marketPack == '12MONTHS' || $marketPack == '12MONTH')
          if($have_duration==1)
          {
             // $newPrice =  $price - @$details[1][0]['price'];
              if(!empty($pcost)){
              $newPrice =  $price - $pcost;
             }
             else{
                $newPrice =  $price;   
             } 
             
          //   $newPrice =  $price - $pcost; 
           ?>
                   <input type="hidden" name="price" value="<?php echo @$newPrice;?>">
          <?php
          }
          else
          {
           ?>
                   <input type="hidden" name="price" value="<?php echo @$price;?>">
          <?php
          }
           ?>
       <!-- <input type="hidden" name="product" id="product" value="<?php echo @$details;?>">-->
  
      <table width="45%" border="0" cellspacing="0" cellpadding="0" style="float:left; margin:10px 0 0 15px;">
                <tr>
                <td width="100%" height="50"><?php echo $err_msg; ?></td>
                </tr>
            <tr>
            
              <td width="32%" height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">First Name:</label></td>
              <td width="68%" height="50"><input name="fname" id="fname" value="<?php echo set_value('fname')?>" type="text" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;"  class="validate[required] text-input" />
              <p  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"><?php echo  form_error('fname')?></p></td>
        </tr>
            <tr>
              <td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Last Name:</label></td>
              <td height="50"><input name="lname" id="lname" type="text" value="<?php echo set_value('lname')?>"  class="validate[required] text-input" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;" />
                <p  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"><?php echo  form_error('lname')?></p></td>
            </tr>
            <tr>
              <td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Telephone:</label></td>
              <td height="50"><input name="phone" id="phone" type="text" value="<?php echo set_value('phone')?>"  class="validate[required] text-input" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;" />
                <p  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"><?php echo  form_error('phone')?></p></td>
            </tr>
            <tr>
              <td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Email:</label></td>
              <td height="50"><input name="email" id="email" type="text" value="<?php echo set_value('email')?>"  class="validate[required,custom[email]] text-input"  style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;"/>
                <p  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"><?php echo  form_error('email')?></p></td>
            </tr>
          <tr>
              <td height="50" colspan="2">
                  <p>Please type your First and Last Name.By this digital signature you agree to pay the above price for the contract products and services listed.</p>
              </td>
          </tr>
          <tr>
              <td height="50"><label style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#004a6f;">Digital Signature:</label></td>
              <td height="50"><input type="text" name="signature" id="signature"  class="validate[required] text-input"  value="<?php echo set_value('signature')?>" style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;"/>
                <p  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"><?php echo  form_error('signature')?></p></td>
            </tr>
            <!--<tr>
              <td >&nbsp;</td>
              <td ><input type="file" lang=""style=" width:243px; height:26px; padding:5px; background:#fff; border:solid 1px #c9c9c9; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#8d8d8d;"  />
                <p  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p></td>
            </tr>-->
            <tr>
              <td height="50">&nbsp;</td>
              <td height="50">
                  <input id="submitBtn" type="submit" value="" style="background:url(<?php echo base_url();?>images/submit2.jpg) no-repeat; width:138px; height:41px; cursor:pointer; border:none; margin:10px 0;" />
                <p  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#ff0000; margin:0; padding:0;"></p></td>
            </tr>
          </table>
          
          </form>

          
          <div style=" width:322px; float:right; margin:10px 80px 0 0; text-align:center;">
           <div><img src="<?php echo base_url();?>images/logo.jpg"  alt="" style="margin:10px 0;"/></div>
          
           <span style="font-family:Arial, Helvetica, sans-serif; font-size:30px; color:#004a6f; text-align:center;"> Total Price<br />
          <?php
          //     echo   $marketPack; exit;
          
           //if($marketPack == '12MONTHS' || $marketPack == '12MONTH')
           if($have_duration==1)
          {
           //  echo "tttttt".$pcost;
             if(!empty($pcost)){
              $newPrice =  $price - $pcost;
             }
             else{
                $newPrice =  $price;   
             }
           ?>
         
          <?php if(!empty($pcost)){ ?>
           <strong style="font-weight:normal; color:#e07300; margin-top:10px;"><strike>$<?php echo $price;?></strike></strong> <br />
          <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo $price."-$".$pcost."= $".$newPrice;?></strong>
          <?php }else{ ?>
          <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo $newPrice;?></strong>
          <?php } ?>
          <?php
          }
          else
          {
           ?>
          <strong style="font-weight:normal; color:#e07300; margin-top:10px;">$<?php echo $price;?></strong> <br />
          <?php
          }
           ?>
               <br/>
               <span style="font-size: 14px; display: block; font-weight: bold; color: #126FD7;">Monthly Hosting : $<?php echo @$mh;?></span>
               <span  style="font-size: 14px; display: block; font-weight: bold; color: #126FD7;"> Per Transaction : $<?php echo @$pt;?></span>
          <span  style="font-size: 14px; display: block; color: #F87F0C;"> (Not To be Paid Right Now)</span>


          </span> </div>
          
          
          <div style="clear:both;"></div>
          
     </div>
       
       


</div>
     

  <?php echo put_safe($m_dataset[0]['footer']);?>      
 </div>
</body>
</html>
