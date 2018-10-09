<?php
include "../../koneksi.php";

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = $_POST['id_user'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$level = $_POST['level'];

// BLOKIR
if($module=='user' AND $aksi=='no' ){ 
$sql = "UPDATE user SET blokir='N' WHERE id_user = '".$_GET['id_user']."'";
$hapus = _query($sql);
header('location:../../index.php?module='.$module);
}
// HAPUS
if($module=='user' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM user WHERE id_user='".$_GET['id_user']."'";
$myQry = _query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='user' AND $aksi=='yes' ){ 
$sql = "UPDATE user SET blokir='Y' WHERE id_user = '".$_GET['id_user']."'";
$hapus = _query($sql);
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='user' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO user  (id_user, user, pass, nama, no_hp, level ) VALUES ('$id', '$user', '$pass', '$nama', '$no_hp', '$level')";
$simpan = _query($sql);
}
else if($module=='user' AND $aksi=='edit' ){ 
_query("UPDATE user SET 
nama='$nama',
no_hp='$no_hp',
level='$level',
user='$user',
pass='$pass'
WHERE id_user = '$id'");
header('location:../../index.php?module='.$module);
}
?>
