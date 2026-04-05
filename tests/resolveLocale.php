<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// Valid usage
echo $Mind->resolveLocale('tr').'<br>';        // "tr-TR"
echo $Mind->resolveLocale('en').'<br>';        // "en-US"
echo $Mind->resolveLocale('en', 'GB').'<br>';  // "en-GB"
echo $Mind->resolveLocale('pt', 'BR').'<br>';  // "pt-BR"
echo $Mind->resolveLocale('zh', 'TW').'<br>';  // "zh-TW"
echo $Mind->resolveLocale('tr-TR').'<br>';     // "tr-TR"
echo $Mind->resolveLocale('en_US').'<br>';     // "en-US"

// Invalid usage (returns null)
echo $Mind->resolveLocale('xx').'<br>';        // null (invalid language)
echo $Mind->resolveLocale('tr', 'US').'<br>';  // null (language-region mismatch)
echo $Mind->resolveLocale('en', 'RR').'<br>';  // null (invalid region)
echo $Mind->resolveLocale('en-RR').'<br>';     // null (invalid region)
echo $Mind->resolveLocale('xx-US').'<br>';     // null (invalid language)
