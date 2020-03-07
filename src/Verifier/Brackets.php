<?php
namespace Pogudin\Verifier;

class Brackets {

    static function verify($string) {
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
}
