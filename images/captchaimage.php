<?php
session_start();

/**
 * Function for captcha image
 */
class Captchaimage {

    var $font = 'the beautiful ones.ttf';
    private $code = "";

    function __construct($width = '205', $height = '60', $characters = '6') {
        $code = $this->generateCode($characters);
        /* font size will be 75% of the image height */
        $font_size = $height * 0.40;
        $image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
        /* set the colours */
        $background_color = imagecolorallocate($image, 127,188,226);
        $text_color = imagecolorallocate($image, 30, 73, 99);
        $noise_color = imagecolorallocate($image, 63, 103, 128);
        /* generate random dots in background */
        for ($i = 0; $i < ($width * $height) / 50; $i++) {
            imagefilledellipse($image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $noise_color);
        }
        /* generate random lines in background */
        for ($i = 0; $i < ($width * $height) / 500; $i++) {
            imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $noise_color);
        }
        /* create textbox and add text */
        $textbox = imagettfbbox($font_size, 0, $this->font, $code) or die('Error in imagettfbbox function');
        $x = ($width - $textbox[4]) / 2;
        $y = ($height - $textbox[5]) / 2;
        imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font, $code) or die('Error in imagettftext function');
        /* output captcha image to browser */
        header('Content-Type: image/jpeg');
        imagejpeg($image);
        imagedestroy($image);
        $this->code = $code;
        $_SESSION['kapcode'] = $code;
    }

    function generateCode($characters) {
        /* list all possible characters, similar looking characters and vowels have been removed */
        $possible = '23456789bcdfghjkmnpqrstvwxyz';
        $code = '';
        $i = 0;
        while ($i < $characters) {
            $code .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            $i++;
        }
        return $code;
    }

    public function getCode() {
        return $this->code;
    }

}

/*
  $width = isset($_GET['width']) ? $_GET['width'] : '120';
  $height = isset($_GET['height']) ? $_GET['height'] : '40';
  $characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';
 */
//$captcha = new Captchaimage($width, $height, $characters);

$captcha = new Captchaimage();