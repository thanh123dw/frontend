<?php

use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var yii\data\ArrayDataProvider $dataProvider */

$this->title = 'Phê duyệt lịch làm việc';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->setSort(false);
?>
<div class="approve-work-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model) {
            $id = isset($model['id']) ? $model['id'] : null;

            return [
                'style' => "cursor: pointer",
                'onclick' => $id !== null ? 'location.href="' . Yii::$app->urlManager->createUrl(['approve-work-schedule/approve', 'id' => $id]) . '"' : ''
            ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'staffid',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
            ],
            [
                'attribute' => 'workdate',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
            ],
            [
                'attribute' => 'starttime',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
            ],
            [
                'attribute' => 'endtime',
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
            ],
            'shifttype',
            'reason',
            [
                'attribute' => 'locked',
                'label' => 'Xin nghỉ',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::checkbox('locked', $model->locked, [
                        'disabled' => true,
                    ]);
                },
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
            ],  
        ],
    ]); ?>

</div>