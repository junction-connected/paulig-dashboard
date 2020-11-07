<?php

/* @var $this yii\web\View */
/* @var $orderAmountByTimeOfWeekday \app\models\OrderAmountByTimeOfWeekday */

$this->title = 'Amazing Business';
?>

<canvas id="myChart" width="900" height="400"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    let values = <?= $orderAmountByTimeOfWeekday?>;

    function generateLabels(){
        let labels = [];
        //48
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
/*
    function generateDailyData(values) {
        let labels =[];
        let monday_data = [];
        let tuesday_data = [];
        //console.log(values.length);
        for (let i = 0; i < values.length; i++) {
            if (values[i].orderWeekDay === '0') {
                labels.push(values[i].orderTime);
                monday_data.push(values[i].orderAmount)
            }
            if (values[i].orderWeekDay === '1') {
                tuesday_data.push(values[i].orderAmount)
            }
        }
        //console.log(monday_data);
        let mon = {data: monday_data};
        let tue = {data: tuesday_data};
        //console.log(mon);
        //console.log(tue);
        let return_value = {labels: labels, mon: mon, tue: tue};
        //console.log(return_value);
        return return_value;
    }*/

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

    function generateDailyData(values){
        let labels = generateLabels();
        console.log(labels);
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

/*
"datasets":[
{
    "label":
    "My First Dataset",
    "data":[65,59,80,81,56,55,40],
    "fill":false,
    "borderColor":"rgb(75, 192, 192)",
    "lineTension":0.1
}]}
        {
            label: 'Business of Week Days',
                data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1,
            yAxisID: 'day'
        }

*/




    console.log(values);
    let dailyData = generateDailyData(values);
//    console.log(y_labels);
    new Chart(document.getElementById("myChart"), {
        type: 'line',
        data: {
            labels: dailyData.labels,
            datasets: [dailyData.mon, dailyData.tue, dailyData.wed, dailyData.thu, dailyData.fri, dailyData.sat, dailyData.sun]
        },
        options: {
            responsive:true,
            title: {
                display: true,
                text: 'World population per region (in millions)'
            }
        }
    });
</script>