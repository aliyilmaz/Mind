<?php

require_once '../src/Mind.php';

$Mind = new Mind();

// code:
// $Mind->print_pre($Mind->tableInterpriter('users'));

// output:
// Array
// (
//     [0] => id:increments:11
//     [1] => username:string:255
//     [2] => password:string:255
//     [3] => description:medium
//     [4] => address:large
//     [5] => amount:decimal:10,0
//     [6] => age:int:11
// )



// code:
// $Mind->print_pre($Mind->tableInterpriter('users', 'address'));

// output:
// Array
// (
//     [0] => id:increments@11
//     [1] => username:string@255
//     [2] => password:string@255
//     [3] => description:medium
//     [4] => amount:decimal@10,0
//     [5] => age:int@11
// )


// code:
// $Mind->print_pre($Mind->tableInterpriter('users', ['address', 'age']));

// output:
// Array
// (
//     [0] => id:increments@11
//     [1] => username:string@255
//     [2] => password:string@255
//     [3] => description:medium
//     [4] => amount:decimal@10,0
// )
