<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 12/22/18
 * Time: 9:55 AM
 */

if (!function_exists('buildQueryDesaId')) {
    function buildQueryDesaId($tanda_petik="'", $alias='') {
        if (!$tanda_petik) $tanda_petik ="'";
        if ($alias && substr($alias, -1)!='.') $alias .= '.';
        $desaIds = getMultipleDesaId();
        $selected_desa = @$_SESSION['selected_desa'];
        if ($selected_desa) $desaIds = array($selected_desa);
        if (empty($desaIds)) $desaIds = array("false");
        $tanda_petik_imploder = sprintf("%s,%s", $tanda_petik, $tanda_petik);
        return " ".$alias.sprintf("desa_id IN (%s%s%s)", $tanda_petik, implode($tanda_petik_imploder, $desaIds), $tanda_petik);
    }
}