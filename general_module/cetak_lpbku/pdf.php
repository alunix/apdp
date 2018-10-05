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
            <small>Cetak Laporan Berdasarkan Usia Kota Tasikmalaya</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
            <li class="active">Cetak Laporan Berdasarkan Usia Kota Tasikmalaya</li>
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
                            "Laporan Berdasarkan Usia Desa %s Kecamatan %s %s",
                            ucwords(strtolower($desa['nama_desa'])),
                            ucwords(strtolower($desa['nama_kecamatan'])),
                            ucwords(strtolower($desa['nama_kabupaten']))
                        );
                    } else {
                        echo sprintf(
                            "Laporan Berdasarkan Usia Kecamatan %s %s",
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
                            <th class="">Usia</th>
                            <th class="">Laki-laki</th>
                            <th class="">Perempuan</th>
                            <th class="">Jumlah</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        // Tampilkan data dari Database
                        if (empty($desaIds)) $desaIds = array($selected_desa);
                        $sql = "SELECT usia, laki_laki, perempuan, jumlah from statistik_data_usia WHERE desa_id IN ('".implode("','", $desaIds)."') group by usia  order by urutan";
                        $datas = _fetchMultipleFromSql($sql);
                        $no=1;
                        foreach($datas as $data) { ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['usia']; ?></td>
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
                    $sql = "SELECT desa_id, usia, laki_laki, perempuan, jumlah from statistik_data_usia WHERE desa_id IN ('".implode("','", $desaIds)."') group by desa_id, usia  order by desa_id, urutan";
                    $datas = _fetchMultipleFromSql($sql);
                    $usias = array_map(function ($data) {
                        return $data['usia'];
                    }, $datas);
                    ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="text-red">
                            <th class="vertical-middle text-center" rowspan="2">No.</th>
                            <th class="vertical-middle" rowspan="2">Nama Desa</th>
                            <?php
                            foreach ($usias as $usia) {
                                echo sprintf('<th class="text-center" colspan="3">%s</th>', $usia);
                            }
                            ?>
                        </tr>
                        <?php
                        foreach ($usias as $usia) {
                            echo sprintf('<th class="text-center">L</th><th class="text-center">P</th><th class="text-center">T</th>', $usia);
                        }
                        ?>
                        </thead>

                        <tbody>
                        <?php
                        // Tampilkan data dari Database

                        $total_usia = array();

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
                                foreach ($usias as $usia) {
                                    $filteredUsia = array_values(array_filter($dataFilteredDesa, function ($data) use ($usia) {
                                        return $usia==$data['usia'];
                                    }));
                                    $filteredUsia = @$filteredUsia[0];

                                    if (!isset($total_usia[$usia])) {
                                        $total_usia[$usia] = array(
                                            'laki_laki' => $filteredUsia['laki_laki'],
                                            'perempuan' => $filteredUsia['perempuan'],
                                            'jumlah' => $filteredUsia['jumlah']
                                        );
                                    } else {
                                        $total_usia[$usia]['laki_laki'] += $filteredUsia['laki_laki'];
                                        $total_usia[$usia]['perempuan'] += $filteredUsia['perempuan'];
                                        $total_usia[$usia]['jumlah'] += $filteredUsia['jumlah'];
                                    }

                                    echo sprintf(
                                        '<td class="text-center">%s</td><td class="text-center">%s</td><td class="text-center">%s</td>',
                                        $filteredUsia['laki_laki']?$filteredUsia['laki_laki']:"0",
                                        $filteredUsia['perempuan']?$filteredUsia['perempuan']:"0",
                                        $filteredUsia['jumlah']?$filteredUsia['jumlah']:"0"
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
                            foreach ($total_usia as $usia => $values) {
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