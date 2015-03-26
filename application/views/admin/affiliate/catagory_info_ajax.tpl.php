<script language="text/javascript">
$(function(){
   if(($("#fbcontent").html().length)>500){
       $("#fbcontent").css("overflow","scroll");
   }
});
</script>
<div id="fbcontent" class="fb_div" style="width: 600px;text-align: left;height: 500px;">
    <h2><?php echo $m_send_data['s_cat_name'].'\'s  Details'; ?></h2>
    <div class="clear"></div>
    <?php
        if(count($m_send_data)>0){
            //pr($m_send_data);
        ?>
        <label>
            <span>Catagory Title : </span><?php echo $m_send_data['s_cat_title']; ?>
        </label>
        <label>
            <span>Catagory Description : </span> <?php echo put_safe($m_send_data['s_cat_desc']); ?>
        </label>
        <div class="clear"></div>
        <div style="text-align: center;">
            <input type="button" value="Edit" name="submit" class="button" onclick="window.location.href='<?php echo admin_url().'product/edit/'.strEncode($m_send_data['i_cat_id'])?>'">  <input type="button" value="Close" name="button" class="button" onclick="closeFbDiv()" />
        </div>
        <?php
        }else{
            echo "<label>No Catagory information</label>";
        }
    ?>
    <div class="clear"></div>
</div>

