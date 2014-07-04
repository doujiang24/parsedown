<?php

require("../Parsedown.php");

$Parsedown = new Parsedown();


if ($argc != 2) {
    usage();
    exit();
}

$input = $argv[1];

$output = substr($input, 0, strrpos($input, ".")) . ".html";

$content = file_get_contents("{$input}");

$html_header = <<<EOF
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
        <link href="http://uncledou.org/markdown/font/font.css" rel="stylesheet" type="text/css" />
        <link href="http://uncledou.org/markdown/font/project.css" rel="stylesheet" type="text/css" />
        <script src="http://uncledou.org/markdown/js/jquery.js"></script>
        <script src="http://uncledou.org/markdown/js/markdown.js"></script>
    </head>

EOF;

file_put_contents($output, $html_header . $Parsedown->text($content));

function usage() {
    echo "\n";
    echo "usage:\n";
    echo "php convert.php file.markdown\n";
    echo "\n";
}
