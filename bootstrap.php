<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 9/22/18
 * Time: 10:39 AM
 */
session_start();
include __DIR__.'/define.php';
require_once __DIR__.'/vendor/autoload.php';
include BASE_DIR."/inc/inc.commons.php";
include BASE_DIR.'/inc/fungsi_hdt.php';
include BASE_DIR.'/inc/routing.php';
include BASE_DIR.'/inc/inc.library.php';
include BASE_DIR."/inc/database.php";
include BASE_DIR."/inc/profile.php";
include BASE_DIR.'/koneksi.php';


if ($_SESSION['level'] == 'admin-kelurahan') {
    $_SESSION['selected_desa'] = getSessionProfile()['id_kelurahan'];
}
