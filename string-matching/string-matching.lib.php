<?php


if (!function_exists('preprocess_bmh')) {
    function preprocess_bmh($pattern){
        $table_bad_match = [];
        $splitted = str_split($pattern);
        $len = count($splitted);
        for ($i = 0; $i<$len; $i++) {
            if ($i < $len-1) {
                $table_bad_match[$splitted[$i]] = $len-$i-1;
            }
        }
        return $table_bad_match;
    }
}

if (!function_exists('process_bmh')) {
    function process_bmh($pattern, $text){
        $find = false;
        $pattern = strtolower($pattern);
        $patternArray = str_split($pattern);
        $lenPattern = strlen($pattern);
        $table_bad_match = preprocess_bmh($pattern);

        $text = strtolower($text);
        $textArray = str_split($text);
        $lenText = strlen($text);

        $currentShift = $lenPattern-1;
        $looping = 0;
        while (true) {
            if ($currentShift > $lenText) break;
            ++$looping;
            $loopingCheck = 0;
            for ($i = $lenPattern-1; $i>=0; $i--) {
                if (@$textArray[$currentShift-$loopingCheck] == @$patternArray[$i]) {
                    ++$loopingCheck;
                } else if (array_key_exists(@$textArray[$currentShift], $table_bad_match)) {
                    $shift = $table_bad_match[$textArray[$currentShift]];
                    $currentShift += $shift;
                    break;
                } else {
                    $currentShift += $lenPattern-1;
                    break;
                }
            }
            if ($loopingCheck == $lenPattern) {
                $find = true;
                break;
            }
            if($looping > 100) {
                break;
            }

        }
        return $find ? $currentShift : false;
    }
}
