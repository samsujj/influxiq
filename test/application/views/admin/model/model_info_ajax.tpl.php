<?php //pr($m_send_data,TRUE); ?>
<script language="text/javascript">
$(function(){
   if(($("#fbcontent").html().length)>500){
       $("#fbcontent").css("overflow","scroll");
   }
});
</script>
<div id="fbcontent" class="fb_div" style="width: 600px;text-align: left;height:500px;">
  <?php   if(count($m_send_data)>0){ ?>
    <h2><?php echo ucwords($m_send_data[0]['s_model_name']).'\'s  Details'; ?></h2>
    <div class="clear"></div>
    <?php
   
            //pr($m_send_data);
        ?>
        <label>
            <span>Model Phone No. : </span><?php echo $m_send_data[0]['s_model_phno']; ?>
        </label>
        <label>
            <span>Model Description : </span> 
            <?php 
             $model_des=strip_tags($m_send_data[0]['s_model_desc']);
             echo html_entity_decode($model_des,ENT_QUOTES,'utf-8');
             $model_des1 = str_replace('&nbsp;', ' ', $model_des); 
            ?>
            <?php //echo $m_send_data[0]['s_model_desc']; ?>
             <?php //echo $model_des1; ?>              
        </label>
        <label>
        <?php $img_arr = explode(", ", $m_send_data[0]['s_image_multi_name']); ?>
        <?php for($i=0;$i<count($img_arr);$i++){ ?>
            <img src="<?php echo base_url() ?>/uploads/model/thumb/<?php echo $img_arr[$i];?>" alt="">
        <?php } ?>
        </label>
        <div class="clear"></div>
        <div style="text-align: center;">
            <input type="button" value="Edit" name="submit" class="button" onclick="window.location.href='<?php echo admin_url().'model/edit/'.strEncode($m_send_data[0]['i_model_id'])?>'">  <input type="button" value="Close" name="button" class="button" onclick="closeFbDiv()" />
        </div>
        <?php
        }else{
            echo "<label>No Image is uploaded/No model information</label>";
        }
    ?>
    <div class="clear"></div>
</div>
