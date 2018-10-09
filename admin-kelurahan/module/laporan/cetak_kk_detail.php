<?php 
include "head.php";
?>
          <section class="content-header">
            <h1>
             Laporan
              <small>Data Kepala Keluarga Kecamatan Tawang Kota Tasikmalaya</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
              <li class="active">Data Kepala Keluarga Kecamatan Tawang Kota Tasikmalaya</li>
            </ol>
          </section>

           
        <section class="content">
            <div class="text-center">
			<h3><img src="inc/tasik.png"/></h3>
			<b>Jl. Siliwangi No.72 <br/>
			Tasikmalaya, Jawa Barat, Indonesia</b>
			</div><br/>


            <div class="box box-solid box-primary">
                <div class="box-header">
                    <h3 class="btn btn disabled box-title">
                        <i class="fa fa-institution"></i>
                        Data Keluarga
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
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $data=_query("select * from data_warga where id='$_GET[id]'");
                        $edit=_fetch_array($data);
                        $no=1;
                        ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?php echo $edit['no_kk']; ?></td>
                            <td><?php echo $edit['nik']; ?></td>
                            <td><?php echo $edit['nama']; ?></td>
                            <td><?php echo $edit['jk']; ?></td>
                            <td><?php echo $edit['alamat']; ?></td>
                            <td><?php echo $edit['status_keluarga']; ?></td>
                        </tr>

                        <?php
                        $id_suami = $_GET['id'];
                        // Tampilkan data dari Database
                        $sql = "select * from data_istri where id_suami='$id_suami'";

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
                            </tr>
                            <?php
                        }
                        ?>

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
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>



        </section><!-- /.content -->

            <?php

            $desas = getMultipleDesa();
            $selected_desa = @$_SESSION['selected_desa'];
            if ($selected_desa) {
                $desas = array_values(array_filter($desas, function ($desa) use($selected_desa) {
                    return $desa['id'] == $selected_desa;
                }));
            }
            $only_one = count($desas) == 1;
            $have_desa = count($desas) > 0;

            if ($only_one) {
                $is_desa = 1;
                $desa = $desas[0];
                $profile = getProfileDesa($desa['id']);
            } else {
                $is_desa = 0;
                $desa = $desas[0];
                $profile = getProfileKecamatan(substr($desa['id'], 0, 7));
            }


            if ($only_one) {
                echo sprintf(
                    "Lurah Desa %s Kecamatan %s %s",
                    ucwords(strtolower($desa['nama_desa'])),
                    ucwords(strtolower($desa['nama_kecamatan'])),
                    ucwords(strtolower($desa['nama_kabupaten']))
                );
                echo sprintf("<br/><br/><br/><span class='pejabat'>%s</span><br/><br/>", $profile['nama_lurah']);
            } else {
                echo sprintf(
                    "Camat Kecamatan %s %s",
                    ucwords(strtolower($desa['nama_kecamatan'])),
                    ucwords(strtolower($desa['nama_kabupaten']))
                );
                echo sprintf("<br/><br/><br/><span class='pejabat'>%s</span><br/><br/>", $profile['nama_camat']);
            }

            ?>


<?php
include "tail.php";
?>
