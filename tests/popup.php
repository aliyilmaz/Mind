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
    'script'=>"<!-- Google Tag Manager 2020 --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-XXXXXX');</script><!-- End Google Tag Manager -->",
    'redirect'=>[
        'timeout'=>5000, // default 0
        'url'=>'https://www.mozilla.com' // default empty (required timeout)
    ]
]);