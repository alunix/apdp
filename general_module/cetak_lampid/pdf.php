<?php
include_once '../../bootstrap.php';
include 'inc.lampid.php';
include "head.php";

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

?>
    <style>
        .vertical-middle {
            vertical-align: middle !important;
        }
        .pejabat {
            text-decoration: underline !important;
            font-weight: bold;
        }
    </style>
    <section class="content-header">
        <h1>
            Laporan
            <small>Cetak Laporan Lahir, Mati, Pindah &amp; Datang Kota Tasikmalaya</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
            <li class="active">Cetak Laporan Lahir, Mati, Pindah &amp; Datang Kota Tasikmalaya</li>
        </ol>
    </section>


    <section class="content">
        <div class="text-center">
            <h3><img src="<?=BASE_URL;?>/tasik.png"/></h3>
            <b><?=$profile['alamat1'];?><br/>
                <?=$profile['alamat2'];?></b>
        </div><br/>

        <?php
        $year = date('Y');
        $monthList = getMonthListIndonesia();
        $maxMonth = (int) date('m');
        $lampidDatas = getDataLampidBulanByDesa($year);
        for ($i=1;$i<=$maxMonth;$i++) {
            $bulan = $monthList[$i-1];
            ?>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title center">
                        <?php
                        if ($only_one) {
                            echo sprintf(
                                "Laporan Lahir, Mati, Pindah &amp; Datang Desa %s Kecamatan %s %s Bulan %s %s",
                                ucwords(strtolower($desa['nama_desa'])),
                                ucwords(strtolower($desa['nama_kecamatan'])),
                                ucwords(strtolower($desa['nama_kabupaten'])),
                                $bulan, $year
                            );
                        } else {
                            echo sprintf(
                                "Laporan Lahir, Mati, Pindah &amp; Datang Kecamatan %s %s Bulan %s %s",
                                ucwords(strtolower($desa['nama_kecamatan'])),
                                ucwords(strtolower($desa['nama_kabupaten'])),
                                $bulan, $year
                            );
                        }

                        ?>
                    </h3>
                    <span class="pull-right">
				Tasikmalaya, <?php echo Indonesia2Tgl(date('Y-m-d'));?>
				</span>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-red">
                            <th class="vertical-middle text-center">No.</th>
                            <th class="vertical-middle">Nama Desa</th>
                            <th class="vertical-middle">Lahir</th>
                            <th class="vertical-middle">Mati</th>
                            <th class="vertical-middle">Datang</th>
                            <th class="vertical-middle">Pindah</th>
                            <th class="vertical-middle">Total</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        // Tampilkan data dari Database

                        $total_agama = array();

                        $no=1;
                        $total_lahir = 0;
                        $total_wafat = 0;
                        $total_pindah = 0;
                        $total_datang = 0;
                        $total_total = 0;

                        foreach ($desas as $desa) {
                            $dataFilteredDesa = array_values(array_filter($lampidDatas, function ($data) use($desa, $i) {
                                return $desa['id']==$data['desa_id'] && ((int) $data['bulan']) == $i;
                            }));
                            $dataFilteredDesa = @$dataFilteredDesa[0];
                            $total = @$dataFilteredDesa['jumlah_lahir']
                                + @$dataFilteredDesa['jumlah_wafat']
                                + @$dataFilteredDesa['jumlah_pindah']
                                + @$dataFilteredDesa['jumlah_datang'];

                            $total_lahir += @$dataFilteredDesa['jumlah_lahir'];
                            $total_wafat += @$dataFilteredDesa['jumlah_wafat'];
                            $total_pindah += @$dataFilteredDesa['jumlah_pindah'];
                            $total_datang += @$dataFilteredDesa['jumlah_datang'];
                            $total_total += $total;
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $desa['nama_desa']; ?></td>
                                <td><?php echo @$dataFilteredDesa['jumlah_lahir']?$dataFilteredDesa['jumlah_lahir']:"0"; ?></td>
                                <td><?php echo @$dataFilteredDesa['jumlah_wafat']?$dataFilteredDesa['jumlah_wafat']:"0"; ?></td>
                                <td><?php echo @$dataFilteredDesa['jumlah_datang']?$dataFilteredDesa['jumlah_datang']:"0"; ?></td>
                                <td><?php echo @$dataFilteredDesa['jumlah_pindah']?$dataFilteredDesa['jumlah_pindah']:"0"; ?></td>
                                <td><?php echo $total; ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr class="text-red">
                            <th class="vertical-middle text-center" colspan="2">TOTAL</th>
                            <th class="vertical-middle" ><?=$total_lahir;?></th>
                            <th class="vertical-middle" ><?=$total_wafat;?></th>
                            <th class="vertical-middle" ><?=$total_datang;?></th>
                            <th class="vertical-middle" ><?=$total_pindah;?></th>
                            <th class="vertical-middle" ><?=$total_total;?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div>
            <?php

        }
        ?>

    </section><!-- /.content -->

    <div style="width: 300px" class="text-center">



    <?php
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
    </div>

    </div>

<?php
include "tail.php";
?>