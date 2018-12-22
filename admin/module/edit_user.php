<?php
if (!defined('BASE_DIR')) include_once '../../bootstrap.php';

$data=_query("select * from user where id_user='$_GET[id_user]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- EDIT DATA MASTER user ------------------------- ----->
<div class="box-body">
    <?php

    if (isset($_POST['submit'])) {
        $id_user = $_GET['id_user'];
        $nama = $_POST['nama'];
        $username = @$_POST['username'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];
        $password_c = $_POST['password-confirmation'];
        $change_password = $password && $password==$password_c;

        $sql = "UPDATE `user` set nama='$nama', user='$username', no_hp='$no_hp' "
            .($change_password?", pass='$password' ":"")
            ." WHERE id_user='$id_user'";
        _query($sql);
        $data=_query("select * from user where id_user='$_GET[id_user]'");
        $edit=_fetch_array($data);
    }
    ?>
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
      <input type="text" class="form-control" required="required" name="username" value="<?php echo $edit['user']; ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" id="password1" class="form-control" name="password" value="">
	  <a class="text-red">*ubah password secara berkala demi menjaga keamanan</a>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Konfirmasi Password</label>
    <div class="col-sm-5">
      <input type="password" id="password2"class="form-control" name="password-confirmation">
        <span class="text-danger password-not-same" style="display: none;">
            Password Tidak sama.
        </span>
    </div>
  </div>
  
  <script type="text/javascript">
      function comparePassword() {
          var p1 = $("#password1").val();
          var p2 = $("#password2").val();
          if ((p1.length > 0 || p2.length > 0) && p1 != p2) {
              $(".password-not-same").show();
          } else {
              $(".password-not-same").hide();
          }
      }
      $(function () {
          $("#password1").keyup(function (evt) {
              comparePassword();
          })
          $("#password2").keyup(function (evt) {
              comparePassword();
          })
      })
  </script>

	<div class="form-group">
    <label class="col-sm-4 control-label">  </label>
    <div class="col-sm-5">
<button type="submit"name="submit" value="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Kembali</a>	 
    </div>
  </div>   

</form>
