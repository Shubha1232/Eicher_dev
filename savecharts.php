<?php
date_default_timezone_set('UTC'); // Potential for mistakes
 $data = str_replace(' ', '+', $_POST['bin_data']);
$data = base64_decode($data);
$fileName = date('ymdhis').'.svg';
$im = imagecreatefromstring($data);
 define('UPLOAD_DIR', '/home/ewayiuax/public_html/eicher/image/');
if ($im !== false) {
// Save image in the specified location

$file = UPLOAD_DIR . $fileName;
$success = file_put_contents($file, $img_data);
echo "Saved successfully";
}
else {
echo 'An error occurred.';
}