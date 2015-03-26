 <div id="main">

    <div id="content">


        <div class="content_block">

            <h2 class="">Contract Manager</h2>
             

                    <table border="0">
                        <tr><td>Header<span style="float: right;"><a href="<?php echo admin_url()?>contract/add/<?php echo strEncode(1)?>">Edit</a></span></td></tr>
                        <tr><td><?php echo put_safe(@$m_dataset[0]['header']);?> </td></tr>
                        <tr><td>Terms & Condition<span style="float: right;"><a href="<?php echo admin_url()?>contract/add/<?php echo strEncode(2)?>">Edit</a></span></td></tr>
                        <tr><td><?php echo put_safe(@$m_dataset[0]['terms_conditions']);?></td></tr>
                        <tr><td>Footer<span style="float: right;"><a href="<?php echo admin_url()?>contract/add/<?php echo strEncode(3)?>">Edit</a></span></td></tr>
                        <tr><td><?php echo put_safe(@$m_dataset[0]['footer']);?></td></tr>
                    </table> 


  


        </div>

        <!--end content_block-->

         
        





        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>