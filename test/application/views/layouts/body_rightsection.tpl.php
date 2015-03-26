<div class="body-right">
    <div class="form-sec">
        <div class="form-sec-con">
            <p>Relief is Just a Click Away<br /><br />Fill out this contact form for a FREE<br /> consultation with one of our credit <br />and finance experts.</p><br /><br />                    
            <?php 
                echo validation_errors('<div id="error">', '</div>'); 

            ?>    
            <form id="formID" action="<?php echo base_url()."home/".$page_active; ?>" enctype="multipart/form-data" method="post">
                <p>First Name</p>
                <input type="text" id="fname" name="fname" class="validate[required] text-input" class1="textbox" value="<?php echo ($check=="uninsert")?set_value('fname'):""; ?>" />
                <p>Last Name</p>
                <input type="text" id="lname" name="lname" class="validate[required] text-input" class1="textbox" value="<?php echo ($check=="uninsert")?set_value('lname'):""; ?>" />
                <p>Zip</p>
                <input type="text" id="zip" name="zip" class="validate[required,custom[onlyNumberSp]] text-input" class1="textbox" value="<?php echo ($check=="uninsert")?set_value('zip'):""; ?>" />
                <p>Email</p>
                <input type="text" id="email" name="email" class="validate[required,custom[email]] text-input" class1="textbox" value="<?php echo ($check=="uninsert")?set_value('email'):""; ?>" />
                <div class="submit-area">
                    <img src="<?php echo base_url(); ?>images/right.jpg" alt="" width="66" height="58" />
                    <a id="sub1" href="javascript:void(0);" style="outline:none;"><img src="<?php echo base_url(); ?>images/submit.jpg" alt="" width="113" height="58" border="0" /></a>
                    <!-- <a id="sub1" href="#"><img src="<?php //echo base_url(); ?>images/submit.jpg" alt="" width="113" height="58" border="0" /></a> -->
                </div> 

            </form> 
            <?php if($check=="insert"){ ?>
                <div class="form_content_1" id="password_popup2">
                    <a href="javascript:void(0);" class="close_1" title="Close" onclick="javascript:document.getElementById('password_popup2').style.display='none';"></a>
                    <div align="center">    </div>
                    <div class="popup-content">
                        <h1>Thank you for Successfully submit.</h1>

                    </div>            
                </div>
                <?php } ?>

        </div>
    </div>
    <div class="right-bottom-sec">
        <span>PLEASE FILL IN THE WEB FORM ABOVE AND BE ENTERED TO WIN A $100.00 DOLLARS TOWARDS CREDIT REPAIR. </span><br />
        (Some restrictions apply rules upon request)
        <div class="credit-artical">
            <p><span><u>Credit Articles</u></span><br /><br />8 Ways To Raise Your Score<br />The Truth on Credit Restoration<br />What is in Your Credit Score<br />How a Low Score Can Hurt<br />Secrets to Managing Your Debt Ratio</p>
        </div>
    </div>            
            </div>