<?php
use app\assets\HighchartAsset;
HighchartAsset::register($this);
?>
<?php

/* @var $this yii\web\View */

$this->title = '分布图';
?>
<?php
$js=<<<JS
    $('#highchart_show').highcharts({
        chart: {
               type: 'column'
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -90,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
		yAxis: {
            min: 0,
            title: {
                text: '人数'
            }
        },
        series: [{
            name: '人数',
            colorByPoint: true,
            data: $jsondata,
			dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y}', // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
		}],
    });
    chart=$('#highchart_show').highcharts();
    chart.setTitle($title);
JS;
$this->registerJs($js);
?>
<div class="statics">
      <div id="highchart_show">
      </div>
</div>
