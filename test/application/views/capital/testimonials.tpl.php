<!--<div class="inner-headingbg">
<h2>Reviews and referrals from current subscribers</h2>
<h3>See what others are saying about DMW!</h3>
</div> -->
<div class="inner-content" id="main">


    <?php 
    if(count($m_dataset)>0){
    foreach($m_dataset as $m_row){ ?>
        <div class="inner-content">
            <div class="testimonialbox">
                <div class="testimonialbox-topbg">
                    <div class="testimonial-head"><strong>DMW IS POWERFUL</strong> <?php echo $m_row['s_t_title']; ?>.<br><span><?php echo $m_row['s_t_name'] ?> - <?php echo $m_row['s_t_city'] ?>, <?php echo $m_row['s_t_state']; ?></span></div>
                    <div class="like"><a href="#">Like</a></div>
                </div>
                <div class="testimonialbox-bg">
                    <div class="testimonialpage-con">
                        <?php echo $m_row['s_t_description']; ?>
                    </div>
                    <div class="link_2_contain"><a href="#">
                    <img style="margin:0 0 0 4px;" alt="" src="<?php echo base_url() ?>images/ficon.png"></a>
                    <a href="#"><img alt="" src="<?php echo base_url(); ?>images/ticon.png"></a></div>
                    <div class="clear"></div>
                </div>
                <div class="testimonial-bottombg"></div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

        </div> 
        <?php 
        }
    } ?>
   <?php  echo $this->pagination->create_links(); ?>
    <div class="clear"></div>
              </div>
  
  
 
  
                
           