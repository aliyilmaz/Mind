<?php
require_once '../src/Mind.php';

$Mind = new Mind();

/*$url = 'https://www.cloudflare.com/';
$left = '';
$right = '';
$data 	= $Mind->get_contents($left, $right, $url);
$Mind->print_pre($data);

echo '<br><br>';
*/

// $url = 'https://www.hepsiburada.com/';
// $left = '';
// $right = '';
// $data 	= $Mind->get_contents($left, $right, $url);
// $Mind->print_pre($data);

// echo '<br><br>';

/*
$url 	= 'https://www.cloudflare.com/';
$left 	= '<title>';
$right	= '</title>';
$data 	= $Mind->get_contents($left, $right, $url);
$Mind->print_pre($data);


echo '<br><br>';

$url 	= 'https://www.cloudflare.com/';
$left 	= '<link rel="alternate" hreflang="';
$right	= '"';
$data 	= $Mind->get_contents($left, $right, $url);
$Mind->print_pre($data);


echo '<br><br>';

$url 	= 'Örnek bir içeriktir. <title>Merhaba Dünya!</title>';
$left 	= '<title>';
$right	= '</title>';
$data 	= $Mind->get_contents($left, $right, $url);
$Mind->print_pre($data);

echo '<br><br>';

$url = 'src=\'-str\'-after src=\'-str\'-after src=\'-str\'-after src=\'-str\'-after';
$left = 'src=\'';
$right = '\'-after';
$data 	= $Mind->get_contents($left, $right, $url);
$Mind->print_pre($data);

echo '<br><br>';

$url = '{"filmler": [  {"imdb": "tt0116231", "url": "&lt;iframe src=&#039;https://example.com&#039; width=&#039;640&#039; height=&#039;360&#039; frameborder=&#039;0&#039; marginwidth=&#039;0&#039; marginheight=&#039;0&#039; scrolling=&#039;NO&#039; allowfullscreen=&#039;allowfullscreen&#039;&gt;&lt;/iframe&gt;"} ]}';
$left = 'src=&#039;';
$right = '&#039;';
$data 	= $Mind->get_contents($left, $right, $url);
$Mind->print_pre($data);*/

// $url = 'https://mpop-sit.example.com/product/api/categories/get-all-categories?leaf=true&status=ACTIVE&available=true&page=0&size=1000&version=1';
// $left = '';
// $right = '';
// $options = [
//     'authorization'=>[
//         'username'=>'example_username',
//         'password'=>'example_password'
//     ]
// ];
// // Start connection.
// $Mind->print_pre($Mind->get_contents($left, $right, $url, $options));


// $url = 'https://mpop-sit.example.com/product/api/products/import';
// $left = '';
// $right = '';
// $options = [
//     'attachment'=>'./data1.json',
//     'authorization'=>[
//         'username'=>'example_username',
//         'password'=>'example_password'
//     ]
// ];
// // Start connection.
// $Mind->print_pre($Mind->get_contents($left, $right, $url, $options));

// $url = 'https://www.example.com/login';
// $left = '';
// $right = '';
// $options = array(
// //    'referer'=>$url,
//     'post'=>array(
//         'username'=>'aliyilmaz',
//         'password'=>'123456'
//     )
// );

// // Start connection.
// $Mind->get_contents($left, $right, $url, $options);

// // Session access.
// $url = 'https://www.example.com/admin/users';
// $left = '<title>';
// $right = '</title>';
// $data = $Mind->get_contents($left, $right, $url);
// $Mind->print_pre($data);

/*
$xml_data ='<?xml version="1.0" encoding="UTF-8"?>'.
    
    '<smspack ka="kullanici_adi" pwd="kullanici_parolasi" org="Originator_adi" >'.
    
    '<mesaj>'.
    
        '<metin>'.$Mind->post['metin'].'</metin>'.
    
            '<nums>'.$Mind->post['telefon'].'</nums>'.
    
    '</mesaj>'.
    
    
    
    '<mesaj>'.
    
            '<metin>'.$Mind->post['metin'].'</metin>'.
    
            '<nums>'.$Mind->post['telefon'].'</nums>'.
    
    '</mesaj>'.
    
'</smspack>';

$options = array(
    'post'=>$xml_data
);

$output = $Mind->get_contents('', '', 'https://smsgw.mutlucell.com/smsgw-ws/sndblkex', $options);
*/


// $options = array(
//     'header'=>array(
//         'accept'=>"application/json, text/javascript, */*; q=0.01",
//         'accept-language'=>"tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",
//         'content-type'=>"application/x-www-form-urlencoded; charset=UTF-8",
//         'sec-ch-ua'=>"\"Chromium\";v=\"94\", \"Google Chrome\";v=\"94\", \";Not A Brand\";v=\"99\"",
//         'sec-ch-ua-mobile'=>"?0",
//         'sec-ch-ua-platform'=>"\"Linux\"",
//         'sec-fetch-dest'=>"empty",
//         'sec-fetch-mode'=>"cors",
//         'sec-fetch-site'=>"same-origin",
//         'x-requested-with'=>"XMLHttpRequest"
//     )
// );

// $url = 'https://www.example.com/archive';
// $left = '<title>';
// $right = '</title>';
// $data = $Mind->get_contents($left, $right, $url, $options);
// $Mind->print_pre($data);


$left = '';
$right = '';
$options = [
    'proxy'=>[
        'url'=> '255.255.255.255:80',
        'user'=> 'username:password',
        // 'protocol'=>'CURLPROXY_SOCKS5' or https://curl.se/libcurl/c/CURLOPT_PROXYTYPE.html
    ]
];
$data = $Mind->get_contents($left, $right, 'https://ipleak.net/', $options);

$Mind->print_pre($data);