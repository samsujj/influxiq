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
    $(function(){
        tinymce_init();
    });
/*    function chk_page(){
        var s_title = $.trim($('#title').val());
        var s_desc = $.trim(tinymce.activeEditor.getContent());
        var s_blog_parent = $.trim($('#blog_parent').val());
        var b_flg = true;
        $("#err_show").html("");
        if(s_title==''){
            $("#err_show").append('<div id="error">Title field is required</div>');
            b_flg = false;
        }
        if(s_desc==''){
            $("#err_show").append('<div id="error">Description field is required</div>');
            b_flg = false;
        }
        if(b_flg){
            var url = base_url+"blog/add/"+s_blog_parent;
            $.post(url, {'title':s_title, 'description':s_desc, 'blog_parent':s_blog_parent}, function(msg){
                var msg_arr = msg.split('|@SEP@|');
                if(msg_arr[0]=='ok'){
                    showFBMsg('<div class="ok_fb_div fb_div" style="text-align:center;">Blog posted successfully.. <div>');
                    setTimeout('closeFbDiv()', 2000);
                }else{
                    $("#err_show").empty().html(msg_arr[1]);
                }
            });
        }
    } */
</script>


<div id="main">

    <div id="content">                        
        <div class="content_block">
            <h2 class="">Add Category </h2>
            <div class="add_detbg">
                <form id="formID" action="" method="post">
                    <div class="pro_add">
                        <?php 
                            echo validation_errors('<div class="fild_err">', '</div>'); 
                            if(!empty($s_msg)){
                                echo '<div id="error" class="fild_err">'.$s_msg.'</div>';
                            }
                        ?>                                    
                        <div class="requar"><span class="red">*</span>Required fields</div>
                        <div class="form_div">
                            <div class="fild_name"><span class="red">*</span>Category Name :</div>
                            <!--<input type="text" id="req" name="req" class="validate[required] text-input" value=""> -->

                            <div class="fild_text"><input id="cat_name" name="cat_name" type="text" class="validate[required] text-input" class1="text_fild" value="<?php echo set_value('cat_name'); ?>" /></div>
                            <div class="clr"></div>
                        </div>
                        <div class="form_div">
                            <div class="fild_name">&nbsp;</div>
                            <div class="fild_text"><input name="sub_log" type="submit" value="Submit" class="but2" /></div>
                            <div class="clr"></div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </form>   

            </div>
        </div>
        <!--end content_block-->


        <!-- end jquery_tab -->



    </div><!--end content-->
    
                </div>