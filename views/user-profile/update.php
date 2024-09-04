<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserProfile $model */

$this->title = 'Cập nhật thông tin';
$this->params['breadcrumbs'][] = ['label' => 'Thông tin người dùng', 'url' => ['index']];

?>
<div class="userprofile-update">

     <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?> 



</div>
