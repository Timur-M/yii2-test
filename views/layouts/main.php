<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
//use yii\bootstrap4\Alert;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Тестовое задание 3</title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <div class="container">
        <a href="/">Главная</a>
        <a href="/request" style="margin-left:30px">Заявка</a>
        <a href="/admin" style="margin-left:30px">Админка</a>
    </div>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= $content ?>
        <?= Alert::widget() ?>
    </div>
    
</main>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
