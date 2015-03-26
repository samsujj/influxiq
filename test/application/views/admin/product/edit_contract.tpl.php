<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url().'js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php'?>" ></script>
<script type="text/javascript">
    function tinymce_init(){
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "autolink,lists,spellchecker,pagebreak,style,layer,save,advhr,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,|,media,image,|,preview,|,forecolor,backcolor,|,charmap,emotions,iespell,advhr,spellchecker,styleprops",
            theme_advanced_buttons3 : "",
            theme_advanced_buttons4 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : false,

            file_browser_callback : "tinyBrowser",

            // Skin options
            skin : "o2k7",
            skin_variant : "silver",

            // Example content CSS (should be your site CSS)
            content_css : "<?php echo base_url(); ?>css/tiny/blog_style.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "js/template_list.js",
            external_link_list_url : "js/link_list.js",
            external_image_list_url : "js/image_list.js",
            media_external_list_url : "js/media_list.js"
        });
    }
    jQuery(function(){
        tinymce_init();
    });
</script>
 <div id="main">
    <div id="content">                        
        <div class="content_block">
            <h2 class="">Contarct Of <?php echo ucwords($result[0]['name']);?> </h2>
            <div class="add_detbg">
                <div class="pro_add">
                    <?php 
                        echo validation_errors('<div class="fild_err" style="width:500px;">', '</div>'); 
                        if(!empty($s_msg)){
                            echo '<div id="error" class="fild_err" style="width:500px;">'.$s_msg.'</div>';
                        }
                    ?>                                    
                                         
                                            <form action="<?php echo admin_url()?>product/addContract" method="post">
                                                <input type="hidden" name="product_id" value="<?php echo $result[0]['id']?>">
                                                <input type="hidden" name="category_id" value="<?php echo $result[0]['category_id']?>">
                                                <textarea cols="10" rows="5" name="contract" style="width: 680px; height: 280px; margin: 10px 0; background: #F4EFEC;"><?php echo $result[0]['contract']?></textarea>
                                                <div style="clear: both;"></div>
                                                <input type="submit" value="Save" class="but2" style=" margin: 0 0 0 5px;"><input type="button" value="Cancel" onclick="history.back()" class="but2" style=" margin: 0 0 0 5px;">
                                                <div style="clear: both;"></div>  
                                            </form>
                                            
                 </div>


            </div>
        </div>
        <!--end content_block-->


        <!-- end jquery_tab -->



    </div><!--end content-->

                </div>