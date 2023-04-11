<?php
require_once '../src/Mind.php';

$Mind = new Mind([
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite
        'host'      =>  'localhost',
        'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ]
]);


// Array
// (
//     [0] => Array
//         (
//             [group_id] => 10
//         )

// )
// echo '<pre>';
// print_r($Mind->samantha('permission', array('user_id'=>15), 'group_id'));
// echo '</pre>';


// Array
// (
//     [0] => Array
//         (
//             [id] => 208
//             [group_id] => 10
//         )

// )
// echo '<pre>';
// print_r($Mind->samantha('permission', array('user_id'=>15), array('id', 'group_id')));
// echo '</pre>';

// Array
// (
//     [0] => Array
//         (
//             [id] => 208
//             [user_id] => 15
//             [group_id] => 10
//             [_token] => 
//             [status] => 
//             [created_at] => 
//             [updated_at] => 
//         )

// )
// echo '<pre>';
// print_r($Mind->samantha('permission', array('user_id'=>15)));
// echo '</pre>';


// $options = [
//     'service_id'=>1,
//     'position_id'=>4
// ];
// $data = $Mind->samantha('contents', ['position_id'=>9], null, $options);
// $Mind->print_pre($data);

$options = [
    [
        'service_id'=>1,
        'position_id'=>6
    ],
    [
        'service_id'=>1,
        'position_id'=>9
    ],
    [
        'service_id'=>1,
        'position_id'=>4
    ]
];
$data = $Mind->samantha('contents', ['position_id'=>8], null, $options);
$Mind->print_pre($data);