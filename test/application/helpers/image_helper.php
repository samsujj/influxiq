<?php

function resize_exact($s_source_path="", $s_dest_path="", $i_req_H="100", $i_req_W="100", $b_del_source=FALSE){
    //echo intval($b_del_source); exit;
    $i_req_H = intval($i_req_H);
    $i_req_W = intval($i_req_W);

    $m_arr = explode("/", $s_source_path);
    // pr($m_arr);
    $s_img_name = $m_arr[count($m_arr)-1];

    $o_CI = &get_instance();
    $o_CI->load->library('image_lib');
    // reseting the config
    unset($config);
    $o_CI->image_lib->clear();
    // setting master dimension
    list($width, $height, $type, $attr) = getimagesize($s_source_path);

    if($width>$height) {
        if($i_req_H>$i_req_W)
            $config['master_dim'] = 'height';
        else
            $config['master_dim'] = 'width';
    } else {
        if($i_req_H>$i_req_W)
            $config['master_dim'] = 'height';
        else
            $config['master_dim'] = 'width';
    }

    /// image resizing [start]
    $config['image_library'] = 'gd2';
    $config['quality'] = '100%';
    $config['source_image'] = $s_source_path;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['thumb_marker'] = "";
    if(!empty($s_dest_path)){
        $config['new_image'] = $s_dest_path.$s_img_name;
    }
    $config['width'] = $i_req_W;
    $config['height'] = $i_req_H;
    //     pr($config, TRUE);
    $o_CI->image_lib->initialize($config); 
    $o_CI->image_lib->resize();
    /// image resizing [end]

    // reseting the config
    unset($config);
    if(!empty($s_dest_path)){
        $s_source_path_new = $s_dest_path.$s_img_name;
    }else{
        $s_source_path_new = $s_source_path;
    }

    /// image cropping [start]
    list($width, $height, $type, $attr) = getimagesize($s_source_path_new);
    $x_axis = intval(($width-$i_req_W)/2);
    $y_axis = intval(($height-$i_req_H)/2);

    $o_CI->load->library('image_lib');

    $o_CI->image_lib->clear();
    $config['image_library'] = 'gd2';
    $config['quality'] = '100%';
    $config['source_image'] = $s_source_path_new;
    $config['maintain_ratio'] = FALSE;
    $config['width'] = $i_req_W;
    $config['height'] = $i_req_H;
    $config['x_axis'] = "$x_axis";
    $config['y_axis'] = "$y_axis";
    //     pr($config, true);
    $o_CI->image_lib->initialize($config); 
    if($o_CI->image_lib->crop()){
        if(intval($b_del_source)==1)
            unlink($s_source_path);
    }else{
        echo $o_CI->image_lib->display_errors('<p>', '</p>');exit;
    }
    /// image cropping [end]

}

/**
* function for making unique image name from its name
* 
* @param mixed $s_title
*/
function get_image_name($s_title=''){
    $s_title = convert_accented_characters($s_title);
    $s_title = str_replace("/", "-", $s_title);
    $s_title = character_limiter($s_title, 30);
    return strtolower(url_title(strip_quotes($s_title))).time();
}

function resize_exact1($s_source_path="", $s_dest_path="", $i_req_H="100", $i_req_W="100", $b_del_source=FALSE){

    $i_req_H = intval($i_req_H);
    $i_req_W = intval($i_req_W);
    $req_ratio=$i_req_W/$i_req_H;

    $m_arr = explode("/", $s_source_path);

    $s_img_name = $m_arr[count($m_arr)-1];

    $o_CI = &get_instance();
    $o_CI->load->library('image_lib');
    // reseting the config
    unset($config);
    $o_CI->image_lib->clear();
    // setting master dimension
    list($width, $height, $type, $attr) = getimagesize($s_source_path);
    
    $ht=$height;
    $wdth=$width;

    $present_ratio=$width/$height;
    
    if($i_req_H >= $ht && $i_req_W >= $wdth)
    {
            $req_height =$ht;
            $req_width = $width;
    }
    elseif($i_req_H >= $ht)
    {
            $req_width=$i_req_W;
            $req_height=$req_width/$present_ratio;
    }
    elseif($i_req_W >= $wdth)
    {
            $req_height=$i_req_H;
            $req_width=$req_height*$present_ratio;
    }
    else
    {
        if($present_ratio<=$req_ratio)
        {
            $req_height=$i_req_H;
            $req_width=$req_height*$present_ratio;
        }
        if($present_ratio>$req_ratio)
        {
            $req_width=$i_req_W;
            $req_height=$req_width/$present_ratio;
        }
    }



    /// image resizing [start]
    $config['image_library'] = 'gd2';
    $config['quality'] = '100%';
    $config['source_image'] = $s_source_path;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['thumb_marker'] = "";
    if(!empty($s_dest_path)){
        $config['new_image'] = $s_dest_path.$s_img_name;
    }
    $config['width'] = $req_width;
    $config['height'] = $req_height;
    //     pr($config, TRUE);
    $o_CI->image_lib->initialize($config); 
    $o_CI->image_lib->resize();
    /// image resizing [end]

   if(intval($b_del_source)==1)
            unlink($s_source_path);

}