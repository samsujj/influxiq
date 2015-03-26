<div class="addbutton" onclick="window.location='<?php echo admin_url()?>model/add.html'">
    <input type="button" value="Add" name="submit" class="button">
</div> 
<h2><?php echo $i_model_cat_name; ?> Model Listing</h2>
<div class="addbutton">
    <select name="user_role" id="user_role" onchange="javascript:list_particular_model(this);" >
        <option value="" selected="selected">All</option>
        <?php echo get_catagory_dd($i_cat_id); ?>
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
<table class="details">
    <caption>&nbsp;</caption>
    <?php
        //pr($m_dataset);
    ?>
    <tr>
        <th width="20%">Model name</th>
        <th width="20%">Model Phone Number</th>
        <th width="20%">Model Catagory</th>
        <?php if(is_superadmin()){ ?>
            <th width="20%">Action</th>
        <?php } ?>
    </tr>
    <?php if(count($m_dataset)>0):?>
        <?php foreach($m_dataset as $m_row):
                //pr($m_row);
            ?>
            <tr>
                <td align="left">
                <?php if(is_superadmin()){ ?>
                    <a rel="tip" title="View Model details" href="javascript:open_model_info('<?php echo strEncode($m_row['i_mod_main_id']);?>')" class="link_show" >
                        <?php echo $m_row['s_model_name']; ?>
                    </a>
                  <?php }else{ ?>  
                  <?php echo $m_row['s_model_name']; ?>  
                  <?php } ?>
                                               
                </td>
                <td align="center"><?php echo $m_row['s_model_phno'];?></td>
                <td align="center"><?php echo $m_row['s_cat_multi_name'];?></td>
                <?php if(is_superadmin()){ ?>
                    <td align="center">
                        <a rel="tip" title="Edit user details" href="<?php echo admin_url().'model/edit/'.strEncode($m_row['i_mod_main_id']); ?>">
                            <img 
                                width="16" height="16" border="0" style="margin-right:5px;" 
                                alt="Edit" src="<?php echo base_url()?>images/admin/edit.png">
                        </a>
                        <a rel="tip" title="Delete user details" href="javascript:delete_confirmation('<?php echo admin_url().'model/del/'.strEncode($m_row['i_mod_main_id']) ?>');">
                            <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/delete.png">
                        </a>

                        <?php 
                            if($m_row['is_active']==1){
                            ?>
                            <a title="Disallow Blog" rel="tip" href="<?php echo admin_url().'model/change-state/disallow/'.strEncode($m_row['i_mod_main_id']) ?>">
                                <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/active.png">
                            </a>
                            <?php                         
                            }else{
                            ?>
                            <a title="Allow Blog" rel="tip" href="<?php echo admin_url().'model/change-state/allow/'.strEncode($m_row['i_mod_main_id']) ?>">
                                <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/inactive.png">
                            </a>
                            <?php
                            }
                        ?>

                    </td>
                    <?php } ?>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
        <?php 
            echo show_msg();
        ?>
        <?php endif; ?> 

</table>                

