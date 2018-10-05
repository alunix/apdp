<?php

if ($_GET['module'] == "home") {
	include "module/home.php";
}
else if ($_GET['module'] == "warga") {
	include "module/warga/warga.php";	
}
else if ($_GET['module'] == "kk") {
	include "module/kk/kk.php";	
}
else if ($_GET['module'] == "kematian") {
	include "module/kematian/kematian.php";	
}
else if ($_GET['module'] == "pindah") {
	include "module/pindah/pindah.php";
}
else if ($_GET['module'] == "pendatang") {
	include "module/pendatang/pendatang.php";
}
else if ($_GET['module'] == "kelahiran") {
	include "module/kelahiran/kelahiran.php";
}
else if ($_GET['module'] == "surat_keterangan") {
	include "module/surat_keterangan/surat_keterangan.php";
}
else if ($_GET['module'] == "user") {
	include "module/user/user.php";	
}
else if ($_GET['module'] == "edit_user") {
	include "module/edit_user.php";	
}
else if ($_GET['module'] == "search") {
	include STRING_MATCHING_DIR."search.php";
}
else if ($_GET['module'] == "cetak/lkbpj") {
    include GENERAL_MODULE_DIR."cetak_lkbpj/cetak_lkbpj.php";
}
else if ($_GET['module'] == "cetak/lpba") {
    include GENERAL_MODULE_DIR."cetak_lpba/cetak_lpba.php";
}
else if ($_GET['module'] == "cetak/lkbpd") {
    include GENERAL_MODULE_DIR."cetak_lkbpd/cetak_lkbpd.php";
}
else if ($_GET['module'] == "cetak/lpbku") {
    include GENERAL_MODULE_DIR."cetak_lpbku/cetak_lpbku.php";
}
else if ($_GET['module'] == "cetak/lampid") {
    include GENERAL_MODULE_DIR."cetak_lampid/cetak_lampid.php";
}
?>