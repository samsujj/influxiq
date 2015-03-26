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
</div><div class="clr"></div>
<div class="pro-details-area">
    <div class="pro-details-topbg"></div>
    <div class="pro-details-bg">
        <div class="pro-details-con">
            <div class="Productparts">
                <div class="SC">
                    <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/mlaunch_pic.png" alt="" /></div>
                    <div class="Botom_left">
                        <?php echo show_msg(); ?>
                        <form id="form4" name="form4" action="" method="post">
                            <table width="100%" cellspacing="5" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top">Have Questions about <span style="color:#ed4700;">Market Launch</span>?</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <input type="hidden" name="pack" id="pack4" value="InfluxIQ Market Launch" />
                                        <input name="name" id="name4" type="text" class="loginbox" value="Name" onclick="ch1('4')"/>
                                        <?php echo form_error('name'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input name="email" id="email4" type="text" class="loginbox" value="Email" onclick="ch2('4')"/><?php echo form_error('email'); ?>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><textarea name="comments" id="comments4" cols="" rows="" class="loginarea" onclick="ch3('4')">Questions - Comments</textarea><?php echo form_error('comments'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" /></td>
                                </tr>
                            </table>
                        </form></div>
                </div>

                <div class="SR">
                    <div class="Headingarea_pro">
                        <span class="mainheading"><a name="mlaunch">&nbsp;</a>InfluxIQ Market Launch</span> &nbsp; <span class="orangefont">Starting at $3,997 plus $.10 a 
                            transaction</span><br />
                        <p>The Market Launch web software package is a very powerful 
                            platform.&nbsp; </span>For the website owner that wants to really push 
                            hard and take a very active role in their website this is the platform 
                            to get.&nbsp; This system is made to make a serious impact on the WWW.</p>
                    </div>
                    <div class="mlaunchcont">
                        <b>Our Business Standard web software comes with all of the 
                            following features plus:</b>
                        <ul>
                            <li>You
                                get everything that comes in the Business Standard, Shop Express 
                                and the Shop Deluxe website. This includes every features that 
                                is listed as well as the consulting and creative interview.&nbsp; 
                                This is our premium eCommerce web enterprise edition.</li><br />
                            <li>This
                                platform comes with a&nbsp; 
                                funnel system is a must for any company that is working to capture the 
                                attention of a visitor through paid search or affiliate 
                                advertising. The funnel is a media presentation that 
                                starts with a landing page and then steps through incentives and 
                                then to a purchase or a lead capture.</li><br />
                            <li>Additionally
                                you will receive 3 custom landing pages that work through this 
                                lead system bringing you potential customers based on specified 
                                inbound marketing methods.&nbsp; These landing pages can be a 
                                subset of your URL or have their own unique url.</li><br />
                            <li>This
                                system comes with the ability to publish your products over 20 
                                different online web aggregate sites including Craig&#39;s, 
                                Google product search and Google base.&nbsp; Through this methodology 
                                you get additional marketing per product.</li><br />
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