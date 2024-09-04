<?php

use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var yii\data\ArrayDataProvider $dataProvider */

$this->title = 'Work Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Work Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model) {
            // Kiểm tra nếu $model là mảng, sử dụng chỉ số thay vì thuộc tính
            $id = isset($model['id']) ? $model['id'] : null;

            return [
                'style' => "cursor: pointer",
                'onclick' => $id !== null ? 'location.href="' . Yii::$app->urlManager->createUrl(['approve-work-schedule/request', 'id' => $id]) . '"' : ''
            ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'staffid',
            'workdate',
            'starttime',
            'endtime',
        ],
    ]); ?>

</div>