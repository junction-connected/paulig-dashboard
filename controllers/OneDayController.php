<?php

namespace app\controllers;

use Yii;
use app\models\AvgOrderAmountByWeekdayFiveMinutes;
use app\models\OrderAmountByFiveMinutes;
use app\models\OrderItemByDate;

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
                'avgOrderAmount' => $data->avgOrderAmount,
                'avgOrderRevenue' => $data->avgOrderRevenue,
                'orderWeekDay' => $data->orderWeekDay,
                'orderTime' => $data->orderTime
            ]);
        }

        return $this->render('index', [
            'avgOrderAmountByWeekdayFiveMinutes' => json_encode($arrayData)
        ]);
    }

    /**
     * @return string
     */
    public function actionFilter() {
        //$post = Yii::$app->request->post();
        $post['orderTime'] = '2020-07-22';
        $orderAmountArray = [];
        $orderItemArray = [];

        $orderAmountByFiveMinutes = OrderAmountByFiveMinutes::find()->where([
            'between', 'orderTime', $post['orderTime'] . ' 00:00:00', $post['orderTime'] . ' 23:59:59'
        ])->all();

        foreach ($orderAmountByFiveMinutes as $data) {
            array_push($orderAmountArray, [
                'orderAmount' => $data->orderAmount,
                'orderTime' => $data->orderAmount
            ]);
        }

        $orderItemByDate = OrderItemByDate::find()->where([
            'between', 'order_time', $post['orderTime'] . ' 00:00:00', $post['orderTime'] . ' 23:59:59'
        ])->all();

        foreach ($orderItemByDate as $data) {
            array_push($orderItemArray, [
                'order_time' => $data->order_time,
                'id' => $data->id,
                'name' => $data->name,
                'price' => $data->price
            ]);
        }

        return $this->render('index', [
            'orderAmountByFiveMinutes' => json_encode($orderAmountArray),
            'orderItemByDate' => json_encode($orderItemArray)
        ]);
    }
}