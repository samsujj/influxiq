<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/languages/jquery.validationEngine-en.js"></script>
<div id="main">
    <div id="content">
        <div class="content_block">
            <h2 class="">Add User Manager</h2>
            <div class="add_detbg">
                <div class="pro_add">
                    <?php 
                        echo validation_errors('<div class="fild_err">', '</div>'); 
                        if(!empty($s_msg)){
                            echo '<div id="error" class="fild_err">'.$s_msg.'</div>';
                        }
                    ?>                                    
                    <form id="formID" action="" enctype="multipart/form-data" method="post">                                    
                        <div class="requar"><span class="red">*</span>Required fields</div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>First Name :</div>
                            <div class="fild_text"><input id="fname" name="fname" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('fname'); ?>" /></div>
                            <!-- <div class="fild_err">User Name :</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Last Name :</div>
                            <div class="fild_text"><input id="lname" name="lname" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('lname'); ?>"/></div>
                            <!-- <div class="fild_err">User Price :</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Email Address :</div>
                            <div class="fild_text"><input id="email" name="email" type="text" class="validate[required,custom[email]] text-input" class1="text_fild" value="<?php echo set_value('email'); ?>" /></div>
                            <!-- <div class="fild_err">Others Info :</div> -->
                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Phone Number :</div>
                            <div class="fild_text"><input id="phone" name="phone" type="text" class="validate[required,maxSize[12]] text-input" class1="text_fild" value="<?php echo set_value('phone'); ?>" /></div>
                            <!-- <div class="fild_err">Others Info :</div> -->
                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Address :</div>
                            <div class="fild_text">
                                <textarea id="address" name="address" class="validate[required] text-input" class1="text_fild" style="width:295px; height:50px; background:#fff;"><?php echo set_value('address'); ?></textarea>
                            </div>                                                                                                                                         
                            <!-- <div class="fild_err">Description</div> -->
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Select User Role:</div>
                            <div class="fild_text">
                                <select id="user_role" name="user_role" class="text_fild">
                                    <?php if(count_admin()>0){ ?>
                                        <option value="2">Admin</option>
                                        <?php }else{ ?>   
                                        <?php echo get_user_role_dd(set_value('user_role')); ?>
                                        <?php } ?>
                                </select>
                            </div>
                            <!-- <div class="fild_err">Description</div> -->
                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Select Gender :</div>
                            <div class="fild_text">
                                <lable>Male</label><lable><input name="gender" id="gender1" type="radio" value="Male" class="validate[required] radio" checked="checked"/></label><lable>Female</label><lable><input name="gender" id="gender2" type="radio" value="Female" class="validate[required] radio" /></label>
                            </div>
                            <!-- <div class="fild_err">Description</div> -->
                            <div class="clr"></div>
                        </div>

                        <h3>Login details</h3>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>User Name :</div>
                            <div class="fild_text"><input id="username" name="username" type="text" class="validate[required,minSize[5],maxSize[12]] text-input" class1="text_fild"  value="<?php echo set_value('username'); ?>"/></div>
                            <!-- <div class="fild_err">Others Info :</div> -->
                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Password :</div>
                            <div class="fild_text"><input id="password" name="password" type="password" class="validate[required,minSize[6]] text-input" class1="text_fild" value="<?php echo set_value('password'); ?>" /></div>
                            <!-- <div class="fild_err">Others Info :</div> -->
                            <div class="clr"></div>
                        </div>

                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Confirm Password :</div>
                            <div class="fild_text"><input id="repassword" name="repassword" type="password" class="validate[required,minSize[6],equals[password]] text-input" class1="text_fild" value="<?php echo set_value('repassword'); ?>" /></div>
                            <!-- <div class="fild_err">Others Info :</div> -->
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