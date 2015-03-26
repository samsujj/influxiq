<!-- <script type="text/javascript" src="<? //=base_url()?>js/admin/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php //echo base_url().'js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php'?>" ></script>
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
content_css : "<?php //echo base_url(); ?>css/tiny/blog_style.css",

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

</script>  -->

<script type="text/javascript">
    $(function(){

        //   var val = $(this).find(':selected')[0].value;

        $('#img_type').change(function() {
            var val = $(this).find(':selected')[0].value;
            // $('#changevalue').val(id);
            if(val==1){
                $("#lab_model").css("display","inline");
                $("#lab_cat").css("display","none");

            }
            else{
                $("#lab_cat").css("display","inline");
                $("#lab_model").css("display","none");                
            }                
        });

        /*  $("#catagory").multiselect({
        selectedText: function(numChecked, numTotal, checkedItems){
        return numChecked + ' of ' + numTotal + ' checked';
        }
        });    */     

    });          
</script>
<h2>Add Image</h2>
<h3>Image details</h3>
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

   

    <label>Image Type <span class="req">*</span></label>
    <select id="img_type" name="img_type">
        <option value="1" selected="selected">Model</option>
        <option value="2">Category</option>
    </select>

    <p id="lab_cat" style="display: none;">
        <label>Select Catagory<span class="req">*</span></label>
        <select name="catagory" id="catagory">
            <?php echo get_catagory_dd(set_value('catagory')); ?>
    </select>   </p>

    <p id="lab_model">
        <label>Select Model<span class="req">*</span></label>     
        <select name="model" id="model">
            <?php echo get_model_dd(set_value('catagory')); ?>
        </select>        
    </p>
    <!-- <select name="catagory" multiple="multiple" id="catagory" style="width:400px;">
    <?php //echo get_catagory_dd(set_value('catagory')); ?>
    </select> -->
    <p>
        <label>Upload Images<span class="req">*</span></label>
        <div class="replica">
            <input type="file" style="margin-bottom:7px;" name="mode_img_upload[]" size="33">
            <img src="<?php echo base_url()?>/images/admin/top_ico2.png" alt="Click to add another image" title="Click to add another image" class="replicate" onclick="replicate()" />
            <img src="<?php echo base_url()?>/images/admin/top_ico2minus.png" alt="Click to delete image" title="Click to delete image" class="del_replicate"  onclick="delReplica(this)" />
    </div>    </p>
    <br />
    <input type="submit" value="Submit" name="submit" class="button">                                   

</form>
