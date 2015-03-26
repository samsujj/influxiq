<?php
/**
* Function for converting the video into FLV file
* 
* @param mixed $s_source_path (folder path)
* @param mixed $s_video_upload_path (folder path)
* @param mixed $s_vid_name (with extension of file)
*/
function video_convert($s_source_path="", $s_video_upload_path="", $s_vid_name="") {
    $CI = & get_instance();
    $s_vid_conv_cmd = $CI->config->item('ffmpeg_path')." -i ".$s_source_path." -f flv ".$s_video_upload_path.$s_vid_name;  
    exec($s_vid_conv_cmd);
}

/**
* Function for creating video file SNAPSHOT
* 
* @param mixed $s_source_path (folder path)
* @param mixed $s_thumbnail_path (folder path)
* @param mixed $s_thumb_name (with extension of file)
*/
function create_thumb_from_video($s_source_path="", $s_thumbnail_path="", $s_thumb_name="") {
    $CI = & get_instance();
    $s_img_cmd = $CI->config->item('ffmpeg_path')." -i ".$s_source_path." ".$s_thumbnail_path.$s_thumb_name;                          
    // exec("–enable-demuxer=DEMUXER"); // if it is disabled then this should be un commented
    exec($s_img_cmd);
}
