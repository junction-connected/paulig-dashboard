<?php

namespace app\controllers;

/**
 * Class OneDayController
 * @package app\controllers
 */
class OneDayController extends BaseController {
    /**
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
}