<?php
require_once('../src/Mind.php');

$Mind = new Mind();

// $tblname = 'users';
// $str = 'aliyilmaz.work@gmail.com';
// $column = 'email_address';
// if($Mind->do_have($tblname, $str, $column)){
//     echo 'This e-mail address is used';
// } else {
//     echo 'This e-mail address is not used.';
// }

// $tblname = 'users';
// $str = 'aliyilmaz.work@gmail.com';
// if($Mind->do_have($tblname, $str)){
//     echo 'This e-mail address is used';
// } else {
//     echo 'This e-mail address is not used.';
// }

// if($Mind->do_have('users', 'aliyilmaz.work@gmail.com', 'email_address')){
//     echo 'This e-mail address is used';
// } else {
//     echo 'This e-mail address is not used.';
// }

// if($Mind->do_have('users', 'aliyilmaz.work@gmail.com')){
//     echo 'This e-mail address is used';
// } else {
//     echo 'This e-mail address is not used.';
// }

// if($Mind->do_have('users', array('email'=>'aliyilmaz.work@gmail.com'))){
//     echo 'This e-mail address is used';
// } else {
//     echo 'This e-mail address is not used.';
// }


// if($Mind->do_have('users', 'ceyda', null, ['status'=>1])){
//     echo 'true';
// } else {
//     echo 'false';
// }
if($Mind->do_have('users', 'ceyda', null, [['status'=>1],['email'=>'ceyda1@example.com']])){
    echo 'true';
} else {
    echo 'false';
}