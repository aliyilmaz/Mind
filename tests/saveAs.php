<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

$Mind->saveAs('app/migration/mysql_backup_2022_02_14_01_00_53.json');
// $Mind->saveAs('app/migration/mysql_backup_2022_02_14_01_00_53.json', null, false);
// $Mind->saveAs('.htaccess', null, false);
// $Mind->saveAs('deny_directory/style.css', null, false);
// $Mind->saveAs('test.flac', null, false);
// $Mind->saveAs('test.wav');
// $Mind->saveAs('test.mp4');
