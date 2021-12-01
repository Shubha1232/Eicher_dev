<?php
$re = '/^[+]{1}+[0-9]{12}$/';
$input = '+919827945210';
echo preg_match($re,$input);
// if(preg_match($re,1)){
// 	echo true;
// }
// else{
// 	echo false;
// }