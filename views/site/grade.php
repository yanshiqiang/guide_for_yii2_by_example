<?php
use app\assets\HighchartAsset;
?>
<?php
$js = <<<JS
        $('#view').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '铁道大学年级分布图'
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
            data: $json
        }],
    });
JS;
$this->registerJs($js);
?>
<div id="view" >
</div>
