<?php

require_once '../src/Mind.php';

$Mind = new Mind();
$data = 'In Turkey, about 10,000 plant species grow. About 3,000 of these plant species are endemic to Turkey. With this feature, Turkey has more endemic plant species than all of Europe.';

// if($Mind->is_base64(base64_encode($data))){
//     echo 'This is a Base64 code.';
// } else {
//     echo 'This is not a base64 code.';
// }

// if($Mind->is_base64($data)){
//     echo 'This is a Base64 code.';
// } else {
//     echo 'This is not a base64 code.';
// }

// Test 1: Valid base64 (dGVzdA== -> "test")
echo $Mind->is_base64('dGVzdA==') ? 'Valid base64' : 'Not valid';  // Valid base64
echo "<br>";

// Test 2: Invalid base64 (with the wrong character)
echo $Mind->is_base64('dGVzdA==X') ? 'Valid base64' : 'Not valid';  // Not valid
echo "<br>";

// Test 3: Invalid base64 (empty string)
echo $Mind->is_base64('') ? 'Valid base64' : 'Not valid';  // Not valid
echo "<br>";

// Test 4: Valid base64 (Another example: c3RhY2tvdmVyZmxvdw== -> "stackoverflow")
echo $Mind->is_base64('c3RhY2tvdmVyZmxvdw==') ? 'Valid base64' : 'Not valid';  // Valid base64
echo "<br>";

// Test 5:Invalid base64 (random string)
echo $Mind->is_base64('randomStringHere') ? 'Valid base64' : 'Not valid';  // Not valid
echo "<br>";