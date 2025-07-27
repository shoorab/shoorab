<?php
function hasImages($dir) {
    $imageExtensions = ['jpg','jpeg','png','gif','webp'];
    foreach ($imageExtensions as $ext) {
        $found = glob("$dir/*.$ext");
        if($found) return true;
    }
    return false;
}
function findCover($dir) {
    $imageExtensions = ['jpg','jpeg','png','gif','webp'];
    foreach($imageExtensions as $ext)
        foreach(glob("$dir/cover*.$ext") as $file)
            return basename($file);
    foreach($imageExtensions as $ext)
        foreach(glob("$dir/*.$ext") as $file)
            return basename($file);
    return "";
}
function listImages($dir) {
    $images = [];
    $imageExtensions = ['jpg','jpeg','png','gif','webp'];
    foreach($imageExtensions as $ext)
        foreach(glob("$dir/*.$ext") as $file)
            $images[] = basename($file);
    return $images;
}
$exhibitions = [];
$base = __DIR__;
foreach (scandir($base) as $folder) {
    if ($folder === '.' || $folder === '..') continue;
    $fullPath = "$base/$folder";
    if (is_dir($fullPath) && hasImages($fullPath)) {
        $cover = findCover($fullPath);
        $images = listImages($fullPath);
        $exhibitions[] = [
            "title" => $folder,
            "folder" => $folder,
            "cover" => $cover ? "$folder/$cover" : "",
            "images" => array_map(function($img) use ($folder) {return "$folder/$img";}, $images)
        ];
    }
}
header('Content-Type: application/json');
echo json_encode($exhibitions, JSON_UNESCAPED_UNICODE);
?>
