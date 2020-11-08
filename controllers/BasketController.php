<?php

namespace app\controllers;

use app\models\BasketAnalysis;

/**
 * Class BasketController
 * @package app\controllers
 */
class BasketController extends BaseController {
    /**
     * @return string
     */
    public function actionIndex() {
        $basketAnalysis = BasketAnalysis::find()->all();
        $arrayData = [];

        foreach ($basketAnalysis as $data) {
            array_push($arrayData, [
                'avgAmount' => $data->avg_amount,
                'avgRevenue' => $data->avg_revenue,
                'orderWeekDay' => $data->orderWeekDay,
                'orderTime' => $data->orderTime
            ]);
        }

        return $this->render('index', [
            'basketAnalysis' => json_encode($arrayData)
        ]);
    }
}