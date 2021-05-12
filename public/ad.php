<?php
require_once '../vendor/config.php'; 

$folder = __DIR_PUBLIC__.'/ad/';
$path = $_SERVER['DOCUMENT_ROOT'].$folder;

function myscandir($dir, $sort=0)
{
  $list = scandir($dir, $sort);	
  if (!$list) return false;
  
  if ($sort == 0) unset($list[0],$list[1]);
  else unset($list[count($list)-1], $list[count($list)-1]);
  return $list;
}

$filelist = myscandir($path);
$filelist = array_values($filelist);
$rand = $filelist[array_rand($filelist, 1)];

echo '<img class=banner_d src="'. $folder. $rand .'"/>';

?>	