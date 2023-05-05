<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[]
]);

// Array
// (
//     [month_names] => ocak|şubat|mart|nisan|mayıs|haziran|temmuz|ağustos|eylül|ekim|kasım|aralık
//     [abbreviated_month_names] => oca|şub|mar|nis|may|haz|tem|ağu|eyl|eki|kas|ara
//     [days_of_week] => pazartesi|salı|çarşamba|perşembe|cuma|cumartesi|pazar
//     [date_words] => bugün|dün|yarın
//     [date_format] => d.m.Y
//     [locale] => tr_TR
// )
// $date_string = '28 Mayıs 2023';
// $Mind->print_pre($Mind->getDateLib($date_string));

// Array
// (
//     [month_names] => ocak|şubat|mart|nisan|mayıs|haziran|temmuz|ağustos|eylül|ekim|kasım|aralık
//     [abbreviated_month_names] => oca|şub|mar|nis|may|haz|tem|ağu|eyl|eki|kas|ara
//     [days_of_week] => pazartesi|salı|çarşamba|perşembe|cuma|cumartesi|pazar
//     [date_words] => bugün|dün|yarın
//     [date_format] => d.m.Y
//     [locale] => tr_TR
// )
// $date_string = '28 Nisan 2023';
// $Mind->print_pre($Mind->getDateLib($date_string));

// $date_string = '28 Nisan 2023';
// $Mind->print_pre($Mind->getDateLib($date_string, 'locale')); // tr_TR

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

