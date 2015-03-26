<?php
    //Set no caching
  //  header("Cache-Control: no-store, no-cache, must-revalidate");
   // header("Pragma: no-cache"); 
    //header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    //header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    //header("Cache-Control: post-check=0, pre-check=0", false);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="<?php echo base_url()?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <?php 
            //header("Cache-Control: no-cache, must-revalidate");
            //header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        ?>
        <title><?php echo $s_title; ?></title>
        <link rel="shortcut icon" href="fav.png" />
        <script type="text/javascript">
            var base_url = "<?php echo base_url(); ?>";
            var admin_url = "<?php echo admin_url(); ?>";
        </script>   
        <?php echo $s_css; ?>

        <?php echo $s_js; ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/admin/languages/jquery.validationEngine-en.js"></script>
        <script>
            jQuery(function()
            {
                jQuery("input[class1]").each(function (i) {
                    jQuery(this).addClass(jQuery(this).attr('class1'));
                    jQuery(this).css('color','black');

                });
                //alert(jQuery("strong").text());
                if(jQuery("strong").text()>0){
                    jQuery("strong").wrapInner("<a class='active'></a>"); 
                }             


                //jQuery("a").remove(":contains('&nbsp;')");

            });
        </script>
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
                if(field.val() != "HELLO") {
                    // this allows to use i18 for the error msgs
                    return options.allrules.validate2fields.alertText;
                }
            }
        </script>


    </head>
    <?php echo $s_header; ?>
    <?php echo $s_tpl_data ?>
    <?php echo $s_left_panel; ?>
    <?php echo $s_footer; ?>
    </html>