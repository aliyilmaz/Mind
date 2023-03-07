<?php

require_once '../src/Mind.php';

$conf = array(
    'db'=>[
        'drive'     =>  'mysql',
        'host'      =>  'localhost',
        'dbname'    =>  'mydb',
        'username'  =>  'root',
        'password'  =>  ''
    ],
    'firewall'  =>  array(
        // 'noiframe'  =>  false,
        // 'nosniff'   =>  false,
        // 'noxss'     =>  false,
        // 'ssl'       =>  false,
        // 'hsts'      =>  false,
        // 'csrf'      =>  false,
        // 'csrf'      =>  true,
        // 'csrf'      =>  array('limit'=>150),
        // 'csrf'      =>  array('name'=>'_token'),
        // 'csrf'      =>  array('name'=>'_token', 'limit'=>150),
        // 'allow'     =>  [
        //     'platform'=>'Windows', // ['Windows', 'Linux', 'Darwin']
        //     'browser'=>'Chrome', // ['Chrome', 'Firefox'], 
        //     'ip'=>'127.0.0.1', // ['192.168.2.200', '192.168.2.201', '222.222.222.222']
        // ],
        // 'deny'     =>  [
        //     'platform'=>'Linux', // ['Windows', 'Linux', 'Darwin']
        //     'browser'=>'Firefox', // ['Chrome', 'Firefox'], 
        //     'ip'=>'127.0.0.2', // ['192.168.2.200', '192.168.2.201', '222.222.222.222']
        // ],
        // 'lifetime'=>[
        //     'start'=>'2022-09-17 20:31:51',
        //     'message'=>'You must wait for the specified time to use your access right.'
        // ]
        // 'lifetime'=>[
        //     'end'=>'2022-09-17 20:31:51',
        //     'message'=>'The deadline for your access has expired.'
        // ]
        'lifetime'=>[
            'start'=>'2022-09-17 20:31:51',
            'end'=>'2022-09-17 20:57:30',
            'message' => 'The access right granted to you has expired.'
        ]

    )
);

$Mind = new Mind($conf);

echo 'It is open to remote access.';

?>



