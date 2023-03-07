<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$data = '
    <link href=chunk-c23060a2.5288cd9ea090a4e0e352.css rel=prefetch>
    <link rel="preload" href="main.js" as="script">
    <link href=chunk-206f96fd.8a5918638b41295dd9df.js rel=prefetch>
    <img style="display:none;" src="foo.jpg" onload="something"/>
    <img onmessage="javascript:foo()"><style>body{ background-color:#000;}</style>
    <a notonmessage="nomatch-here">
    <p><script></script>
    things that are just onfoo="bar" shouldn\'t match either, outside of a tag
    </p><iframe src=".."></iframe>
';
echo $Mind->safeContainer($data);
echo '<hr>';
echo $Mind->safeContainer($data, 'inlinecss');
echo '<hr>';
echo $Mind->safeContainer($data, 'inlinejs');
echo '<hr>';
echo $Mind->safeContainer($data, 'tagjs');
echo '<hr>';
echo $Mind->safeContainer($data, 'tagcss');
echo '<hr>';
echo $Mind->safeContainer($data, 'iframe');
echo '<hr>';
echo $Mind->safeContainer($data, array('inlinecss', 'inlinejs', 'tagjs', 'tagcss', 'iframe'));