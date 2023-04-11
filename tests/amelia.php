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


// 207
// echo '<pre>';
// print_r($Mind->amelia('permission', array('user_id'=>15), 'id'));
// echo '</pre>';

// $options = [
//     'service_id'=>1,
//     'position_id'=>4
//   ];
// $data = $Mind->amelia('contents', ['id'=>2], 'title', $options);
// echo $data;

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
$data = $Mind->amelia('contents', ['id'=>2], 'title', $options);
echo $data;
