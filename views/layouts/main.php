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
          <img src="static/images/logo-woman.svg" alt="logo" id="logo" />
        </li>
        <li class="pl-3">
          <a href="#">
            <img class="icon" src="static/images/clipboard-data.svg" />Dashboard
          </a>
        </li>
        <li class="pl-3">
          <a href="#">
            <img class="icon" src="static/images/file-person.svg" />Customer
            <span class="py-1 text-light">Profile</span>
          </a>
        </li>
        <li class ="pl-3">
          <a href="#" class="py-1 text-light">
            <img class="icon" src="static/images/default.svg" />Events
          </a>
        </li>
        <li class="pl-3">
          <a href="#" class="py-1 text-light">
            <img class="icon" src="static/images/default.svg" />Profile
          </a>
        </li>
        <li>
          <a href="#" class="py-1 text-light">
            <img class="icon" src="static/images/default.svg" />Status
          </a>
        </li>
      </ul>
    </div>
  <!-- endof nav-sidebar -->
    <div id="main-content-wrapper" class="pl-3">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


