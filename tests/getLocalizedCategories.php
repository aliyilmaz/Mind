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
$localized = $Mind->getLocalizedCategories(
    $categories,
    $_SESSION['user']['lang'] ?? null
);
$Mind->print_pre($localized);