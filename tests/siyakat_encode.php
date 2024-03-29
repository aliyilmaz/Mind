<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$data = 'Türkiye\'de, yaklaşık 10.000 bitki türü yetişir. Bu bitki türlerinin yaklaşık 3.000\'i ise Türkiye\'ye endemiktir. Bu özelliği ile Türkiye, tüm Avrupa\'dakinden daha fazla endemik bitki türüne sahiptir.';
$miftah = array(
    array(
        '1'=>'elif', '2'=>'selim', '3'=>'gümüşlük', '4'=>'destan', '5'=>'abdulhamid',
        '6'=>'cuma', '7'=>'mustafakemal', '8'=>'cem', '9'=>'teras', '0'=>'cumhuriyet',
        'a'=>'turşu', 'b'=>'rakip', 'c'=>'silüet', 'd'=>'turan', 'e'=>'bal', 'f'=>'sarı'
    ),
    array(
        's' => '.-', '(' => '-...', 'a' => '-.-.', '0' => '-.-..', 'd' => '-..', '9' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'ö' => '--', '8' => '-.', 'o' => '---', 'q' => '---.', 'p' => '.--.', 'm' => '--.-', '7' => '.-.', 'c' => '...', 'z' => '.--..', 't' => '-', 'u' => '..-', '¿' => '..--', 'v' => '...-', '1' => '.--', '5' => '-..-', 'y' => '-.--', 'ş' => '--..', 'ç' => '-----', 'w' => '.----', '&' => '..---', '3' => '...--', '4' => '....-', 'x' => '.....',
        '6' => '-....','r' => '--...','n' => '---..','e' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','$' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','2' => '.-...',':' => '---...',';' => '-.-.-.','@' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','\'' => '...-..-',
        '=' => '.--.-.','ü' => '..-.-','¡' => '--...-',' ' => '/',
    )
);

$encode = $Mind->siyakat_encode($data, $miftah);
echo $encode;
