<?php
//if($_SESSION['level']!="admin" ){ header("location: ../logout.php"); }
if (isset($_POST['submit'])){
if ((!empty($_POST['nama']))) {
$sql = "UPDATE user SET nama= '".$_POST['nama']."', user = '".$_POST['user']."', 
		pass = '".$_POST['pass']."', no_hp= '".$_POST['no_hp']."' WHERE id_user = '".$_SESSION['id']."'";
$simpan = _query($sql);

if ($simpan) {
echo "<script>alert('Data Berhasil di Update');</script>";
} else { 
echo "<script>alert('Gagal Di Update');</script>";
}
}
}


$data=_query("select * from user where id_user='$_GET[id_user]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- EDIT DATA MASTER user ------------------------- ----->
<div class="box-body">
	<div class="box box-solid box-success">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-pencil"></i> Ubah Profil </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
<form class="form-horizontal" role="form" method="post">             
  <div class="form-group">
    <label class="col-sm-4 control-label">ID User </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id_user" value="<?php echo $edit['id_user']; ?>" >
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Lengkap</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nama" value="<?php echo $edit['nama']; ?>">
    </div>
  </div>

    <?php
    include BASE_DIR."/inc/desa_selector.php";
    if ($edit['level'] == 'admin-kelurahan') {
        ?>
        <div class="form-group">
            <label class="col-sm-4 control-label">DESA</label>
            <div class="col-sm-5">
                <select name="desa_id" id="desa_id" class="form-control" readonly="readonly" disabled="disabled">
                    <?php
                    $desas = get_desa(substr($edit['id_kelurahan'], 0, 7));
                    echo optionLoop($desas, $edit['id_kelurahan']);
                    ?>
                </select>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="form-group">
            <label class="col-sm-4 control-label">KECAMATAN</label>
            <div class="col-sm-5">
                <select name="desa_id" id="desa_id" class="form-control" readonly="readonly" disabled="disabled">
                    <?php
                    $desas = get_kecamatan(substr($edit['id_kelurahan'], 0, 4));
                    echo optionLoop($desas, substr($edit['id_kelurahan'], 0, 7));
                    ?>
                </select>
            </div>
        </div>
        <?php
    }
    ?>



  <div class="form-group">
    <label class="col-sm-4 control-label">Nomor HP</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_hp" value="<?php echo $edit['no_hp']; ?>">
    </div>
  </div>
	<div class="form-group">
    <label class="col-sm-4 control-label">Level </label>
    <div class="col-sm-5">
     <input type="text" class="form-control" readonly value="<?php echo $edit['level']; ?>">
    </div>
  </div>
<hr/>
<div class="form-group">
    <label class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="user" value="<?php echo $edit['user']; ?>">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" id="password1"class="form-control" required="required" name="pass" value="<?php echo $edit['pass']; ?>">
	  <a class="text-red">*ubah password secara berkala demi menjaga keamanan</a>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Konfirmasi Password</label>
    <div class="col-sm-5">
      <input type="password" id="password2"class="form-control" required="required">	  
    </div>
  </div>
  
  <script type="text/javascript">
window.onload = function () {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
document.getElementById("password2").setCustomValidity("Passwords Tidak Sama");
else
document.getElementById("password2").setCustomValidity('');}
</script>

	<div class="form-group">
    <label class="col-sm-4 control-label">  </label>
    <div class="col-sm-5">
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Kembali</a>	 
    </div>
  </div>   

</form>
