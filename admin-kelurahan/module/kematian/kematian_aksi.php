<?php
include '../../koneksi.php';

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_kematian = $_POST['id_kematian'];
$status_hidup = $_POST['status_hidup'];
$tanggal_wafat = $_POST['tanggal_wafat'];
$pukul_wafat = $_POST['pukul_wafat'];
$sebab_kematian = $_POST['sebab_kematian'];
$id = $_POST['id'];

// HAPUS
if($module=='kematian' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM kematian WHERE id_kematian='".$_GET['id_kematian']."'";
$myQry = _query($mySql);
header('location:../../index.php?module='.$module);
}

// EDIT
else if($module=='kematian' AND $aksi=='edit' ){ 
$query = _query("UPDATE kematian SET				  
				  tanggal_wafat = '$tanggal_wafat',
				  pukul_wafat  = '$pukul_wafat',
				  sebab_kematian = '$sebab_kematian'
				  WHERE id_kematian = '$id_kematian'");
header('location:../../index.php?module='.$module);
}

//Tambah
else if($module=='kematian' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO kematian  (id_kematian, status_hidup, tanggal_wafat, pukul_wafat, sebab_kematian, id) VALUES ('$id_kematian', '$status_hidup', '$tanggal_wafat', '$pukul_wafat', '$sebab_kematian', '$id')";
$simpan = _query($sql);
}
?>
