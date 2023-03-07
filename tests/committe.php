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

$request = [
    'username'=>'ali',
    'password'=>'123',
    'role'=>1,
    'tags'=>['tag1','tag2']
];

$values = $Mind->committe($request);
$Mind->print_pre($values);
echo '<hr>';
$values = $Mind->committe($request, 'username');
$Mind->print_pre($values);
echo '<hr>';
$values = $Mind->committe($request, 'username', 'username');
$Mind->print_pre($values);
echo '<hr>';
$values = $Mind->committe($request, null, 'username');
$Mind->print_pre($values);
echo '<hr>';
$values = $Mind->committe($request, null, ['username', 'role']);
$Mind->print_pre($values);
echo '<hr>';
$values = $Mind->committe($request, ['username', 'role'], ['username', 'role']);
$Mind->print_pre($values);
echo '<hr>';


// $values = $Mind->committe($request, ['username', 'password'], ['role', 'username']);
