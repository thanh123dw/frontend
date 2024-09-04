<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkSchedule $model */

$this->title = 'Create Work Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Work Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
