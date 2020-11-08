<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $avgOrderAmountByWeekdayFiveMinutes \app\models\AvgOrderAmountByWeekdayFiveMinutes */
/* @var $orderAmountByFiveMinutes \app\models\OrderAmountByFiveMinutes */
/* @var $orderItemByDate \app\models\OrderItemByDate */
/* @var $datePickForm \app\models\DatePickForm */

$this->title = 'Flashback';

?>

<div class="row">
    <div class="col-sm-4">
        <div class="panel-box white">
            <?php $form = ActiveForm::begin([
                'id' => 'flash-back-form' ,
                'validateOnBlur' => false,
                'validateOnChange' => false,
            ]); ?>

            <div class="row">
                <div class="col-sm-9">
                    <?= $form->field($datePickForm, 'date')->widget(DatePicker::className(), [
                        'options' => [
                            'placeholder' => 'Choose date ...',
                            'class' => 'input-lg',
                            'style' => 'width:100%'
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->label(false) ?>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <?= Html::submitButton('Submit', [
                            'class' => 'btn btn-primary btn-lg'
                        ]) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <hr>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Info</h3>
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, illum decore mnesarchum cu eum, te justo electram eos, comprehensam delicatissimi cu ius. Eos ancillae deleniti officiis id. Ius et sapientem appellantur, ei vel augue contentiones. Duo mundi prompta minimum ex, ne vix convenire laboramus. Eum repudiare adversarium signiferumque ea, cu lorem assum vocent sed, id lorem delicata hendrerit vim.</p>
                </div>
            </div>
            <?php if (isset($avgOrderAmountByWeekdayFiveMinutes)) : ?>
            <h1>Orders</h1>
            <div id="noticontainer"></div>
            <?php endif ?>
        </div>
    </div>

    <?php if (isset($avgOrderAmountByWeekdayFiveMinutes)) : ?>

    <div class="col-sm-8">
        <div class="panel-box white">
            <div style="position: absolute; top: 40px; left: 40px">
                <span class="glyphicon glyphicon-time" style="font-size: 2.7em;"></span>
                <p id="datecucc" style="font-size: 3em;display: inline-block;margin-left: 15px;"></p>
            </div>

            <div style="position: absolute; top: 40px; right: 40px">
                <span class="glyphicon glyphicon-euro" style="font-size: 2.7em;"></span>
                <p id="revenue_counter" style="font-size: 3em;display: inline-block;margin-left: 15px;"></p>
            </div>

            <canvas id="chart0" style="width:100vw; max-width: 100%; height: 580px; margin-top: 100px"></canvas>
        </div>
    </div>
</div>

<script>
    let fiveMinOrderDataRaw = <?= $orderAmountByFiveMinutes ?>;
    fiveMinOrderDataRaw.map(x => x["orderTime"] = new Date("1970-01-01 " + x["orderTime"].split(" ")[1]))
    let  fiveMinOrderData = [];
    fiveMinOrderData.push(fiveMinOrderDataRaw[0])
    for (let i = 1; i < fiveMinOrderDataRaw.length; i++) {
        while (fiveMinOrderDataRaw[i]["orderTime"] - fiveMinOrderData[fiveMinOrderData.length - 1]["orderTime"] > 5 * 60 * 1000) {
            oldDate = fiveMinOrderData[fiveMinOrderData.length - 1]["orderTime"];

            fiveMinOrderData.push({
                "orderTime": new Date(1970, 0, 1, oldDate.getHours(), oldDate.getMinutes() + 5, 0),
                "orderAmount": 0
            });
        }
        fiveMinOrderData.push(fiveMinOrderDataRaw[i]);
    }

    let orderData = <?= $orderItemByDate ?>;

    orderData.map(x => x["order_time"] = new Date("1970-01-01 " + x["order_time"].split(" ")[1]))
    currentFiveMinOrderData = 0;
    currentOrderData = 0;

    revenueAmount = 0;

    let samples = 40;
    let speed = 100;
    let timeout = samples * speed;
    let values = [];
    let labels = [];
    let charts = [];
    let value = 0;
    let scale = 1;

    let currentDate = new Date(1970,0,1,7,0,0);
    let dateDiff = 60352;

    addEmptyValues(values, samples);

    function animateValue(obj, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            obj.innerHTML = Math.floor(progress * (revenueAmount - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    let originalCalculateXLabelRotation = Chart.Scale.prototype.calculateXLabelRotation

    function setTimeField(time) {
        $("#datecucc").html(("0" + time.getHours()).slice(-2) + ":" + ("0" + time.getMinutes()).slice(-2));
    }

    function initialize() {

        charts.push(new Chart(document.getElementById("chart0"), {
            type: 'line',
            data: {
                //labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: 'rgba(255, 99, 132, 0.1)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 2,
                    lineTension: 0.25,
                    pointRadius: 0
                }]
            },
            options: {
                responsive: true,
                animation: {
                    duration: speed * 1.5,
                    easing: 'linear'
                },
                legend: false,
                scales: {
                    xAxes: [{
                        type: "time",
                        display: false
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0
                        }
                    }]
                }
            }
        }));
    }

    function addEmptyValues(arr, n) {
        for(let i = 0; i < n; i++) {
            currentDate.setTime(currentDate.getTime() + dateDiff);
            arr.push({
                x: currentDate,
                y: null
            });
        }
    }

    function updateCharts(){
        charts.forEach(function(chart) {
            chart.update();
        });
    }

    function progress() {
        while (currentDate - fiveMinOrderData[currentFiveMinOrderData]["orderTime"] > 0) {
            values.push({
                x: fiveMinOrderData[currentFiveMinOrderData]["orderTime"],
                y: fiveMinOrderData[currentFiveMinOrderData]["orderAmount"]
            });
            values.shift();
            currentFiveMinOrderData++;
        }
    }

    function advance() {
        if (values[0] !== null && scale < 4) {
            updateCharts();
        }
        currentDate.setTime(currentDate.getTime() + dateDiff);
        animateValue(document.getElementById("revenue_counter"), revenueAmount, fiveMinOrderData[currentFiveMinOrderData]["orderAmount"], 300);
        while (currentDate - orderData[currentOrderData]["order_time"] > 0) {
            revenueAmount += Number(orderData[currentOrderData]["price"]);
            if(orderData[currentOrderData]["id"] !== 1){
                addElement(orderData[currentOrderData]["name"], orderData[currentOrderData]["price"], Date(currentDate - orderData[currentOrderData]["order_time"]).toString(), orderData[currentOrderData]["id"]);
            }
            currentOrderData++;
        }
        setTimeField(currentDate);
        progress();
        updateCharts();

        setTimeout(function() {
            requestAnimationFrame(advance);
        }, speed);
    }


    function addElement(elem,price, time, id) {
        $("#noticontainer").prepend(" <div id=\"notipanel"+ id +"\" class=\"one-day-notif panel panel-default\"><div class=\"panel-body\"></div></div>");
        $("#notipanel"+id + " .panel-body").html('&#128184; ' +  elem + '<div style="float:right;">€'+ price +'</div>');
        $("#notipanel"+id).delay(2000).fadeOut(300);
    }

    initialize();
    advance();

</script>

<?php else : ?>

    <div class="col-sm-8">
        <div class="panel-box white" style="max-width: 100%;height: 780px;">
            <span class="glyphicon glyphicon-remove-sign" style="font-size: 600px;opacity: 0.15;top: 50%;left: 50%;transform: translate(-50%, -50%);"></span>
        </div>
    </div>
</div>

<?php endif ?>
