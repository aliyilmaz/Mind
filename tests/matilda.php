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

$data = $Mind->matilda('users', null, 'ali%', null, 0);
// $Mind->print_pre($data);

// table null|[]|[[]] keyword columns start and
// $data = $Mind->matilda('users', null, 'a%', 'username', null, 4);
// $Mind->print_pre($data);

// table null|[]|[[]] ''|[]|null ''|[]|null integer|null integer|null
// $data = $Mind->matilda('users', [['id'=>1]], ['%a%'], ['username','avatar'], 4);
// $Mind->print_pre($data);

// table null|[]|[[]] keyword columns start and
// $data = $Mind->matilda('users', [['id'=>1],['id'=>2]], ['%a%'], ['username','avatar'], null, 2);
// $Mind->print_pre($data);

// table null|[]|[[]] ''|[]|null ''|[]|null integer|null integer|null null|''
// $data = $Mind->matilda('users', [['id'=>1],['id'=>2]], ['%a%'], ['username','avatar'], 0, 2, 'id:desc');
// $Mind->print_pre($data);

// table null|[]|[[]] ''|[]|null ''|[]|null integer|null integer|null null|'' null|''
// $data = $Mind->matilda('users', [['id'=>1],['id'=>2]], ['%a%'], ['username','avatar'], 0, 2, 'username', 'json');

$Mind->print_pre($data);