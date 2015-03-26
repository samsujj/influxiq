<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="<?php echo base_url()?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $s_title; ?></title>
        <script type="text/javascript" >
            var base_url = "<?php echo base_url(); ?>";
        </script>
        <link href="<?php echo base_url()?>css/admin/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/admin/layout.css" /> 
        <script type='text/javascript' src='<?php echo base_url(); ?>js/admin/jquery.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>js/admin/jquery.wysiwyg.js'></script>
        <?php // echo $s_js; ?>
        <?php // echo $s_css; ?>
    </head>

    <body>
        <div class="wrapper">
            <div class="logo_login1"><a href="#"><img src="images/admin/logo.png" alt="" border="0" /></a></div>
            <div class="login-area">
                <div class="loginsection">
                    <div class="login_con">
                        <div class="loginheading">Forgot Password</div>
                        <form id="login-form" action="" method="post">

                            <?php 
                                echo validation_errors('<div id="error">', '</div>'); 
                                if(!empty($s_msg)){
                                    echo '<div id="error">'.$s_msg.'</div>';
                                }
                            ?>
                            <?php
                                // Message showing from controller
                                echo show_msg();
                            ?>
 
                            <label for="name">Enter Your Email</label>
                            &nbsp;&nbsp;&nbsp;<input type="text" id="email" name="email" class="input-medium"  />
                            <div class="clear"></div>
                                                                   
                            <label for="forgot_password"></label>

<?php /* 
                            <label for="checkbox1" style="font-weight:normal; font-size:11px;">Remember me?</label>
                            <input name="checkbox" type="checkbox" value="" id="checkbox1" />

                            <div class="forgot_pw"><a href="index-2.html">Forgot password?</a></div> */ ?>
                            <div class="clear"></div>
                            <label>&nbsp;&nbsp;&nbsp;</label>
                            <input class="button" name="submit" type="submit" value="Send"/>                
                        </form>
                        <div class="clear"></div>
                    </div>  
                    <div class="clear"></div>
                </div>      
                <div class="clear"></div>
            </div>
            <div class="push"></div>
            <div class="clear"></div>
        </div>

        <!-- Footer Starts -->
        <div id="footerHolder">&copy; Copyright Company name. All Rights Reserved.</div>
        <!-- Footer Ends -->
    </body>
</html>