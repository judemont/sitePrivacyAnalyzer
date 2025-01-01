<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$scriptPath = __DIR__ . '/puppeteer-script.js';

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

if (filter_var($url, FILTER_VALIDATE_URL) === false) {
    echo "Invalid URL";
    exit;
}


$return_var = null;
exec("node -v" . " 2>&1", $output, $return_var);

if ($return_var !== 0) {
    echo "Error executing command: " . implode("\n", $output);
} else {
    echo implode("\n", $output);
}
?>