<?php
/* @var $basketAnalysis \app\models\BasketAnalysis */
?>


<div class="panel-box white">
    <br>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Ideal Basket
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Data from table</h4>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        23
                                                    </td>
                                                    <td>
                                                        Brown Sugar
                                                    </td>
                                                    <td>
                                                        20.0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        77
                                                    </td>
                                                    <td>
                                                        Vendor Espresso
                                                    </td>
                                                    <td>
                                                        33.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        19
                                                    </td>
                                                    <td>
                                                        Medium Peppermint Frappucino
                                                    </td>
                                                    <td>
                                                        1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        94
                                                    </td>
                                                    <td>
                                                        Extra Large Cinnamon Latte
                                                    </td>
                                                    <td>
                                                        20
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        Paper Bag
                                                    </td>
                                                    <td>
                                                        22.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        79
                                                    </td>
                                                    <td>
                                                        Large Iced Chai Tea - Mug
                                                    </td>
                                                    <td>
                                                        27.50
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Top 3 items</h4>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        23
                                                    </td>
                                                    <td>
                                                        Brown Sugar
                                                    </td>
                                                    <td>
                                                        20.0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        77
                                                    </td>
                                                    <td>
                                                        Vendor Espresso
                                                    </td>
                                                    <td>
                                                        33.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        19
                                                    </td>
                                                    <td>
                                                        Medium Peppermint Frappucino
                                                    </td>
                                                    <td>
                                                        1
                                                    </td>
                                                </tr>
                                            </table>

                                            <div id="canvas-holder" style="/*width:40%*/"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                <canvas id="chart-area" style="display: block; height: 304px; width: 608px;" width="760" height="380" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Above ideal basket
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Data from table</h4>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        23
                                                    </td>
                                                    <td>
                                                        Brown Sugar
                                                    </td>
                                                    <td>
                                                        10.7
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        77
                                                    </td>
                                                    <td>
                                                        Vendor Espresso
                                                    </td>
                                                    <td>
                                                        23.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        19
                                                    </td>
                                                    <td>
                                                        Medium Peppermint Frappucino
                                                    </td>
                                                    <td>
                                                        4
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        94
                                                    </td>
                                                    <td>
                                                        Extra Large Cinnamon Latte
                                                    </td>
                                                    <td>
                                                        21
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        Paper Bag
                                                    </td>
                                                    <td>
                                                        7.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        79
                                                    </td>
                                                    <td>
                                                        Large Iced Chai Tea - Mug
                                                    </td>
                                                    <td>
                                                        37.50
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Top 3 items</h4>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        23
                                                    </td>
                                                    <td>
                                                        Brown Sugar
                                                    </td>
                                                    <td>
                                                        17.0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        77
                                                    </td>
                                                    <td>
                                                        Vendor Espresso
                                                    </td>
                                                    <td>
                                                        27.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        19
                                                    </td>
                                                    <td>
                                                        Medium Peppermint Frappucino
                                                    </td>
                                                    <td>
                                                        3
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Below ideal basket
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Data from table</h4>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        23
                                                    </td>
                                                    <td>
                                                        Brown Sugar
                                                    </td>
                                                    <td>
                                                        15.0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        77
                                                    </td>
                                                    <td>
                                                        Vendor Espresso
                                                    </td>
                                                    <td>
                                                        14.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        19
                                                    </td>
                                                    <td>
                                                        Medium Peppermint Frappucino
                                                    </td>
                                                    <td>
                                                        3
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        94
                                                    </td>
                                                    <td>
                                                        Extra Large Cinnamon Latte
                                                    </td>
                                                    <td>
                                                        18
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        12
                                                    </td>
                                                    <td>
                                                        Paper Bag
                                                    </td>
                                                    <td>
                                                        26
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        79
                                                    </td>
                                                    <td>
                                                        Large Iced Chai Tea - Mug
                                                    </td>
                                                    <td>
                                                        7.60
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Top 3 items</h4>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        23
                                                    </td>
                                                    <td>
                                                        Brown Sugar
                                                    </td>
                                                    <td>
                                                        14.0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        77
                                                    </td>
                                                    <td>
                                                        Vendor Espresso
                                                    </td>
                                                    <td>
                                                        13.50
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        19
                                                    </td>
                                                    <td>
                                                        Medium Peppermint Frappucino
                                                    </td>
                                                    <td>
                                                        3
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.collapse').collapse();
    });

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    65,
                    24,
                    11
                ],
                backgroundColor: [
                    'blue',
                    'red',
                    'yellow'
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Brown sugar',
                'Vendor Espresso',
                'Medium Peppermint Frappucino'
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('chart-area').getContext('2d');
        window.myPie = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });

        window.myPie.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
        var newDataset = {
            backgroundColor: [],
            data: [],
            label: 'New dataset ' + config.data.datasets.length,
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());

            var colorName = colorNames[index % colorNames.length];
            var newColor = window.chartColors[colorName];
            newDataset.backgroundColor.push(newColor);
        }

        config.data.datasets.push(newDataset);
        window.myPie.update();
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
        config.data.datasets.splice(0, 1);
        window.myPie.update();
    });
</script>
