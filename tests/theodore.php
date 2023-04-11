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
//     [group_id] => 10
// )
// echo '<pre>';
// print_r($Mind->theodore('permission', array('user_id'=>15), 'group_id'));
// echo '</pre>';

// Array
// (
//     [id] => 208
//     [group_id] => 10
// )
// echo '<pre>';
// print_r($Mind->theodore('permission', array('user_id'=>15), array('id', 'group_id')));
// echo '</pre>';

// Array
// (
//     [id] => 208
//     [user_id] => 15
//     [group_id] => 10
//     [_token] => 
//     [status] => 
//     [created_at] => 
//     [updated_at] => 
// )
// echo '<pre>';
// print_r($Mind->theodore('permission', array('user_id'=>15)));
// echo '</pre>';


// $options = [
//     'service_id'=>1,
//     'position_id'=>4
//   ];
// $data = $Mind->theodore('contents', ['id'=>2], null, $options);
// $Mind->print_pre($data);

$options = [    
    [
        'service_id'=>1,
        'position_id'=>9
    ],
    [
        'service_id'=>1,
        'position_id'=>4
    ]
];
$data = $Mind->theodore('contents', ['id'=>2], null, $options);
$Mind->print_pre($data);