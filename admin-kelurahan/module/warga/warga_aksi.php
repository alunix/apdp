<?php

include '../../../bootstrap.php';
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
$desa_id = $_POST['desa_id'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];

$tempat_dilahirkan = $_POST['tempat_dilahirkan'];
$id_kelahiran= $_POST['id'];
$pukul_lahir = $_POST['pukul_lahir'];
$jenis_kelahiran = $_POST['jenis_kelahiran'];
$kelahiran_ke = $_POST['kelahiran_ke'];
$penolong = $_POST['penolong'];




// HAPUS
if($module=='warga' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM data_warga WHERE id='".$_GET['id']."'";
$mySql1 = _query("DELETE FROM kematian WHERE id='".$_GET['id']."'");
$mySql2 = _query("DELETE FROM pindah WHERE id='".$_GET['id']."'");
$mySql3 = _query("DELETE FROM kelahiran WHERE id='".$_GET['id']."'");
$mySql4 = _query("DELETE FROM pendatang WHERE id='".$_GET['id']."'");

$myQry = _query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='warga' AND $aksi=='edit' ){ 
//var_dump($_POST);die();
$penolong = $_POST['penolong'];
$nama_penolong = $_POST['nama_penolong'];
$berat_bayi = $_POST['berat_bayi'];
$panjang_bayi = $_POST['panjang_bayi'];
$query = _query("UPDATE data_warga SET
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
				  desa_id = '$desa_id',
				  rt = '$rt',
				  rw = '$rw'
				  WHERE id = '$id'");
				  
		  
				  $query2 = _query("UPDATE kelahiran SET				  
				  id_kelahiran = '$id_kelahiran',
				  tempat_dilahirkan = '$tempat_dilahirkan',
				  pukul_lahir = '$pukul_lahir',
				  jenis_kelahiran = '$jenis_kelahiran',
				  penolong = '$penolong',
				  nama_penolong = '$nama_penolong',
				  berat_bayi = '$berat_bayi',
				  panjang_bayi  = '$panjang_bayi',
				  kelahiran_ke = '$kelahiran_ke'
				  WHERE id = '$id'");		  
				  
				  
$id_pendatang = $_POST['id_pendatang'];
$tanggal_datang = $_POST['tanggal_datang'];
$alamat_datang = $_POST['alamat_datang'];
				 $query3 = _query("UPDATE pendatang SET				  
				  id_pendatang = '$id_pendatang',
				  tanggal_datang  = '$tanggal_datang',
				  alamat_datang = '$alamat_datang'
				  WHERE id = '$id'");
				  
header('location:../../index.php?module='.$module);

}

//Tambah
else if($module=='warga' AND $aksi=='tambah' ){ 
$sql = "INSERT INTO data_warga  (id, no_kk, nik, nama, jk, tempat_lhr, tanggal_lhr, kewarganegaraan, agama, pendidikan, pekerjaan, status_nikah, status_keluarga, gol_dar, nama_ayah, nama_ibu, alamat, desa_id, rt, rw ) VALUES ('$id', '$no_kk', '$nik', '$nama', '$jk', '$tempat_lhr', '$tanggal_lhr', '$kewarganegaraan', '$agama', '$pendidikan', '$pekerjaan', '$status_nikah', '$status_keluarga', '$gol_dar', '$nama_ayah', '$nama_ibu', '$alamat', '$desa_id', '$rt', '$rw')";
$simpan = _query($sql);


$id_kelahiran = $_POST['id_kelahiran'];
$penolong = $_POST['penolong'];
$nama_penolong = $_POST['nama_penolong'];
$berat_bayi = $_POST['berat_bayi'];
$panjang_bayi = $_POST['panjang_bayi'];
$sql1 = "INSERT INTO kelahiran (id_kelahiran, tempat_dilahirkan, pukul_lahir, jenis_kelahiran, kelahiran_ke, penolong, nama_penolong, berat_bayi, panjang_bayi, id) VALUES ('$id_kelahiran', '$tempat_dilahirkan','$pukul_lahir', '$jenis_kelahiran', '$kelahiran_ke', '$penolong', '$nama_penolong', '$berat_bayi', '$panjang_bayi', '$id')";
$simpa = _query($sql1);

$id_pendatang = $_POST['id_pendatang'];
$tanggal_datang = $_POST['tanggal_datang'];
$alamat_datang = $_POST['alamat_datang'];
$sql2 = "INSERT INTO pendatang (id_pendatang, tanggal_datang, alamat_datang, id) VALUES ('$id_pendatang', '$tanggal_datang', '$alamat_datang', '$id')";
$simpan2 = _query($sql2);
header('location:../../index.php?module='.$module);

}


?>
