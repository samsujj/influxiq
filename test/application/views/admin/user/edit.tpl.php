<?php //pr($m_send_data,true);
?>

<div id="main">

    <div id="content">



        <div class="content_block">
            <h2 class="">Edit User Manager</h2>
            <div class="add_detbg">
                <div class="pro_add">
                    <?php 
                        echo validation_errors('<div id="error">', '</div>'); 
                        if(!empty($s_msg)){
                            echo '<div id="error">'.$s_msg.'</div>';
                        }
                    ?>                                    
                    <form id="formID" action="" enctype="multipart/form-data" method="post">                                    
                        <div class="requar"><span class="red">*</span>Required fields</div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>First Name :</div>
                            <div class="fild_text"><input id="fname" name="fname" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('fname', $m_send_data['s_firstname']); ?>"/></div>
                            <!-- <div class="fild_err">User Name :</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Last Name :</div>
                            <div class="fild_text"><input id="lname" name="lname" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('lname', $m_send_data['s_lastname']); ?>" /></div>
                            <!-- <div class="fild_err">User Price :</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Email Address :</div>
                            <div class="fild_text"><input id="email" name="email" type="text" class="validate[required,custom[email]] text-input" class1="text_fild" value="<?php echo set_value('email', $m_send_data['s_email']); ?>" /></div>
                            <!-- <div class="fild_err">Others Info :</div> -->
                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Phone Number :</div>
                            <div class="fild_text"><input id="phone" name="phone" type="text" class="validate[required,maxSize[12]] text-input" class1="text_fild" value="<?php echo set_value('phone', $m_send_data['s_phone']); ?>"/></div>
                            <!-- <div class="fild_err">Others Info :</div> -->
                            <div class="clr"></div>
                        </div>

                        <div class="form_div" style="height:40px;">
                            <div class="fild_name"><span class="red">*</span>Address :</div>
                            <div class="fild_text">
                                <textarea id="address" name="address" class="validate[required] text-input" class1="text_fild"  style="width:295px; height:40px; background:#fff; margin:0 0 5px 0;"><?php echo set_value('address', put_safe($m_send_data['s_address'])); ?></textarea>
                            </div>
                            <!-- <div class="fild_err">Description</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Select User Role:</div>
                            <div class="fild_text">
                                <select id="user_role" name="user_role" class="text_fild">
                                    <?php echo get_user_role_dd($m_send_data['i_user_role']); ?>
                                </select>
                            </div>

                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Select Gender :</div>
                            <div class="fild_text">
                                <lable>Male</label><lable><input name="gender" id="gender1" type="radio" value="Male" <?php echo ($m_send_data['s_gender']=="Male")?"checked='checked'":""; ?> class="validate[required] radio" /></label><lable>Female</label><lable><input name="gender" id="gender2" type="radio" value="Female" class="validate[required] radio" <?php echo ($m_send_data['s_gender']=="Female")?"checked='checked'":""; ?> /></label>
                            </div>

                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name">User name:</div>
                            <div class="fild_text">
                                <input id="username" name="username" type="text" class="validate[required,minSize[5],maxSize[12]] text-input" class1="text_fild" value="<?php echo set_value('username', $m_send_data['s_username']); ?>" readonly="readonly">
                            </div>

                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name">Current Password : </div>
                            <div class="fild_text">
                                <?php 
                                    $pwdsize=strlen(strDecode1($m_send_data['s_password']));
                                ?>
                                <span style="float:left; padding-right:10px;"><?php for($i=0;$i<$pwdsize;$i++){?>*<?php } ?></span> <div class="but1"><a href="<?php echo admin_url(); ?>user/myaccnt/<?php echo strEncode($m_send_data['uid']); ?>" id="demo1">Change Password</a></div>
                            </div>
                            <div class="clr"></div>
                        </div>
                        
                        <div class="form_div">
                            <div class="fild_name">&nbsp;</div>
                            <div class="fild_text"><input name="sub_add" type="submit" value="Submit" class="but2" /></div>
                            <div class="clr"></div>
                        </div>
                    </form>
                    <div class="clr"></div>
                </div>

            </div>
        </div>    
        <!--end content_block-->


        <!-- end jquery_tab -->



    </div><!--end content-->
    <div class="but1" style="float:right; margin:10px 10px 10px 0;"><a href="#"  onClick="parent.history.back(); return false;"> Back </a></div>
                </div>