<?php

namespace app\controllers;

use app\models\AvgOrderAmountByWeekdayFiveMinutes;

/**
 * Class OneDayController
 * @package app\controllers
 */
class OneDayController extends BaseController {
    /**
     * @return string
     */
    public function actionIndex() {
        $avgOrderAmountByWeekdayFiveMinutes = AvgOrderAmountByWeekdayFiveMinutes::find()->all();
        $arrayData = [];

        foreach ($avgOrderAmountByWeekdayFiveMinutes as $data) {
            array_push($arrayData, [
                'orderAvg' => $data->orderAvg,
                'orderWeekDay' => $data->orderWeekDay,
                'orderTime' => $data->orderTime
            ]);
        }

        return $this->render('index', [
            'avgOrderAmountByWeekdayFiveMinutes' => json_encode($arrayData)
        ]);
    }
}