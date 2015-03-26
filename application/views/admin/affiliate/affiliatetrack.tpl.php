<?php
   // pr($m_dataset);
?>    
<div id="main">

    <div id="content">

        <?php 
            echo show_msg();
        ?>

        <div class="content_block">

            <h2 class="">Affiliate Track Manager</h2>
            <form id="formID" action="<?php echo admin_url() ?>affiliate/affsearchtrack" method="post">
                <div class="fild_name"><span class="red">*</span>Search :</div>
                <div class="fild_text"><input id="search" name="search" type="text" class="validate[required] text-input" class1="text_fild" /></div>
            <div class="lft"><input name="sub_add" type="submit" value="Submit" class="but2" /></div>                                </form>
            <div class="but3" style="margin-bottom:10px;"><a href="<?php echo admin_url(); ?>affiliate/downloadafftrack" id="select_admin">CSV Download</a></div>
            <table id="table_liquid" cellspacing="0">
                <caption>&nbsp;</caption>
                <tr>
                    <th width="5%" align="center">Affiliate ID</th>
                    <th width="5%" align="center">Affiliate Name</th>
                    <th width="7%" align="center">Total Hits</th>
                    <?php if(is_superadmin()){ ?>
                        <th width="16%" align="center">Action</th>
                        <?php } ?>
                </tr>
                <?php foreach($m_dataset as $m_row){ ?>
                    <tr>
                        <td style="border-left:1px solid #959595"><?php echo $m_row['i_aff_id']; ?></td>
                        <td><?php echo $m_row['s_aff_name']; ?></td>
                        <td><?php echo $m_row['counthit']; ?></td>
                        <?php if(is_superadmin()){ ?>
                            <td>
                                <div style="height:35px; margin:0 auto">                                                                      
                                    <div class="but1"><a href="<?php echo admin_url()?>affiliate/afftrackdetails/<?php echo strEncode($m_row['i_aff_id']);?>">View Details</a></div>                                 
                                </div>
                            </td>
                            <?php } ?>
                    </tr>
                    <?php } ?>
            </table>
        </div>
        <!--end content_block-->

        
        <div class="pagination"> 

            <?php

                echo $this->pagination->create_links();
            ?>

        </div> 






        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>
