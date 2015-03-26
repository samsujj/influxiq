<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/wt-lightbox.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/wt-scroller.css"/>


<script type="text/javascript" src="<?php echo base_url(); ?>jsphotogallery/jquery-ui-1.8.10.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jsphotogallery/jquery.wt-lightbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jsphotogallery/jquery.wt-scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jsphotogallery/preview.js"></script>
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
                    <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/social_pic.png" alt="" /></div>
                    <div class="Botom_left">
                        <?php echo show_msg(); ?>
                        <form id="form6" name="form6" action="" method="post">
                            <table width="100%" cellspacing="5" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top">Have Questions about <span style="color:#16a6b2;">Social</span>?</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <input type="hidden" name="pack" id="pack6" value="InfluxIQ Social" />
                                        <input name="name" id="name6" type="text" class="loginbox" value="Name" onclick="ch1('6')"/>
                                        <?php echo form_error('name'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input name="email" id="email6" type="text" class="loginbox" value="Email" onclick="ch2('6')"/>
                                        <?php echo form_error('email'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><textarea name="comments" id="comments6" cols="" rows="" class="loginarea" onclick="ch3('6')">Questions - Comments</textarea><?php echo form_error('comments'); ?></td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
                                </tr>
                            </table>
                        </form></div>
                </div>

                <div class="SR">
                    <div class="Headingarea_pro">
                        <span class="mainheading"><a name="social">&nbsp;</a>InfluxIQ Social</span> &nbsp; <span class="orangefont">Starting at $6,997</span><br />
                        <p><b>Social 
                                Networks are one of the most powerful ways to stay in constant contact 
                                with your audience. </b>&nbsp;Todays Internet sees over 70% of 
                            website visitors going to one of more social networks a day.&nbsp; This 
                            software brings all the best of this experience.</p>
                    </div>
                    <div class="socialcont">
                        <b>Our Social Network web software comes with all of the 
                            following features plus:</b>
                        <ul>
                            <li>Our
                                technology has been developed to bring all of the expected and 
                                required social networking experience to your users.&nbsp; We 
                                have a sophisticated set of features that brings the feel of 
                                being on a social network like facebook.</li><br />
                            <li>Admins
                                are able to send out newsletters, manage a black list for 
                                inappropriate speech, ban users and if necessary approve all 
                                content from the different content categories.</li><br />
                            <li>Each 
                                of the members are able to friend, chat, blog, add photos, add 
                                video and join groups and forums.&nbsp; You are able to control 
                                how this works for your proprietary system and can add or take 
                                away any of these features.</li><br />
                            <li>The
                                system allows for private and public pages and is fully 
                                integrated with our intelligent page creation system for optimal 
                                search engine placement of your exposed pages.</li><br />
                            <li>This
                                system can be added to any of the other platforms that we have 
                                as well.&nbsp; This makes a great value add to the MLM and the 
                                Affiliate platforms.</li><br />
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
<div class="photo-gallery">
    <div class="feature-photo"></div>

    <div class="clr"></div>

    <div class="gallery-photo">
        <div class="morephoto"></div>

        <!-- Gallery Section start -->
        <div id="gallery" class="toggle_container">
            <div class="container">
                <div class="wt-scroller">
                    <!--<div class="prev-btn"></div>    -->       
                    <div class="slides">
                        <ul>
                            <li>
                                <div>
                                    <a href="<?php echo base_url(); ?>images_product/photo1-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo1.jpg" alt=""/></a><br />
                                    <a href="<?php echo base_url(); ?>images_product/photo7-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo7.jpg" alt=""/></a> 
                                </div>

                            </li>

                            <li>
                                <div>
                                    <a href="<?php echo base_url(); ?>images_product/photo2-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo2.jpg" alt=""/></a><br />
                                    <a href="<?php echo base_url(); ?>images_product/photo8-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo8.jpg" alt=""/></a>  
                                </div>                   
                            </li>

                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo3-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo3.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo9-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo9.jpg" alt=""/></a>   
                                </div>                
                            </li>                                    

                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo4-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo4.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo10-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo10.jpg" alt=""/></a>   
                                </div>                
                            </li>             

                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo5-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo5.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo11-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo11.jpg" alt=""/></a>   
                                </div>                
                            </li>                

                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo6-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo6.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo12-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo12.jpg" alt=""/></a>   
                                </div>                
                            </li>                    
                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo8-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo8.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo2-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo2.jpg" alt=""/></a>   
                                </div>                
                            </li> 
                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo11-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo11.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo1-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo1.jpg" alt=""/></a>   
                                </div>                
                            </li>  
                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo3-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo3.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo7-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo7.jpg" alt=""/></a>   
                                </div>                
                            </li>  
                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo5-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo5.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo10-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo10.jpg" alt=""/></a>   
                                </div>                
                            </li>  
                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo4-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo4.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo12-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo12.jpg" alt=""/></a>   
                                </div>                
                            </li>  
                            <li> 
                                <div>                           
                                    <a href="<?php echo base_url(); ?>images_product/photo6-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo6.jpg" alt=""/></a> <br />
                                    <a href="<?php echo base_url(); ?>images_product/photo1-big.jpg" rel="scroller" target="temp_win"><img src="<?php echo base_url(); ?>images_product/photo1.jpg" alt=""/></a>   
                                </div>                
                            </li>   

                        </ul>
                    </div>              
                    <!--<div class="next-btn"></div> -->
                    <!--<div class="lower-panel"></div> -->
                </div>
            </div>
        </div>     <!-- Gallery Section end -->
    </div> 
    <div class="clr"></div>
</div>
<div class="clr"></div>
<div class="Botombg"><div id="downbutton"><a href="<?php echo base_url(); ?>home/contact.html" class="buttondown"></a></div></div>
<!--.............................................. END Body Part ...................................................................-->
 <div class="copyright">&copy 2010-2011, Influx IQ Development Group. All rights reserved.</div>
</div><!--wrapper ends-->