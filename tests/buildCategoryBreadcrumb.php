<?php
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

$categories = $Mind->samantha('categories', null);
$token = ' token ';
echo $Mind->buildCategoryBreadcrumb($categories, $token);
echo $Mind->buildCategoryBreadcrumb($categories, $token, ' > ');