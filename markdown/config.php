<?php

require("svn.config.php");

/*
 * svn config format:
 *

$markdown_files = array(
    array(
        'svn'                   => 'svn_url_for_markdown_file',
        'title'                 => 'filename_in_the_directory',
        'directory_fold_level'  => 'int value (default 2)',
    ),
);

$attach_files = array(
    'svn_url_for_attach_file',
);

 */

function download($svn, $title=NULL) {
    if ($title) {
        $svnfile = substr($svn, strrpos($svn, "/") + 1);
        $dstfile = str_replace(" ", "_", $title) . ".markdown";
        return "
            svn export {$svn}
            mv {$svnfile} {$dstfile}
        ";

    } else {
        return "
            svn export {$svn}
        ";
    }
}


function convert($title, $level) {
    $dstfile = str_replace(" ", "_", $title) . ".markdown";
    return "
        php convert.php 'svn/{$dstfile}' {$level}
    ";
}


function direct_list($title) {
    $dstfile = str_replace(" ", "_", $title) . ".html";
    return "[{$title}](/$dstfile)

";
}


if ($argv[1] == "convert") {

    echo "cd svn";

    foreach ($markdown_files as $info) {
        echo download($info['svn'], $info['title']);
    }

    echo "cd ..";

    foreach ($markdown_files as $info) {
        $level = isset($info['directory_fold_level']) ?
            (int)($info['directory_fold_level']) : 2;

        echo convert($info['title'], $level);
    }

} elseif ($argv[1] == "directory") {

    echo "## 文档接口平台首页\n\n";

    foreach ($markdown_files as $info) {
        echo direct_list($info['title']);
    }

} elseif ($argv[1] == "attach") {

    echo "cd svn/doc";

    foreach ($attach_files as $url) {
        echo download($url);
    }
}
