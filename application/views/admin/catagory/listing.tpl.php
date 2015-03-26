<div class="addbutton" onclick="window.location='<?php echo admin_url()?>product/add.html'">
    <input type="button" value="Add" name="submit" class="button"></div>
<h2>Catagory Listing</h2>
<?php 
    echo validation_errors('<div id="error">', '</div>'); 
    if(!empty($s_msg)){
        echo '<div id="error">'.$s_msg.'</div>';
    }
?>
<?php
    // Message showing from controller
    echo show_msg();
    //  pr($m_dataset,TRUE);
?>

<table class="details">
    <caption>&nbsp;</caption>
    <?php
        //pr($m_dataset);
    ?>
    <tr>
        <th width="10%">Adding Time</th>
        <th width="20%">Catagory Name</th>
        <th width="20%">Catagory Positon</th>
        <?php if(!is_admin() && is_superadmin()){ ?>  
            <th width="10%">Action</th>
        <?php } ?>
    </tr>
    <?php if(count($m_dataset)>0):?>
        <?php foreach($m_dataset as $m_row):?>

            <tr>
                <td align="center">
                    <?php echo date("m/d/Y g:i A",$m_row['t_add_time']); ?>
                </td>
                <td>
                    <a rel="tip" title="View Catagory details" href="javascript:open_catagory_info('<?php echo strEncode($m_row['i_cat_id']);?>')" class="link_show" >
                        <?php echo $m_row['s_cat_name'];?>
                    </a>
                </td>
                <td><?php echo $m_row['i_cat_position'];?></td>
                <td align="center">
                    <a rel="tip" title="Edit catagory" href="<?php echo admin_url().'product/edit/'.strEncode($m_row['i_cat_id']); ?>">
                        <img 
                            width="16" height="16" border="0" style="margin-right:5px;" 
                            alt="Edit" src="<?php echo base_url()?>images/admin/edit.png">
                    </a>
                    <a rel="tip" title="Delete catagory" href="javascript:delete_confirmation('<?php echo admin_url().'product/del/'.strEncode($m_row['i_cat_id']) ?>');">
                        <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/delete.png">
                    </a>

                    <?php 
                        if($m_row['i_active']==1){
                        ?>
                        <a title="Disallow catagory" rel="tip" href="<?php echo admin_url().'product/change-state/disallow/'.strEncode($m_row['i_cat_id']) ?>">
                            <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/active.png">
                        </a>
                        <?php                         
                        }else{
                        ?>
                        <a title="Allow catagory" rel="tip" href="<?php echo admin_url().'product/change-state/allow/'.strEncode($m_row['i_cat_id']) ?>">
                            <img width="16" height="16" border="0" style="margin-right:5px;" alt="Delete" src="<?php echo base_url()?>images/admin/inactive.png">
                        </a>
                        <?php
                        }
                    ?>

                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

</table>                  

