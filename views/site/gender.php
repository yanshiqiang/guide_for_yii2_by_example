<?php
use app\assets\HighchartAsset;
HighchartAsset::register($this);
?>
<?php

/* @var $this yii\web\View */

$this->title = '男女比例';
?>
<?php
$js=<<<JS
    $('#highchart_show').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '性别比例'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Gender',
            colorByPoint: true,
            data: $jsondata
		}],
    });
JS;
$this->registerJs($js);
?>
<div class="statics">
      <div id="highchart_show">
      </div>
</div>