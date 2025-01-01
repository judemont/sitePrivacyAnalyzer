<?php
$scriptPath = __DIR__ . '/puppeteer-script.js';

$url = $_GET["url"];

$output = shell_exec("node $scriptPath $url");

echo $output;
?>
