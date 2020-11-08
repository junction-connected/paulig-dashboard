<?php

namespace app\controllers;

use app\models\BasketAnalysis;
use DateTime;
use Yii;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\OrderAmountByTimeOfWeekday;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends BaseController {
    /**
     * @return string
     */
    public function actionIndex() {
        $orderAmountByTimeOfWeekday = OrderAmountByTimeOfWeekday::find()->all();
        $orderAmountData = [];

        foreach ($orderAmountByTimeOfWeekday as $data) {
            array_push($orderAmountData, [
                'orderAmount' => $data->orderAmount,
                'orderWeekDay' => $data->orderWeekDay,
                'orderTime' => $data->orderTime
            ]);
        }

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

            $dow = (int)((new DateTime())->format("w"));

            $peakTimes[$k] = [
                "startTime" => $times[$startIdx]['orderTime']->format("H:m"),
                "endTime" => $times[$endIdx]['orderTime']->format("H:m")
            ];
            $maxIdx = 0;
        }

        return $this->render('index', [
            'orderAmountByTimeOfWeekday' => json_encode($orderAmountData),
            'peakTime' => $peakTimes[$dow]['startTime'] . " - " . $peakTimes[$dow]['endTime']
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @return string|Response
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }
}
