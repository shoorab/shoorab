<?php
$allowed = array('jpg','jpeg','png','gif','webp');
$files = [];
foreach($allowed as $ext){
  foreach(glob("*.$ext") as $file){
    $files[] = $file;
  }
}
header('Content-Type: application/json');
echo json_encode($files);
?>
