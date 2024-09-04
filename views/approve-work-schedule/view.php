<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ApproveWorkSchedule $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Phê duyệt ca làm việc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="approve-work-schedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Phê duyệt', ['approve', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Từ chối', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có muốn xóa yêu cầu này không ?',
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
            'status',
            'locked',
            'createdat',
            'updatedat',
            'reason',
        ],
    ]) ?>

</div>
