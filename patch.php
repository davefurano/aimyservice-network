<?php
echo "document_root: " . $_SERVER['DOCUMENT_ROOT'] . "
";
echo "script_filename: " . $_SERVER['SCRIPT_FILENAME'] . "
";
echo "server_name: " . $_SERVER['SERVER_NAME'] . "
";
echo "real_path: " . realpath(__FILE__) . "
";
?>