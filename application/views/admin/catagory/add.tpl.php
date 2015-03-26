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
<h2>Add Catagory</h2>
<?php 
    echo validation_errors('<div id="error">', '</div>'); 
    if(!empty($s_msg)){
        echo '<div id="error">'.$s_msg.'</div>';
    }
?>
<?php
    // Message showing from controller
    echo show_msg();
?>
<span class="small req">[ * marked field are mandatory ]</span>
<form action="" enctype="multipart/form-data" method="post">

    <label>Catagory name <span class="req">*</span></label>
    <input type="text" id="cname" name="cname" value="<?php echo set_value('cname'); ?>" class="input-medium">

    <label>Catagory Title <span class="req">*</span></label>
    <input type="text" id="ctitle" name="ctitle" value="<?php echo set_value('ctitle'); ?>" class="input-medium">

    <label>Catagory Description<span class="req">*</span></label>
    <textarea cols="10" rows="6" name="cdesc" id="cdesc" style="height: 200px"><?php echo set_value('cdesc'); ?></textarea>

    <label>Catagory position<span class="req">*</span></label>
    <input type="text" id="cpos" name="cpos" value="<?php echo set_value('cpos'); ?>" class="input-medium">  

    <br />
    <input type="submit" value="Submit" name="submit" class="button">                                   

</form>