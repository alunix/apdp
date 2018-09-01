<?php
include '../../koneksi.php';

$module=$_GET['module'];
$aksi=$_GET['aksi'];


$tempat_dilahirkan = $_POST['tempat_dilahirkan'];
$pukul_lahir = $_POST['pukul_lahir'];
$jenis_kelahiran = $_POST['jenis_kelahiran'];
$kelahiran_ke = $_POST['kelahiran_ke'];
$penolong = $_POST['penolong'];
$nama_penolong = $_POST['nama_penolong'];
$berat_bayi = $_POST['berat_bayi'];
$panjang_bayi = $_POST['panjang_bayi'];
$id = $_POST['id'];

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$tempat_lhr = $_POST['tempat_lhr'];
$tanggal_lhr = $_POST['tanggal_lhr'];
$gol_dar = $_POST['gol_dar'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$agama = $_POST['agama'];
$status_keluarga = $_POST['status_keluarga'];
$ayah = $_POST['ayah'];
$ibu = $_POST['ibu'];
$alamat = $_POST['alamat'];
$desa = $_POST['desa'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];

// HAPUS
if($module=='kelahiran' AND $aksi=='hapus' ){ 
$mySql = mysql_query("DELETE FROM data_warga WHERE id='".$_GET['id']."'");
$mySql1 = "DELETE FROM kelahiran WHERE id='".$_GET['id']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}

// EDIT
else if($module=='kelahiran' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE kelahiran SET				  
				  id_kelahiran = '$id_kelahiran',
				  
				  tempat_dilahirkan = '$tempat_dilahirkan',
				  
				  tempat_lahir = '$tempat_lahir',
				  tanggal_lahir = '$tanggal_lahir',
				  pukul_lahir = '$pukul_lahir',
				  jenis_kelahiran = '$jenis_kelahiran',
				  kelahiran_ke = '$kelahiran_ke',
				  penolong = '$penolong',
				  nama_penolong = '$nama_penolong',
				  berat_bayi = '$berat_bayi',
				  panjang_bayi  = '$panjang_bayi',
				  ayah = '$ayah',
				  ibu = '$ibu',
				  alamat = '$alamat'
				  WHERE id_kelahiran = '$id_kelahiran'");
				  
				  //agama = '$agama',
				  //no_kk = '$no_kk',
				  //nik = '$nik',
				  //nama = '$nama',
				  //jk = '$jk',
header('location:../../index.php?module='.$module);
}

//Tambah
else if($module=='kelahiran' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);

$sql = "INSERT INTO kelahiran (id_kelahiran, tempat_dilahirkan, pukul_lahir, jenis_kelahiran, kelahiran_ke, penolong, nama_penolong, berat_bayi, panjang_bayi ) VALUES ('$id_kelahiran', '$tempat_dilahirkan', '$pukul_lahir', '$jenis_kelahiran', '$kelahiran_ke', '$penolong', '$nama_penolong', '$berat_bayi', '$panjang_bayi')";
$sql1= "INSERT INTO data_warga (id, nik, no_kk, nama, jk, tempat_lhr, tanggal_lhr, gol_dar, kewarganegaraan, agama, status_keluarga, nama_ayah, nama_ibu, alamat, rt, rw) VALUES ('$id_kelahiran', '$nik', '$no_kk', '$nama', '$jk', '$tempat_lhr', '$tanggal_lhr', '$gol_dar', '$kewarganegaraan', '$agama', '$status_keluarga', '$nama_ayah', '$nama_ibu', '$alamat', '$desa', '$rt', '$rw')";
$simpan = mysql_query($sql);
}
?>