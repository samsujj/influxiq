<script type="text/javascript"> 
    jQuery(function(){
        jQuery('#sdate').datepicker(); 
        jQuery('#fdate').datepicker();  
    });

</script>
<?php  //pr($search_arr,true); ?>
<script type="text/javascript">
    jQuery.noConflict();

    function getDelPopUp(val){
        //var id = jQuery(this).attr('id');
        if(jQuery("#act1").text()=="Yes"){
            jQuery("#act1").wrapInner("<a href='<?php echo admin_url() ?>lead/del/"+val+"'></a>");
        }
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

    var admin_url='<?php echo admin_url(); ?>' ;

    function list_particular(obj){
        var aff_type = jQuery(obj).val();
        // aff_id=jQuery("#affid").val();
        //      jQuery('#affLtype').submit();
        //alert(aff_type);

        // window.location.href = admin_url+"lead/listing/"+aff_type+"/";
        jQuery('#formID2').submit();
    }



</script>
<div id="main">

    <div id="content">

        <?php 
            echo show_msg();
        ?>

        <div class="content_block">

            <h2 class="">Lead Manager</h2>
            <form id="formID" action="<?php echo admin_url() ?>lead/search" method="post">
                <div class="fild_name" style="width: 80px;"><span class="red">*</span> Search :</div>
                <div class="fild_text"><input id="search" name="search" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo $s_search; ?>" /></div>
            <div class="lft"><input name="sub_add" type="submit" value="Submit" class="but2" /></div>                                </form>   

          
            <div class="clear"></div>

            <div style="margin: 50px 0 0 0;">

                <form id="formID1" action="<?php echo admin_url(); ?>lead/listing" method="post" >
                    <div class="fild_name" style="float: none; margin: 0 20px 0 0;" > Date Filtering :</div> 
                    <div class="fild_name" style="float: none; margin: 0 20px 0 0;" ><span class="red">*</span> From :</div>


                    <div class="fild_text" style="margin: -20px 0 0 80px;"><input id="sdate" name="sdate" type="text" class="validate[required] text-input" class1="text_fild22" readonly="readonly" /></div>

                    <div class="fild_name" style="float: none; margin: 0 20px 0 0;" ><span class="red">*</span> To:</div> 
                    <div class="fild_text" style="margin: -20px 0 0 80px;"><input id="fdate" name="fdate" type="text" class="validate[required] text-input" class1="text_fild22" readonly="readonly" /></div>

                    <div class="clr"></div>
                    <div><input name="sub_add" type="submit" value="Submit" class="but2" style="margin: 0px 0 0 0;" /></div> 
                </form> 

            </div> 

            <div class="but3" style="margin-bottom:10px;"><a href="<?php echo admin_url(); ?>lead/download1" id="select_admin">CSV Download</a></div>
            <?php if(!empty($search_arr)){ ?>
                <table id="table_liquid" cellspacing="0">
                    <caption>&nbsp;</caption>
                    <tr>
                        <th width="5%" align="center">Lead ID</th>
                        <th width="7%" align="center">Product name</th>
                        <th width="7%" align="center">Affiliate Type</th>
                        <th width="5%" align="center">Lead Name</th>
                        <th width="7%" align="center">Lead Email</th>
                        <th width="7%" align="center">Lead Comment</th>

                        <th width="7%" align="center">Add Time</th>                          

                        <?php if(is_superadmin()){ ?>
                            <th width="16%" align="center">Action</th>
                            <?php } ?>
                    </tr>
                    <?php foreach($search_arr as $m_row){ ?>
                        <tr>
                            <td style="border-left:1px solid #959595"><?php echo $m_row['i_app_id']; ?></td>
                            <td><?php echo $m_row['s_product_id']; ?></td>
                            <td><?php echo $m_row['s_aff_type']; ?></td>
                            <td><?php echo $m_row['s_app_name']; ?></td>
                            <td><?php echo $m_row['s_email']; ?></td>                       
                            <td><?php echo $m_row['s_comment']; ?></td>
                            <td><?php echo $m_row['t_add_time']; ?></td>                                   
                            <?php if(is_superadmin()){ ?>
                                <td>
                                    <div style="height:35px; margin:0 auto">   
                                        <div id="demo1" class="but1"><a href="javascript:void()" onclick="getDelPopUp('<?php echo strEncode($m_row['i_app_id']);?>')">Delete</a></div>                                                                                                       
                                    </div>
                                </td>
                                <?php } ?>
                        </tr>
                        <?php } ?>
                </table>            <?php }else{ ?>
                <h2>Element Is Not Found</h2>
                <?php } ?>
        </div>
        <!--end content_block-->
        <div style="display:none;">
            <div id="add_Form2" class="pop_bg3" >
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
            <!-- <a href="#" class="active">First</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a><a href="#">Last</a> -->
            <?php

                echo $this->pagination->create_links();
            ?>
        </div>


        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>
