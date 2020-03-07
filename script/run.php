#!/usr/bin/env php
<?php
/**
 * @version 1.0
 * @author Pogudin Sergey
 * @license MIT
 */

use Pogudin\Verifier;

$root_path = realpath(__DIR__ . '/../');
require_once "$root_path/vendor/autoload.php";

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
$result = (Verifier\Brackets::verify($data)) ? 'OK' : 'INCORRECT';
$result .= PHP_EOL;
echo $result;
