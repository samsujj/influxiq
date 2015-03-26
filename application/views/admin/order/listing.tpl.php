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
      
        //setTimeout("addcode1(45)",10);
        //   setTimeout("addcode(45,'product')",10);
        //setTimeout("jQuery.unblockUI()",110); 
        jQuery("#aff_name").change(function(){
            //alert(jQuery(this).val());
            jQuery("#formID").submit();
        })
        
    });


 /*   function addcode(code)
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
 */   


    function closeui()
    {
        jQuery.unblockUI();
    }

</script>
<?php /*
<div id="yy" style="display:block; width: 200px; height:90px; float: left; background:#ccc; margin:5px 10px;" >
    <br> <input id="fe_text" onChange="clip.setText(this.value)" type="text"/>

    <div id="d_clip_container"  style="position:relative; width: 145px;">
        <div id="d_clip_button" style="width: 145px; background: #333; color: #fff; margin:5px 10px 5px 28px; font-size:10px; text-transform:uppercase; text-align: center;cursor:pointer;" class="my_clip_button"><b>Copy To Clipboard</b></div>
    </div>  
    <div style="width:50px; height:16px; float: left; background: red; font-weight: bold; font-size: 10px;  margin-left:75px; color: #fff; text-transform: uppercase; cursor: pointer;" onclick="closeui()" >Close</div>
</div>
*/ ?>

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

            <h2 class="">Order Manager</h2>
            <div>
                <form id="formID" action="<?php echo admin_url() ?>order/search" method="post" >

                    <div class="fild_name" style="width: 180px;"><span class="red">*</span>Search By Affiliate Name:</div>


                    <div class="fild_text" style="width:220px;">
                        <select id="aff_name" name="aff_name">
                            <?php 
                                echo get_affiliate_name();
                            ?>
                        </select>
                    </div>
                     <input name="sub_add" type="button" value="Show all" class="but2" onclick="window.location.href='<?php echo admin_url(); ?>order/search/all'" />
                </form> 
            </div> 

            <div class="clear"></div>
            <?php if(!empty($m_dataset)){ 
                    $i=1;
                ?>
                <table id="table_liquid" cellspacing="0">
                    <caption>&nbsp;</caption>
                    <tr>
                        <th width="5%" align="center">ID</th>
                        <th width="5%" align="center">Customer Name</th>
                        <th width="5%" align="center">Customer Email</th> 
                        <th width="5%" align="center">Customer Phone</th> 
                        <th width="5%" align="center">Customer Signature</th> 
                        <th width="7%" align="center">Order Date</th>
                        <th width="7%" align="center">Product</th> 
                        <th width="7%" align="center">Price</th>     
                        <th width="7%" align="center">Affiliate Name</th>                           
                    </tr>
                    <?php foreach($m_dataset as $m_row){ ?>
                        <tr>
                            <td style="border-left:1px solid #959595"><?php echo $i; ?></td>
                            <td><?php echo $m_row['fname']." ".$m_row['lname']; ?></td>
                            <td><?php echo $m_row['email']; ?></td>  
                            <td><?php echo $m_row['phone']; ?></td>
                            <td><?php echo $m_row['signature']; ?></td>    
                            <td><?php echo $m_row['order_date']; ?></td>  
                            <td><?php 

                                    $prod_det=(unserialize($m_row['product'])); 
                                    $prod_name="";
                                    $str="";
                                    if(!empty($prod_det)){
                                        foreach($prod_det as $row){
                                            if($prod_name!=""){
                                                $str="+";
                                            }
                                            $prod_name.=$str.getProductName($row['prod_id']);
                                            //($prod_name);
                                        }
                                    }
                                    echo $prod_name;

                            ?></td>                 
                            <td><?php echo($m_row['price']); ?></td> 
                            <td><?php 
                                    echo($m_row['aff_name']);   

                            ?></td> 


                        </tr>
                        <?php 
                            $i++;
                    } ?>
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
