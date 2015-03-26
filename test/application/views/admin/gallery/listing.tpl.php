<?php //pr($m_dataset_cat,TRUE); ?>
<script type="text/javascript">
    $(function(){

        //   var val = $(this).find(':selected')[0].value;
        //$("#cat_tab").hide();

        $('#user_role').change(function() {
            var val = $(this).find(':selected')[0].value;
            // $('#changevalue').val(id);
            if(val==1){ 
               window.location="<?php echo admin_url() ?>gallery/listing/1" ;
               
               // $("#mod_tab").show();
                //$("#cat_tab").hide();   

            }
            else{
                window.location="<?php echo admin_url()?>gallery/listing/2" ;              
                //$("#cat_tab").show();
                //$("#mod_tab").hide();                
            }                
        });

        /*  $("#catagory").multiselect({
        selectedText: function(numChecked, numTotal, checkedItems){
        return numChecked + ' of ' + numTotal + ' checked';
        }
        });    */     

    });          
</script>
<div class="addbutton" onclick="window.location='<?php echo admin_url()?>gallery/add.html'">
    <input type="button" value="Add" name="submit" class="button">
</div>
<h2><?php //echo $i_model_cat_name; ?> Image Listing</h2>
<div class="addbutton">
    <select name="user_role" id="user_role">
        <option value="1" onclick="window.location.href='<?php echo admin_url() ?>gallery/listing/1'">Model</option>
        <option value="2">Category</option>
    </select>
</div>
<div class="clear"></div>
<?php 
    //echo $s_msg ;
    echo validation_errors('<div id="error">', '</div>'); 

    echo show_msg();

?>
<?php
    // Message showing from controller
    // echo show_msg();
?>
<?php 
    // pr($m_dataset,TRUE);
?>
<?php if($show_img=="model"){ ?>
<table class="details" id="mod_tab">
    <caption>&nbsp;</caption>
    <?php
        //pr($m_dataset);
    ?>
    <tr>
    <th width="25%">Add Time</th>
    <th width="25%">Image Preview</th>
    <th width="25%">Model Name</th>
    <?php if(is_superadmin()){ ?>
        <th width="25%">Action</th>
        <?php } ?>
    <?php if(count($m_dataset)>0):?>
        <?php foreach($m_dataset as $m_row):
                //pr($m_row);
            ?>
            <tr>
                <td align="left">
                    <?php echo date("m/d/Y h:i:s A",$m_row['i_image_add_time']); ?>
                </td>
                <td align="center"><img src="<?php echo base_url()."uploads/model/thumb/".$m_row['s_img_name'];?>" alt=""></td>
                <td align="center"><?php echo $m_row['s_model_name'];?></td>
                <?php if(is_superadmin()){ ?>
                    <td align="center">
                        <a rel="tip" title="Edit Image details" href="<?php echo admin_url().'gallery/edit/'.strEncode($m_row['i_img_id']).'/'.strEncode($m_row['i_img_type_id']); ?>">
                            <img 
                                width="16" height="16" border="0" style="margin-right:5px;" 
                                alt="Edit" src="<?php echo base_url()?>images/admin/edit.png">
                        </a>
                        <a rel="tip" title="Delete Image details" href="javascript:delete_confirmation('<?php echo admin_url().'gallery/del/'.strEncode($m_row['i_img_id']) ?>');">
                            <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/delete.png">
                        </a> 

                        <?php 
                            if($m_row['i_image_active']==1){
                            ?>
                            <a title="Disallow Image" rel="tip" href="<?php echo admin_url().'gallery/change-state/disallow/'.strEncode($m_row['i_img_id']) ?>">
                                <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/active.png">
                            </a>
                            <?php                         
                            }else{
                            ?>
                            <a title="Allow Image" rel="tip" href="<?php echo admin_url().'gallery/change-state/allow/'.strEncode($m_row['i_img_id']) ?>">
                                <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/inactive.png">
                            </a>
                            <?php
                            }
                        ?>

                    </td>
                    <?php } ?>  
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>   
    <tr>
        <td colspan="4">
            <?php
                echo $this->pagination->create_links();        
            ?>
        </td>
    </tr>          
</table>  
<?php }else{?>
<table class="details" id="cat_tab">
    <caption>&nbsp;</caption>
    <?php
        //pr($m_dataset);
    ?>
    <tr>
        <th width="25%">Add Time</th>
        <th width="25%">Image Preview</th>
        <th width="25%">Category Name</th>
        <?php if(is_superadmin()){ ?> 
            <th width="25%">Action</th>
            <?php } ?>
    </tr>
    <?php if(count($m_dataset_cat)>0):?>
        <?php foreach($m_dataset_cat as $m_row):
                //pr($m_row);
            ?>
            <tr>
                <td align="left">
                    <?php echo date("m/d/Y h:i:s A",$m_row['i_image_add_time']); ?>
                </td>
                <td align="center"><img src="<?php echo base_url()."uploads/model/thumb/".$m_row['s_img_name'];?>" alt=""></td>
                <td align="center"><?php echo $m_row['s_cat_name'];?></td>
                <?php if(is_superadmin()){ ?>

                    <td align="center">
                        <a rel="tip" title="Edit Image details" href="<?php echo admin_url().'gallery/edit_cat/'.strEncode($m_row['i_img_id']).'/'.strEncode($m_row['i_img_type_id']); ?>">
                            <img 
                                width="16" height="16" border="0" style="margin-right:5px;" 
                                alt="Edit" src="<?php echo base_url()?>images/admin/edit.png">
                        </a>
                        <a rel="tip" title="Delete Image details" href="javascript:delete_confirmation('<?php echo admin_url().'gallery/del/'.strEncode($m_row['i_img_id']) ?>');">
                            <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/delete.png">
                        </a> 

                        <?php 
                            if($m_row['i_image_active']==1){
                            ?>
                            <a title="Disallow Image" rel="tip" href="<?php echo admin_url().'gallery/change-state/disallow/'.strEncode($m_row['i_img_id']) ?>">
                                <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/active.png">
                            </a>
                            <?php                         
                            }else{
                            ?>
                            <a title="Allow Image" rel="tip" href="<?php echo admin_url().'gallery/change-state/allow/'.strEncode($m_row['i_img_id']) ?>">
                                <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/inactive.png">
                            </a>
                            <?php
                            }
                        ?>

                    </td>
                    <?php } ?>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr>
        <td colspan="4">
            <?php
                echo $this->pagination->create_links();        
            ?>
        </td>
    </tr>
</table> 
<?php } ?>             

