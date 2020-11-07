<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
  <!-- nav-sidebar -->
  <div id="wrapper" class="col-sm-3 col-md-2 sidebar">
      <ul class="nav nav-sidebar border-right" id="sidebar-wrapper">
        <li class="logo-container">
            <?= Html::img('@web/images/logo-woman.svg', [
                    "id"=>"logo"
            ]) ?>
        </li>
        <li class="pl-3">
          <a href="#" id="dashboard-link">
              <?= Html::img('@web/images/clipboard-data.svg', [
                  "id"=>"logo"
              ]) ?>
              Dashboard
          </a>
        </li>
        <li class="pl-3" id="customer-profile">
          <a href="#" class="text-danger" >
              <?= Html::img('@web/images/file-person.svg') ?> Customer Profile
          </a>
        </li>
        <li class ="pl-3">
          <a href="#" class="py-1 text-light">
              <?= Html::img('@web/images/default.svg', [
                  "id"=>"logo"
              ]) ?> Events
          </a>
        </li>
        <li class="pl-3">
          <a href="#" class="py-1 text-light">
              <?= Html::img('@web/images/default.svg', [
                  "id"=>"logo"
              ]) ?> Profile
          </a>
        </li>
        <li>
          <a href="#" class="py-1 text-light">
              <?= Html::img('@web/images/default.svg', [
                  "id"=>"logo"
              ]) ?> Status
          </a>
        </li>
      </ul>
    </div>
  <!-- endof nav-sidebar -->
    <div id="main-content-wrapper" class="ml-3">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


