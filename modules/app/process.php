<?php defined('BASEPATH') OR exit('no direct script access allowed');

require "library/PHPImage.php";
require "library/Curl.php";
use Library\PHPImage;

$data = $_POST;
$quote = $data['text'];
$base_path = './storage/quotes/';
$overlay = $base_path.'overlay/'.$data['overlay'];
$background = $base_path."background/dummy.jpg";
$font = $base_path.'font/'.$data['font'];
$save_path = $base_path.'temp/';
$filename = date('YmdHis_').rand(000,999).".jpg";

if (!empty($data['background'])) {
	if (filter_var($data['background'], FILTER_VALIDATE_URL) == true) {
		$background = $data['background'];
	}else {     
		$background = Fetch_Redirect('https://source.unsplash.com/640x640/?'.urlencode($data['background']));
	}
}

$save = $save_path.$filename;

try {
	$image = new PHPImage();
	$image->setOutput('jpg',90);
	$image->setDimensionsFromImage($overlay);
	$image->draw($background);
} catch (Exception $e) {

}
$image->draw($overlay, '50%', '75%');            
$image->setAlignVertical('center');
$image->setAlignHorizontal('center');

switch ($data['overlay']) {

	case 'overlay.png':
	$image->setFont(realpath($font));
	$image->setTextColor(array(255, 255, 255));
	$image->textBox($quote, array(
		'fontSize' => $data['size'], 
		'x' => 130,
		'y' => 240,
		'width' => 380,
		'height' => 200,
		'debug' => false
		));
	break;

	case 'overlay1.png':
	$image->setFont(realpath($font));
	$image->setTextColor(array(0, 0, 0));
	$image->textBox($quote, array(
		'fontSize' => $data['size'], 
		'x' => 60,
		'y' => 215,
		'width' => 520,
		'height' => 210,
		'debug' => false
		));
	break;

	case 'overlay2.png':
	$image->setFont(realpath($font));
	$image->setTextColor(array(255, 255, 255));
	$image->textBox($quote, array(
		'fontSize' => $data['size'], 
		'x' => 140,
		'y' => 58,
		'width' => 360,
		'height' => 500,
		'debug' => false
		));
	break;

	case 'overlay3.png':
	$image->setFont(realpath($font));
	$image->setTextColor(array(255, 255, 255));
	$image->textBox($quote, array(
		'fontSize' => $data['size'], 
		'x' => 130,
		'y' => 60,
		'width' => 380,
		'height' => 300,
		'debug' => false
		));
	break;

	case 'overlay5.png':
	$image->setFont(realpath($font));
	$image->setTextColor(array(255, 255, 255));
	$image->textBox($quote, array(
		'fontSize' => $data['size'], 
		'x' => 130,
		'y' => 240,
		'width' => 380,
		'height' => 200,
		'debug' => false
		));
	break;    

	case 'overlay6.png':
	$image->setFont(realpath($font));
	$image->setTextColor(array(255, 255, 255));
	$image->textBox($quote, array(
		'fontSize' => $data['size'], 
		'x' => 70,
		'y' => 195,
		'width' => 490,
		'height' => 260,
		'debug' => false
		));
	break;                    

	default:
	$image->setFont(realpath($font));
	$image->setTextColor(array(255, 255, 255));
	$image->textBox($quote, array(
		'fontSize' => $data['size'], 
		'x' => 130,
		'y' => 240,
		'width' => 380,
		'height' => 200,
		'debug' => false
		));
	break;            
}        

$image->save($save);