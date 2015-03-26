<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="<?php echo base_url()?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $s_title; ?></title>
        <script type="text/javascript" >
            var base_url = "<?php echo base_url(); ?>";
        </script>

        <link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/login.css" type="text/css" media="screen" />
        <link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/validationEngine.jquery.css" type="text/css" media="screen"/>
             <link rel="icon" 
            type="image/png" 
            href="<?php echo base_url() ?>icons/FAB1.png">
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
            <h2 class="">Forgot Password</h2>
            <div class="add_detbg">
                <div class="login_left"><img src="<?php base_url() ?>images/admin/login.png" alt="" /></div>
                <div class="login_right">
                <?php if($show_det=="non_codeaccess"){ ?>
                    <form id="formID" name="emailsender" class="formular" method="post" action="<?php echo admin_url() ?>home/changepwd"> 
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
                            <div class="fild_name">Email ID:</div>
                            <div class="fild_text"><input name="email" type="text" class="validate[required,custom[email]] text-input" class1="text_fild" id="email" values="<?php echo set_value('email'); ?>"/></div>
                            <!--     <div class="fild_err">type specimen book.</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /> <input name="" type="reset" value="Cancel" class="but2" /></div>
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_text"><div class="requar"> <a href="<?php echo admin_url() ?>home/login">Login</a></div></div>
                            <div class="clr"></div>
                        </div>
                        <div class="clr"></div>
                    </form> 
                    <?php }else{ ?>
                    <form id="formID" class="formular" method="post" action="<?php echo admin_url() ?>home/check_code"> 
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
                            <div class="fild_name">Access Code</div>
                            <div class="fild_text"><input name="s_code" name="codeaccess" type="text" class="validate[required] text-input" class1="text_fild" id="s_code" values="<?php echo set_value('s_code'); ?>"/></div>
                            <!--     <div class="fild_err">type specimen book.</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /> <input name="" type="reset" value="Cancel" class="but2" /></div>
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_text"><div class="requar"> <a href="<?php echo admin_url() ?>home/login">Login</a></div></div>
                            <div class="clr"></div>
                        </div>
                        <div class="clr"></div>
                    </form>
                    <?php } ?>
                </div>
                <div class="clr"></div>
            </div>
        </div>        <!-- Footer Ends -->
    </body>
</html>
