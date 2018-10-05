<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 9/11/18
 * Time: 2:56 PM
 */

if (!function_exists('getSessionProfile')) {
    function getSessionProfile() {
        static $currentUser;
        static $id_user;
        $id_user_session = $_SESSION['id'];
        if ($id_user != $id_user_session || $id_user == null) {
            $user = _fetchOneFromSql("select * from user WHERE id_user='$id_user_session'");
            $currentUser = $user;
            $id_user = $id_user_session;
        }
        return $currentUser;
    }
}

if (!function_exists('isAdminKelurahan')) {
    function isAdminKelurahan() {
        $user = getSessionProfile();
        return $user['level'] == 'admin-kelurahan';
    }
}
if (!function_exists('isAdminKecamatan')) {
    function isAdminKecamatan() {
        $user = getSessionProfile();
        return $user['level'] == 'admin-kecamatan';
    }
}

if (!function_exists('baseUrlByLevel')) {
    function baseUrlByLevel($text='') {
        $adminKelurahan = isAdminKelurahan();
        $adminKecamatan = isAdminKecamatan();
        if ($adminKelurahan) return BASE_URL."admin-kelurahan/$text";
        if ($adminKecamatan) return BASE_URL."admin-kecamatan/$text";
    }
}
if (!function_exists('moduleUrlByLevel')) {
    function moduleUrlByLevel($module_name, $other_data='') {
        return baseUrlByLevel('?module='.$module_name.($other_data?"&$other_data":$other_data));

    }
}


if (!function_exists('getMultipleDesa')) {
    function getMultipleDesa() {
        $user = getSessionProfile();
        if ($user['level'] == "admin-kelurahan") {
            $id = $user['id_kelurahan'];
            $query = "SELECT * FROM view_desa WHERE id='$id'";
            return _fetchMultipleFromSql($query);
        } else {
            $id = substr($user['id_kelurahan'], 0, 7);
            $query = "SELECT * FROM view_desa WHERE kecamatan_id='$id'";
            return _fetchMultipleFromSql($query);
        }
    }
}

if (!function_exists('getMultipleDesaId')) {
    function getMultipleDesaId() {
        $desas = getMultipleDesa();
        return array_map(function ($desa) {
            return $desa['id'];
        }, $desas);
    }
}

if (!function_exists('getProfileDesa')) {
    function getProfileDesa($desa_id) {
        $query = "SELECT * FROM daerah_desa_attribut WHERE desa_id='$desa_id'";
        return _fetchOneFromSql($query);
    }
}
if (!function_exists('getProfileKecamatan')) {
    function getProfileKecamatan($kecamatan_id) {
        $query = "SELECT * FROM daerah_kecamatan_attribut WHERE kecamatan_id='$kecamatan_id'";
        return _fetchOneFromSql($query);
    }
}