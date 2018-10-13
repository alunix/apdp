<?php
include 'inc.lampid.php';

$find = smartRouting('pdf', 'filter_data');

$themeColor = getSessionProfile()['level'] == 'admin-kelurahan' ? 'box-success' : 'box-info';

if ($find !== 1) {
    ?>
    <script src="<?=BASE_URL."/highcharts/code/highcharts.js";?>"></script>
    <script src="<?=BASE_URL."/highcharts/code/modules/exporting.js";?>"></script>
    <script src="<?=BASE_URL."/highcharts/code/modules/export-data.js";?>"></script>

    <div class="box box-solid <?=$themeColor;?>">
        <div class="box-header">
            <h3 class=" box-title">
                Cetak Laporan Berdasarkan LAMPID (Lahir, Mati, Pindah, Datang)
            </h3>

            <a class="btn btn-default pull-right" href="<?=GENERAL_MODULE_URL.'cetak_lampid/pdf.php';?>">
                <i class="fa fa-print"></i> Cetak
            </a>
            <div class="pull-right" style="max-width: 300px">
                <form action="<?=moduleUrlByLevel('cetak/lampid', 'aksi=filter_data');?>" method="post">
                    <select name="format_type" id="" class="form-control" onchange="changeSelected(event, this)" style="max-width: 100px;display: inline-block">
                        <?php
                        echo sprintf('<option value="%s" %s>%s</option>', '', 'selected="selected"', '--Opsi Menampilkan--');
                        $format_type = @$_SESSION['format_type'];
                        $types = array('semua', 'tahunan', 'bulanan');
                        foreach ($types as $type) {
                            $name = ucfirst($type);
                            $selected = $format_type == $type ? 'selected="selected"' : '';
                            echo sprintf('<option value="%s" %s>%s</option>', $type, $selected, $name);
                        }
                        ?>
                    </select>
                    <select name="selected_desa" id="" class="form-control" onchange="changeSelected(event, this)" style="max-width: 100px;display: inline-block">
                        <?php
                        echo sprintf('<option value="%s" %s>%s</option>', '', 'selected="selected"', '--Pilih Salah Satu--');
                        $selected_desa = @$_SESSION['selected_desa'];
                        $desas = getMultipleDesa();
                        foreach ($desas as $desa) {
                            $desaId = $desa['id'];
                            $name = $desa['nama_desa'];
                            $selected = $selected_desa == $desaId ? 'selected="selected"' : '';
                            echo sprintf('<option value="%s" %s>%s</option>', $desaId, $selected, $name);
                        }
                        ?>
                    </select>
                </form>
                <script>
                    function changeSelected(event, element) {
                        event.preventDefault();
                        var currentElement = $(element);
                        $("form").has(currentElement).submit();
                    }
                </script>
            </div>
        </div>
        <div class="box-body">
            <?php
            $format_type = @$_SESSION['format_type'];

            if ($format_type) {
                include_once "grafik_{$format_type}.php";
            } else {
                echo "Pilih ";
            }

            ?>
        </div><!-- /.box-body -->
    </div>
    <?php
}