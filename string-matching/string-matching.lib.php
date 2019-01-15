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

if (!function_exists('process_kmp')) {
    function process_kmp($pattern, $text){
        $haystack = $text;
        $needle = $pattern;
        $n = strlen($haystack);
        $m = strlen($needle);

        $p = preprocess_kmp($needle, $m);

        $j = 0;
        for($i=0;$i<$n;$i++){
            while($j > 0 && $needle[$j] <> $haystack[$i]){
                $j = $p[$j];
            }
            if($needle[$j] == $haystack[$i]){
                $j++;
            }
            if($j == $m){
                return ($i - $m + 1);
            }
        }
        return false;
    }
}

if (!function_exists('preprocess_kmp')) {
    function preprocess_kmp($needle, $m){
        $p = array(0);
        $j = 0;
        for($i=1;$i<$m;$i++){
            while($j > 0 && $needle[$j] <> $needle[$i]){
                $j = $p[$j];
            }
            if($needle[$j] == $needle[$i]){
                $j++;
            }
            $p[$i] = $j;
        }
        return $p;
    }
}