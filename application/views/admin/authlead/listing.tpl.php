<?php  //pr(getAffTypeDet(),true); ?>
<script type="text/javascript">
    jQuery.noConflict();

    function getDelPopUp(val){
        //var id = jQuery(this).attr('id');
        if(jQuery("#act1").text()=="Yes"){
            jQuery("#act1").wrapInner("<a href='<?php echo admin_url() ?>authlead/del/"+val+"'></a>");
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


    jQuery(function(){

        jQuery('#sdate').datepicker(); 
        jQuery('#fdate').datepicker();  
    });


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
            //   echo validation_errors('<div class="fild_err">', '</div>');
            //   echo show_msg();
            /* if(!empty($s_msg)){
            echo '<div id="error" class="fild_err">'.$s_msg.'</div>';
            } */
        ?>

        <div class="content_block">

            <h2 class="">Author Lead Manager</h2>
            <form id="formID" action="<?php echo admin_url() ?>authlead/search1" method="post">
                <div class="fild_name" style="width: 80px;"><span class="red">*</span> Search :</div>
                <div class="fild_text"><input id="search" name="search" type="text" class="validate[required] text-input" class1="text_fild" value="<?php //echo $s_search; ?>" /></div>
                <div class="lft">
                    <input name="sub_add" type="submit" value="Submit" class="but2" />
                    <input name="sub_add" type="button" value="Show All" class="but2" onclick="window.location.href='<?php echo admin_url() ?>authlead/search1/all'" />
                </div>


            </form>        


            <div class="clear"></div>


            <?php if(!empty($m_dataset)){ ?>
                <table id="table_liquid" cellspacing="0">
                    <caption>&nbsp;</caption>
                    <tr>
                        <th width="5%" align="center">SL No</th>
                        <th width="7%" align="center">Add Time</th>
                        <th width="7%" align="center">Author name</th>
                        <th width="7%" align="center">Author Email</th>
                        <th width="5%" align="center">Author Phone</th>
                        <th width="7%" align="center">State</th>
                        <th width="7%" align="center">City</th>




                        <?php if(is_superadmin()){ ?>
                            <th width="16%" align="center">Action</th>
                            <?php } ?>
                    </tr>
                    <?php
                        $i=1;
                        foreach($m_dataset as $m_row){ ?>
                        <tr>
                            <td style="border-left:1px solid #959595"><?php echo $i++; ?></td>
                            <td><?php echo date('d,M Y',strtotime($m_row['t_add_time'])); ?></td>
                            <td><?php echo $m_row['s_fname']." ".$m_row['s_lname']; ?></td>
                            <td><?php echo $m_row['s_email']; ?></td>
                            <td><?php echo $m_row['s_phone']; ?></td>
                            <td><?php echo getStateName($m_row['i_state']); ?></td>                       
                            <td><?php echo $m_row['s_city']; ?></td>
                            <?php if(is_superadmin()){ ?>
                                <td>
                                    <div style="height:35px; margin:0 auto">   
                                        <div id="demo1" class="but1"><a href="javascript:void()" onclick="getDelPopUp('<?php echo strEncode($m_row['author_id']);?>')">Delete</a></div>                                                                                                       
                                    </div>
                                </td>
                                <?php } ?>
                        </tr>
                        <?php } ?>
                </table>
                <?php }else{ ?>
                <h2>No Record Found</h2>
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

            <?php echo  $this->pagination->create_links();  ?>


        </div>


        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>