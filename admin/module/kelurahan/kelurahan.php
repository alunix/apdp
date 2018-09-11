<?php
$aksi="module/kelurahan/kelurahan_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER kelurahan ------------------------- ----->	
<div style="margin-right:10%;margin-left:15%" class="alert alert-danger alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman Kelas"!!!
</p>
</div> 		

		
<h3 class="box-title margin text-center">Data kelurahan</h3>
<center> <div class="batas"> </div></center>
<br/>
<div class="row">
<div class="col-md-6">
	<div class="box box-solid box-primary">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-plus"></i>
		Tambah Data kelurahan</h3>		 	
		<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	
	<div class="box-body">
	<?php
$sql ="SELECT max(id_kelurahan) as terakhir from kelurahan";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "KLH".sprintf("%03s",$nextNoUrut);
?> 
	 <form class="form-horizontal" action="<?php echo $aksi?>?module=kelurahan&aksi=tambah" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-4 control-label">ID Kelurahan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control"  required="required"  readonly name="id_kelurahan" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Kelurahan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="nm_kelurahan" placeholder="Nama Kelurahan">
    </div>
	</div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Lurah</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="nm_lurah" placeholder="Nama Lurah">
    </div>
	</div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Alamat Kelurahan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="alamat" placeholder="Alamat">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-7">
	<hr/>
      <button type="submit"name="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i><i> Reset</i></button> 
    </div>
  </div>
</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
<div class="col-md-6">
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn disabled box-title">
		<i class="fa fa-institution"></i>
		Data Kelurahan</h3>	
		<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">No</th> 
		<th class="col-sm-3">Nama Kelurahan</th> 
		<th class="col-sm-3">Nama Lurah</th> 
		<th class="col-sm-3">Alamat</th>  
		<th class="col-sm-2">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// data data dari Database
$sql = "SELECT * FROM kelurahan";
$tampil = mysql_query($sql);
$no=1;
while ($data = mysql_fetch_array($tampil)) { 
$Kode = $data['id_kelurahan'];

?>

	<tr>
	<td><?php echo $no++; ?></td> 
	<td><?php echo $data['nm_kelurahan']; ?></a></td>
	<td><?php echo $data['nm_lurah']; ?></td> 
	<td><?php echo $data['alamat']; ?></td> 
	<td align="center">
	<a class="btn btn-xs btn-info" data-toggle="tooltip" title="Edit Data " href="?module=kelurahan&aksi=edit&id_kelurahan=<?php echo $data['id_kelurahan'];?>" alt="Edit Data"> <i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" href="<?php echo $aksi ?>?module=kelurahan&aksi=hapus&id_kelurahan=<?php echo $data['id_kelurahan'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
<!----- ------------------------- END TAMBAH DATA MASTER kelurahan ------------------------- ----->
<?php	
break;
case "edit" :
$data=mysql_query("select * from kelurahan where id_kelurahan='$_GET[id_kelurahan]'");
$edit=mysql_fetch_array($data);
?>

<!----- ------------------------- EDIT DATA MASTER kelurahan ------------------------- ----->

<h3 class="box-title margin text-center">Edit Data kelurahan "<?php echo $_GET['id_kelurahan']; ?>"</h3>
<br/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=kelurahan&aksi=edit" role="form" method="post">             


	<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-institution"></i> Edit Data Kelas </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>
	<div class="box-body">

  <div class="form-group">
    <label class="col-sm-4 control-label">ID Kelurahan </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name ="id_kelurahan" value="<?php echo $edit['id_kelurahan']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Kelurahan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_kelurahan"value="<?php echo $edit['nm_kelurahan']; ?>">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Wali Kelas</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_lurah"value="<?php echo $edit['nm_lurah']; ?>">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Alamat Kelurahan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="alamat"value="<?php echo $edit['alamat']; ?>">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=kelurahan">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>

</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER kelurahan ------------------------- ----->
<?php
break;
}
?>
