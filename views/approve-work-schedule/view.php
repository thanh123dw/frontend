<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ApproveWorkSchedule $model */

$this->params['breadcrumbs'][] = ['label' => 'Phê duyệt ca làm việc', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="approve-work-schedule-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Phê duyệt', ['approve', 'id' => $model->id, 'action' => (string) 'approve'], [
            'class' => 'btn btn-primary',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Từ chối', ['approve', 'id' => $model->id, 'action' => (string) 'reject'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có muốn từ chối yêu cầu này không?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'workscheduleid',
            'staffid',
            'workdate',
            'starttime',
            'endtime',
            'shifttype',
            'description:ntext',
            [
                'attribute' => 'locked',
                'label' => 'Xin nghỉ',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::checkbox('locked', $model->locked, [
                        'disabled' => true,
                    ]);
                },
            ],
            'createdat',
            'reason',
        ],
    ]) ?>

</div>