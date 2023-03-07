<?php

require_once '../src/Mind.php';

$Mind = new Mind();

// echo $Mind->morse_decode('-- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.-');

$morseDictionary = array(
    'c' => '.-', '(' => '-...', 'a' => '-.-.', 'ç' => '-.-..', 'd' => '-..', 'e' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'm' => '--', 'n' => '-.', 'o' => '---', 'ö' => '---.', 'p' => '.--.', 'q' => '--.-', 'r' => '.-.', 's' => '...', 'ş' => '.--..', 't' => '-', 'u' => '..-', 'ü' => '..--', 'v' => '...-', 'w' => '.--', 'x' => '-..-', 'y' => '-.--', 'z' => '--..', '0' => '-----', '1' => '.----', '2' => '..---', '3' => '...--', '4' => '....-', '5' => '.....',
    '6' => '-....','7' => '--...','8' => '---..','9' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','\'' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','&' => '.-...',':' => '---...',';' => '-.-.-.','=' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','$' => '...-..-',
    '@' => '.--.-.','¿' => '..-.-','¡' => '--...-',' ' => '/'
);
$decode = $Mind->morse_decode('-- ..- ... - -.-. ..-. -.-. / -.- . -- -.-. .-.. / -.-. - -.-. - ..-- .-. -.-', $morseDictionary); 

echo $decode;