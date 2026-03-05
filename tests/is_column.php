<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

if($Mind->is_column('users', 'username')){
    echo 'There is a column';
} else {
    echo 'No column';
}

// if($Mind->is_column('users', ['username','password'])){
//     echo 'There are columns';
// } else {
//     echo 'No columns';
// }