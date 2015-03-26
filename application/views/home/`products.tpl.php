<link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/validationEngine.jquery.css" type="text/css" media="screen"/>
<link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/jquery-ui.css" type="text/css" media="screen"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/languages/jquery.validationEngine-en.js"></script>

<script>
    $(function()
    {
        //  alert(1); 
        $("input[class1]").each(function (i) {
            //  $(this).addClass($(this).attr('class1'));
            //  $(this).css('color','black');

        }); 
    });

    //alert(jQuery("strong").text());



    //jQuery("a").remove(":contains('&nbsp;')");

</script>

<script>
    jQuery(document).ready(function(){
        // binds form submission and fields to the validation engine
        jQuery("#formID").validationEngine();
    });

    /**
    *
    * @param {jqObject} the field where the validation applies
    * @param {Array[String]} validation rules for this field
    * @param {int} rule index
    * @param {Map} form options
    * @return an error string if validation failed
    */


</script>

<div class="HEADER_product">
    <div class="LOGO_product"><a href="index.html" target="_self"><img src="<?php echo base_url(); ?>images_product/logo.png" alt="" border="0" /></a></div>
    <div class="Socialpic"></div>
</div>
<div class="clr"></div>


<div class="Quickmenuarea"><div class="Quickmenu"><table width="100%" align="center" cellpadding="0" cellspacing="7">
            <tr>
                <td align="center" valign="middle"><a href="#bstandard" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','<?php echo base_url(); ?>images_product/bstandard_hov.png',1)"><img src="<?php echo base_url(); ?>images_product/bstandard.png" name="Image2" width="150" height="63" border="0" id="Image2" /></a></td>
                <td align="center" valign="middle"><a href="#sexpres" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','<?php echo base_url(); ?>images_product/sexpres_hov.png',1)"><img src="<?php echo base_url(); ?>images_product/sexpres.png" name="Image3" width="109" height="59" border="0" id="Image3" /></a></td>
                <td align="center" valign="middle"><a href="#sdeluxe" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','<?php echo base_url(); ?>images_product/sdeluxe_hov.png',1)"><img src="<?php echo base_url(); ?>images_product/sdeluxe.png" name="Image4" width="107" height="59" border="0" id="Image4" /></a></td>
                <td align="center" valign="middle"><a href="#mlaunch" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','<?php echo base_url(); ?>images_product/mlaunch_hov.png',1)"><img src="<?php echo base_url(); ?>images_product/mlaunch.png" name="Image5" width="122" height="60" border="0" id="Image5" /></a></td>
                <td align="center" valign="middle"><a href="#affiliate" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','<?php echo base_url(); ?>images_product/affiliate_hov.png',1)"><img src="<?php echo base_url(); ?>images_product/affiliate.png" name="Image6" width="62" height="63" border="0" id="Image6" /></a></td>
                <td align="center" valign="middle"><a href="#social" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','<?php echo base_url(); ?>images_product/social_hov.png',1)"><img src="<?php echo base_url(); ?>images_product/social.png" name="Image7" width="47" height="60" border="0" id="Image7" /></a></td>
                <td align="center" valign="middle"><a href="#level" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','<?php echo base_url(); ?>images_product/level_hov.png',1)"><img src="<?php echo base_url(); ?>images_product/level.png" name="Image8" width="91" height="54" border="0" id="Image8" /></a></td>
            </tr>
        </table>
    </div></div>
<div class="clr"></div>
<div style="width:800px; height:200px; margin:0 80px;"><img src="<?php echo base_url() ?>images/hostingfree.png"><p>If you buy a 12 month SEO Web Marketing Contract and the platform costs of any of the Web Marketing Systems is waved.  All you do is pay our installation fee!</p>

</div>
<div class="clr"></div>
<div class="CON">

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/bstandard_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Business Standard')?show_msg():""; ?>
                <form  name="form1" class="new" method="post" id="formID" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Business Standard</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack1" value="InfluxIQ Business Standard" />
                                <input name="name" id="name1" type="text" class="loginbox" value="Name" onclick="ch1('1')"/>
                                <div <?php echo ($form_name!='InfluxIQ Business Standard')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email1" type="text" class="loginbox" value="Email" onclick="ch2('1')"/>                                       
                                <div <?php echo ($form_name!='InfluxIQ Business Standard')?"style='display: none;'":"";  ?>>

                                    <?php echo form_error('email'); ?>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea type="textarea" name="comments" id="comments1" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea>
                                <div <?php echo ($form_name!='InfluxIQ Business Standard')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('comments'); ?>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
                </form></div>
        </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="bstandard">&nbsp;</a>InfluxIQ Business Standard</span> &nbsp; <span class="orangefont">Starting at $997</span><br />
                <p><b>Our 
                        business standard edition has all of the features that you would expect</b>
                    for a professionally created website. Take advantage of our analytics 
                    and customer communications portions making your inbound marketing needs 
                    potent and successful.</p>
            </div>
            <div class="bstanderdcont">
                <b>Our Business Standard web software comes with all of the 
                    following features plus:</b>
                <ul>
                    <li>When you purchase our business standard you get a complete consultation starting with a full discovery and creative interview with our professional staff to determine the best possible build for your new website.</li><br />
                    <li>Our custom web page editor makes it easy to edit all of the pages of the website. Everywhere we set up text you are able to add and make changes.</li><br />
                    <li>Add new pages easily to enhance the content beyond the pages that we create with a user friendly management portal you can log into securely.</li><br />
                    <li>Create content with the website blog and then share your posts through RSS and a variety of social media sites including facebook, twitter and Google+.</li><br />
                    <li>Take advantage of our standard inbound marketing system that allows you to take leads that come into your website and monetize them.</li><br />
                    <li>Every one of our websites comes with a search engine submission service and a primer SEO package to get your web presence kick started.</li><br />
                </ul>
            </div>
            <div class="Click_btn"><a href="<?php echo base_url(); ?>home/productdetails.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/sexpres_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Shop Express')?show_msg():""; ?>
                <form id='form2' name="form2" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Shop Express</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack1" value="InfluxIQ Shop Express" />
                                <input name="name" id="name2" type="text" class="loginbox" value="Name" onclick="ch1('2')"/>
                                <div <?php echo ($form_name!='InfluxIQ Shop Express')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email2" type="text" class="loginbox" value="Email" onclick="ch2('2')"/>
                                <div <?php echo ($form_name!='InfluxIQ Shop Express')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('email'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments2" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea>
                                <div <?php echo ($form_name!='InfluxIQ Shop Express')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('comments'); ?>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

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
            <div class="Click_btn"><a href="<?php echo base_url(); ?>home/shopexpress.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/sdeluxe_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Shop Deluxe')?show_msg():""; ?>
                <form id='form3' name="form3" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Shop Delux</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack3" value="InfluxIQ Shop Deluxe" />
                                <input name="name" id="name3" type="text" class="loginbox" value="Name" onclick="ch1('3')"/>
                                <div <?php echo ($form_name!='InfluxIQ Shop Deluxe')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email3" type="text" class="loginbox" value="Email" onclick="ch2('3')"/>
                              <div <?php echo ($form_name!='InfluxIQ Shop Deluxe')?"style='display: none;'":"";  ?>>
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                          
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments3" cols="" rows="" class="loginarea" onclick="ch3('3')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Shop Deluxe')?"style='display: none;'":"";  ?>>                                 
                                <?php echo form_error('comments'); ?>
                            </div>
                            
                            </td>
                               
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>       </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="sdeluxe">&nbsp;</a>InfluxIQ Shop Deluxe</span> &nbsp; <span class="orangefont">Starting at $2,997 plus $.10 a transaction</span><br />
                <p><b>Shop 
                        Deluxe is made for the cart owner that is serious about their eCommerce 
                        web store</b>. We have added in a number of dynamic and powerful 
                    features to this system that make the online shopping experience second 
                    to none.</p>
            </div>
            <div class="deluxecont">
                <b>Our Shop Deluxe web software comes with all of the following 
                    features plus:</b>
                <ul>
                    <li>You
                        get everything that comes in the Business Standard and the Shop 
                        Express website. This includes every features that is listed as 
                        well as the consulting and creative interview.&nbsp; This is a 
                        heavy hitter for an online web store.</li><br />
                    <li>With
                        this version of the cart there are several additional features 
                        that come with each of the products.&nbsp; These include special 
                        pricing, feature products on the homepage, suggested products 
                        during purchase and adding products as attributes.</li><br />
                    <li>Customers
                        are able to create accounts, sign up for product updates and 
                        view any of their purchases and past invoices at any time.</li><br />
                    <li>With 
                        this cart software customers can add things to their wish list, 
                        rate products that are on the website and if allowed make 
                        comments on purchased items.</li><br />
                    <li>If you 
                        are working with International currency and selling globally 
                        this cart system is definitely the right choice. We are able to 
                        convert currency right in the check out process allowing global 
                        visitors to see their costs in their own currency.</li><br />
                </ul>
            </div>
            <div class="Click_btn"><a href="<?php echo base_url(); ?>home/shopdelux.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/mlaunch_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Market Launch')?show_msg():""; ?>
                <form id='form4' name="form4" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Market Launch</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack4" value="InfluxIQ Market Launch" />
                                <input name="name" id="name4" type="text" class="loginbox" value="Name" onclick="ch1('4')"/>
                                <div <?php echo ($form_name!='InfluxIQ Market Launch')?"style='display: none;'":"";  ?>>                       
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email4" type="text" class="loginbox" value="Email" onclick="ch2('4')"/>
                            <div <?php echo ($form_name!='InfluxIQ Market Launch')?"style='display: none;'":"";  ?>>
                                <?php echo form_error('email'); ?>
                            </div>    
                            
                            </td>

                             
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments4" cols="" rows="" class="loginarea" onclick="ch3('4')">Questions - Comments</textarea>
                            <div <?php echo ($form_name!='InfluxIQ Market Launch')?"style='display: none;'":"";  ?>> 
                                <?php echo form_error('comments'); ?>
                            </div>
                            
                            </td>
                            
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="mlaunch">&nbsp;</a>InfluxIQ Market Launch</span> &nbsp; <span class="orangefont">Platform cost $3,997 Installation $500 plus $.10 a transaction</span><br />
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
            <div class="Click_btn"><a href="<?php echo base_url(); ?>home/marketlaunch.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/affiliate_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Affiliate')?show_msg():""; ?>
                <form id='form5' name="form5" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Affiliate</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack5" value="InfluxIQ Affiliate" />
                                <input name="name" id="name5" type="text" class="loginbox" value="Name" onclick="ch1('5')"/>
                                <div <?php echo ($form_name!='InfluxIQ Affiliate')?"style='display: none;'":"";  ?>> 
                                    <?php echo form_error('name'); ?>
                                </div>  
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email5" type="text" class="loginbox" value="Email" onclick="ch2('5')"/>
                            <div <?php echo ($form_name!='InfluxIQ Affiliate')?"style='display: none;'":"";  ?>> 
                                <?php echo form_error('email'); ?>
                            </div> 
                            </td>
                                    
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments5" cols="" rows="" class="loginarea" onclick="ch3('5')">Questions - Comments</textarea>
                            <div <?php echo ($form_name!='InfluxIQ Affiliate')?"style='display: none;'":"";  ?>>     
                                <?php echo form_error('comments'); ?>
                            </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="affiliate">&nbsp;</a>InfluxIQ Affiliate</span> &nbsp; <span class="orangefont">Platform cost $5,997 Installation $500 + $.10 a transaction / $1.50 per active user per month</span><br />
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
            <div class="Click_btn"><a href="<?php echo base_url(); ?>home/proaffiliate.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/social_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Social')?show_msg():""; ?>
                <form id='form6' name="form6" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                       <!-- <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Social</span>?</td>
                        </tr>-->
                       <!-- <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack6" value="InfluxIQ Social" />
                                <input name="name" id="name6" type="text" class="loginbox" value="Name" onclick="ch1('6')"/>
                                <div <?php echo ($form_name!='InfluxIQ Social')?"style='display: none;'":"";  ?>>  
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>-->
                        <!--<tr>
                            <td align="left" valign="top"><input name="email" id="email6" type="text" class="loginbox" value="Email" onclick="ch2('6')"/>
                            <div <?php echo ($form_name!='InfluxIQ Social')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                     
                        </tr>-->
                        <!--<tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments6" cols="" rows="" class="loginarea" onclick="ch3('6')">Questions - Comments</textarea>
                            <div <?php echo ($form_name!='InfluxIQ Social')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('comments'); ?>
                            </div>  
                            </td>
                            
                        </tr>-->
                        <!--<tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>-->
                    </table>
            </form></div>        </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="social">&nbsp;</a>Influxiq Media Broadcast</span> &nbsp; <span class="orangefont">Platform cost $6,997 Installation $1,000 (Usually has customization, done by quote)</span><br />
                <p><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
            <div class="socialcont">
                <b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</b>
                <ul>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><br />
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><br />
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><br />
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><br />
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li><br />
                </ul>
            </div>
            <div class="Click_btn"><a href="#" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>

  <!--  <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/level_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">CRM</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('comments'); ?>
                            </div> 
                            </td>
                              
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a>InfluxIQ CRM</span> &nbsp; <span class="orangefont">Platform Cost $14,997 Installation $2,500 +  50/50 rev share on marketer subscriptions</span><br />
                <p><b>Our CRM 
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
            <div class="Click_btn"><a href="<?php echo base_url() ?>home/multilevel.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>
    -->
    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/designp_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Design Packages</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('comments'); ?>
                            </div> 
                            </td>
                              
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a>Design Packages - Basic</span> &nbsp; <span class="orangefont">5 - 7 pages- $997 (Coding only $397)</span><br />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vestibulum risus. Maecenas id enim sed mi consectetur eleifend. Mauris enim enim, sodales non varius nec, hendrerit vitae quam. Quisque venenatis ante vitae neque varius sit amet lacinia est fringilla. Maecenas placerat sodales iaculis. Duis euismod pretium lacinia. Duis in dui lorem. Morbi elit tellus, eleifend quis viverra id, tristique vel nibh. Cras vel justo nunc, eget sagittis massa. In vitae odio non erat laoreet tempor at auctor ligula. <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit fringilla ipsum ac ultrices. Etiam aliquet, metus in tincidunt tincidunt, risus nisi aliquet turpis, cursus vestibulum ligula eros nec ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec in nunc diam, rhoncus dapibus neque. Phasellus ut malesuada enim. Nam sit amet est et quam volutpat egestas. Morbi sollicitudin elit in augue rutrum porttitor at eget est. Pellentesque pretium dolor arcu, sit amet suscipit quam. Suspendisse sit amet ligula orci, vitae molestie nibh. Maecenas ut felis eu nulla suscipit feugiat sit amet et augue.</p>
            </div>

            <div class="Click_btn"><a href="<?php echo base_url() ?>home/multilevel.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>    


    <div class="clr"></div>

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/designp_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Design Packages</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('comments'); ?>
                            </div> 
                            </td>
                              
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a>Design Packages - Advanced</span> &nbsp; <span class="orangefont">7 - 15 pages- $1,497 (Coding only $597)</span><br />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vestibulum risus. Maecenas id enim sed mi consectetur eleifend. Mauris enim enim, sodales non varius nec, hendrerit vitae quam. Quisque venenatis ante vitae neque varius sit amet lacinia est fringilla. Maecenas placerat sodales iaculis. Duis euismod pretium lacinia. Duis in dui lorem. Morbi elit tellus, eleifend quis viverra id, tristique vel nibh. Cras vel justo nunc, eget sagittis massa. In vitae odio non erat laoreet tempor at auctor ligula. <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit fringilla ipsum ac ultrices. Etiam aliquet, metus in tincidunt tincidunt, risus nisi aliquet turpis, cursus vestibulum ligula eros nec ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec in nunc diam, rhoncus dapibus neque. Phasellus ut malesuada enim. Nam sit amet est et quam volutpat egestas. Morbi sollicitudin elit in augue rutrum porttitor at eget est. Pellentesque pretium dolor arcu, sit amet suscipit quam. Suspendisse sit amet ligula orci, vitae molestie nibh. Maecenas ut felis eu nulla suscipit feugiat sit amet et augue.</p>
            </div>

            <div class="Click_btn"><a href="<?php echo base_url() ?>home/multilevel.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>    


    <div class="clr"></div>   

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/designp_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Design Packages</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('comments'); ?>
                            </div> 
                            </td>
                              
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a>Design Packages - Premium</span> &nbsp; <span class="orangefont">15 - 25 pages-  $1,997 (Coding only $797)</span><br />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vestibulum risus. Maecenas id enim sed mi consectetur eleifend. Mauris enim enim, sodales non varius nec, hendrerit vitae quam. Quisque venenatis ante vitae neque varius sit amet lacinia est fringilla. Maecenas placerat sodales iaculis. Duis euismod pretium lacinia. Duis in dui lorem. Morbi elit tellus, eleifend quis viverra id, tristique vel nibh. Cras vel justo nunc, eget sagittis massa. In vitae odio non erat laoreet tempor at auctor ligula. <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit fringilla ipsum ac ultrices. Etiam aliquet, metus in tincidunt tincidunt, risus nisi aliquet turpis, cursus vestibulum ligula eros nec ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec in nunc diam, rhoncus dapibus neque. Phasellus ut malesuada enim. Nam sit amet est et quam volutpat egestas. Morbi sollicitudin elit in augue rutrum porttitor at eget est. Pellentesque pretium dolor arcu, sit amet suscipit quam. Suspendisse sit amet ligula orci, vitae molestie nibh. Maecenas ut felis eu nulla suscipit feugiat sit amet et augue.</p>
            </div>

            <div class="Click_btn"><a href="<?php echo base_url() ?>home/multilevel.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>    


    <div class="clr"></div>
    
    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/designp_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Design Packages</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('comments'); ?>
                            </div> 
                            </td>
                              
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a>Design Packages - Landing Page Set</span> &nbsp; <span class="orangefont">$1,297 lead (Coding only $397)</span><br />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vestibulum risus. Maecenas id enim sed mi consectetur eleifend. Mauris enim enim, sodales non varius nec, hendrerit vitae quam. Quisque venenatis ante vitae neque varius sit amet lacinia est fringilla. Maecenas placerat sodales iaculis. Duis euismod pretium lacinia. Duis in dui lorem. Morbi elit tellus, eleifend quis viverra id, tristique vel nibh. Cras vel justo nunc, eget sagittis massa. In vitae odio non erat laoreet tempor at auctor ligula. <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit fringilla ipsum ac ultrices. Etiam aliquet, metus in tincidunt tincidunt, risus nisi aliquet turpis, cursus vestibulum ligula eros nec ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec in nunc diam, rhoncus dapibus neque. Phasellus ut malesuada enim. Nam sit amet est et quam volutpat egestas. Morbi sollicitudin elit in augue rutrum porttitor at eget est. Pellentesque pretium dolor arcu, sit amet suscipit quam. Suspendisse sit amet ligula orci, vitae molestie nibh. Maecenas ut felis eu nulla suscipit feugiat sit amet et augue.</p>
            </div>

            <div class="Click_btn"><a href="<?php echo base_url() ?>home/multilevel.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>    


    <div class="clr"></div>        

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/designp_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Design Packages</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('comments'); ?>
                            </div> 
                            </td>
                              
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a>Design Packages - Landing Page Set</span> &nbsp; <span class="orangefont">$1,497 purchase (Coding only $497)</span><br />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vestibulum risus. Maecenas id enim sed mi consectetur eleifend. Mauris enim enim, sodales non varius nec, hendrerit vitae quam. Quisque venenatis ante vitae neque varius sit amet lacinia est fringilla. Maecenas placerat sodales iaculis. Duis euismod pretium lacinia. Duis in dui lorem. Morbi elit tellus, eleifend quis viverra id, tristique vel nibh. Cras vel justo nunc, eget sagittis massa. In vitae odio non erat laoreet tempor at auctor ligula. <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit fringilla ipsum ac ultrices. Etiam aliquet, metus in tincidunt tincidunt, risus nisi aliquet turpis, cursus vestibulum ligula eros nec ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec in nunc diam, rhoncus dapibus neque. Phasellus ut malesuada enim. Nam sit amet est et quam volutpat egestas. Morbi sollicitudin elit in augue rutrum porttitor at eget est. Pellentesque pretium dolor arcu, sit amet suscipit quam. Suspendisse sit amet ligula orci, vitae molestie nibh. Maecenas ut felis eu nulla suscipit feugiat sit amet et augue.</p>
            </div>

            <div class="Click_btn"><a href="<?php echo base_url() ?>home/multilevel.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>    


    <div class="clr"></div>

    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>images_product/designp_pic.png" alt="" /></div>
            <div class="Botom_left">
                <?php echo ($form_name=='InfluxIQ Multilevel')?show_msg():""; ?>
                <form id='form7' name="form7" method="post" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Design Packages</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack7" value="InfluxIQ Multilevel" />
                                <input name="name" id="name7" type="text" class="loginbox" value="Name" onclick="ch1('7')"/>
                                <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email7" type="text" class="loginbox" value="Email" onclick="ch2('7')"/>
                            <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>   
                                <?php echo form_error('email'); ?>
                            </div>
                            </td>
                                
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea name="comments" id="comments7" cols="" rows="" class="loginarea" onclick="ch3('7')">Questions - Comments</textarea>
                             <div <?php echo ($form_name!='InfluxIQ Multilevel')?"style='display: none;'":"";  ?>>  
                                <?php echo form_error('comments'); ?>
                            </div> 
                            </td>
                              
                        </tr>
                        <tr>
                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2" onclick=""/></td>
                        </tr>
                    </table>
            </form></div>         </div>

        <div class="SR">
            <div class="Headingarea_pro">
                <span class="mainheading"><a name="level">&nbsp;</a>Design Packages - Web Tour Funnel</span> &nbsp; <span class="orangefont">$1,697 (Coding only $597)</span><br />
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vestibulum risus. Maecenas id enim sed mi consectetur eleifend. Mauris enim enim, sodales non varius nec, hendrerit vitae quam. Quisque venenatis ante vitae neque varius sit amet lacinia est fringilla. Maecenas placerat sodales iaculis. Duis euismod pretium lacinia. Duis in dui lorem. Morbi elit tellus, eleifend quis viverra id, tristique vel nibh. Cras vel justo nunc, eget sagittis massa. In vitae odio non erat laoreet tempor at auctor ligula. <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit fringilla ipsum ac ultrices. Etiam aliquet, metus in tincidunt tincidunt, risus nisi aliquet turpis, cursus vestibulum ligula eros nec ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec in nunc diam, rhoncus dapibus neque. Phasellus ut malesuada enim. Nam sit amet est et quam volutpat egestas. Morbi sollicitudin elit in augue rutrum porttitor at eget est. Pellentesque pretium dolor arcu, sit amet suscipit quam. Suspendisse sit amet ligula orci, vitae molestie nibh. Maecenas ut felis eu nulla suscipit feugiat sit amet et augue.</p>
            </div>

            <div class="Click_btn"><a href="<?php echo base_url() ?>home/multilevel.html" target="_self">Click Here To View Details</a></div>
            <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>
        </div>
        <div class="dotline"></div>
    </div>    

    <div class="Additionalbg"><a name="webadd">&nbsp;</a>
        <p align="center" style="padding-top:10px;"><span class="mainheading">- The following feature packed modules come with every platform -</span><br />
            <span class="orangefont">Web Additions $9.97 monthly | Paid User additions $1.50 / active user per month</span></p>
    </div>

    <div class="clr"></div>

    <div class="Productparts">
        <div class="mainheading2">- <span style="color:#ff8406;">Web Additions</span> -</div>
        <div class="B2top"><a href="#top">Back to top</a> <span style="color:#ff8406;">?</span></div>

        <div class="Smalliconcontarea"><table width="100%" cellspacing="5" cellpadding="0">
                <?php /*<tr>
                    <td align="left" valign="top"><img src="<?php echo base_url(); ?>images_product/mobile_icon.png" alt="" align="absmiddle" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Mobile Web Addition -</b></span> This addition allows website 
                        visitors to view your site in a mobile environment in a way that is 
                        created to browse appropriately. Although our sites run fine in mobile 
                        browsers this allows better access to your web content.&nbsp; This is a 
                        separate cost to set up, but then only runs the normal web addition 
                        package price after implementation.</td>
                </tr>*/?>
                <tr>
                    <td align="left" valign="top"><img src="<?php echo base_url(); ?>images_product/gallery_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Image Gallery Package -</b></span>This 
                        allows you to add and run any number of image galleries on your website.&nbsp; 
                        You can add captions, comments to each of the pictures and have users 
                        comment on the pictures as well.&nbsp; This is a great addition to any 
                        of the websites that you are running.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php echo base_url(); ?>images_product/utube_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>YouTube Aggregator -</b></span> This is a 
                        great little tool. You can add a video library using You-Tube right here 
                        on your website.&nbsp; This includes create categories and 
                        subcategories.&nbsp; This is a great combination to add with a You-Tube 
                        channel or to just showcase You-Tube videos that you like. Once on your 
                        site visitors can comment and you can add in your own comments as well.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php echo base_url(); ?>images_product/video_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Simple Video Library -</b></span> With 
                        this you are able to upload raw video files of most any type to your 
                        website.&nbsp; You are limited to 10 minute videos with this package but 
                        they will all come out high quality as long as you start with a high 
                        quality video to begin with.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php echo base_url(); ?>images_product/smedia_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Full Social Media Package -</b></span> This is a full integration with twitter and facebook for your website.&nbsp; 
                        Although we offer share tools for all of our packages this will connect 
                        you directly to social media unlike anything else.&nbsp; Along with this 
                        we suggest having us build a custom facebook fan page.&nbsp; Prices vary 
                        on this but it is very affordable.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php echo base_url(); ?>images_product/visitor_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Visitor Forum -</b></span> The visitor 
                        forum allows your websites visitors to make a very basic profile and 
                        then collaborate directly on the website.&nbsp; Our share tools are 
                        fully integrated with the forum and subjects and posts can be shared 
                        with all of the more popular social media applications.</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clr"></div>

</div>
<div class="clr"></div>

<div class="Botombg"><div id="downbutton"><a href="<?php echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
<!--.............................................. END Body Part ...................................................................-->
 <div class="copyright">&copy 2010-2011, Influx IQ Development Group. All rights reserved.</div>