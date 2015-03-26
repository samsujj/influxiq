<?php //pr($m_dataset,true); ?>
<script type="text/javascript"> 
    jQuery.noConflict();

    jQuery(document).ready(function() { 
        //alert(5);
        
         var str=jQuery(".errors").text();
       //
       
        if(str.length>0){
            jQuery.blockUI({ 
                message: jQuery('#loginForm'), 
                css: {
                    background: 'none',
                    border: 'none',
                    top: '20%',
                    left: '35%'
                } 
            });   
        }
        
        jQuery('#demo1').click(function() { 
            jQuery.blockUI({ 
                message: jQuery('#loginForm'), 
                css: {
                    background: 'none',
                    border: 'none',
                    top: '20%',
                    left: '35%'
                } 
            }); 

            //setTimeout($.unblockUI, 2000); 
        }); 
    }); 
</script>


<div id="main">

    <div id="content">
        <?php   echo show_msg();   ?>


        <div class="content_block">
            <h2 class="">The Account Manager</h2>
            <div class="add_detbg">
                <div class="pro_add">
                    <div class="requar">&nbsp;</div>
                    <div class="form_div">
                        <div class="fild_name"> E-mail ID  :</div>
                        <div class="fild_text2"><?php echo $m_dataset[0]['s_email']; ?></div>
                        <div class="clr"></div>
                    </div>
                    <div class="form_div">
                        <div class="fild_name"> User Name : </div>
                        <div class="fild_text2"><?php echo $m_dataset[0]['s_username']; ?></div>
                        <div class="clr"></div>
                    </div>
                    <div class="form_div">
                        <div class="fild_name"> Current Password : </div>
                        <div class="fild_text2">
                            <?php 
                                $pwdsize=strlen(strDecode1($m_dataset[0]['s_password']));
                            ?>
                            <span style="float:left; padding-right:10px;"><?php for($i=0;$i<$pwdsize;$i++){?>*<?php } ?></span> <div class="but1"><a href="javascript: void(0)" id="demo1">Change Password</a></div>
                            <div style="display:none;">
                                <div id="loginForm" class="pop_bg2" >
                                    <h6>Change Password</h6>
                                    <div style="position:absolute; width:35px; height:35px; top:-10px; right:-15px;"><a href="javascript:void()" onclick="jQuery.unblockUI()" ><img src="<? echo base_url();?>images/admin/closes.png" alt="" /></a></div>
                                     
                                 
                                    <form id="formID" action="" method="post" > 
                                    
                                    <div class="blok">
                                     <?php echo validation_errors('<div class="errors">', '</div>'); ?>
                                     </div>
                                     <div class="clear"></div>
                                        <div class="blok">
                                      
                                            <div class="name"><span class="red">*</span>Current Password :</div>
                                            <div class="text"> <input name="cur_pass" id="cur_pass" type="password" class="validate[required,minSize[6]] text-input" class1="text_fild" />
                                            </div>
                                            <!-- <div class="errors">Current Password</div> -->
                                            <div class="clr"></div>
                                        </div>
                                        <div class="blok">
                                            <div class="name"><span class="red">*</span>New Password :</div>
                                            <div class="text"> <input name="new_pass" id="new_pass" type="password" class="validate[required,minSize[6]] text-input" class1="text_fild" />
                                            </div>
                                            <!-- <div class="errors">New Password</div> -->
                                            <div class="clr"></div>
                                        </div>
                                        <div class="blok">
                                            <div class="name"><span class="red">*</span>Retype Password :</div>
                                            <div class="text"> <input name="re_pass" id="re_pass" type="password" class="validate[required,minSize[6],equals[new_pass]] text-input" class1="text_fild" />
                                            </div>
                                            <!-- <div class="errors">Retype Password</div> -->
                                            <div class="clr"></div>
                                        </div>
                                        <div class="blok">
                                            <div class="name">&nbsp;</div>
                                            <div class="text"><input name="submit" type="submit" value="Submit" class="but2" /></div>
                                            <!-- <div class="errors">but</div> -->
                                            <div class="clr"></div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                        <div class="clr"></div>
                    </div>

                    <div class="form_div">
                        <div class="fild_name">&nbsp;</div>
                        <div class="fild_text"><input name="" type="button" value="Edit" class="but2" onclick="window.location='<?php echo admin_url() ?>user/edit/<?php echo strEncode($m_dataset[0]['uid']); ?>'"/></div>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>

            </div>
        </div>
        <!--end content_block-->
        <div class="but1" style="float:right; margin:10px -20px 10px 0;"><a href="#"  onClick="parent.history.back(); return false;"> Back </a></div>

        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>