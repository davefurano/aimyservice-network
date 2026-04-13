<?php
echo "DOCUMENT_ROOT: " . $_SERVER['DOCUMENT_ROOT'] . "
";
echo "SCRIPT_FILENAME: " . $_SERVER['SCRIPT_FILENAME'] . "
";

// Check what index.html exists and what it contains
$paths = [
    $_SERVER['DOCUMENT_ROOT'] . '/index.html',
    $_SERVER['DOCUMENT_ROOT'] . '/aimyservicecom/index.html',
    '/data0/aimyservice.com/public_html/index.html',
    '/data0/aimyservice.com/public_html/aimyservicecom/index.html',
];
foreach($paths as $p) {
    if(file_exists($p)) {
        $content = file_get_contents($p);
        preg_match('/thumb-icon\{font-size:([^;]+)/', $content, $m);
        echo "EXISTS: $p (" . strlen($content) . " bytes) icon=" . ($m[1] ?? 'not found') . "
";
    } else {
        echo "MISSING: $p
";
    }
}
?>