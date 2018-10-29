<?php
//include "include/koneksi.php";

if ($_GET['module'] == "home") {
	include "module/home/home.php";
}

else if ($_GET['module'] == "kelurahan") {
	include "module/kelurahan/kelurahan.php";
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
?>