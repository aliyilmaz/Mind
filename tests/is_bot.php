<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// if($Mind->is_bot()){
//     echo 'Yes, you are a bot.';
// } else {
//     echo 'No, you're not a bot.';
// }

$userAgent = "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)";

if($Mind->is_bot($userAgent)){
    echo 'This value seems to belong to a bot.';
} else {
    echo 'No, this value does not appear to belong to a bot.';
}