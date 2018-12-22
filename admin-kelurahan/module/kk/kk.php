<?php
$aksi="module/kk/kk_aksi.php";


switch(@$_GET['aksi']){
    default:
        include 'detail.php';
        break;
    case "detail_warga2" :
        include 'detail_warga2.php';
        break;
}
