<?php
require_once ('../src/Mind.php');

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

// $data = $Mind->matilda('users', 'ali%', null, null, null, 0);
// $Mind->print_pre($data);


// $data = $Mind->matilda('users', 'a%', null, 'username', null, null, 4);
// $Mind->print_pre($data);


// $data = $Mind->matilda('users', ['%a%'], [['id'=>1]], ['username','avatar'], null, 4);
// $Mind->print_pre($data);


// $data = $Mind->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], null, 2);
// $Mind->print_pre($data);


// $data = $Mind->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], null, 0, 2, 'id:desc');
// $Mind->print_pre($data);


// $data = $Mind->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], null, 0, 2, null, 'json');
// $Mind->print_pre($data);


// $options = [
//     'group_name'=>'admin'
// ];
// $data = $Mind->matilda('users', ['%ali%'], null, null, $options);
// $Mind->print_pre($data);

$options = [    
    [
        'group_name'=>'write',
    ],
    [
        'status'=>1
    ]
];
$data = $Mind->matilda('users', ['%ali%'], null, null, $options);
$Mind->print_pre($data);