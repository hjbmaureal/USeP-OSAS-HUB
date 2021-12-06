<?php
if(!empty($_GET['file'] && $_GET['folder'])){
  $filename = basename($_GET['file']);
  $folder = $_GET['folder'];
  $filepath = "../scholarship-files/".$folder."/".$filename;

  if(!empty($filename) && file_exists($filepath)){
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    readfile($filepath);
    exit;
  }
}