
<div id="sidebar">                   
                    <ul class="nav">
                    
                        <li><a class="headitem item8" href="#">User Management</a>
                            <ul class=<?php echo ($s_menu_id == 'menu_user')?'opened':'';?>><!-- ul items without this class get hiddden by jquery-->
                                <li class="<?php echo ($s_menu_id == 'menu_user' && $s_sub_menu_id=='add_user')?'current':'';?>"><a href="<?php echo admin_url() ?>user/add.html">Add/Edit User</a></li>
                                
                                <li class="<?php echo ($s_menu_id == 'menu_user' && $s_sub_menu_id=='list_user')?'current':''; ?>"><a href="<?php echo admin_url() ?>user/listing">List User</a></li>
                             <!-- <li class="current"><a href="event_manag.php">Event Management</a></li>
                              <li><a href="admin_manag.php">Admin Management</a></li>
                              <li><a href="product_manag.php">Product Management</a></li>
                              <li><a href="order_manag.php">Order Management</a></li>
                              <li><a href="category_manag.php">Category Management</a></li> -->
                          </ul>
                        </li>
                        <li><a class="headitem item9" href="#">Affiliate Management</a>
                            <ul class=<?php echo ($s_menu_id == 'menu_affle')?'opened':'';?>>
                                <li class="<?php echo ($s_menu_id == 'menu_affle' && $s_sub_menu_id=='add_affle')?'current':''; ?>"><a href="<?php echo admin_url() ?>affiliate/add">Add/Edit Affiliation</a></li>
                                <li class="<?php echo ($s_menu_id == 'menu_affle' && $s_sub_menu_id=='list_affle')?'current':''; ?>"><a href="<?php echo admin_url() ?>affiliate/listingprop">List Affiliation</a></li>
                                <li class="<?php echo ($s_menu_id == 'menu_affle' && $s_sub_menu_id=='list_affle_track')?'current':''; ?>"><a href="<?php echo admin_url() ?>affiliate/affilatetrackdetprop">List Affiliation Tracking</a></li>
                            </ul>                            
                        </li>
                        
                        <li><a class="headitem item4" href="#">Lead Management</a>
                            <ul class=<?php echo ($s_menu_id == 'menu_appl')?'opened':'';?>>                            
                                <li class="<?php echo ($s_menu_id == 'menu_appl' && $s_sub_menu_id=='list_appl')?'current':''; ?>"><a href="<?php echo admin_url() ?>lead/listingprop">List of Leads</a></li>
                            </ul>
                        </li>
                         
                         <li><a class="headitem item9" href="#">Category Management</a>
                            <ul class=<?php echo ($s_menu_id == 'menu_category')?'opened':'';?>>
                                <li class="<?php echo ($s_menu_id == 'menu_category' && $s_sub_menu_id=='add_affle')?'current':''; ?>"><a href="<?php echo admin_url() ?>category/add">Add/Edit Category</a></li>
                                <li class="<?php echo ($s_menu_id == 'menu_category' && $s_sub_menu_id=='list_category')?'current':''; ?>"><a href="<?php echo admin_url() ?>category/listing">List Category</a></li>
                                
                            </ul>                            
                        </li>
                        <li><a class="headitem item9" href="#">Product Management</a>
                            <ul class=<?php echo ($s_menu_id == 'menu_product')?'opened':'';?>>
                                <li class="<?php echo ($s_menu_id == 'menu_product' && $s_sub_menu_id=='add_product')?'current':''; ?>"><a href="<?php echo admin_url() ?>product/add">Add/Edit Product</a></li>
                                <li class="<?php echo ($s_menu_id == 'menu_product' && $s_sub_menu_id=='list_product')?'current':''; ?>"><a href="<?php echo admin_url() ?>product/listing">List Product</a></li>
                                <li class="<?php echo ($s_menu_id == 'menu_product' && $s_sub_menu_id=='contract')?'current':''; ?>"><a href="<?php echo admin_url() ?>contract">Contrct Manager</a></li>
                                
                            </ul>                            
                        </li>
                      <!--  <li><a class="headitem item5" href="#">Search Site</a>
                            <ul>
                                <li><a href="#">Basic Search</a></li>
                                <li><a href="#">Advanced Search</a></li>
                                <li><a href="#">Search Option</a></li>
                            </ul>
                        </li>
                        <li><a class="headitem item6" href="#">Deleted Items</a>
                            <ul>
                                <li><a href="#">Content</a></li>
                                <li><a href="#">Images</a></li>
                                <li><a href="#">Audio</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">PDF</a></li>
                                <li><a href="#">Scripts</a></li>
                                <li><a href="#">Other</a></li>
                            </ul>
                        </li>
                    </ul><!--end subnav-->

                 <!--   <ul>
                        <li style="background: url(images/pink_eventSidebar.jpg) repeat-y left top"><a class="headitem item7" href="#">Events </a>
                            <!--<ul>
                                <li><a href="#">Write Blogpost</a></li>
                                <li><a href="#">Script Pages</a></li>
                                <li><a href="#">Meeting at 8.00</a></li>
                            </ul> -->
                      <!--   </li> -->
                    </ul>     
                    
                    <div class="flexy_datepicker"></div>
                    
                </div>