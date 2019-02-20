<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/11/18
 * Time: 9:34 PM
 */

if (!function_exists('GetSetVar')) {
    function GetSetVar($varName) {

        if (isset($_POST[$varName])) {
            $data = $_POST[$varName];
            $_SESSION[$varName] = $data;
        }
        if (isset($_GET[$varName]) && !isset($_POST[$varName])) {
            $data = $_GET[$varName];
            $_SESSION[$varName] = $data;
        }
        return @$_SESSION[$varName];
    }
}


if (!function_exists('redirect')) {
    function redirect($url='')
    {
        header("Location:".$url);die();
    }
}

if (!function_exists('redirectJs')) {
    function redirectJs($url='')
    {
        echo sprintf("<script>window.location.href='%s'</script>", $url);die();
    }
}