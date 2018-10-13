<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/11/18
 * Time: 9:00 PM
 */

if (!function_exists('getLowestYearOfDesa')) {
    function getLowestYearOfDesa() {
        $desaIds = getMultipleDesaId();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT MIN(tahun) as tahun from statistik_lampid_tahunan slt where slt.id IN ('$imploded') and tahun is not null";
        $tahun = _fetchOneFromSql($sql);
        return @$tahun['tahun'];
    }
}

if (!function_exists('getHighestYearOfDesa')) {
    function getHighestYearOfDesa() {
        $desaIds = getMultipleDesaId();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT MAX(tahun) as tahun from statistik_lampid_tahunan slt where slt.id IN ('$imploded') and tahun is not null";
        $tahun = _fetchOneFromSql($sql);
        return @$tahun['tahun'];
    }
}

if (!function_exists('getRangeYearOfDesa')) {
    function getRangeYearOfDesa($step=10) {
        $highest = getHighestYearOfDesa();
        $lowest = getLowestYearOfDesa();
        $rangeYear = array();
        for ($i = $highest; $i >= $lowest ;) {
            $rangeYear[] = $i;
            $i -= $step;
        }
        $rangeYear[count($rangeYear)-1] = $lowest;
        return $rangeYear;
    }
}

if (!function_exists('getDataLampid')) {
    function getDataLampid($yearBottom, $yearTop) {
        $desaIds = getMultipleDesaId();
        if (empty($desaIds)) $desaIds = array("false");
        $imploded = implode("', '", $desaIds);
        $sql = "SELECT tahun, sum(jumlah_lahir) as jumlah_lahir, sum(jumlah_wafat) as jumlah_wafat, sum(jumlah_datang) as jumlah_datang, sum(jumlah_pindah) as jumlah_pindah from statistik_lampid_tahunan slt where slt.id IN ('$imploded') and tahun is not null and tahun between $yearBottom and $yearTop group by tahun";
        return _fetchMultipleFromSql($sql);
    }
}
