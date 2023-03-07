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

if($Mind->is_decimal(1.2)){
    echo '1.2 is decimal';
}else{
    echo '1.2 is not decimal';
}

echo '<br>';

if($Mind->is_decimal('1.2')){
    echo '1.2 is decimal';
}else{
    echo '1.2 is not decimal';
}

echo '<br>';

if($Mind->is_decimal('1')){
    echo '1 is decimal';
}else{
    echo '1 is not decimal';
}

echo '<br>';

if($Mind->is_decimal(1)){
    echo '1 is decimal';
}else{
    echo '1 is not decimal';
}
