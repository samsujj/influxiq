<script language="JavaScript">  
            var clip = null;

            function $(id) { return document.getElementById(id); }

            function init() {
                clip = new ZeroClipboard.Client();
                clip.setHandCursor( true );

                clip.addEventListener('load', function (client) {
                    debugstr("Flash movie loaded and ready.");
                });

                clip.addEventListener('mouseOver', function (client) {
                    // update the text on mouse over
                    clip.setText( $('fe_text').value );
                });

                clip.addEventListener('complete', function (client, text) {
                    debugstr("Copied text to clipboard: " + text );
                });

                clip.glue( 'd_clip_button', 'd_clip_container' );
            }

            function debugstr(msg) {
                var p = document.createElement('p');
                p.innerHTML = msg;
                //$('d_debug').appendChild(p);
            }
        </script>
 <body onload="init()">
        <!-- this is the content for the dialog that pops up on window start -->
        <!--<div id="dialog" title="Welcome to Holistic Seek Admin">
           <p>Hello admin! welcome back.<br/> You got <strong>1 new Message</strong> in your inbox</p>
        <p>This is a messagebox, you can fill it with content of your choice ;)</p>
        </div> -->
        
        <div id="top">
        
            <div id="head">
                <h1 class="logo">
                    <a href="<?php echo admin_url() ?>home/index"><img src="<?php echo base_url() ?>images/logo.jpg" alt="" /></a>
                </h1>
                
                <div class="head_memberinfo">
                                         
                    <span class='memberinfo_span'>
                            Welcome <a href="<?php echo admin_url() ?>home/index"><?php echo show_user(); ?></a>                    </span>
                     <span class='memberinfo_span'>
                        <a href="<?php echo base_url() ?>home/index" target="self">Site Frontent</a>                    </span>                                   
                    <span class='memberinfo_span'>
                        <a href="<?php echo admin_url() ?>home/logout">Logout</a>                    </span>
                    <span>
                        <a href="<?php echo admin_url() ?>user/myaccnt/<?php echo strEncode(show_id()); ?>">My Account</a>                    </span>
                                    </div>
                <!--end head_memberinfo-->
                </div>
            <div class="menu_bg">
                <ul>
                    <li><a href="<?php echo admin_url(); ?>home/index" class="<?php echo ($s_menu_id == 'menu_home')?'active':''; ?>">Home</a></li>
                    <li><a href="<?php echo admin_url(); ?>user/listing" class="<?php echo ($s_menu_id == 'menu_user' && $s_sub_menu_id=='list_user')?'active':''; ?>">User Management</a></li>
                    <li><a href="<?php echo admin_url(); ?>affiliate/listingprop" class="<?php echo ($s_menu_id == 'menu_affle' && $s_sub_menu_id=='list_affle' || $s_menu_id == 'menu_affle' && $s_sub_menu_id=='list_affle_track')?'active':''; ?>">Affiliate Management</a></li>
                    <li><a href="<?php echo admin_url(); ?>lead/listingprop" class="<?php echo ($s_menu_id == 'menu_appl' && $s_sub_menu_id=='list_appl')?'active':''; ?>">Lead Management</a></li>
                 <!-- <li><a href="admin_manag.php">Admin Management</a></li>
                  <li><a href="product_manag.php">Product Management</a></li>
                  <li><a href="order_manag.php">Order Management</a></li>
                  <li><a href="category_manag.php">Category Management</a></li> -->
            
                 </ul>
            </div>
  <div id="bg_wrapper">            