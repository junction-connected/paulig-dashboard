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
        return $this->render('index');
    }
}