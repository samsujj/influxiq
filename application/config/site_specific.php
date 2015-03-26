<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//////////////// Site specific config [start]/////////////////
// general config
//$config['prod_image_types'] = 'gif|jpg|png';
$config['image_temp_path'] = FCPATH.'uploads'."/".'temp'."/";
$config['resume_temp_path']=FCPATH.'uploads'."/".'temp'."/";

// site general settings [start]
$config['site_admin_email'] = "abir.involutiontech@gmail.com";
$config['site_cc_email'] = "";
$config['site_bcc_email'] = "";
// site general settings [end]

// product config set[start]
$config['model_image_types'] = 'gif|jpg|png';
$config['model_image_path'] = FCPATH.'uploads'."/".'model'."/";
$config['model_image_url'] = BASE_URL.'uploads'."/".'model'."/";
$config['model_image_thumb_path'] = FCPATH.'uploads'."/".'model'."/".'thumb'."/";
$config['model_image_thumb_url'] = BASE_URL.'uploads'."/".'model'."/".'thumb'."/";
$config['model_image_thumbnew_path']=FCPATH.'uploads'."/".'model'."/".'thumbnew'."/";
$config['model_image_thumbnew_url'] = BASE_URL.'uploads'."/".'model'."/".'thumbnew'."/";
// product config set[end]

// banner management [start]
$config['banner_image_path'] = FCPATH.'uploads'."/".'banner'."/";
$config['banner_image_thumb_path'] = FCPATH.'uploads'."/".'banner'."/".'thumb'."/";
$config['banner_image_url'] = BASE_URL.'uploads'."/".'banner'."/";
$config['banner_image_thumb_url'] = BASE_URL.'uploads'."/".'banner'."/".'thumb'."/";
// banner management [end]

//Resume management
$config['resume_type'] = 'pdf|doc|docx';
$config['resume_path'] = FCPATH.'uploads'."/".'resume'."/";
$config['resume_url'] = BASE_URL.'uploads'."/".'resume'."/";
//$config['model_image_thumb_path'] = FCPATH.'uploads'."/".'model'."/".'thumb'."/";
//$config['model_image_thumb_url'] = BASE_URL.'uploads'."/".'model'."/".'thumb'."/";
//////////////// Site specific config [end]/////////////////
