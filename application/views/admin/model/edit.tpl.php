<?php //pr($m_send_data,TRUE); ?> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>js/admin/jquery.multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url().'js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php'?>" ></script>
<?php         
    $arr=array();
    $arr1="";
        for($i=0;$i<count($m_send_data);$i++){
        if(array_key_exists('i_cat_cat_id', $m_send_data[$i])){
            $arr[$i]=$m_send_data[$i]['i_cat_cat_id'];
            if($i==(count($m_send_data)-1)){
                $str="";
            }    
            else{
                $str=","; 
            }
            $arr1.=$arr[$i].$str;
        }  
        } 
    
    //  pr($arr,TRUE);
    // $arr1='3,4';  

?>
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
<script type="text/javascript">
    $(function(){
        //var values = $("#profile").val('option1');
        var type = '<?=$arr1?>';
        var arr=Array();
        arr=type.split(",");


        // var arr=Array();
        //arr=['3','4'];
        //arr=type.split(",");
        //$('#profile').next().next().next().text('option1,option2');
        //($('#profile > option').attr('selected','selected'));
        $("#catagory > option").each(function () {
            //alert($(this).val()+'-----'+jQuery.inArray($(this).val(),arr));
            if(jQuery.inArray($(this).val(),arr)!=-1)   $(this).attr('selected','selected');
        });

        $("#catagory").multiselect({
            multiple: true,
            selectedList: 6
        });

    });
</script>
<h2>Edit Model</h2>
<h3>Model details</h3>
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

    <label>Model Name <span class="req">*</span></label>
    <input type="text" id="mname" name="mname" value="<?php echo $m_send_data[0]['s_model_name']; ?>" class="input-medium"/>

    <label>Model Phone Number <span class="req">*</span></label>
    <input type="text" id="mphno" name="mphno" value="<?php echo $m_send_data[0]['s_model_phno']; ?>" class="input-medium"/>

    <label>Catagory Nmae <span class="req">*</span></label>
    <?=getGirlType("id=catagory name=catagory[] class=formbox1 MULTIPLE SIZE=5")?>


    <label>Model Description <span class="req">*</span></label>
    <textarea cols="10" rows="3" name="mdetails" id="mdetails" ><?php echo $m_send_data[0]['s_model_desc']; ?></textarea>

    <br />
    <input type="submit" value="Submit" name="submit" class="button">                                   

</form>
