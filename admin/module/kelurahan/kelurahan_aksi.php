<?php
include "../../koneksi.php";

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = $_POST['id_kelurahan'];
$nm_kelurahan = $_POST['nm_kelurahan'];
$nm_lurah = $_POST['nm_lurah'];
$alamat= $_POST['alamat'];

// HAPUS
if($module=='kelurahan' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM kelurahan WHERE id_kelurahan='".$_GET['id_kelurahan']."'";

$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='kelurahan' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE kelurahan SET
				  nm_kelurahan = '$nm_kelurahan',
				  nm_lurah = '$nm_lurah',
				  alamat = '$alamat'
				  WHERE id_kelurahan = '$id'");
				  
				  
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='kelurahan' AND $aksi=='tambah' ){ 

$sql = "INSERT INTO kelurahan  (id_kelurahan, nm_kelurahan, nm_lurah, alamat) VALUES ('$id', '$nm_kelurahan', '$nm_lurah', '$alamat')";
$simpan = mysql_query($sql);
header('location:../../index.php?module='.$module);
}
?>