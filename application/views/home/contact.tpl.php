<script>
function reload_img()
{
    var dt=new Date();
    $('#img_cap').attr('src','<?php echo base_url(); ?>images/captchaimage.php?t='+dt.getSeconds())
}
function frm_submit()
{
    name=$('#name').val();
    email=$('#email').val();
    phone=$('#phone').val();
    query=$('#query').val();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var phoneReg=/^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$/;
    
    
    if(name=='')
    {
        $('#error').html('* Please Enter Your Name...');
    }
    else if(email=='')
    {
        $('#error').html('* Please Enter Your Email...');
    }
    else if(!emailReg.test(email))
    {
             $("#error").html('*Enter a valid email address...');
    }
    else if(query=='')
    {
        $('#error').html('* Please Upload Your Query...');
    }
    else if(phone==""){
        $('#error').html('* Please Enter Your phone number...'); 
    }
    else if(!phoneReg.test(phone)){
        $('#error').html('* Enter a valid phone number...'); 
    }
    else
    {
        $('#form').submit();
    }
}
</script>





<div class="body">
         <div class="contact-banner"></div>
<!--banner ends-->
<div class="about1">
                     <div class="about1-left">
                <p class="h3"><strong>We would love to hear from you.</strong> If you are looking for a custom quote or if you just want to colaborate on som ideas be sure to get ahold of us right away. </p>
                <br />
                
                     <div class="formdiv">
                       <div class="formdiv2">
                           <p class="formtitle">Please fill out the form below</p>
                    </div>
                    <div class="formdiv3">
<div id="error" style="color:#FF0000; font-weight:bold; margin-bottom:5px; margin-top:5px;"></div>
<?php echo show_msg(); ?>
<form action="" method="post" id="form">

                         <table width="400" border="0" cellspacing="0" cellpadding="0" style="margin-left:10px;">
  
  <tr>
    <td>Full Name: <span class="style2">(REQUIRED)</span></td>
  </tr>
  <tr>
    <td><input class="textfield" maxlength="400" type="text" name="name" id="name" />
    <?php echo form_error('name'); ?>
    </td>
  </tr>
  <tr>
    <td>Email: <span class="style2">(REQUIRED)</span></td>
  </tr>
  <tr>
    <td><input class="textfield" type="text" name="email" id="email" />
        <?php echo form_error('email'); ?>

    </td>
  </tr>
  <tr>
    <td>Phone Number:</td>
  </tr>
  <tr>
    <td height="58"><input class="textfield" type="text" name="phone" id="phone" />
        <?php echo form_error('phone'); ?>
    </td>
  </tr>
  <tr>
    <td>Message:</td>
  </tr>
  <tr>
    <td height="58"><textarea class="textarea" name="query" id="query" cols="45" rows="5"></textarea>
        <?php echo form_error('query'); ?>
    </td>
  </tr>
  <tr>
  <td>Captcha:</td></tr>
  <!-- <tr><td height="58"><input class="textfield" type="text" name="phone" id="phone" /></td></tr>-->
   
  <tr><td height="58"><img id="img_cap" src="<?php echo base_url()?>images/captchaimage.php" style="vertical-align: middle;"  alt="" /><img src="<?php echo base_url()?>images/refresh.png" style="cursor: pointer" onclick="reload_img();"  alt="" /><br>Enter the above code<input style="margin-top: 5px;" name="captcha2" id="captcha2" type="text" class="loginbox" /> <?php echo form_error('captcha2'); ?>
    </td></tr>
  
  <tr>
    <td><input class="buttonpadding1" onclick="frm_submit()" type="button" value="SUBMIT" style="cursor: pointer"> </td>
  </tr>
</table>
</form>

                      </div>
                    </div>
                
         </div>
                  <div class="about1-right1">
                    <div class="influxlogo-about">&nbsp;</div>
                    <div class="address">
                   <span> Influx IQ Development Group</span><br />A DBA of Beto Paredes, LLC<br /><br />
                   10 N Bridge St<br />St. Anthony ID, 83445<br /><br />
                   <strong>Office</strong> - 208.754.7402<br />
                   <strong>Fax</strong> - 208.754.7395<br />
                   <a href="http://www.bbb.org/boise/business-reviews/internet-marketing-services/beto-paredes-llc-in-saint-anthony-id-1000014166" target="_blank">
                   <img src="<?php echo base_url(); ?>images/bbbaccreditedbusiness.png" alt="" width="149" height="56" border="0" style="margin-top:10px;" />
                   </a> 
                    </div>
                    <a href="https://apps.facebook.com/testing-influx/?fb_source=search&ref=ts" target="_blank"><img src="<?php echo base_url(); ?>images/Facebook.png" alt="" width="128" height="128" border="0" style="margin-top:10px;" /></a>
                </div>
    </div>
  </div>
  <div class="footerdown">
                <div class="footerleft">
                     <p>Contact a representative today and learn more about how the InfluxIQ Development Group can enhance your business</p>
                </div>
                <div id="downbutton"><a href="<?php echo base_url(); ?>home/contact.html" class="buttondown"></a></div>
</div>
            <div class="copyright">&copy 2010-2011, Influx IQ Development Group. All rights reserved.</div>