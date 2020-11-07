<?php

namespace app\controllers;

/**
 * Class CampaignsController
 * @package app\controllers
 */
class CampaignsController extends BaseController {
    /**
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
}