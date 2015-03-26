<h2>Edit Catagory Details</h2>
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
<span class="small req">[ * marked field are mandatory ]</span>
<form action="" enctype="multipart/form-data" method="post">

    <label>Catagory Name <span class="req">*</span></label>
    <input type="text" id="cname" name="cname" value="<?php echo $m_send_data[0]['s_cat_name']; ?>" class="input-medium">
    
    <label>Catagory Title <span class="req">*</span></label>
    <input type="text" id="ctitle" name="ctitle" value="<?php echo $m_send_data[0]['s_cat_title']; ?>" class="input-medium">
    
    <label>Catagory Description<span class="req">*</span></label>
    <textarea cols="10" rows="6" name="cdesc" id="cdesc" style="height: 200px"  ><?php echo $m_send_data[0]['s_cat_desc']; ?></textarea>
    
    <label>Catagory position<span class="req">*</span></label>
    <input type="text" id="cpos" name="cpos" value="<?php echo $m_send_data[0]['i_cat_position']; ?>" class="input-medium">  
    
    <br />
    <input type="submit" value="Submit" name="submit" class="button">                                   

</form>