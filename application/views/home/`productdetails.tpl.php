<?php 
    $cart[] = array();
    $cart = $this->session->userdata('contract');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-block.js"></script>
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
    <script type="text/javascript">
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
       function showpopup(e)
    {
      var product_id= $(e).attr('product_id');
      var type =1;
      var value ='NULL';
        //alert(jQuery("#pop").height());   
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
 <div class="HEADER_product-details"></div>
<div class="clr"></div>
<div class="quick-menubg">
    <div class="quicknav">
    <ul>
    <li <?php echo ($prod_types==32)?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode(32); ?>">Business Standard</a></li>        
    <li <?php echo ($prod_types==31)?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode(31); ?>">Shop Express</a></li>          
    <li <?php echo ($prod_types==30)?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode(30); ?>">Shop Deluxe</a></li>         
    <li <?php echo ($prod_types==15)?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode(15); ?>">Market Launch</a></li>         
    <li <?php echo ($prod_types==1)?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode(1); ?>">Affiliate</a></li>          
    <li <?php echo ($prod_types==41)?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode(41); ?>">Social</a></li>         
    <li <?php echo ($prod_types==42)?"class='nobg'":""; ?>><a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode(42); ?>">Multi-Level</a></li>
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
<div class="Product_pics"><img src="<?php echo base_url(); ?>uploads/product_image/image/<?php echo @$details[0]['image']?>" alt="" /></div>
<div class="Botom_left">
<?php echo show_msg(); ?>
<form name="form1" id="form1" action="" method="post">
<table width="100%" cellspacing="5" cellpadding="0">
  <tr>
    <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Business Standard</span>?</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <input type="hidden" name="pack" id="pack1" value="InfluxIQ Business Standard" />
    <input name="name" id="name1" type="text" class="loginbox" value="Name" onclick="ch1('1')"/>
    <?php echo form_error('name'); ?>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top"><input name="email" id="email1" type="text" class="loginbox" value="Email" onclick="ch2('1')"/>
    <?php echo form_error('email'); ?>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top"><textarea name="comments" id="comments1" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea>
    <?php echo form_error('comments'); ?>
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
<span class="mainheading"><a name="bstandard">&nbsp;</a><?php echo @$details[0]['name']?></span> &nbsp;<br /> 
<span class="orangefont">
              <?php 
                    if(@$details[0]['price'] > 0)
                    {
                        echo ' Starting at $'.@$details[0]['price'];
                    }
                    if(@$details[0]['platform_cost'] > 0)
                    {
                        echo ' Platform Cost $'.@$details[0]['platform_cost'];
                    }
                    if(@$details[0]['insall_charge'] > 0)
                    {
                        echo ' Istallation $'.@$details[0]['insall_charge'];
                    }
                    if(@$details[0]['transaction_charge'] > 0)
                    {
                        echo ' + $'.@$details[0]['transaction_charge'].' a Transaction';
                    }
                ?>


</span><br />
<p>
        <?php echo @$details[0]['description']?></p>
</div>
<div class="bstanderdcont">
<b><?php echo @$details[0]['feature']?>:</b>
<ul>
<?php if(count($product_feature))
{
    foreach($product_feature as $feature)
    {
    ?>
    <li><?php echo $feature['value']?></li></br />
<?php }}?>
<!--    <li>When you purchase our business standard you get a complete consultation starting with a full discovery and creative interview with our professional staff to determine the best possible build for your new website.</li><br />
    <li>Our custom web page editor makes it easy to edit all of the pages of the website. Everywhere we set up text you are able to add and make changes.</li><br />
    <li>Add new pages easily to enhance the content beyond the pages that we create with a user friendly management portal you can log into securely.</li><br />
    <li>Create content with the website blog and then share your posts through RSS and a variety of social media sites including facebook, twitter and Google+.</li><br />
    <li>Take advantage of our standard inbound marketing system that allows you to take leads that come into your website and monetize them.</li><br />
    <li>Every one of our websites comes with a search engine submission service and a primer SEO package to get your web presence kick started.</li><br />
-->    </ul>
    </div>
    
<a href="javascript:void(0)" onclick="showpopup(this)" product_id="<?php echo @$details[0]['id'] ?>" cat_id="<?php echo @$details[0]['category_id'] ?>" class="addcontract"></a>   
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
<!--
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
</div> 
-->
<div class="clr"></div>
<div class="Botombg"><div id="downbutton"><a href="<?php echo base_url(); ?>home/contact.html" class="buttondown"></a></div></div>
<!--.............................................. END Body Part ...................................................................-->
 <div class="copyright">&copy 2010-2011, Influx IQ Development Group. All rights reserved.</div>
</div><!--wrapper ends-->
<?php 
/*
<div style="display: none;" id="pop">
 <div class="popcontainer">
 <a href="javascript:void(0);" class="cross-contract" onclick="jQuery.unblockUI()"></a>
 <div class="popcontainer-black">Select Contract Option</div>
     <div class="popcontainer-white">
     <?php 
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

*/
 ?>
