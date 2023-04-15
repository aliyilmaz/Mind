<?php

require_once '../src/Mind.php';

$Mind = new Mind();

// $Mind->print_pre($Mind->duplicate('../contributing.md','download'));

// $Mind->print_pre($Mind->duplicate('https://github.com/fluidicon.png','download'));

$links = array(
    'https://github.com/aliyilmaz/Mind/archive/master.zip',
    '.htaccess'
  );
$Mind->print_pre($Mind->duplicate($links, ['download1','download2']));
