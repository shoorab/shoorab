<?php
$allowed = array('jpg','jpeg','png','gif','webp');   // فرمت قابل‌قبول
$files = [];

foreach ($allowed as $ext) {
    foreach (glob("*.$ext") as $file) {
        $files[] = $file;
    }
    foreach (glob("*." . strtoupper($ext)) as $file) { // فرمت با حروف بزرگ
        $files[] = $file;
    }
}
header('Content-Type: application/json');
echo json_encode(array_unique($files)); // فقط نام فایل، تکراری حذف میشه
?>
