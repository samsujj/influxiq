<?php
    //pr($m_dataset,true);
?>
<div id="main">

    <div id="content">


        <?php if(!empty($m_dataset)){ ?>
            <div class="content_block">
                <h2 class="">Admin LogIn Property</h2>
                <table id="table_liquid" cellspacing="0">
                    <caption>&nbsp;</caption>
                    <tr>
                        <th width="5%" align="center">LogIn IP</th>
                        <th width="10%" align="center">Login Time</th>

                    </tr>
                    <?php foreach($m_dataset as $m_row){ ?>
                        <tr>
                            <td style="border-left:1px solid #959595"><?php echo $m_row['s_user_ip']; ?></td>
                            <td><?php echo $m_row['t_loggin_time']; ?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <!--end content_block-->
            <!--     <div class="pagination"> -->

            <div class="pagination"> 

                <?php

                    echo $this->pagination->create_links();
                ?>

            </div>

            <!--     </div>     -->
            <?php }else{ ?>
            <h2 class="">No Login Information Available</h2>
            <?php } ?>


        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>