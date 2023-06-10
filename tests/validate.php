<?php

require_once('../src/Mind.php');

$Mind = new Mind();

/*
 | Support Rule;
 | --------------------------------------------------------
 | required, email, url, phone, color, https, http,
 | json, max-num, min-num, max-char, min-char, numeric,
 | min-age, max-age, date, unique, knownunique, available, 
 | unchanged, bool, iban, ipv4, ipv6, blood, coordinate, 
 | distance, languages, morse, binary, timecode, currencies,
 | decimal, isbn, in, slug, port, port_open, fileExists, md5,
 | base64
 | 
 */

//  Data
$data = array(
    'username'          =>  'aliyilmaz',
    'title'             =>  'Merhaba dünya1',
    'email'             =>  'aliyilmaz.work@gmail.com',
    'phone_number'      =>  '05554248988',
    'background_color'  =>  '#ffffff',
    'webpage'           =>  'http://google.com',
    'https_webpage'     =>  'https://google.com',
    'http_webpage'      =>  'http://google.com',
    'json_data'         =>  '{ "name":"John", "age":30, "car":null }',
    'content'           =>  'merhaba',
    'summary'           =>  'merhab',
    'quentity'          =>  '4',
    'numeric_str'       =>  12,
    'birthday'          =>  '1987-02-14',
    'register_date'     =>  '2020-02-18 14:34:22',
    'status'            =>  1,
    'ibanNumber'        =>  'SE35 5000 0000 0549 1000 0003',
    'ipv4Address'       =>  '127.0.0.1',
    'ipv6Address'       =>  '2001:0db8:85a3:08d3:1319:8a2e:0370:7334',
    'bloodGroup'        =>  '0+',
    'coordinates'       =>  '41.008610,28.971111',
    'distances'         =>  '41.008610,28.971111@39.925018,32.836956',
    'language'          =>  'TR',
    'morse_code'        =>  '.- .-.. .-..- / -.-- .. .-.. -- .- --..', // ali yılmaz
    'binary_code'       =>  '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010', // Ali Yılmaz
    'timecode'          =>  '59:59:59',
    'product_currency'  =>  'USD',
    'product_price'     =>  '10.00',
    'book_isbn'         =>  'ISBN:0-306-40615-2',
    'type'              =>  'countable',
    'post_slug'         =>  'hello-world', // or Hello-world
    'server_port'       =>  '65535',
    'client_port'       =>  '172.217.17.142',
    'logo_file'         =>  'https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png',
    'password_md5'      =>  'e10adc3949ba59abbe56e057f20f883e',
    'password_base64'   =>  'YWRtaW5pc3RyYXRvcg=='

 );

// Rule
$rule = array(
    'username'          =>  'available:users',
    // 'username'          =>  'knownunique:users:username:aliyilmaz'
    // 'username'          =>  'knownunique:users:aliyilmaz'
    'title'             =>  'required|unique:posts',
    'email'             =>  'email|unique:users',
    'phone_number'      =>  'phone',
    'background_color'  =>  'color',
    'webpage'           =>  'url',
    'https_webpage'     =>  'https',
    'http_webpage'      =>  'http',
    'json_data'         =>  'json',
    'content'           =>  'max-char:7',
    'summary'           =>  'min-char:6|max-char:10',
    'quentity'          =>  'min-num:2|max-num:4',
    'numeric_str'       =>  'numeric',
    'birthday'          =>  'min-age:33|max-age:40',
    'register_date'     =>  'date:Y-m-d H:i:s',
    'status'            =>  'bool:true',
    'ibanNumber'        =>  'iban',
    'ipv4Address'       =>  'ipv4',
    'ipv6Address'       =>  'ipv6',
    'bloodGroup'        =>  'blood:0+',
    'coordinates'       =>  'required|coordinate',
    'distances'         =>  'distance:349 km',
    'language'          =>  'languages',
    'morse_code'        =>  'morse',
    'binary_code'       =>  'binary',
    'timecode'          =>  'timecode',
    'product_currency'  =>  'currencies',
    'product_price'     =>  'decimal',
    'book_isbn'         =>  'isbn',
    'type'              =>  'in:countable', // single
    // 'type'              =>  'in:ponderable,countable,measurable' // multi
    'post_slug'         =>  'slug',
    'server_port'       =>  'port',
    'client_port'       =>  'port_open', // Default 80 or It also takes into account the special port. is_port_open:443
    'logo_file'         =>  'fileExists',
    'password_md5'      =>  'md5',
    'password_base64'   =>  'base64'
);

// Message
$message = array(
    'username'=>array(
        'available'=>'This user name does not exist.'
    ),
    'title'=>  array(
        'required'=>'It should not be left blank.',
        'unique'=>'A unique record must be specified.'
    ),
    'email'=>array(
        'email'=>'A valid e-mail address must be specified.',
        'unique'=>'A unique record must be specified.'
    ),
    'phone_number'=>array(
        'phone'=>'A valid phone number must be specified.'
    ),
    'background_color'=>array(
        'color'=>'A valid color must be specified.'
    ),
    'webpage'=>array(
        'url'=>'A valid URL must be specified.'
    ),
    'https_webpage'=>array(
        'https'=>'A valid https address must be specified.'
    ),
    'http_webpage'=>array(
        'http'=>'A valid http address must be specified.'
    ),
    'json_data'=>array(
        'json'=>'A valid json data must be specified.'
    ),
    'content'=>array(
        'max-char'=>'The maximum character limit must not be exceeded.'
    ),
    'summary'=>array(
        'min-char'=>'Minimum character limit must be specified.',
        'max-char'=>'The maximum character limit must not be exceeded.'
    ),
    'quentity'=>array(
        'min-num'=>'The minimum number must be specified.',
        'max-num'=>'The maximum number should not be exceeded.'
    ),
    'numeric_str'=>array(
        'numeric'=>'Numeric character must be specified.'
    ),
    'birthday'=>array(
        'min-age'=>'An age less than the minimum age must be specified.',
        'max-age'=>'An age greater than the maximum age must be specified.'
    ),
    'register_date'=>array(
        'date'=>'Date must be specified in year-month-day format.'
    ),
    'status'=>array(
        'bool'=>'Validation failed.'
    ),
    'ibanNumber'=>array(
        'iban'=>'The IBAN account has not been verified.'
    ),
    'ipv4Address'=>array(
        'ipv4'=>'An IP address must be specified in the ipv4 syntax.'
    ),
    'ipv6Address'=>array(
        'ipv6'=>'An IP address must be specified in the ipv6 syntax.'
    ),
    'bloodGroup'=>array(
        'blood'=>'The blood group according to the instructions should be specified.'
    ),
    'coordinates'=>array(
        'coordinate'=>'A valid coordinate must be specified.'
    ),
    'distances'=>array(
        'distance'=>'The coordinate point within range must be specified.'
    ),
    'language'=>array(
        'languages'=>'Language selection should be made.'
    ),
    'morse_code'=>array(
        'morse'=>'A valid morse code must be specified.'
    ),
    'binary_code'=>array(
        'binary'=>'A valid binary code must be specified.'
    ),
    'timecode'=>array(
        'timecode'=>'A valid timecode must be specified.'
    ),
    'product_currency'=>array(
        'currencies'=>'A valid currency must be specified.'
    ),
    'product_price'=>array(
        'decimal'=>'A valid decimal number must be specified.'
    ),
    'book_isbn'=>array(
        'isbn'=>'A valid ISBN must be specified.'
    ),
    'type'=>array(
        'in'=>'A valid type must be specified.'
    ),
    'post_slug'=>array(
        'slug'=>'A valid slug must be specified.'
    ),
    'server_port'=>array(
        'port'=>'The current port number must be specified'
    ),
    'client_port'=>array(
        'port_open'=>'The information of an accessible connection should be specified..'
    ),
    'logo_file'=>array(
        'fileExists'=>'A accessible file path must be specified.'
    ),
    'password_md5'=>array(
        'md5'=>'This parameter is not in the MD5 syntax.'
    ),
    'password_base64'=>array(
        'base64'=>'This parameter is not in the Base64 syntax.'
    )

);

if($Mind->validate($rule, $data, $message)){
    echo 'Everything is OK';
} else {
    echo '<pre>';
    print_r($Mind->errors);
    echo '</pre>';
}