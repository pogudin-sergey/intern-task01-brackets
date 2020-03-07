#!/usr/bin/env php
<?php
/**
 * @version 1.0
 * @author Pogudin Sergey
 * @license MIT
 */

/* Setting */
define('STRING_MIN_LEN', 2);

error_reporting(E_ALL);
set_time_limit(0);
mb_internal_encoding("UTF-8");

/* Prepare cli */
if (php_sapi_name() != 'cli') {
    die('Run console only!' . PHP_EOL);
}

$data = null;

if($argc != 2)
{   // могу в таком стиле
    echo 'Usage: '.$argv[0].' <string>'.PHP_EOL;
    exit(1);

} else if (strlen($argv[1]) >= STRING_MIN_LEN) {
    $data = &$argv[1];

} else {
    echo 'Incorrect data'.PHP_EOL;
    exit(1);
}

/* Run */
$result = (verify_brackets($data)) ? 'YES' : 'NO';
$result .= PHP_EOL;
echo $result;

/* Logic */
function verify_brackets($string) {
    $string_len = mb_strlen($string);
    $stack = array();

    for ($i = 0; $i < $string_len; $i++) {
        $symbol = mb_substr($string, $i, 1);

        if ($symbol == '(') {
            $stack[] = $symbol;

        } elseif ($symbol === ')') {
            if (!$last = array_pop($stack))
                return false;

            if ($symbol === ')' && $last !== '(') {
                return false;
            }
        }
    }

    return (count($stack) === 0);
}
