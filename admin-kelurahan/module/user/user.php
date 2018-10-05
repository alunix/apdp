<?php
$aksi="module/user/user_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA ADMIN ------------------------- ----->	
<div style="margin-right:10%;margin-left:15%" class="alert alert-danger alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman ADMIN "!!!
</p>
</div> 				
<div class="text-center">
<h3>Data User Login</h3><hr/></div>
<form class="form-horizontal" action="module/laporan/cetak_user.php" method="post">             
  <div class="form-group">
    <label class="col-sm-4 control-label">Tanggal</label>
    <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
	<i class="fa fa-calendar"></i>
  </div>
  <input type="text" name="tanggal" required="required" class="form-control pull-right" id="reservation"/>
</div><!-- /.input group -->
</div>
<div class="col-sm-1">
<button type="submit"name="submit" onclick="this.form.target='_blank';return true;" class="btn btn-danger"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-user-secret"></i>Data Admin </h3>	
		<a class="btn btn-default pull-right"href="?module=user&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah data</a>		
		</div>		
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">ID user</th>
		<th class="col-sm-2">Nama</th>
		<th class="col-sm-2">Username</th>
		<th class="col-sm-2">No. HP</th>
		<th class="col-sm-2">Level</th> 
		<th class="col-sm-1">Status</th> 
		<th class="col-sm-1">AKSI</th> 
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM user";
$tampil = _query($sql);
while ($tampilkan = _fetch_array($tampil)) { 
$Kode = $tampilkan['id_user'];
$blokir = $tampilkan['blokir'];?>

	<tr>
	<td><?php echo $tampilkan['id_user']; ?></td>
	<td><?php echo $tampilkan['nama']; ?></td>
	<td><?php echo $tampilkan['user']; ?></td>
	<td><?php echo $tampilkan['no_hp']; ?></td>
	<td><?php echo $tampilkan['level']; ?></td>
	<td><?php if  ( $blokir== 'Y' ) {
				echo "<a class='btn btn-xs btn-warning' disabled >NonAktif</a>";}
				else {echo "<a class='btn btn-xs btn-success' disabled>Aktif</a>"; }   ?></td>
	<td align="center">
	<?php if ( $blokir== 'N' ) { ?>
	<a class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Blokir User??" href="<?php echo $aksi ?>?module=user&aksi=yes&id_user=<?php echo $tampilkan['id_user']; ?>" onclick="return confirm('Apakah anda yakin ingin blokir <?php echo $tampilkan['user']; ?> ?')"><i class="glyphicon glyphicon-ok"></i></a>
	<?php }
	else { ?>
	<a class="btn btn-xs btn-success" data-toggle="tooltip" title="UnBlokir User??" href="<?php echo $aksi ?>?module=user&aksi=no&id_user=<?php echo $tampilkan['id_user']; ?>" onclick="return confirm('Apakah anda yakin UnBlokir <?php echo $tampilkan['user']; ?>?')"><i class="glyphicon glyphicon-remove"></i></a>
	<?php } ?>
	<a class="btn btn-xs btn-danger"data-toggle="tooltip" title="Hapus User??"href="<?php echo $aksi ?>?module=user&aksi=hapus&id_user=<?php echo $tampilkan['id_user'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	<a class="btn btn-xs btn-info" data-toggle="tooltip" title="Edit User??"href="?module=user&aksi=edit&id_user=<?php echo $tampilkan['id_user'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
		</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA User ------------------------- ----->
<?php 
break;
 case "tambah": 
//ID
$sql ="SELECT max(id_user) as terakhir from user";
  $hasil = _query($sql);
  $data = _fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "USR".sprintf("%03s",$nextNoUrut);
?>
<!----- ------------------------- TAMBAH DATA User ------------------------- ----->
<h3 class="box-title margin text-center">Tambah Data User</h3>
<center> <div class="batas"> </div></center>
<hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=user&aksi=tambah" role="form" method="post">   
  
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Data User </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">        
  <div class="form-group">
    <label class="col-sm-4 control-label">ID user </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="id_user" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nama" placeholder="Nama user">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nomor HP</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_hp" value="+62">
    </div>
  </div>
	<div class="form-group">
    <label class="col-sm-4 control-label">Level </label>
    <div class="col-sm-5">
      <select name="level" class="form-control">
<option value=" "> -- Pilih Level -- </option>
<option value="admin-kelurahan">Admin Kelurahan</option>
<option value="admin-kecamatan">Admin Kecamatan</option>
</select>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="user" placeholder="username">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" required="required" name="pass" minlength="5"value="12345">
    </div>
  </div>  

  <div class="form-group">
    <label class="col-sm-4 control-label">  </label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i><i>Reset</i></button>
    </div>
  </div> 
</form> 
<!----- ------------------------- END TAMBAH DATA User ------------------------- ----->
<?php	
break;
case "edit" :
$data=_query("select * from user where id_user='$_GET[id_user]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- EDIT DATA USER ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data User "<?php echo $_GET['id_user']; ?>"</h3>
<br/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=user&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Edit Informasi Data User </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
  <div class="form-group">
    <label class="col-sm-4 control-label">ID User</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id_user" value="<?php echo $edit['id_user']; ?>" >
    </div>
  </div> 
    <div class="form-group">
    <label class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama']; ?>" name="nama" placeholder="Nama">
    </div>
  </div>
	<div class="form-group">
    <label class="col-sm-4 control-label">Nomor HP</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_hp" value="<?php echo $edit['no_hp']; ?>">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">Level</label>
    <div class="col-sm-3">	
    <select name="level" class="form-control"><option>-- Pilih Level --</option>
	<option name="level" value="admin-kecamatan" <?php if(($edit['level'])== "admin-kecamatan")
				{echo "selected=\"selected\"";};?>> Admin Kecamatan </option>
	<option name="level" value="admin-kelurahan" <?php if(($edit['level'])== "admin-kelurahan")
				{echo "selected=\"selected\"";};?>>Admin Kelurahan </option>
	</select>
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  value="<?php echo $edit['user']; ?>" name="user" placeholder="Username">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" value="<?php echo $edit['pass']; ?>" name="pass" placeholder="Password">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=user">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>
</form>
<?php	
break;
}
?>
