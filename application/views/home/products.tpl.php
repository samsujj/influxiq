<?php 
    $cart[] = array();
    $cart = $this->session->userdata('contract');
?>
<link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/validationEngine.jquery.css" type="text/css" media="screen"/>
<link id="Link" rel="stylesheet" href="<?php echo base_url(); ?>css/admin/jquery-ui.css" type="text/css" media="screen"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/admin/languages/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-block.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/json.js"></script>

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

    function showpopup(e)
    {
      var product_id= jQuery(e).attr('product_id');
      var type = 1;
      var value ='NULL';
     
      jQuery.post('<?php echo base_url()?>contract/addContract',
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
<div style="width:800px; height:200px; margin:0 0 0 17px; "><img src="<?php echo base_url() ?>images/hostingfree.png"></div>
<div style="width:926px; height:280px; border: solid 1px #ddd;"><img src="<?php echo base_url() ?>images_product/banner-platformbody.jpg">

</div>
<div class="clr"></div>
<div class="CON">

<?php
if(count($m_dataset))
{
    foreach($m_dataset as $m_row)
    {
        if($m_row['category_id'] == 1)
        {
?>
    <div class="Productparts">
        <div class="SC">
            <div class="Product_pics"><img src="<?php echo base_url(); ?>uploads/product_image/image/<?php echo  @$m_row['image'];?>" alt="" style="max-height: 245px; max-width: 326px;" /></div>
            <div class="Botom_left">
                <?php echo (@$form_name=='InfluxIQ Business Standard')?show_msg():""; ?>
                <form  name="form1" class="new" method="post" id="formID" action="">
                    <table width="100%" cellspacing="5" cellpadding="0">
                        <tr>
                            <td align="left" valign="top">Have Questions about <span style="color:#21a2dc;">Business Standard</span>?</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top">
                                <input type="hidden" name="pack" id="pack1" value="InfluxIQ Business Standard" />
                                <input name="name" id="name1" type="text" class="loginbox" value="Name" onclick="ch1('1')"/>
                                <div <?php echo (@$form_name!='InfluxIQ Business Standard')?"style='display: none;'":"";  ?>>
                                    <?php echo form_error('name'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><input name="email" id="email1" type="text" class="loginbox" value="Email" onclick="ch2('1')"/>                                       
                                <div <?php echo (@$form_name!='InfluxIQ Business Standard')?"style='display: none;'":"";  ?>>

                                    <?php echo form_error('email'); ?>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="top"><textarea type="textarea" name="comments" id="comments1" cols="" rows="" class="loginarea" onclick="ch3('1')">Questions - Comments</textarea>
                                <div <?php echo (@$form_name!='InfluxIQ Business Standard')?"style='display: none;'":"";  ?>>
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
                <span class="mainheading"><a name="bstandard">&nbsp;</a><?php echo  ucwords(@$m_row['name']);?></span><br/>
                <span class="orangefont">
                <?php 
                    if(@$m_row['price'] > 0)
                    {
                        echo ' Platform Cost : $'.@$m_row['price'];
                    }
                    if(@$m_row['platform_cost'] > 0)
                    {
                        echo ' | Monthly Hosting : $'.@$m_row['platform_cost'];
                    }
                    if(@$m_row['insall_charge'] > 0)
                    {
                        echo ' | Per Transaction : $'.@$m_row['insall_charge'];
                    }
                    if(@$m_row['transaction_charge'] > 0)
                    {
                        echo ' + $'.@$m_row['transaction_charge'].' a Transaction';
                    }
                ?>
                
                </span>
                
                <br />
                <p><?php echo  @$m_row['description'];?></p>
            </div>
            <div class="bstanderdcont">
                <b><?php echo  @$m_row['feature'];?> : </b>
                <?php
                    if(count($feature[@$m_row['id']]))
                    {
                ?>
                <ul>
                
                <?php
                    foreach($feature[@$m_row['id']] as $flist)
                    {
                ?>
                    <li><?php echo $flist['value'];?></li><br />
                
                <?php
                    }
                ?>
                </ul>
                <?php
                    } 
                ?>
            </div>
            
             <div class="contractdiv">
                 <a href="javascript:void(0);" onclick="showpopup(this)" product_id="<?php echo @$m_row['id'] ?>" cat_id="<?php echo @$m_row['category_id'] ?>" class="addcontract"></a>
                 <a href="<?php echo base_url(); ?>home/productdetails/<?php echo strEncode($m_row['id']) ?>" class="viewdetails" target="_self"></a>
             </div>
             
             <div class="clr"></div>
            
            <div class="B2top"><a href="#top">Back to top</a> </div>
        </div>
        <div class="dotline"></div>
    </div>
    <div class="clr"></div>

<?php
    }}}
?>

   <!-- <div class="Additionalbg" style="height: auto;">
        <a name="webadd">&nbsp;</a>
        <p align="center" style="padding-top:10px;"><span class="mainheading">- The following feature packed modules come with every platform -</span><br />
            <span class="orangefont">Web Additions $9.97 monthly | Paid User additions $1.50 / active user per month</span></p>
    <img src="<?php /*/*echo base_url();*/?>images_product/banner-platformbody.jpg">

</div>-->

    <div class="clr"></div>
<!--
    <div class="Productparts">
        <div class="mainheading2">- <span style="color:#ff8406;">Web Additions</span> -</div>
        <div class="B2top"><a href="#top">Back to top</a></div>

        <div class="Smalliconcontarea"><table width="100%" cellspacing="5" cellpadding="0">
                <?php /*/*<tr>
                    <td align="left" valign="top"><img src="<?php echo base_url(); ?>images_product/mobile_icon.png" alt="" align="absmiddle" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Mobile Web Addition -</b></span> This addition allows website 
                        visitors to view your site in a mobile environment in a way that is 
                        created to browse appropriately. Although our sites run fine in mobile 
                        browsers this allows better access to your web content.&nbsp; This is a 
                        separate cost to set up, but then only runs the normal web addition 
                        package price after implementation.</td>
                </tr>*/?>
                <tr>
                    <td align="left" valign="top"><img src="<?php /*echo base_url(); */?>images_product/gallery_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Image Gallery Package -</b></span>This 
                        allows you to add and run any number of image galleries on your website.&nbsp; 
                        You can add captions, comments to each of the pictures and have users 
                        comment on the pictures as well.&nbsp; This is a great addition to any 
                        of the websites that you are running.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php /*echo base_url(); */?>images_product/utube_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>YouTube Aggregator -</b></span> This is a 
                        great little tool. You can add a video library using You-Tube right here 
                        on your website.&nbsp; This includes create categories and 
                        subcategories.&nbsp; This is a great combination to add with a You-Tube 
                        channel or to just showcase You-Tube videos that you like. Once on your 
                        site visitors can comment and you can add in your own comments as well.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php /*echo base_url(); */?>images_product/video_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Simple Video Library -</b></span> With 
                        this you are able to upload raw video files of most any type to your 
                        website.&nbsp; You are limited to 10 minute videos with this package but 
                        they will all come out high quality as long as you start with a high 
                        quality video to begin with.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php /*echo base_url(); */?>images_product/smedia_icon.png" alt="" /></td>
                    <td align="left" valign="top"><span style="color:#004a6f;"><b>Full Social Media Package -</b></span> This is a full integration with twitter and facebook for your website.&nbsp; 
                        Although we offer share tools for all of our packages this will connect 
                        you directly to social media unlike anything else.&nbsp; Along with this 
                        we suggest having us build a custom facebook fan page.&nbsp; Prices vary 
                        on this but it is very affordable.</td>
                </tr>
                <tr>
                    <td align="left" valign="top"><img src="<?php /*echo base_url(); */?>images_product/visitor_icon.png" alt="" /></td>
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

-->
</div>
<div class="clr"></div>

<div class="Botombg"><div id="downbutton"><a href="<?php echo base_url() ?>home/contact.html" class="buttondown"></a></div></div>
<!--.............................................. END Body Part ...................................................................-->
 <div class="copyright">&copy 2010-2011, Influx IQ Development Group. All rights reserved.</div>
 
 
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