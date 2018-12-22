<?php
$aksi="module/user/user_aksi.php";


switch(@$_GET['aksi']){
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
		<th class="">ID user</th>
		<th class="">Nama</th>
		<th class="">Username</th>
		<th class="">No. HP</th>
		<th class="">Level</th>
		<th class="">Kelurahan / Kecamatan</th>
		<th class="">Status</th>
		
		<th class="">AKSI</th>
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "select u.*, IF(u.level='admin-kelurahan', vd.nama_desa, vd.nama_kecamatan) as 'nama_daerah', dda.nama_lurah, dda.nip, dda.alamat1, dda.alamat2
from `user` u 
join view_desa vd on IF(u.level='admin-kelurahan', vd.id, vd.kecamatan_id)=u.id_kelurahan
left join daerah_desa_attribut dda on dda.desa_id=u.id_kelurahan
where u.level<>'admin' group by u.id_user";
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
		<td><?php echo $tampilkan['nama_daerah']; ?></td>
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
    <a class="btn btn-default btn-sm pull-right" style="margin-right: 5px;" href="?module=user">
        Kembali
    </a>
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
        <script>
            function loadTrueDataOption(event, element) {
                var opt = $(element).find('option:selected').val();
                if (opt == 'admin-kecamatan') {
                    $(".show-on-kecamatan").show();
                    $(".show-on-kelurahan").hide();
                } else {
                    $(".show-on-kecamatan").hide();
                    $(".show-on-kelurahan").show();
                }
            }
        </script>
      <select name="level" class="form-control" onchange="loadTrueDataOption(event, this)">
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
        <?php
        include BASE_DIR."/inc/desa_selector.php";
        load_scripts();
        ?>
        <div class="form-group show-on-kecamatan" style="display: none;">

            <div class="form-group">
                <label class="col-sm-4 control-label">PROVINSI</label>
                <div class="col-sm-5">
                    <select name="provinsi_id" id="provinsi_id_kecamatan" class="form-control" onchange="changeProvinsi(event, this, '#kabupaten_id_kecamatan');">
                        <?php
                        $provinsis = get_provinsi();
                        echo optionLoop($provinsis);
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KABUPATEN</label>
                <div class="col-sm-5">
                    <select name="kabupaten_id" id="kabupaten_id_kecamatan" class="form-control" onchange="changeKabupaten(event, this, '#kecamatan_id_kecamatan');">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KECAMATAN</label>
                <div class="col-sm-5">
                    <select name="id_kecamatan" id="kecamatan_id_kecamatan" class="form-control">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA CAMAT</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_camat">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nip_camat">
                </div>
            </div>
        </div>

        <div class="form-group show-on-kelurahan" style="display: none;">

            <div class="form-group">
                <label class="col-sm-4 control-label">PROVINSI</label>
                <div class="col-sm-5">
                    <select name="provinsi_id" id="provinsi_id_kelurahan" class="form-control" onchange="changeProvinsi(event, this, '#kabupaten_id_kelurahan');">
                        <?php
                        $provinsis = get_provinsi();
                        echo optionLoop($provinsis);
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KABUPATEN</label>
                <div class="col-sm-5">
                    <select name="kabupaten_id" id="kabupaten_id_kelurahan" class="form-control" onchange="changeKabupaten(event, this, '#kecamatan_id_kelurahan');">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KECAMATAN</label>
                <div class="col-sm-5">
                    <select name="kecamatan_id" id="kecamatan_id_kelurahan" class="form-control" onchange="changeKecamatan(event, this, '#desa_id_kelurahan');">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">DESA</label>
                <div class="col-sm-5">
                    <select name="id_kelurahan" id="desa_id_kelurahan" class="form-control"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA LURAH</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_lurah">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nip_lurah">
                </div>
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
    $id_user = @$_GET['id_user'];
$data=_query("
  select u.*, IF(u.level='admin-kelurahan', vd.nama_desa, vd.nama_kecamatan) as 'nama_daerah', dda.nama_lurah, dda.nip, dda.alamat1, dda.alamat2
    from `user` u 
    join view_desa vd on IF(u.level='admin-kelurahan', vd.id, vd.kecamatan_id)=u.id_kelurahan
    left join daerah_desa_attribut dda on dda.desa_id=u.id_kelurahan
    where u.level<>'admin' and u.id_user='$id_user' group by u.id_user 
");
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
    <a class="btn btn-default btn-sm pull-right" style="margin-right: 5px;" href="?module=user">
        Kembali
    </a>
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
        <label class="col-sm-4 control-label">Level </label>
        <div class="col-sm-5">
            <script>
                function loadObjectSelect(opt) {
                    if (opt == 'admin-kecamatan') {
                        $(".show-on-kecamatan").show();
                        $(".show-on-kelurahan").hide();
                    } else {
                        $(".show-on-kecamatan").hide();
                        $(".show-on-kelurahan").show();
                    }
                }
                function loadTrueDataOption(event, element) {
                    var opt = $(element).find('option:selected').val();
                    loadObjectSelect(opt);
                }
            </script>
            <select name="level" class="form-control" onchange="loadTrueDataOption(event, this)">
                <option value=" "> -- Pilih Level -- </option>
                <option value="admin-kelurahan" <?=$edit['level']=='admin-kelurahan'?' selected="selected" ':'';?> >Admin Kelurahan</option>
                <option value="admin-kecamatan" <?=$edit['level']=='admin-kecamatan'?' selected="selected" ':'';?> >Admin Kecamatan</option>
            </select>
            <script>
                $(function () {
                    loadObjectSelect('<?=$edit['level'];?>');
                })
            </script>
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
        <?php
        include BASE_DIR."/inc/desa_selector.php";
        load_scripts();
        ?>
        <div class="form-group show-on-kecamatan" style="display: none;">

            <div class="form-group">
                <label class="col-sm-4 control-label">PROVINSI</label>
                <div class="col-sm-5">
                    <select name="provinsi_id" id="provinsi_id_kecamatan" class="form-control" onchange="changeProvinsi(event, this, '#kabupaten_id_kecamatan');">
                        <?php
                        $provinsis = get_provinsi();
                        echo optionLoop($provinsis, substr($edit['id_kelurahan'], 0, 2));
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KABUPATEN</label>
                <div class="col-sm-5">
                    <select name="kabupaten_id" id="kabupaten_id_kecamatan" class="form-control" onchange="changeKabupaten(event, this, '#kecamatan_id_kecamatan');">
                        <?php
                        $kabupatens = get_kabupaten(substr($edit['id_kelurahan'], 0, 2));
                        echo optionLoop($kabupatens, substr($edit['id_kelurahan'], 0, 4));
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KECAMATAN</label>
                <div class="col-sm-5">
                    <select name="id_kecamatan" id="kecamatan_id_kecamatan" class="form-control">
                        <?php
                        $kecamatans = get_kecamatan(substr($edit['id_kelurahan'], 0, 4));
                        echo optionLoop($kecamatans, substr($edit['id_kelurahan'], 0, 7));
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA CAMAT</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_camat" value="<?=$edit['nama_lurah'];?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nip_camat" value="<?=$edit['nip'];?>" >
                </div>
            </div>
        </div>

        <div class="form-group show-on-kelurahan" style="display: none;">

            <div class="form-group">
                <label class="col-sm-4 control-label">PROVINSI</label>
                <div class="col-sm-5">
                    <select name="provinsi_id" id="provinsi_id_kelurahan" class="form-control" onchange="changeProvinsi(event, this, '#kabupaten_id_kelurahan');">
                        <?php
                        $provinsis = get_provinsi();
                        echo optionLoop($provinsis, substr($edit['id_kelurahan'], 0, 2));
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KABUPATEN</label>
                <div class="col-sm-5">
                    <select name="kabupaten_id" id="kabupaten_id_kelurahan" class="form-control" onchange="changeKabupaten(event, this, '#kecamatan_id_kelurahan');">
                        <?php
                        $kecamatans = get_kecamatan(substr($edit['id_kelurahan'], 0, 4));
                        echo optionLoop($kecamatans, substr($edit['id_kelurahan'], 0, 7));
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KECAMATAN</label>
                <div class="col-sm-5">
                    <select name="kecamatan_id" id="kecamatan_id_kelurahan" class="form-control" onchange="changeKecamatan(event, this, '#desa_id_kelurahan');">
                        <?php
                        $kecamatans = get_kecamatan(substr($edit['id_kelurahan'], 0, 4));
                        echo optionLoop($kecamatans, substr($edit['id_kelurahan'], 0, 7));
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">DESA</label>
                <div class="col-sm-5">
                    <select name="id_kelurahan" id="desa_id_kelurahan" class="form-control">
                        <?php
                        $desas = get_desa(substr($edit['id_kelurahan'], 0, 7));
                        echo optionLoop($desas, $edit['id_kelurahan']);
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA LURAH</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_lurah" value="<?=$edit['nama_lurah'];?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nip_lurah" value="<?=$edit['nip'];?>" >
                </div>
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
