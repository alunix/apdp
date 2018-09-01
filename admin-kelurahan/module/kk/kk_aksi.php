<?php
include "../../koneksi.php";

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = $_POST['id'];
$no_kk = $_POST['no_kk'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$tempat_lhr = $_POST['tempat_lhr'];
$tanggal_lhr = $_POST['tanggal_lhr'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$agama = $_POST['agama'];
$pendidikan = $_POST['pendidikan'];
$pekerjaan = $_POST['pekerjaan'];
$status_nikah = $_POST['status_nikah'];
$status_keluarga = $_POST['status_keluarga'];
$gol_dar = $_POST['gol_dar'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$alamat = $_POST['alamat'];
$desa = $_POST['desa'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];

// HAPUS
if($module=='kk' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM data_warga WHERE id='".$_GET['id']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='kk' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE data_warga SET
				  no_kk = '$no_kk',
				  nik = '$nik',
				  nama = '$nama',
				  jk = '$jk',
				  tempat_lhr = '$tempat_lhr',
				  tanggal_lhr = '$tanggal_lhr',
				  kewarganegaraan = '$kewarganegaraan',
				  agama = '$agama',
				  pendidikan = '$pendidikan',
				  pekerjaan = '$pekerjaan',
				  status_nikah = '$status_nikah',
				  status_keluarga = '$status_keluarga',
				  gol_dar = '$gol_dar',
				  nama_ayah = '$nama_ayah',
				  nama_ibu = '$nama_ibu',
				  alamat = '$alamat',
				  desa = '$desa',
				  rt = '$rt',
				  rw = '$rw'
				  WHERE id = '$id'");
header('location:../../index.php?module='.$module);

}
//Tambah
else if($module=='kk' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO data_warga  (id, no_kk, nik, nama, jk, tempat_lhr, tanggal_lhr, kewarganegaraan, agama, pendidikan, pekerjaan, status_nikah, status_keluarga, gol_dar, nama_ayah, nama_ibu, alamat, desa, rt, rw ) VALUES ('$id', '$no_kk', '$nik', '$nama', '$jk', '$tempat_lhr', '$tanggal_lhr', '$kewarganegaraan', '$agama', '$pendidikan', '$pekerjaan', '$status_nikah', '$status_keluarga', '$gol_dar', '$nama_ayah', '$nama_ibu', '$alamat', '$desa', '$rt', '$rw')";
$simpan = mysql_query($sql);
}
else if($module=='user' AND $aksi=='edit' ){ 
mysql_query("UPDATE user SET 
nama='$nama',
no_hp='$no_hp',
level='$level',
user='$user',
pass='$pass'
WHERE id_user = '$id'");
header('location:../../index.php?module='.$module);
}
?>