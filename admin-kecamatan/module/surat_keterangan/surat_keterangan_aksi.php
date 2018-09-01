<?php
include '../../koneksi.php';

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_surat_keterangan = $_POST['id_surat_keterangan'];
$tanggal = $_POST['tanggal'];
$pernyataan = $_POST['pernyataan'];
$keperluan = $_POST['keperluan'];
$keterangan = $_POST['keterangan'];
$masa_berlaku = $_POST['masa_berlaku'];
$id = $_POST['id'];

// HAPUS
if($module=='surat_keterangan' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM surat_keterangan WHERE id_surat_keterangan='".$_GET['id_surat_keterangan']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='surat_keterangan' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE surat_keterangan SET				  
				  tanggal = '$tanggal',
				  pernyataan = '$pernyataan',
				  keperluan = '$keperluan',
				  keterangan = '$keterangan',
				  masa_berlaku  = '$masa_berlaku'
				  WHERE id_surat_keterangan = '$id_surat_keterangan'");
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='surat_keterangan' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO surat_keterangan (id_surat_keterangan,tanggal, pernyataan, keperluan, keterangan, masa_berlaku, id) VALUES ('$id_surat_keterangan', '$tanggal', '$pernyataan', '$keperluan', '$keterangan', '$masa_berlaku', '$id')";

$simpan = mysql_query($sql);
}
?>