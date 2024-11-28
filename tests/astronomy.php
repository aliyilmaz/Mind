<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// $request = $Mind->astronomy([
//     'sun'=> [
//         'lat'=>39.92500,
//         'lon'=>32.83694
//     ],
//     'moon'=> [
//         'timestamp'=>$Mind->timestamp
//     ]
// ]);
// $Mind->print_pre($request);


$request = $Mind->astronomy([
    'sun'=> [
        'lat'=>39.92500,
        'lon'=>32.83694,
        'timestamp'=>$Mind->timestamp,
        'timezone'=>'America/Toronto'
    ],
    'moon'=> [
        'timestamp'=>$Mind->timestamp,
        'timezone'=>'UTC'
    ]
]);
$Mind->print_pre($request);