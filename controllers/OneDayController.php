<?php

namespace app\controllers;

use Yii;
use app\models\AvgOrderAmountByWeekdayFiveMinutes;
use app\models\OrderAmountByFiveMinutes;
use app\models\OrderItemByDate;
use app\models\DatePickForm;

/**
 * Class OneDayController
 * @package app\controllers
 */
class OneDayController extends BaseController {
    /**
     * @return string
     */
    public function actionIndex() {
        $datePickForm = new DatePickForm();

        if ($datePickForm->load(Yii::$app->request->post())) {
            return $this->render('index', [
                'avgOrderAmountByWeekdayFiveMinutes' => $this->getAvgOrderAmountByWeekdayFiveMinutes(),
                'orderAmountByFiveMinutes' => $this->filterOrderAmount($datePickForm),
                'orderItemByDate' => $this->filterOrderItem($datePickForm),
                'datePickForm' => $datePickForm
            ]);
        }

        return $this->render('index', [
            'datePickForm' => $datePickForm
        ]);
    }

    /**
     * @return false|string
     */
    private function getAvgOrderAmountByWeekdayFiveMinutes() {
        $avgOrderAmountByWeekdayFiveMinutes = AvgOrderAmountByWeekdayFiveMinutes::find()->all();
        $arrayData = [];

        foreach ($avgOrderAmountByWeekdayFiveMinutes as $data) {
            array_push($arrayData, [
                'avgOrderAmount' => $data->avgOrderAmount,
                'avgOrderRevenue' => $data->avgOrderRevenue,
                'orderWeekDay' => $data->orderWeekDay,
                'orderTime' => $data->orderTime
            ]);
        }

        return json_encode($arrayData);
    }

    /**
     * @param $postData
     * @return false|string
     */
    private function filterOrderAmount($postData) {
        $orderAmountArray = [];

        $orderAmountByFiveMinutes = OrderAmountByFiveMinutes::find()->where([
            'between', 'orderTime', $postData->date . ' 00:00:00', $postData->date . ' 23:59:59'
        ])->all();

        foreach ($orderAmountByFiveMinutes as $data) {
            array_push($orderAmountArray, [
                'orderAmount' => $data->orderAmount,
                'orderTime' => $data->orderTime
            ]);
        }

        return json_encode($orderAmountArray);
    }

    /**
     * @param $postData
     * @return false|string
     */
    private function filterOrderItem($postData) {
        $orderItemArray = [];

        $orderItemByDate = OrderItemByDate::find()->where([
            'between', 'order_time', $postData['date'] . ' 00:00:00', $postData['date'] . ' 23:59:59'
        ])->all();

        foreach ($orderItemByDate as $data) {
            array_push($orderItemArray, [
                'order_time' => $data->order_time,
                'id' => $data->id,
                'name' => $data->name,
                'price' => $data->price
            ]);
        }

        return json_encode($orderItemArray);
    }
}