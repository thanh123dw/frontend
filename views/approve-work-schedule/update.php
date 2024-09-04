<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ApproveWorkSchedule $model */
/** @var array $shiftTypes */

$this->title = 'Cập nhật ca làm việc';
$this->params['breadcrumbs'][] = ['label' => 'Cập nhật ca làm việc', 'url' => ['index']];
?>

<div class="approve-work-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

   <?= $this->render('_form', [
        'model' => $model,
        'shiftTypes'=>$shiftTypes
    ]) ?>
</div>
