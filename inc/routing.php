<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 9/22/18
 * Time: 11:33 AM
 */

if (!function_exists('smartRouting')) {
    function smartRouting($mapped_datas=array()) {
        $currentFile = debug_backtrace()[0]['file'];
        $directory = dirname($currentFile)."/";
        $action = getAction();
        $fullFileName = $directory.$action.".php";
        if (file_exists($fullFileName)) {
            include $fullFileName;
            return 1;
        } else {
            return $action;
        }
    }
}


if (!function_exists('getAction')) {
    function getAction() {
        return @$_GET['aksi'] ? antiInjection($_GET['aksi']) : 'index';

    }
}

