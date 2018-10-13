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
<div id="container"></div>
<script>

    Highcharts.chart('container', {

        title: {
            text: 'Grafik LAMPID <?=$selected_bottom_range_year;?> - <?=$selected_top_range_year;?>'
        },

        subtitle: {
            text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
            title: {
                text: 'Number of Employees'
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
                pointStart: 2010
            }
        },

        series: [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

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
</script>

