<?php

/* @var $this yii\web\View */
/* @var $orderAmountByTimeOfWeekday \app\models\OrderAmountByTimeOfWeekday */

$this->title = 'Amazing Business';
?>

<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="panel-box red">
                    <h1 class="colored">Customer</h1>
                    <h2 class="colored">5.236</h2>
                    <span class="glyphicon glyphicon-user icon-colored-box-position"></span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel-box blue">
                    <h1 class="colored">Product</h1>
                    <h2 class="colored">1.732</h2>
                    <span class="glyphicon glyphicon-list-alt icon-colored-box-position"></span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel-box green">
                    <h1 class="colored">Order</h1>
                    <h2 class="colored">14.522</h2>
                    <span class="glyphicon glyphicon-shopping-cart icon-colored-box-position"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="panel-box white">
            <h1>Order count per day</h1>
            <canvas id="myChart" style="width:100vw; max-width: 100%" height="400"></canvas>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    let values = <?= $orderAmountByTimeOfWeekday?>;

    function generateLabels(){
        let labels = [];
        for(let i=5; i<21; i++) {
            //egész
            if(i<=9){
                let string_egesz = "0" + i + ":00:00";
                labels.push(string_egesz);
            }
            else{
                let string_egesz = "" + i + ":00:00";
                labels.push(string_egesz);
            }
            //fél
            if(i<=9){
                let string_fel = "0" + i + ":30:00";
                labels.push(string_fel);
            }
            else{
                let string_fel= "" + i + ":30:00";
                labels.push(string_fel);
            }
        }
        return labels;
    }

    function getLabelToDay(labels, values, day){
        let arr = labels.map((label) =>{
            return values.find((item)=>{
                return item.orderTime === label && item.orderWeekDay === day
            })
        });

        for(let i=0; i<arr.length;i++){
            if(arr[i] === undefined){
                arr[i] = 0;
            }
            else{
                arr[i] = arr[i].orderAmount;
            }

        }
        return arr;
    }

    function generateDailyData(values) {
        let labels = generateLabels();
        let monday_data = getLabelToDay(labels, values, '1');
        let tuesday_data = getLabelToDay(labels, values, '2');
        let wednesday_data = getLabelToDay(labels, values, '3');
        let thursday_data = getLabelToDay(labels, values, '4');
        let friday_data = getLabelToDay(labels, values, '5');
        let saturday_data = getLabelToDay(labels, values, '6');
        let sunday_data = getLabelToDay(labels, values, '0');
        let mon = {label: "Monday", data: monday_data, fill:'rgb(0,0,0,0)', borderColor:'#ff000c'};
        let tue = {label: "Tuesday", data: tuesday_data, fill:'rgb(0,0,0,0)', borderColor:'#00c853'};
        let wed = {label: "Wednesday", data: wednesday_data, fill:'rgb(0,0,0,0)', borderColor:'#01579b'};
        let thu = {label: "Thursday", data: thursday_data, fill:'rgb(0,0,0,0)', borderColor:'#37474f'};
        let fri = {label: "Friday", data: friday_data, fill:'rgb(0,0,0,0)', borderColor:'#7c4dff'};
        let sat = {label: "Saturday", data: saturday_data, fill:'rgb(0,0,0,0)', borderColor:'#f50057'};
        let sun = {label: "Sunday", data: sunday_data, fill:'rgb(0,0,0,0)', borderColor:'#fbc02d'};

        let return_value = {
            labels: labels,
            mon: mon,
            tue: tue,
            wed: wed,
            thu: thu,
            fri: fri,
            sat: sat,
            sun: sun,
        };

        console.log(return_value);

        return(return_value);
    }

    let dailyData = generateDailyData(values);

    new Chart(document.getElementById("myChart"), {
        type: 'line',
        data: {
            labels: dailyData.labels,
            datasets: [dailyData.mon, dailyData.tue, dailyData.wed, dailyData.thu, dailyData.fri, dailyData.sat, dailyData.sun]
        },
        options: {
            responsive:true,
            title: {
                display: false,
                text: '<h1>Order Count per day </h1>'
            }
        }
    });
</script>