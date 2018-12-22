<?php
if (!defined('BASE_DIR')) include_once '../../../bootstrap.php';
$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = @$_POST['id_user'];
$user = @$_POST['user'];
$pass = @$_POST['pass'];
$nama = @$_POST['nama'];
$no_hp = @$_POST['no_hp'];
$level = @$_POST['level'];
$id_kelurahan = @$_POST['id_kelurahan'];
if (!$id_kelurahan) $id_kelurahan = @$_POST['kecamatan_id'];
$nip = @$_POST['nip'];
$nama_camat = _escape_string(@$_POST['nama_camat']);
$nip_camat = @$_POST['nip_camat'];
$nama_lurah = _escape_string(@$_POST['nama_lurah']);
$nip_lurah = @$_POST['nip_lurah'];
$nama_lurah_before = @$_POST['nama_lurah_before'];
if ($nama_lurah_before) {
    $isNamaCamat = $nama_lurah_before == $nama_camat;
    $nama_lurah = !$isNamaCamat ? $nama_camat : $nama_lurah;
}
$nip = $nip_camat != '' ? $nip_camat : $nip_lurah;
$nip_lurah_before = @$_POST['nip_lurah_before'];
if ($nip_lurah_before) {
    $isNipCamat = $nip_lurah_before == $nip_camat;
    $nip_lurah = !$isNipCamat ? $nip_camat : $nip_lurah;
    $nip = $nip_lurah;
}

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

    $id_kelurahan = isset($_POST['id_kecamatan']) && $_POST['id_kecamatan'] != '' ? $_POST['id_kecamatan'] : $_POST['id_kelurahan'];
    if (_fetchOneFromSql("SELECT * from `user` where id_kelurahan='$id_kelurahan'")) {
        echo "<script>alert('Admin untuk Kelurahan / Kecamatan sudah ada');window.location.href='?module={$module}'</script>";exit();
    }
	$sql = "INSERT INTO user  (id_user, user, pass, nama, no_hp, level, id_kelurahan) VALUES ('$id', '$user', '$pass', '$nama', '$no_hp', '$level', '$id_kelurahan')";
	$simpan = _query($sql);

    if (!_fetchOneFromSql("SELECT * from daerah_desa_attribut where desa_id='$id_kelurahan'")) {
        $sql = "INSERT INTO daerah_desa_attribut (desa_id, nama_lurah, nip ) VALUES ('$id_kelurahan', '$nama_lurah', '$nip')";
        $simpan = _query($sql);
    } else {

        $sql = "UPDATE daerah_desa_attribut set nama_lurah='$nama_lurah', nip='$nip' WHERE desa_id='$id_kelurahan' ";
        $simpan = _query($sql);
    }

    header('location:../../index.php?module='.$module);
}
else if($module=='user' AND $aksi=='edit' ){
    _query("UPDATE user SET 
        nama='$nama',
        no_hp='$no_hp',
        level='$level',
        user='$user',
        id_kelurahan='$id_kelurahan',
        pass='$pass'
        WHERE id_user = '$id'");
    if (!_fetchOneFromSql("SELECT * from daerah_desa_attribut where desa_id='$id_kelurahan'")) {
        $sql = "INSERT INTO daerah_desa_attribut (desa_id, nama_lurah, nip ) VALUES ('$id_kelurahan', '$nama_lurah', '$nip')";
        $simpan = _query($sql);
    } else {
        $sql = "UPDATE daerah_desa_attribut set nama_lurah='$nama_lurah', nip='$nip' WHERE desa_id='$id_kelurahan' ";
        $simpan = _query($sql);
    }
    header('location:../../index.php?module='.$module);
}
?>