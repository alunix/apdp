<?php
$aksi="module/warga/warga_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- Menampilkan Data Warga ------------------------- ----->	
<div style="margin-right:10%;margin-left:15%" class="alert alert-success alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman Data Warga"!!!</center>
</p>
</div> 				
<div class="text-center">
<h3>Data Warga</h3><hr/></div>
<form class="form-horizontal" action="module/laporan/cetak_data_warga.php" method="post">             
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
<button type="submit"name="submit" onclick="this.form.target='_blank';return true;" class="btn btn-success"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-success">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-user-secret"></i>Data Warga </h3>	
		<a class="btn btn-default pull-right"href="?module=warga&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah data Warga</a>		
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>
		<th class="col-sm-2">NO. KK</th>
		<th class="col-sm-2">NIK</th> 
		<th class="col-sm-2">NAMA</th> 
		<th class="col-sm-1">JK</th> 
		<th class="col-sm-1">ALAMAT</th> 
		<th class="col-sm-1">AKSI</th>
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM data_warga";
$no=1;
$tampil = mysql_query($sql);
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id'];
?>

	<tr>
	<td><?php echo $no++; ?></td> 
	<td><?php echo $tampilkan['no_kk']; ?></td>
	<td><?php echo $tampilkan['nik']; ?></td>
	<td><?php echo $tampilkan['nama']; ?></td>
	<td><?php echo $tampilkan['jk']; ?></td>
	<td><?php echo $tampilkan['alamat']; ?></td>
	<td align="center">
	<a class="btn btn-xs btn-success"data-toggle="tooltip" title="Lihat Data Warga <?php echo $tampilkan['id'];?>" href="?module=warga&aksi=detail_warga&id=<?php echo $tampilkan['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>
	<a class="btn btn-xs btn-danger"data-toggle="tooltip" title="Hapus Data Warga??"href="<?php echo $aksi ?>?module=warga&aksi=hapus&id=<?php echo $tampilkan['id'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	<a class="btn btn-xs btn-info" data-toggle="tooltip" title="Edit Data Warga??"href="?module=warga&aksi=edit&id=<?php echo $tampilkan['id'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Cetak Data Warga??"href="module/laporan/data_warga.php?module=laporan&aksi=edit&id=<?php echo $tampilkan['id'];?>" alt="Cetak Data"><i class="glyphicon glyphicon-print"></i></a>
		
		</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA WARGA ------------------------- ----->
<?php 
break;
 case "tambah": 
//ID
$sql ="SELECT max(id) as terakhir from data_warga";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "ID".sprintf("%03s",$nextNoUrut);
?>
<!----- ------------------------- TAMBAH DATA WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Tambah Data Warga</h3>
<center> <div class="batas"> </div></center>
<hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=warga&aksi=tambah" role="form" method="post">   
  
<div class="box box-solid box-success">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Data Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">        
  <div class="form-group">
    <label class="col-sm-4 control-label">ID </label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  readonly name="id" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NO. KK</label>
    <div class="col-sm-5">
      <input type="number" class="form-control"  name="no_kk" placeholder="Masukan No. KK ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NIK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nik" placeholder="Masukan NIK ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  name="nama" placeholder="Masukan Nama Lengkap ...">
    </div>
  </div>
  
     <div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <div class="col-sm-5">
	  <input name="jk" class="minimal" type="radio" value="Laki-laki" checked> Laki-laki &nbsp;&nbsp;
	  <input name="jk" class="minimal" type="radio" value="Perempuan"> Perempuan
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="tempat_lhr" placeholder="Tempat Lahir"></textarea>
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" name="tanggal_lhr" placeholder="Masukan tanggal lahir">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">KEWARGANEGARAAN</label>
    <div class="col-sm-5">
	  <input name="kewarganegaraan" class="minimal" type="radio" value="wni" checked> WNI &nbsp;&nbsp;
	  <input name="kewarganegaraan" class="minimal" type="radio" value="wna"> WNA
    </div>
  </div>
  <div class="form-group">
                                            <label class="col-sm-4 control-label">AGAMA</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="agama">
                                                <option>Pilih Agama</option>
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Hindu</option>
                                                <option>Budha</option>
                                                <option>Konghucu</option>
                                                <option>Lainnya</option>
                                            </select>
											</div>
   </div>
   <div class="form-group">
                                            <label class="col-sm-4 control-label">PENDIDIKAN</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="pendidikan">
                                                <option>Pilih Pendidikan</option>
                                                <option>Tidak/Belum Sekolah</option>
                                                <option>Belum Tamat SD/Sederajat</option>
                                                <option>SMP/Sederajat</option>
                                                <option>SMA/Sederajat</option>
                                                <option>Diploma I/II</option>
                                                <option>Akademi/Diploma III/Sarjana Muda</option>
                                                <option>Diploma IV/Strata I</option>
                                                <option>Strata II</option>
                                                <option>Strata III</option>
                                                <option>Tidak Tamat SD/Sederajat</option>
                                            </select>
											</div>
   </div>
   <div class="form-group">
                                            <label class="col-sm-4 control-label">PEKERJAAN</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="pekerjaan">
                                                <option>Pilih Pekerjaan</option>
                                                <option>PNS</option>
                                                <option>TNI</option>
                                                <option>POLRI</option>
                                                <option>Pegawai Swasta</option>
                                                <option>Wiraswasta</option>
                                                <option>Buruh</option>
                                                <option>Pejabat Negara</option>
                                                <option>Tenaga Profesi</option>
                                                <option>Pensiunan</option>
                                                <option>IRT</option>
                                                <option>Belum Bekerja</option>
                                                <option>Tidak Bekerja</option>
                                                <option>Lainnya</option>
                                            </select>
											</div>
   </div>
   <div class="form-group">
                                            <label class="col-sm-4 control-label">STATUS PERNIKAHAN</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="status_nikah">
                                                <option>Pilih Status Pernikahan</option>
                                                <option>Kawin</option>
                                                <option>Belum Kawin</option>
                                                <option>Cerai Hidup</option>
                                                <option>Cerai Mati</option>
                                            </select>
                                        </div>
										</div>
  <div class="form-group">
                                            <label class="col-sm-4 control-label">STATUS KELUARGA</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="status_keluarga">
                                                <option>Pilih Status Keluarga</option>
                                                <option>Kepala Keluarga</option>
                                                <option>Istri</option>
                                                <option>Anak</option>
                                                <option>Cucu</option>
                                                <option>Famili Lain</option>
                                            </select>
                                        </div>
										</div>
  <div class="form-group">
                                            <label class="col-sm-4 control-label">GOLONGAN DARAH</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="gol_dar">
                                                <option>Pilih Golongan Darah</option>
                                                <option>O</option>
                                                <option>A</option>
                                                <option>B</option>
                                                <option>AB</option>
                                                <option>Lainnya</option> 
                                            </select>
                                        </div>
										</div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA AYAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA IBU</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="alamat"placeholder="Alamat"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">DESA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="desa" placeholder="Desa">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="rt" placeholder="RT">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RW</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="rw" placeholder="RW">
    </div>
  </div>
   </div></div> 
   
   

   
   
   

   <!----- ------------------------- FORM DATA KELAHIRAN ------------------------- ----->
 
 <div class="box-body">
	<div class="box box-solid box-primary">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Tambah Data Kelahiran </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=kelahiran&aksi=tambah" role="form" method="post">        
<?php
$sql6 ="SELECT max(id_kelahiran) as terakhir from kelahiran";
  $hasil6 = mysql_query($sql6);
  $data6 = mysql_fetch_array($hasil6);
  $lastID6 = $data6['terakhir'];
  $lastNoUrut6 = substr($lastID6, 3, 9);
  $nextNoUrut6 = $lastNoUrut6 + 1;
  $nextID6 = "IDL".sprintf("%03s",$nextNoUrut6);
  $id_kelahiran=$nextID6;
 ?>
 
  <div class="form-group">
    <label class="col-sm-4 control-label">ID KELAHIRAN</label>
    <div class="col-sm-5">
    <input type="text" class="form-control"  readonly name="id_kelahiran" value="<?php echo $nextID6;?>">
    </div>
  </div>

  <div class="form-group">
                                            <label class="col-sm-4 control-label">TEMPAT DILAHIRKAN</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="tempat_dilahirkan">
                                                <option>Pilih Tempat</option>
                                                <option>RS/RSB</option>
                                                <option>PUSKESMAS</option>
                                                <option>POLINDES</option>
                                                <option>RUMAH</option>
                                                <option>Lainnya</option>
                                            </select>
											</div>
   </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PUKUL LAHIR</label>
	 <div class="col-sm-5">
	 <input type="time" class="form-control"  value="<?php echo date("hh-mm-ss"); ?>" name="pukul_lahir" placeholder="Pukul Lahir">
	</div>
  </div>
  <div class="form-group">
                                            <label class="col-sm-4 control-label">JENIS KELAHIRAN</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="jenis_kelahiran">
                                                <option>Pilih Jenis Kelahiran</option>
                                                <option>Tunggal</option>
                                                <option>Kembar 2</option>
                                                <option>Kembar 3</option>
                                                <option>Lainnya</option>
                                            </select>
											</div>
   </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">KELAHIRAN KE</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="kelahiran_ke"placeholder="Kelahiran ke"></textarea>
    </div>
  </div>
  
    <div class="form-group">
                                            <label class="col-sm-4 control-label">PENOLONG KELAHIRAN</label>
											<div class="col-sm-5">
                                            <select class="form-control" name="penolong">
                                                <option>Pilih Penolong</option>
                                                <option>Dokter</option>
                                                <option>Bidan</option>
                                                <option>Dukun Beranak</option>
                                                <option>Lainnya</option>
                                            </select>
											</div>
   </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA PENOLONG</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="nama_penolong"placeholder="Nama Penolong"></textarea>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">BERAT BAYI</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="berat_bayi"placeholder="Berat Bayi"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">PANJANG BAYI</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="panjang_bayi"placeholder="Panjang Bayi"></textarea>
    </div> </div>
  </div>
  </div>

     <!----- ------------------------- FORM DATA PENDATANG ------------------------- ----->
  <div class="box-body">
	<div class="box box-solid box-primary">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Tambah Data Pendatang </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=pendatang&aksi=tambah" role="form" method="post">        
<?php  
$sql9 ="SELECT max(id_pendatang) as terakhir from pendatang";
  $hasil9 = mysql_query($sql9);
  $data9 = mysql_fetch_array($hasil9);
  $lastID9 = $data9['terakhir'];
  $lastNoUrut9 = substr($lastID9, 3, 9);
  $nextNoUrut9 = $lastNoUrut9 + 1;
  $nextID9 = "IDP".sprintf("%03s",$nextNoUrut9);
?>
  <div class="form-group">
    <label class="col-sm-4 control-label">ID pendatang</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" readonly name="id_pendatang" value="<?php echo $nextID9;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TGL DATANG</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" name="tanggal_datang" placeholder="tanggal datang ...">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT DATANG</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  name="alamat_datang" placeholder="Masukan Nama Lengkap ...">
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
$data=mysql_query("select * from data_warga where id='$_GET[id]'");
$edit=mysql_fetch_array($data);
?>
<!----- ------------------------- EDIT DATA WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Warga "<?php echo $_GET['id']; ?>"</h3>
<br/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=warga&aksi=edit" role="form" method="post">             

<div class="box box-solid box-success">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Edit Informasi Data Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
  <div class="form-group">
    <label class="col-sm-4 control-label">ID</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id" value="<?php echo $edit['id']; ?>" >
    </div>
  </div> 
    <div class="form-group">
    <label class="col-sm-4 control-label">NO. KK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['no_kk']; ?>" name="no_kk" placeholder="Masukan No KK ...">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">NIK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nik']; ?>" name="nik" placeholder="Masukan NIK ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama']; ?>" name="nama" placeholder="Masukan Nama Lengkap">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <div class="col-sm-5">
	  <input  class="minimal" name="jk" type="radio" value="Laki-laki" <?php if(($edit['jk'])== "Laki-laki")
				{echo "checked=\"checked\"";};?>/> Laki-laki &nbsp;&nbsp;
	  <input class="minimal" name="jk" type="radio" value="Perempuan" <?php if(($edit['jk'])== "Perempuan")
				{echo "checked=\"checked\"";};?>/> Perempuan
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['tempat_lhr']; ?>" name="tempat_lhr" placeholder="Tempat Lahir">
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" value="<?php echo $edit['tanggal_lhr']; ?>" name="tanggal_lhr" placeholder="Masukan tanggal lahir">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">KEWARGANEGARAAN</label>
    <div class="col-sm-5">
	  <input  class="minimal" name="kewarganegaraan" type="radio" value="wni" <?php if(($edit['kewarganegaraan'])== "wni")
				{echo "checked=\"checked\"";};?>/> WNI &nbsp;&nbsp;
	  <input class="minimal" name="kewarganegaraan" type="radio" value="wna" <?php if(($edit['kewarganegaraan'])== "wna")
				{echo "checked=\"checked\"";};?>/> WNA
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">AGAMA</label>
    <div class="col-sm-3">	
    <select name="agama" class="form-control"><option> PILIH AGAMA</option>
	<option name="agama" value="Islam" <?php if(($edit['agama'])== "Islam")
				{echo "selected=\"selected\"";};?>> Islam </option>
	<option name="agama" value="Kristen" <?php if(($edit['agama'])== "Kristen")
				{echo "selected=\"selected\"";};?>> Kristen </option>
	<option name="agama" value="Hindu" <?php if(($edit['agama'])== "Hindu")
				{echo "selected=\"selected\"";};?>> Hindu </option>
	<option name="agama" value="Budha" <?php if(($edit['agama'])== "Budha")
				{echo "selected=\"selected\"";};?>> Budha</option>
	<option name="agama" value="Konghucu" <?php if(($edit['agama'])== "Konghucu")
				{echo "selected=\"selected\"";};?>> Konghucu</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">PENDIDIKAN</label>
    <div class="col-sm-3">	
    <select name="pendidikan" class="form-control"><option> PILIH PENDIDIKAN</option>
	<option name="pendidikan" value="Tidak/Belum Sekolah" <?php if(($edit['pendidikan'])== "Tidak/Belum Sekolah")
				{echo "selected=\"selected\"";};?>> Tidak/Belum Sekolah </option>
	<option name="pendidikan" value="Belum Tamat SD/Sederajat" <?php if(($edit['pendidikan'])== "Belum Tamat SD/Sederajat")
				{echo "selected=\"selected\"";};?>> Belum Tamat SD/Sederajat </option>
	<option name="pendidikan" value="SMP/Sederajat" <?php if(($edit['pendidikan'])== "SMP/Sederajat")
				{echo "selected=\"selected\"";};?>> SMP/Sederajat </option>
	<option name="pendidikan" value="SMA/Sederajat" <?php if(($edit['pendidikan'])== "SMA/Sederajat")
				{echo "selected=\"selected\"";};?>> SMA/Sederajat </option>	
	<option name="pendidikan" value="Diploma I/II" <?php if(($edit['pendidikan'])== "Diploma I/II")
				{echo "selected=\"selected\"";};?>> Diploma I/II </option>	
	<option name="pendidikan" value="Akademi/Diploma III/Sarjana Muda" <?php if(($edit['pendidikan'])== "Akademi/Diploma III/Sarjana Muda")
				{echo "selected=\"selected\"";};?>> Akademi/Diploma III/Sarjana Muda </option>
	<option name="pendidikan" value="Diploma IV/Strata I" <?php if(($edit['pendidikan'])== "Diploma IV/Strata I")
				{echo "selected=\"selected\"";};?>> Diploma IV/Strata I </option>
	<option name="pendidikan" value="Strata II" <?php if(($edit['pendidikan'])== "Strata II")
				{echo "selected=\"selected\"";};?>> Strata II </option>
	<option name="pendidikan" value="Strata III" <?php if(($edit['pendidikan'])== "Strata III")
				{echo "selected=\"selected\"";};?>> Strata III </option>
	<option name="pendidikan" value="Tidak Tamat SD/Sederajat" <?php if(($edit['pendidikan'])== "Tidak Tamat SD/Sederajat")
				{echo "selected=\"selected\"";};?>> Tidak Tamat SD/Sederajat </option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">PEKERJAAN</label>
    <div class="col-sm-3">	
    <select name="pekerjaan" class="form-control"><option> PILIH PEKERJAAN</option>
	<option name="pekerjaan" value="PNS" <?php if(($edit['pekerjaan'])== "PNS")
				{echo "selected=\"selected\"";};?>> PNS </option>
	<option name="pekerjaan" value="TNI" <?php if(($edit['pekerjaan'])== "TNI")
				{echo "selected=\"selected\"";};?>> TNI </option>
	<option name="pekerjaan" value="POLRI" <?php if(($edit['pekerjaan'])== "POLRI")
				{echo "selected=\"selected\"";};?>> POLRI </option>
	<option name="pekerjaan" value="Pegawai Swasta" <?php if(($edit['pekerjaan'])== "Pegawai Swasta")
				{echo "selected=\"selected\"";};?>> Pegawai Swasta </option>
	<option name="pekerjaan" value="Wiraswasta" <?php if(($edit['pekerjaan'])== "Wiraswasta")
				{echo "selected=\"selected\"";};?>> Wiraswasta </option>
	<option name="pekerjaan" value="Buruh" <?php if(($edit['pekerjaan'])== "Buruh")
				{echo "selected=\"selected\"";};?>> Buruh </option>
	<option name="pekerjaan" value="Pejabat Negara" <?php if(($edit['pekerjaan'])== "Pejabat Negara")
				{echo "selected=\"selected\"";};?>> Pejabat Negara </option>
	<option name="pekerjaan" value="Tenaga Profesi" <?php if(($edit['pekerjaan'])== "Tenaga Profesi")
				{echo "selected=\"selected\"";};?>> Tenaga Profesi </option>
	<option name="pekerjaan" value="Pensiunan" <?php if(($edit['pekerjaan'])== "Pensiunan")
				{echo "selected=\"selected\"";};?>> Pensiunan </option>
	<option name="pekerjaan" value="IRT" <?php if(($edit['pekerjaan'])== "IRT")
				{echo "selected=\"selected\"";};?>> IRT </option>	
	<option name="pekerjaan" value="Belum Bekerja" <?php if(($edit['pekerjaan'])== "Belum Bekerja")
				{echo "selected=\"selected\"";};?>> Belum Bekerja </option>
	<option name="pekerjaan" value="Tidak Bekerja" <?php if(($edit['pekerjaan'])== "Tidak Bekerja")
				{echo "selected=\"selected\"";};?>> Tidak Bekerja </option>
	<option name="pekerjaan" value="Lainnya" <?php if(($edit['pekerjaan'])== "Lainnya")
				{echo "selected=\"selected\"";};?>> Lainnya </option>
	</select>
    </div>  </div>
	<div class="form-group">
    <label class="col-sm-4 control-label">STATUS NIKAH</label>
    <div class="col-sm-3">		
    <select name="status_nikah" class="form-control"><option> PILIH STATUS NIKAH</option>
	<option name="status_nikah" value="Kawin" <?php if(($edit['status_nikah'])== "Kawin")
				{echo "selected=\"selected\"";};?>> Kawin </option>
	<option name="status_nikah" value="Belum Kawin" <?php if(($edit['status_nikah'])== "Belum Kawin")
				{echo "selected=\"selected\"";};?>> Belum Kawin </option>
	<option name="status_nikah" value="Cerai Hidup" <?php if(($edit['status_nikah'])== "Cerai Hidup")
				{echo "selected=\"selected\"";};?>> Cerai Hidup </option>
	<option name="status_nikah" value="Cerai Mati" <?php if(($edit['status_nikah'])== "Cerai Mati")
				{echo "selected=\"selected\"";};?>> Cerai Mati </option>
	</select>
    </div>
  </div>
	<div class="form-group">
    <label class="col-sm-4 control-label">STATUS KELUARGA</label>
    <div class="col-sm-3">	
    <select name="status_keluarga" class="form-control"><option> PILIH STATUS KELUARGA</option>
	<option name="status_keluarga" value="Kepala Keluarga" <?php if(($edit['status_keluarga'])== "Kepala Keluarga")
				{echo "selected=\"selected\"";};?>> Kepala Keluarga </option>
	<option name="status_keluarga" value="Istri" <?php if(($edit['status_keluarga'])== "Istri")
				{echo "selected=\"selected\"";};?>> Istri </option>
	<option name="status_keluarga" value="Anak" <?php if(($edit['status_keluarga'])== "Anak")
				{echo "selected=\"selected\"";};?>> Anak </option>
	<option name="status_keluarga" value="Cucu" <?php if(($edit['status_keluarga'])== "Cucu")
				{echo "selected=\"selected\"";};?>> Cucu </option>
	<option name="status_keluarga" value="Famili Lain" <?php if(($edit['status_keluarga'])== "Famili Lain")
				{echo "selected=\"selected\"";};?>> Famili Lain </option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">GOLONGAN DARAH</label>
    <div class="col-sm-3">	
    <select name="gol_dar" class="form-control"><option> PILIH GOLONGAN DARAH</option>
	<option name="gol_dar" value="O" <?php if(($edit['gol_dar'])== "O")
				{echo "selected=\"selected\"";};?>> O </option>
	<option name="gol_dar" value="A" <?php if(($edit['gol_dar'])== "A")
				{echo "selected=\"selected\"";};?>> A </option>
	<option name="gol_dar" value="B" <?php if(($edit['gol_dar'])== "B")
				{echo "selected=\"selected\"";};?>> B </option>
	<option name="gol_dar" value="AB" <?php if(($edit['gol_dar'])== "AB")
				{echo "selected=\"selected\"";};?>> AB </option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA AYAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama_ayah']; ?>" name="nama_ayah" placeholder="Nama Ayah">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA IBU</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama_ibu']; ?>" name="nama_ibu" placeholder="Nama Ibu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['alamat']; ?>" name="alamat" placeholder="Masukan Alamat">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">DESA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['desa']; ?>" name="desa" placeholder="Desa">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['rt']; ?>" name="rt" placeholder="RT">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RW</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['rw']; ?>" name="rw" placeholder="RW">
    </div>
  </div></div>
  </div>

  
  <!----- ------------------------- EDIT DATA KELAHIRAN ------------------------- ----->
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Informasi Data Kelahiran </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
<div class="box-body">
<?php 
// Tampilkan data dari Database
$a = mysql_query("SELECT * FROM kelahiran where id='$_GET[id]'");
while ($edit = mysql_fetch_array($a)) { ?>
<div class="form-group">
    <label class="col-sm-4 control-label">ID KELAHIRAN</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_pendatang" value="<?php echo $edit['id_kelahiran'];?>">	  
    </div>
	</div>
<div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT DILAHIRKAN</label>
    <div class="col-sm-3">	
    <select name="tempat_dilahirkan" class="form-control"><option> PILIH TEMPAT</option>
	<option name="tempat_dilahirkan" value="RS/RSB" <?php if(($edit['tempat_dilahirkan'])== "RS/RSB")
				{echo "selected=\"selected\"";};?>> RS/RSB </option>
	<option name="tempat_dilahirkan" value="PUSKESMAS" <?php if(($edit['tempat_dilahirkan'])== "PUSKESMAS")
				{echo "selected=\"selected\"";};?>> PUSKESMAS </option>
	<option name="tempat_dilahirkan" value="POLINDES" <?php if(($edit['tempat_dilahirkan'])== "POLINDES")
				{echo "selected=\"selected\"";};?>> POLINDES </option>
	<option name="tempat_dilahirkan" value="RUMAH" <?php if(($edit['tempat_dilahirkan'])== "RUMAH")
				{echo "selected=\"selected\"";};?>> RUMAH </option>
	<option name="tempat_dilahirkan" value="Lainnya" <?php if(($edit['tempat_dilahirkan'])== "Lainnya")
				{echo "selected=\"selected\"";};?>> Lainnya </option>
	</select>
</div>
</div>

<div class="form-group">
     <label class="col-sm-4 control-label">PUKUL LAHIR</label>
	 <div class="col-sm-5">
 <input type="time" class="form-control" value="<?php echo $edit['pukul_lahir'];?>" name="pukul_lahir">
	</div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAHIRAN</label>
<div class="col-sm-3">	
    <select name="jenis_kelahiran" class="form-control"><option> PILIH JENIS KELAHIRAN</option>
	<option name="jenis_kelahiran" value="Tunggal" <?php if(($edit['jenis_kelahiran'])== "Tunggal")
				{echo "selected=\"selected\"";};?>> Tunggal </option>
	<option name="jenis_kelahiran" value="Kembar 2" <?php if(($edit['jenis_kelahiran'])== "Kembar 2")
				{echo "selected=\"selected\"";};?>> Kembar 2 </option>
	<option name="jenis_kelahiran" value="Kembar 3" <?php if(($edit['jenis_kelahiran'])== "Kembar 3")
				{echo "selected=\"selected\"";};?>> Kembar 3 </option>
	<option name="jenis_kelahiran" value="Lainnya" <?php if(($edit['jenis_kelahiran'])== "Lainnya")
				{echo "selected=\"selected\"";};?>> Lainnya </option>
	</select>
</div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">KELAHIRAN KE</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['kelahiran_ke']; ?>" name="kelahiran_ke" placeholder="Kelahiran Ke">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">PENOLONG KELAHIRAN </label>
<div class="col-sm-3">	
    <select name="penolong" class="form-control"><option> PENOLONG KELAHIRAN</option>
	<option name="penolong" value="Dokter" <?php if(($edit['penolong'])== "Dokter")
				{echo "selected=\"selected\"";};?>> Dokter </option>
	<option name="penolong" value="Bidan" <?php if(($edit['penolong'])== "Bidan")
				{echo "selected=\"selected\"";};?>> Bidan </option>
	<option name="penolong" value="Dukun Beranak" <?php if(($edit['penolong'])== "Dukun Beranak")
				{echo "selected=\"selected\"";};?>> Dukun Beranak </option>
	</select>
</div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">NAMA PENOLONG</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['nama_penolong']; ?>" name="nama_penolong" placeholder="Nama Penolong">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">BERAT BAYI</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['berat_bayi']; ?>" name="berat_bayi" placeholder="Berat Bayi">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">PANJANG BAYI</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['panjang_bayi']; ?>" name="panjang_bayi" placeholder="Panjang Bayi">
    </div>
</div></div>
  </div>
<?php } ?>



<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Informasi Data Pendatang </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
<div class="box-body">
<?php
$a = mysql_query("SELECT * FROM pendatang where id='$_GET[id]'");
while ($edi = mysql_fetch_array($a)) { ?>
<div class="form-group">
    <label class="col-sm-4 control-label">ID PENDATANG</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_pendatang" value="<?php echo $edi['id_pendatang'];?>">	  
    </div>
	</div>
<div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL DATANG</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" value="<?php echo $edi['tanggal_datang']; ?>" placeholder="Masukan tanggal datang" name="tanggal_datang">
	</div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT DATANG</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edi['alamat_datang']; ?>" name="alamat_datang" placeholder="Masukan Alamat Datang">
    </div>
  </div>
  
<?php } ?>

	<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=warga">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>
</form>
<!----- ------------------------- END EDIT DATA WARGA ------------------------- ----->
<?php	
break;
case "detail_warga" :
?>
<center>
<h3> Data Warga</h3>
</center>

<form class="form-horizontal" action="<?php echo $aksi?>?module=warga&aksi=edit" role="form" method="post">             
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
	<li class="active"><a class="text-red" href="#data" data-toggle="tab"><i class="fa fa-user-md"></i> Data Warga </h3> </a></li>
	<li><a class="text-red" href="#data1" data-toggle="tab"><i class="fa fa-institution"></i> Data Kelahiran</h3></a></li>
	<li><a class="text-red" href="#data4" data-toggle="tab"><i class="fa fa-book"></i>  Data Pendatang</a></li>
</ul>
 <!-- <li><a href="javascript:history.back()" class="btn btn-sm btn-primary pull-right"><i class="fa fa-backward"></i> Kembali</a>	 </li> -->
<div class="tab-content">
<div class="tab-pane active" id="data">
<section id="new">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Data Warga </h3>
<div class="pull-right">
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	</div>	
	<div class="box-body">
<?php 
$data=mysql_query("select * from data_warga where id='$_GET[id]'");
$edit=mysql_fetch_array($data);
?>	
  <div class="form-group">
    <label class="col-sm-4 control-label">NO</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id" value="<?php echo $edit['id']; ?>" >
    </div>
  </div> 
    <div class="form-group">
    <label class="col-sm-4 control-label">NO. KK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['no_kk']; ?>" readonly name="no_kk" placeholder="Masukan No KK ...">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">NIK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nik']; ?>" readonly name="nik" placeholder="Masukan NIK ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama']; ?>" readonly name="nama" placeholder="Masukan Nama Lengkap">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['jk']; ?>" readonly name="jk" placeholder="Jenis Kelamin">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['tempat_lhr']; ?>" readonly name="tempat_lhr" placeholder="Tempat Lahir">
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" value="<?php echo $edit['tanggal_lhr']; ?>" readonly name="tanggal_lhr" placeholder="Masukan tanggal lahir">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">KEWARGANEGARAAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['kewarganegaraan']; ?>" placeholder="kewarganegaraan" readonly name="kewarganegaraan">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">AGAMA</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['agama']; ?>" placeholder="Agama" readonly name="agama">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PENDIDIKAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['pendidikan']; ?>" placeholder="Pendidikan" readonly name="pendidikan">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PEKERJAAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['pekerjaan']; ?>" placeholder="Pekerjaan" readonly name="pekerjaan">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">STATUS PERNIKAHAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['status_nikah']; ?>" placeholder="Status Nikah" readonly name="status_nikah">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">STATUS KELUARGA</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['status_keluarga']; ?>" placeholder="Status Keluarga" readonly name="status_keluarga">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">Golongan Darah</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['gol_dar']; ?>" placeholder="Golongan Darah" readonly name="gol_dar">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA AYAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama_ayah']; ?>" readonly name="nama_ayah" placeholder="Nama Ayah">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA IBU</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama_ibu']; ?>" readonly name="nama_ibu" placeholder="Nama Ibu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <input rowspan="2" class="form-control" value="<?php echo $edit['alamat']; ?>" readonly name="alamat" placeholder="Alamat">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">DESA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['desa']; ?>" readonly name="desa" placeholder="Desa">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['rt']; ?>" readonly name="rt" placeholder="RT">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RW</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['rw']; ?>" readonly name="rw" placeholder="RW">
    </div>
  </div>
	</div></div></section></div>
<div class="tab-pane" id="data1">
<section id="new1">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-institution"></i> Data Kelahiran </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	
	<div class="box-body">
<?php $d=mysql_query("select * from kelahiran where  id='$_GET[id]'");
$e=mysql_fetch_array($d);
?>	
	
<div class="form-group">
    <label class="col-sm-4 control-label">ID Kelahiran</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['id_kelahiran']; ?>">
    </div></div> 	
<div class="form-group">
    <label class="col-sm-4 control-label">Tempat Dilahirkan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['tempat_dilahirkan']; ?>">
    </div></div> 
<div class="form-group">
    <label class="col-sm-4 control-label">Pukul Lahir </label>
    <div class="col-sm-5">
      <input type="time" class="form-control" disabled value="<?php echo $e['pukul_lahir']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelahiran </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['jenis_kelahiran']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Kelahiran Ke</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['kelahiran_ke']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Penolong </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['penolong']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Nama Penolong </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['nama_penolong']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Berat Bayi </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['berat_bayi']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Panjang Bayi </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['panjang_bayi']; ?>">
    </div></div>
</div></div></section></div>



<div class="tab-pane" id="data4">
<section id="new4">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Data Pendatang </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	
	<div class="box-body">
<?php $d=mysql_query("select * from pendatang where  id='$_GET[id]'");
$f=mysql_fetch_array($d);
?>
<div class="form-group">
    <label class="col-sm-4 control-label">ID Pendatang</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $f['id_pendatang']; ?>">
    </div></div> 
<div class="form-group">
    <label class="col-sm-4 control-label">Tanggal Datang </label>
    <div class="col-sm-5">
      <input type="date" class="form-control" disabled value="<?php echo $f['tanggal_datang']; ?>">
    </div></div>
	<div class="form-group">
    <label class="col-sm-4 control-label">Alamat Datang </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $f['alamat_datang']; ?>">
    </div></div>
	
</div></div></section></div>





<?php	
break;
}
?>
