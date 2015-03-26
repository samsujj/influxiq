<?php 
    //pr($m_send_data, true);
    echo validation_errors('<div id="error">', '</div>'); 
    if(!empty($s_msg)){
        echo '<div id="error">'.$s_msg.'</div>';
    }
    // Message showing from controller
    echo show_msg();
//    $m_img_data = $m_send_data;
 //   $m_send_data = $m_send_data[0];
?>
<div id="main">

    <div id="content">                        
        <div class="content_block">
            <h2 class="">Edit Category </h2>
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
                            <div class="fild_name"><span class="red">*</span>Category Name :</div>
                            <!--<input type="text" id="req" name="req" class="validate[required] text-input" value=""> -->

                            <div class="fild_text"><input id="cat_name" name="cat_name" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('cat_name',$m_send_data['cat_name']); ?>" /></div>
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
    
                </div>