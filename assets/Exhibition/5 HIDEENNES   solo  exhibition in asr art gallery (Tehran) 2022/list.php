<?php
// List image files as JSON array
$folder = __DIR__ . '/';
$images = glob($folder . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
$names = [];
foreach($images as $img) $names[] = basename($img);
header('Content-Type: application/json');
echo json_encode($names);
?>
