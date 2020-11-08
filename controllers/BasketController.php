<?php

namespace app\controllers;

use app\models\BasketAnalysis;
use DateTime;

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
            if (!array_key_exists($data->orderWeekDay, $arrayData)) {
                $arrayData[$data->orderWeekDay] = [];
            }
            array_push($arrayData[$data->orderWeekDay], [
                'avgAmount' => (float) $data->avg_amount,
                'avgRevenue' => (float) $data->avg_revenue,
                'orderTime' => DateTime::createFromFormat('H:i:s', $data->orderTime)
            ]);
        }

        $peakTimes = [];

        $maxIdx = 0;
        foreach ($arrayData as $k => $times) {
            foreach ($times as $idx => $time) {
                if ($time['avgAmount'] > $times[$maxIdx]['avgAmount']) {
                    $maxIdx = $idx;
                }
            }
            $startIdx = $maxIdx;
            $endIdx = $maxIdx;
            while ($startIdx > 0) {
                if ($times[$startIdx]['orderTime']->diff($times[$startIdx - 1]['orderTime'])->i > 10) {
                    break;
                }
                if ($times[$startIdx - 1]['avgAmount'] / $times[$maxIdx]['avgAmount'] < 0.5) {
                    break;
                }
                $startIdx--;
            }
            while ($endIdx < sizeof($times) - 1) {
                if ($times[$endIdx]['orderTime']->diff($times[$endIdx + 1]['orderTime'])->i > 10 ) {
                    break;
                }
                if ($times[$endIdx + 1]['avgAmount'] / $times[$maxIdx]['avgAmount'] < 0.5) {
                    break;
                }
                $endIdx++;
            }

            $wds = [
                "Sunday",
                "Monday",
                "Tueday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ];

            $peakTimes[$wds[$k]] = [
              "startTime" => $times[$startIdx]['orderTime']->format("H:m:i"),
              "endTime" => $times[$endIdx]['orderTime']->format("H:m:i")
            ];
            $maxIdx = 0;
        }

        return $this->render('index', [
            'peakTimes' => json_encode($peakTimes)
        ]);
    }
}