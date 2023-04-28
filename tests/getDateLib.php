<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[]
]);


// $date_string = '28 Nisan 2023';
// echo $Mind->getDateLib($date_string, 'locale'); // tr_TR

// Array
// (
//     [month_names] => ianuarie|februarie|martie|aprilie|mai|iunie|iulie|august|septembrie|octombrie|noiembrie|decembrie
//     [abbreviated_month_names] => ian|feb|mar|apr|mai|iun|iul|aug|sep|oct|nov|dec
//     [days_of_week] => luni|marți|miercuri|joi|vineri|sâmbătă|duminică
//     [date_words] => azi|ieri|maine
//     [date_format] => d.m.Y
//     [locale] => ro_RO
// )
// $Mind->print_pre($Mind->getDateLib(null, 'ro_RO'));

// $date_string = '28 Nisan 2023';
// $Mind->print_pre($Mind->getDateLib($date_string, 'month_names')); // tr_TR

$Mind->print_pre($Mind->getDateLib());

