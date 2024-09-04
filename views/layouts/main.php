<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto '],
            'items' => [
                ['label' => 'Points', 'url' => ['/point']],
                ['label' => 'Lịch làm việc', 'url' => ['/work-schedule']],
                isset(Yii::$app->session->get('user')['user_role']) && Yii::$app->session->get('user')['user_role'] == 'manager'
                    ? 
                    ['label' => 'Phê duyệt', 'url' => ['/approve-work-schedule']]:'',
            ]
        ]);
        $defaultProfilePictureUrl = Yii::$app->request->baseUrl . '/profile_pictures/' . 'profile-icon-empty.png'; // Đường dẫn tới hình ảnh

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => [
                Yii::$app->session->has('user') && Yii::$app->session->has('token')
                    ? [
                        'label' => Html::img($defaultProfilePictureUrl, [
                                'alt' => 'Profile Picture',
                                'class' => 'img-thumbnail rounded-circle',
                                'style' => 'width: 35px; height: 35px; margin-right: 10px;'
                            ]),
                        'encode' => false,
                        'url' => ['/user-profile'],
                    ]
                    : '',
                Yii::$app->session->has('user') && Yii::$app->session->has('token')
                    ? '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Đăng xuất',
                        ['class' => 'nav-link btn mt-1 btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                    : ['label' => 'Đăng nhập', 'url' => ['/site/login']]
            ]
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between text-muted">
                <div class=" text-md-start">&copy; My Company <?= date('Y') ?></div>
                <div >Powered by <a href=" https://www.yiiframework.com/" rel="external">Yii Framework</a></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>