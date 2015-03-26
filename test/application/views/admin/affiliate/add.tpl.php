<script>
    jQuery(function(){

        jQuery('#doa').datepicker(); 

    });
</script>

<script type="text/javascript">
    function send_id(){     
        jQuery.get('<?php echo admin_url() ?>affiliate/affiliate_code',{},
        function(res)
        { 
            jQuery("#afurl").val(res);
        }
        );  
    }

    function send_id1(){     
        jQuery.get('<?php echo admin_url(); ?>affiliate/affiliate_code',{},
        function(res)
        { 
            jQuery("#asfurl").val(res);
        }
        ); 
    }   

       function send_id2(){     
        jQuery.get('<?php echo admin_url(); ?>affiliate/affiliate_code',{},
        function(res)
        { 
            jQuery("#aserfurl").val(res);
        }
        ); 
    }   
     
</script>

<div id="main">

    <div id="content">                        
        <div class="content_block">
            <h2 class="">Add Affiliate Manager</h2>
            <div class="add_detbg">
                <form id="formID" action="" method="post">
                    <div class="pro_add">
                        <?php 
                            echo validation_errors('<div class="fild_err">', '</div>'); 
                            if(!empty($s_msg)){
                                echo '<div id="error" class="fild_err">'.$s_msg.'</div>';
                            }
                        ?>                                    
                        <div class="requar"><span class="red">*</span>Required fields</div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Affiliate Name :</div>
                            <!--<input type="text" id="req" name="req" class="validate[required] text-input" value=""> -->

                            <div class="fild_text"><input id="afname" name="afname" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('afname'); ?>" /></div>
                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Affiliate Email :</div>
                            <!--<input type="text" id="req" name="req" class="validate[required] text-input" value=""> -->

                            <div class="fild_text"><input id="afemail" name="afemail" type="text" class="validate[required,custom[email]] text-input" class1="text_fild" value="<?php echo set_value('afemail'); ?>" /></div>
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Date of Affiliation :</div>
                            <div class="fild_text"><input name="doa" id="doa" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('doa'); ?>" readonly="readonly" /></div>
                            <div class="clr"></div>
                        </div>      
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Product affiliate Code :</div>
                            <div class="fild_text"><input id="afurl" name="afurl" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('afurl'); ?>" /></div>
                            <input id="gen_log" name="gen_log" type="button" value="Generate" class="but2" onclick="send_id()" />
                            <input id="res_log" name="res_log" type="button" value="Clear" class="but2" onclick="form.afurl.value='';" />
                            <div class="clr"></div>
                        </div>      
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>SEO affiliate Code :</div>
                            <div class="fild_text"><input id="asfurl" name="asfurl" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('asfurl'); ?>" /></div>
                            <input id="gen_log" name="gen_log" type="button" value="Generate" class="but2" onclick="send_id1()" />
                            <input id="res_log" name="res_log" type="button" value="Clear" class="but2" onclick="form.afurl.value='';" />
                            <div class="clr"></div>
                        </div>          
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Service affiliate Code :</div>
                            <div class="fild_text"><input id="aserfurl" name="aserfurl" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('aserfurl'); ?>" /></div>
                            <input id="gen_log" name="gen_log" type="button" value="Generate" class="but2" onclick="send_id2()" />
                            <input id="res_log" name="res_log" type="button" value="Clear" class="but2" onclick="form.aserfurl.value='';" />
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name">&nbsp;</div>
                            <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /></div>
                            <div class="clr"></div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </form>   

            </div>
        </div>
        <!--end content_block-->


        <!-- end jquery_tab -->



    </div><!--end content-->
    <div class="but1" style="float:right; margin:10px 10px 10px 0;"><a href="#"  onClick="parent.history.back(); return false;"> Back </a></div>
                </div>