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
                   
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Select Fils:</div>
                            <div class="fild_text">
                                <select id="user_role" name="user_role" class="text_fild">
                        
                                        <option value="0">Select Files</option>
                                      
                                </select>
                            </div>
                            <!-- <div class="fild_err">Description</div> -->
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
    <div class="but1" style="float:right; margin-top:15px;"><a href="#"  onClick="parent.history.back(); return false;"> Back </a></div>
                </div>