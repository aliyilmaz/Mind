<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$str = 'Fenerbahçe test şğüçöıİÜĞÇÖŞ'; // 46656e6572626168c3a765207465737420c59fc49fc3bcc3a7c3b6c4b1c4b0c39cc49ec387c396c59e
echo $Mind->textToHex($str);