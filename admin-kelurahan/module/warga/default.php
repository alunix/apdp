<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 12/22/18
 * Time: 10:10 AM
 */

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
                <button type="submit"name="submit" onclick="this.form.target='_self';return true;" class="btn btn-success"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
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
            $sql = "SELECT * FROM data_warga where ".buildQueryDesaId();
            $no=1;
            $tampil = _query($sql);
            while ($tampilkan = _fetch_array($tampil)) {
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
