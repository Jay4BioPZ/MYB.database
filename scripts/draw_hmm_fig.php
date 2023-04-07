<?php
$num_dom = $_GET['num_dom'];
$HMM_result = unserialize(urldecode($_GET['HMM_result']));
$AL = $_GET['AAL'];

$img_width = 1390;
$img_height = 50+25*$num_dom;
$s = array();
$e = array();
$right_bound = $img_width-150;
$left_bound = 50;

for ($x = 1; $x <= $num_dom; $x++) {
    $data = $HMM_result[$x-1];
    $s[] = $data[9];
    $e[] = $data[10];
}

$img = imagecreatetruecolor($img_width, $img_height);

//Set color attribute
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$red   = imagecolorallocate($img, 255, 0, 0);
 
//set background
imagefill($img, 0, 0, $white);

imageline($img, $left_bound, 25, $right_bound, 25, $black);
imagestring($img, 8, $right_bound+25, 25-7, 'a.a.', $black);
$aal = 0;
$inc = ($right_bound-$left_bound)*50/$AL;
$inv = 50;
while ($aal <= ($right_bound-$left_bound)) {
    imageline($img, $left_bound+$aal, 25-5, $left_bound+$aal, 25+5, $black);
    if (($left_bound+$aal-$inv >= 100) OR ($aal == 0)) {
        imagestring($img, 4, $left_bound+$aal, 25-20, $AL*$aal/($right_bound-$left_bound), $black);
        $inv = $left_bound+$aal;
    }
    $aal = $aal + $inc;
}
//img x1 y1 x2 y2 color
for ($x = 1; $x <= $num_dom; $x++) {
    imageline($img, $left_bound, 25+25*$x, $right_bound, 25+25*$x, $black);
    imagefilledrectangle($img, $left_bound+($right_bound-$left_bound)*$s[$x-1]/$AL, 25+25*$x-8, $left_bound+($right_bound-$left_bound)*$e[$x-1]/$AL, 25+25*$x+8, $red);
    imagestring($img, 4, $left_bound+($right_bound-$left_bound)*($s[$x-1]+$e[$x-1])/(2*$AL)-2, 25+25*$x-7, $x, $black);
    imagestring($img, 8, $right_bound+25, 25+25*$x-7, 'PF00249', $black);
    //imagestring($img, 8, 675, 25+25*$x-7, $e[$x-1], $black);

}
header("Content-type: image/png");
imagepng($img);
?>