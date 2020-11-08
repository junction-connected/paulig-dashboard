<?php

/* @var $this yii\web\View */
/* @var $orderAmountByFiveMinutes \app\models\OrderAmountByFiveMinutes */
/* @var $orderItemByDate \app\models\OrderItemByDate */

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
?>

<p id="datecucc" style="font-size: 3em"></p>
<h1 id="revenue_counter"></h1>
<canvas id="chart0" style="width:512px;height:320px"></canvas>

    <div id="noticontainer">
    </div>

    <script>

    var fiveMinOrderDataRaw = <?= $orderAmountByFiveMinutes ?>;
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

    var orderData = <?= $orderItemByDate ?>;

    orderData.map(x => x["order_time"] = new Date("1970-01-01 " + x["order_time"].split(" ")[1]))
    currentFiveMinOrderData = 0;
    currentOrderData = 0;

    revenueAmount = 0;

    var samples = 40;
    var speed = 100;
    let timeout = samples * speed;
    var values = [];
    var labels = [];
    var charts = [];
    var value = 0;
    var scale = 1;

    var currentDate = new Date(1970,0,1,7,0,0);
    var dateDiff = 60352;

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

    var originalCalculateXLabelRotation = Chart.Scale.prototype.calculateXLabelRotation

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
        for(var i = 0; i < n; i++) {
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
            //rescale();
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

    initialize();
    advance();

    function addElement(elem,price, time, id)
    {
        $("#noticontainer").prepend(" <div id=\"notipanel"+ id +"\" class=\"panel panel-default\"><div class=\"panel-body\"></div></div>")
        $("#notipanel"+id + " .panel-body").html('&#128184; ' +  elem + '<div style="float:right;">€'+ price +'</div>')
        $("#notipanel"+id).delay(2000).fadeOut(300);


    }

    //let timer = setInterval(addElement,300);
    /*setTimeout(function(){
        clearInterval(timer);
    }, 14000);*/
</script>

<?php } ?>