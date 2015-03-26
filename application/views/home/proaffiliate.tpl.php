<script>
    $(function(){
        $('#products').slides({
            preload: true,
            preloadImage: 'images/video-gallery/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 350,
            fadeSpeed: 500,
            generateNextPrev: true,
            generatePagination: false
        });
    });
</script>
<div class="HEADER_product-details"></div>
<div class="clr"></div>
<div class="quick-menubg">
    <div class="quicknav">
        <ul>
            <li class="nobg"><a href="<?php echo base_url() ?>home/productdetails.html">Business Standard</a></li>        
            <li><a href="<?php echo base_url(); ?>home/shopexpress.html">Shop Express</a></li>          
            <li><a href="<?php echo base_url(); ?>home/shopdelux.html">Shop Deluxe</a></li>         
            <li><a href="<?php echo base_url(); ?>home/marketlaunch.html">Market Launch</a></li>         
            <li><a href="<?php echo base_url() ?>home/proaffiliate.html">Affiliate</a></li>          
            <li><a href="<?php echo base_url() ?>home/prosocial.html">Social</a></li>         
            <li><a href="<?php echo base_url() ?>home/multilevel.html">Multi-Level</a></li>
    </ul>
</div>
</div>
<div class="clr"></div>

<div class="pro-details-area">
    <div class="pro-details-topbg"></div>
    <div class="pro-details-bg">
        <div class="pro-details-con">
            <div class="Productparts">
                <div class="SC">
                    <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/affiliate_pic.png" alt="" /></div>
                    <div class="Botom_left">
                        <?php echo show_msg(); ?>
                        <form id="form5" name="form5" action="" method="post">
                            <table width="100%" cellspacing="5" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top">Have Questions about <span style="color:#35e2af;">Affiliate</span>?</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <input type="hidden" name="pack" id="pack5" value="InfluxIQ Affiliate" />
                                        <input name="name" id="name5" type="text" class="loginbox" value="Name" onclick="ch1('5')"/>
                                        <?php echo form_error('name'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input name="email" id="email5" type="text" class="loginbox" value="Email" onclick="ch2('5')"/>
                                        <?php echo form_error('email'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><textarea name="comments" id="comments5" cols="" rows="" class="loginarea" onclick="ch3('5')">Questions - Comments</textarea><?php echo form_error('comments'); ?></td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
                                </tr>
                            </table>
                        </form></div>
                </div>

                <div class="SR">
                    <div class="Headingarea_pro">
                        <span class="mainheading"><a name="affiliate">&nbsp;</a>InfluxIQ Affiliate</span> &nbsp; <span class="orangefont">Starting at $5,997 +&nbsp;$.10 a 
                            transaction / $.50 per active user per month</span><br />
                        <p><b>InfluxIQ Affiliate is a powerful system that allows a shop owner to add 
                                affiliates to their marketing model.</b>&nbsp; This is great if you 
                            are actively seeking others to sell your products or want to give 
                            commissions for other websites sending you traffic.</p>
                    </div>
                    <div class="affiliatecont">
                        <b>Our Affiliate web software comes with all of the 
                            following features plus:</b>
                        <ul>
                            <li>You
                                get everything that comes in the Business Standard, Shop Express, Shop Deluxe 
                                and Market Launch website. This includes every features that 
                                is listed as well as the consulting and creative interview.&nbsp; 
                                This is our premium eCommerce web enterprise edition.</li><br />
                            <li>This
                                system allows you to create and maintain an affiliate program 
                                that goes up to 3 levels deep.&nbsp; You are able to control 
                                this directly from the management portal changing percentages as 
                                you deem necessary.</li><br />
                            <li>Each
                                of the affiliates have a back office where they are able to log 
                                in and interact with the admins and view a variety of tools and 
                                reports.</li><br />
                            <li>The
                                affiliates are able to create marketing campaigns, make banners to 
                                associate with them and create links that allow them to go out 
                                and marketing your products and services directly..</li><br />
                            <li>This
                                system comes with replicated website technology that allows each 
                                of the affiliates to send their offline and online audience to a 
                                page that has some customization. It is still your website, but 
                                it has many parts that are unique to them as an affiliate.</li><br />
                        </ul>
                    </div>

                </div>

            </div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="pro-details-bottombg"></div>
    <div class="clr"></div>
</div>

<div class="clr"></div>
<div class="video-section">
    <h2><span>Featured</span> videos</h2>    
    <div id="products_example">
        <div id="products">
            <div class="slides_container">
                <a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-1-2x.jpg" width="510" alt="1144953 1 2x"></a>
                <a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-3-2x.jpg" width="510" alt="1144953 3 2x"></a>

                <a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-2-2x.jpg" width="510" alt="1144953 2 2x"></a>                    
                <a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-4-2x.jpg" width="510" alt="1144953 4 2x"></a>
                <a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-5-2x.jpg" width="510" alt="1144953 5 2x"></a>
                <a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-6-2x.jpg" width="510" alt="1144953 6 2x"></a>

            </div>
            <ul class="pagination">
                <li><a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-1-2x.jpg" width="190" height="93" alt="1144953 1 2x"></a></li>
                <li><a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-3-2x.jpg" width="190" height="93" alt="1144953 3 2x"></a></li>
                <li><a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-2-2x.jpg" width="190" height="93" alt="1144953 2 2x"></a></li>
                <li><a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-4-2x.jpg" width="190" height="93" alt="1144953 4 2x"></a></li>
                <li><a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-5-2x.jpg" width="190" height="93" alt="1144953 5 2x"></a></li>
                <li><a href="#"><img src="<?php echo base_url() ?>images/video-gallery/1144953-6-2x.jpg" width="190" height="93" alt="1144953 6 2x"></a></li>

            </ul>
        </div>
    </div>    
    <div class="clr"></div>
</div> <div class="clr"></div>
<div class="Botombg"><div id="downbutton"><a href="<?php echo base_url(); ?>home/contact.html" class="buttondown"></a></div></div>
<!--.............................................. END Body Part ...................................................................-->
 <div class="copyright">&copy 2010-2011, Influx IQ Development Group. All rights reserved.</div>
</div><!--wrapper ends-->