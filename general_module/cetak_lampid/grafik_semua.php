<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 10/11/18
 * Time: 7:30 PM
 */

?>
<style>
    #container {
        min-width: 310px;
        /*max-width: 800px;*/
        height: 400px;
        margin: 0 auto;
    }
</style>
<script src="<?=BASE_URL."/highcharts.js";?>"></script>
<script src="<?=BASE_URL."/modules/series-label.js";?>"></script>
<script src="<?=BASE_URL."/modules/exporting.js";?>"></script>
<script src="<?=BASE_URL."/modules/export-data.js";?>"></script>

<button class="btn btn-primary do-filter" >
    Filter
</button>
<div id="filter" style="display: none">
    <div class="text-center">
        <?php
        $selected_bottom_range_year = GetSetVar('selected_bottom_range_year');
        $selected_top_range_year = GetSetVar('selected_top_range_year');
        $range_year = getRangeYearOfDesa();
        for ($i=0;$i<count($range_year)-1;$i++) {
            $ryi = $range_year[$i];
            $ryi_1 = $range_year[$i+1];

            if (
                ((!$selected_bottom_range_year || !$selected_top_range_year) && $i==0)
                ||
                (
                    $selected_bottom_range_year &&
                    $selected_top_range_year &&
                    $selected_bottom_range_year == $ryi &&
                    $selected_top_range_year == $ryi_1
                )
            ) {
                $active = 'btn-primary';
                if (!$selected_bottom_range_year) {
                    $selected_bottom_range_year = $ryi;
                }
                if (!$selected_top_range_year) {
                    $selected_top_range_year = $ryi_1;
                }
            } else {
                $active = 'btn-default';
            }
            ?>
            <a class="btn <?=$active;?> submit-me" href="<?=moduleUrlByLevel('cetak/lampid', 'selected_bottom_range_year='.$ryi.'&selected_top_range_year='.$ryi_1);?>">
                <?=$range_year[$i];?> - <?=$range_year[$i+1];?>
            </a>
            <?php
        }
        ?>
    </div>
</div>
<div id="container"></div>

<?php
$dataLampids = array(
        array('name' => 'Lahir', 'data'=> array()),
        array('name' => 'Mati', 'data' => array()),
        array('name' => 'Pindah', 'data' => array()),
        array('name' => 'Datang', 'data' => array()),
);
$dataUnfiltered = getDataLampid($selected_top_range_year, $selected_bottom_range_year);
for ($i=$selected_top_range_year;$i<=$selected_bottom_range_year;$i++) {
    $dataFiltered = array_filter($dataUnfiltered, function ($d) use ($i) {
        return $d['tahun'] == $i;
    });
    if (!$dataFiltered) {
        $dataFiltered = array();
    } else {
        $dataFiltered = array_values($dataFiltered);
        $dataFiltered = @$dataFiltered[0];
    }
    $dataLampids[0]['data'][] = (int) (@$dataFiltered['jumlah_lahir'] ? @$dataFiltered['jumlah_lahir'] : 0);
    $dataLampids[1]['data'][] = (int) (@$dataFiltered['jumlah_wafat'] ? @$dataFiltered['jumlah_wafat'] : 0);
    $dataLampids[2]['data'][] = (int) (@$dataFiltered['jumlah_pindah'] ? @$dataFiltered['jumlah_pindah'] : 0);
    $dataLampids[3]['data'][] = (int) (@$dataFiltered['jumlah_datang'] ? @$dataFiltered['jumlah_datang'] : 0);
}

?>
<script>

    Highcharts.chart('container', {

        title: {
            text: 'Grafik LAMPID <?=$selected_bottom_range_year;?> - <?=$selected_top_range_year;?>'
        },

        // subtitle: {
        //     text: 'Source: thesolarfoundation.com'
        // },

        yAxis: {
            title: {
                text: 'Jumlah (Orang)'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: <?=$selected_top_range_year;?>
            }
        },

        series: <?=json_encode($dataLampids);?>,

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

    var last_filter = Number(window.localStorage.getItem('last_filter_enable'));
    if (last_filter != 0 && last_filter != 1) last_filter = 0;
    $(".do-filter").click(function (e) {
        $("#filter").toggle(100);
        var last = Number(window.localStorage.getItem('last_filter_enable'));
        if (last == 1) {
            last=0;
        } else {
            last=1;
        }
        window.localStorage.setItem('last_filter_enable', last);
    })
    if (last_filter) {
        $("#filter").toggle(100);
    }
</script>

