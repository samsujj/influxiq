<?
    //Set no caching
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="<?php echo base_url()?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $s_title; ?></title>
        <script type="text/javascript" >
            var base_url = "<?php echo base_url(); ?>";
        </script>
       <link rel="icon" 
            type="image/png" 
            href="<?php echo base_url() ?>icons/FAB1.png">
        <link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/login.css" type="text/css" media="screen" />
        <link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/validationEngine.jquery.css" type="text/css" media="screen"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/languages/jquery.validationEngine-en.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.validationEngine.js"></script>
        <script>
            $(function()
            {
                $("input[class1]").each(function (i) {
                    $(this).addClass($(this).attr('class1'));
                    $(this).css('color','black');

                });


            }); 
        </script>
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/layout.css" /> 
        <script type='text/javascript' src='<?php //echo base_url(); ?>js/jquery.js'></script>
        <script type='text/javascript' src='<?php //echo base_url(); ?>js/jquery.wysiwyg.js'></script> -->

        <script>
            jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });

            /**
            *
            * @param {jqObject} the field where the validation applies
            * @param {Array[String]} validation rules for this field
            * @param {int} rule index
            * @param {Map} form options
            * @return an error string if validation failed
            */
            function checkHELLO(field, rules, i, options){
                if (field.val() != "HELLO") {
                    // this allows to use i18 for the error msgs
                    return options.allrules.validate2fields.alertText;
                }
            }
        </script>
        <?php // echo $s_js; ?>
        <?php // echo $s_css; ?>
    </head>

    <body>

        <div class="content_block">
            <h2 class="">User Login</h2>
            <div class="add_detbg">
                <div class="login_left"><img src="<?php base_url() ?>images/admin/login.png" alt="" /></div>
                <div class="login_right">
                    <form id="formID" class="formular" method="post" action=""> 
                        <?php 
                            echo validation_errors('<div id="fild_err">', '</div>'); 
                            if(!empty($s_msg)){
                                echo '<div id="fild_err">'.$s_msg.'</div>';
                            }
                        ?>
                        <?php
                            // Message showing from controller
                            echo show_msg();
                        ?>
                        <div class="form_div">
                            <div class="fild_name"  style="width:200px"> New Password :</div>
                            <div class="fild_text"><input name="npwd" type="password" class="validate[required,minSize[6]] text-input" class1="text_fild" id="npwd" value="<?php echo set_value('npwd'); ?>"/></div>
                       <!--     <div class="fild_err">type specimen book.</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"  style="width:200px">Confirm New Password :</div>
                            <div class="fild_text"><input name="cnpwd" type="password" class="validate[required,minSize[6],equals[npwd]] text-input" class1="text_fild" id="cnpwd" value="<?php echo set_value('npwd'); ?>" /></div>
                           <!-- <div class="fild_err">User Name :</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /> <input name="cancel" type="reset" value="Cancel" class="but2" /></div>
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_text"><div class="requar"><a href="<?php echo admin_url() ?>home/changepwd">Forget Password?</a></div></div>
                            <div class="clr"></div>
                        </div>
                        <div class="clr"></div>
                    </form> 
                </div>
                <div class="clr"></div>
            </div>
        </div>        <!-- Footer Ends -->
    </body>
</html>
