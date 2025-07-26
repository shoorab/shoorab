<?php
$dirs = [];
$base = __DIR__;
foreach (scandir($base) as $dir) {
  if ($dir === '.' || $dir === '..') continue;
  if (is_dir("$base/$dir"))
      $dirs[] = $dir;
}
echo json_encode($dirs);
