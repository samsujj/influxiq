<div class="header">
    <a href="<?php echo base_url();?>"><div class="logo"></div></a>
    <div class="right" style="margin-top: 3px;">
    <table align="right" cellpadding="0" cellspacing="5">
            <tr>

                <td width="7" align="left" valign="top"></td>
                <?php if($page_active=='index' || $page_active=='products'){ ?>
                    <td align="left" valign="top"><span class='st_sharethis_large' displayText='ShareThis'></span>
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_googleplus_large' displayText='Google +'></span>
                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                        <span class='st_email_large' displayText='Email'></span></td>
                    <?php }else{ ?>
                    <td align="left" valign="top"><a href="<?php echo base_url(); ?>home/contact.html" target="_self"><img src="<?php echo base_url(); ?>images/ab.png" alt="" border="0" /></a></td>
                    <?php } ?>
            </tr>
            <tr>
                <td colspan="2"><a href="<?php echo base_url()?>contract.html" class="vieLink">View Contract</a></td>
            </tr>
        </table>
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo base_url();?>" target="_self" <?php echo ($page_active=="index")?"class='active1'":""; ?>>Home</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url();?>home/products.html" target="_self" <?php echo ($page_active=="products")?"class='active1'":""; ?>>Platforms</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url(); ?>home/design.html" <?php echo ($page_active=="design")?"class='active1'":""; ?> >Design</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url(); ?>home/content.html" <?php echo ($page_active=="content")?"class='active1'":""; ?>>Content</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url(); ?>home/marketing.html" target="_self" <?php echo ($page_active=="marketing")?"class='active1'":""; ?> >Marketing</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url(); ?>home/services.html" target="_self" <?php echo ($page_active=="services")?"class='active1'":""; ?> >Custom</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url(); ?>home/dproperties.html" target="_self" <?php echo ($page_active=="dproperties")?"class='active1'":""; ?> >Networks</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="http://toponlinedesigns.com/" target="_self">Portfolio</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url(); ?>home/aboutus.html" target="_self" <?php echo ($page_active=="aboutus")?"class='active1'":""; ?> >About</a></li>
            <li><img src="<?php echo base_url(); ?>images/seperator.jpg" /></li>
            <li><a href="<?php echo base_url(); ?>home/contact.html" target="_self" <?php echo ($page_active=="contact")?"class='active1'":""; ?> >Contact</a></li>
            
        </ul>
    
    </div>
    <div class="shadow"></div>
    </div>