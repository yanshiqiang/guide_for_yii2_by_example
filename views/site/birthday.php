<?php
use yii\helpers\Html;
use app\assets\HighchartAsset;
HighchartAsset::register($this);
?>
<?php

/* @var $this yii\web\View */

$this->title = '生日分布';
?>
<?=Html::jsFile('http://api.map.baidu.com/api?v=2.0&ak=GU3l1cPEPLt6hd1kFrL4VHGh')?>
<?=Html::jsFile('@web/js/baiduapi.js')?>
<?php
$js=<<<JS
    $('#highchart_show').highcharts({
        chart: {
               type: 'column'
        },
        title: {
            text: '生日分布'
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
JS;
$this->registerJs($js);
?>
<div class="statics">
      <div id="highchart_show">
      </div>
</div>
