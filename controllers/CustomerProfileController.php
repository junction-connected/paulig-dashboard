<?php

namespace app\controllers;

/**
 * Class CustomerProfileController
 * @package app\controllers
 */
class CustomerProfileController extends BaseController {
    /**
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
}