<?php
// Clear LiteSpeed cache
if (function_exists('litespeed_purge_all')) {
    litespeed_purge_all();
    echo "litespeed_purge_all: OK
";
}
// Try via header
header("X-LiteSpeed-Purge: *");
echo "X-LiteSpeed-Purge header sent
";

// Also try deleting cache files directly
$cache_dirs = [
    '/data0/aimyservice.com/public_html/lscache/',
    '/home/aimyservice/lscache/',
    '/tmp/lscache/',
];
foreach($cache_dirs as $dir) {
    if(is_dir($dir)) {
        echo "Found cache dir: $dir
";
        // List files
        $files = glob($dir . '*');
        echo "Files: " . count($files) . "
";
        foreach($files as $f) {
            @unlink($f);
        }
        echo "Cleared: $dir
";
    }
}

// Verify current index.html
$path = '/data0/aimyservice.com/public_html/index.html';
$content = file_get_contents($path);
preg_match('/thumb-icon\{font-size:([^;]+)/', $content, $m);
echo "Current index.html: " . strlen($content) . " bytes, icon=" . ($m[1] ?? 'not found') . "
";
?>