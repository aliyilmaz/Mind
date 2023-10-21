<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[]]);


$str = 'Would you like to allow us to process your browser cookies in accordance with <a href="https://gdpr-info.eu/" target="_blank">GDPR</a> and <a href="https://www.kvkk.gov.tr/" target="_blank">KVKK</a> regulations in order to improve user experience and service quality?';
// $str = '<img src="http://localhost/popupBox.jpg" style="width:100%">';
$Mind->popup($str, [
    'theme'=>'black', // default red (white, red, black)
    'position'=>'bottom', // default bottom (top, bottom, full)
    'button'=>[
        // 'true'=>[
        //     // 'text'=>'', // default "Yes"
        //     // 'href'=>'http://encrypted.google.com'
        // ],
        'false'=> [
            // 'text'=>'no', // default  "No, Thanks"
            // 'href'=>'#'
        ]
    ],
    // 'again'=>false, // default "true"
    'script'=>'<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script><script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag(\'js\', new Date()); gtag(\'config\', \'G-XXXXXXXXXX\');</script>',
    'redirect'=>[
        'timeout'=>5000, // default 0
        'url'=>'https://www.mozilla.com' // default empty (required timeout)
    ]
]);