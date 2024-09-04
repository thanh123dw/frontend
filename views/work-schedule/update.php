<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkSchedule $model */
/** @var array $shiftTypes */

$this->title = 'Update Work Schedule: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Work Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="work-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'shiftTypes'=>$shiftTypes
    ]) ?>

</div>