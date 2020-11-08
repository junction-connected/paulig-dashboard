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
                    <?= Html::img('https://www.pauliggroup.com/sites/default/themes/pauliggroup/logo.svg', [
                        "id" => "logo"
                    ]) ?>
                </li>
                <li class="pl-3">
                    <a class="href-link" href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>" id="dashboard-link">
                        <?= Html::img('@web/images/clipboard-data.svg') ?>
                        <p>Dashboard</p>
                    </a>
                </li>
                <hr class="separator">
                <li class="pl-3">
                    <a class="href-link" href="<?= Yii::$app->urlManager->createUrl(['basket/index']) ?>" class="py-1 text-light">
                        <?= Html::img('@web/images/basket.svg') ?>
                        <p>Basket analysis</p>
                    </a>
                </li><hr class="separator">
                <li class="pl-3">
                    <a class="href-link" href="<?= Yii::$app->urlManager->createUrl(['flash-back/index']) ?>" class="py-1 text-light">
                        <?= Html::img('@web/images/default.svg') ?>
                        <p>Flashback</p>
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


