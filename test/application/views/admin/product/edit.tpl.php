<script type="text/javascript">

    jQuery(function(){


       jQuery(".dForm").validationEngine();
       
       jQuery('.pacReplica:first').children('.fild_text').children('.delref').remove();
       jQuery('.pacReplica:first').children('.fild_text').children('input[name="duration[]"]').val('Monthly');
       jQuery('.pacReplica:first').children('.fild_text').children('input[name="duration[]"]').attr('readonly',true);
       
       jQuery('.pacOffReplica:first').children('.fild_text').children('.delref').remove();
       jQuery('.pacOffReplica:first').children('.fild_text').children('input[name="duration_off_page[]"]').val('Monthly');
       jQuery('.pacOffReplica:first').children('.fild_text').children('input[name="duration_off_page[]"]').attr('readonly',true);
       
       jQuery('.pacOnReplica:first').children('.fild_text').children('.delref').remove();
       jQuery('.pacOnReplica:first').children('.fild_text').children('input[name="duration_on_page[]"]').val('Monthly');
       jQuery('.pacOnReplica:first').children('.fild_text').children('input[name="duration_on_page[]"]').attr('readonly',true);


    }) ;


    function addFReplica(e)
    {
        jQuery(".replica:last").after(jQuery(".replica:first").clone(true));
        jQuery(".replica:last input[type='text']").val('');
    }

    function delFReplica(obj)
    {
        if(jQuery(".replica").length>1){
            jQuery(obj).parent().parent().remove();
        }
        else{
            alert('Minimum one feature is mandatory');
        }
    }

    function addPReplica()
    {
        jQuery(".pacReplica:last").after(jQuery(".pacReplica:first").clone(true));
        jQuery(".pacReplica:last input[type='text']").val('');
        jQuery(".pacReplica:last .fild_name").html('<span class="red">*</span>Package '+jQuery(".pacReplica").length+'   : ');
        jQuery(".pacReplica:last input[name='duration[]']").attr('readonly',false);
        jQuery(".pacReplica:last .fild_text").append('<a class="delref" href="javascript:void(0);" onclick="delPReplica(this)">Delete</a>');
    }

    function delPReplica(obj)
    {
        if(jQuery(".pacReplica").length>1){
            i=1;
            jQuery(obj).parent().parent().remove();
            jQuery(".pacReplica").each(function(){
                jQuery(this).children('.fild_name').html('<span class="red">*</span>Package '+(i++)+'   : ');
            });
        }
        else{
            alert('Minimum one package is mandatory');
        }
    }


    function addOffPReplica()
    {
        jQuery(".pacOffReplica:last").after(jQuery(".pacOffReplica:first").clone(true));
        jQuery(".pacOffReplica:last input[type='text']").val('');
        jQuery(".pacOffReplica:last .fild_name").html('<span class="red">*</span>Package '+jQuery(".pacOffReplica").length+'   : ');
        jQuery(".pacOffReplica:last input[name='duration_off_page[]']").attr('readonly',false);
        jQuery(".pacOffReplica:last .fild_text").append('<a class="delref"  href="javascript:void(0);" onclick="deloffPReplica(this)">Delete</a>');
    }

    function deloffPReplica(obj)
    {
        if(jQuery(".pacOffReplica").length>1){
            i=1;
            jQuery(obj).parent().parent().remove();
            jQuery(".pacOffReplica").each(function(){
                jQuery(this).children('.fild_name').html('<span class="red">*</span>Package '+(i++)+'   : ');
            });
        }
        else{
            alert('Minimum one package is mandatory');
        }
    }


    function addOnPReplica()
    {
        jQuery(".pacOnReplica:last").after(jQuery(".pacOnReplica:first").clone(true));
        jQuery(".pacOnReplica:last input[type='text']").val('');
        jQuery(".pacOnReplica:last .fild_name").html('<span class="red">*</span>Package '+jQuery(".pacOnReplica").length+'   : ');
        jQuery(".pacOnReplica:last input[name='duration_on_page[]']").attr('readonly',false);
        jQuery(".pacOnReplica:last .fild_text").append('<a class="delref"  href="javascript:void(0);" onclick="delonPReplica(this)">Delete</a>');
    }

    function delonPReplica(obj)
    {
        if(jQuery(".pacOnReplica").length>1){
            i=1;
            jQuery(obj).parent().parent().remove();
            jQuery(".pacOnReplica").each(function(){
                jQuery(this).children('.fild_name').html('<span class="red">*</span>Package '+(i++)+'   : ');
            });
        }
        else{
            alert('Minimum one package is mandatory');
        }
    }

</script>
<div id="main">
    <div id="content">                        
        <div class="content_block">
            <h2 class="">Edit Product </h2>
            <div class="add_detbg">
                <div class="pro_add">
                    <?php 
                        echo validation_errors('<div class="fild_err" style="width:500px;">', '</div>'); 
                        if(!empty($s_msg)){
                            echo '<div id="error" class="fild_err" style="width:500px;">'.$s_msg.'</div>';
                        }
                    ?>                                    
                    <div class="requar"><span class="red">*</span>Required fields</div><br /><div class="form_div">
                        <div class="fild_name"><span class="red">*</span>Category Name :</div>
                        <!--<input type="text" id="req" name="req" class="validate[required] text-input" value=""> -->

                        <div class="fild_text"><?php echo $category_list[0]['cat_name']?>
                            </div>
                        <div class="clr"></div>
                    </div>
                    <?php if($category_list[0]['id']==1)
                    {
                        if(count($m_dataset))
                        {
                        ?>
                    <div id="form_1" class="dForm" >
                        <form class="formID" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="cat_id" value="<?php echo $category_list[0]['id'] ?>">
                            <input type="hidden" name="prev_image" value="<?php echo $m_dataset[0]['image']?>">
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Platform Name :</div>
                                <div class="fild_text"><input id="product_name" name="product_name" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('product_name',$m_dataset[0]['name']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Price :</div>
                                <div class="fild_text"><input id="product_price" name="product_price" type="text" class="validate[required,custom[number]] text-input" class1="text_fild" value="<?php echo set_value('product_price',$m_dataset[0]['price']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Transaction charge :</div>
                                <div class="fild_text"><input id="transaction_charge" name="transaction_charge" type="text" class="validate[required,custom[number]] text-input" class1="text_fild" value="<?php echo set_value('transaction_charge',$m_dataset[0]['transaction_charge']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Instllation Charge :</div>
                                <div class="fild_text"><input id="product_insCharge" name="product_insCharge" type="text" class="validate[required,custom[number]] text-input" class1="text_fild" value="<?php echo set_value('product_insCharge',$m_dataset[0]['insall_charge']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Platform Cost :</div>
                                <div class="fild_text"><input id="product_platCost" name="product_platCost" type="text" class="validate[required,custom[number]] text-input" class1="text_fild" value="<?php echo set_value('product_platCost',$m_dataset[0]['platform_cost']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product Description :</div>
                                <div class="fild_text">
                                    <textarea name="product_desc" id="product_desc" style="height: 100px; width: 294px;" class="validate[required] text-input"><?php echo set_value('product_desc',$m_dataset[0]['description'])?></textarea> 
                                </div>
                                <div class="clr"></div>
                            </div> 
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product  Image :</div>
                                <div class="fild_text"><img src="<?php echo base_url()?>uploads/product_image/thumb/<?php echo $m_dataset[0]['image']?>" style=" max-height: 100px; max-width: 100px;" alt=""></div>
                                <div class="clr"></div>
                            </div>     
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product  Image Upload :</div>
                                <div class="fild_text"><input  name="userfile" id="userfile" type="file"  /></div>
                                <div class="clr"></div>
                            </div>    
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product Feature Title :</div>
                                <div class="fild_text">
                                    <textarea name="product_feture" id="product_feture" style="height: 60px; width: 294px;" class="validate[required] text-input"><?php echo set_value('product_feture',$m_dataset[0]['feature'])?></textarea> 
                                </div>
                                <div class="clr"></div>
                            </div>  
                            <?php if(count($features)) 
                            {
                            foreach($features as $row_feature)  
                            {?> 
                            <div class="form_div replica">
                                <div class="fild_name"><span class="red">*</span>Features :</div>
                                <div class="fild_text"><input name="fetures[]" id="feature" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('fetures[0]',$row_feature['value'])?>" /></div>
                                <div class="fild_text"><a href="javascript:void(0);" onclick="addFReplica(this)">Add</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="delFReplica(this)">Delete</a></div>
                                <div class="clr"></div>
                            </div>
                            <?php }}?>
                            <div class="form_div">
                                <div class="fild_name">&nbsp;</div>
                                <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="clr"></div>
                        </form>   

                    </div>
                    <?php } } ?>
                    
                    
                            <?php if($category_list[0]['id']==2)
                    {
                        if(count($m_dataset))
                        {
                        ?>
          
                    <div id="form_2"  class="dForm" >
                        <form class="formID" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="cat_id" value="<?php echo $category_list[0]['id'] ?>">
                            <input type="hidden" name="prev_image" value="<?php echo $m_dataset[0]['image']?>">

                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Design Name :</div>
                                <div class="fild_text"><input id="product_name" name="product_name" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('product_name',$m_dataset[0]['name']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Price :</div>
                                <div class="fild_text"><input id="product_price" name="product_price" type="text" class="validate[required,custom[number]] text-input" class1="text_fild" value="<?php echo set_value('product_price',$m_dataset[0]['price']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Coding Only Price :</div>
                                <div class="fild_text"><input id="product_codePrice" name="product_codePrice" type="text" class="validate[required,custom[number]] text-input" class1="text_fild" value="<?php echo set_value('product_codePrice',$m_dataset[0]['codeonly_price']); ?>" /></div>
                                <div class="clr"></div>
                            </div>
                            <?php
                            $m_dataset[0]['page_range'];
                            $m_dat=array();
                            $m_dat=explode(' - ',$m_dataset[0]['page_range']);
                            ?>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Page Range :</div>
                                <div class="fild_text"><input id="pagerange_from" name="pagerange_from" type="text" class="validate[required,custom[integer]] text-input" class1="text_fild" value="<?php echo set_value('pagerange_from',$m_dat[0]); ?>" style="width: 50px; margin-right: 25px;" /><input id="pagerange_to" name="pagerange_to" type="text" class="validate[required,custom[integer]] text-input" class1="text_fild" value="<?php echo set_value('pagerange_to',$m_dat[1]); ?>" style="width: 50px;" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product Description :</div>
                                <div class="fild_text">
                                    <textarea name="product_desc" id="product_desc" style="height: 100px; width: 294px;" class="validate[required] text-input"><?php echo set_value('product_desc',$m_dataset[0]['description'])?></textarea> 
                                </div>
                                <div class="clr"></div>
                            </div>      
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product  Image :</div>
                                <div class="fild_text"><img src="<?php echo base_url()?>uploads/product_image/thumb/<?php echo $m_dataset[0]['image']?>" style=" max-height: 100px; max-width: 100px;" alt=""></div>
                                <div class="clr"></div>
                            </div>  
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product  Image Upload :</div>
                                <div class="fild_text"><input  name="userfile" id="userfile" type="file"   /></div>
                                <div class="clr"></div>
                            </div>  
                            <div class="form_div">
                                <div class="fild_name">&nbsp;</div>
                                <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="clr"></div>
                        </form>   

                    </div>
                    <?php }}
                    ?>

                                            <?php if($category_list[0]['id']==3)
                    {
                        if(count($m_dataset))
                        {
                        ?>

                    <div id="form_3"  class="dForm" >
                        <form class="formID" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="cat_id" value="<?php echo $category_list[0]['id'] ?>">
                            <input type="hidden" name="prev_image" value="<?php echo $m_dataset[0]['image']?>">

                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Content Name :</div>
                                <!--<input type="text" id="req" name="req" class="validate[required] text-input" value=""> -->

                                <div class="fild_text"><input id="product_name" name="product_name" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('product_name',$m_dataset[0]['name']); ?>" /></div>
                                <div class="clr"></div>
                            </div>

                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product Description :</div>
                                <div class="fild_text">
                                    <textarea name="product_desc" id="product_desc" style="height: 100px; width: 294px;" class="validate[required] text-input"><?php echo set_value('product_desc',$m_dataset[0]['description'])?></textarea> 
                                </div>
                                <div class="clr"></div>
                            </div>      
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Packages : </div>
                                <div class="fild_text">
                                    <a href="javascript:void(0);" onclick="addPReplica(this)">Add Package</a> 
                                </div>
                                <div class="clr"></div>
                            </div> 
                            <?php if(count($package))
                            {
                                foreach($package as $row_package)
                            {?> 
                            <div class="form_div pacReplica">
                                <div class="fild_name"><span class="red">*</span>Package 1   : </div>
                                <div class="fild_text">Duration : <input id="duration_1" name="duration[]" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('duration[0]',$row_package['duration']); ?>" /><br>Price : <input id="price_1" name="price[]" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('price[0]',$row_package['price']); ?>" /><a class="delref" href="javascript:void(0);" onclick="delPReplica(this)">Delete</a></div>
                                <div class="clr"></div>
                            </div>   
                            <?php }}?>
                            <div class="form_div">
                                <div class="fild_name">&nbsp;</div>
                                <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="clr"></div>
                        </form>   

                    </div>
                    <?php }}?>
                    
                    <?php if($category_list[0]['id']==4)
                    {
                        if(count($m_dataset))
                        {
                        ?>


                    <div id="form_4"  class="dForm" >
                        <form class="formID" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="cat_id" value="<?php echo $category_list[0]['id'] ?>">
                            <input type="hidden" name="prev_image" value="<?php echo $m_dataset[0]['image']?>">

                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Marketting Name :</div>
                                <!--<input type="text" id="req" name="req" class="validate[required] text-input" value=""> -->

                                <div class="fild_text"><input id="product_name" name="product_name" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('product_name',$m_dataset[0]['name']); ?>" /></div>
                                <div class="clr"></div>
                            </div>

                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Product Description :</div>
                                <div class="fild_text">
                                    <textarea name="product_desc" id="product_desc" style="height: 100px; width: 294px;" class="validate[required] text-input"><?php echo set_value('product_desc',$m_dataset[0]['description'])?></textarea> 
                                </div>
                                <div class="clr"></div>
                            </div>      
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>Off Page Packages : </div>
                                <div class="fild_text">
                                    <a href="javascript:void(0);" onclick="addOffPReplica(this)">Add Package</a> 
                                </div>
                                <div class="clr"></div>
                            </div> 
                            <?php if(count($package))
                            {   $i=0;
                                foreach($package as $row_marketting)
                                {
                                if($row_marketting['status']==1)
                                {    $i++;
                            ?>  
                            <div class="form_div pacOffReplica">
                                <div class="fild_name"><span class="red">*</span>Package <?php echo $i;?>   : </div>
                                <div class="fild_text">Duration : <input id="durationoff_1" name="duration_off_page[]" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('duration[0]',$row_marketting['duration']); ?>" /><br>Price : <input id="price_1" name="price_off_page[]" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('price[0]',$row_marketting['price']); ?>" /><a class="delref"  href="javascript:void(0);" onclick="deloffPReplica(this)">Delete</a></div>
                                <div class="clr"></div>
                            </div>   
                            <?php }}}?>
                            
                            
                            <div class="form_div">
                                <div class="fild_name"><span class="red">*</span>On Page Packages : </div>
                                <div class="fild_text">
                                    <a href="javascript:void(0);" onclick="addOnPReplica(this)">Add Package</a> 
                                </div>
                                <div class="clr"></div>
                            </div>  
                                                       <?php if(count($package))
                            {       $i=0;
                                foreach($package as $row_marketting)
                                {
                                if($row_marketting['status']==2)
                                {
                                    $i++;
                            ?>  
 
                            <div class="form_div pacOnReplica">
                                <div class="fild_name"><span class="red">*</span>Package <?php echo $i;?>   : </div>
                                <div class="fild_text">Duration : <input id="durationon_1" name="duration_on_page[]" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('duration[0]',$row_marketting['duration']); ?>" /><br>Price : <input id="price_1" name="price_on_page[]" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('price[0]',$row_marketting['price']); ?>" /><a class="delref"  href="javascript:void(0);" onclick="delonPReplica(this)">Delete</a></div>
                                <div class="clr"></div>
                            </div> 
                            <?php }}}?>  

                            <div class="form_div">
                                <div class="fild_name">&nbsp;</div>
                                <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /></div>
                                <div class="clr"></div>
                            </div>
                            <div class="clr"></div>
                        </form>   

                    </div>
                    <?PHP }}?>
                </div>


            </div>
        </div>
        <!--end content_block-->


        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>