<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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
    <div class="flex-container">
      <div id="wrapper" class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar border-right" id="sidebar-wrapper">
            <li class="logo-container">
                <?= Html::img('@web/images/logo-woman.svg', [
                        "id"=>"logo"
                ]) ?>
            </li>
            <li class="pl-3">
              <a class="href-link" href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>" id="dashboard-link">
                  <?= Html::img('@web/images/clipboard-data.svg') ?>
                  Dashboard
              </a>
            </li>
            <li class="pl-3" id="customer-profile">
              <a class="href-link" href="<?= Yii::$app->urlManager->createUrl(['customer-profile/index']) ?>" class="text-danger" >
                  <?= Html::img('@web/images/file-person.svg') ?> Customer Profile
              </a>
            </li>
            <li class ="pl-3">
              <a class="href-link" href="<?= Yii::$app->urlManager->createUrl(['campaigns/index']) ?>" class="py-1 text-light">
                  <?= Html::img('@web/images/default.svg') ?> Campaigns
              </a>
            </li>
            <li class="pl-3">
              <a class="href-link" href="<?= Yii::$app->urlManager->createUrl(['one-day/index']) ?>" class="py-1 text-light">
                  <?= Html::img('@web/images/default.svg') ?> One day
              </a>
            </li>
          </ul>
        </div>
      <!-- endof nav-sidebar -->
        <div id="main-content-wrapper">
            <?= $content ?>
        </div>
    </div>

<script>rootPath = '<?= Yii::$app->getUrlManager()->getBaseUrl() ?>';</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


