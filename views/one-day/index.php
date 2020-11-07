<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'one-day-form' ,
    'validateOnBlur'=>false,
    'validateOnChange'=>false,
]);

?>

<?= $form->field($datePickForm, 'date')->widget(DatePicker::className(), [
    'options' => [
        'placeholder' => 'Choose date ...'
    ],
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php
    if (isset($avgOrderAmountByWeekdayFiveMinutes)) {
        //var_dump($avgOrderAmountByWeekdayFiveMinutes);
        echo '<br><br><br>';
        var_dump($orderAmountByFiveMinutes);
        echo '<br><br><br>';
        var_dump($orderItemByDate);
    }
?>

<canvas id="canvas" width="700" height="400"></canvas>
<script>
    var ctx = $("#canvas");
    var numsamples = 60;
    var AvgCpuChartOptions = {
        showLines: true,
        animation: {
            duration: 1000,
            easing: 'linear'
        },
        responsive: true,
        title: {
            display: true,
            text: 'Average CPU Usage (%)',
            padding: 5
        },
        legend: {
            display: false,
            position: 'top',
            labels: {
                boxWidth: 10,
                padding: 2
            }
        },
        tooltips: {
            enabled: false
        },
        scales: {
            yAxes: [{
                id: 'cpu',
                position: 'left',
                gridLines: {
                    drawTicks: false
                },
                ticks: {
                    fontSize: 10,
                    max: 100,
                    min: 0,
                    stepSize: 25,
                    callback: function(value) {
                        return value + '%';
                    }
                }
            }],
            xAxes: [{
                scaleLabel: {
                    display: true,
                    fontSize: 11,
                    labelString: 'Time'
                },
                gridLines: {
                    display: true,
                    drawTicks: false
                },
                ticks: {
                    fontSize: 10,
                    maxRotation: 0,
                    autoSkip: false,
                    callback: function(value) {
                        return value.toString().length > value ? 0 : null;
                    },
                }
            }]
        }
    };
    var AvgCpuChartData = {
        labels: [],
        datasets: [{
            label: '',
            yAxisID: 'cpu',
            fill: false,
            lineTension: 0.2,
            backgroundColor: 'rgba(75,192,192,0.4)',
            borderColor: 'rgba(75,192,192,1)',
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderWidth: 1,
            borderJoinStyle: 'miter',
            pointBorderColor: 'rgba(75,192,192,1)',
            pointBackgroundColor: '#fff',
            pointBorderWidth: 1,
            pointHoverRadius: 0,
            pointHoverBackgroundColor: 'rgba(75,192,192,1)',
            pointHoverBorderColor: 'rgba(220,220,220,1)',
            pointHoverBorderWidth: 0,
            pointRadius: 0,
            pointHitRadius: 10,
            data: [],
        }]
    };
    for (var i = 0; i < numsamples; i++) {
        AvgCpuChartData.labels.push('');
        AvgCpuChartData.datasets[0].data.push(null);
    }
    var AvgCpuChart = new Chart(ctx, {
        type: 'line',
        data: AvgCpuChartData,
        options: AvgCpuChartOptions
    });

    setInterval(function randomdata() {
        AvgCpuChartData.datasets[0].data.shift();
        AvgCpuChartData.labels.shift();
        var ts = new Date().getTime();
        var csecs = moment(ts).format('s');
        var label = '';
        if (csecs % 15 === 0) {
            label = csecs === '0' ? moment(ts).format('HH:mm') : moment(ts).format(':ss');
        }
        AvgCpuChartData.datasets[0].data.push(Math.floor(Math.random()*100));
        AvgCpuChartData.labels.push(label);
        AvgCpuChart.update();
    }, 1000);
</script>
