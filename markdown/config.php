<?php

$markdown_files = array(
    array(
        'svn'   => 'http://192.168.18.171/svn/mobileservice4.0/doc/apidoc/api.markdown',
        'title' => 'mobileservice 4.0 接口文档',
    ),
    array(
        'svn'   => 'http://192.168.18.171/svn/mobileservice4.0/doc/apidoc/upload.markdown',
        'title' => '客户端上报数据接口文档',
    ),
    array(
        'svn'   => 'http://192.168.18.171/svn/mobileservice4.0/doc/apidoc/secure.markdown',
        'title' => '接口安全校验方式',
    ),
);


function download($svn, $title) {
    $svnfile = substr($svn, strrpos($svn, "/") + 1);
    $dstfile = str_replace(" ", "_", $title) . ".markdown";
    return "
        svn export {$svn}
        mv {$svnfile} {$dstfile}
    ";
}


function convert($title) {
    $dstfile = str_replace(" ", "_", $title) . ".markdown";
    return "
        php convert.php 'svn/{$dstfile}'
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
        echo convert($info['title']);
    }

} elseif ($argv[1] == "directory") {

    echo "## 文档接口平台首页\n\n";

    foreach ($markdown_files as $info) {
        echo direct_list($info['title']);
    }

}
