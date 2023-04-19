<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// if($Mind->is_port_open('172.217.17.142')){
//     echo 'There is a link';
// } else {
//     echo 'The information of an accessible connection should be specified.';
// }


if($Mind->is_port_open('172.217.17.142', 21)){
    echo 'There is a link';
} else {
    echo 'The information of an accessible connection should be specified.';
}
