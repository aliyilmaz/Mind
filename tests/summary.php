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

$str = 'Türkiye\'de, yaklaşık 10.000 bitki türü yetişir. Bu bitki türlerinin yaklaşık 3.000\'i ise Türkiye\'ye endemiktir. Bu özelliği ile Türkiye, tüm Avrupa\'dakinden daha fazla endemik bitki türüne sahiptir.';
echo $Mind->summary($str, 46, ' ...');