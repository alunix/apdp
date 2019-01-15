<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/15/19
 * Time: 9:21 PM
 */


if (!function_exists('columnLetter')) {

    function columnLetter($c){
        $c = intval($c);
        if ($c <= 0) return '';
        $letter = '';
        while($c != 0){
            $p = ($c - 1) % 26;
            $c = intval(($c - $p) / 26);
            $letter = chr(65 + $p) . $letter;
        }
        return $letter;
    }
}