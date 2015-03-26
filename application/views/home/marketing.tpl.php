<?php 
    $cart[] = array();
    $cart = $this->session->userdata('contract');
$cart1 = $this->cart->contents();


?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-block.js"></script>
<script type="text/javascript">

    function showpopup(e)
    {
      var product_id= $(e).attr('product_id');
      var type = 4;
      var value = $(e).attr('pac');
     
      alert(jQuery("#show_selected").length);
      $.post('<?php echo base_url()?>contract/addContract',
      {'product_id':product_id,'value':value,'type':type},
      function(result)
      {  
        jQuery.blockUI({ 
            message: $('#pop'), 
            css: {
                border : 'none', 
                top:  ($(window).height() - 335) /2 + 'px', 
                left: ($(window).width() - 530) /2 + 'px', 
                cursor: 'auto' 
            } 
        });        
      }
      
      
      ) ;      
    }

    function showpopupdef(e){
        jQuery.blockUI({
            message: $('#pop_def'),
            css: {
                border : 'none',
                top:  ($(window).height() - 335) /2 + 'px',
                left: ($(window).width() - 530) /2 + 'px',
                cursor: 'auto'
            }
        });
    }

    function showpopup1(e,stat)
    {
      var product_id= $(e).attr('product_id');
      var type = 4;
    //   alert(jQuery("#pop").height());   
      var value = $('#pac'+stat+product_id).find('option:selected').attr('selId');

      $.post('<?php echo base_url()?>contract/addContract',
      {'product_id':product_id,'value':value,'type':type},
      function(result)
      {
          if(result>0){
        jQuery.blockUI({ 
            message: $('#pop'), 
            css: {
                border : 'none', 
                top:  ($(window).height() - 335) /2 + 'px', 
                left: ($(window).width() - 530) /2 + 'px', 
                cursor: 'auto' 
            } 
        }); 
          }
          else{
            $("#up_cart").attr('prod_id',product_id);
            $("#up_cart").attr('prod_type',type);
            $("#up_cart").attr('prod_pac',value);
               jQuery.get('<?php echo base_url()?>contract/showCurCart/'+type,
                {},function(res){
                    jQuery("#prod_chs_name").text(res);
                   // alert(res)
                });
                
            jQuery.blockUI({ 
                message: $('#pop_1'), 
                css: {
                    border : 'none', 
                    top:  ($(window).height() - 335) /2 + 'px', 
                    left: ($(window).width() - 530) /2 + 'px', 
                    cursor: 'auto' 
                } 
                }); 
          }
      }
      
      
      ) ;      
      
    
    }
    
    function redir(e)
    {
        jQuery.unblockUI();
        redirVal = jQuery(e).closest('div').find('input.chkPage:checked').val();
       // alert(redirVal);
        
        if(redirVal)
        {
                window.location.href='<?php echo base_url()?>home/'+redirVal+'.html';
        }
        
        
    }

</script>
<script type="text/javascript">
    $(function(){
       // alert(1);
        $('#slideshow1').cycle();

        $('#slideshow2').cycle({
            prev:   '#prev',
            next:   '#next',
            timeout: 50
        });

        $('#slideshow3').cycle({
            delay: 2000,
            speed: 500,
            before: onBefore
        });

        function onBefore() {
            $('#title').html(this.alt);
        }
    });
</script>
 <script type="text/javascript">
 
    function change_price(e)
    {
        text = $(e).find('option:selected').text();
        value = $(e).val();
        $(e).closest('tr').next('tr').html('<td style="text-align:center" height="35">'+text+'</td>');
        $(e).closest('tr').next('tr').next('tr').html('<td style="text-align:center" class="bluetextbold" height="35">$'+value+'</td>');
    }
 
 </script>
<style type="text/css">
    <!--
    .style1 {color: #ff7c00}
    .pics { 
        height: 338px; 
        width: 960px; 
        padding:0; 
        margin:0 0 0 0; 
        overflow: hidden;
        border-bottom:#666 1px solid;

    }
    -->
</style>

 <?php
    $i=0;
    foreach($m_dataset as $row)
    {
        $i++;
        $product[$i]['id'] = $row['id'];                                                                                                                                                                                                                                                                                                                                                                                           
        $product[$i]['name'] = $row['name'];                                                                                                                                                                                                                                                                                                                                                                                           
        $product[$i]['description'] = $row['description'];  
        foreach($package[$row['id']] as $mRow)
        {
            if($mRow['duration'] == 'Monthly' && $mRow['status'] == 1)
            {
                $product[$i]['mOffPrice'] = $mRow['price']; 
                $product[$i]['mOffid'] = $mRow['id']; 
            }
            if($mRow['duration'] == 'Monthly' && $mRow['status'] == 2)
            {
               $product[$i]['mOnPrice'] = $mRow['price']; 
               $product[$i]['mOnid'] = $mRow['id']; 
            }
            
            if($mRow['status'] == 1)
            {
                $product[$i]['offPackages'][count(@$product[$i]['offPackages'])] = $mRow;                                                                                                                                                                                                                                                                                                                                                                                           
            }
            if($mRow['status'] == 2)
            {
               $product[$i]['onPackages'][count(@$product[$i]['onPackages'])] = $mRow;                                                                                                                                                                                                                                                                                                                                                                                           
            }
        }                                                                                                                                                                                                                                                                                                                                                                                          
    }
?>

<div class="body">
    <div class="seo-banner1">
        <div id="slideshow1" class="pics">
            <a href="#"><img src="<?php echo base_url(); ?>images/seo-banner1.jpg" width="960px" height="338" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>images/seo-banner2.jpg" width="960px" height="338" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>images/seo-banner3.jpg" width="960px" height="338" /></a>
            <a href="#"><img src="<?php echo base_url(); ?>images/seo-banner4.jpg" width="960px" height="338" /></a>        
        </div>
        <div class="clr"></div>
    </div>
    <!--banner ends-->
    <!--<div class="getstarted">
    <div class="get-left">
    <h2 class="h2">We pride ourselves in consistently increasing click-thru & conversion rates on a grand scale. In some cases we have even improved campaign performance over 100%</h2>
    </div>
    <div id="downbutton"><a href="contact.php" class="buttondown"></a></div>
    </div> -->
    <div class="about1">

        <!--<div class="about1-right"></div> -->
    </div>
    <!-- <div class="about1">
    <div style="border-top:#ccc 1px solid; width:960px;"><img src="images/influx-banner.jpg" alt="" width="847" height="538" border="0" style="margin-left:55px;" /></div>
    <div class="about1-left">
    <p class="producttitle">We Offer the Following Packages:</p><br />
    <hr />
    <p class="footerleft">Package 1 - $197 mo.</p>
    <p>&nbsp;</p>
    <p class="common">&nbsp;</p>
    <p class="common"># 3 Press Releases (syndicated to 50 press release sites)<br />
    # 50 Bookmarks and directory links<br />
    # 1 Blog post<br />
    # 5 Articles</p>
    <p>......................................................................................................</p>
    <p class="footerleft">Package 2 - $297 mo.</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p class="common"># 7 Press Releases (syndicated to 50 press release sites)<br />
    # 100 Bookmarks and directory links<br />
    # 2 Blog post<br />
    # 10 Articles</p>
    <p>......................................................................................................</p>
    <p class="footerleft">Package 3 - $397 mo.</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p class="common"># 15 Press Releases (syndicated to 50 press release sites)<br />
    # 200 Bookmarks and directory links<br />
    # 3 Blog post<br />
    # 15 Articles</p>
    <p>......................................................................................................</p>
    <p><span class="footerleft">Press Release Stimulus: $497</span></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><span class="common">1 High high level distribution</span></p>
    <p>&nbsp;</p>
    <p class="common">Our press release stimulus package is something every club should do at least one or two times a year. We will write one high quality press release and then we will get it syndicated to the the best places online. This includes Google News, Yahoo News and other high level syndicates.</p>
    <p>......................................................................................................</p>
    <p class="footerleft">Bookmark / Directory stimulus: $497</p>
    <p class="common">&nbsp;</p>
    <p class="common">&nbsp;</p>
    <p class="common">Get 1,000 back links to your site</p>
    <p>&nbsp;</p>
    <p class="common">Getting into the directories is ones of the most solid link back strategies that exists. We can get you onto all of the more important Web Based indexes and directories. Included will also be a lot of the traditional high page ranking directories as well. This package is really smart for new site owners.</p>
    <p>......................................................................................................</p>
    <p class="footerleft">Article submission stimulus: $497 </p>
    <p class="common">&nbsp;</p>
    <p class="common">&nbsp;</p>
    <p class="common">Submission to 250 Article websites </p>
    <p>&nbsp;</p>
    <p class="common">Our article submission stimulus package is something every web owner should do at least one or two times a year. We will write one high quality article and publish it to over 250 article websites. This will give your online presence a quick jump.</p>
    </div>
    <div class="services-man"></div>
    </div> -->
    <div class="about1">
        <p class="h3"><strong>Internet Marketing is one of the most interesting lines of work</strong>. It requires a very agaile and creative mind to be able to balance between the logic of the search engines and the conversion of the prospect. </p>
        <p class="h3">&nbsp;</p>
        <p class="h3">We have been working with marketing directives for a large number of years and have masterd the art of inbound marketing. We would love the chance to give your company the insight and success it deservies through a strong internet marketing campain.</p>
    </div>
    <!--................................. START GET STARTED AREA ............................................................-->
    <div class="aboutbox">
        <div class="aboutbox_left">
            <h3>Contact a representative today and learn more about how the Influx IQ Development Group can enhance your business</h3></div>
        <div class="aboutbox_right"><div id="downbutton"><a href="<?php echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
    </div>
    <div class="clr"></div>
    <!--................................. END GET STARTED AREA ............................................................-->
    <div class="search_marketing_package">
        <div style="width:782px; float:left; margin:0 80px;"><table width="782" cellspacing="0" cellpadding="0" align="center" >

                <tr>
                    <td>
                        <table width="785" cellspacing="0" cellpadding="0" align="center">

                            <tr>
                                <td>
                                    <table width="785" cellspacing="0" cellpadding="0" align="center">

                                        <tr>
                                            <td width="319" height="35">&nbsp;</td>
                                            <td width="118" class="searchpackagemenutab" style="vertical-align: top;"><?php echo ucwords(@$product[1]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="120" class="searchpackagemenutab2" style="vertical-align: top;"><?php echo ucwords(@$product[2]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="119" class="searchpackagemenutab3" style="vertical-align: top;"><?php echo ucwords(@$product[3]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="118" class="searchpackagemenutab4" style="vertical-align: top;"><?php echo ucwords(@$product[4]['name']) ?></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="785" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="319" class="wos">
                                                <?php if(@$form_name==1){echo show_msg();} ?>
                                                <form id="from1" name="from1" action="" method="post">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-left:2px;">
                                                        <tr>
                                                            <td align="left" valign="top" style="padding-left:10px;">Get a hold of us</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <input type="hidden" name="pack" id="pack1" value="SEO" />
                                                                <input type="hidden" name="formid" id="formid1" value="1" />
                                                                <input name="name" id="name1" type="text" class="loginbox" value="Name" onclick="ch1('1')"/><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php echo form_error('name'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><input name="email" id="email1" type="text" class="loginbox" value="Email" onclick="ch2('1')"/><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php echo form_error('email'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><textarea name="comments" id="comments1" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea><div <?php echo (@$form_name!=1)?"style='display:none';":""; ?>><?php echo form_error('comments'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
                                                        </tr>
                                                    </table>
                                                </form>

                                            </td>
                                            <td width="475" valign="top">
                                                <table width="475" cellspacing="0" cellpadding="0">

                                                    <tr>
                                                        <td>
                                                            <table width="475" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOffPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[1]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[1]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[1]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php  if(!is_plat_cart($cart1)){ ?> onclick="showpopupdef(this)" <?php }else { if(count($product[1]['offPackages']) > 1) { ?> onclick="showpopup1(this,'off')" <?php }else { ?> onclick="showpopup(this)"<?php } } ?> product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOffid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this,'off')" product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOffPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[2]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[2]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[2]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(!is_plat_cart($cart1)){ ?> onclick="showpopupdef(this)" <?php }else { if(count($product[2]['offPackages']) > 1) { ?> onclick="showpopup1(this,'off')" <?php }else { ?> onclick="showpopup(this)"<?php } } ?> product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOffid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOffPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[3]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[3]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[3]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(!is_plat_cart($cart1)){ ?> onclick="showpopupdef(this)" <?php }else { if(count($product[3]['offPackages']) > 1) { ?> onclick="showpopup1(this,'off')" <?php }else {  ?> onclick="showpopup(this)"<?php } } ?> product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOffid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOffPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[4]['offPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacoff<?php echo @$product[4]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[4]['offPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOffPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(!is_plat_cart($cart1)){ ?> onclick="showpopupdef(this)" <?php }else { if(count($product[4]['offPackages']) > 1) { ?> onclick="showpopup1(this,'off')" <?php }else {  ?> onclick="showpopup(this)"<?php } } ?> product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOffid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table width="475" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="118" valign="top" class="wosconts1"><?php echo character_limiter(@$product[1]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts2"><?php echo character_limiter(@$product[2]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts3"><?php echo character_limiter(@$product[3]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts4"><?php echo character_limiter(@$product[4]['description'],130); ?></td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="40">
                        <table width="787" cellspacing="0" cellpadding="0" class="searchpackagetittlebg">

                            <tr>
                                <td width="322" height="35" style="padding-left:14px;">Off  page Optimization</td>
                                <td width="118" style="text-align:center"></td>
                                <td width="118" style="text-align:center"></td>
                                <td width="118" style="text-align:center"></td>
                                <td width="118" style="text-align:center"></td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="border:#ccc 1px solid;">
                        <table width="100%" cellspacing="0" cellpadding="0">                            
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Keywords Optimized</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">2</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">3</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">5</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">10</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Competition Research</td>
                                           
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Reporting Generated Monthly</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Search Engine Submissions</td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellspacing="0" cellpadding="0" width="787">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px">Directory Submission</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">3 Posts</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">5 Posts</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">7 Posts</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">15 Posts</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Article Submission [Unique content]</td>
                                            <td width="118" style="text-align:center">5 Custom</td>
                                            <td width="118" style="text-align:center">10 Custom</td>
                                            <td width="118" style="text-align:center">15 Custom</td>
                                            <td width="118" style="text-align:center">25 Custom</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Blog Posting</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">1 Posts</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">2 Posts</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">4 Posts</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">10 Posts</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Press Release Submission [Unique content]</td>
                                            <td width="118" style="text-align:center">1 Custom</td>
                                            <td width="118" style="text-align:center">3 Custom</td>
                                            <td width="118" style="text-align:center">7 Custom</td>
                                            <td width="118" style="text-align:center">14 Custom</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
               <?php /* <tr><td colspan="5" height="20"></td></tr>
                <tr>
                    <td>
                        <table width="785" cellspacing="0" cellpadding="0">

                            <tr>
                                <td>
                                    <table width="785" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="319" height="35">&nbsp;</td>
                                            <td width="118" class="searchpackagemenutab" style="vertical-align: top;"><?php echo ucwords(@$product[1]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="120" class="searchpackagemenutab2"><?php echo ucwords(@$product[2]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="119" class="searchpackagemenutab3"><?php echo ucwords(@$product[3]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="118" class="searchpackagemenutab4"><?php echo ucwords(@$product[4]['name']) ?></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" class="wos">
                                                <?php if(@$form_name==2){echo show_msg();} ?>
                                                <form id="from2" name="from2" action="" method="post">

                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-left:2px;">
                                                        <tr>
                                                            <td align="left" valign="top" style="padding-left:10px;">Get a hold of us</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top">
                                                                <input type="hidden" name="pack" id="pack2" value="SEO" /> 
                                                                <input type="hidden" name="formid" id="formid2" value="2" />
                                                                <input name="name" id="name2" type="text" class="loginbox" value="Name" onclick="ch1('2')"/>
                                                                <div <?php echo (@$form_name!=2)?"style='display:none';":""; ?>><?php echo form_error('name'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><input name="email" id="email2" type="text" class="loginbox" value="Email" onclick="ch2('2')"/>
                                                                <div <?php echo (@$form_name!=2)?"style='display:none';":""; ?>><?php echo form_error('email'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top"><textarea name="comments" id="comments2" cols="" rows="" class="loginarea" onclick="ch3('2')">Questions - Comments</textarea>
                                                                <div <?php echo (@$form_name!=2)?"style='display:none';":""; ?>><?php echo form_error('comments'); ?></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" valign="top"><input name="" type="submit" value="Send" class="Send_btn2"/></td>
                                                        </tr>
                                                    </table>
                                                </form>


                                            </td>
                                            <td width="475" valign="top">
                                                <table width="475" cellspacing="0" cellpadding="0">

                                                    <tr>
                                                        <td>
                                                            <table width="475" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[1]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[1]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[1]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[1]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[2]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[2]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[2]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[2]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[3]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[3]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[3]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[3]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOnPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[4]['onPackages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pacon<?php echo @$product[4]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[4]['onPackages'] as $row)
                                                    {
                                                ?>
                                                    <option value="<?php echo @$row['price'];?>" selId="<?php echo @$row['id'];?>" <?php if($row['duration'] == 'Monthly'){ ?> selected="selected" <?php }?>><?php echo @$row['duration'];?></option>
                                                  <?php
                                                    }  
                                                ?>
                                                </select>
                                                  <?php
                                                    }  
                                                ?>
											  </td>
                                                                            </tr>
										      <tr>
                                                                            	<td height="35" style="text-align:center">One Time</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mOnPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[4]['onPackages']) > 1) { ?> onclick="showpopup1(this,'on')" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mOnid']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table width="475" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td width="118" valign="top" class="wosconts1"><?php echo character_limiter(@$product[1]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts2"><?php echo character_limiter(@$product[2]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts3"><?php echo character_limiter(@$product[3]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts4"><?php echo character_limiter(@$product[4]['description'],130); ?></td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>      */ ?>
                <tr>
                    <td height="40" class="searchpackagetittlebg">On Page Optimization</td>
                </tr>
                <tr>
                    <td style="border:solid 1px #CCCCCC;">
                        <table width="100%" cellspacing="0" cellpadding="0">


                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">                                        
                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px; background:#fdf2e9;">Website Analysis</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>                                        
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Competitor Site Analysis</td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">keywords  Research &amp; Optimization</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Title Tag Optimization</td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Meta Description Optimization</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Images Optimization</td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">URL Rewriting (On Systems that allows this)</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">Checking site for W3C compliance</td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Broken links check</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" style="padding-left:14px;">HTML error check</td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table width="787" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="325" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Content Fixing Suggestions</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>



            </table></div>
    </div>
    <div class="clr"></div>
    <!--................................. START GET STARTED AREA ............................................................-->
    <div class="aboutbox">
        <div class="aboutbox_left">
            <h3>Contact a representative today and learn more about how the Influx IQ Development Group can enhance your business</h3></div>
        <div class="aboutbox_right"><div id="downbutton"><a href="<?php echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
    </div>
    <div class="clr"></div>
    <!--................................. END GET STARTED AREA ............................................................-->
    <div class="copyright">&copy; 2010-2011, Influx IQ Development Group. All rights reserved.</div>
  </div>
  
  <?php /*
  <div style="display: none;" id="pop">
 <div class="popcontainer">
 <a href="javascript:void(0);" class="cross-contract" onclick="jQuery.unblockUI()"></a>
 <div class="popcontainer-black">Select Contract Option</div>
     <div class="popcontainer-white">
     <?php 
        if(!@array_key_exists(1, @$cart))
        {
     ?>
     <input type="radio" class="chkPage" name="chkPage" value="products">&nbsp;&nbsp;Platform<br>
     <?php 
        }
        if(!@array_key_exists(2, @$cart))
        {
     ?>
     <input type="radio" class="chkPage" name="chkPage" value="design">&nbsp;&nbsp;Design<br>
     <?php 
        }
        if(!@array_key_exists(3, @$cart))
        {
     ?>
     <input type="radio" class="chkPage" name="chkPage" value="content">&nbsp;&nbsp;Content<br>
     <?php 
        }
     ?>
     <input type="image" src="<?php echo base_url(); ?>images/contractgobtn.png" style="border:none; background:#ededed;" width="172" height="29" alt="go" value="ok" onclick="redir(this)" />
    </div>
 </div>
</div>
*/ ?>