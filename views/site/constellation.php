<?php
use app\assets\HighchartAsset;
HighchartAsset::register($this);
?>
<?php
$js = <<<JS
        $('#view').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '铁道大学星座分布图'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: '人数'
            }
   
        },
        credits: {
          enabled:false
       },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: $jsondata,dataLabels: {
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
<div id="view" >
</div>
