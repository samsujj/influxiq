<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $s_title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo $s_css; ?>



        

        <?php echo $s_js; ?>

        <script>
            function ch1(e)
            {
                
             
                if(($('#name'+e).val())=="Name")
                    $('#name'+e).val('');
                if(($('#email'+e).val())=='')
                    $('#email'+e).val('Email');
                if(($('#comments'+e).val())=='')
                    $('#comments'+e).val('Questions - Comments');
            }
            function ch2(e)
            {
                if(($('#email'+e).val())=="Email")
                    $('#email'+e).val('');
                if(($('#name'+e).val())=='')
                    $('#name'+e).val('Name');
                if(($('#comments'+e).val())=='')
                    $('#comments'+e).val('Questions - Comments');
            }
            function ch3(e)
            {
                if(($('#comments'+e).val())=="Questions - Comments")
                    $('#comments'+e).val('');
                if(($('#name'+e).val())=='')
                    $('#name'+e).val('Name');
                if(($('#email'+e).val())=='')
                    $('#email'+e).val('Email');

            }
            function chkletter(e)
            {
                var flage=1;
                var em=0;
                var name = $('#name'+e).val();
                var email = $('#email'+e).val();
                var comments = $('#comments'+e).val();
                var pack = $('#pack'+e).val();
                var el = e;
                if(name=='' || name=="Name")
                    {
                    alert("Please enter your name");
                    $('#name'+e).focus();
                    flage=0;
                    return false;
                }
                if(email=='' || email=="Email")
                    {
                    alert("Please enter your Email");
                    $('#email'+e).focus();
                    flage=0;
                    em=1;
                    return false;
                }
                if(!em)    

                    {

                    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                    var address = $('#email'+e).val();

                    if(reg.test(address) == false) {

                        alert("Please enter a valid Email");
                        $('#email'+e).focus();

                        flage=0;
                        return false;
                    }
                }
                if(comments=='' || comments=="Questions - Comments")
                    {
                    alert("Please enter your Comments");
                    $('#phone').focus();
                    flage=0;
                    return false;
                }
                if(flage==1)
                    {
                        alert(success);
                }
            }
        </script>
        
        
        <script type="text/javascript">
            <!--
            function MM_swapImgRestore() { //v3.0
                var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
            }
            function MM_preloadImages() { //v3.0
                var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                        if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
            }

            function MM_findObj(n, d) { //v4.01
                var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
                if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
                for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
                if(!x && d.getElementById) x=d.getElementById(n); return x;
            }

            function MM_swapImage() { //v3.0
                var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                    if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
            }
            //-->
        </script>

        <script type="text/javascript">var switchTo5x=false;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>


        <script type="text/javascript">stLight.options({publisher: "7638feaa-5356-487e-91d1-a8bb7c4b562b"}); </script>






    </head>
    <body onload="MM_preloadImages('<?php echo base_url(); ?>images_product/bstandard_hov.png','<?php echo base_url(); ?>images_product/sexpres_hov.png','<?php echo base_url(); ?>images_product/sdeluxe_hov.png','<?php echo base_url(); ?>images_product/mlaunch_hov.png','<?php echo base_url(); ?>images_product/affiliate_hov.png','<?php echo base_url(); ?>images_product/social_hov.png','<?php echo base_url(); ?>images_product/level_hov.png')">
        <div class="wrapper">
            <?php echo $s_header; ?>
            <?php echo $s_tpl_data ?>
        </div>
    </body>
</html>