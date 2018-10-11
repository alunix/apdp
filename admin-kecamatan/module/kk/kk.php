<?php
$aksi="module/kk/kk_aksi.php";


switch(@$_GET['aksi']){
    default:
    ?>
    <!----- ------------------------- Menampilkan Data Kepala Keluarga ------------------------- ----->
    <div style="margin-right:10%;margin-left:15%" class="alert alert-info alert-dismissable text-center">
        <button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
        <p>
            <i class="icon fa fa-info"></i>
            "Anda Berada Di Halaman Data Kepala Keluarga"!!!
        </p>
    </div>
    <div class="text-center">
        <h3>Data Kepala Keluarga</h3><hr/>
    </div>
    <form class="form-horizontal" action="module/laporan/cetak_kk.php" method="post">

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
                <button type="submit"name="submit" onclick="this.form.target='_blank';return true;" class="btn btn-info"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
            </div>
        </div>
    </form>
	<div class="box box-solid box-info">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-user-secret"></i>Data Kepala Keluarga </h3>
		<!--<a class="btn btn-default pull-right"href="?module=kk&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah data Warga</a>-->
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
                        <th class="col-sm-1">STATUS KELUARGA</th>
                        <th class="col-sm-1">AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    // Tampilkan data dari Database
                    $sql = "SELECT * FROM data_warga WHERE status_keluarga = 'Kepala Keluarga'";
                    $no=1;
                    $tampil = _query($sql);
                    while ($tampilkan = _fetch_array($tampil)) {
                    $Kode = $tampilkan['id'];
                    //$blokir = @$tampilkan['blokir'];
					?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $tampilkan['no_kk']; ?></td>
                            <td><?php echo $tampilkan['nik']; ?></td>
                            <td><?php echo $tampilkan['nama']; ?></td>
                            <td><?php echo $tampilkan['jk']; ?></td>
                            <td><?php echo $tampilkan['alamat']; ?></td>
                            <td><?php echo $tampilkan['status_keluarga']; ?></td>
                            <td align="center">
                                <a class="btn btn-xs btn-success"data-toggle="tooltip" title="Lihat Data Kepala Keluarga <?php echo $tampilkan['id'];?>"
                                   href="?module=kk&aksi=detail_warga2&id=<?php echo $tampilkan['id'];?>"
                                >
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                                <a class="btn btn-xs btn-warning"data-toggle="tooltip" title="Cetak Data Kepala Keluarga <?php echo $tampilkan['id'];?>"
                                   href="<?=baseUrlByLevel('module/laporan/cetak_kk_detail.php');?>?aksi=detail_warga2&id=<?php echo $tampilkan['id'];?>"
                                >
                                    <i class="fa fa-print"></i>
                                </a>

                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
        <!----- ------------------------- END MENAMPILKAN DATA WARGA ------------------------- ----->
 <?php
break;
case "detail_warga2" :
?>
<!----- ------------------------- LIHAT DATA KEPALA KELUARGA ------------------------- ----->

	<center>
		<h3> Data Warga</h3>
	</center>

	<form class="form-horizontal" action="<?php echo $aksi?>?module=kk&aksi=edit" role="form" method="post">
			<div class="nav-tabs-custom">
                <div class="pull-right">
                    <ul class="nav nav-tabs">
                        <li><a class="btn btn-default btn-sm pull-right" href="<?=moduleUrlByLevel('kk');?>" ><i class="fa fa-history"></i>  Kembali</a></li>
                    </ul>
                </div>
				<ul class="nav nav-tabs">
					<li class="active"><a class="text-red" href="#data" data-toggle="tab"><i class="fa fa-user-md"></i> Data Kepala Keluarga </h3> </a></li>
					<li><a class="text-red" href="#data1" data-toggle="tab"><i class="fa fa-institution"></i> Data Istri</h3></a></li>
					<li><a class="text-red" href="#data4" data-toggle="tab"><i class="fa fa-book"></i>  Data Anak</a></li>
				</ul>

<!--         <li><a href="javascript:history.back()" class="btn btn-sm btn-primary pull-right"><i class="fa fa-backward"></i> Kembali</a>	 </li> -->
    <div class="tab-content">
        <div class="tab-pane active" id="data">
            <section id="new">
                <div class="box box-solid box-info">
                    <div class="box-header">
                        <h3 class="btn btn disabled box-title">
						<i class="fa fa-user-md"></i> Informasi Data Kepala Keluarga </h3>
						<div class="pull-right">
							<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
								<i class="fa fa-minus"></i>
							</a>
						</div>
					</div>
                    <div class="box-body">
                        <?php
                            $data=_query("select * from data_warga where id='$_GET[id]'");
                            $edit=_fetch_array($data);
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
                            <label class="col-sm-4 control-label">Status Keluarga</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="<?php echo $edit['status_keluarga']; ?>" readonly name="status_keluarga" placeholder="Status Keluarga">
                            </div>
                        </div>
                    </div>
			    </div>
		    </section>
</div>
	<!----- ------------------------- LIST ISTRI ------------------------- ----->
<div class="tab-pane" id="data1">
<section id="new1">
<div class="box box-solid box-info">
    <div class="box-header">
        <h3 class="btn btn disabled box-title">
            <i class="fa fa-institution"></i>
            Data Istri
        </h3>
    </div>
	<div class="box-body">
		<!--<a class="btn btn-default pull-right"href="?module=kk&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah Data Warga</a>-->
		</div>
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr class="text-red">
                <th class="col-sm-1">NO</th>
                <th class="col-sm-2">NO. KK</th>
                <th class="col-sm-2">NIK</th>
                <th class="col-sm-2">NAMA</th>
                <th class="col-sm-1">JK</th>
                <th class="col-sm-1">ALAMAT</th>
                <th class="col-sm-1">STATUS KELUARGA</th>
                <th class="col-sm-1">AKSI</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $id_suami = $_GET['id'];
            // Tampilkan data dari Database
            $sql = "select * from data_istri where id_suami='$id_suami'";
            $no=1;
            $tampil = _query($sql);
            while ($tampilkan = _fetch_array($tampil)) {
            $Kode = $tampilkan['id'];
            $blokir = @$tampilkan['blokir'];?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $tampilkan['no_kk']; ?></td>
                    <td><?php echo $tampilkan['nik']; ?></td>
                    <td><?php echo $tampilkan['nama']; ?></td>
                    <td><?php echo $tampilkan['jk']; ?></td>
                    <td><?php echo $tampilkan['alamat']; ?></td>
                    <td><?php echo $tampilkan['status_keluarga']; ?></td>
                    <td align="center">
                        <a class="btn btn-xs btn-success"data-toggle="tooltip" title="Lihat Data Istri <?php echo $tampilkan['id'];?>"
						   href="?module=warga&aksi=detail_warga&id=<?php echo $tampilkan['id']; ?>">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>

        </tbody>
	</table>
	</div><!-- /.box-body -->
</div>
	</section>
</div><!-- /.box -->

<div class="tab-pane" id="data4">
<section id="new4">
<div class="box box-solid box-info">
    <div class="box-header">
        <h3 class="btn btn disabled box-title">
            <i class="fa fa-institution"></i>
            Data Anak
        </h3>
    </div>
	<div class="box-body">
		<!--<a class="btn btn-default pull-right"href="?module=kk&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah Data Warga</a>-->
		</div>
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr class="text-red">
                <th class="col-sm-1">NO</th>
                <th class="col-sm-2">NO. KK</th>
                <th class="col-sm-2">NIK</th>
                <th class="col-sm-2">NAMA</th>
                <th class="col-sm-1">JK</th>
                <th class="col-sm-1">ALAMAT</th>
                <th class="col-sm-1">STATUS KELUARGA</th>
                <th class="col-sm-1">AKSI</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $id_ayah = $_GET['id'];
            // Tampilkan data dari Database
            $sql = "select * from data_anak where id_ayah='$id_ayah'";
            $no=1;
            $tampil = _query($sql);
            while ($tampilkan = _fetch_array($tampil)) {
            $Kode = $tampilkan['id'];
            $blokir = @$tampilkan['blokir'];?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $tampilkan['no_kk']; ?></td>
                    <td><?php echo $tampilkan['nik']; ?></td>
                    <td><?php echo $tampilkan['nama']; ?></td>
                    <td><?php echo $tampilkan['jk']; ?></td>
                    <td><?php echo $tampilkan['alamat']; ?></td>
                    <td><?php echo $tampilkan['status_keluarga']; ?></td>
                    <td align="center">
                        <a class="btn btn-xs btn-success"data-toggle="tooltip" title="Lihat Data Anak <?php echo $tampilkan['id'];?>"
                            href="?module=warga&aksi=detail_warga&id=<?php echo $tampilkan['id']; ?>">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a class="btn btn-xs btn-success"data-toggle="tooltip" title="Cetak Detail Keluarga"
                            href="?module=laporan/data_kk_detail&id=<?php echo $tampilkan['id']; ?>">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>

        </tbody>
	</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</section>
</div><!-- /.box -->






<!----- ------------------------- END MENAMPILKAN DATA WARGA ------------------------- ----->

</div>
</div>
</section>
</div>


<!----- ------------------------- LIST ANAK ------------------------- ----->


<?php
break;
}
?>
