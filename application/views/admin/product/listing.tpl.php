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

    function getDelPopUp(e){


        var id = jQuery(e).attr('id');   
        var image_name = jQuery(e).attr('image_name');  
        var cat_id = jQuery(e).attr('cat_id');  
        // alert(id); 
        //alert(image_name);

        if(jQuery("#act1").text()=="Yes"){
            jQuery("#act1").wrapInner("<a href='<?php echo admin_url();?>product/del/"+id+"/"+image_name+"/"+cat_id+"'></a>");
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


    function getProductDetails()
    {
        var cat_id=  jQuery('#cat_id').val();
        window.location.href='<?php echo base_url()?>admin/product/listing/'+cat_id;
        // var cat_id=cat_id; 
        //  alert(cat_id);

    }     
    
    
    function add_contract(e)
    {
       //html = jQuery(e).closest('div').next('div').html(); 
       jQuery(e).closest('div').next('div').css('display','block'); 

//        jQuery.blockUI({ 
//            message: jQuery(html), 
//            css: {
//                background: 'none',
//                border: 'none',
//                top: '20%',
//                left: '35%' ,
//                width:'60%',
//                cursor:'auto',
//            }             
//        });
    }
    
    function set_order(e)
    {
       html = jQuery(e).closest('div').next('div').html(); 

        jQuery.blockUI({ 
            message: jQuery(html), 
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
    
    
</script>


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

            <h2 class="">Product Manager</h2>
            <div style="width: 100%; height: auto;">
                <div style="width: 50%; float: left;">
                    <!--<form id="formID" action="" method="get" >
                        <div class="fild_name" style="width: 80px;"><span class="red">*</span>Search :</div>


                        <div class="fild_text"><input id="search" name="search" type="text" class="validate[required] text-input" class1="text_fild" /></div>
                        <div class="lft"><input type="submit" value="Submit" class="but2" /></div> 
                    </form>--> 
                    <div class="clear"></div>
                </div>
                <div style="width: 50%; float: right; text-align: right;">
                    Select Category : 
                    <select id="cat_id" onchange="getProductDetails(this)">
                        <?php if(count($category))
                            {

                                foreach($category as $m_row1){ 

                                ?>
                                <option value="<?php echo $m_row1['id'] ?>" <?php if($m_row1['id']==$category_single){?> selected="selected" <?php } ?>><?php echo ucwords($m_row1['cat_name'])?></option>
                                <?php } }?>
                    </select>
                    <div class="clear"></div>
                </div>
            </div>

             
            <?php 
                if($category_single==1)
                {

                    if(!empty($m_dataset)){
                    ?>
                    <table id="table_liquid" cellspacing="0">
                        <caption>&nbsp;</caption>
                        <tr>
                            <th width="5%" align="center">Product</th> 
                            <th width="18%" align="center">Price</th>
                            <th width="25%" align="center">Description </th>    
                            <th width="25%" align="center">Feature</th>                                

                            <th width="18%" align="center">Action</th>
                        </tr>
                        <?php foreach($m_dataset as $m_row){ 

                                 
                            ?>
                            <tr>
                                <td style="border-left:1px solid #959595; vertical-align: top; padding-top: 5px;"><div style="display: table-cell; text-align: center; vertical-align: middle; border: #AAA 2px solid;height: 105px; width: 105px; background-color: #EAEAEA; "><img src="<?php echo base_url()?>uploads/product_image/thumb/<?php echo $m_row['image']; ?>" alt="" style="max-height: 100px; max-width: 100px;"></div><b><?php echo ucwords($m_row['name']); ?></td>
                                <td style="vertical-align: top; padding-top: 5px;">
                                Platform Cost -  $<?php echo $m_row['price']; ?><br>
                                Per Transaction -  $<?php echo $m_row['insall_charge']; ?><br>
                                Transaction Charge -  $<?php echo $m_row['transaction_charge']; ?><br>
                                Monthly Hosting -  $<?php echo $m_row['platform_cost']; ?><br>
                                
                                </td>  
                                <td style="vertical-align: top; padding-top: 5px;"><?php echo $m_row['description']; ?></td>    
                                <td style="vertical-align: top; padding-top: 5px; padding-left:25px;"><?php echo '<ul>'. $m_row['feature'].'</ul>'; ?>

                                    <?php
                                        if(count($features[$m_row['id']]))
                                        {
                                            foreach($features[$m_row['id']] as $row)
                                            {
                                                echo '<li>'.$row['value'].'</li>';
                                            }
                                        }
                                    ?>

                                </td>  


                                <td style="vertical-align: top; padding-top: 5px;">
                                    <div style="height:35px; margin:0 auto"> 
                                     <?php if($m_row['i_active']==1){ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/disallow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/active.png" alt="Active"></a>
                                        <?php }else{ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/allow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/inactive.png" alt="Inactive"></a>
                                        <?php } ?>
                                        <?php if(is_superadmin()){ ?>
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit/<?php echo strEncode($m_row['id']);?>/<?php echo strEncode($category_single)?>">Edit</a></div>
                                            <div id="demo2" class="but1"><a  image_name="<?php  echo strEncode($m_row['image']) ?>" id="<?php echo strEncode($m_row['id']) ?>" cat_id="<?php echo strEncode($category_single)?>" href="javascript:void(0)" onclick="getDelPopUp(this)">Delete</a></div>
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit-contract/<?php echo strEncode($m_row['id']);?>">Add Contract</a></div>
                                            <div class="but1"><a href="javascript:void(0);" onclick="set_order(this)">Set Order</a></div> 
                                            <div style="display: none; ">
                                            <div>
                                            <div style="background: #fff; border-radius:10px; border: solid 3px #ccc; width: 400px; padding: 10px; position: relative; ">
                                            <img src="<?php echo base_url(); ?>images/pop_close.png" alt="" style="position: absolute; top: -16px; right: -16px; cursor: pointer;" onclick="jQuery.unblockUI()">
                                            <h2 style="text-align: left;">Set Order</h2>
                                            <form action="<?php echo admin_url()?>product/set_order" method="post">
                                                <input type="hidden" name="product_id" value="<?php echo $m_row['id']; ?>">
                                                <input type="hidden" name="current_url" value="<?php echo current_url(); ?>">
                                                Enter Order No : <input type="text" name="order" value="<?php echo $m_row['order']; ?>">
                                                <div style="clear: both;"></div>
                                                <input type="submit" value="Set" class="but2" style=" margin: 0 0 0 5px;"><input type="button" value="Cancel" onclick="jQuery.unblockUI()" class="but2" style=" margin: 0 0 0 5px;">
                                                <div style="clear: both;"></div>  
                                            </form>
                                            </div>  
                                            </div>
                                            </div>
                                            <?php } ?>
                                    </div>
                                </td>

                            </tr>
                            <?php } ?>
                    </table>
                    <?php } else{ ?>
                <h2>Element Is Not Found</h2>
                <?php } } ?>



            <?php 

                if($category_single==2)
                {
                    if(!empty($m_dataset)){ 

                    ?>


                    
                    <table id="table_liquid" cellspacing="0">
                        <caption>&nbsp;</caption>
                        <tr>
                            <th width="5%" align="center">Product</th> 
                            <th width="18%" align="center">Price</th>
                            <th width="5%" align="center">Page Range</th>

                            <th width="57%" align="center">Prdocuct Description </th>    

                            <th width="20%" align="center">Action</th>
                        </tr>
                        <?php foreach($m_dataset as $m_row){ 


                            ?>
                            <tr>
                                <td style="border-left:1px solid #959595; vertical-align: top; padding-top: 5px;"><div style="display: table-cell; text-align: center; vertical-align: middle; border: #AAA 2px solid;height: 105px; width: 105px; background-color: #EAEAEA; "><img src="<?php echo base_url()?>uploads/product_image/thumb/<?php echo $m_row['image']; ?>" alt="" style="max-height: 100px; max-width: 100px;"></div>
                                <b><?php echo $m_row['name']; ?></b></td>
                                <td style="vertical-align: top; padding-top: 5px;">
                                Price - $<?php echo $m_row['price']; ?><br>
                                Code Only Price - $<?php echo $m_row['codeonly_price']; ?><br>
                                </td>  
                                <td style="vertical-align: top; padding-top: 5px;"><?php echo $m_row['page_range']; ?></td>

                                <td><?php echo put_safe($m_row['description']); ?></td>
                                <td>
                                    <div style="height:35px; margin:0 auto"> 
                                     <?php if($m_row['i_active']==1){ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/disallow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/active.png" alt="Active"></a>
                                        <?php }else{ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/allow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/inactive.png" alt="Inactive"></a>
                                        <?php } ?>
                                        <?php if(is_superadmin()){ ?>  
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit/<?php echo strEncode($m_row['id']);?>/<?php echo strEncode($category_single)?>">Edit</a></div>
                                            <div id="demo2" class="but1"><a  image_name="<?php  echo strEncode($m_row['image']) ?>" cat_id="<?php echo strEncode($category_single)?>" id="<?php echo strEncode($m_row['id']) ?>" href="javascript:void(0)" onclick="getDelPopUp(this)">Delete</a></div>
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit-contract/<?php echo strEncode($m_row['id']);?>">Add Contract</a></div>
                                            <div class="but1"><a href="javascript:void(0);" onclick="set_order(this)">Set Order</a></div>
                                            <div style="display: none; ">
                                            <div>
                                            <div style="background: #fff; border-radius:10px; border: solid 3px #ccc; width: 400px; padding: 10px; position: relative; ">
                                            <img src="<?php echo base_url(); ?>images/pop_close.png" alt="" style="position: absolute; top: -16px; right: -16px; cursor: pointer;" onclick="jQuery.unblockUI()">
                                            <h2 style="text-align: left;">Set Order</h2>
                                            <form action="<?php echo admin_url()?>product/set_order" method="post">
                                                <input type="hidden" name="product_id" value="<?php echo $m_row['id']; ?>">
                                                <input type="hidden" name="current_url" value="<?php echo current_url(); ?>">
                                                Enter Order No : <input type="text" name="order" value="<?php echo $m_row['order']; ?>">
                                                <div style="clear: both;"></div>
                                                <input type="submit" value="Set" class="but2" style=" margin: 0 0 0 5px;"><input type="button" value="Cancel" onclick="jQuery.unblockUI()" class="but2" style=" margin: 0 0 0 5px;">
                                                <div style="clear: both;"></div>  
                                            </form>
                                            </div>  
                                            </div>
                                            </div>
                                            <?php } ?>        
                                    </div>
                                </td>

                            </tr>
                            <?php } ?>
                    </table>
                    <?php }else{ ?>
                <h2>Element Is Not Found</h2>
                <?php }} ?>

            <?php 
                if($category_single==3)
                {

                    if(!empty($m_dataset)){
                    ?>
                    <table id="table_liquid" cellspacing="0">
                        <caption>&nbsp;</caption>
                        <tr>
                            <th width="5%" align="center">Product Name</th>
                            <th width="17%" align="center">Prdocuct Description </th>    
                            <th width="37%" align="center">Product Package</th>
                            <th width="26%" align="center">Action</th>
                        </tr>
                        <?php foreach($m_dataset as $m_row){ 


                            ?>
                            <tr>
                                <td><?php echo $m_row['name'];?></td>
                                <td><?php echo $m_row['description'];?></td>
                                <td><ul>
                                        <?php
                                            foreach(@$package[$m_row['id']] as $pacList)
                                            {
                                            ?>
                                            <li style="list-style: none; margin-left: 15px;"><?php echo $pacList['duration'];?> - <?php echo $pacList['price'];?></li><br>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                    <div style="height:35px; margin:0 auto"> 
                                     <?php if($m_row['i_active']==1){ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/disallow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/active.png" alt="Active"></a>
                                        <?php }else{ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/allow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/inactive.png" alt="Inactive"></a>
                                        <?php } ?>
                                        <?php if(is_superadmin()){ ?>  
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit/<?php echo strEncode($m_row['id']);?>/<?php echo strEncode($category_single)?>">Edit</a></div>
                                            <div id="demo2" class="but1"><a  image_name="<?php  echo strEncode($m_row['image']) ?>" cat_id="<?php echo strEncode($category_single)?>" id="<?php echo strEncode($m_row['id']) ?>" href="javascript:void(0)" onclick="getDelPopUp(this)">Delete</a></div>
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit-contract/<?php echo strEncode($m_row['id']);?>">Add Contract</a></div>
                                            <div class="but1"><a href="javascript:void(0);" onclick="set_order(this)">Set Order</a></div>
                                            <div style="display: none; ">
                                            <div>
                                            <div style="background: #fff; border-radius:10px; border: solid 3px #ccc; width: 400px; padding: 10px; position: relative; ">
                                            <img src="<?php echo base_url(); ?>images/pop_close.png" alt="" style="position: absolute; top: -16px; right: -16px; cursor: pointer;" onclick="jQuery.unblockUI()">
                                            <h2 style="text-align: left;">Set Order</h2>
                                            <form action="<?php echo admin_url()?>product/set_order" method="post">
                                                <input type="hidden" name="product_id" value="<?php echo $m_row['id']; ?>">
                                                <input type="hidden" name="current_url" value="<?php echo current_url(); ?>">
                                                Enter Order No : <input type="text" name="order" value="<?php echo $m_row['order']; ?>">
                                                <div style="clear: both;"></div>
                                                <input type="submit" value="Set" class="but2" style=" margin: 0 0 0 5px;"><input type="button" value="Cancel" onclick="jQuery.unblockUI()" class="but2" style=" margin: 0 0 0 5px;">
                                                <div style="clear: both;"></div>  
                                            </form>
                                            </div>  
                                            </div>
                                            </div>
                                                                   <?php } ?>        
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                    </table>
                    <?php } else{ ?>
                    <h2>Element Is Not Found</h2>
                    <?php }} ?>

            <?php 
                if($category_single==4)
                {

                    if(!empty($m_dataset)){
                    ?>
                    <table id="table_liquid" cellspacing="0">
                        <caption>&nbsp;</caption>
                        <tr>
                            <th width="5%" align="center">Product Name</th>
                            <th width="17%" align="center">Prdocuct Description </th>    
                            <th width="30%" align="center">On Page Optimization</th>
                            <th width="30%" align="center">Off Page Optimization</th>
                            <th width="40%" align="center">Action</th>


                        </tr>
                        <?php foreach($m_dataset as $m_row){ 


                            ?>
                            <tr>

                                <td><?php echo $m_row['name']; ?></td>
                                <td><?php echo $m_row['description']; ?></td>  
                                <td><ul>
                                        <?php
                                            foreach(@$package[$m_row['id']] as $pacList)
                                            {
                                                if($pacList['status']==1)
                                                {
                                                ?>
                                                <li style="list-style: none; margin-left: 15px;"><?php echo $pacList['duration'];?> - <?php echo $pacList['price'];?></li><br>
                                                <?php
                                            }}
                                        ?>
                                    </ul>
                                </td>

                                <td><ul>
                                        <?php
                                            foreach(@$package[$m_row['id']] as $pacList)
                                            {
                                                if($pacList['status']==2)
                                                {

                                                ?>
                                                <li style="list-style: none; margin-left: 15px;"><?php echo $pacList['duration'];?> - <?php echo $pacList['price'];?></li><br>
                                                <?php
                                            }}
                                        ?>
                                    </ul>
                                </td>  



                                <td>
                                    <div style="height:35px; margin:0 auto"> 
                                     <?php if($m_row['i_active']==1){ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/disallow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/active.png" alt="Active"></a>
                                        <?php }else{ ?>
                                        <a href="<?php echo admin_url() ?>product/change_state/allow/<?php echo strEncode($m_row['id']); ?>/<?php echo strEncode(uri_string());?>"><img src="images/inactive.png" alt="Inactive"></a>
                                        <?php } ?>
                                        <?php if(is_superadmin()){ ?>  
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit/<?php echo strEncode($m_row['id']);?>/<?php echo strEncode($category_single)?>">Edit</a></div>
                                            <div id="demo2" class="but1"><a  image_name="<?php  echo strEncode($m_row['image']) ?>" cat_id="<?php echo strEncode($category_single)?>" id="<?php echo strEncode($m_row['id']) ?>" href="javascript:void(0)" onclick="getDelPopUp(this)">Delete</a></div>
                                            <div class="but1"><a href="<?php echo admin_url()?>product/edit-contract/<?php echo strEncode($m_row['id']);?>">Add Contract</a></div>
                                            <div class="but1"><a href="javascript:void(0);" onclick="set_order(this)">Set Order</a></div>
                                            <div style="display: none; ">
                                            <div>
                                            <div style="background: #fff; border-radius:10px; border: solid 3px #ccc; width: 400px; padding: 10px; position: relative; ">
                                            <img src="<?php echo base_url(); ?>images/pop_close.png" alt="" style="position: absolute; top: -16px; right: -16px; cursor: pointer;" onclick="jQuery.unblockUI()">
                                            <h2 style="text-align: left;">Set Order</h2>
                                            <form action="<?php echo admin_url()?>product/set_order" method="post">
                                                <input type="hidden" name="product_id" value="<?php echo $m_row['id']; ?>">
                                                <input type="hidden" name="current_url" value="<?php echo current_url(); ?>">
                                                Enter Order No : <input type="text" name="order" value="<?php echo $m_row['order']; ?>">
                                                <div style="clear: both;"></div>
                                                <input type="submit" value="Set" class="but2" style=" margin: 0 0 0 5px;"><input type="button" value="Cancel" onclick="jQuery.unblockUI()" class="but2" style=" margin: 0 0 0 5px;">
                                                <div style="clear: both;"></div>  
                                            </form>
                                            </div>  
                                            </div>
                                            </div>
                                            <?php } ?>        
                                    </div>
                                </td>

                            </tr>
                            <?php } ?>
                    </table>
                    <?php } else{ ?>
                    <h2>Element Is Not Found</h2>
                    <?php } } ?>


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