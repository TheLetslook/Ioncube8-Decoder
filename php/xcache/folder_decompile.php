<?php

define('FILEMASK_REGEXP','#\.php$|\.phtml$|\.lang$|\.module$#');

set_time_limit(0);
ini_set('memory_limit','1G');
require_once("Decompiler.class.php");

function _dc($in,$out) {
  $dc = new Decompiler();
  $dc->decompileFile($in);
  ob_start();
  $dc->output();
  file_put_contents($out,ob_get_clean());
}

function dir_tree($dir) {
  $path = '';
  $stack[] = $dir;
  while ($stack) {
    $thisdir = array_pop($stack);
    if ($dircont = scandir($thisdir)) {
      $i=0;
      while (isset($dircont[$i])) {
        if ($dircont[$i] !== '.' && $dircont[$i] !== '..') {
          $current_file = "{$thisdir}/{$dircont[$i]}";
          if (is_file($current_file)) {
            $path[] = "{$thisdir}/{$dircont[$i]}";
          } elseif (is_dir($current_file)) {
            $path[] = "{$thisdir}/{$dircont[$i]}";
            $stack[] = $current_file;
          }
        }
        $i++;
      }
    }
  }
  return $path;
}

if (!isset($argv)) {
  $argv = $_SERVER['argv'];
  $argc = $_SERVER['argc'];
}

if ($argc != 3) {
  echo "Usage: php ".__FILE__." in_dir out_dir\n";
  die();
}
$in_dir = $argv[1];
$out_dir = $argv[2];

if (!is_dir($in_dir)) die("Input directory \"$in_dir\" not exist\n");
if (!is_dir($out_dir)) die("Output directory \"$out_dir\" not exist\n");
$dt = dir_tree($in_dir);
$files = array();
for ($i=0;$i<count($dt);$i++) {
  if (!is_dir($dt[$i]) && preg_match(FILEMASK_REGEXP,$dt[$i])) $files[] = $dt[$i];
}
echo "Founded ".count($files)." files. Processing.\n-----------------------------------\n";
$i = 1;
foreach($files as $fn) {
   echo "[ ".($i++)." / ".count($files)." ] ".substr($fn,strlen($in_dir)+1);
   $f = $out_dir.substr($fn,strlen($in_dir));
   if (!is_dir(dirname($f))) mkdir(dirname($f),0777,true);
   _dc($fn,$f);
   echo " -- Done.\n";
}

echo "-----------------------------------\nFinished.\n";