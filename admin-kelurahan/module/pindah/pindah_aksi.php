<?php
include '../../../bootstrap.php';

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id_pindah = $_POST['id_pindah'];
$status_pindah = $_POST['status_pindah'];
$tanggal_pindah = $_POST['tanggal_pindah'];
$alamat_pindah = $_POST['alamat_pindah'];
$id = $_POST['id'];

// HAPUS
if($module=='pindah' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM pindah WHERE id_pindah='".$_GET['id_pindah']."'";
$myQry = _query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='pindah' AND $aksi=='edit' ){ 
$query = _query("UPDATE pindah SET	
                  status_pindah	= '$status_pindah',		  
				  tanggal_pindah = '$tanggal_pindah',
				  alamat_pindah  = '$alamat_pindah'
				  WHERE id_pindah = '$id_pindah'");
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='pindah' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO pindah (id_pindah, status_pindah, tanggal_pindah, alamat_pindah, id) VALUES ('$id_pindah', '$status_pindah', '$tanggal_pindah', '$alamat_pindah', '$id')";
$simpan = _query($sql);
}
?>
