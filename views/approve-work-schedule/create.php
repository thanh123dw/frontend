<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ApproveWorkSchedule $model */

$this->title = 'Create Approve Work Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Approve Work Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approve-work-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
