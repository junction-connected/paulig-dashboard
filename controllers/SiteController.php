<?php

namespace app\controllers;

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
        $arrayData = [];

        foreach ($orderAmountByTimeOfWeekday as $data) {
            array_push($arrayData, [
                'orderAmount' => $data->orderAmount,
                'orderWeekDay' => $data->orderWeekDay,
                'orderTime' => $data->orderTime
            ]);
        }

        return $this->render('index', [
            'orderAmountByTimeOfWeekday' => json_encode($arrayData)
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
