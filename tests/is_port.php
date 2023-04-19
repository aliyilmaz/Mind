<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// if($Mind->is_port('443')){
//     echo 'This is a valid port.';
// } else {
//     echo 'This is not a valid port.';
// }

if($Mind->is_port('65536')){
    echo 'This is a valid port.';
} else {
    echo 'This is not a valid port.';
}
