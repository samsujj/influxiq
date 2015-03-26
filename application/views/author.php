<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Author Marketing and Design Services with InfluxIQ</title>
        <script type="text/javascript">
         var base_url="<?php echo base_url(); ?>";
        </script>
        <link href="<?php echo base_url(); ?>authskin/css/style.css" type="text/css" rel="stylesheet" media="all" />
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/languages/jquery.validationEngine-en.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>authskin/js/facebox.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>css/validationEngine.jquery.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>authskin/css/facebox.css" type="text/css" />

        <script type="text/javascript">
            var url_main="<?php echo $this->uri->segment(3); ?>";
           
            $(function()
            {
                //  alert(1); 
                $("#author_form").validationEngine();
                $("input[class1]").each(function(i) {
                    $(this).addClass($(this).attr('class1'));
                    $(this).css('color','black');

                }); 

                $("#lyn_but").click(function(){
                    $("#topol_logo").click();

                });

                $("#topol_logo_foot").click(function(){
                    $("#topol_logo").click();

                });

                if(url_main=="success"){
                    //alert(1);
                    $.facebox('<div id="info"><h2><span>Information Sent!</span><br /><br />We will contact you very soon.</h2></div>');
                }


            });



        </script>

        <script type="text/javascript">
            /* use jQuery as container for more convenience */
            (function(cash) {
                /**
                * Create a popunder
                *
                * @param  sUrl Url to open as popunder
                *
                * @return jQuery
                */
                $.popunder = function(sUrl) {
                    var bSimple = $.browser.msie,
                    run = function() {
                        $.popunderHelper.open(sUrl, bSimple);
                    };
                    (bSimple) ? run() : window.setTimeout(run, 1);
                    return $;
                };

                /* several helper functions */
                $.popunderHelper = {
                    /**
                    * Helper to create a (optionally) random value with prefix
                    *
                    * @param  string name
                    * @param  boolean rand
                    *
                    * @return string
                    */
                    rand: function(name, rand) {
                        var p = (name) ? name : 'pu_';
                        return p + (rand === false ? '' : Math.floor(89999999*Math.random()+10000000));
                    },

                    /**
                    * Open the popunder
                    *
                    * @param  string sUrl The URL to open
                    * @param  boolean bSimple Use the simple popunder
                    *
                    * @return boolean
                    */
                    open: function(sUrl, bSimple) {
                        var _parent = self,
                        sToolbar = (!$.browser.webkit && (!$.browser.mozilla || parseInt($.browser.version, 10) < 12)) ? 'yes' : 'no',
                        sOptions,
                        popunder;

                        if (top != self) {
                            try {
                                if (top.document.location.toString()) {
                                    _parent = top;
                                }
                            }
                            catch(err) { }
                        }

                        /* popunder options */
                        sOptions = 'toolbar=' + sToolbar + ',scrollbars=yes,location=yes,statusbar=yes,menubar=no,resizable=1,width=' + 800;
                        sOptions += ',height=' + 600 + ',screenX=0,screenY=0,left=0,top=0';

                        /* create pop-up from parent context */
                        popunder = _parent.window.open(sUrl, $.popunderHelper.rand(), sOptions);
                        if (popunder) {
                            popunder.blur();
                            if (bSimple) {
                                /* classic popunder, used for ie*/
                                window.focus();
                                try { opener.window.focus(); }
                                catch (err) { }
                            }
                            else {
                                /* popunder for e.g. ff4+, chrome */
                                popunder.init = function(e) {
                                    with (e) {
                                        (function() {
                                            if (typeof window.mozPaintCount != 'undefined' || typeof navigator.webkitGetUserMedia === "function") {
                                                var x = window.open('about:blank');
                                                x.close();
                                            }

                                            try { opener.window.focus(); }
                                            catch (err) { }
                                        })();
                                    }
                                };
                                popunder.params = {
                                    url: sUrl
                                };
                                popunder.init(popunder);
                            }
                        }

                        return true;
                    }
                };
            })(jQuery);
            // $(function(){
            //        alert(1);
            //    });
            //   
        </script>



        <script type="text/javascript">
            var popcount1=0;
            var popcount2=0;
            $(function(){
              /*  $("#influx_logo").click(function() {
                    //alert(9);
                    if(popcount1<1)
                        {
                        jQuery.popunder('<?php echo base_url() ?>');


                        popcount1++;
                    }
                });*/
                $("#topol_logo").click(function() {
                    // alert(5);
                    if(popcount2<3)
                        {
                        //jQuery.popunder('http://toponlinedesigns.com/');
						window.open('http://toponlinedesigns.com/');


                        popcount2++;
                    }
                });
            });
        </script>



    </head>
    <?php 
        echo show_msg();
    ?>
    <body>
        <!--header_contain-->
        <div class="header_contain">
            <div class="main_wrapper"> MARKETING <span>AND</span> WEBSITE DESIGN <span>FOR AUTHORS</span>
                <!--   form_top_img-->
                <div class="form_top_img"></div>
                <!--  end  form_top_img-->
            </div>
        </div>
        <!--end header_contain-->
        <!--top_body-->
        <div class="top_body">
            <div class="main_wrapper">
                <!--logo_contain-->
                <div class="logo_contain"> <a id="influx_logo" href="javascript:void(0)"><img src="<?php echo base_url(); ?>authskin/images/influx-logo.png" alt="" border="0" /></a> <a id="topol_logo" href="javascript:void(0)"><img src="<?php echo base_url() ?>authskin/images/toponline-logo.png" alt="" border="0" style="margin:10px 0 0 44px;" /></a>
                    <div class="clear"></div>
                </div>
                <div class="top_heading_text">We Combine An Approach Of</div>
                <!--  top_left_contain-->
                <div class="top_left_contain">
                    <div class="text_list">Web Design</div>
                    <div class="text_list">Social Media Strategy</div>
                    <div class="text_list">Identity & Branding</div>
                    <div class="text_list">Content Development</div>
                    <div class="text_list_last">Author Marketing Services</div>
                    <div class="clear"></div>
                    <!--   graphic_contain-->
                    <div class="graphic_contain"> <img src="<?php echo base_url(); ?>authskin/images/img.png" alt="" /> <img src="<?php echo base_url(); ?>authskin/images/girl_img.png"  alt="" style="margin-left:5px; margin-top:10px;"/>
                        <div class="clear"></div>
                    </div>
                </div>
                <!--  end top_left_contain-->
                <!--top_right_contain-->
                <div class="top_right_contain">
                    <div class="form_top"> ENTER YOUR INFO<br />
                        & </div>
                    <div class="form_main"> <span>we will contact you right away</span><br />
                        <br />
                        <div class="form_wrapper">
                            <?php 
                                echo show_msg();
                            ?>
                            <form id="author_form" action="" method="post">
                                <input type="text" name="fname" id="fname" class="validate[required] text-input" class1="inputbox"  placeholder="First Name" value="<?php echo set_value('fname') ?>"/>
                                <div class="error_text"><?php echo form_error('fname'); ?></div>
                                <input type="text" name="lname" id="lname" class="validate[required] text-input"  class1="inputbox"  placeholder="Last Name" value="<?php echo set_value('lname') ?>"/>
                                <div class="error_text"><?php echo form_error('lname'); ?></div>
                                <input type="text" name="email" id="email" class="validate[required,custom[email]] text-input"  class1="inputbox"  placeholder="Email" value="<?php echo set_value('email') ?>"/>
                                <div class="error_text"><?php echo form_error('email'); ?></div>
                                <select name="state" id="state" class="inputbox2 validate[required]">
                                    <option value="">Please Select a state</option>
                                    <?php echo get_state_name(254,$i_state_id); ?>
                                </select>
                                <div class="error_text"><?php echo form_error('state'); ?></div>
                                <input type="text" name="phone" id="phone" class="inputbox"  placeholder="Telephone" value="<?php echo set_value('phone') ?>"/>
                                <!--<div class="error_text">Input your first name</div>-->
                                <input type="text" name="city" id="city" class="validate[required] text-input"  class1="inputbox"  placeholder="City" value="<?php echo set_value('city') ?>"/>
                                <div class="error_text"><?php echo form_error('city'); ?></div>

                                <input id="submit_but" name="" type="submit"  value="" class="submit"/>
                            </form>
                        </div>
                    </div>
                    <div class="form_footer"></div>
                </div>
                <!--end top_right_contain-->
                <div class="clear"></div>
                <div class="form_arrow">Let Influx IQ Make All The Difference For You!</div>
                <h2>Excel as an Author with our Website Tech, SEE BELOW!</h2>
            </div>
        </div>
        <!--end top_body-->
        <!--middle_body-->
        <div class="middle_body">
            <div class="main_wrapper">
                <div class="left_side">
                    <div class="contain"> <strong> HIGH LEVEL DESIGN</strong> <img src="<?php echo base_url(); ?>authskin/images/design.png" alt="" />
                        <p>The design of your online internet presence has to reflect the integrity of your personal work as an author.  We capture the essence of your vision as a writer and bring it out in the website we design and the identity we create for you. Our skills, combined with your particular style, will make for a perfect web presence.  Let us help your new website shine.</p>
                    </div>
                    <div class="contain"> <strong> MANAGE YOUR EVENTS</strong> <img src="<?php echo base_url(); ?>authskin/images/events.png" alt="" />
                        <p>Having an event calendar will draw in a perspective that you are active and working on your career.  Book signings, events and conventions that you are going to can all be added to your website.  This includes virtual events where you are planning to be available for questions and collaboration. Managing a calendar is very easy with your new website.</p>
                    </div>
                    <div class="contain"> <strong>MANAGE YOUR MARKETING</strong> <img src="<?php echo base_url(); ?>authskin/images/marketing.png" alt="" />
                        <p>We offer some great opportunities through some of our online marketing, press release and social book marketing programs.  We are experts at taking the authorship you have developed and making exciting press about your career.  This is more personal and cost effective than a full service publicist and we take all the time and care you need to promote your work</p>
                    </div>
                </div>
                <div class="right_side">
                    <div class="contain"> <strong> MANAGE YOUR BLOGS</strong> <img src="<?php echo base_url(); ?>authskin/images/blog.png" alt="" />
                        <p>As a writer one of the best ways to connect with your fans, fellow authors, and industry professionals is directly, through your personal blog.  It is important that you put your personality and point of view into words, beyond your work as an author. Fans love reading the blog of their favorite authors and feeling like they have an intimate connection with their life.</p>
                    </div>
                    <div class="contain"> <strong> MANAGE&nbsp;YOUR&nbsp;SOCIAL&nbsp;MEDIA&nbsp;TOOLS</strong> <img src="<?php echo base_url(); ?>authskin/images/social_media.png" alt="" />
                        <p>Social Media is critical to having a successful online web presence.  Social sites are at the top of the most visited on the internet.  For an author, social media sites, like Facebook, can be an effective set of tools to connect with your fan base. We make connecting with your fans over social media very simple and direct. </p>
                    </div>
                    <div class="contain"> <strong>MANAGE YOUR MEDIA</strong> <img src="<?php echo base_url(); ?>authskin/images/media.png" alt="" />
                        <p>You can put so much more into your website than you would expect! If you have video or any pictures that you would like to add, you can do all of that on your new site.  Adding video and pictures of you as a writer brings flare and life to your web presence. You can even add video to YouTube then create a library right on your site!</p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!--end middle_body-->
        <!--bottom_body-->
        <div class="bottom_body">
            <div class="main_wrapper">
                <p>Views from <span>RomanceNovelsbyLyn.com</span>, a perfect example of our work!</p>
                <img src="<?php echo base_url(); ?>authskin/images/lyn_img1.png"  alt=""/> <img src="<?php echo base_url(); ?>authskin/images/lyn_img2.png"  alt=""/> <img src="<?php echo base_url(); ?>authskin/images/lyn_img3.png"  alt=""/> <img src="<?php echo base_url(); ?>authskin/images/lyn_img4.png"  alt=""/>
                <div class="footer_btn"><a id="lyn_but" href="javascript:void(0)">CLICK HERE TO SEE OUR WORK</a></div>
            </div>
        </div>
        <!--end bottom_body-->
        <!--footer-->
        <div class="footer">
            <div class="main_wrapper"> <a id='topol_logo_foot' href="javascript:void(0)"><img src="<?php echo base_url(); ?>authskin/images/toponline-footer-logo.png"  alt="" style="float:left;" /></a>
                <div class="socal_icon_contain"> <a href="#"><img src="<?php echo base_url(); ?>authskin/images/s_icon1.png" /></a> <a href="#"><img src="<?php echo base_url(); ?>authskin/images/s_icon2.png" /></a> <a href="#"><img src="<?php echo base_url(); ?>authskin/images/s_icon3.png" /></a> <a href="#"><img src="<?php echo base_url(); ?>authskin/images/s_icon4.png" /></a>
                    <div class="clear"></div>
                </div>
                <a href="#"><img src="<?php echo base_url(); ?>authskin/images/influx-footer-logo.png"  alt="" style="float:left;" /></a>
                <div class="clear"></div>
                <p> &copy; 2013 Influx IQ  All Rights Reserved. </p>
            </div>
        </div>

        <!-- end footer-->
        <div id="info" style="display:none;"> 
            <h2><span>Congratulations! </span><br /><br />

                You have successfully completed your registration</h2>

        </div>
    </body>
</html>

