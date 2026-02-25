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


$categories   = $Mind->samantha('categories', null);
$currentToken = 'token';       // Edited category token
$selectedParent = null;        // Null if parent is not selected

$options = $Mind->categoryParentOptions(
    $categories,
    $_SESSION['user']['lang'] ?? null,
    $currentToken,
    $selectedParent
);

echo $options;