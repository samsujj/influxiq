<?php 
    echo validation_errors('<div id="error">', '</div>'); 
    if(!empty($s_msg)){
        echo '<div id="error">'.$s_msg.'</div>';
    }
?>
<script type="text/javascript">
    jQuery.noConflict();

    function getDelPopUp(val){
        //var id = jQuery(this).attr('id');
        if(jQuery("#act1").text()=="Yes"){
            jQuery("#act1").wrapInner("<a href='<?php echo admin_url() ?>category/del/"+val+"'></a>");
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
</script>

<div id="main">

    <div id="content">

        <?php 
            echo show_msg();
        ?>

        <div class="content_block">

            <h2 class="">Category Manager</h2>
            <form id="formID" action="<?php echo admin_url() ?>user/search" method="post" >
                <div class="fild_name" style="width: 80px;"><span class="red">*</span>Search :</div>


                <div class="fild_text"><input id="search" name="search" type="text" class="validate[required] text-input" class1="text_fild" /></div>
                <div class="lft"><input name="sub_add" type="submit" value="Submit" class="but2" /></div> 
            </form>
            <div class="but3" style="margin-bottom:10px;"><a href="<?php echo admin_url(); ?>category/add.html" id="select_admin">Add Category</a></div>
              <table id="table_liquid" cellspacing="0">
                <caption>&nbsp;</caption>
                <tr>
                    <th width="15%" align="center">ID</th>
                    <th width="45%" align="center">Category Name</th>
                      <?php if(is_superadmin()){ ?>
                        <th width="40%" align="center">Action</th>
                        <?php } ?>
                </tr>
                <?php foreach($m_dataset as $m_row){ ?>
                    <tr>
                        <td style="border-left:1px solid #959595"><?php echo $m_row['id']; ?></td>
                        <td><?php echo ucwords($m_row['cat_name']); ?></td>
                        <?php if(is_superadmin()){ ?>
                            <td>
                                <div style="height:35px; margin:0 auto">
                                       <div class="but1"><a href="<?php echo admin_url()?>/category/edit/<?php echo strEncode($m_row['id']);?>/">Edit</a></div>
                                    <div id="demo1" class="but1"><a href="javascript:void()" onclick="getDelPopUp('<?php echo strEncode($m_row['id']);?>')">Delete</a></div>
                                </div>
                            </td>
                            <?php } ?>
                    </tr>
                    <?php } ?>
            </table>
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

