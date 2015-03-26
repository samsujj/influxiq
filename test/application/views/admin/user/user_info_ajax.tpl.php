<?php //pr($m_send_data,TRUE); ?>
<script language="text/javascript">
$(function(){
   if(($("#fbcontent").html().length)>500){
       $("#fbcontent").css("height","500px")
       $("#fbcontent").css("overflow","scroll");
   }
});
</script>
<div id="fbcontent" class="fb_div" style="width: 600px;text-align: left;">
    <h2><?php echo $m_send_data['s_firstname'].'\'s Account Details'; ?></h2>
    <div class="clear"></div>
    <?php
        if(count($m_send_data)>0){
            //pr($m_send_data);
        ?>
        <label>
            <span>Name : </span><?php echo $m_send_data['s_firstname'].' '.$m_send_data['s_lastname']; ?>
        </label>
        <label>
            <span>Sex : </span> <?php echo $m_send_data['s_gender']; ?>
        </label>
        <label>
            <span>Email : </span><?php echo $m_send_data['s_email']; ?>
        </label>
        <label>
            <span>Phone Number : </span><?php echo $m_send_data['s_phone']; ?>
        </label>
        <label>
            <span>User Role : </span><?php echo $m_send_data['s_role_name']; ?>
        </label>
        <label>
            <span>Address : </span><?php echo put_safe(put_safe(put_safe($m_send_data['s_address']))); ?>
        </label>
        <div class="clear"></div>
        <div style="text-align: center;">
            <input type="button" value="Edit" name="submit" class="button" onclick="window.location.href='<?php echo admin_url().'user/edit/'.strEncode($m_send_data['uid'])?>'"> 
            <input type="button" value="Close" name="button" class="button" onclick="closeFbDiv()" />
        </div>
        <?php
        }else{
            echo "<label>No user information</label>";
        }
    ?>
    <div class="clear"></div>
</div>

