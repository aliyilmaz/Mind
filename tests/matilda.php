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

$data = $Mind->matilda('users', 'ali%', null, null, 0);
// $Mind->print_pre($data);

// table null|[]|[[]] keyword columns start and
// $data = $Mind->matilda('users', 'a%', null, 'username', null, 4);
// $Mind->print_pre($data);

// table null|[]|[[]] ''|[]|null ''|[]|null integer|null integer|null
// $data = $Mind->matilda('users', ['%a%'], [['id'=>1]], ['username','avatar'], 4);
// $Mind->print_pre($data);

// table null|[]|[[]] keyword columns start and
// $data = $Mind->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], null, 2);
// $Mind->print_pre($data);

// table null|[]|[[]] ''|[]|null ''|[]|null integer|null integer|null null|''
// $data = $Mind->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], 0, 2, 'id:desc');
// $Mind->print_pre($data);

// table null|[]|[[]] ''|[]|null ''|[]|null integer|null integer|null null|'' null|''
// $data = $Mind->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], 0, 2, 'username', 'json');

$Mind->print_pre($data);