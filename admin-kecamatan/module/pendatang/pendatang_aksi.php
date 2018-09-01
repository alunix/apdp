<?php
include '../../koneksi.php';

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_pendatang = $_POST['id_pendatang'];
$nik = $_POST['nik'];
$no_kk = $_POST['no_kk'];
$nama = $_POST['nama'];
$tanggal_datang = $_POST['tanggal_datang'];
$alamat_datang = $_POST['alamat_datang'];
// HAPUS
if($module=='pendatang' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM pendatang WHERE id_pendatang='".$_GET['id_pendatang']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='pendatang' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE pendatang SET				  
				  nik = '$nik',
				  no_kk = '$no_kk',
				  nama = '$nama',
				  tanggal_datang = '$tanggal_datang',
				  alamat_datang  = '$alamat_datang'
				  WHERE id_pendatang = '$id_pendatang'");
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='pendatang' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO pendatang (id_pendatang, nik, no_kk, nama, tanggal_datang, alamat_datang ) VALUES ('$id_pendatang', '$nik', '$no_kk', '$nama', '$tanggal_datang', '$alamat_datang')";
$simpan = mysql_query($sql);
}
?>