<?php
$aksi="module/kelahiran/kelahiran_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA KELAHIRAN ------------------------- ----->			
<div style="margin-right:10%;margin-left:15%" class="alert alert-success alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman Data Kelahiran"!!!
</p>
</div> 		
<div class="text-center">
<h3>Data Kelahiran</h3><hr/></div>
<form class="form-horizontal" action="module/laporan/cetak_kelahiran.php" method="post">             
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
<button type="submit"name="submit" onclick="this.form.target='_self';return true;" class="btn btn-success"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-success">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		Data Kelahiran </h3>
		<a class="btn btn-default pull-right" href="?module=kelahiran&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah Data Kelahiran </a>	
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>
		<th class="col-sm-1">NO.KK</th>
		<th class="col-sm-1">NIK</th> 
		<th class="col-sm-2">NAMA</th>
		<th class="col-sm-1">NAMA IBU</th> 	
		<th class="col-sm-1">NAMA AYAH</th>
		<th class="col-sm-2">ALAMAT</th>		
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM kelahiran ";

$tampil = _query($sql);
$no=1;
while ($k = _fetch_array($tampil)) { 
$Kode = $k['id'];?>

	<tr>	
	<td><?php echo $no++; ?></td> 
	<td><?php echo $k['no_kk']; ?></td>
	<td><?php echo $k['nik']; ?></td>
	<td><?php echo $k['nama']; ?></td>
	<td><?php echo $k['ibu']; ?></td>
	<td><?php echo $k['ayah']; ?></td>
	<td><?php echo $k['alamat']; ?></td>
	
	<td align="center">
	<a class="btn btn-xs btn-success"data-toggle="tooltip" title="Lihat Data Pindah <?php echo $k['id_kelahiran'];?>" href="?module=kelahiran&aksi=detail_kelahiran&id_kelahiran=<?php echo $k['id_kelahiran'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>
	<a  class="btn btn-xs btn-info" href="?module=kelahiran&aksi=edit&id_kelahiran=<?php echo $k['id_kelahiran'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-warning" href="<?php echo $aksi ?>?module=kelahiran&aksi=hapus&id_kelahiran=<?php echo $k['id_kelahiran'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA KELAHIRAN ------------------------- ----->
<?php 
break;
 case "tambah": 
 
$sql ="SELECT max(id_kelahiran) as terakhir from kelahiran";
  $hasil = _query($sql);
  $data = _fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "IDL".sprintf("%03s",$nextNoUrut);
?>
<!----- ------------------------- TAMBAH DATA KELAHIRAN ------------------------- ----->
<h3 class="box-title margin text-center">Tambah Data Kelahiran</h3>
<hr/>
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
$sql6 ="SELECT max(id) as terakhir from kelahiran";
  $hasil6 = _query($sql6);
  $data6 = _fetch_array($hasil6);
  $lastID6 = $data6['terakhir'];
  $lastNoUrut6 = substr($lastID6, 3, 9);
  $nextNoUrut6 = $lastNoUrut6 + 1;
  $nextID6 = "IDL".sprintf("%03s",$nextNoUrut6);
  $id_himpunan=$nextID6;
?>
  <div class="form-group">
    <label class="col-sm-4 control-label">ID KELAHIRAN</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" name="id_kelahiran" value="<?php echo $nextID;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ID WARGA</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" name="id" value="<?php echo $nextID;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NO KK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_kk" placeholder="Masukan No kk ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nama" placeholder="Masukan Nama Lengkap ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <label class="radio-inline">
    <input type="radio" name="jk" value="Laki - laki" checked>Laki - laki
    </label>
    <label class="radio-inline">
    <input type="radio" name="jk" value="Perempuan">Perempuan
    </label>
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
    <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="tempat_lhr" placeholder="Tempat Lahir"></textarea>
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" placeholder="Masukan tanggal lahir" name="tanggal_lhr">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PUKUL LAHIR</label>
	 <div class="col-sm-5">
	 <input type="time" class="form-control" required="required" value="<?php echo date("hh-mm-ss"); ?>" name="pukul_lahir" placeholder="Pukul Lahir">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">KELAHIRAN KE</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="kelahiran_ke"placeholder="Kelahiran ke"></textarea>
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
	  <label class="col-sm-4 control-label">KEWARGANEGARAAN</label>
	  <label class="radio-inline">
	  <input type="radio" name="kewarganegaraan" value="WNI" checked>WNI
	  </label>
	  <label class="radio-inline">
	  <input type="radio" name="kewarganegaraan" value="WNA">WNA
		</label>
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
    <label class="col-sm-4 control-label">AYAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="ayah" placeholder="Nama Ayah">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">IBU</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="ibu" placeholder="Nama Ibu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <textarea rowspan="2" class="form-control" name="alamat" placeholder="Alamat"></textarea>
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
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> SIMPAN</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> RESET</button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> KEMBALI</a>			 
    </div>
  </div> 
</form>
</div> 
</div> 
</div> 
</form>
</div> </div> 
<!----- ------------------------- END TAMBAH DATA KELAHIRAN ------------------------- ----->
<?php	
break;
case "edit" :

$data=_query("SELECT * FROM kelahiran WHERE id_kelahiran='$_GET[id_kelahiran]'");
$edit=_fetch_array($data);

?>
<!----- ------------------------- EDIT DATA KELAHIRAN ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Kelahiran "<?php echo $_GET['id_kelahiran']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=kelahiran&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Informasi Data Kelahiran </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
<div class="box-body">
<div class="form-group">
    <label class="col-sm-4 control-label">ID KELAHIRAN</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="id_pendatang" value="<?php echo $edit['id_kelahiran'];?>">	  
    </div>
	</div>
<div class="form-group">
	<label class="col-sm-4 control-label">NIK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nik'];?>" name="nik">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label">NO KK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['no_kk'];?>" name="no_kk">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label">NAMA</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nama'];?>" name="nama">
	</div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <label class="radio-inline">
    <input type="radio" name="jk" value="<?php echo $edit['jk']; ?>" checked>Laki - laki
    </label>
    <label class="radio-inline">
    <input type="radio" name="jk" value="<?php echo $edit['jk']; ?>">Perempuan
    </label>
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
  <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['tempat_lahir']; ?>" name="tempat_lahir" placeholder="Tempat Lahir">
    </div>
</div>
<div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
	 <div class="col-sm-5">
   <input type="date" class="form-control" value="<?php echo $edit['tanggal_lahir']; ?>" placeholder="Masukan tanggal lahir" name="tanggal_lahir">
	</div>
</div>
<div class="form-group">
     <label class="col-sm-4 control-label">PUKUL LAHIR</label>
	 <div class="col-sm-5">
 <input type="time" class="form-control" required="required" value="<?php echo $edit['pukul_lahir'];?>" name="pukul_lahir">
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
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">NAMA AYAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['ayah']; ?>" name="nama_ayah" placeholder="Nama Ayah">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">NAMA IBU</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['ibu']; ?>" name="nama_ibu" placeholder="Nama Ibu">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['alamat']; ?>" name="alamat" placeholder="Masukan Alamat">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> SIMPAN</button>
<a href="?module=cancel">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> BATAL</button></a>	
 
    </div>
  </div>   
</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER kematian ------------------------- ----->
<?php	
break;
case "detail_kelahiran" :
$data=_query("SELECT * FROM kelahiran WHERE id_kelahiran='$_GET[id_kelahiran]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- DETAIL DATA KELAHIRAN ------------------------- ----->
<h3 class="box-title margin text-center">Detail Data Kelahiran "<?php echo $_GET['id_kelahiran']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=kelahiran&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Detail Informasi Data Kelahiran </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
<div class="box-body">
<div class="form-group">
    <label class="col-sm-4 control-label">ID KELAHIRAN</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_pendatang" value="<?php echo $edit['id_kelahiran'];?>">	  
    </div>
	</div>
<div class="form-group">
	<label class="col-sm-4 control-label">NIK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nik'];?>" readonly name="nik">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label">NO KK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['no_kk'];?>" readonly name="no_kk">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label">NAMA</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nama'];?>" readonly name="nama">
	</div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <label class="radio-inline">
    <input type="radio" name="jk" value="<?php echo $edit['jk']; ?>" checked>Laki - laki
    </label>
    <label class="radio-inline">
    <input type="radio" name="jk" value="<?php echo $edit['jk']; ?>">Perempuan
    </label>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT DILAHIRKAN</label>
    <div class="col-sm-3">	
    <select readonly name="tempat_dilahirkan" class="form-control"><option> PILIH TEMPAT</option>
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
    <label class="col-sm-4 control-label">AGAMA</label>
    <div class="col-sm-3">	
    <select readonly name="agama" class="form-control"><option> PILIH AGAMA</option>
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
  <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['tempat_lahir']; ?>" readonly name="tempat_lahir" placeholder="Tempat Lahir">
    </div>
</div>
<div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
	 <div class="col-sm-5">
   <input type="date" class="form-control" value="<?php echo $edit['tanggal_lahir']; ?>" placeholder="Masukan tanggal lahir" readonly name="tanggal_lahir">
	</div>
</div>
<div class="form-group">
     <label class="col-sm-4 control-label">PUKUL LAHIR</label>
	 <div class="col-sm-5">
 <input type="time" class="form-control" required="required" value="<?php echo $edit['pukul_lahir'];?>" readonly name="pukul_lahir">
	</div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAHIRAN</label>
<div class="col-sm-3">	
    <select readonly name="jenis_kelahiran" class="form-control"><option> PILIH JENIS KELAHIRAN</option>
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
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['kelahiran_ke']; ?>" readonly name="kelahiran_ke" placeholder="Kelahiran Ke">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">PENOLONG KELAHIRAN </label>
<div class="col-sm-3">	
    <select readonly name="penolong" class="form-control"><option> PENOLONG KELAHIRAN</option>
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
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['nama_penolong']; ?>" readonly name="nama_penolong" placeholder="Nama Penolong">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">BERAT BAYI</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['berat_bayi']; ?>" readonly name="berat_bayi" placeholder="Berat Bayi">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">PANJANG BAYI</label>
    <div class="col-sm-5">
      <input type="text" rowspan="2" class="form-control" value="<?php echo $edit['panjang_bayi']; ?>" readonly name="panjang_bayi" placeholder="Panjang Bayi">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">NAMA AYAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['ayah']; ?>" readonly name="nama_ayah" placeholder="Nama Ayah">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">NAMA IBU</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['ibu']; ?>" readonly name="nama_ibu" placeholder="Nama Ibu">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['alamat']; ?>" readonly name="alamat" placeholder="Masukan Alamat">
    </div>
</div>

<?php
break;
}
?>
