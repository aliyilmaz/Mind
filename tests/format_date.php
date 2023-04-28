<?php
require_once ('../src/Mind.php');

$Mind = new Mind([
    'db'=>[]
]);


// $date_string = '2023-04-28 00:00:00';
// echo $Mind->format_date($date_string); // 2023-04-28 00:00:00

// $date_string = '2023-04-28 00:00:00';
// echo $Mind->format_date($date_string, 'en_US', 'd F Y'); // 28 April 2023

// $date_string = '2023-04-28 00:00:00';
// echo $Mind->format_date($date_string, 'tr_TR', 'd F Y'); // 28 Nisan 2023

// $date_string = '28 April 2023';
// echo $Mind->format_date($date_string); // 28 April 2023

// $date_string = '28 April 2023';
// echo $Mind->format_date($date_string, 'tr_TR'); // 28 Nisan 2023

// $date_string = '28 Nisan 2023';
// echo $Mind->format_date($date_string, 'en_US'); // 28 April 2023

// $date_string = '28 Nisan 2023';
// echo $Mind->format_date($date_string, null, 'Y F d'); // 2023 April 28

// $date_string = '28 Nisan 2023';
// echo $Mind->format_date($date_string, 'en_US', 'Y F d'); // 2023 April 28

// $date_string = '28 Nisan 2023';
// echo $Mind->format_date($date_string, 'pl_PL', 'Y F d'); // 2023 Kwiecień 28

// $date_string = '28 Nisan 2023';
// echo $Mind->format_date($date_string, 'uk_UA', 'Y F d'); // 2023 Квітень 28

// $date_string = '28 Nisan 2023';
// echo $Mind->format_date($date_string, 'ro_RO', 'Y F d'); // 2023 Aprilie 28

$date_string = '28 Nisan 2023';
echo $Mind->format_date($date_string, 'pt_PT', 'Y F d'); // 2023 Abril 28