<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$data = '-- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.- / --.-. ..-- .--.. -.-.. ---.';
if($Mind->is_morse($data)){
    echo 'It is morse code. ( '.$Mind->morse_decode($data).' )';
} else {
    echo 'It\'s not Morse code.';
}

echo '<hr>';

$data = '.';
if(!$Mind->is_morse($data)){
    echo 'It\'s not Morse code.';
}  else {
    echo 'It is morse code. ( '.$Mind->morse_decode($data).' )';
}

echo '<hr>';

$data = 'p';
if(!$Mind->is_morse($data)){
    echo 'It\'s not Morse code.';
} else {
    echo 'It is morse code. ( '.$Mind->morse_decode($data).' )';
}