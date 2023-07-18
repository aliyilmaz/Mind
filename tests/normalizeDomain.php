<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// echo $Mind->normalizeDomain('example.com:8080/test1/test2'); // example.com
// echo $Mind->normalizeDomain('www.example.com/test1/test2'); // example.com
// echo $Mind->normalizeDomain('subdomain.example.com/test1/test2'); // example.com
// echo $Mind->normalizeDomain('https://example.com/test1/test2'); // example.com
// echo $Mind->normalizeDomain('http://example.com/test1/test2'); // example.com
// echo $Mind->normalizeDomain('http://www.example.com/test1/test2'); // example.com
// echo $Mind->normalizeDomain('127.0.0.1:8080/test1/test2'); // 127.0.0.1
// echo $Mind->normalizeDomain('http://127.0.0.1/test1/test2'); // 127.0.0.1
// echo $Mind->normalizeDomain('https://127.0.0.1/test1/test2'); // 127.0.0.1
echo $Mind->normalizeDomain('127.0.0.1/test1/test2'); // 127.0.0.1