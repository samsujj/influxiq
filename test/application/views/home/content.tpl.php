<?php 
    $cart[] = array();
    $cart = $this->session->userdata('contract');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-block.js"></script>
<script type="text/javascript">

    function showpopup(e)
    {
      var product_id= $(e).attr('product_id');
      var type = 3;
      var value = $(e).attr('pac');
     
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
    
    function showpopup1(e)
    {
      var product_id= $(e).attr('product_id');
      var type = 3;
      
       var value = $('#pac'+product_id).find('option:selected').attr('selId');
      

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
 
    function change_price(e)
    {
        text = $(e).find('option:selected').text();
        value = $(e).val();
        $(e).closest('tr').next('tr').html('<td style="text-align:center" height="35">'+text+'</td>');
        $(e).closest('tr').next('tr').next('tr').html('<td style="text-align:center" class="bluetextbold" height="35">$'+value+'</td>');
    }
 
 </script>
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
            if($mRow['duration'] == 'Monthly')
            {
               $product[$i]['mPrice'] = $mRow['price']; 
               $product[$i]['mId'] = $mRow['id']; 
            }
        }                                                                                                                                                                                                                                                                                                                                                                                          
        $product[$i]['packages'] = $package[$row['id']];                                                                                                                                                                                                                                                                                                                                                                                           
    }
    
    
?>
<div class="body">
         <div class="content-banner"></div>

<!--......................................................... START MIDDLE PART ....................................................................-->
    
    <div class="about1">
        <p class="h3">Getting content developed for your new website is extremely important.  You can do this yourself, hire a PR company or you are welcome to use us.  Our content writers are seasoned and know how to research for the right keywords.  We will analyze your competition, figure out your local markets and work with your current content.</p>
        <p class="h3">&nbsp;</p>
        <p class="h3"> If you are buying a technology package from us I would highly suggest getting a content package to go with your new platform!</p>
    </div>

    <div class="clr"></div>

    <div class="aboutbox">
        <div class="aboutbox_left">
            <h3>Contact a representative today and learn more about how the Influx IQ Development Group can enhance your business</h3></div>
        <div class="aboutbox_right"><div id="downbutton"><a href="<?php echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
    </div>

    <div class="clr"></div>

    <div class="search_marketing_package">
        <div style="width:782px; float:left; margin:0 80px;"><table width="782" cellspacing="0" cellpadding="0" align="center" >

                <tr>
                    <td>
                        <table width="782" cellspacing="0" cellpadding="0" align="center">

                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0" align="center">

                                        <tr>
                                            <td width="307" height="35">&nbsp;</td>
                                            <td width="118" class="searchpackagemenutab"><?php echo ucwords(@$product[1]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="118" class="searchpackagemenutab2"><?php echo ucwords(@$product[2]['name']) ?></td>
                                            <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                            <td width="118" class="searchpackagemenutab3"><?php echo ucwords(@$product[3]['name']) ?></td>
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
                                            <td width="307" class="wos">
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
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->

										   <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
												<?php
                                                  if(count($product[1]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[1]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[1]['packages'] as $row)
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
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[1]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[1]['packages']) > 1) { ?> onclick="showpopup1(this)" <?php }else {?> onclick="showpopup(this)" <?php } ?>  product_id="<?php echo @$product[1]['id']; ?>" pac="<?php echo @$product[1]['mId']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>


                                                                    </td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td style="padding:0 0 0 4px;" width="118" valign="top" height="110" bgcolor="#fdf2e9">
                                                                        <!--<table width="98%" cellspacing="0" cellpadding="0" align="center">
										
                                                                            <tr>
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                            
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[2]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[2]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[2]['packages'] as $row)
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
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[2]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[2]['packages']) > 1) { ?> onclick="showpopup1(this)" <?php }else {?> onclick="showpopup(this)" <?php } ?>  product_id="<?php echo @$product[2]['id']; ?>" pac="<?php echo @$product[2]['mId']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
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
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[3]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[3]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[3]['packages'] as $row)
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
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[3]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" <?php if(count($product[3]['packages']) > 1) { ?> onclick="showpopup1(this)" <?php }else {?> onclick="showpopup(this)" <?php } ?>  product_id="<?php echo @$product[3]['id']; ?>" pac="<?php echo @$product[3]['mId']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
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
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mPrice']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
                                                                            </tr>

                                                                        </table>-->
											 	
										        <table width="98%" cellspacing="0" cellpadding="0" align="center" style="border-top:#d2a681 solid 2px;">

                                                                            <tr>
                                                                               <td style="padding:8px 0 0 6px;">
                                                <?php
                                                  if(count($product[4]['packages']) > 1)
                                                  {
                                                      ?>
                                                <select name="Monthly" id="pac<?php echo @$product[4]['id']; ?>" style="margin:0px auto;" onchange="change_price(this)">
                                                  <?php
                                                    foreach($product[4]['packages'] as $row)
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
                                                                            	<td height="35" style="text-align:center">Monthly</td>
								                    </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"class="bluetextbold">$<?php echo @$product[4]['mPrice']; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="35" style="text-align:center"><a href="javascript:void(0);"<?php if(count($product[4]['packages']) > 1) { ?> onclick="showpopup1(this)" <?php }else {?> onclick="showpopup(this)" <?php } ?> product_id="<?php echo @$product[4]['id']; ?>" pac="<?php echo @$product[4]['mId']; ?>"><img width="99" height="28" src="<?php echo base_url(); ?>images/getstarted.jpg" alt="" /></a></td>
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
                                                                    <td width="118" valign="top" class="wosconts1" style="vertical-align: text-top"><?php echo character_limiter(@$product[1]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts2" style="vertical-align: text-top"><?php echo character_limiter(@$product[2]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts3" style="vertical-align: text-top"><?php echo character_limiter(@$product[3]['description'],130); ?></td>
                                                                    <td width="1"><img width="1" height="2" src="<?php echo base_url(); ?>images/blank_space.png" alt="" /></td>
                                                                    <td width="118" valign="top" class="wosconts4" style="vertical-align: text-top"><?php echo character_limiter(@$product[4]['description'],130); ?></td>
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
                                <td width="307" height="35" style="padding-left:14px;">Content Development Services</td>
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
                                            <td width="307" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Number Of Content Pages Made</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">5 To 7</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">1 To 2</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">7 To 10</td>
                                            <td width="118" bgcolor="#e0e0e0" style="text-align:center">1</td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="782" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td width="307" height="35" style="padding-left:14px;">Competition Research</td>
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
                                            <td width="307" height="35" bgcolor="#fdf2e9" style="padding-left:14px;">Reporting Generated Monthly</td>
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
                                            <td width="307" height="35" style="padding-left:14px;">Company Interview &amp; Content Analysis</td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
                                            <td width="118" style="text-align:center"><img width="17" height="17" src="<?php echo base_url(); ?>images/searchmarketing_wright.png" alt="" /></td>
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

<p>&nbsp;</p>            
	     <div class="footerdown">
                <div class="footerleft">
                    <p>Influx IQ can help you to take your business to the next level. Contact us today for a FREE QUOTE</p>
                </div>
                <div id="downbutton"><a href="<?php echo base_url()."home/contact.html"; ?>" class="buttondown"></a></div>
    	     </div>

<!--......................................................... END MIDDLE PART .............................................................................-->

<div class="copyright">&copy; 2010-2011, Influx IQ Development Group. All rights reserved.</div>
</div>


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
        if(!@array_key_exists(4, @$cart))
        {
     ?>
     <input type="radio" class="chkPage" name="chkPage" value="marketing">&nbsp;&nbsp;Marketing<br>
     <?php 
        }
     ?>
     <input type="image" src="<?php echo base_url(); ?>images/contractgobtn.png" style="border:none; background:#ededed;" width="172" height="29" alt="go" value="ok" onclick="redir(this)" />
    </div>
 </div>
</div>