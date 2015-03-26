<?php //pr($m_model_dataset,TRUE); ?>

<?php if(count($m_model_dataset)>0){ ?>
    <?php $img_arr = explode(", ", $m_model_dataset[0]['s_image_multi_name']); ?>
    <?php } ?>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        // $(".inner-con-scoll").lionbars();
        jQuery(".toggle_container").hide();
        jQuery(".trimg").click(function()
        {
            //alert(9);
            $("#gallery").slideToggle("slow");
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });
    });
</script>
<script type="text/javascript">
    $(function() {
        $("#my-gallery").vion();
    });
</script>
<script type="text/javascript">
    $(function() {
        //$(".vion-gallery").css("position","fixed");
        var vion = $("#your-gallery-id").vion();

        $("#next").bind("click", function() {
            vion.selectNext();
        });

        $("#prev").bind("click", function() {
            vion.selectPrevious();
        });
    });
</script>

<div class="body-content-sec">

    <div class="inner-conbg">
        <?php if(count($m_model_dataset)>0){ ?>  
            <div class="inner-con">
                <h2 ><?php echo ucwords($m_model_dataset[0]['s_model_name']);?> <span><?php echo $m_model_dataset[0]['s_model_phno']; ?></span></h2>
                <div class="inner-con-scoll">

                    <div class="content-left">
                        <!-- Gallery starts -->
                        <div id="my-gallery" class="vion-gallery">

                            <!-- Gallery mask starts -->
                            <div class="gallery-mask">

                                <!-- Slides start -->
                                <div class="slides">
                                    <?php for($i=0;$i<count($img_arr);$i++){ ?>
                                        <div class="slide">
                                            <div class="image-holder"> <img src="<?php echo base_url() ?>uploads/model/<?php echo $img_arr[$i]; ?>" /> </div>
                                            <!--<div class="info">
                                            <h2>Title goes here</h2>
                                            <p>Subtitle goes here.</p>
                                            </div> -->
                                        </div>
                                        <?php } ?>



                                </div>                         
                                <!-- Slides end -->

                            </div>
                            <!-- Gallery mask ends -->

                            <!-- Thumbnails start -->
                            <div class="thumbnails">
                                <ul>
                                    <?php for($i=0;$i<count($img_arr);$i++){ ?>
                                        <li><img src="<?php echo base_url(); ?>uploads/model/thumb/<?php echo $img_arr[$i]; ?>" /></li>
                                        <?php } ?>   
                                </ul>
                            </div>
                            <!-- Thumbnails end -->

                        </div>
                        <!-- Gallery ends -->
                    </div>
                    <div class="content-right">

                        <?php echo html_entity_decode($m_model_dataset[0]['s_model_desc'],ENT_QUOTES,'utf-8'); ?>

                        <div class="back"><a href="javascript:history.go(-1);">&laquo; Back</a></div>

                    </div>      
                </div>



            </div>
            <?php }else{ ?>    
               <div class="inner-con"> 
               <h2 ><span>No Details Available/No Images Available</span></h2>
               </div>
            <?php } ?>
    </div>
    </div>
   