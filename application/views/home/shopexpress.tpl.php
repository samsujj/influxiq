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
</div><div class="clr"></div>
<div class="pro-details-area">
    <div class="pro-details-topbg"></div>
    <div class="pro-details-bg">
        <div class="pro-details-con">
            <div class="Productparts">
                <div class="SC">
                    <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/sexpres_pic.png" alt="" /></div>
                    <div class="Botom_left">
                        <?php echo show_msg(); ?>
                        <form id="form2" name="form2" action="" method="post">
                            <table width="100%" cellspacing="5" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top">Have Questions about <span style="color:#62a501;">Shop Express</span>?</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <input type="hidden" name="pack" id="pack" value="InfluxIQ Shop Express" />
                                        <input name="name" id="name2" type="text" class="loginbox" value="Name" onclick="ch1('2')"/>
                                        <?php echo form_error('name'); ?>
                                        </td>
                                    
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input name="email" id="email2" type="text" class="loginbox" value="Email" onclick="ch2('2')"/>
                                        <?php echo form_error('email'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><textarea name="comments" id="comments2" cols="" rows="" class="loginarea" onclick="ch3('2')">Questions - Comments</textarea>
                                        <?php echo form_error('comments'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick="" /></td>
                                </tr>
                            </table>
                        </form></div>
                </div>

                <div class="SR">
                    <div class="Headingarea_pro">
                        <span class="mainheading"><a name="sexpres">&nbsp;</a>InfluxIQ Shop Express</span> &nbsp; <span class="orangefont">Starting at $2,497 plus $.10 a transaction</span><br />
                        <p><b>Our Shop Express is the best solution for the small business owner </b>that wants to get their products online. This popular cart application allows you all the luxuries of a real and viable shopping basket for your website visitors. </p>
                    </div>
                    <div class="sexpresscont">
                        <b>Our Shop Express web software comes with all of the following features plus:</b>
                        <ul>
                            <li>You get everything that comes in the Business Standard website. This includes every features that is listed as well as the consulting and creative interview.&nbsp; As an extension of the Business Standard this cart system brings eCommerce to your website.</li><br />
                            <li>You can add products to your site choosing their features, pricing and quantities in stock. This comes with a product administration management system.</li><br />
                            <li>The entire product library has category list and product view options for the website visitors to be able to easily browse the product on your website.</li><br />
                            <li>Each of the products can have an unlimited number of pictures added to them which display in an image gallery right on the product view page.</li><br />
                            <li>The shopping basket that comes with this product allows visitors to enter in their desired products and continue browsing the website and the other products before checking out.</li><br />
                            <li>We will connect your cart to whichever merchant service you have chosen for your business.&nbsp; We are very familiar with Authorize.net, PayPal and several others.</li><br />
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
        </div>
        <!-- Gallery Section end -->
    </div> 
    <div class="clr"></div>
</div>
<div class="clr"></div>
<div class="Botombg"><div id="downbutton"><a href="<?php echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
<!--.............................................. END Body Part ...................................................................-->
 <div class="copyright">© 2010-2011, Influx IQ Development Group. All rights reserved.</div>
</div><!--wrapper ends-->