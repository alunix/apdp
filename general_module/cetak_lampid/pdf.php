<?php
include_once '../../bootstrap.php';
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
            <small>Cetak Laporan Berdasarkan Agama Kota Tasikmalaya</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
            <li class="active">Cetak Laporan Berdasarkan Agama Kota Tasikmalaya</li>
        </ol>
    </section>


    <section class="content">
        <div class="text-center">
            <h3><img src="<?=BASE_URL;?>/tasik.png"/></h3>
            <b><?=$profile['alamat1'];?><br/>
                <?=$profile['alamat2'];?></b>
        </div><br/>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title center">
                    <?php
                    if ($only_one) {
                        echo sprintf(
                            "Laporan Berdasarkan Agama Desa %s Kecamatan %s %s",
                            ucwords(strtolower($desa['nama_desa'])),
                            ucwords(strtolower($desa['nama_kecamatan'])),
                            ucwords(strtolower($desa['nama_kabupaten']))
                        );
                    } else {
                        echo sprintf(
                            "Laporan Berdasarkan Agama Kecamatan %s %s",
                            ucwords(strtolower($desa['nama_kecamatan'])),
                            ucwords(strtolower($desa['nama_kabupaten']))
                        );
                    }

                    ?>
                    </h3>
                <span class="pull-right">
				Tasikmalaya, <?php echo Indonesia2Tgl(date('Y-m-d'));?>
				</span>
            </div>
            <div class="box-body">
                <?php
                if ($is_desa) {
                    ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-red">
                            <th class="">NO</th>
                            <th class="">Agama</th>
                            <th class="">Laki-laki</th>
                            <th class="">Perempuan</th>
                            <th class="">Jumlah</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        // Tampilkan data dari Database
                        if (empty($desaIds)) $desaIds = array($selected_desa);
                        $sql = "SELECT agama, laki_laki, perempuan, jumlah from statistik_data_agama WHERE desa_id IN ('".implode("','", $desaIds)."') group by agama";
                        $datas = _fetchMultipleFromSql($sql);
                        $no=1;
                        foreach($datas as $data) { ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['agama']; ?></td>
                            <td><?php echo $data['laki_laki']; ?> org</td>
                            <td><?php echo $data['perempuan']; ?> org</td>
                            <td><?php echo $data['jumlah']; ?> org</td>
                            <?php
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                } else {
                    $desaIds = getMultipleDesaId();
                    if (empty($desaIds)) $desaIds = array("false");
                    $sql = "SELECT desa_id, agama, laki_laki, perempuan, jumlah from statistik_data_agama WHERE desa_id IN ('".implode("','", $desaIds)."') group by desa_id, agama";
                    $datas = _fetchMultipleFromSql($sql);
                    $agamas = array_map(function ($data) {
                        return $data['agama'];
                    }, $datas);
                    ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-red">
                            <th class="vertical-middle text-center" rowspan="2">No.</th>
                            <th class="vertical-middle" rowspan="2">Nama Desa</th>
                            <?php
                            foreach ($agamas as $agama) {
                                echo sprintf('<th class="text-center" colspan="3">%s</th>', $agama);
                            }
                            ?>
                        </tr>
                        <?php
                        foreach ($agamas as $agama) {
                            echo sprintf('<th class="text-center">L</th><th class="text-center">P</th><th class="text-center">T</th>', $agama);
                        }
                        ?>
                        </thead>

                        <tbody>
                        <?php
                        // Tampilkan data dari Database

                        $total_agama = array();

                        $no=1;
                        foreach ($desas as $desa) {
                            $dataFilteredDesa = array_values(array_filter($datas, function ($data) use($desa) {
                                return $desa['id']==$data['desa_id'];
                            }));

                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $desa['nama_desa']; ?></td>
                                <?php
                                foreach ($agamas as $agama) {
                                    $filteredAgama = array_values(array_filter($dataFilteredDesa, function ($data) use ($agama) {
                                        return $agama==$data['agama'];
                                    }));
                                    $filteredAgama = @$filteredAgama[0];

                                    if (!isset($total_agama[$agama])) {
                                        $total_agama[$agama] = array(
                                            'laki_laki' => $filteredAgama['laki_laki'],
                                            'perempuan' => $filteredAgama['perempuan'],
                                            'jumlah' => $filteredAgama['jumlah']
                                        );
                                    } else {
                                        $total_agama[$agama]['laki_laki'] += $filteredAgama['laki_laki'];
                                        $total_agama[$agama]['perempuan'] += $filteredAgama['perempuan'];
                                        $total_agama[$agama]['jumlah'] += $filteredAgama['jumlah'];
                                    }

                                    echo sprintf(
                                        '<td class="text-center">%s</td><td class="text-center">%s</td><td class="text-center">%s</td>',
                                        $filteredAgama['laki_laki']?$filteredAgama['laki_laki']:"0",
                                        $filteredAgama['perempuan']?$filteredAgama['perempuan']:"0",
                                        $filteredAgama['jumlah']?$filteredAgama['jumlah']:"0"
                                    );
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr class="text-red">
                            <th class="vertical-middle text-center" colspan="2">TOTAL</th>
                            <?php
                            foreach ($total_agama as $agama => $values) {
                                foreach ($values as $value) {
                                    echo sprintf('<th class="text-center">%s</th>', $value);
                                }
                            }
                            ?>
                        </tr>
                        </tfoot>
                    </table>
                    <?php
                }
                ?>



                <?php
                $format_type = @$_SESSION['format_type'];

                if (!$format_type) {
                    $format_type = "semua";
                }
                include_once "pdf_{$format_type}.php";
                ?>
            </div><!-- /.box-body -->
        </div>
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