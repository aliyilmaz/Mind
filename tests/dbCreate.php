<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

echo '<br>';

if($Mind->dbCreate('mydb')){
    echo 'The database has been created.';
} else {
    echo 'The database could not be created.';
}

echo '<br>';

if($Mind->dbCreate(array('mydb', 'mydb1'))){
    echo 'The database has been created.';
} else {
    echo 'The database could not be created.';
}