<?php //pr($m_send_data,TRUE); 
?>
<script type="text/javascript">
    $(function(){

        //   var val = $(this).find(':selected')[0].value;

        $('#img_type').change(function() {
            var val = $(this).find(':selected')[0].value;
            // $('#changevalue').val(id);
            if(val==1){
                $("#lab_model").css("display","inline");
                $("#lab_cat").css("display","none");

            }
            else{
                $("#lab_cat").css("display","inline");
                $("#lab_model").css("display","none");                
            }                
        });

        /*  $("#catagory").multiselect({
        selectedText: function(numChecked, numTotal, checkedItems){
        return numChecked + ' of ' + numTotal + ' checked';
        }
        });    */     

    });          
</script>
<h2>Edit Image</h2>
<h3>Image details</h3>
<?php 
    echo validation_errors('<div id="error">', '</div>'); 
    if(!empty($s_msg)){
        echo '<div id="error">'.$s_msg.'</div>';
    }
?>
<?php
    // Message showing from controller
    echo show_msg();
?>
<?php if(count($m_send_data)>0){ 
    //pr($img_name,TRUE); 
    ?>
<span class="small req">[ * marked field are mandatory ]</span>
<form action="" enctype="multipart/form-data" method="post">

    <label>Image Type <span class="req">*</span></label>
    <select id="img_type" name="img_type">
        <option value="1" <?php echo ($m_send_data[0]['i_img_type_id']==1)?"selected='selected''":"" ?>>Model</option>
        <option value="2" <?php echo ($m_send_data[0]['i_img_type_id']==2)?"selected='selected''":"" ?>>Category</option>
    </select>

    <p id="lab_cat" style="display: none;">
        <label>Select Catagory<span class="req">*</span></label>
        <select name="catagory" id="catagory">
            <?php echo get_catagory_dd(set_value('catagory')); ?>
    </select>   </p>

    <p id="lab_model">
        <label>Select Model<span class="req">*</span></label>     
        <select name="model" id="model">
            <?php echo get_model_dd($m_send_data[0]['i_model_id']); ?>
        </select>        
    </p>
    <!-- <select name="catagory" multiple="multiple" id="catagory" style="width:400px;">
    <?php //echo get_catagory_dd(set_value('catagory')); ?>
    </select> -->
    <p>
        <label>Upload Images<span class="req">*</span></label>
            <input type="file" style="margin-bottom:7px;" name="mode_img_upload[]" size="33">
        </p>
    <br />
    <input type="submit" value="Submit" name="submit" class="button">                                   
<?php } ?>
</form>
