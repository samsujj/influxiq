<?php  //pr($m_dataset,true); ?>
<script type="text/javascript"> 
    jQuery.noConflict();

    function getPopUp(val1){
        //var id = jQuery(this).attr('id');
        //alert(val);
        val2="<?php echo base_url(); ?>"+"affiliates/"+val1;
        // alert(val2);
        str=jQuery('#in_time').val(val2);

        jQuery.blockUI({ 
            message: jQuery('#add_Form2'), 
            css: {
                background: 'none',
                border: 'none',
                top: '20%',
                left: '35%'
            }             
        }); 
    }

    function getDelPopUp(val){
        //var id = jQuery(this).attr('id');   
        if(jQuery("#act1").text()=="Yes"){
            jQuery("#act1").wrapInner("<a href='<?php echo admin_url();?>affiliate/del/"+val+"'></a>");
        }
        jQuery.blockUI({ 
            message: jQuery('#add_Form3'), 
            css: {
                background: 'none',
                border: 'none',
                top: '20%',
                left: '35%'
            }             
        }); 
    }

    jQuery(function(){

        jQuery('#sdate').datepicker(); 
        jQuery('#fdate').datepicker(); 

        setTimeout("addcode1(45)",10);
     //   setTimeout("addcode(45,'product')",10);
        setTimeout("jQuery.unblockUI()",110); 
    });


    function addcode(code)
    {
     //    alert(type);
        var  type='product';
        code="<?php echo base_url(); ?>"+"affiliates/"+type+"/"+code;
        jQuery('#fe_text').val('');  
        jQuery('#fe_text').val(code);
        jQuery('#yy').css('display','none');
        //var t=jQuery('#d_clip_button').after().next().html();
        //jQuery('#d_clip_button').after().next().click();  
        //alert(t);
        jQuery.blockUI({ 
            message: jQuery('#yy'), 
            css: {
                background: 'none',
                border: 'none',
                top: '20%',
                left: '35%' ,
                width:'60%',
                cursor:'auto',
            }             
        });


    }
    
    
      function addcode1(code)
    {
        //alert(code);
        var type='seo';
        code="<?php echo base_url(); ?>"+"affiliates/"+type+"/"+code;
        jQuery('#fe_text').val('');  
        jQuery('#fe_text').val(code);
        jQuery('#yy').css('display','none');
        //var t=jQuery('#d_clip_button').after().next().html();
        //jQuery('#d_clip_button').after().next().click();  
        //alert(t);
        jQuery.blockUI({ 
            message: jQuery('#yy'), 
            css: {
                background: 'none',
                border: 'none',
                top: '20%',
                left: '35%' ,
                width:'60%',
                cursor:'auto',
            }             
        });


    }
    
    
        function addcode2(code)
    {
        //alert(code);
        var type='service';
        code="<?php echo base_url(); ?>"+"affiliates/"+type+"/"+code;
        jQuery('#fe_text').val('');  
        jQuery('#fe_text').val(code);
        jQuery('#yy').css('display','none');
        //var t=jQuery('#d_clip_button').after().next().html();
        //jQuery('#d_clip_button').after().next().click();  
        //alert(t);
        jQuery.blockUI({ 
            message: jQuery('#yy'), 
            css: {
                background: 'none',
                border: 'none',
                top: '20%',
                left: '35%' ,
                width:'60%',
                cursor:'auto',
            }             
        });


    }
    
    
    function closeui()
    {
        jQuery.unblockUI();
    }

</script>
<div id="yy" style="display:block; width: 200px; height:90px; float: left; background:#ccc; margin:5px 10px;" >
    <br> <input id="fe_text" onChange="clip.setText(this.value)" type="text"/>

    <div id="d_clip_container"  style="position:relative; width: 145px;">
        <div id="d_clip_button" style="width: 145px; background: #333; color: #fff; margin:5px 10px 5px 28px; font-size:10px; text-transform:uppercase; text-align: center;cursor:pointer;" class="my_clip_button"><b>Copy To Clipboard</b></div>
    </div>  
    <div style="width:50px; height:16px; float: left; background: red; font-weight: bold; font-size: 10px;  margin-left:75px; color: #fff; text-transform: uppercase; cursor: pointer;" onclick="closeui()" >Close</div>
</div>

<div id="main">

    <div id="content">

        <?php 
            echo validation_errors('<div class="fild_err">', '</div>');
            if(!empty($s_msg)){
                echo '<div id="error" class="fild_err">'.$s_msg.'</div>';
            }
            echo show_msg();
        ?>

        <div class="content_block">

            <h2 class="">Affiliate Manager</h2>
            <form id="formID" action="<?php echo admin_url() ?>affiliate/search" method="post" >
                <div class="fild_name" style="width: 80px;"><span class="red">*</span>Search :</div>


                <div class="fild_text"><input id="search" name="search" type="text" class="validate[required] text-input" class1="text_fild" /></div>
                <div class="lft"><input name="sub_add" type="submit" value="Submit" class="but2" /></div> 
            </form> 
            <div class="clear"></div>

            <div style="margin: 50px 0 0 0;">

                <form id="formID1" action="" method="post" >
                    <div class="fild_name" style="float: none; margin: 0 20px 0 0;" >Date Filtering :</div> 

                    <div class="fild_name" style="float: none; margin: 0 20px 0 0;" ><span class="red">*</span>From :</div>


                    <div class="fild_text" style="margin: -20px 0 0 80px;"><input id="sdate" name="sdate" type="text" class="validate[required] text-input" class1="text_fild22" value="<?php echo set_value('sdate'); ?>" readonly="readonly" /></div>

                    <div class="fild_name" style="float: none; margin: 0 20px 0 0;" ><span class="red">*</span>To:</div> 
                    <div class="fild_text" style="margin: -20px 0 0 80px;"><input id="fdate" name="fdate" type="text" class="validate[required] text-input" class1="text_fild22" value="<?php echo set_value('fdate'); ?>" readonly="readonly" /></div>

                    <div class="clr"></div>
                    <div><input name="sub_add" type="submit" value="Submit" class="but2" style="margin: 0px 0 0 0;" /></div> 
                </form> 

            </div>

            <div class="but3" style="margin-bottom:10px;"><a href="<?php echo admin_url(); ?>affiliate/add.html" id="select_admin">Add Affiliate</a></div>
            <div class="but3" style="margin-bottom:10px;"><a href="<?php echo admin_url(); ?>affiliate/download" id="select_admin">CSV Download</a></div>
            <?php if(!empty($m_dataset)){ ?>
                <table id="table_liquid" cellspacing="0">
                    <caption>&nbsp;</caption>
                    <tr>
                        <th width="5%" align="center">Affiliate ID</th>
                        <th width="5%" align="center">Affiliate Name</th>
                        <th width="5%" align="center">Affiliate Email</th> 
                        <th width="7%" align="center">Affiliate Date</th>
                        <th width="7%" align="center">Prdocuct Affiliate Code</th> 
                        <th width="7%" align="center">SEO Affiliate Code</th>    
                        <th width="7%" align="center">Service Affiliate code</th>                                
                        <th width="16%" align="center">Action</th>
                    </tr>
                    <?php foreach($m_dataset as $m_row){ ?>
                        <tr>
                            <td style="border-left:1px solid #959595"><?php echo $m_row['i_aff_id']; ?></td>
                            <td><?php echo $m_row['s_aff_name']; ?></td>
                            <td><?php echo $m_row['s_aff_email']; ?></td>  
                            <td><?php echo $m_row['t_aff_time']; ?></td>
                            <td><?php echo $m_row['s_aff_url']; ?></td>    
                            <td><?php echo $m_row['s_seo_aff_url']; ?></td>  
                            <td><?php echo $m_row['s_service_aff_url']; ?></td>                 

                            <td>
                                <div style="height:35px; margin:0 auto"> 
                                <?php if($m_row['s_aff_url']!=""){ ?>
                                    <div class="but1"><a onclick="addcode('<?php echo $m_row['s_aff_url']; ?>')" style="cursor:pointer" id="<?php echo $m_row['i_aff_id']; ?>"   >Get Product Affiliate URL</a></div>
                                <?php } ?>    
                                <?php if($m_row['s_seo_aff_url']!=""){ ?>
                                    <div class="but1"><a onclick="addcode1('<?php echo $m_row['s_seo_aff_url']; ?>')" style="cursor:pointer" id="<?php echo $m_row['i_aff_id']; ?>"   >Get SEO Affiliate URL</a></div>
                                <?php } ?>   
                                <?php if($m_row['s_service_aff_url']){ ?> 
                                    <div class="but1"><a onclick="addcode2('<?php echo $m_row['s_service_aff_url']; ?>')" style="cursor:pointer" id="<?php echo $m_row['i_aff_id']; ?>"   >Get Service Affiliate URL</a></div>
                                 <?php } ?>   
                                    <?php if(is_superadmin()){ ?>  
                                        <div class="but1"><a href="<?php echo admin_url()?>affiliate/edit/<?php echo strEncode($m_row['i_aff_id']);?>">Edit</a></div>
                                        <div id="demo2" class="but1"><a href="javascript:void()" onclick="getDelPopUp('<?php echo strEncode($m_row['i_aff_id']);?>')">Delete</a></div>
                                        <?php } ?>        
                                </div>
                            </td>

                        </tr>
                        <?php } ?>
                </table>
                <?php }else{ ?>
                <h2>Element Is Not Found</h2>
                <?php } ?>
        </div>
        <div style="display:none;">
            <div id="add_Form2" class="pop_bg3" >
                <h6>Affiliation URL</h6>
                <div style="position:absolute; width:35px; height:35px; top:-10px; right:-15px;"><a href="javascript:void()" onclick="jQuery.unblockUI()" ><img src="<?php echo base_url() ?>images/admin/closes.png" alt="" /></a></div>
                <form action="#" method="post" >
                    <div class="blok2">

                        <div class="text2" style="margin-top:5px;" >
                            <input name="" type="text" id="in_time" class="text_fildnew"  readonly="readonly" value="" />

                        </div>
                        <div class="clr"></div>

                    </div>

                </form> 

            </div>
        </div>
        <!--end content_block-->

        <div style="display:none;">
            <div id="add_Form3" class="pop_bg3" >
                <h6 style="text-align: center; text-transform: uppercase;">Are you confirm to delete?</h6>
                <div style="position:absolute; width:35px; height:35px; top:-10px; right:-15px;"></div>
                <form action="#" method="post" >
                    <div class="blok2">

                        <div class="text2" style="margin-top:5px;" >
                            <div style="width:100px; margin: 0 auto;">
                                <div id="act1" class="but1">Yes</div>
                                <div id="" class="but1"><a href="javascript:void()" onclick="jQuery.unblockUI()" >No</a></div>
                            </div>
                        </div>
                        <div class="clr"></div>

                    </div>

                </form> 

            </div>
        </div>

        <div class="pagination"> 

            <?php

                echo $this->pagination->create_links();
            ?>

        </div> 






        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>