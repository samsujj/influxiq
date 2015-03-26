<?php
    //   pr($_SERVER);
   // pr($s_aff_id,true);
    if(!empty($s_aff_id)){
         $s_id=$s_aff_id;
    }
  
?>
<script type="text/javascript">
    jQuery.noConflict();

    function getDelPopUp(val){
        //var id = jQuery(this).attr('id');
        if(jQuery("#act1").text()=="Yes"){
             jQuery("#act1").wrapInner("<a href='<?php echo admin_url() ?>affiliate/delafftrack/"+val+"'></a>");
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
</script>
<div id="main">

    <div id="content">

        <?php 
            echo show_msg();
        ?>

        <div class="content_block">

            <h2 class="">Affiliate Track Manager</h2>
            <form id="formID" action="<?php echo admin_url() ?>affiliate/affsearchtrackdet/<?php echo (!empty($search_arr))?strEncode($search_arr[0]['i_aff_id']):$s_id; ?>" method="post">
                <div class="fild_name"><span class="red">*</span> Search :</div>
                <div class="fild_text"><input id="search" name="search" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo $s_search; ?>"/></div>
            <div class="lft"><input name="sub_add" type="submit" value="Submit" class="but2" /></div>                                </form>
            <div class="but3" style="margin-bottom:10px;"><a href="<?php echo admin_url(); ?>affiliate/downloadaffserchtrackdetails/<?php echo (!empty($search_arr))?strEncode($search_arr[0]['i_aff_id']):$s_id; ?>" id="select_admin">CSV Download</a></div>
            <?php if(!empty($search_arr)){ ?>
                <table id="table_liquid" cellspacing="0">
                    <caption>&nbsp;</caption>
                    <tr>
                        <th width="5%" align="center">Affiliate Hit ID</th> 
                        <th width="5%" align="center">Hitting IP</th>
                        <th width="5%" align="center">Hitting Time</th>

                        <?php if(is_superadmin()){ ?>
                            <th width="16%" align="center">Action</th>
                            <?php } ?>
                    </tr>
                    <?php foreach($search_arr as $m_row){ ?>
                        <tr>
                            <td style="border-left:1px solid #959595"><?php echo $m_row['i_affhit_id']; ?></td>
                            <td><?php echo $m_row['s_affhit_ip']; ?></td>
                            <td><?php echo $m_row['t_affhit_time']; ?></td>
                            <?php if(is_superadmin()){ ?>
                                <td>
                                    <div style="height:35px; margin:0 auto">                                                                      
                                    <div id="demo1" class="but1"><a href="javascript:void()" onclick="getDelPopUp('<?php echo strEncode($m_row['i_affhit_id']);?>')">Delete</a></div>
                                    </div>
                                </td>
                                <?php } ?>
                        </tr>
                        <?php } ?>
                </table>
                <?php }else{ ?>
                <h2 class="">Element Not Found</h2>
                <?php } ?>
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

