<div id="main">

    <div id="content">


        <div class="content_block">

            <h2 class="">
            <?php
            $str = "";
                if($i_id == 1)
                {
                    $str = 'header';
            ?>
            Edit Header
            <?php        
                }
                if($i_id == 2)
                {
                    $str = 'terms_conditions';
            ?>
            Edit Terms & Conditions
            <?php        
                }
                if($i_id == 3)
                {
                    $str = 'footer';
            ?>
            Edit Footer
            <?php        
                }
            ?>
            </h2>
<?php 
    echo validation_errors('<div id="error">', '</div>'); 
    if(!empty($s_msg)){
        echo '<div id="error">'.$s_msg.'</div>';
    }
?>            
            
             
             <form action="" method="post">
             <input type="hidden" name="type" value="<?php echo $str;?>">
             <!--<textarea cols="" rows="" id="value" name="value" style="height: 400px;"><?php echo @$m_dataset[0][$str];?></textarea>-->
                 <?php 
    
        $this->load->file('./FCKeditor/fckeditor.php',true);
        $oFCKeditor = new FCKeditor('value') ;
        $oFCKeditor->BasePath = base_url().'FCKeditor/';
        $oFCKeditor->Value = put_safe(@$m_dataset[0][$str]);
        $oFCKeditor->ToolbarSet = "Default";
        $oFCKeditor->Width  = '700' ;
        $oFCKeditor->Height = '400' ;
        $oFCKeditor->Create() ;    
    
        ?>
             <input type="submit" value="Save">
             </form>

  


        </div>

        <!--end content_block-->

         
        





        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>