<?php //pr($m_model_dataset,TRUE); ?>
<script type="text/javascript">
    $(function(){
        $(".lb-h-scrollbar").click(
        function(){
            $(".lb-h-scrollbar").css("display","none");
             //$(".lb-h-scrollbar").removeAttr("class");
             
        }
        )});
</script>
<div class="body-content-sec">

    <div class="inner-conbg">        
        <?php if(count($m_cat_dataset)>0){ ?>
            <div class="inner-con">
                <h2><?php
                        //pr($m_cat_dataset);
                        echo $m_cat_dataset[0]['s_cat_title'];  
                    ?> in <span>Material Girlz</span></h2>
                <div class="inner-con-scoll">

                    <div class="content-left">
                        <?php
                            echo $m_cat_dataset[0]['s_cat_desc'];  
                        ?>
                    </div>
                    <?php if(count($m_model_dataset)>0){ ?> 
                        <div class="content-right">
                            <h3>Our Line Up</h3>
                            <div class="item">
                                <ul>
                                    <?php for($i=0;$i<count($m_model_dataset);$i++){ ?>
                                        <li><a href="<?php echo base_url()."capital/model_details/".$m_model_dataset[$i]['i_mod_main_id']."/".$m_cat_dataset[0]['i_cat_id']."/".$m_model_dataset[$i]['s_model_name'].".html"; ?>"><?php echo ucwords($m_model_dataset[$i]['s_model_name']); ?></a></li>           
                                        <?php } ?>    
                                </ul>
                            </div> 
                        </div>
                        <?php } ?>
                </div>
            </div>
            <?php }else{ ?>    
            <div class="inner-con"> 
                <h2 ><span>No Category Information Available/No Model Information Available</span></h2>
            </div>
            <?php } ?>
    </div>
</div>