<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[]
]);

if($Mind->fileExists('https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png')){
    echo 'There is a file';
} else {
    echo 'No file';
}