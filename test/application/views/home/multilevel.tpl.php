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
    <li <?php echo ($page_active=='product_details')?"class='nobg'":""; ?>><a href="<?php echo base_url() ?>home/productdetails.html">Business Standard</a></li>        
    <li <?php echo ($page_active=='proexpress')?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/shopexpress.html">Shop Express</a></li>          
    <li <?php echo ($page_active=='shopdelux')?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/shopdelux.html">Shop Deluxe</a></li>         
    <li <?php echo ($page_active=='market_launch')?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/marketlaunch.html">Market Launch</a></li>         
    <li <?php echo ($page_active=='pro_affiliate')?"class='nobg'":""; ?>><a href="<?php echo base_url() ?>home/proaffiliate.html">Affiliate</a></li>          
    <li <?php echo ($page_active=='prosocial')?"class='nobg'":""; ?>><a href="<?php echo base_url() ?>home/prosocial.html">Social</a></li>         
    <li <?php echo ($page_active=='multilevel')?"class='nobg'":""; ?>><a href="<?php echo base_url() ?>home/multilevel.html">Multi-Level</a></li>
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
                    <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/level_pic.png" alt="" /></div>
                    <div class="Botom_left">
                        <?php echo show_msg(); ?>
                        <form id="form7" name="form7" action="" method="post">
                            <table width="100%" cellspacing="5" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top">Have Questions about <span style="color:#a73dfe;">Multi-Level</span>?</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multi-Level" />
                                        <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                        <?php echo form_error('name'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>

                                    <?php echo form_error('email'); ?></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                                        <?php echo form_error('comments'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
                                </tr>
                            </table>
                        </form></div>
                </div>

                <div class="SR">
                    <div class="Headingarea_pro">
                        <span class="mainheading"><a name="level">&nbsp;</a>InfluxIQ Multi-Level</span> &nbsp; <span class="orangefont">Starting at $14,997 + &nbsp;$.10 a 
                            transaction / $1 per active user per month</span><br />
                        <p><b>Our Multi-Level Network Marketing 
                                platform is one powerful system. </b>This program is the top of the 
                            list as far as our marketing platforms are concerned. We work with you 
                            to develop not just the software but a program that will be successful 
                            with the right compensation plan in place.</p>
                    </div>
                    <div class="mlevelcont">
                        <b>Our Multi-Level web software comes with all of the 
                            following features plus:</b>
                        <ul>
                            <li>You
                                get everything that comes in the Business Standard, Shop Express, Shop Deluxe, 
                                Market Launch and Affiliate website. This includes every 
                                features that is listed as well as the consulting and creative 
                                interview.&nbsp; This is our highest grade marketing system.</li><br />
                            <li>Our
                                multi-level systems have everything required for a distributor 
                                back office. This includes the graphic entry, training system 
                                and access to a more sophisticated leads management system.</li><br />
                            <li>We
                                are able to work with binary or uni-level compensation plans.&nbsp; 
                                We are able to code a custom compensation plan for your company.&nbsp; 
                                We can help with the consulting on this if that is needed as 
                                well. The first 40 hours of writing the compensation plan is 
                                included in this package.</li><br />
                            <li>The
                                system comes with a lead store that allows you to turn retail 
                                customers into distributors.&nbsp; This is unique to our program 
                                and is very lucrative for running online marketing campaigns to 
                                generate sales.</li><br />
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
<div class="Botombg"><div id="downbutton"><a href="<?php echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
<!--.............................................. END Body Part ...................................................................-->
 <div class="copyright">&copy 2010-2011, Influx IQ Development Group. All rights reserved.</div>
</div><!--wrapper ends-->